<?php

namespace App\Http\Services\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Session;


class SliderService
{


    public function getAllSlider(Type $var = null)
    {
        return Slider::orderbyDesc ('id') -> paginate(15);
    }

    public function insert($request)
    {
        try {
            $request->except('_token');
            Slider::create($request->input());
            Session::flash('success', 'Thêm Slider Thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Slider Thất bại');
            Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function update($slider, $request)
    {
        try {
            $slider->fill($request->input());
            $slider->save();

            $request->session()->flash('success', 'Cập Nhật Slider Thành Công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật Slider Thất Bại');
            Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function destroy($request)
    {
        $slider = Slider::where('id', $request->input('id'))->first();

        if ($slider) {
            $slider->delete();
            return true;
        }

        return false;
    }

    public function show()
    {
        return Slider::where('active', 1)->orderByDesc('sort_by')->get();
    }
}
