<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_path',  // Add 'file_path' to the fillable attributes
        'public_key',
        'private_key',
        'serial_number',
    ];
}
