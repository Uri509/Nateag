from motor.motor_asyncio import AsyncIOMotorClient
import os
from dotenv import load_dotenv

# Load environment variables
load_dotenv()

# MongoDB connection
mongo_url = os.environ['MONGO_URL']
client = AsyncIOMotorClient(mongo_url)
db = client[os.environ['DB_NAME']]

# Database collections
blog_collection = db.blog_posts
testimonials_collection = db.testimonials
contacts_collection = db.contact_submissions
newsletter_collection = db.newsletter_subscriptions
resources_collection = db.resources
services_collection = db.services
stats_collection = db.business_stats

async def init_database():
    """Initialize database with sample data if collections are empty"""
    
    # Initialize services
    if await services_collection.count_documents({}) == 0:
        sample_services = [
            {
                "id": "service-1",
                "title": "Strategic Business Consulting",
                "description": "Build effective business strategies, streamline operations, and achieve sustainable growth with our expert consulting services.",
                "icon": "consulting",
                "features": [
                    "Business Strategy Development",
                    "Operational Optimization", 
                    "Growth Planning",
                    "Market Analysis",
                    "Financial Planning"
                ],
                "color": "purple",
                "active": True
            },
            {
                "id": "service-2", 
                "title": "Marketing Solutions",
                "description": "Boost brand visibility, attract target audiences, and enhance customer engagement with tailored marketing strategies.",
                "icon": "marketing",
                "features": [
                    "Brand Development",
                    "Digital Marketing",
                    "Social Media Strategy", 
                    "Content Marketing",
                    "Campaign Management"
                ],
                "color": "blue",
                "active": True
            },
            {
                "id": "service-3",
                "title": "Logistics Services", 
                "description": "Optimize supply chain management, ensuring efficient product movement and cost-effective delivery solutions.",
                "icon": "logistics",
                "features": [
                    "Supply Chain Optimization",
                    "Inventory Management",
                    "Distribution Planning",
                    "Cost Reduction Strategies", 
                    "International Shipping"
                ],
                "color": "indigo",
                "active": True
            }
        ]
        await services_collection.insert_many(sample_services)
    
    # Initialize testimonials
    if await testimonials_collection.count_documents({}) == 0:
        sample_testimonials = [
            {
                "id": "testimonial-1",
                "name": "Sarah Johnson",
                "title": "CEO",
                "company": "TechStart Solutions", 
                "content": "NATEAG Enterprises transformed our business operations completely. Their strategic consulting helped us increase revenue by 150% in just 8 months.",
                "rating": 5,
                "featured": True
            },
            {
                "id": "testimonial-2",
                "name": "Michael Chen",
                "title": "Founder",
                "company": "GreenEarth Products",
                "content": "The logistics solutions provided by NATEAG reduced our shipping costs by 30% while improving delivery times. Exceptional service!",
                "rating": 5,
                "featured": True
            },
            {
                "id": "testimonial-3",
                "name": "Emily Rodriguez", 
                "title": "Director",
                "company": "Urban Fashion Co.",
                "content": "Their marketing expertise doubled our online presence and customer engagement. The team truly understands modern business challenges.",
                "rating": 5,
                "featured": True
            }
        ]
        await testimonials_collection.insert_many(sample_testimonials)
    
    # Initialize blog posts
    if await blog_collection.count_documents({}) == 0:
        sample_posts = [
            {
                "id": "post-1",
                "title": "Building Sustainable Business Strategies for Long-term Success",
                "slug": "building-sustainable-business-strategies",
                "excerpt": "Learn how to develop business strategies that not only drive immediate growth but also ensure long-term sustainability and market resilience.",
                "content": "Building sustainable business strategies requires a comprehensive approach that balances immediate needs with long-term vision...",
                "author": "Gaetan Junior Jean-Francois",
                "read_time": "8 min read",
                "category": "Strategy",
                "published": True,
                "tags": ["strategy", "sustainability", "growth"]
            },
            {
                "id": "post-2", 
                "title": "The Future of Supply Chain Management in Global Markets",
                "slug": "future-supply-chain-management",
                "excerpt": "Explore emerging trends in logistics and supply chain optimization that are reshaping how businesses operate in international markets.",
                "content": "The landscape of supply chain management is rapidly evolving with new technologies and global challenges...",
                "author": "NATEAG Team",
                "read_time": "6 min read", 
                "category": "Logistics",
                "published": True,
                "tags": ["logistics", "supply-chain", "global-markets"]
            },
            {
                "id": "post-3",
                "title": "Digital Marketing Strategies That Actually Convert", 
                "slug": "digital-marketing-strategies-convert",
                "excerpt": "Discover proven digital marketing techniques that help businesses attract their ideal customers and boost conversion rates effectively.",
                "content": "In today's digital landscape, effective marketing strategies are crucial for business success...",
                "author": "Marketing Team",
                "read_time": "7 min read",
                "category": "Marketing", 
                "published": True,
                "tags": ["marketing", "digital", "conversion"]
            }
        ]
        await blog_collection.insert_many(sample_posts)
    
    # Initialize business stats
    if await stats_collection.count_documents({}) == 0:
        sample_stats = {
            "id": "stats-1",
            "clients_served": 150,
            "years_experience": "2+",
            "success_rate": "95%", 
            "countries_reached": 12
        }
        await stats_collection.insert_one(sample_stats)
    
    print("✅ Database initialized with sample data")