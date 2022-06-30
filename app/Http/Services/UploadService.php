<?php

namespace App\Http\Services;
use Illuminate\Http\Request;

class UploadService
{
    public function store($request)
    {
        if ($request->hasFile('thumb')) {
            try {
                $name = $request->file('thumb')->getClientOriginalName();

                $pathFull = 'upload/'.date("Y/m/d");

                $path = $request->file('thumb')->storeAs(
                    'public/'.$pathFull, $name
                );

                return '/storage/' . $pathFull . '/' . $name;
            } catch (\Exception $error) {
                return false;
            }

        }
    }
}
