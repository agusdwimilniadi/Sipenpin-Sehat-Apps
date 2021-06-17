<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class RiwayatAktivitasFisik extends Model
{
    use HasFactory, HasRoles;
    
    protected $table = 'riwayat_aktivitas_fisik';
    protected $primaryKey = 'id';
}
