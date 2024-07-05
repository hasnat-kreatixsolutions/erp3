<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'contact_number', 'cnic_number', 'email', 'dob', 'shift', 'department_id', 'hiring_date', 'salary'
    ];

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }
}
