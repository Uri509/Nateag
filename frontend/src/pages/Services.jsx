import React from "react";
import { Card, CardContent, CardHeader, CardTitle } from "../components/ui/card";
import { Button } from "../components/ui/button";
import { Users, TrendingUp, Truck, CheckCircle, ArrowRight } from "lucide-react";
import { Link } from "react-router-dom";
import { mockData } from "../data/mockData";

const Services = () => {
  const iconMap = {
    consulting: Users,
    marketing: TrendingUp,
    logistics: Truck
  };

  const colorMap = {
    purple: {
      gradient: "from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700",
      bg: "purple-50",
      border: "purple-100",
      text: "purple-600"
    },
    blue: {
      gradient: "from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700",
      bg: "blue-50",
      border: "blue-100", 
      text: "blue-600"
    },
    indigo: {
      gradient: "from-indigo-500 to-indigo-600 hover:from-indigo-600 hover:to-indigo-700",
      bg: "indigo-50",
      border: "indigo-100",
      text: "indigo-600"
    }
  };

  return (
    <div className="min-h-screen pt-20">
      {/* Hero Section */}
      <section className="py-20 bg-gradient-to-br from-purple-50 via-white to-blue-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <div className="space-y-6">
            <div className="inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-100 to-blue-100 rounded-full text-sm font-medium text-purple-800">
              <CheckCircle className="w-4 h-4 mr-2 text-purple-600" />
              Comprehensive Business Solutions
            </div>
            
            <h1 className="text-4xl md:text-6xl font-bold text-gray-900">
              Services That{" "}
              <span className="bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent">
                Transform
              </span>{" "}
              Businesses
            </h1>
            
            <p className="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
              With 2+ years of hands-on experience, NATEAG Enterprises empowers clients to modernize and flourish, 
              enabling them to compete confidently in national and international markets.
            </p>
          </div>
        </div>
      </section>

      {/* Services Grid */}
      <section className="py-20 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="space-y-16">
            {mockData.services.map((service, index) => {
              const IconComponent = iconMap[service.icon];
              const colors = colorMap[service.color];
              const isEven = index % 2 === 0;
              
              return (
                <div
                  key={service.id}
                  className={`grid lg:grid-cols-2 gap-12 lg:gap-16 items-center ${
                    !isEven ? "lg:grid-flow-col-dense" : ""
                  }`}
                >
                  {/* Content */}
                  <div className={`space-y-8 ${!isEven ? "lg:col-start-2" : ""}`}>
                    <div className="space-y-4">
                      <div className={`w-16 h-16 bg-gradient-to-r ${colors.gradient} rounded-xl flex items-center justify-center`}>
                        <IconComponent className="w-8 h-8 text-white" />
                      </div>
                      
                      <h2 className="text-3xl md:text-4xl font-bold text-gray-900">
                        {service.title}
                      </h2>
                      
                      <p className="text-lg text-gray-600 leading-relaxed">
                        {service.description}
                      </p>
                    </div>

                    {/* Features List */}
                    <div className="space-y-4">
                      <h3 className="text-xl font-semibold text-gray-900">What's Included:</h3>
                      <div className="grid grid-cols-1 gap-3">
                        {service.features.map((feature, featureIndex) => (
                          <div key={featureIndex} className="flex items-center space-x-3">
                            <div className={`w-6 h-6 bg-gradient-to-r ${colors.gradient} rounded-full flex items-center justify-center flex-shrink-0`}>
                              <CheckCircle className="w-4 h-4 text-white" />
                            </div>
                            <span className="text-gray-700 font-medium">{feature}</span>
                          </div>
                        ))}
                      </div>
                    </div>

                    <div className="flex flex-col sm:flex-row gap-4">
                      <Link to="/contact">
                        <Button className={`bg-gradient-to-r ${colors.gradient} text-white px-8 py-3 rounded-full font-semibold transition-all duration-300 hover:scale-105 shadow-lg`}>
                          Get Started
                          <ArrowRight className="ml-2 w-4 h-4" />
                        </Button>
                      </Link>
                      
                      <Button variant="outline" className={`border-2 border-${colors.text} text-${colors.text} hover:bg-${colors.bg} px-8 py-3 rounded-full font-semibold transition-all duration-300`}>
                        Learn More
                      </Button>
                    </div>
                  </div>

                  {/* Visual Card */}
                  <div className={`relative ${!isEven ? "lg:col-start-1 lg:row-start-1" : ""}`}>
                    <Card className={`border-0 shadow-2xl bg-gradient-to-br from-${colors.bg} to-white group hover:shadow-3xl transition-all duration-500 hover:-translate-y-2`}>
                      <CardContent className="p-8 md:p-12">
                        <div className="space-y-6">
                          <div className="text-center">
                            <div className={`w-20 h-20 bg-gradient-to-r ${colors.gradient} rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300`}>
                              <IconComponent className="w-10 h-10 text-white" />
                            </div>
                            
                            <h3 className="text-2xl font-bold text-gray-900 mb-4">
                              {service.title}
                            </h3>
                          </div>
                          
                          <div className="space-y-4">
                            {service.features.slice(0, 4).map((feature, featureIndex) => (
                              <div key={featureIndex} className="flex items-center space-x-3">
                                <div className={`w-5 h-5 bg-gradient-to-r ${colors.gradient} rounded-full flex items-center justify-center flex-shrink-0`}>
                                  <CheckCircle className="w-3 h-3 text-white" />
                                </div>
                                <span className="text-gray-700 text-sm font-medium">{feature}</span>
                              </div>
                            ))}
                          </div>
                          
                          <div className={`bg-gradient-to-r from-${colors.bg} to-white p-4 rounded-xl border border-${colors.border}`}>
                            <div className="text-center">
                              <div className={`text-2xl font-bold text-${colors.text} mb-1`}>Expert Solution</div>
                              <div className="text-sm text-gray-600">Tailored to your business needs</div>
                            </div>
                          </div>
                        </div>
                      </CardContent>
                    </Card>
                    
                    {/* Floating decorative elements */}
                    <div className={`absolute -top-4 -right-4 w-8 h-8 bg-gradient-to-r ${colors.gradient} rounded-full opacity-20 animate-bounce`}></div>
                    <div className={`absolute -bottom-4 -left-4 w-6 h-6 bg-gradient-to-r ${colors.gradient} rounded-full opacity-40 animate-pulse`}></div>
                  </div>
                </div>
              );
            })}
          </div>
        </div>
      </section>

      {/* Process Section */}
      <section className="py-20 bg-gray-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-16">
            <h2 className="text-4xl font-bold text-gray-900 mb-4">
              Our Process
            </h2>
            <p className="text-xl text-gray-600 max-w-3xl mx-auto">
              A proven methodology that ensures successful outcomes for every client engagement
            </p>
          </div>

          <div className="grid md:grid-cols-4 gap-8">
            {[
              { step: "01", title: "Discovery", description: "We analyze your business needs, challenges, and opportunities" },
              { step: "02", title: "Strategy", description: "We develop customized solutions aligned with your goals" },
              { step: "03", title: "Implementation", description: "We execute the plan with precision and ongoing support" },
              { step: "04", title: "Optimization", description: "We monitor results and continuously improve performance" }
            ].map((process, index) => (
              <Card key={index} className="group hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border-0 shadow-lg text-center">
                <CardContent className="p-6 space-y-4">
                  <div className="w-16 h-16 bg-gradient-to-r from-purple-500 to-blue-500 rounded-2xl flex items-center justify-center mx-auto group-hover:scale-110 transition-transform duration-300">
                    <span className="text-white text-xl font-bold">{process.step}</span>
                  </div>
                  
                  <h3 className="text-xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors duration-300">
                    {process.title}
                  </h3>
                  
                  <p className="text-gray-600 leading-relaxed">
                    {process.description}
                  </p>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>
      </section>

      {/* CTA Section */}
      <section className="py-20 bg-gradient-to-br from-purple-600 via-purple-700 to-blue-600">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <div className="space-y-8">
            <h2 className="text-4xl md:text-5xl font-bold text-white">
              Ready to Get Started?
            </h2>
            
            <p className="text-xl text-purple-100 max-w-2xl mx-auto">
              Let's discuss how our comprehensive business solutions can help transform 
              your company and accelerate your growth.
            </p>
            
            <div className="flex flex-col sm:flex-row gap-4 justify-center">
              <Link to="/contact">
                <Button className="w-full sm:w-auto bg-white text-purple-600 hover:bg-gray-50 px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 hover:scale-105 shadow-lg">
                  Schedule Consultation
                  <ArrowRight className="ml-2 w-5 h-5" />
                </Button>
              </Link>
              
              <Button variant="outline" className="w-full sm:w-auto border-2 border-white text-white hover:bg-white hover:text-purple-600 px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 hover:scale-105">
                View Our Work
              </Button>
            </div>
          </div>
        </div>
      </section>
    </div>
  );
};

export default Services;