<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'truyen_id',
        'tomtat',
        'tieude',
        'slug_chapter',
        'noidung',
        'kichhoat',
    ];
    protected $primaryKey = 'id';
    protected $table = 'chapter';

}
