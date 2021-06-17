<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class MasterWhatsapp extends Model
{
    use HasFactory, HasRoles;

    protected $table = 'whatsapp_table';
    protected $primaryKey = 'id';
}
