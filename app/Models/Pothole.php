<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pothole extends Model
{
    use HasFactory;

    protected $fillable = [
        'lat',
        'long',
        'address',
        'desc',
        'image',
        'is_approved',
        'id_user',
        'is_damaged',
        'damage_percentage',
        'segmented_image_path',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function getSegmentedImageAttribute()
    {
        $ml_images_url = 'http://'.env('ML_API_URL').'/'.'result/';
        return $ml_images_url.$this->segmented_image_path;
    }

}
