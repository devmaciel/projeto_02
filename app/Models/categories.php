<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;

    //alterar a identificação da PK
    protected $primaryKey = 'id_categoria';
}
