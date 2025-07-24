from fastapi import APIRouter, HTTPException
from typing import List
from models import Service, ServiceCreate, MessageResponse
from database import services_collection

router = APIRouter(prefix="/services", tags=["services"])

@router.get("/", response_model=List[Service])
async def get_services(active_only: bool = True):
    """Get all services"""
    query = {}
    if active_only:
        query["active"] = True
    
    services_cursor = services_collection.find(query)
    services = await services_cursor.to_list(length=None)
    return [Service(**service) for service in services]

@router.get("/{service_id}", response_model=Service)
async def get_service(service_id: str):
    """Get a single service by ID"""
    service = await services_collection.find_one({"id": service_id})
    if not service:
        raise HTTPException(status_code=404, detail="Service not found")
    return Service(**service)

@router.post("/", response_model=Service)
async def create_service(service_data: ServiceCreate):
    """Create a new service (admin endpoint)"""
    service = Service(**service_data.dict())
    await services_collection.insert_one(service.dict())
    return service

@router.put("/{service_id}", response_model=Service)
async def update_service(service_id: str, service_data: ServiceCreate):
    """Update an existing service (admin endpoint)"""
    existing_service = await services_collection.find_one({"id": service_id})
    if not existing_service:
        raise HTTPException(status_code=404, detail="Service not found")
    
    updated_service = Service(id=service_id, **service_data.dict())
    await services_collection.replace_one({"id": service_id}, updated_service.dict())
    return updated_service

@router.delete("/{service_id}", response_model=MessageResponse)
async def delete_service(service_id: str):
    """Delete a service (admin endpoint)"""
    result = await services_collection.delete_one({"id": service_id})
    if result.deleted_count == 0:
        raise HTTPException(status_code=404, detail="Service not found")
    return MessageResponse(message="Service deleted successfully")

@router.patch("/{service_id}/toggle", response_model=Service)
async def toggle_service_active(service_id: str):
    """Toggle the active status of a service (admin endpoint)"""
    service = await services_collection.find_one({"id": service_id})
    if not service:
        raise HTTPException(status_code=404, detail="Service not found")
    
    new_active = not service.get("active", True)
    await services_collection.update_one(
        {"id": service_id}, 
        {"$set": {"active": new_active}}
    )
    
    updated_service = await services_collection.find_one({"id": service_id})
    return Service(**updated_service)