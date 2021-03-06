<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ["id", "company_id", "first_name", "last_name", "email", "phone"];

    public function company() {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function getFullNameAttribute() {
        return $this->first_name." ".$this->last_name;
    }

    public function scopePriority($query) {
        return $query->orderBy('company_id')->orderBy('id', 'desc');
    }

}
