<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['proj_title', 'groups_count'];
    public $timestamps = false;

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}