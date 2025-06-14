<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerInquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'product_name',
        'email',
        'phone_number',
        'message',
        'state',
        'district',
        'status',
    ];

    // Scope to easily filter complete/incomplete inquiries
    public function scopeCompleted($query)
    {
        return $query->where('status', 'complete');
    }

    public function scopeIncomplete($query)
    {
        return $query->where('status', 'incomplete');
    }
}
