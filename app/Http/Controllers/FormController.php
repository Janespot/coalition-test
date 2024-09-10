<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $json = Storage::json('formdata.json');

        $sum = array_sum(array_column($json, 'total_value'));

        return view('index', compact('json', 'sum'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $json = Storage::json('formdata.json');

        $data = [
            "name" => $request->input('name'),
            "quantity" => $request->input('quantity'),
            "price" => $request->input('price'),
            "time" => date("Y-m-d H:i:s"),
            "total_value" => (int)$request->input('quantity') * (int)$request->input('price'),
        ];

        $json[] = $data;

        Storage::disk('local')->put('formdata.json', json_encode($json));

        return redirect()->route('submit.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
