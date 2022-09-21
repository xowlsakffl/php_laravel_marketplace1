<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\File;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->all();

        $user = auth()->user();

        $user->store()->create($data);

        if($request->hasFile('logo')){
            $data['logo'] = $this->fileUpload($request, 'logo');
            File::create($data['logo']);
        }

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $sdx
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = auth()->user();

        $store = $user->store;

        return view('stores.show', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $sdx
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = auth()->user();
        $store = $user->store;

        return view('stores.edit', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $sdx
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request)
    {
        $data = $request->all();

        $user = auth()->user();

        $store = $user->store()->update($data);

        return redirect()->route('stores.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $sdx
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user = auth()->user();

        $store = $user->store()->delete();

        return redirect()->route('home');
    }
}
