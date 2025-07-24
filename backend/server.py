from fastapi import FastAPI, APIRouter
from dotenv import load_dotenv
from starlette.middleware.cors import CORSMiddleware
import os
import logging
from pathlib import Path

# Import database initialization
from database import init_database

# Import route modules
from routes import blog, testimonials, contact, newsletter, services, stats

ROOT_DIR = Path(__file__).parent
load_dotenv(ROOT_DIR / '.env')

# Create the main app
app = FastAPI(
    title="NATEAG Enterprises API",
    description="API for NATEAG Enterprises website",
    version="1.0.0"
)

# Create a router with the /api prefix
api_router = APIRouter(prefix="/api")

# Basic health check
@api_router.get("/")
async def root():
    return {"message": "NATEAG Enterprises API is running", "status": "healthy"}

@api_router.get("/health")
async def health_check():
    return {
        "status": "healthy",
        "service": "NATEAG Enterprises API",
        "version": "1.0.0"
    }

# Include all route modules
api_router.include_router(blog.router)
api_router.include_router(testimonials.router)
api_router.include_router(contact.router)
api_router.include_router(newsletter.router)
api_router.include_router(services.router)
api_router.include_router(stats.router)

# Include the API router in the main app
app.include_router(api_router)

# CORS middleware
app.add_middleware(
    CORSMiddleware,
    allow_credentials=True,
    allow_origins=["*"],
    allow_methods=["*"],
    allow_headers=["*"],
)

# Configure logging
logging.basicConfig(
    level=logging.INFO,
    format='%(asctime)s - %(name)s - %(levelname)s - %(message)s'
)
logger = logging.getLogger(__name__)

@app.on_event("startup")
async def startup_event():
    """Initialize database with sample data on startup"""
    logger.info("Starting NATEAG Enterprises API...")
    try:
        await init_database()
        logger.info("✅ Database initialized successfully")
    except Exception as e:
        logger.error(f"❌ Database initialization failed: {str(e)}")

@app.on_event("shutdown")
async def shutdown_event():
    """Cleanup on shutdown"""
    logger.info("Shutting down NATEAG Enterprises API...")
    # Close database connections if needed