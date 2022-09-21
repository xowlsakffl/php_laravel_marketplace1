<?php
  
namespace App\Traits;
  
use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait FileTrait{
    private function fileUpload(Request $request, $column, $pdx = null)
    {
        $files = $request->file('files');

        $uploadedFiles = [];

        if(is_array($files)){
            foreach($files as $file){
                $uploadedFiles[] = [
                        'udx' => auth()->user()->udx,
                        'pdx' => $pdx?$pdx:0,
                        'up_name' => $file->getClientOriginalName(),
                        'real_name' => $file->storeAs('products', date('ymdHis'.intval(microtime(true) * 1000)).Str::random(20).".".$file->getClientOriginalExtension(), 'public'),
                        'size' => $file->getSize(),
                        'extension' => $file->getClientOriginalExtension(),
                        'state' => 10,
                        'created_at' => date('y-m-d h:i:s'),
                        'updated_at' => date('y-m-d h:i:s'),
                        ];
            }
        }else{
            foreach($files as $file){
                $uploadedFiles = [
                        'udx' => auth()->user()->udx,
                        'pdx' => $pdx?$pdx:0,
                        'up_name' => $file->getClientOriginalName(),
                        'real_name' => $file->storeAs('products', date('ymdHis'.intval(microtime(true) * 1000)).Str::random(20).".".$file->getClientOriginalExtension(), 'public'),
                        'size' => $file->getSize(),
                        'extension' => $file->getClientOriginalExtension(),
                        'state' => 10,
                        'created_at' => date('y-m-d h:i:s'),
                        'updated_at' => date('y-m-d h:i:s'),
                        ];
            }
        }
        

        return $uploadedFiles;
    }
}
