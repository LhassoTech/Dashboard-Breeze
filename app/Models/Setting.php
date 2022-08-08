<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'site_url',
        'site_email',
        'site_mobile',
        'site_phone',
        'site_address',
        'img_logo',
        'img_fav',
        'latitude',
        'longitude',
        'site_copyright',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'instagram_url',
        'youtube_url'
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
