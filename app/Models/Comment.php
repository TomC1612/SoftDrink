<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public static function validate($request)
    {
        $request->validate([
            "rating" => "required|numeric|gt:0",
            "content" => "required|max:255",
            "user_id" => "required|exists:users,id",
            "product_id" => "required|exists:products,id",
            "review_id" => "required|exists:reviews,id",
        ]);
    }
    public function getId()
    {
        return $this->attributes['id'];
    }
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function getProduct()
    {
        return $this->product;
    }
    public function setProduct($product)
    {
        $this->product = $product;
    }
    public function review()
    {
        return $this->belongsTo(Review::class);
    }
    public function getReview()
    {
        return $this->review;
    }
    public function setReview($review)
    {
        $this->review = $review;
    }
    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }
    public function setCreatedAt($createdAt)
    {
        $this->attributes['created_at'] = $createdAt;
    }
    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }
    public function setUpdatedAt($updatedAt)
    {
        $this->attributes['updated_at'] = $updatedAt;
    }
    public function getProductId()
    {
        return $this->attributes['product_id'];
    }
    public function setProductId($productId)
    {
        $this->attributes['product_id'] = $productId;
    }
    public function getReviewId()
    {
        return $this->attributes['review_id'];
    }
    public function setReviewId($reviewId)
    {
        $this->attributes['review_id'] = $reviewId;
    }
    public function getRating()
    {
        return $this->attributes['rating'];
    }
    public function setRating($rating)
    {
        $this->attributes['rating'] = $rating;
    }
    public function getContent()
    {
        return $this->attributes['content'];
    }
    public function setContent($content)
    {
        $this->attributes['content'] = $content;
    }
    public function getUserId()
    {
        return $this->attributes['user_id'];
    }
    public function setUserId($userId)
    {
        $this->attributes['user_id'] = $userId;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getUser()
    {
        return $this->user;
    }
    public function setUser($user)
    {
        $this->user = $user;
    }
}
