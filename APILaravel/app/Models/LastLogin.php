<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LastLogin extends Model
{
    use HasFactory;

    protected $table = 'tb_last_login';

    protected $guarded = ['created_at', 'updated_at'];
}
