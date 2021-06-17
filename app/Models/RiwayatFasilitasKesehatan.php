<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class RiwayatFasilitasKesehatan extends Model
{
    use HasFactory, HasRoles;
    
    protected $table = 'riwayat_fasilitas_kesehatan';
    protected $primaryKey = 'id';
}
