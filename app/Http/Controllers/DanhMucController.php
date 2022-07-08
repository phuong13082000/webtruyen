<?php

namespace App\Http\Controllers;

use App\Models\DanhMucTruyen;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public function index()
    {
        $danhMucTruyen = DanhMucTruyen::orderBy('id','DESC')->get();
        return view('admin.danhmuc.index')->with(compact('danhMucTruyen'));
    }

    public function create()
    {
        return view('admin.danhmuc.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'tendanhmuc' =>'required|unique:danhmuc|max:255',
            'slug' =>'required|max:255',
            'mota'=>'required|max:255',
            'kichhoat'=>'required',
        ],
            [
                'tendanhmuc.required'=>'Vui lòng nhập tên danh mục!',
                'unique.tendanhmuc'=>'Đã có tên danh mục, vui lòng đổi tên khác!',
                'mota.required'=>'Vui lòng nhập mô tả!',
            ]
        );
        $danhMucTruyen = new DanhMucTruyen();
        $danhMucTruyen->tendanhmuc = $data['tendanhmuc'];
        $danhMucTruyen->slug = $data['slug'];
        $danhMucTruyen->mota = $data['mota'];
        $danhMucTruyen->kichhoat = $data['kichhoat'];

        $danhMucTruyen->save();
        return redirect()->back()->with('status','Thêm danh mục thành công!');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $danhmuc = DanhMucTruyen::find($id);
        return view('admin.danhmuc.edit')->with(compact('danhmuc'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'tendanhmuc' =>'required||max:255',
            'slug' =>'required||max:255',
            'mota'=>'required|max:255',
            'kichhoat'=>'required',
        ],
            [
                'tendanhmuc.required'=>'Vui lòng nhập tên danh mục!',
                'mota.required'=>'Vui lòng nhập mô tả!',
            ]
        );
        $danhMucTruyen = DanhMucTruyen::find($id);
        $danhMucTruyen->tendanhmuc = $data['tendanhmuc'];
        $danhMucTruyen->slug = $data['slug'];
        $danhMucTruyen->mota = $data['mota'];
        $danhMucTruyen->kichhoat = $data['kichhoat'];

        $danhMucTruyen->save();
        return redirect()->back()->with('status','Cập nhật danh mục thành công!');
    }

    public function destroy($id)
    {
        DanhMucTruyen::find($id)->delete();
        return redirect()->back()->with('status','Xóa danh mục thành công!');

    }
}
