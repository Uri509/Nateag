import React from "react";
import { Button } from "./ui/button";
import { ArrowRight, Award, Globe, Target } from "lucide-react";
import { Link } from "react-router-dom";

const AboutPreview = () => {
  return (
    <section className="py-20 bg-white overflow-hidden">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="grid lg:grid-cols-2 gap-12 items-center">
          {/* Content */}
          <div className="space-y-8">
            <div className="space-y-4">
              <div className="inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-100 to-blue-100 rounded-full text-sm font-medium text-purple-800">
                <Award className="w-4 h-4 mr-2 text-purple-600" />
                Leadership Excellence
              </div>
              
              <h2 className="text-4xl font-bold text-gray-900">
                Meet{" "}
                <span className="bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent">
                  Gaetan Junior Jean-Francois
                </span>
              </h2>
              
              <p className="text-lg text-gray-600 leading-relaxed">
                A visionary Haitian entrepreneur based in Boston, Gaetan leads NATEAG Enterprises 
                with a mission to drive economic development and empower communities through sustainable 
                business ventures in fisheries, agriculture, and beyond.
              </p>
            </div>

            {/* Key Achievements */}
            <div className="grid grid-cols-2 gap-6">
              <div className="flex items-start space-x-3">
                <div className="w-10 h-10 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg flex items-center justify-center flex-shrink-0">
                  <Target className="w-5 h-5 text-white" />
                </div>
                <div>
                  <p className="font-semibold text-gray-900">2+ Years</p>
                  <p className="text-sm text-gray-600">Hands-on business experience</p>
                </div>
              </div>
              
              <div className="flex items-start space-x-3">
                <div className="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                  <Globe className="w-5 h-5 text-white" />
                </div>
                <div>
                  <p className="font-semibold text-gray-900">International Focus</p>
                  <p className="text-sm text-gray-600">Global market expertise</p>
                </div>
              </div>
            </div>

            {/* Mission Statement */}
            <div className="bg-gradient-to-r from-purple-50 to-blue-50 p-6 rounded-xl border border-purple-100">
              <h3 className="text-lg font-semibold text-gray-900 mb-2">Our Mission</h3>
              <p className="text-gray-700 leading-relaxed">
                "To empower entrepreneurs and communities by providing comprehensive business solutions 
                that drive sustainable growth, economic development, and lasting positive impact 
                in local and international markets."
              </p>
            </div>

            <Link to="/about">
              <Button className="bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 hover:scale-105">
                Learn More About Our Story
                <ArrowRight className="ml-2 w-4 h-4" />
              </Button>
            </Link>
          </div>

          {/* Visual Element */}
          <div className="relative">
            <div className="relative z-10">
              {/* Main Card */}
              <div className="bg-white rounded-2xl shadow-2xl p-8 transform -rotate-2 hover:rotate-0 transition-transform duration-500">
                <div className="text-center space-y-6">
                  <div className="w-24 h-24 bg-gradient-to-r from-purple-600 to-blue-600 rounded-full mx-auto flex items-center justify-center">
                    <span className="text-white text-3xl font-bold">GJF</span>
                  </div>
                  
                  <div>
                    <h3 className="text-2xl font-bold text-gray-900">Gaetan Junior Jean-Francois</h3>
                    <p className="text-purple-600 font-medium">Founder & CEO</p>
                    <p className="text-gray-600 mt-2">Boston, Massachusetts</p>
                  </div>
                  
                  <div className="space-y-3">
                    <div className="flex items-center justify-between text-sm">
                      <span className="text-gray-600">Experience</span>
                      <span className="font-semibold text-gray-900">2+ Years</span>
                    </div>
                    <div className="flex items-center justify-between text-sm">
                      <span className="text-gray-600">Focus Areas</span>
                      <span className="font-semibold text-gray-900">Fisheries, Agriculture</span>
                    </div>
                    <div className="flex items-center justify-between text-sm">
                      <span className="text-gray-600">Mission</span>
                      <span className="font-semibold text-gray-900">Community Empowerment</span>
                    </div>
                  </div>
                </div>
              </div>
              
              {/* Floating Elements */}
              <div className="absolute -top-6 -right-6 w-12 h-12 bg-gradient-to-r from-yellow-400 to-orange-400 rounded-full opacity-80 animate-bounce"></div>
              <div className="absolute -bottom-4 -left-4 w-8 h-8 bg-gradient-to-r from-green-400 to-teal-400 rounded-full opacity-60 animate-pulse"></div>
            </div>
            
            {/* Background decorative elements */}
            <div className="absolute top-10 right-10 w-32 h-32 bg-gradient-to-r from-purple-200 to-blue-200 rounded-full opacity-20 blur-xl"></div>
            <div className="absolute bottom-10 left-10 w-24 h-24 bg-gradient-to-r from-blue-200 to-purple-200 rounded-full opacity-20 blur-xl"></div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default AboutPreview;