import React from "react";
import { Link } from "react-router-dom";
import { Button } from "./ui/button";
import { Input } from "./ui/input";
import { Mail, Phone, MapPin, Facebook, Twitter, Linkedin, Instagram, ArrowRight } from "lucide-react";

const Footer = () => {
  const currentYear = new Date().getFullYear();

  const footerLinks = {
    company: [
      { name: "About Us", path: "/about" },
      { name: "Our Services", path: "/services" },
      { name: "Leadership", path: "/about" },
      { name: "Contact", path: "/contact" }
    ],
    services: [
      { name: "Strategic Consulting", path: "/services" },
      { name: "Marketing Solutions", path: "/services" },
      { name: "Logistics Services", path: "/services" },
      { name: "Business Planning", path: "/services" }
    ],
    resources: [
      { name: "Business Blog", path: "/blog" },
      { name: "Free Resources", path: "/resources" },
      { name: "Industry Insights", path: "/blog" },
      { name: "Success Stories", path: "/about" }
    ]
  };

  const contactInfo = [
    { icon: Mail, text: "info@nateagenterprises.com", href: "mailto:info@nateagenterprises.com" },
    { icon: Phone, text: "(207) 417-4844", href: "tel:+12074174844" },
    { icon: MapPin, text: "45 Dan Rd, Canton, MA 02021", href: "#" }
  ];

  const socialLinks = [
    { icon: Facebook, href: "#", label: "Facebook" },
    { icon: Twitter, href: "#", label: "Twitter" },
    { icon: Linkedin, href: "#", label: "LinkedIn" },
    { icon: Instagram, href: "#", label: "Instagram" }
  ];

  return (
    <footer className="bg-gray-900 text-white">
      {/* Main Footer */}
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div className="grid lg:grid-cols-4 gap-8">
          {/* Company Info */}
          <div className="lg:col-span-1 space-y-6">
            <div className="flex items-center space-x-3">
              <div className="w-12 h-12 bg-gradient-to-r from-purple-600 to-blue-600 rounded-lg flex items-center justify-center">
                <span className="text-white font-bold text-xl">N</span>
              </div>
              <div className="flex flex-col">
                <span className="text-xl font-bold bg-gradient-to-r from-purple-400 to-blue-400 bg-clip-text text-transparent">
                  NATEAG
                </span>
                <span className="text-sm text-gray-400">ENTERPRISES</span>
              </div>
            </div>
            
            <p className="text-gray-300 leading-relaxed">
              Empowering entrepreneurs through comprehensive consulting, marketing, 
              and logistics solutions. Building sustainable businesses that make a lasting impact.
            </p>
            
            <div className="space-y-3">
              {contactInfo.map((contact, index) => {
                const IconComponent = contact.icon;
                return (
                  <div key={index} className="flex items-center space-x-3 text-gray-300 hover:text-white transition-colors duration-300">
                    <IconComponent className="w-5 h-5 text-purple-400" />
                    <a href={contact.href} className="text-sm">
                      {contact.text}
                    </a>
                  </div>
                );
              })}
            </div>
          </div>

          {/* Quick Links */}
          <div className="grid md:grid-cols-3 lg:grid-cols-3 gap-8 lg:col-span-3">
            <div className="space-y-4">
              <h3 className="text-lg font-semibold text-white">Company</h3>
              <ul className="space-y-3">
                {footerLinks.company.map((link, index) => (
                  <li key={index}>
                    <Link
                      to={link.path}
                      className="text-gray-300 hover:text-white transition-colors duration-300 text-sm"
                    >
                      {link.name}
                    </Link>
                  </li>
                ))}
              </ul>
            </div>

            <div className="space-y-4">
              <h3 className="text-lg font-semibold text-white">Services</h3>
              <ul className="space-y-3">
                {footerLinks.services.map((link, index) => (
                  <li key={index}>
                    <Link
                      to={link.path}
                      className="text-gray-300 hover:text-white transition-colors duration-300 text-sm"
                    >
                      {link.name}
                    </Link>
                  </li>
                ))}
              </ul>
            </div>

            <div className="space-y-4">
              <h3 className="text-lg font-semibold text-white">Resources</h3>
              <ul className="space-y-3">
                {footerLinks.resources.map((link, index) => (
                  <li key={index}>
                    <Link
                      to={link.path}
                      className="text-gray-300 hover:text-white transition-colors duration-300 text-sm"
                    >
                      {link.name}
                    </Link>
                  </li>
                ))}
              </ul>
            </div>
          </div>
        </div>

        {/* Newsletter Signup */}
        <div className="mt-12 pt-8 border-t border-gray-800">
          <div className="grid md:grid-cols-2 gap-8 items-center">
            <div>
              <h3 className="text-xl font-semibold text-white mb-2">
                Stay Updated
              </h3>
              <p className="text-gray-300">
                Get the latest business insights and resources delivered to your inbox.
              </p>
            </div>
            
            <div className="flex flex-col sm:flex-row gap-3">
              <Input
                type="email"
                placeholder="Enter your email"
                className="bg-gray-800 border-gray-700 text-white placeholder-gray-400 focus:border-purple-500 focus:ring-purple-500"
              />
              <Button className="bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white px-6 py-2 rounded-md font-semibold transition-all duration-300 hover:scale-105 whitespace-nowrap">
                Subscribe
                <ArrowRight className="ml-2 w-4 h-4" />
              </Button>
            </div>
          </div>
        </div>

        {/* Social Links */}
        <div className="mt-8 pt-8 border-t border-gray-800">
          <div className="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <div className="flex space-x-4">
              {socialLinks.map((social, index) => {
                const IconComponent = social.icon;
                return (
                  <a
                    key={index}
                    href={social.href}
                    aria-label={social.label}
                    className="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center text-gray-400 hover:text-white hover:bg-purple-600 transition-all duration-300 hover:scale-110"
                  >
                    <IconComponent className="w-5 h-5" />
                  </a>
                );
              })}
            </div>
            
            <div className="text-center md:text-right">
              <p className="text-gray-400 text-sm">
                Founded by{" "}
                <span className="text-purple-400 font-medium">
                  Gaetan Junior Jean-Francois
                </span>
              </p>
              <p className="text-gray-500 text-xs mt-1">
                Empowering communities through sustainable business ventures
              </p>
            </div>
          </div>
        </div>
      </div>

      {/* Copyright */}
      <div className="bg-gray-950 py-6">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex flex-col md:flex-row justify-between items-center space-y-2 md:space-y-0">
            <p className="text-gray-400 text-sm">
              © {currentYear} NATEAG Enterprises. All rights reserved.
            </p>
            
            <div className="flex space-x-6 text-sm">
              <a href="#" className="text-gray-400 hover:text-white transition-colors duration-300">
                Privacy Policy
              </a>
              <a href="#" className="text-gray-400 hover:text-white transition-colors duration-300">
                Terms of Service
              </a>
              <a href="#" className="text-gray-400 hover:text-white transition-colors duration-300">
                Cookie Policy
              </a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  );
};

export default Footer;