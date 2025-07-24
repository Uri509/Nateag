from pydantic import BaseModel, Field, EmailStr
from typing import List, Optional
from datetime import datetime
import uuid

# Blog Models
class BlogPost(BaseModel):
    id: str = Field(default_factory=lambda: str(uuid.uuid4()))
    title: str
    slug: str
    excerpt: str
    content: str
    author: str
    date: datetime = Field(default_factory=datetime.utcnow)
    read_time: str
    category: str
    featured_image: Optional[str] = None
    published: bool = True
    tags: List[str] = []

class BlogPostCreate(BaseModel):
    title: str
    slug: str
    excerpt: str
    content: str
    author: str
    read_time: str
    category: str
    featured_image: Optional[str] = None
    published: bool = True
    tags: List[str] = []

# Testimonial Models
class Testimonial(BaseModel):
    id: str = Field(default_factory=lambda: str(uuid.uuid4()))
    name: str
    title: str
    company: Optional[str] = None
    content: str
    rating: int = Field(ge=1, le=5)
    image: Optional[str] = None
    featured: bool = False
    date_created: datetime = Field(default_factory=datetime.utcnow)

class TestimonialCreate(BaseModel):
    name: str
    title: str
    company: Optional[str] = None
    content: str
    rating: int = Field(ge=1, le=5)
    image: Optional[str] = None
    featured: bool = False

# Contact Form Models
class ContactSubmission(BaseModel):
    id: str = Field(default_factory=lambda: str(uuid.uuid4()))
    name: str
    email: EmailStr
    phone: Optional[str] = None
    company: Optional[str] = None
    service: Optional[str] = None
    message: str
    date_submitted: datetime = Field(default_factory=datetime.utcnow)
    status: str = "new"  # new, contacted, closed

class ContactSubmissionCreate(BaseModel):
    name: str
    email: EmailStr
    phone: Optional[str] = None
    company: Optional[str] = None
    service: Optional[str] = None
    message: str

# Newsletter Models
class NewsletterSubscription(BaseModel):
    id: str = Field(default_factory=lambda: str(uuid.uuid4()))
    name: str
    email: EmailStr
    date_subscribed: datetime = Field(default_factory=datetime.utcnow)
    active: bool = True
    source: Optional[str] = "website"

class NewsletterSubscriptionCreate(BaseModel):
    name: str
    email: EmailStr
    source: Optional[str] = "website"

# Resource Models
class Resource(BaseModel):
    id: str = Field(default_factory=lambda: str(uuid.uuid4()))
    title: str
    description: str
    type: str  # PDF Guide, Excel Template, etc.
    category: str  # Strategy, Marketing, Logistics
    download_url: str
    file_size: Optional[str] = None
    downloads: int = 0
    featured: bool = False
    date_created: datetime = Field(default_factory=datetime.utcnow)

class ResourceCreate(BaseModel):
    title: str
    description: str
    type: str
    category: str
    download_url: str
    file_size: Optional[str] = None
    featured: bool = False

# Service Models
class Service(BaseModel):
    id: str = Field(default_factory=lambda: str(uuid.uuid4()))
    title: str
    description: str
    icon: str
    features: List[str]
    color: str
    pricing: Optional[str] = None
    active: bool = True

class ServiceCreate(BaseModel):
    title: str
    description: str
    icon: str
    features: List[str]
    color: str
    pricing: Optional[str] = None
    active: bool = True

# Statistics Models
class BusinessStats(BaseModel):
    id: str = Field(default_factory=lambda: str(uuid.uuid4()))
    clients_served: int
    years_experience: str
    success_rate: str
    countries_reached: int
    last_updated: datetime = Field(default_factory=datetime.utcnow)

# Response models
class MessageResponse(BaseModel):
    message: str
    success: bool = True

class ListResponse(BaseModel):
    items: List[dict]
    total: int
    page: int = 1
    per_page: int = 10