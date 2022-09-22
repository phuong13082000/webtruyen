<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\DanhMucTruyen;
use App\Models\TheLoai;
use App\Models\Truyen;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home()
    {
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();
        $theloai = TheLoai::orderBy('id', 'DESC')->get();
        $slide_truyen =  Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();

        $truyen = Truyen::orderBy('id', 'DESC')
            ->where('kichhoat', 0)->get();

        return view('pages.home')->with(compact('danhmuc', 'theloai', 'truyen', 'slide_truyen'));
    }

    public function danhmuc($slug)
    {
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();
        $theloai = TheLoai::orderBy('id', 'DESC')->get();

        $danhmuc_id = DanhMucTruyen::where('slug', $slug)->first();
        $tendanhmuc = $danhmuc_id->tendanhmuc;
        $truyen = Truyen::orderBy('id', 'DESC')
            ->where('kichhoat', 0)
            ->where('danhmuc_id', $danhmuc_id->id)->get();

        return view('pages.danhmuc')->with(compact('danhmuc', 'theloai', 'truyen', 'tendanhmuc'));
    }

    public function theloai($slug)
    {
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();
        $theloai = TheLoai::orderBy('id', 'DESC')->get();

        $theloai_id = TheLoai::where('slug', $slug)->first();
        $tentheloai = $theloai_id->tentheloai;
        $truyen = Truyen::orderBy('id', 'DESC')
            ->where('kichhoat', 0)
            ->where('theloai_id', $theloai_id->id)->get();

        return view('pages.theloai')->with(compact('danhmuc', 'theloai', 'truyen', 'tentheloai'));
    }

    public function xemtruyen($slug)
    {
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();
        $theloai = TheLoai::orderBy('id', 'DESC')->get();

        $truyen = Truyen::with('danhmuctruyen')
            ->where('slug_truyen', $slug)
            ->where('kichhoat', 0)->first();

        $chapter = Chapter::with('truyen')
            ->orderBy('id', 'ASC')
            ->where('truyen_id', $truyen->id)->get();

        $chapter_dau = Chapter::with('truyen')
            ->orderBy('id', 'ASC')
            ->where('truyen_id', $truyen->id)->first();

        $truyen_cungdanhmuc = Truyen::with('danhmuctruyen')
            ->where('danhmuc_id', $truyen->danhmuctruyen->id)
            ->whereNotIn('id', [$truyen->id])->get();    //Lấy tất cả truyện cùng danh mục trừ truyện đang show - WhereNotIn (Nằm trong nhiều)

        return view('pages.truyen')->with(compact('danhmuc', 'theloai', 'truyen', 'chapter', 'chapter_dau', 'truyen_cungdanhmuc'));
    }

    public function xemchapter($slug)
    {
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();
        $theloai = TheLoai::orderBy('id', 'DESC')->get();

        $truyen = Chapter::where('slug_chapter', $slug)->first();

        $chapter = Chapter::with('truyen')
            ->where('slug_chapter', $slug)
            ->where('truyen_id', $truyen->truyen_id)->first();

        $all_chapter = Chapter::with('truyen')
            ->orderBy('id', 'ASC')
            ->where('truyen_id', $truyen->truyen_id)->get();

        $truyen_breadcrumb = Truyen::with('danhmuctruyen', 'theloai')
            ->where('id', $truyen->truyen_id)->first();

        //$max_id = Chapter::where('truyen_id', $truyen->truyen_id)->orderBy('id','DESC')->first();
        //$min_id = Chapter::where('truyen_id', $truyen->truyen_id)->orderBy('id','ASC')->first();
        //$next_chapter = Chapter::where('truyen_id', $truyen->truyen_id)->where('id','>',$chapter->id)->min('slug_chapter');
        //$previous_chapter = Chapter::where('truyen_id', $truyen->truyen_id)->where('id','<',$chapter->id)->min('slug_chapter');

        return view('pages.chapter')->with(compact('danhmuc', 'theloai', 'chapter', 'all_chapter', 'truyen_breadcrumb'));
    }

    public function timkiem()
    {
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();
        $theloai = TheLoai::orderBy('id', 'DESC')->get();

        $tukhoa = $_GET['tukhoa'];
        $truyen = Truyen::with('danhmuctruyen', 'theloai')
            ->where('tentruyen', 'LIKE', '%' . $tukhoa . '%')
            ->orWhere('tomtat', 'LIKE', '%' . $tukhoa . '%')
            ->orWhere('tacgia', 'LIKE', '%' . $tukhoa . '%')->get();

        return view('pages.timkiem')->with(compact('danhmuc', 'truyen', 'theloai', 'tukhoa'));
    }
}
