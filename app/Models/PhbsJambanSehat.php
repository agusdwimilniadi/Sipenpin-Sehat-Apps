<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class PhbsJambanSehat extends Model
{
    use HasFactory, HasRoles;
    
    protected $table = 'phbs_jamban_sehat';
    protected $primaryKey = 'id';
}
