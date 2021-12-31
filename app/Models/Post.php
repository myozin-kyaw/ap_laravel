<?php

namespace App\Models;

use App\Mail\PostStore;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    // protected $fillable = ['name','description','category_id','user_id'];
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    protected static function booted()
    {
        static::created(function ($post) {
            Mail::to('silent@gmail.com')->send(new PostStore($post));
        });
    }
}
