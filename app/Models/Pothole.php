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
        'desc',
        'image',
        'is_approved',
        'id_user',
        'id_admin'
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
}
