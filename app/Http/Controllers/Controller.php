<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

abstract class Controller
{
    public function Submit(Request $request)
        {

            $data = [
                "name" => $request->input('name'),
                "quantity" => $request->input('quantity'),
                "price" => $request->input('price'),
                "time" => date("Y-m-d H:i:s"),
                "total_value" => $request->input('quantity') *  $request->input('price'),
            ];
            
            Storage::disk('public')->put('formdata.json', json_encode($data));
    
            return redirect()->route('/');
    }
}
