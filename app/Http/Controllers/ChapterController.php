<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Truyen;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index()
    {
        $chapter = Chapter::with('truyen')->orderBy('id','DESC')->get();
        return view('admin.chapter.index')->with(compact('chapter'));
    }

    public function create()
    {
        $truyen = Truyen::orderBy('id', 'DESC')->get();
        return view('admin.chapter.create')->with(compact('truyen'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'tieude' => 'required|unique:chapter|max:255',
            'slug_chapter' => 'required|unique:chapter|max:255',
            'noidung' => 'required',
            'tomtat' => 'required',
            'kichhoat' => 'required',
            'truyen_id' => 'required',
        ], [
            'tieude.unique'=>'Đã có tiêu đề, Hãy chọn tiêu đề khác',
            'tieude.required'=>'Hãy nhập tiêu đề',
            'noidung.required'=>'Hãy nhập nội dung',
            'tomtat.required'=>'Hãy nhập tóm tắt',
        ]);

        $chapter = new Chapter();
        $chapter->tieude = $data['tieude'];
        $chapter->tomtat = $data['tomtat'];
        $chapter->noidung = $data['noidung'];
        $chapter->kichhoat = $data['kichhoat'];
        $chapter->truyen_id = $data['truyen_id'];
        $chapter->slug_chapter = $data['slug_chapter'];

        $chapter->save();

        return redirect()->back()->with('status','Thêm chapter thành công!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $chapter = Chapter::find($id);
        $truyen = Truyen::orderBy('id', 'DESC')->get();
        return view('admin.chapter.edit')->with(compact('truyen','chapter'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'tieude' => 'required|max:255',
            'slug_chapter' => 'required|max:255',
            'noidung' => 'required',
            'tomtat' => 'required',
            'kichhoat' => 'required',
            'truyen_id' => 'required',
        ], [
            'tieude.required'=>'Hãy nhập tiêu đề',
            'noidung.required'=>'Hãy nhập nội dung',
            'tomtat.required'=>'Hãy nhập tóm tắt',
        ]);

        $chapter = Chapter::find($id);
        $chapter->tieude = $data['tieude'];
        $chapter->tomtat = $data['tomtat'];
        $chapter->noidung = $data['noidung'];
        $chapter->kichhoat = $data['kichhoat'];
        $chapter->truyen_id = $data['truyen_id'];
        $chapter->slug_chapter = $data['slug_chapter'];

        $chapter->save();

        return redirect()->back()->with('status','Cập nhật chapter thành công!');

    }

    public function destroy($id)
    {
        Chapter::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa chapter thành công!');
    }
}
