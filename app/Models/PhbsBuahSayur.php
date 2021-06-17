<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class PhbsBuahSayur extends Model
{
    use HasFactory, HasRoles;
    
    protected $table = 'phbs_buah_sayur';
    protected $primaryKey = 'id';
}
