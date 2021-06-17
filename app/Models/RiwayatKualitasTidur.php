<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class RiwayatKualitasTidur extends Model
{
    use HasFactory, HasRoles;
    
    protected $table = 'riwayat_kualitas_tidur';
    protected $primaryKey = 'id';
}
