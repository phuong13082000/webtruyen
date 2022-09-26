<?php

namespace App\Http\Controllers;

use App\Http\Requests\TruyenRequest;
use App\Models\DanhMucTruyen;
use App\Models\TheLoai;
use App\Models\Truyen;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TruyenController extends Controller
{

    public function index()
    {
        $list_truyen = Truyen::with('thuocnhieudanhmuctruyen', 'thuocnhieutheloaitruyen')
            ->where('loaitruyen', '=', NULL)
            ->orderBy('id', 'DESC')->get();

        return view('admin.truyen.index')->with(compact('list_truyen'));
    }

    public function create()
    {
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();
        $theloai = TheLoai::orderBy('id', 'DESC')->get();

        return view('admin.truyen.create')->with(compact('danhmuc', 'theloai'));
    }

    public function store(TruyenRequest $request)
    {
        $data = $request->all();
        $truyen = new Truyen();
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->tukhoa = $data['tukhoa'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->kichhoat = $data['kichhoat'];

        $truyen->created_at = Carbon::now('Asia/Ho_Chi_Minh');

        //lấy 1 danh mục gán vào table truyen
        foreach ($data['danhmuc'] as $key => $danh) {
            $truyen->danhmuc_id = $danh[0];
        }

        //lấy 1 thể loaị gán vào table truyen
        foreach ($data['theloai'] as $key => $the) {
            $truyen->theloai_id = $the[0];
        }

        //them anh vao folder hinh
        $get_image = $request->hinhanh;
        $path = 'public/uploads/truyen/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);

        $truyen->hinhanh = $new_image;
        $truyen->save();

        $truyen->thuocnhieudanhmuctruyen()->attach($data['danhmuc']);
        $truyen->thuocnhieutheloaitruyen()->attach($data['theloai']);

        return redirect()->back()->with('status', 'Thêm truyện thành công!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $truyen = Truyen::find($id);
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();
        $theloai = TheLoai::orderBy('id', 'DESC')->get();

        $thuocdanhmuc = $truyen->thuocnhieudanhmuctruyen;
        $thuoctheloai = $truyen->thuocnhieutheloaitruyen;

        return view('admin.truyen.edit')->with(compact('truyen', 'danhmuc', 'theloai', 'thuocdanhmuc', 'thuoctheloai'));
    }

    public function update(Request $request, $id)
    {
        $truyen = Truyen::find($id);
        $data = $request->all();

        $truyen->thuocnhieudanhmuctruyen()->sync($data['danhmuc']);
        $truyen->thuocnhieutheloaitruyen()->sync($data['theloai']);

        $truyen->tentruyen = $data['tentruyen'];
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->tukhoa = $data['tukhoa'];
        $truyen->kichhoat = $data['kichhoat'];

        $truyen->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        //lấy 1 danh mục gán vào table truyen
        foreach ($data['danhmuc'] as $key => $danh) {
            $truyen->danhmuc_id = $danh[0];
        }

        //lấy 1 thể loaị gán vào table truyen
        foreach ($data['theloai'] as $key => $the) {
            $truyen->theloai_id = $the[0];
        }
        
        //them anh vao folder hinh
        $get_image = $request->hinhanh;
        $path = 'public/uploads/truyen/' . $truyen->hinhanh;
        if ($get_image) {
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'public/uploads/truyen/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);

            $truyen->hinhanh = $new_image;
        }
        $truyen->save();

        return redirect()->back()->with('status', 'Cập nhật truyện thành công!');
    }

    public function destroy($id)
    {
        $truyen = Truyen::find($id);
        $path = 'public/uploads/truyen/' . $truyen->hinhanh;
        if (file_exists($path)) {
            unlink($path);
        }
        Truyen::find($id)->delete();
        return redirect()->back()->with('status', 'Xoá chuyện thành công!');
    }
}
