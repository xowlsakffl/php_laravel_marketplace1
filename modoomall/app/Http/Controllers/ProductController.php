<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\File;
use App\Models\ProductCategory;
use App\Traits\FileTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    use FileTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $store = $user->store()->first();

        $products = $store->products()->paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategory = ProductCategory::all();
        return view('products.create', compact('productCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();

        $user = auth()->user();
        $store = $user->store;
        $product = $store->products()->create($data);

        if($request->hasFile('files')){
            $files = $this->fileUpload($request, 'file', $product->pdx);
            $product->files()->createMany($files);
        }

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pdx)
    {
        $user = auth()->user();
        $store = $user->store()->first();
        $product = $store->products()->find($pdx);

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pdx)
    {
        $productCategory = ProductCategory::all();

        $user = auth()->user();
        $store = $user->store;
        $product = $store->products()->find($pdx);

        return view('products.edit', compact('product', 'productCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $pdx)
    {
        $data = $request->all();

        $user = auth()->user();
        $store = $user->store;
        $product = $store->products()->find($pdx);
        $product->update($data);

        if($request->hasFile('files')){
            $files = $this->fileUpload($request, 'file', $product->pdx);
            $product->files()->createMany($files);
        }

        return redirect()->route('products.show', ['pdx' => $pdx]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pdx)
    {
        $user = auth()->user();
        $store = $user->store;
        $product = $store->products()->find($pdx);

        $product->delete();

        return redirect()->route('products.index');
    }
}
