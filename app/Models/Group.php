<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['proj_id', 'stud_count'];
    public $timestamps = false;

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function projects()
    {
        return $this->belongsTo(Project::class);
    }
}
