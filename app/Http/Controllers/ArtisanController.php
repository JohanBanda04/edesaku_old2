<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;



class ArtisanController extends Controller
{
    public static function call(Request $request){
        $input = $request->only(['methods', 'clean-files']);
        if (isset($input['methods'])){
            foreach ($input['methods'] as $method) {
                Artisan::call($method);
                $request->session()->flash('berhasil', 'Task was successful!');
            }
        }
        if (isset($input['clean-files'])){
            Storage::deleteDirectory('files');;
        }
        return back();
    }
}
