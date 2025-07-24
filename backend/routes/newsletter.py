from fastapi import APIRouter, HTTPException
from typing import List
from models import NewsletterSubscription, NewsletterSubscriptionCreate, MessageResponse
from database import newsletter_collection

router = APIRouter(prefix="/newsletter", tags=["newsletter"])

@router.post("/subscribe", response_model=MessageResponse)
async def subscribe_to_newsletter(subscription_data: NewsletterSubscriptionCreate):
    """Subscribe to newsletter"""
    # Check if email already exists
    existing_subscription = await newsletter_collection.find_one({
        "email": subscription_data.email,
        "active": True
    })
    
    if existing_subscription:
        return MessageResponse(
            message="You're already subscribed to our newsletter!",
            success=True
        )
    
    # Create new subscription
    subscription = NewsletterSubscription(**subscription_data.dict())
    await newsletter_collection.insert_one(subscription.dict())
    
    # Here you could add email confirmation logic
    # send_welcome_email(subscription)
    
    return MessageResponse(
        message="Successfully subscribed! Thank you for joining our newsletter.",
        success=True
    )

@router.get("/subscribers", response_model=List[NewsletterSubscription])
async def get_newsletter_subscribers(active_only: bool = True):
    """Get all newsletter subscribers (admin endpoint)"""
    query = {}
    if active_only:
        query["active"] = True
    
    subscribers_cursor = newsletter_collection.find(query).sort("date_subscribed", -1)
    subscribers = await subscribers_cursor.to_list(length=None)
    return [NewsletterSubscription(**subscriber) for subscriber in subscribers]

@router.delete("/unsubscribe/{email}", response_model=MessageResponse)
async def unsubscribe_from_newsletter(email: str):
    """Unsubscribe from newsletter"""
    result = await newsletter_collection.update_one(
        {"email": email},
        {"$set": {"active": False}}
    )
    
    if result.modified_count == 0:
        raise HTTPException(status_code=404, detail="Email not found in our subscriber list")
    
    return MessageResponse(message="Successfully unsubscribed from newsletter")

@router.get("/stats")
async def get_newsletter_stats():
    """Get newsletter statistics (admin endpoint)"""
    total_subscribers = await newsletter_collection.count_documents({"active": True})
    total_unsubscribed = await newsletter_collection.count_documents({"active": False})
    
    return {
        "active_subscribers": total_subscribers,
        "unsubscribed": total_unsubscribed,
        "total_signups": total_subscribers + total_unsubscribed
    }