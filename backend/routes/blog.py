from fastapi import APIRouter, HTTPException, Query
from typing import List, Optional
from models import BlogPost, BlogPostCreate, ListResponse, MessageResponse
from database import blog_collection
from datetime import datetime

router = APIRouter(prefix="/blog", tags=["blog"])

@router.get("/", response_model=ListResponse)
async def get_blog_posts(
    page: int = Query(1, ge=1),
    per_page: int = Query(10, ge=1, le=50),
    category: Optional[str] = None,
    search: Optional[str] = None,
    published: bool = True
):
    """Get paginated blog posts with optional filtering"""
    skip = (page - 1) * per_page
    
    # Build query
    query = {"published": published}
    if category:
        query["category"] = category
    if search:
        query["$or"] = [
            {"title": {"$regex": search, "$options": "i"}},
            {"excerpt": {"$regex": search, "$options": "i"}},
            {"content": {"$regex": search, "$options": "i"}}
        ]
    
    # Get posts
    posts_cursor = blog_collection.find(query).sort("date", -1).skip(skip).limit(per_page)
    posts_data = await posts_cursor.to_list(length=per_page)
    
    # Convert to Pydantic models to handle ObjectId serialization
    posts = []
    for post_data in posts_data:
        # Remove MongoDB's _id field if present
        if '_id' in post_data:
            del post_data['_id']
        posts.append(post_data)
    
    # Get total count
    total = await blog_collection.count_documents(query)
    
    return ListResponse(
        items=posts,
        total=total,
        page=page,
        per_page=per_page
    )

@router.get("/{post_id}", response_model=BlogPost)
async def get_blog_post(post_id: str):
    """Get a single blog post by ID"""
    post = await blog_collection.find_one({"id": post_id})
    if not post:
        raise HTTPException(status_code=404, detail="Blog post not found")
    return BlogPost(**post)

@router.get("/slug/{slug}", response_model=BlogPost)
async def get_blog_post_by_slug(slug: str):
    """Get a single blog post by slug"""
    post = await blog_collection.find_one({"slug": slug})
    if not post:
        raise HTTPException(status_code=404, detail="Blog post not found")
    return BlogPost(**post)

@router.post("/", response_model=BlogPost)
async def create_blog_post(post_data: BlogPostCreate):
    """Create a new blog post"""
    post = BlogPost(**post_data.dict())
    await blog_collection.insert_one(post.dict())
    return post

@router.put("/{post_id}", response_model=BlogPost)
async def update_blog_post(post_id: str, post_data: BlogPostCreate):
    """Update an existing blog post"""
    existing_post = await blog_collection.find_one({"id": post_id})
    if not existing_post:
        raise HTTPException(status_code=404, detail="Blog post not found")
    
    updated_post = BlogPost(id=post_id, **post_data.dict())
    await blog_collection.replace_one({"id": post_id}, updated_post.dict())
    return updated_post

@router.delete("/{post_id}", response_model=MessageResponse)
async def delete_blog_post(post_id: str):
    """Delete a blog post"""
    result = await blog_collection.delete_one({"id": post_id})
    if result.deleted_count == 0:
        raise HTTPException(status_code=404, detail="Blog post not found")
    return MessageResponse(message="Blog post deleted successfully")

@router.get("/categories/", response_model=List[str])
async def get_blog_categories():
    """Get all unique blog categories"""
    categories = await blog_collection.distinct("category")
    return categories