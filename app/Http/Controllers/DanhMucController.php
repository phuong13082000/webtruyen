<?php

namespace App\Http\Controllers;

use App\Http\Requests\DanhMucRequest;
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

    public function store(DanhMucRequest $request)
    {
        $data = $request->all();
        $danhMucTruyen = new DanhMucTruyen();
        $danhMucTruyen->tendanhmuc = $data['tendanhmuc'];
        $danhMucTruyen->slug = $data['slug'];
        $danhMucTruyen->mota = $data['mota'];
        $danhMucTruyen->kichhoat = $data['kichhoat'];

        $danhMucTruyen->save();
        return redirect()->route('danhmuc.index')->with('status','Thêm danh mục thành công!');

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
        $data = $request->all();
        $danhMucTruyen = DanhMucTruyen::find($id);
        $danhMucTruyen->tendanhmuc = $data['tendanhmuc'];
        $danhMucTruyen->slug = $data['slug'];
        $danhMucTruyen->mota = $data['mota'];
        $danhMucTruyen->kichhoat = $data['kichhoat'];

        $danhMucTruyen->save();
        return redirect()->route('danhmuc.index')->with('status','Cập nhật danh mục thành công!');
    }

    public function destroy($id)
    {
        DanhMucTruyen::find($id)->delete();
        return redirect()->route('danhmuc.index')->with('status','Xóa danh mục thành công!');
    }
}
