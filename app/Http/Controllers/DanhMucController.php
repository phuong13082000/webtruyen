<?php

namespace App\Http\Controllers;

use App\Models\DanhMucTruyen;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhMucTruyen = DanhMucTruyen::orderBy('id','DESC')->get();
        return view('admin.danhmuc.index')->with(compact('danhMucTruyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.danhmuc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'tendanhmuc' =>'required|unique:danhmuc|max:255',
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
        $danhMucTruyen->mota = $data['mota'];
        $danhMucTruyen->kichhoat = $data['kichhoat'];

        $danhMucTruyen->save();
        return redirect()->back()->with('status','Thêm danh mục thành công!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.danhmuc.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DanhMucTruyen::find($id)->delete();
        return redirect()->back()->with('status','Xóa danh mục thành công!');

    }
}
