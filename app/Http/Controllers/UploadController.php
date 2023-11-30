<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->files) {
            foreach ($request->files as $file) {
                $filename = Str::random(32) . "." . $file->getClientOriginalExtension();
                $file->move(public_path('files'), $filename);
            }

            Image::create([
                'image_name' => $filename
            ]);


            $response["status"] = "successs";
            $response["message"] = "Success! image(s) uploaded";
        } else {
            $response["status"] = "failed";
            $response["message"] = "Failed! image(s) not uploaded";
        }

        return response()->json($response);
    }
}
