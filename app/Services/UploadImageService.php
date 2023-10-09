<?php

namespace App\Services;

use App\Services\Interfaces\UploadImage;
use Illuminate\Support\Facades\Storage;

class UploadImageService implements UploadImage
{

    public function uploadImage($request, string $requestField): string
    {
        $request->validate([ $requestField => ['sometimes', 'image', 'mimes:jpg,jpeg,bmp,png']]);

        $path = Storage::putFile('public/img', $request->file($requestField));
        $url = Storage::url($path);
        return $url;
    }
}
