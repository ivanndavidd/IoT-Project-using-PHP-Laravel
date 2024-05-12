<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelProject extends Model
{
    use HasFactory;
    protected $table = 'dbsensor';
    protected $primaryKey = 'id';
    protected $fillable = ['sensor','status','alamat'];
}
