<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait FileUpload
{
    public function createFile(UploadedFile $file, $disk, $filename = null)
    {
        $filename = $filename ?? uniqid() . '.' . $file->getClientOriginalExtension();
        return $disk->putFileAs(null, $file, $filename);
    }
}
