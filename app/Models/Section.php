<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Student;
use App\Models\Classes;


class Section extends Model
{
    use HasFactory;
    
    protected $fillable = ["name", "class_id"];


    public function students() {
        return $this->hasMany(Student::class);
    }

    public function class() {
        // return $this->belongsTo(Classes::class, 'class_id', 'id');
        return $this->belongsTo(Classes::class, 'class_id');
    }
}
