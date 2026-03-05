<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vlog extends Model
{
     protected $table = 'vlogs';
    protected $fillable = ['user_id','note_id','status'];
    /** @use HasFactory<\Database\Factories\VlogFactory> */
    use HasFactory;
}
