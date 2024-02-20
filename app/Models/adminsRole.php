<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminsRole extends Model
{
    use HasFactory;
    protected $fillable=[
       'admin_id',
       'view_access',
       'edit_access',
       'full_access'
    ];
}
