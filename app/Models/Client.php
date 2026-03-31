<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Client extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['title', 'logo', 'contact_number', 'contact_email', 'verified'];
    
    protected $appends = ['logo'];

    public function getLogoAttribute($value)
    {
        $media = $this->getFirstMediaUrl('logo');
        return $media ?: $value; // fallback to original 'logo' database field or logic
    }
}
