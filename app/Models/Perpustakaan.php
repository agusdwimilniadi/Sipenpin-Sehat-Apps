<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Perpustakaan extends Model
{
    use HasFactory, HasRoles;
    
    protected $table = 'perpustakaan_sehat';
    protected $primaryKey = 'id';
}
