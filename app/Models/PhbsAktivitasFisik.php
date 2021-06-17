<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class PhbsAktivitasFisik extends Model
{
    use HasFactory, HasRoles;
    
    protected $table = 'phbs_aktivitas_fisik';
    protected $primaryKey = 'id';
}
