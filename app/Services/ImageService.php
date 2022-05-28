<?php

namespace App\Services;

class ImageService
{
    public function storeImage($image, $practice){
        $filename = 'logo.'.$image->getClientOriginalExtension();
        $path = 'images/logos/' .$practice->id .'/';
        $image->storeAs('public/'.$path, $filename);

        return $path.$filename;
    }
}
