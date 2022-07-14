<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ["id", "name", "email", "logo", "website"];

    public function employees() {
        return $this->hasMany(Employee::class, 'company_id');
    }

    public function scopePriority($query) {
        return $query->orderBy('name', 'ASC')->orderBy('id', 'DESC');
    }
}
