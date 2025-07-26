// NATEAG Enterprises Logo Component
import React from 'react';

const NAGLogo = ({ className = "", width = "auto", height = "40" }) => {
  return (
    <svg 
      viewBox="0 0 700 550" 
      className={className}
      style={{ width, height }}
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
        <path d="M10 50 L10 400 L60 400 L60 200 L140 400 L190 400 L190 50 L140 50 L140 300 L60 50 Z" />
        
        {/* A */}
        <path d="M220 400 L270 400 L285 350 L355 350 L370 400 L420 400 L350 50 L290 50 Z M320 180 L335 250 L305 250 Z" />
        
        {/* G */}
        <path d="M540 50 C480 50 450 80 450 140 L450 310 C450 370 480 400 540 400 L620 400 C680 400 710 370 710 310 L710 250 L620 250 L620 290 L660 290 L660 310 C660 330 650 340 620 340 L540 340 C510 340 500 330 500 310 L500 140 C500 120 510 110 540 110 L620 110 C650 110 660 120 660 140 L660 180 L710 180 L710 140 C710 80 680 50 620 50 Z" />
      </g>
      
      {/* ENTERPRISES text */}
      <g fill="#333333" fontSize="42" fontFamily="Arial, sans-serif" fontWeight="bold">
        <text x="10" y="500">ENTERPRISES</text>
      </g>
    </svg>
  );
};

export default NAGLogo;