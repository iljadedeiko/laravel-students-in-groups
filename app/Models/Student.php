<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['stud_full_name', 'group_id'];
    public $timestamps = false;

    public function groups()
    {
        return $this->belongsTo(Group::class);
    }
}
