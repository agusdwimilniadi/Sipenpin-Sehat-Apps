<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class MasterKader extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'wa_kader';
    protected $primaryKey = 'id';
}
