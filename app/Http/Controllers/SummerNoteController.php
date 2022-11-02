<?php

namespace App\Http\Controllers;

use App\Helper\RazkyFeb;
use App\Models\News;
use Illuminate\Http\Request;

class SummerNoteController extends Controller
{

    public function destroyImage(Request $request){
        $src = $request->src;
        echo $src;
        RazkyFeb::removeFile($src);
    }

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // can also use file name
            $fileName = time() . '.' . $extension;

            $savePath = "/web_files/summernote/";
            $savePathDB = "$savePath$fileName";
            $path = public_path() . "$savePath";
            $file->move($path, $fileName);

            $photoPath = $savePathDB;
            echo url($photoPath); //showed URL
        }else{
            echo url("/");
        }
    }

}
