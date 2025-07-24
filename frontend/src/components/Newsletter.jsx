import React, { useState } from "react";
import { Button } from "./ui/button";
import { Input } from "./ui/input";
import { Mail, CheckCircle } from "lucide-react";
import apiService from "../services/api";

const Newsletter = () => {
  const [email, setEmail] = useState("");
  const [name, setName] = useState("");
  const [isSubmitting, setIsSubmitting] = useState(false);

  const handleSubmit = async (e) => {
    e.preventDefault();
    if (!email || !name) {
      alert("Please fill in both name and email fields.");
      return;
    }

    setIsSubmitting(true);
    
    try {
      const response = await apiService.subscribeToNewsletter({
        name,
        email,
        source: "website"
      });
      
      alert(response.message || "Successfully subscribed! Thank you for subscribing to our newsletter.");
      setEmail("");
      setName("");
    } catch (error) {
      console.error('Newsletter subscription error:', error);
      alert("There was an error subscribing to the newsletter. Please try again.");
    } finally {
      setIsSubmitting(false);
    }
  };

  return (
    <section className="py-20 bg-gradient-to-br from-purple-600 via-purple-700 to-blue-600 relative overflow-hidden">
      {/* Background Animation */}
      <div className="absolute inset-0 overflow-hidden">
        <div className="absolute -top-40 -right-40 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>
        <div className="absolute -bottom-40 -left-40 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>
      </div>

      <div className="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div className="space-y-8">
          {/* Header */}
          <div className="space-y-4">
            <div className="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6">
              <Mail className="w-8 h-8 text-white" />
            </div>
            
            <h2 className="text-4xl md:text-5xl font-bold text-white">
              Stay Ahead in Business
            </h2>
            
            <p className="text-xl text-purple-100 max-w-2xl mx-auto">
              Get exclusive business insights, strategic tips, and industry trends 
              delivered directly to your inbox. Join successful entrepreneurs who trust our expertise.
            </p>
          </div>

          {/* Benefits */}
          <div className="grid md:grid-cols-3 gap-6 mb-8">
            <div className="flex items-center justify-center space-x-3 text-white">
              <CheckCircle className="w-5 h-5 text-green-300" />
              <span>Weekly Business Tips</span>
            </div>
            <div className="flex items-center justify-center space-x-3 text-white">
              <CheckCircle className="w-5 h-5 text-green-300" />
              <span>Industry Insights</span>
            </div>
            <div className="flex items-center justify-center space-x-3 text-white">
              <CheckCircle className="w-5 h-5 text-green-300" />
              <span>Exclusive Resources</span>
            </div>
          </div>

          {/* Form */}
          <form onSubmit={handleSubmit} className="max-w-md mx-auto space-y-4">
            <div className="space-y-3">
              <Input
                type="text"
                placeholder="Your Name"
                value={name}
                onChange={(e) => setName(e.target.value)}
                className="bg-white/90 border-0 text-gray-900 placeholder-gray-500 h-12 text-lg focus:bg-white transition-all duration-300"
                disabled={isSubmitting}
              />
              
              <Input
                type="email"
                placeholder="Your Email Address"
                value={email}
                onChange={(e) => setEmail(e.target.value)}
                className="bg-white/90 border-0 text-gray-900 placeholder-gray-500 h-12 text-lg focus:bg-white transition-all duration-300"
                disabled={isSubmitting}
              />
            </div>
            
            <Button
              type="submit"
              disabled={isSubmitting}
              className="w-full bg-white text-purple-600 hover:bg-gray-50 h-12 text-lg font-semibold rounded-full transition-all duration-300 hover:scale-105 shadow-lg disabled:opacity-50 disabled:cursor-not-allowed"
            >
              {isSubmitting ? (
                <div className="flex items-center">
                  <div className="w-5 h-5 border-2 border-purple-600 border-t-transparent rounded-full animate-spin mr-2"></div>
                  Subscribing...
                </div>
              ) : (
                "Subscribe to Newsletter"
              )}
            </Button>
          </form>

          {/* Trust Indicators */}
          <div className="flex items-center justify-center space-x-8 text-purple-200 text-sm">
            <div className="flex items-center">
              <CheckCircle className="w-4 h-4 mr-2" />
              No spam, ever
            </div>
            <div className="flex items-center">
              <CheckCircle className="w-4 h-4 mr-2" />
              Unsubscribe anytime
            </div>
            <div className="flex items-center">
              <CheckCircle className="w-4 h-4 mr-2" />
              150+ subscribers
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default Newsletter;