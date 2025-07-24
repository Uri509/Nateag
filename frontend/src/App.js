import React from "react";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import "./App.css";

// Simple test component
const TestHome = () => {
  return (
    <div className="min-h-screen bg-gradient-to-br from-purple-50 via-white to-blue-50 flex items-center justify-center">
      <div className="max-w-4xl mx-auto px-4 text-center">
        <div className="mb-8">
          <div className="w-16 h-16 bg-gradient-to-r from-purple-600 to-blue-600 rounded-lg flex items-center justify-center mx-auto mb-6">
            <span className="text-white font-bold text-2xl">N</span>
          </div>
          <div className="mb-4">
            <span className="text-3xl font-bold bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent">
              NATEAG
            </span>
            <br />
            <span className="text-xl text-gray-600">ENTERPRISES</span>
          </div>
        </div>
        
        <h1 className="text-4xl md:text-6xl font-bold text-gray-900 mb-6">
          Empowering{" "}
          <span className="bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent">
            Entrepreneurs
          </span>{" "}
          Through Comprehensive Business Solutions
        </h1>
        
        <p className="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
          NATEAG Enterprises provides comprehensive consulting, marketing, and logistics services 
          designed to support both new and established entrepreneurs in today's evolving business landscape.
        </p>
        
        <div className="space-y-4">
          <div className="grid md:grid-cols-3 gap-6 max-w-3xl mx-auto">
            <div className="bg-white p-6 rounded-xl shadow-lg">
              <h3 className="font-bold text-purple-600 mb-2">Strategic Consulting</h3>
              <p className="text-gray-600 text-sm">Build effective business strategies and streamline operations</p>
            </div>
            <div className="bg-white p-6 rounded-xl shadow-lg">
              <h3 className="font-bold text-blue-600 mb-2">Marketing Solutions</h3>
              <p className="text-gray-600 text-sm">Boost brand visibility and attract target audiences</p>
            </div>
            <div className="bg-white p-6 rounded-xl shadow-lg">
              <h3 className="font-bold text-indigo-600 mb-2">Logistics Services</h3>
              <p className="text-gray-600 text-sm">Optimize supply chain management and delivery</p>
            </div>
          </div>
        </div>
        
        <div className="mt-12 p-6 bg-white rounded-xl shadow-lg max-w-2xl mx-auto">
          <h2 className="text-2xl font-bold text-gray-900 mb-4">Contact Information</h2>
          <div className="space-y-2 text-gray-600">
            <p><strong>Email:</strong> info@nateagenterprises.com</p>
            <p><strong>Phone:</strong> (207) 417-4844</p>
            <p><strong>Address:</strong> 45 Dan Rd, Canton, MA 02021</p>
          </div>
          <div className="mt-4">
            <p className="text-sm text-gray-500">
              Led by <span className="font-medium text-purple-600">Gaetan Junior Jean-Francois</span>, 
              a Haitian entrepreneur in Boston driving economic development through sustainable ventures.
            </p>
          </div>
        </div>
      </div>
    </div>
  );
};

function App() {
  return (
    <div className="App">
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<TestHome />} />
        </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;