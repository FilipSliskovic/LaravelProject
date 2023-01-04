<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\NavMenu;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class BackEndController extends OsnovniController
{


    public function UploadImage(UploadedFile $image)
    {

        $imageName = time().'.'.$image->extension();
        $image->move(public_path('assets/img'), $imageName);

        $dbImage = new Image();
        $dbImage->Path = $imageName;
        $dbImage->save();

        return $dbImage->id;
    }
}
