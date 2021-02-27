<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreRequest;
use App\Traits\UploadTrait;

class StoreController extends Controller
{
    use UploadTrait;

    public function __construct()
    {
        $this->middleware('user.has.store')->only(['create', 'store']);
    }
    public function index(){
        
        $store = auth()->user()->store;
        
        return view('admin.stores.index', compact('store'));
    }

    public function create()
    {
        return view('admin.stores.create');
    }

    public function store(StoreRequest $request){
        $data = $request->all();
        $data['slug'] = $data['name']; # Falta trabalhar o slug

        if($request->hasFile('logo'))
        {
           $data['logo'] = $this->imageUpload($request->file('logo'));
        }

        auth()->user()->store()->create($data);

        flash('Registro salvo')->success();
        return redirect()->route('admin.stores.index');
    }

    public function edit($store){
        $store = \App\Models\Store::find($store);

        return view('admin.stores.edit', compact('store'));
    }

    public function update(StoreRequest $request, $store){
        $data = $request->all();

        $store = \App\Models\Store::find($store);

        if($request->hasFile('logo'))
        {
            if(Storage::disk('public')->exists($store->logo))
            {
                Storage::disk('public')->delete($store->logo);
            }
            $data['logo'] = $this->imageUpload($request->file('logo'));
        }


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
