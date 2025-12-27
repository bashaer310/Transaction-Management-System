<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /* Relationships */
    public function users()
    {
        return $this->hasMany(User::class, 'department_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'receiving_department_id');
    }
}
