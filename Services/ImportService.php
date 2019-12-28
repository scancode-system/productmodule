<?php

namespace Modules\Product\Services;

use Illuminate\Support\Facades\Storage;
use Modules\Product\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportService {

    public function import()
    {
        Excel::import(new ProductsImport, 'token/produtos.xlsx');
    }

    public function images($path_images)
    {
        $files = Storage::files($path_images);
        foreach ($files as $file) {
            $file_name = str_replace($path_images, '', $file);
            if(Storage::exists('public/produtos/'.$file_name)){
                Storage::delete('public/produtos/'.$file_name);
            }
            Storage::copy($file, 'public/produtos/'.$file_name);
        }
    }

}
