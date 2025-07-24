from fastapi import APIRouter, HTTPException, Query
from typing import List
from models import ContactSubmission, ContactSubmissionCreate, MessageResponse
from database import contacts_collection

router = APIRouter(prefix="/contact", tags=["contact"])

@router.post("/", response_model=MessageResponse)
async def submit_contact_form(contact_data: ContactSubmissionCreate):
    """Submit a new contact form"""
    contact = ContactSubmission(**contact_data.dict())
    await contacts_collection.insert_one(contact.dict())
    
    # Here you could add email notification logic
    # send_notification_email(contact)
    
    return MessageResponse(
        message="Thank you for your message! We'll get back to you within 24 hours.",
        success=True
    )

@router.get("/submissions", response_model=List[ContactSubmission])
async def get_contact_submissions(
    status: str = Query(None, regex="^(new|contacted|closed)$")
):
    """Get all contact submissions (admin endpoint)"""
    query = {}
    if status:
        query["status"] = status
    
    submissions_cursor = contacts_collection.find(query).sort("date_submitted", -1)
    submissions = await submissions_cursor.to_list(length=None)
    return [ContactSubmission(**submission) for submission in submissions]

@router.get("/submissions/{submission_id}", response_model=ContactSubmission)
async def get_contact_submission(submission_id: str):
    """Get a single contact submission by ID (admin endpoint)"""
    submission = await contacts_collection.find_one({"id": submission_id})
    if not submission:
        raise HTTPException(status_code=404, detail="Contact submission not found")
    return ContactSubmission(**submission)

@router.patch("/submissions/{submission_id}/status", response_model=ContactSubmission)
async def update_submission_status(submission_id: str, status: str):
    """Update the status of a contact submission (admin endpoint)"""
    if status not in ["new", "contacted", "closed"]:
        raise HTTPException(status_code=400, detail="Invalid status")
    
    result = await contacts_collection.update_one(
        {"id": submission_id},
        {"$set": {"status": status}}
    )
    
    if result.modified_count == 0:
        raise HTTPException(status_code=404, detail="Contact submission not found")
    
    updated_submission = await contacts_collection.find_one({"id": submission_id})
    return ContactSubmission(**updated_submission)

@router.delete("/submissions/{submission_id}", response_model=MessageResponse)
async def delete_contact_submission(submission_id: str):
    """Delete a contact submission (admin endpoint)"""
    result = await contacts_collection.delete_one({"id": submission_id})
    if result.deleted_count == 0:
        raise HTTPException(status_code=404, detail="Contact submission not found")
    return MessageResponse(message="Contact submission deleted successfully")