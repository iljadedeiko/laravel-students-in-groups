<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'proj_title', 'proj_groups_count'];
    public $timestamps = false;

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
