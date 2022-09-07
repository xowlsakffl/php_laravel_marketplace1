<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class AdminStoreController extends Controller
{
    public function index(){
        $stores = Store::paginate(10);

        return view('admin.stores.index', compact('stores'));
    }

    public function create(){
        $users = User::all(['udx', 'name']);

        return view('admin.stores.create', compact('users'));
    }

    public function store(Request $request){
        $data = $request->all();

        $user = User::find($data['user']);

        $store = $user->store()->create($data);

        flash('Store is created.')->success();
        return $store;
    }

    public function edit($sdx){
        $store = Store::find($sdx);

        return view('admin.stores.edit', compact('store'));
    }

    public function update(Request $request, $sdx){
        $data = $request->all();

        $store = Store::find($sdx);

        $store->update($data);

        flash('Store is changed.')->success();
        return redirect()->route('admin.stores.index');
    }

    public function destroy($sdx){
        $store = Store::find($sdx);

        $store->delete();

        flash('Store is deleted.')->success();
        return redirect()->route('admin.stores.index');
    }
}
