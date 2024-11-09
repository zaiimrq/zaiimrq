<?php

use Illuminate\Http\UploadedFile;

class UploadService
{
    public static function public(UploadedFile $uploadedFile, string $path = ''): string
    {
        return $uploadedFile->storePublicly($path);
    }
}
