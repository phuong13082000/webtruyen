<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChapterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if (request()->isMethod('post')) {
            return [
                'tieude' => 'required|unique:chapter|max:255',
                'slug_chapter' => 'required|unique:chapter|max:255',
                'noidung' => 'required',
                'tomtat' => 'required',
                'kichhoat' => 'required',
                'truyen_id' => 'required',
            ];
        } else {
            return [
                'tieude' => 'required|max:255',
                'slug_chapter' => 'required|max:255',
                'noidung' => 'required',
                'tomtat' => 'required',
                'kichhoat' => 'required',
                'truyen_id' => 'required',
            ];
        }
    }

    public function messages()
    {
        if (request()->isMethod('post')) {
            return [
                'tieude.unique'=>'Đã có tiêu đề, Hãy chọn tiêu đề khác',
                'tieude.required'=>'Hãy nhập tiêu đề',
                'noidung.required'=>'Hãy nhập nội dung',
                'tomtat.required'=>'Hãy nhập tóm tắt',
            ];
        } else {
            return [
                'tieude.required'=>'Hãy nhập tiêu đề',
                'noidung.required'=>'Hãy nhập nội dung',
                'tomtat.required'=>'Hãy nhập tóm tắt',
            ];
        }
    }
}
