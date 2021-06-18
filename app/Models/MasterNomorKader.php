<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class MasterNomorKader extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'nomor_darurat_kader';
    protected $primaryKey = 'id';
}
