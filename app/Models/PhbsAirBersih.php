<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class PhbsAirBersih extends Model
{
    use HasFactory, HasRoles;
    
    protected $table = 'phbs_air_bersih';
    protected $primaryKey = 'id';
}
