import React from "react";
import Hero from "../components/Hero";
import ServicesOverview from "../components/ServicesOverview";
import AboutPreview from "../components/AboutPreview";
import Testimonials from "../components/Testimonials";
import BlogPreview from "../components/BlogPreview";
import Newsletter from "../components/Newsletter";

const Home = () => {
  return (
    <div className="min-h-screen">
      <Hero />
      <ServicesOverview />
      <AboutPreview />
      <Testimonials />
      <BlogPreview />
      <Newsletter />
    </div>
  );
};

export default Home;