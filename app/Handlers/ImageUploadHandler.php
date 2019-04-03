<?php

namespace App\Handlers;

class ImageUploadHandler
{
    protected $allowed_ext = ['png', 'jpg', 'gif', 'jpeg'];

    public function save($file, $folder, $file_prefix = null)
    {
        $extension = strtolower($file->getClientOriginalExtension());
        if (!in_array($extension, $this->allowed_ext, true)) {
            return $this->notAllowedExtension();
        }

        $folder_name = $this->makeFolderName($folder);

        $upload_path = public_path() . '/' . $folder_name;

        $filename = $this->makeFileName($extension, $file_prefix);

        $file->move($upload_path, $filename);

        $path = "/$folder_name/$filename";
        return [
            'path' => $path,
            'url' => config('app.url') . $path,
        ];
    }

    public function makeFolderName($folder = '')
    {
        return implode('/', array_diff(["uploads/images", $folder , date('Ym/d')], ['', null]));;
    }

    public function makeFileName($extension, $prefix = null)
    {
        return implode('_', array_diff([$prefix, time(), str_random(10)], ['', null])) . '.' . $extension;
    }

    public function notAllowedExtension()
    {
        throw new Exception('不被允许的图片格式，仅支持：' . implode('、', $this->allowed_ext) . ' 格式图片');
    }
}
