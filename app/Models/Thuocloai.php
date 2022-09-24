<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thuocloai extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'truyen_id',
        'theloai_id'
    ];
    protected $primaryKey = 'id';
    protected $table = 'thuocloai';
}
