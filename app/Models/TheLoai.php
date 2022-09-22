<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'tentheloai',
        'slug',
        'mota',
        'kichhoat',
    ];
    protected $primaryKey = 'id';
    protected $table = 'theloai';

    public function truyen()
    {
        return $this->hasMany('App\Models\Truyen');
    }
}
