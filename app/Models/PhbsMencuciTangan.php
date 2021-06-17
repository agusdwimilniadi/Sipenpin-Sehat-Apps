<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class PhbsMencuciTangan extends Model
{
    use HasFactory, HasRoles;
    
    protected $table = 'phbs_mencuci_tangan';
    protected $primaryKey = 'id';
}
