<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $fillable = ['name', 'email', 'ip', 'is_read'];
    public function markAsRead(): bool
    {
        return $this->update(['is_read' => true]);
    }
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }}
