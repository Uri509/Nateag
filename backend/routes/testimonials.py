from fastapi import APIRouter, HTTPException, Query
from typing import List
from models import Testimonial, TestimonialCreate, MessageResponse
from database import testimonials_collection

router = APIRouter(prefix="/testimonials", tags=["testimonials"])

@router.get("/", response_model=List[Testimonial])
async def get_testimonials(featured_only: bool = Query(False)):
    """Get all testimonials, optionally filtered by featured status"""
    query = {}
    if featured_only:
        query["featured"] = True
    
    testimonials_cursor = testimonials_collection.find(query).sort("date_created", -1)
    testimonials = await testimonials_cursor.to_list(length=None)
    return [Testimonial(**testimonial) for testimonial in testimonials]

@router.get("/{testimonial_id}", response_model=Testimonial)
async def get_testimonial(testimonial_id: str):
    """Get a single testimonial by ID"""
    testimonial = await testimonials_collection.find_one({"id": testimonial_id})
    if not testimonial:
        raise HTTPException(status_code=404, detail="Testimonial not found")
    return Testimonial(**testimonial)

@router.post("/", response_model=Testimonial)
async def create_testimonial(testimonial_data: TestimonialCreate):
    """Create a new testimonial"""
    testimonial = Testimonial(**testimonial_data.dict())
    await testimonials_collection.insert_one(testimonial.dict())
    return testimonial

@router.put("/{testimonial_id}", response_model=Testimonial)
async def update_testimonial(testimonial_id: str, testimonial_data: TestimonialCreate):
    """Update an existing testimonial"""
    existing_testimonial = await testimonials_collection.find_one({"id": testimonial_id})
    if not existing_testimonial:
        raise HTTPException(status_code=404, detail="Testimonial not found")
    
    updated_testimonial = Testimonial(id=testimonial_id, **testimonial_data.dict())
    await testimonials_collection.replace_one({"id": testimonial_id}, updated_testimonial.dict())
    return updated_testimonial

@router.delete("/{testimonial_id}", response_model=MessageResponse)
async def delete_testimonial(testimonial_id: str):
    """Delete a testimonial"""
    result = await testimonials_collection.delete_one({"id": testimonial_id})
    if result.deleted_count == 0:
        raise HTTPException(status_code=404, detail="Testimonial not found")
    return MessageResponse(message="Testimonial deleted successfully")

@router.patch("/{testimonial_id}/featured", response_model=Testimonial)
async def toggle_testimonial_featured(testimonial_id: str):
    """Toggle the featured status of a testimonial"""
    testimonial = await testimonials_collection.find_one({"id": testimonial_id})
    if not testimonial:
        raise HTTPException(status_code=404, detail="Testimonial not found")
    
    new_featured = not testimonial.get("featured", False)
    await testimonials_collection.update_one(
        {"id": testimonial_id}, 
        {"$set": {"featured": new_featured}}
    )
    
    updated_testimonial = await testimonials_collection.find_one({"id": testimonial_id})
    return Testimonial(**updated_testimonial)