<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penerbit extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'kode',
        'nama',
    ];
}
