<?php
/**
 * Created by PhpStorm.
 * User: Dimsa
 * Date: 21.02.2020
 * Time: 18:11
 */

namespace App\Http\CustomServices;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileUploader
{
    public static function changeStorageFile(UploadedFile $file ,string $name, string $directory = '', string $oldName = '')
    {
        Storage::delete($directory.'/'.$oldName);
        $file->storeAs($directory, $name);
    }
}