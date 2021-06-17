<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class MasterPerawat extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'wa_perawat';
    protected $primaryKey = 'id';
}
