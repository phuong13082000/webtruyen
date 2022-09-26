<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TheLoaiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if (request()->isMethod('post')) {
            return [
                'tentheloai' => 'required|unique:theloai|max:255',
                'slug' => 'required|max:255',
                'mota' => 'required|max:255',
                'kichhoat' => 'required',
            ];
        } else {
            return [
                'tentheloai' => 'required|max:255',
                'slug' => 'required|max:255',
                'mota' => 'required|max:255',
                'kichhoat' => 'required',
            ];
        }
    }

    public function messages()
    {
        if (request()->isMethod('post')) {
            return [
                'tentheloai.required' => 'Vui lòng nhập tên thể loại!',
                'unique.tendanhmuc' => 'Đã có tên thể loại, vui lòng đổi tên khác!',
                'mota.required' => 'Vui lòng nhập mô tả!',
            ];
        } else {
            return [
                'tentheloai.required' => 'Vui lòng nhập tên thể loại!',
                'mota.required' => 'Vui lòng nhập mô tả!',
            ];
        }
    }
}
