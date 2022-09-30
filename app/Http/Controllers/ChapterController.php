<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChapterRequest;
use App\Models\Chapter;
use App\Models\Truyen;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:add|edit|watch|delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:add', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $chapter = Chapter::with('truyen')->orderBy('id', 'DESC')->get();
        return view('admin.chapter.index')->with(compact('chapter'));
    }

    public function create()
    {
        $truyen = Truyen::orderBy('id', 'DESC')->get();
        return view('admin.chapter.create')->with(compact('truyen'));
    }

    public function store(ChapterRequest $request)
    {
        $data = $request->all();

        $chapter = new Chapter();
        $chapter->tieude = $data['tieude'];
        $chapter->tomtat = $data['tomtat'];
        $chapter->noidung = $data['noidung'];
        $chapter->kichhoat = $data['kichhoat'];
        $chapter->truyen_id = $data['truyen_id'];
        $chapter->slug_chapter = $data['slug_chapter'];

        $chapter->save();

        return redirect()->router('chapter.index')->with('status', 'Thêm chapter thành công!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $chapter = Chapter::find($id);
        $truyen = Truyen::orderBy('id', 'DESC')->get();
        return view('admin.chapter.edit')->with(compact('truyen', 'chapter'));
    }

    public function update(ChapterRequest $request, $id)
    {
        $data = $request->all();

        $chapter = Chapter::find($id);
        $chapter->tieude = $data['tieude'];
        $chapter->tomtat = $data['tomtat'];
        $chapter->noidung = $data['noidung'];
        $chapter->kichhoat = $data['kichhoat'];
        $chapter->truyen_id = $data['truyen_id'];
        $chapter->slug_chapter = $data['slug_chapter'];

        $chapter->save();

        return redirect()->router('chapter.index')->with('status', 'Cập nhật chapter thành công!');
    }

    public function destroy($id)
    {
        Chapter::find($id)->delete();
        return redirect()->router('chapter.index')->with('status', 'Xóa chapter thành công!');
    }
}
