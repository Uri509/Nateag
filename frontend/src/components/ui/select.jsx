import React, { useState } from "react";

export const Select = ({ children, value, onValueChange, disabled = false }) => {
  return (
    <div className="relative">
      {children}
    </div>
  );
};

export const SelectTrigger = ({ children, className = "", disabled = false }) => {
  return (
    <button
      className={`flex h-10 w-full items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 ${className}`}
      disabled={disabled}
    >
      {children}
    </button>
  );
};

export const SelectValue = ({ placeholder }) => {
  return <span className="text-muted-foreground">{placeholder}</span>;
};

export const SelectContent = ({ children }) => {
  return (
    <div className="relative z-50 min-w-[8rem] overflow-hidden rounded-md border bg-popover text-popover-foreground shadow-md">
      {children}
    </div>
  );
};

export const SelectItem = ({ children, value }) => {
  return (
    <div className="relative flex w-full cursor-default select-none items-center rounded-sm py-1.5 pl-8 pr-2 text-sm outline-none focus:bg-accent focus:text-accent-foreground">
      {children}
    </div>
  );
};