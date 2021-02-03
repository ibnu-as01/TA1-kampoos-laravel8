<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\galleryRequest;
use App\Models\gallery;
use Iluminate\Support\Facades\Storage;
class galleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = gallery::all();
        return view('gallery.index',compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(galleryRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('assets/gallery', 'public');

        gallery::create($data);
        $request->session()->flash('pesan',"data berhasil disimpan");
        return redirect()->route('gallery.index');
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
    public function edit(gallery $gallery)
    {
        $gallery->find($gallery->id)->all();
        return view('gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(galleryRequest $request, gallery $gallery)
    {
        $dataId = $gallery->find($gallery->id);
        $data = $request->all();
        if($request->image){
            Storage::delete('public/',$dataId->image);
            $data['image'] = $request->file('image')->store('assets/gallery', 'public');
        }

        $dataId->update($data);
        session()->flash('edit',"Data{$data['nama']} Berhasil diubah");
        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = gallery::findOrFail($id);
        $items->delete();

        return redirect()->route('gallery.index');
    }
}
