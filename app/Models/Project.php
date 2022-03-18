<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['proj_title', 'proj_groups_count'];
    public $timestamps = false;

    public function groups()
    {
        return $this->hasMany(Group::class, 'project_id', 'id');
    }

    public function students()
    {
        return $this->hasManyThrough(Student::class, Group::class);
    }
}
