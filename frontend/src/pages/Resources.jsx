import React from "react";
import { Card, CardContent, CardHeader, CardTitle } from "../components/ui/card";
import { Button } from "../components/ui/button";
import { Download, FileText, ExternalLink, BookOpen, Users, TrendingUp } from "lucide-react";
import { mockData } from "../data/mockData";

const Resources = () => {
  const resourceCategories = [
    {
      title: "Business Strategy",
      description: "Essential tools and frameworks for strategic planning and execution",
      icon: TrendingUp,
      color: "purple",
      count: 12
    },
    {
      title: "Marketing & Branding",
      description: "Templates and guides for effective marketing campaigns and brand development",
      icon: Users,
      color: "blue",
      count: 8
    },
    {
      title: "Operations & Logistics",
      description: "Optimization tools and checklists for streamlined business operations",
      icon: BookOpen,
      color: "indigo",
      count: 6
    }
  ];

  return (
    <div className="min-h-screen pt-20">
      {/* Hero Section */}
      <section className="py-20 bg-gradient-to-br from-purple-50 via-white to-blue-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <div className="space-y-6">
            <h1 className="text-4xl md:text-6xl font-bold text-gray-900">
              Business{" "}
              <span className="bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent">
                Resources
              </span>{" "}
              Hub
            </h1>
            
            <p className="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
              Access our collection of proven templates, guides, and tools designed to help entrepreneurs 
              build successful, sustainable businesses.
            </p>
            
            <div className="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-100 to-blue-100 rounded-full text-purple-800 font-medium">
              <Download className="w-5 h-5 mr-2" />
              All resources are completely free to download
            </div>
          </div>
        </div>
      </section>

      {/* Resource Categories */}
      <section className="py-20 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-16">
            <h2 className="text-4xl font-bold text-gray-900 mb-4">
              Resource Categories
            </h2>
            <p className="text-xl text-gray-600 max-w-3xl mx-auto">
              Explore our comprehensive collection of business resources organized by category
            </p>
          </div>

          <div className="grid md:grid-cols-3 gap-8 mb-16">
            {resourceCategories.map((category, index) => {
              const IconComponent = category.icon;
              const colorMap = {
                purple: "from-purple-500 to-purple-600",
                blue: "from-blue-500 to-blue-600",
                indigo: "from-indigo-500 to-indigo-600"
              };
              
              return (
                <Card key={index} className="group hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border-0 shadow-lg">
                  <CardHeader className="text-center pb-4">
                    <div className={`w-16 h-16 bg-gradient-to-r ${colorMap[category.color]} rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300`}>
                      <IconComponent className="w-8 h-8 text-white" />
                    </div>
                    <CardTitle className="text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors duration-300">
                      {category.title}
                    </CardTitle>
                    <div className="text-sm text-purple-600 font-medium">
                      {category.count} Resources Available
                    </div>
                  </CardHeader>
                  <CardContent className="text-center">
                    <p className="text-gray-600 leading-relaxed mb-6">
                      {category.description}
                    </p>
                    <Button variant="outline" className="w-full border-purple-200 text-purple-600 hover:bg-purple-50 hover:border-purple-400 transition-all duration-300">
                      Explore Resources
                      <ExternalLink className="ml-2 w-4 h-4" />
                    </Button>
                  </CardContent>
                </Card>
              );
            })}
          </div>
        </div>
      </section>

      {/* Featured Resources */}
      <section className="py-20 bg-gray-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-16">
            <h2 className="text-4xl font-bold text-gray-900 mb-4">
              Featured Resources
            </h2>
            <p className="text-xl text-gray-600 max-w-3xl mx-auto">
              Our most popular and highly-rated business resources, ready for immediate download
            </p>
          </div>

          <div className="grid md:grid-cols-2 gap-8">
            {mockData.resources.map((resource, index) => (
              <Card key={resource.id} className="group hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border-0 shadow-lg bg-white">
                <CardContent className="p-8">
                  <div className="flex items-start space-x-4">
                    <div className="w-16 h-16 bg-gradient-to-r from-purple-500 to-blue-500 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                      <FileText className="w-8 h-8 text-white" />
                    </div>
                    
                    <div className="flex-1 space-y-4">
                      <div>
                        <h3 className="text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors duration-300 mb-2">
                          {resource.title}
                        </h3>
                        <div className="inline-flex items-center px-3 py-1 bg-purple-100 text-purple-800 text-sm font-medium rounded-full mb-3">
                          {resource.type}
                        </div>
                        <p className="text-gray-600 leading-relaxed">
                          {resource.description}
                        </p>
                      </div>
                      
                      <div className="flex items-center justify-between">
                        <div className="flex items-center text-sm text-gray-500">
                          <Download className="w-4 h-4 mr-1" />
                          Free Download
                        </div>
                        
                        <Button className="bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white px-6 py-2 rounded-full font-semibold transition-all duration-300 hover:scale-105">
                          Download Now
                          <Download className="ml-2 w-4 h-4" />
                        </Button>
                      </div>
                    </div>
                  </div>
                </CardContent>
              </Card>
            ))}
          </div>

          <div className="text-center mt-12">
            <Button className="bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 hover:scale-105 shadow-lg">
              View All Resources
              <ExternalLink className="ml-2 w-5 h-5" />
            </Button>
          </div>
        </div>
      </section>

      {/* Resource Request */}
      <section className="py-20 bg-white">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
          <Card className="border-0 shadow-2xl bg-gradient-to-br from-purple-50 to-blue-50">
            <CardContent className="p-12 text-center">
              <div className="space-y-6">
                <div className="w-16 h-16 bg-gradient-to-r from-purple-600 to-blue-600 rounded-full flex items-center justify-center mx-auto">
                  <Users className="w-8 h-8 text-white" />
                </div>
                
                <h2 className="text-3xl font-bold text-gray-900">
                  Need a Specific Resource?
                </h2>
                
                <p className="text-lg text-gray-600 max-w-2xl mx-auto">
                  Can't find what you're looking for? Let us know what business resource would be helpful, 
                  and we'll consider creating it for our community.
                </p>
                
                <Button className="bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 hover:scale-105 shadow-lg">
                  Request a Resource
                  <ExternalLink className="ml-2 w-5 h-5" />
                </Button>
              </div>
            </CardContent>
          </Card>
        </div>
      </section>

      {/* Newsletter CTA */}
      <section className="py-20 bg-gradient-to-br from-purple-600 via-purple-700 to-blue-600">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <div className="space-y-8">
            <h2 className="text-4xl md:text-5xl font-bold text-white">
              Get New Resources First
            </h2>
            
            <p className="text-xl text-purple-100 max-w-2xl mx-auto">
              Subscribe to our newsletter and be the first to access new business resources, 
              templates, and exclusive content.
            </p>
            
            <Button className="bg-white text-purple-600 hover:bg-gray-50 px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 hover:scale-105 shadow-lg">
              Subscribe for Updates
              <Download className="ml-2 w-5 h-5" />
            </Button>
          </div>
        </div>
      </section>
    </div>
  );
};

export default Resources;