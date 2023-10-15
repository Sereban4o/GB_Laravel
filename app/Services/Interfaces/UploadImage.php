<?php

namespace App\Services\Interfaces;

interface UploadImage
{
public function uploadImage($request, string $requestField): string;
}
