<?php

namespace App\Traits;

trait UploadFile
{
    public function fileUpload($image , $directory){
        $image_extention = $image->getClientOriginalExtension();

        $image_name= time().'_' . rand(1000 , 9999) .'.'.$image_extention;

        $image->move($directory ,$image_name );
        return $directory.'/'. $image_name;
      }
}
