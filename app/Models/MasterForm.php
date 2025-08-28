<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'gender',
        'single_selection',
        'multi_selection',
        'image_path',
        'video_path',
        'languages',
        'password',
        'date_field',
        'time_field',
        'datetime_field',
        'date_range_start',
        'date_range_end',
        'range_slider_value',
        'address',
        'signature',
        'text_editor',
        'star_rating',
        'captcha',
        'status',
    ];

    protected $casts = [
        'multi_selection' => 'array',
        'languages' => 'array',
        'date_field' => 'date',
        'time_field' => 'datetime',
        'datetime_field' => 'datetime',
        'date_range_start' => 'date',
        'date_range_end' => 'date',
        'range_slider_value' => 'integer',
        'star_rating' => 'integer',
        'status' => 'boolean',
    ];

    protected $hidden = [
        'password',
    ];

    public function getGenderTextAttribute()
    {
        return match($this->gender) {
            '1' => 'Male',
            '2' => 'Female',
            '3' => 'Other',
            default => 'Unknown'
        };
    }

    public function getStatusTextAttribute()
    {
        return $this->status ? 'Active' : 'Disabled';
    }
}
