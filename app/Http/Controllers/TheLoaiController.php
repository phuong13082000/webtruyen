<?php

namespace App\Http\Controllers;

use App\Http\Requests\TheLoaiRequest;
use App\Models\TheLoai;
use Illuminate\Http\Request;

class TheLoaiController extends Controller
{
    public function index()
    {
        $theLoai = TheLoai::orderBy('id', 'DESC')->get();
        return view('admin.theloai.index')->with(compact('theLoai'));
    }

    public function create()
    {
        return view('admin.theloai.create');
    }

    public function store(TheLoaiRequest $request)
    {
        try {
            TheLoai::create([
                'tentheloai' => $request->tentheloai,
                'slug' => $request->slug,
                'mota' => $request->mota,
                'kichhoat' => $request->kichhoat,
            ]);
            return redirect()->route('theloai.index')->with('status', 'Thêm thể loại thành công!');
        } catch (\Exception $e) {
            return redirect()->route('theloai.create')->with('error', 'Lỗi '.$e);
        }
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

    public function update(TheLoaiRequest $request, $id)
    {
        try {
            $theLoai = TheLoai::find($id);

            $theLoai->tentheloai = $request->tentheloai;
            $theLoai->slug = $request->slug;
            $theLoai->mota = $request->mota;
            $theLoai->kichhoat = $request->kichhoat;

            $theLoai->save();
            return redirect()->route('theloai.index')->with('status', 'Cập nhật thể loại thành công!');
        } catch (\Exception $e) {
            return redirect()->route('theloai.edit')->with('error', 'Lỗi '.$e);
        }
    }

    public function destroy($id)
    {
        TheLoai::find($id)->delete();
        return redirect()->route('theloai.index')->with('status', 'Xóa thể loại thành công!');
    }
}
