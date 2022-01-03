<?php
namespace App\Classes;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FileUpload
{
    public function uploadFile($request, $fieldname, $file, $folder)
     {
        if ($request->hasFile($fieldname)) {
            $source = $request->file($fieldname);
            $file_name = "fairex"."-".Str::random(8).".". str_replace(' ', '-', $source->getClientOriginalName());
            if ($file != "") {
                if (Storage::disk("local")->exists("public/".$folder . '/' . $file)) {
                    Storage::disk("local")->delete("public/".$folder . '/' . $file);
                }
            }
           $source->storeAs('public/'.$folder, $file_name );
           return  $file_name;
        }
     }

    public function base64ImgUpload($requesFile,$file,$folder)
    {
        $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '',$requesFile));
        $imageName = "fairmart"."-".Str::random(10).'.png';
        if ($file != "") {
            if (Storage::disk("s3")->exists("public/".$folder . '/' . $file)) {
                Storage::disk("s3")->delete("public/".$folder . '/' . $file);
            }
        }
        Storage::disk('s3')->put('public/'.$folder.'/' . $imageName, $image);
        return  $imageName;
    }

     public function fileDelete($folder,$file)
     {
        if (Storage::disk("s3")->exists('public/'.$folder.'/' .$file)) {
            Storage::disk("s3")->delete('public/'.$folder.'/'  .$file);
        }
        return true;
     }
}
