<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function removeFile(Request $request)
    {
        $fileName = $request->get('fileName');

        if(Storage::disk('public')->exists($fileName)){
            Storage::disk('public')->delete($fileName);
        } 

        $removeFile = File::where('real_name', $fileName);
        $product = $removeFile->first();

        $removeFile->delete();

        return redirect()->back();
    }
}
