<?php

namespace App\Http\Services;
use Illuminate\Http\Request;

class UploadService
{
    public function store($request)
    {
        $arr_path = [];
        foreach($request->file('thumbs') as $file) {
            try {
                $name = $file->getClientOriginalName();

                $pathFull = 'upload/'.date("Y/m/d");

                $path = $file->storeAs(
                    'public/'.$pathFull, $name
                );

                $arr_path[] =  '/storage/' . $pathFull . '/' . $name;
            } catch (\Exception $error) {
                return false;
            }
        }
        return $arr_path;
        // if ($request->hasFile('thumb')) {
        //     try {
        //         $name = $request->file('thumb')->getClientOriginalName();

        //         $pathFull = 'upload/'.date("Y/m/d");

        //         $path = $request->file('thumb')->storeAs(
        //             'public/'.$pathFull, $name
        //         );

        //         return '/storage/' . $pathFull . '/' . $name;
        //     } catch (\Exception $error) {
        //         return false;
        //     }

        // }
    }
}
