<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['gr_name', 'gr_stud_count', 'project_id'];
    public $timestamps = false;

    public function students()
    {
        return $this->hasMany(Student::class, 'group_id', 'id');
    }

    public function projects()
    {
        return $this->belongsTo(Project::class);
    }
}
