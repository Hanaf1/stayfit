<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nutrisi extends Model
{
    protected $table="nutrisi";
    protected $guarded = ['id'];
    use HasFactory;

    public $timestamps = false;

    
}
