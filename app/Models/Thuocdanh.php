<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thuocdanh extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'truyen_id',
        'danhmuc_id'
    ];
    protected $primaryKey = 'id';
    protected $table = 'thuocdanh';
}
