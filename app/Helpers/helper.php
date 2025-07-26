<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

if (!function_exists('uploadImage')) {
    function uploadImage(UploadedFile $image, $folder = '')
    {
        $imageName = time() . '_' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('images/' . $folder);

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        $image->move($destinationPath, $imageName);

        return $imageName;
    }
}

if (!function_exists('deleteImage')) {
    function deleteImage($imageName, $folder = '')
    {
        $imagePath = public_path('images/' . $folder . '/' . $imageName);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
            return true;
        }
        return false;
    }
}
