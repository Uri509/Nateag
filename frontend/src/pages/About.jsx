import React from "react";
import { Button } from "../components/ui/button";
import { Card, CardContent } from "../components/ui/card";
import { Award, Globe, Target, Users, TrendingUp, Heart } from "lucide-react";
import { Link } from "react-router-dom";

const About = () => {
  const values = [
    {
      icon: Target,
      title: "Strategic Excellence",
      description: "We deliver precise, data-driven strategies that align with your business goals and market opportunities."
    },
    {
      icon: Heart,
      title: "Community Impact",
      description: "Our commitment extends beyond profit to creating positive economic development in communities worldwide."
    },
    {
      icon: Globe,
      title: "Global Perspective",
      description: "With international market expertise, we help businesses compete confidently on a global scale."
    },
    {
      icon: Users,
      title: "Partnership Approach",
      description: "We work as your trusted partner, providing hands-on support throughout your business journey."
    }
  ];

  return (
    <div className="min-h-screen pt-20">
      {/* Hero Section */}
      <section className="py-20 bg-gradient-to-br from-purple-50 via-white to-blue-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-16">
            <div className="inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-100 to-blue-100 rounded-full text-sm font-medium text-purple-800 mb-6">
              <Award className="w-4 h-4 mr-2 text-purple-600" />
              About NATEAG Enterprises
            </div>
            
            <h1 className="text-4xl md:text-6xl font-bold text-gray-900 mb-6">
              Empowering Entrepreneurs,{" "}
              <span className="bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent">
                Building Communities
              </span>
            </h1>
            
            <p className="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
              NATEAG Enterprises provides comprehensive consulting, marketing, and logistics services 
              designed to support both new and established entrepreneurs in today's evolving business landscape.
            </p>
          </div>
        </div>
      </section>

      {/* Leadership Section */}
      <section className="py-20 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid lg:grid-cols-2 gap-16 items-center">
            {/* Content */}
            <div className="space-y-8">
              <div className="space-y-4">
                <h2 className="text-4xl font-bold text-gray-900">
                  Meet Our{" "}
                  <span className="bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent">
                    Visionary Leader
                  </span>
                </h2>
                
                <h3 className="text-2xl font-semibold text-purple-600">
                  Gaetan Junior Jean-Francois
                </h3>
                
                <p className="text-lg text-gray-600 leading-relaxed">
                  A passionate Haitian entrepreneur based in Boston, Gaetan leads NATEAG Enterprises 
                  with a clear mission: to drive economic development and empower communities through 
                  sustainable business ventures in fisheries, agriculture, and beyond.
                </p>
              </div>

              <div className="space-y-6">
                <div className="grid grid-cols-2 gap-6">
                  <div className="text-center p-4 bg-purple-50 rounded-xl">
                    <div className="text-3xl font-bold text-purple-600 mb-2">2+</div>
                    <div className="text-sm text-gray-600">Years Experience</div>
                  </div>
                  
                  <div className="text-center p-4 bg-blue-50 rounded-xl">
                    <div className="text-3xl font-bold text-blue-600 mb-2">150+</div>
                    <div className="text-sm text-gray-600">Clients Served</div>
                  </div>
                </div>

                <div className="bg-gradient-to-r from-purple-50 to-blue-50 p-6 rounded-xl border border-purple-100">
                  <h4 className="text-lg font-semibold text-gray-900 mb-3">Leadership Philosophy</h4>
                  <p className="text-gray-700 leading-relaxed italic">
                    "Success in business isn't just about profit margins—it's about creating lasting value 
                    for communities, empowering entrepreneurs to realize their potential, and building 
                    sustainable ventures that make a positive impact on the world."
                  </p>
                  <div className="mt-4 text-right">
                    <span className="text-purple-600 font-medium">— Gaetan Junior Jean-Francois</span>
                  </div>
                </div>
              </div>
            </div>

            {/* Visual Element */}
            <div className="relative">
              <div className="relative z-10">
                <Card className="bg-white shadow-2xl border-0 p-8 transform rotate-2 hover:rotate-0 transition-transform duration-500">
                  <CardContent className="text-center space-y-6 p-0">
                    <div className="w-32 h-32 bg-gradient-to-r from-purple-600 to-blue-600 rounded-full mx-auto flex items-center justify-center">
                      <span className="text-white text-4xl font-bold">GJF</span>
                    </div>
                    
                    <div>
                      <h3 className="text-2xl font-bold text-gray-900">Gaetan Junior Jean-Francois</h3>
                      <p className="text-purple-600 font-medium text-lg">Founder & CEO</p>
                      <p className="text-gray-600">Boston, Massachusetts</p>
                    </div>
                    
                    <div className="grid grid-cols-2 gap-4 text-sm">
                      <div>
                        <div className="font-semibold text-gray-900">Heritage</div>
                        <div className="text-gray-600">Haitian-American</div>
                      </div>
                      <div>
                        <div className="font-semibold text-gray-900">Focus</div>
                        <div className="text-gray-600">Sustainable Ventures</div>
                      </div>
                      <div>
                        <div className="font-semibold text-gray-900">Expertise</div>
                        <div className="text-gray-600">Business Strategy</div>
                      </div>
                      <div>
                        <div className="font-semibold text-gray-900">Mission</div>
                        <div className="text-gray-600">Community Empowerment</div>
                      </div>
                    </div>
                  </CardContent>
                </Card>
                
                {/* Floating elements */}
                <div className="absolute -top-6 -right-6 w-16 h-16 bg-gradient-to-r from-yellow-400 to-orange-400 rounded-full opacity-80 animate-bounce"></div>
                <div className="absolute -bottom-4 -left-4 w-12 h-12 bg-gradient-to-r from-green-400 to-teal-400 rounded-full opacity-60 animate-pulse"></div>
              </div>
              
              {/* Background decorative elements */}
              <div className="absolute top-16 right-16 w-40 h-40 bg-gradient-to-r from-purple-200 to-blue-200 rounded-full opacity-20 blur-2xl"></div>
              <div className="absolute bottom-16 left-16 w-32 h-32 bg-gradient-to-r from-blue-200 to-purple-200 rounded-full opacity-20 blur-2xl"></div>
            </div>
          </div>
        </div>
      </section>

      {/* Values Section */}
      <section className="py-20 bg-gray-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-16">
            <h2 className="text-4xl font-bold text-gray-900 mb-4">
              Our Core Values
            </h2>
            <p className="text-xl text-gray-600 max-w-3xl mx-auto">
              These principles guide everything we do and shape how we serve our clients and communities
            </p>
          </div>

          <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            {values.map((value, index) => {
              const IconComponent = value.icon;
              return (
                <Card key={index} className="group hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border-0 shadow-lg">
                  <CardContent className="p-6 text-center space-y-4">
                    <div className="w-16 h-16 bg-gradient-to-r from-purple-500 to-blue-500 rounded-xl flex items-center justify-center mx-auto group-hover:scale-110 transition-transform duration-300">
                      <IconComponent className="w-8 h-8 text-white" />
                    </div>
                    
                    <h3 className="text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors duration-300">
                      {value.title}
                    </h3>
                    
                    <p className="text-gray-600 leading-relaxed">
                      {value.description}
                    </p>
                  </CardContent>
                </Card>
              );
            })}
          </div>
        </div>
      </section>

      {/* Mission & Vision */}
      <section className="py-20 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid lg:grid-cols-2 gap-16">
            <div className="space-y-8">
              <div className="space-y-4">
                <div className="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center">
                  <Target className="w-8 h-8 text-white" />
                </div>
                
                <h2 className="text-3xl font-bold text-gray-900">Our Mission</h2>
                
                <p className="text-lg text-gray-600 leading-relaxed">
                  To empower entrepreneurs and communities by providing comprehensive business solutions 
                  that drive sustainable growth, economic development, and lasting positive impact 
                  in local and international markets.
                </p>
              </div>
              
              <div className="space-y-3">
                <div className="flex items-center space-x-3">
                  <div className="w-2 h-2 bg-gradient-to-r from-purple-400 to-blue-400 rounded-full"></div>
                  <span className="text-gray-700">Strategic business consulting and planning</span>
                </div>
                <div className="flex items-center space-x-3">
                  <div className="w-2 h-2 bg-gradient-to-r from-purple-400 to-blue-400 rounded-full"></div>
                  <span className="text-gray-700">Innovative marketing and brand development</span>
                </div>
                <div className="flex items-center space-x-3">
                  <div className="w-2 h-2 bg-gradient-to-r from-purple-400 to-blue-400 rounded-full"></div>
                  <span className="text-gray-700">Efficient logistics and supply chain solutions</span>
                </div>
              </div>
            </div>

            <div className="space-y-8">
              <div className="space-y-4">
                <div className="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                  <TrendingUp className="w-8 h-8 text-white" />
                </div>
                
                <h2 className="text-3xl font-bold text-gray-900">Our Vision</h2>
                
                <p className="text-lg text-gray-600 leading-relaxed">
                  To become the leading catalyst for entrepreneurial success and community development, 
                  creating a world where sustainable business practices drive economic growth and 
                  social impact across all markets we serve.
                </p>
              </div>
              
              <div className="space-y-3">
                <div className="flex items-center space-x-3">
                  <div className="w-2 h-2 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full"></div>
                  <span className="text-gray-700">Global market leadership in business consulting</span>
                </div>
                <div className="flex items-center space-x-3">
                  <div className="w-2 h-2 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full"></div>
                  <span className="text-gray-700">Sustainable community development initiatives</span>
                </div>
                <div className="flex items-center space-x-3">
                  <div className="w-2 h-2 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full"></div>
                  <span className="text-gray-700">Innovative solutions for evolving business needs</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* CTA Section */}
      <section className="py-20 bg-gradient-to-br from-purple-600 via-purple-700 to-blue-600">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <div className="space-y-8">
            <h2 className="text-4xl md:text-5xl font-bold text-white">
              Ready to Transform Your Business?
            </h2>
            
            <p className="text-xl text-purple-100 max-w-2xl mx-auto">
              Join successful entrepreneurs who have partnered with NATEAG Enterprises 
              to achieve sustainable growth and lasting success.
            </p>
            
            <div className="flex flex-col sm:flex-row gap-4 justify-center">
              <Link to="/services">
                <Button className="w-full sm:w-auto bg-white text-purple-600 hover:bg-gray-50 px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 hover:scale-105 shadow-lg">
                  Explore Our Services
                </Button>
              </Link>
              
              <Link to="/contact">
                <Button variant="outline" className="w-full sm:w-auto border-2 border-white text-white hover:bg-white hover:text-purple-600 px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 hover:scale-105">
                  Get in Touch
                </Button>
              </Link>
            </div>
          </div>
        </div>
      </section>
    </div>
  );
};

export default About;