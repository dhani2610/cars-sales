<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Spesifikasi;
use Illuminate\Http\Request;

class SpesifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $data['spesifikasi'] = Spesifikasi::where('id_cars',$id)->orderBy('id','asc')->get();
        $data['car'] = Car::where('id',$id)->orderBy('id','desc')->first();
        $data['page_title'] = 'Spesifikasi '.$data['car']->nama ?? '';
        // dd($data['car']->id);
		return view('kategori/spesifikasi',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request,$id)
    {
        $data['car'] = Car::where('id',$id)->orderBy('id','desc')->first();
        $data['page_title'] = 'Tambah Spesifikasi '.$data['car']->nama ?? '';
        // dd($data);
		return view('kategori/tambah-spesifikasi',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $new = new Spesifikasi();
            $new->id_cars = $request->id_cars;
            $new->judul = $request->judul;
            $new->detail = $request->detail;
            if ($new->save()) {
                return redirect()->route('list-spesifikasi',$new->id_cars)->with('success','Successfuly Created Data!');
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
    public function show(Spesifikasi $spesifikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['spesifikasi'] = Spesifikasi::where('id',$id)->first();
        $data['car'] = Car::where('id',$data['spesifikasi']->id_cars)->first();
        $data['page_title'] = 'Edit Spesifikasi ';
        // dd($data);
		return view('kategori/edit-spesifikasi',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $new = Spesifikasi::find($id);
            $new->id_cars = $request->id_cars;
            $new->judul = $request->judul;
            $new->detail = $request->detail;
            if ($new->save()) {
                return redirect()->route('list-spesifikasi',$new->id_cars)->with('success','Successfuly Updated Data!');
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
            $new = Spesifikasi::find($id);
            if ($new->delete()) {
                return redirect()->back()->with('success','Successfuly Deleted Data!');
            }else{
                return redirect()->back()->with('failed','Failed Deleted Data!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed',$th->getMessage());
        }
    }
}
