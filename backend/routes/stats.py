from fastapi import APIRouter, HTTPException
from models import BusinessStats, MessageResponse
from database import stats_collection

router = APIRouter(prefix="/stats", tags=["stats"])

@router.get("/", response_model=BusinessStats)
async def get_business_stats():
    """Get current business statistics"""
    stats = await stats_collection.find_one({})
    if not stats:
        raise HTTPException(status_code=404, detail="Business statistics not found")
    return BusinessStats(**stats)

@router.put("/", response_model=BusinessStats)
async def update_business_stats(stats_data: dict):
    """Update business statistics (admin endpoint)"""
    existing_stats = await stats_collection.find_one({})
    
    if existing_stats:
        # Update existing stats
        updated_stats = BusinessStats(
            id=existing_stats["id"],
            **stats_data
        )
        await stats_collection.replace_one({"id": existing_stats["id"]}, updated_stats.dict())
    else:
        # Create new stats
        updated_stats = BusinessStats(**stats_data)
        await stats_collection.insert_one(updated_stats.dict())
    
    return updated_stats

@router.get("/summary")
async def get_stats_summary():
    """Get a summary of all statistics across the platform"""
    business_stats = await stats_collection.find_one({})
    
    # Get additional stats from other collections
    from database import (
        blog_collection, testimonials_collection, 
        contacts_collection, newsletter_collection
    )
    
    total_blog_posts = await blog_collection.count_documents({"published": True})
    total_testimonials = await testimonials_collection.count_documents({})
    total_contacts = await contacts_collection.count_documents({})
    total_subscribers = await newsletter_collection.count_documents({"active": True})
    
    return {
        "business_stats": business_stats,
        "content_stats": {
            "blog_posts": total_blog_posts,
            "testimonials": total_testimonials,
            "contact_submissions": total_contacts,
            "newsletter_subscribers": total_subscribers
        }
    }