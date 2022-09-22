<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\DanhMucTruyen;
use App\Models\Truyen;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home()
    {
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();

        $truyen = Truyen::orderBy('id', 'DESC')
            ->where('kichhoat', 0)->get();

        return view('pages.home')->with(compact('danhmuc', 'truyen'));
    }

    public function danhmuc($slug)
    {
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();

        $danhmuc_id = DanhMucTruyen::where('slug', $slug)->first();
        $tendanhmuc = $danhmuc_id->tendanhmuc;
        $truyen = Truyen::orderBy('id', 'DESC')
            ->where('kichhoat', 0)
            ->where('danhmuc_id', $danhmuc_id->id)->get();

        return view('pages.danhmuc')->with(compact('danhmuc', 'truyen', 'tendanhmuc'));
    }


    public function xemtruyen($slug)
    {
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();

        $truyen = Truyen::with('danhmuctruyen')
            ->where('slug_truyen', $slug)
            ->where('kichhoat', 0)->first();

        $chapter = Chapter::with('truyen')
            ->orderBy('id', 'DESC')
            ->where('truyen_id', $truyen->id)->get();

        $chapter_dau = Chapter::with('truyen')
            ->orderBy('id', 'ASC')
            ->where('truyen_id', $truyen->id)->first();

        $truyen_cungdanhmuc = Truyen::with('danhmuctruyen')
            ->where('danhmuc_id', $truyen->danhmuctruyen->id)
            ->whereNotIn('id', [$truyen->id])->get();    //Lấy tất cả truyện cùng danh mục trừ truyện đang show - WhereNotIn (Nằm trong nhiều)

        return view('pages.truyen')->with(compact('danhmuc', 'truyen', 'chapter', 'chapter_dau', 'truyen_cungdanhmuc'));
    }

    public function xemchapter($slug)
    {
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();

        $truyen = Chapter::where('slug_chapter',$slug)->first();

        $chapter = Chapter::with('truyen')
            ->where('slug_chapter', $slug)
            ->where('truyen_id', $truyen->truyen_id)->first();

        return view('pages.chapter')->with(compact('danhmuc', 'chapter'));
    }
}
