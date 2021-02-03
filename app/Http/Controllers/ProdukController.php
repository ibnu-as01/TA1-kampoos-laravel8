<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProdukRequest;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Facedes\Support\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Produk::all();
        return view('produk.index',compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('produk.create',compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdukRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('assets/produk', 'public');

        Produk::create($data);
        $request->session()->flash('pesan',"data berhasil disimpan");
        return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        $kategoris = Kategori::all();
        $produk->find($produk->id)->all();
        return view('produk.edit',compact('produk','kategoris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $dataId = $produk->find($produk->id);

        $data = $request->all();
        if($request->image){
            Storage::delete('public/'.$dataId->image);
            $data['image'] = $request->file('image')->store('assets/produk', 'public');
        }
        $dataId->update($data);
        session()->flash('edit',"Data{$data['nama_produk']} Berhasil diubah");
        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Produk::findOrFail($id);
        $item->delete();

        return redirect()->route('produk.index');
    }
}
