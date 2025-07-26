#!/usr/bin/env python3
"""
Comprehensive Backend API Testing for NATEAG Enterprises
Tests all API endpoints, CRUD operations, data validation, and error handling
"""

import asyncio
import aiohttp
import json
import os
from datetime import datetime
from typing import Dict, Any, List

# Get backend URL from frontend environment
BACKEND_URL = "https://1056e8bd-813e-44e7-8af1-a9ee3fc29846.preview.emergentagent.com/api"

class BackendTester:
    def __init__(self):
        self.base_url = BACKEND_URL
        self.session = None
        self.test_results = {}
        self.created_resources = {
            'services': [],
            'testimonials': [],
            'blog_posts': [],
            'contact_submissions': [],
            'newsletter_subscriptions': []
        }

    async def __aenter__(self):
        self.session = aiohttp.ClientSession()
        return self

    async def __aexit__(self, exc_type, exc_val, exc_tb):
        if self.session:
            await self.session.close()

    async def make_request(self, method: str, endpoint: str, data: Dict = None, params: Dict = None) -> Dict:
        """Make HTTP request and return response data"""
        url = f"{self.base_url}{endpoint}"
        
        try:
            async with self.session.request(
                method, 
                url, 
                json=data, 
                params=params,
                headers={'Content-Type': 'application/json'}
            ) as response:
                response_data = await response.json()
                return {
                    'status_code': response.status,
                    'data': response_data,
                    'success': 200 <= response.status < 300
                }
        except Exception as e:
            return {
                'status_code': 0,
                'data': {'error': str(e)},
                'success': False
            }

    def log_test_result(self, test_name: str, success: bool, details: str = ""):
        """Log test result"""
        self.test_results[test_name] = {
            'success': success,
            'details': details,
            'timestamp': datetime.now().isoformat()
        }
        status = "✅ PASS" if success else "❌ FAIL"
        print(f"{status} {test_name}: {details}")

    async def test_health_endpoints(self):
        """Test health check endpoints"""
        print("\n=== Testing Health Endpoints ===")
        
        # Test root endpoint
        result = await self.make_request('GET', '/')
        self.log_test_result(
            "Health Check Root",
            result['success'] and result['data'].get('status') == 'healthy',
            f"Status: {result['status_code']}, Response: {result['data']}"
        )
        
        # Test health endpoint
        result = await self.make_request('GET', '/health')
        self.log_test_result(
            "Health Check Endpoint",
            result['success'] and result['data'].get('status') == 'healthy',
            f"Status: {result['status_code']}, Response: {result['data']}"
        )

    async def test_services_api(self):
        """Test Services API endpoints"""
        print("\n=== Testing Services API ===")
        
        # Test GET all services
        result = await self.make_request('GET', '/services/')
        services_exist = result['success'] and isinstance(result['data'], list) and len(result['data']) > 0
        self.log_test_result(
            "Get All Services",
            services_exist,
            f"Status: {result['status_code']}, Found {len(result['data']) if isinstance(result['data'], list) else 0} services"
        )
        
        if services_exist:
            service_id = result['data'][0]['id']
            
            # Test GET single service
            result = await self.make_request('GET', f'/services/{service_id}')
            self.log_test_result(
                "Get Single Service",
                result['success'] and result['data'].get('id') == service_id,
                f"Status: {result['status_code']}, Service ID: {result['data'].get('id', 'N/A')}"
            )
        
        # Test CREATE service
        new_service = {
            "title": "Test Consulting Service",
            "description": "A test service for API validation",
            "icon": "test-icon",
            "features": ["Feature 1", "Feature 2", "Feature 3"],
            "color": "green",
            "pricing": "$500/month",
            "active": True
        }
        
        result = await self.make_request('POST', '/services/', new_service)
        service_created = result['success'] and result['data'].get('title') == new_service['title']
        self.log_test_result(
            "Create Service",
            service_created,
            f"Status: {result['status_code']}, Created: {result['data'].get('title', 'N/A')}"
        )
        
        if service_created:
            created_service_id = result['data']['id']
            self.created_resources['services'].append(created_service_id)
            
            # Test UPDATE service
            updated_service = new_service.copy()
            updated_service['title'] = "Updated Test Service"
            
            result = await self.make_request('PUT', f'/services/{created_service_id}', updated_service)
            self.log_test_result(
                "Update Service",
                result['success'] and result['data'].get('title') == updated_service['title'],
                f"Status: {result['status_code']}, Updated title: {result['data'].get('title', 'N/A')}"
            )
            
            # Test PATCH toggle active
            result = await self.make_request('PATCH', f'/services/{created_service_id}/toggle')
            self.log_test_result(
                "Toggle Service Active",
                result['success'],
                f"Status: {result['status_code']}, Active: {result['data'].get('active', 'N/A')}"
            )

    async def test_testimonials_api(self):
        """Test Testimonials API endpoints"""
        print("\n=== Testing Testimonials API ===")
        
        # Test GET all testimonials
        result = await self.make_request('GET', '/testimonials/')
        testimonials_exist = result['success'] and isinstance(result['data'], list) and len(result['data']) > 0
        self.log_test_result(
            "Get All Testimonials",
            testimonials_exist,
            f"Status: {result['status_code']}, Found {len(result['data']) if isinstance(result['data'], list) else 0} testimonials"
        )
        
        # Test GET featured testimonials
        result = await self.make_request('GET', '/testimonials/', params={'featured_only': True})
        self.log_test_result(
            "Get Featured Testimonials",
            result['success'] and isinstance(result['data'], list),
            f"Status: {result['status_code']}, Featured count: {len(result['data']) if isinstance(result['data'], list) else 0}"
        )
        
        if testimonials_exist:
            # Get testimonial ID from the first call, not the featured call
            all_testimonials_result = await self.make_request('GET', '/testimonials/')
            if all_testimonials_result['success'] and len(all_testimonials_result['data']) > 0:
                testimonial_id = all_testimonials_result['data'][0]['id']
            
            # Test GET single testimonial
            result = await self.make_request('GET', f'/testimonials/{testimonial_id}')
            self.log_test_result(
                "Get Single Testimonial",
                result['success'] and result['data'].get('id') == testimonial_id,
                f"Status: {result['status_code']}, Testimonial ID: {result['data'].get('id', 'N/A')}"
            )
        
        # Test CREATE testimonial
        new_testimonial = {
            "name": "Jane Smith",
            "title": "Marketing Director",
            "company": "Test Company Inc.",
            "content": "Excellent service and outstanding results. Highly recommend NATEAG Enterprises for business consulting.",
            "rating": 5,
            "featured": False
        }
        
        result = await self.make_request('POST', '/testimonials/', new_testimonial)
        testimonial_created = result['success'] and result['data'].get('name') == new_testimonial['name']
        self.log_test_result(
            "Create Testimonial",
            testimonial_created,
            f"Status: {result['status_code']}, Created: {result['data'].get('name', 'N/A')}"
        )
        
        if testimonial_created:
            created_testimonial_id = result['data']['id']
            self.created_resources['testimonials'].append(created_testimonial_id)
            
            # Test UPDATE testimonial
            updated_testimonial = new_testimonial.copy()
            updated_testimonial['content'] = "Updated testimonial content with even better feedback."
            
            result = await self.make_request('PUT', f'/testimonials/{created_testimonial_id}', updated_testimonial)
            self.log_test_result(
                "Update Testimonial",
                result['success'] and "Updated testimonial" in result['data'].get('content', ''),
                f"Status: {result['status_code']}, Updated content length: {len(result['data'].get('content', ''))}"
            )
            
            # Test PATCH toggle featured
            result = await self.make_request('PATCH', f'/testimonials/{created_testimonial_id}/featured')
            self.log_test_result(
                "Toggle Testimonial Featured",
                result['success'],
                f"Status: {result['status_code']}, Featured: {result['data'].get('featured', 'N/A')}"
            )

    async def test_contact_api(self):
        """Test Contact API endpoints"""
        print("\n=== Testing Contact API ===")
        
        # Test CREATE contact submission
        new_contact = {
            "name": "John Doe",
            "email": "john.doe@testcompany.com",
            "phone": "+1-555-123-4567",
            "company": "Test Solutions Ltd",
            "service": "Strategic Business Consulting",
            "message": "I'm interested in learning more about your consulting services for my growing business."
        }
        
        result = await self.make_request('POST', '/contact/', new_contact)
        contact_created = result['success'] and result['data'].get('success') == True
        self.log_test_result(
            "Submit Contact Form",
            contact_created,
            f"Status: {result['status_code']}, Message: {result['data'].get('message', 'N/A')}"
        )
        
        # Test GET all contact submissions (admin)
        result = await self.make_request('GET', '/contact/submissions')
        submissions_exist = result['success'] and isinstance(result['data'], list)
        self.log_test_result(
            "Get Contact Submissions",
            submissions_exist,
            f"Status: {result['status_code']}, Found {len(result['data']) if isinstance(result['data'], list) else 0} submissions"
        )
        
        if submissions_exist and len(result['data']) > 0:
            submission_id = result['data'][0]['id']
            self.created_resources['contact_submissions'].append(submission_id)
            
            # Test GET single submission
            result = await self.make_request('GET', f'/contact/submissions/{submission_id}')
            self.log_test_result(
                "Get Single Contact Submission",
                result['success'] and result['data'].get('id') == submission_id,
                f"Status: {result['status_code']}, Submission ID: {result['data'].get('id', 'N/A')}"
            )
            
            # Test UPDATE submission status
            result = await self.make_request('PATCH', f'/contact/submissions/{submission_id}/status', {'status': 'contacted'})
            self.log_test_result(
                "Update Submission Status",
                result['success'] and result['data'].get('status') == 'contacted',
                f"Status: {result['status_code']}, New status: {result['data'].get('status', 'N/A')}"
            )
        
        # Test GET filtered submissions
        result = await self.make_request('GET', '/contact/submissions', params={'status': 'new'})
        self.log_test_result(
            "Get Filtered Contact Submissions",
            result['success'] and isinstance(result['data'], list),
            f"Status: {result['status_code']}, New submissions: {len(result['data']) if isinstance(result['data'], list) else 0}"
        )

    async def test_newsletter_api(self):
        """Test Newsletter API endpoints"""
        print("\n=== Testing Newsletter API ===")
        
        # Test newsletter subscription
        new_subscription = {
            "name": "Alice Johnson",
            "email": "alice.johnson@example.com",
            "source": "website"
        }
        
        result = await self.make_request('POST', '/newsletter/subscribe', new_subscription)
        subscription_created = result['success'] and result['data'].get('success') == True
        self.log_test_result(
            "Newsletter Subscription",
            subscription_created,
            f"Status: {result['status_code']}, Message: {result['data'].get('message', 'N/A')}"
        )
        
        # Test duplicate subscription
        result = await self.make_request('POST', '/newsletter/subscribe', new_subscription)
        duplicate_handled = result['success'] and "already subscribed" in result['data'].get('message', '').lower()
        self.log_test_result(
            "Duplicate Newsletter Subscription",
            duplicate_handled,
            f"Status: {result['status_code']}, Message: {result['data'].get('message', 'N/A')}"
        )
        
        # Test GET subscribers (admin)
        result = await self.make_request('GET', '/newsletter/subscribers')
        subscribers_exist = result['success'] and isinstance(result['data'], list)
        self.log_test_result(
            "Get Newsletter Subscribers",
            subscribers_exist,
            f"Status: {result['status_code']}, Found {len(result['data']) if isinstance(result['data'], list) else 0} subscribers"
        )
        
        # Test newsletter stats
        result = await self.make_request('GET', '/newsletter/stats')
        stats_available = result['success'] and 'active_subscribers' in result['data']
        self.log_test_result(
            "Get Newsletter Stats",
            stats_available,
            f"Status: {result['status_code']}, Active subscribers: {result['data'].get('active_subscribers', 'N/A')}"
        )
        
        # Test unsubscribe
        result = await self.make_request('DELETE', f'/newsletter/unsubscribe/{new_subscription["email"]}')
        unsubscribe_success = result['success'] and "unsubscribed" in result['data'].get('message', '').lower()
        self.log_test_result(
            "Newsletter Unsubscribe",
            unsubscribe_success,
            f"Status: {result['status_code']}, Message: {result['data'].get('message', 'N/A')}"
        )

    async def test_blog_api(self):
        """Test Blog API endpoints"""
        print("\n=== Testing Blog API ===")
        
        # Test GET all blog posts with pagination
        result = await self.make_request('GET', '/blog/', params={'page': 1, 'per_page': 5})
        blog_posts_exist = result['success'] and 'items' in result['data'] and isinstance(result['data']['items'], list)
        self.log_test_result(
            "Get Blog Posts with Pagination",
            blog_posts_exist,
            f"Status: {result['status_code']}, Found {len(result['data'].get('items', [])) if blog_posts_exist else 0} posts, Total: {result['data'].get('total', 'N/A')}"
        )
        
        if blog_posts_exist and len(result['data']['items']) > 0:
            post_id = result['data']['items'][0]['id']
            post_slug = result['data']['items'][0]['slug']
            
            # Test GET single blog post by ID
            result = await self.make_request('GET', f'/blog/{post_id}')
            self.log_test_result(
                "Get Single Blog Post by ID",
                result['success'] and result['data'].get('id') == post_id,
                f"Status: {result['status_code']}, Post ID: {result['data'].get('id', 'N/A')}"
            )
            
            # Test GET single blog post by slug
            result = await self.make_request('GET', f'/blog/slug/{post_slug}')
            self.log_test_result(
                "Get Single Blog Post by Slug",
                result['success'] and result['data'].get('slug') == post_slug,
                f"Status: {result['status_code']}, Post Slug: {result['data'].get('slug', 'N/A')}"
            )
        
        # Test search functionality
        result = await self.make_request('GET', '/blog/', params={'search': 'business', 'per_page': 3})
        search_works = result['success'] and 'items' in result['data']
        self.log_test_result(
            "Blog Search Functionality",
            search_works,
            f"Status: {result['status_code']}, Search results: {len(result['data'].get('items', [])) if search_works else 0}"
        )
        
        # Test category filtering
        result = await self.make_request('GET', '/blog/', params={'category': 'Strategy', 'per_page': 3})
        category_filter_works = result['success'] and 'items' in result['data']
        self.log_test_result(
            "Blog Category Filtering",
            category_filter_works,
            f"Status: {result['status_code']}, Category results: {len(result['data'].get('items', [])) if category_filter_works else 0}"
        )
        
        # Test GET categories
        result = await self.make_request('GET', '/blog/categories/')
        categories_available = result['success'] and isinstance(result['data'], list) and len(result['data']) > 0
        self.log_test_result(
            "Get Blog Categories",
            categories_available,
            f"Status: {result['status_code']}, Categories: {result['data'] if categories_available else 'N/A'}"
        )
        
        # Test CREATE blog post
        new_blog_post = {
            "title": "Test Blog Post for API Validation",
            "slug": "test-blog-post-api-validation",
            "excerpt": "This is a test blog post created during API testing to validate the blog creation functionality.",
            "content": "This is the full content of the test blog post. It contains detailed information about API testing and validation procedures for the NATEAG Enterprises blog system.",
            "author": "API Test Suite",
            "read_time": "3 min read",
            "category": "Testing",
            "published": True,
            "tags": ["testing", "api", "validation"]
        }
        
        result = await self.make_request('POST', '/blog/', new_blog_post)
        blog_post_created = result['success'] and result['data'].get('title') == new_blog_post['title']
        self.log_test_result(
            "Create Blog Post",
            blog_post_created,
            f"Status: {result['status_code']}, Created: {result['data'].get('title', 'N/A')}"
        )
        
        if blog_post_created:
            created_post_id = result['data']['id']
            self.created_resources['blog_posts'].append(created_post_id)
            
            # Test UPDATE blog post
            updated_blog_post = new_blog_post.copy()
            updated_blog_post['title'] = "Updated Test Blog Post"
            updated_blog_post['content'] = "This is the updated content of the test blog post."
            
            result = await self.make_request('PUT', f'/blog/{created_post_id}', updated_blog_post)
            self.log_test_result(
                "Update Blog Post",
                result['success'] and result['data'].get('title') == updated_blog_post['title'],
                f"Status: {result['status_code']}, Updated title: {result['data'].get('title', 'N/A')}"
            )

    async def test_stats_api(self):
        """Test Statistics API endpoints"""
        print("\n=== Testing Statistics API ===")
        
        # Test GET business stats
        result = await self.make_request('GET', '/stats/')
        stats_available = result['success'] and 'clients_served' in result['data']
        self.log_test_result(
            "Get Business Statistics",
            stats_available,
            f"Status: {result['status_code']}, Clients served: {result['data'].get('clients_served', 'N/A')}"
        )
        
        # Test GET stats summary
        result = await self.make_request('GET', '/stats/summary')
        summary_available = result['success'] and 'business_stats' in result['data'] and 'content_stats' in result['data']
        self.log_test_result(
            "Get Statistics Summary",
            summary_available,
            f"Status: {result['status_code']}, Has business_stats: {'business_stats' in result['data']}, Has content_stats: {'content_stats' in result['data']}"
        )
        
        # Test UPDATE business stats
        updated_stats = {
            "clients_served": 175,
            "years_experience": "3+",
            "success_rate": "97%",
            "countries_reached": 15
        }
        
        result = await self.make_request('PUT', '/stats/', updated_stats)
        stats_updated = result['success'] and result['data'].get('clients_served') == updated_stats['clients_served']
        self.log_test_result(
            "Update Business Statistics",
            stats_updated,
            f"Status: {result['status_code']}, Updated clients: {result['data'].get('clients_served', 'N/A')}"
        )

    async def test_error_handling(self):
        """Test error handling for invalid requests"""
        print("\n=== Testing Error Handling ===")
        
        # Test 404 errors
        result = await self.make_request('GET', '/services/nonexistent-id')
        self.log_test_result(
            "404 Error Handling - Service",
            result['status_code'] == 404,
            f"Status: {result['status_code']}, Response: {result['data']}"
        )
        
        result = await self.make_request('GET', '/blog/nonexistent-id')
        self.log_test_result(
            "404 Error Handling - Blog Post",
            result['status_code'] == 404,
            f"Status: {result['status_code']}, Response: {result['data']}"
        )
        
        result = await self.make_request('GET', '/testimonials/nonexistent-id')
        self.log_test_result(
            "404 Error Handling - Testimonial",
            result['status_code'] == 404,
            f"Status: {result['status_code']}, Response: {result['data']}"
        )
        
        # Test invalid data validation
        invalid_contact = {
            "name": "Test User",
            "email": "invalid-email",  # Invalid email format
            "message": "Test message"
        }
        
        result = await self.make_request('POST', '/contact/', invalid_contact)
        self.log_test_result(
            "Data Validation - Invalid Email",
            result['status_code'] == 422,  # Validation error
            f"Status: {result['status_code']}, Response: {result['data']}"
        )
        
        # Test invalid testimonial rating
        invalid_testimonial = {
            "name": "Test User",
            "title": "Test Title",
            "content": "Test content",
            "rating": 6  # Invalid rating (should be 1-5)
        }
        
        result = await self.make_request('POST', '/testimonials/', invalid_testimonial)
        self.log_test_result(
            "Data Validation - Invalid Rating",
            result['status_code'] == 422,  # Validation error
            f"Status: {result['status_code']}, Response: {result['data']}"
        )

    async def cleanup_test_data(self):
        """Clean up test data created during testing"""
        print("\n=== Cleaning Up Test Data ===")
        
        # Clean up services
        for service_id in self.created_resources['services']:
            result = await self.make_request('DELETE', f'/services/{service_id}')
            self.log_test_result(
                f"Cleanup Service {service_id}",
                result['success'],
                f"Status: {result['status_code']}"
            )
        
        # Clean up testimonials
        for testimonial_id in self.created_resources['testimonials']:
            result = await self.make_request('DELETE', f'/testimonials/{testimonial_id}')
            self.log_test_result(
                f"Cleanup Testimonial {testimonial_id}",
                result['success'],
                f"Status: {result['status_code']}"
            )
        
        # Clean up blog posts
        for post_id in self.created_resources['blog_posts']:
            result = await self.make_request('DELETE', f'/blog/{post_id}')
            self.log_test_result(
                f"Cleanup Blog Post {post_id}",
                result['success'],
                f"Status: {result['status_code']}"
            )
        
        # Clean up contact submissions
        for submission_id in self.created_resources['contact_submissions']:
            result = await self.make_request('DELETE', f'/contact/submissions/{submission_id}')
            self.log_test_result(
                f"Cleanup Contact Submission {submission_id}",
                result['success'],
                f"Status: {result['status_code']}"
            )

    async def run_all_tests(self):
        """Run all backend tests"""
        print("🚀 Starting Comprehensive Backend API Testing for NATEAG Enterprises")
        print(f"Backend URL: {self.base_url}")
        print("=" * 80)
        
        test_functions = [
            ("Health Endpoints", self.test_health_endpoints),
            ("Services API", self.test_services_api),
            ("Testimonials API", self.test_testimonials_api),
            ("Contact API", self.test_contact_api),
            ("Newsletter API", self.test_newsletter_api),
            ("Blog API", self.test_blog_api),
            ("Statistics API", self.test_stats_api),
            ("Error Handling", self.test_error_handling),
            ("Cleanup", self.cleanup_test_data)
        ]
        
        for test_name, test_func in test_functions:
            try:
                await test_func()
            except Exception as e:
                print(f"❌ Error in {test_name}: {str(e)}")
                self.log_test_result(f"{test_name} Execution", False, f"Error: {str(e)}")
        
        # Print summary
        self.print_test_summary()

    def print_test_summary(self):
        """Print comprehensive test summary"""
        print("\n" + "=" * 80)
        print("📊 BACKEND API TEST SUMMARY")
        print("=" * 80)
        
        total_tests = len(self.test_results)
        passed_tests = sum(1 for result in self.test_results.values() if result['success'])
        failed_tests = total_tests - passed_tests
        
        print(f"Total Tests: {total_tests}")
        print(f"✅ Passed: {passed_tests}")
        print(f"❌ Failed: {failed_tests}")
        print(f"Success Rate: {(passed_tests/total_tests*100):.1f}%" if total_tests > 0 else "No tests run")
        
        if failed_tests > 0:
            print(f"\n❌ FAILED TESTS ({failed_tests}):")
            for test_name, result in self.test_results.items():
                if not result['success']:
                    print(f"  • {test_name}: {result['details']}")
        
        print(f"\n✅ PASSED TESTS ({passed_tests}):")
        for test_name, result in self.test_results.items():
            if result['success']:
                print(f"  • {test_name}")
        
        print("\n" + "=" * 80)
        
        # Overall assessment
        if failed_tests == 0:
            print("🎉 ALL BACKEND TESTS PASSED! The API is working correctly.")
        elif failed_tests <= 2:
            print("⚠️  MOSTLY WORKING: Minor issues detected, but core functionality is operational.")
        else:
            print("🚨 SIGNIFICANT ISSUES: Multiple test failures indicate backend problems.")
        
        print("=" * 80)

async def main():
    """Main test execution function"""
    async with BackendTester() as tester:
        await tester.run_all_tests()

if __name__ == "__main__":
    asyncio.run(main())