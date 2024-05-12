<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['berita'] = Berita::orderBy('id','asc')->get();
        $data['page_title'] = 'Berita';
        // dd($data['car']->id);
		return view('berita/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['page_title'] = 'Berita';
        // dd($data['car']->id);
		return view('berita/tambah-berita',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $new = new Berita();
            $new->judul = $request->judul;
            $new->slug = Str::slug($request->judul);
            $new->detail = $request->detail;
            $new->created_by = Auth::user()->id;
            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('assets/img/thumbnail/');
                $image->move($destinationPath, $name);
                $new->image = $name;
            }
    
            if ($new->save()) {
                return redirect()->route('list-berita')->with('success','Successfuly Created Data!');
            }else{
                return redirect()->back()->with('failed','Failed Created Data!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed',$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['berita'] = Berita::where('slug',$id)->first();
        $data['page_title'] = $data['berita']->judul;
		return view('landing/detail-berita',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['berita'] = Berita::find($id);
        $data['page_title'] = 'Berita';
        // dd($data['car']->id);
		return view('berita/edit-berita',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $new = Berita::find($id);
            $new->judul = $request->judul;
            $new->slug = Str::slug($request->judul);
            $new->detail = $request->detail;
            $new->created_by = Auth::user()->id;
            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('assets/img/thumbnail/');
                $image->move($destinationPath, $name);
                $new->image = $name;
            }
    
            if ($new->save()) {
                return redirect()->route('list-berita')->with('success','Successfuly Updated Data!');
            }else{
                return redirect()->back()->with('failed','Failed Updated Data!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed',$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $new = Berita::find($id);
            if ($new->delete()) {
                return redirect()->route('list-berita')->with('success','Successfuly Deleted Data!');
            }else{
                return redirect()->back()->with('failed','Failed Deleted Data!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed',$th->getMessage());
        }
    }
}
