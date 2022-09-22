<?php

namespace App\Http\Controllers;

use App\Models\DanhMucTruyen;
use App\Models\Truyen;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home()
    {
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();

        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        return view('pages.home')->with(compact('danhmuc', 'truyen'));
    }

    public function danhmuc($slug)
    {
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();

        $danhmuc_id = DanhMucTruyen::where('slug', $slug)->first();
        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->where('danhmuc_id', $danhmuc_id->id)->get();

        return view('pages.danhmuc')->with(compact('danhmuc', 'truyen'));
    }


    public function xemtruyen($slug)
    {
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();

        return view('pages.truyen')->with(compact('danhmuc'));
    }
}
