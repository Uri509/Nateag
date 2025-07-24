import axios from 'axios';

const BACKEND_URL = process.env.REACT_APP_BACKEND_URL;
const API = `${BACKEND_URL}/api`;

// API service class
class ApiService {
  // Services
  async getServices() {
    try {
      const response = await axios.get(`${API}/services/`);
      return response.data;
    } catch (error) {
      console.error('Error fetching services:', error);
      return [];
    }
  }

  async getService(serviceId) {
    try {
      const response = await axios.get(`${API}/services/${serviceId}`);
      return response.data;
    } catch (error) {
      console.error('Error fetching service:', error);
      return null;
    }
  }

  // Testimonials
  async getTestimonials(featuredOnly = true) {
    try {
      const response = await axios.get(`${API}/testimonials/`, {
        params: { featured_only: featuredOnly }
      });
      return response.data;
    } catch (error) {
      console.error('Error fetching testimonials:', error);
      return [];
    }
  }

  // Blog
  async getBlogPosts(page = 1, perPage = 10, category = null, search = null) {
    try {
      const params = { page, per_page: perPage };
      if (category) params.category = category;
      if (search) params.search = search;
      
      const response = await axios.get(`${API}/blog/`, { params });
      return response.data;
    } catch (error) {
      console.error('Error fetching blog posts:', error);
      return { items: [], total: 0, page: 1, per_page: 10 };
    }
  }

  async getBlogPost(postId) {
    try {
      const response = await axios.get(`${API}/blog/${postId}`);
      return response.data;
    } catch (error) {
      console.error('Error fetching blog post:', error);
      return null;
    }
  }

  async getBlogCategories() {
    try {
      const response = await axios.get(`${API}/blog/categories/`);
      return response.data;
    } catch (error) {
      console.error('Error fetching blog categories:', error);
      return [];
    }
  }

  // Contact
  async submitContactForm(formData) {
    try {
      const response = await axios.post(`${API}/contact/`, formData);
      return response.data;
    } catch (error) {
      console.error('Error submitting contact form:', error);
      throw error;
    }
  }

  // Newsletter
  async subscribeToNewsletter(subscriptionData) {
    try {
      const response = await axios.post(`${API}/newsletter/subscribe`, subscriptionData);
      return response.data;
    } catch (error) {
      console.error('Error subscribing to newsletter:', error);
      throw error;
    }
  }

  // Stats
  async getBusinessStats() {
    try {
      const response = await axios.get(`${API}/stats/`);
      return response.data;
    } catch (error) {
      console.error('Error fetching business stats:', error);
      return {
        clients_served: 150,
        years_experience: '2+',
        success_rate: '95%',
        countries_reached: 12
      };
    }
  }

  async getStatsSummary() {
    try {
      const response = await axios.get(`${API}/stats/summary`);
      return response.data;
    } catch (error) {
      console.error('Error fetching stats summary:', error);
      return null;
    }
  }
}

// Create and export a singleton instance
const apiService = new ApiService();
export default apiService;