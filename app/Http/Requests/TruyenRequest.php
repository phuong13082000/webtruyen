<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TruyenRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if (request()->isMethod('post')) {
            return [
                'tentruyen' => 'required|max:255',
                'slug_truyen' => 'required|max:255',
                'tomtat' => 'required',
                'tacgia' => 'required',
                'tukhoa' => 'required',
                'kichhoat' => 'required',
                'danhmuc' => 'required',
                'theloai' => 'required',
            ];
        } else {
            return [
                'tentruyen' => 'required|max:255',
                'slug_truyen' => 'required|max:255',
                'tomtat' => 'required',
                'tacgia' => 'required',
                'tukhoa' => 'required',
                'kichhoat' => 'required',
                'danhmuc' => 'required',
                'theloai' => 'required',
            ];
        }
    }

    public function messages()
    {
        if (request()->isMethod('post')) {
            return [
                'tentruyen.required' => 'Vui lòng nhập tên truyện!',
                'tomtat.required' => 'Vui lòng nhập tóm tắt!',
                'tacgia.required' => 'Vui lòng nhập tên tác giả!',
                'tukhoa.required' => 'Vui lòng nhập tên từ khóa!',
            ];
        } else {
            return [
                'tentruyen.required' => 'Vui lòng nhập tên truyện!',
                'tomtat.required' => 'Vui lòng nhập tóm tắt!',
                'tacgia.required' => 'Vui lòng nhập tên tác giả!',
                'tukhoa.required' => 'Vui lòng nhập tên từ khóa!',
            ];
        }
    }
}
