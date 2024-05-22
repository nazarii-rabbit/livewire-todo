<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
      'description', 'user_id', 'status'
    ];

    protected $attributes = [
        'status' => 'active'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function isDone(): bool
    {
        return $this->status == 'done';
    }

    public function isActive(): bool
    {
        return $this->status == 'active';
    }
}
