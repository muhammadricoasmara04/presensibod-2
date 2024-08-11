<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participan extends Model
{
    use HasFactory;
    protected $table = 'presensi'; // 
    protected $primaryKey = 'id';
}
