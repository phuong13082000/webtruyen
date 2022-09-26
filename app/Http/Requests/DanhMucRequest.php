<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhMucRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if (request()->isMethod('post')) {
            return [
                'tendanhmuc' => 'required|unique:danhmuc|max:255',
                'slug' => 'required|max:255',
                'mota' => 'required|max:255',
                'kichhoat' => 'required',
            ];
        } else {
            return [
                'tendanhmuc' => 'required|unique:danhmuc|max:255',
                'mota' => 'required|max:255',
            ];
        }
    }

    public function messages()
    {
        if (request()->isMethod('post')) {
            return [
                'tendanhmuc.required'=>'Vui lòng nhập tên danh mục!',
                'unique.tendanhmuc'=>'Đã có tên danh mục, vui lòng đổi tên khác!',
                'slug.required'=>'Vui lòng nhập slug!',
                'mota.required'=>'Vui lòng nhập mô tả!',
            ];
        } else {
            return [
                'tendanhmuc.required'=>'Vui lòng nhập tên danh mục!',
                'unique.tendanhmuc'=>'Đã có tên danh mục, vui lòng đổi tên khác!',
                'mota.required'=>'Vui lòng nhập mô tả!',
            ];
        }
    }
}
