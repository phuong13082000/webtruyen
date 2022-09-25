<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    use HasFactory;

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;

    protected $fillable = [
        'tentruyen',
        'tomtat',
        'tukhoa',
        'tacgia',
        'kichhoat',
        'slug_truyen',
        'hinhanh',
        'danhmuc_id',
        'theloai_id',
        'created_at',
        'updated_at',
    ];
    
    protected $primaryKey = 'id';
    protected $table = 'truyen';

    public function danhmuctruyen()
    {
        return $this->belongsTo('App\Models\DanhMucTruyen', 'danhmuc_id', 'id');
    }

    public function theloai()
    {
        return $this->belongsTo('App\Models\TheLoai', 'theloai_id', 'id');
    }

    public function chapter()
    {
        return $this->hasMany('App\Models\Chapter', 'truyen_id', 'id');
    }

    public function thuocnhieudanhmuctruyen()
    {
        return $this->belongsToMany(DanhMucTruyen::class, 'thuocdanh', 'truyen_id', 'danhmuc_id');
    }

    public function thuocnhieutheloaitruyen()
    {
        return $this->belongsToMany(TheLoai::class, 'thuocloai', 'truyen_id', 'theloai_id');
    }
}
