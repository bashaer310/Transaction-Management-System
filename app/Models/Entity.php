<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_info',
    ];

    /* Relationships */
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'source_entity_id');
    }
}
