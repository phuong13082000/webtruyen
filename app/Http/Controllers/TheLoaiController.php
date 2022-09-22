<?php

namespace App\Http\Controllers;

use App\Models\TheLoai;
use Illuminate\Http\Request;

class TheLoaiController extends Controller
{
    public function index()
    {
        $theLoai = TheLoai::orderBy('id','DESC')->get();
        return view('admin.theloai.index')->with(compact('theLoai'));
    }

    public function create()
    {
        return view('admin.theloai.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'tentheloai' =>'required|unique:theloai|max:255',
            'slug' =>'required|max:255',
            'mota'=>'required|max:255',
            'kichhoat'=>'required',
        ],
            [
                'tentheloai.required'=>'Vui lòng nhập tên thể loại!',
                'unique.tendanhmuc'=>'Đã có tên thể loại, vui lòng đổi tên khác!',
                'mota.required'=>'Vui lòng nhập mô tả!',
            ]
        );
        $theLoai = new TheLoai();
        $theLoai->tentheloai = $data['tentheloai'];
        $theLoai->slug = $data['slug'];
        $theLoai->mota = $data['mota'];
        $theLoai->kichhoat = $data['kichhoat'];

        $theLoai->save();
        return redirect()->back()->with('status','Thêm thể loại thành công!');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $theloai = TheLoai::find($id);
        return view('admin.theloai.edit')->with(compact('theloai'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'tentheloai' =>'required||max:255',
            'slug' =>'required||max:255',
            'mota'=>'required|max:255',
            'kichhoat'=>'required',
        ],
            [
                'tentheloai.required'=>'Vui lòng nhập tên thể loại!',
                'mota.required'=>'Vui lòng nhập mô tả!',
            ]
        );
        $theLoai = TheLoai::find($id);
        $theLoai->tentheloai = $data['tentheloai'];
        $theLoai->slug = $data['slug'];
        $theLoai->mota = $data['mota'];
        $theLoai->kichhoat = $data['kichhoat'];

        $theLoai->save();
        return redirect()->back()->with('status','Cập nhật thể loại thành công!');
    }

    public function destroy($id)
    {
        TheLoai::find($id)->delete();
        return redirect()->back()->with('status','Xóa thể loại thành công!');

    }
}
