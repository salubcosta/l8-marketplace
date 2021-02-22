<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    //
    public function index(){
        
        $stores = \App\Models\Store::paginate(10);
        
        return view('admin.stores.index', compact('stores'));
    }

    public function create()
    {
        return view('admin.stores.create');
    }

    public function store(Request $request){
        $data = $request->all();

        auth()->user()->store()->create($data);

        flash('Registro salvo')->success();
        return redirect()->route('admin.stores.index');
    }

    public function edit($store){
        $store = \App\Models\Store::find($store);

        return view('admin.stores.edit', compact('store'));
    }

    public function update(Request $request, $store){
        $data = $request->all();

        $store = \App\Models\Store::find($store);

        $store->update($data);

        flash('Registo atualizado!')->success();
        return redirect()->route('admin.stores.index');
    }

    public function destroy($store){
        $store = \App\Models\Store::find($store);
        $store->delete();

        flash('Registro removido!')->success();
        return redirect()->route('admin.stores.index');
    }
}
