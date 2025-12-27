<?php

namespace App\Models;

use App\Enums\TransactionStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_number',
        'subject',
        'source_entity_id',
        'receiving_department_id',
        'status',
        'created_by',
    ];

    protected $casts = [
        'status' => TransactionStatus::class,
    ];

    /* Relationships */
    public function sourceEntity()
    {
        return $this->belongsTo(Entity::class, 'source_entity_id');
    }

    public function receivingDepartment()
    {
        return $this->belongsTo(Department::class, 'receiving_department_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    /* Helpers */
    public function scopeFromEntity($query, $entityId)
    {
        return $query->where('source_entity_id', $entityId);
    }

    public function scopeToDepartment($query, $departmentId)
    {
        return $query->where('receiving_department_id', $departmentId);
    }
}
