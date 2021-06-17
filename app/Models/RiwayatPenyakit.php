<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class RiwayatPenyakit extends Model
{
    use HasFactory, HasRoles;
    
    protected $table = 'riwayat_penyakit';
    protected $primaryKey = 'id';
}
