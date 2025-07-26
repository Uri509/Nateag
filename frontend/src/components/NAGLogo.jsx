// NATEAG Enterprises Logo Component
import React from 'react';

const NAGLogo = ({ className = "", width = "auto", height = "40", showFullName = true }) => {
  return (
    <div className={`flex items-center ${className}`} style={{ height }}>
      <svg 
        viewBox="0 0 300 120" 
        style={{ width: width === "auto" ? height * 2.5 : width, height }}
        xmlns="http://www.w3.org/2000/svg"
      >
        <defs>
          <linearGradient id="nagGradient" x1="0%" y1="0%" x2="100%" y2="0%">
            <stop offset="0%" stopColor="#9333ea" />
            <stop offset="50%" stopColor="#7c3aed" />
            <stop offset="100%" stopColor="#3b82f6" />
          </linearGradient>
        </defs>
        
        {/* NAG Letters */}
        <g fill="url(#nagGradient)">
          {/* N */}
          <path d="M5 15 L5 85 L15 85 L15 40 L35 85 L45 85 L45 15 L35 15 L35 65 L15 15 Z" />
          
          {/* A */}
          <path d="M55 85 L65 85 L68 75 L87 75 L90 85 L100 85 L82 15 L73 15 Z M77.5 35 L83 60 L72 60 Z" />
          
          {/* G */}
          <path d="M130 15 C120 15 115 20 115 30 L115 70 C115 80 120 85 130 85 L150 85 C160 85 165 80 165 70 L165 55 L150 55 L150 63 L157 63 L157 70 C157 72 155 75 150 75 L130 75 C125 75 123 72 123 70 L123 30 C123 28 125 25 130 25 L150 25 C155 25 157 28 157 30 L157 37 L165 37 L165 30 C165 20 160 15 150 15 Z" />
        </g>
        
        {/* ENTERPRISES text */}
        {showFullName && (
          <g fill="#333333" fontSize="12" fontFamily="Arial, sans-serif" fontWeight="600">
            <text x="5" y="105">ENTERPRISES</text>
          </g>
        )}
      </svg>
    </div>
  );
};

export default NAGLogo;