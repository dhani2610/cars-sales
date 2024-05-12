<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,$id)
    {
        // dd($request->all());
        $data['page_title'] = 'Cars';
        $data['cars'] = Car::where('id_kategori',$id)->orderBy('id','desc')->get();
        $data['kat'] = Kategori::where('id',$id)->orderBy('id','desc')->first();
        // dd($data);
		return view('kategori/cars',$data);
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
        try {
            $new = new Car();
            $new->nama = $request->cars;
            $new->slug = Str::slug($request->cars);
            $new->id_kategori = $request->id_kategori;
            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('assets/img/cars/');
                $image->move($destinationPath, $name);
                $new->image = $name;
            }
    
            if ($new->save()) {
                return redirect()->back()->with('success','Successfuly Created Data!');
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
        $data['cars'] = Car::where('slug',$id)->first();
        $data['kat'] = Kategori::where('id',$data['cars']->id_kategori)->orderBy('id','desc')->first();
        $data['page_title'] = 'Detail - '.$data['cars']->nama;
		return view('landing/detail-car',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $new = Car::find($id);
            $new->nama = $request->cars;
            $new->slug = Str::slug($request->cars);
            $new->id_kategori = $request->id_kategori;
            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('assets/img/cars/');
                $image->move($destinationPath, $name);
                $new->image = $name;
            }
    
            if ($new->save()) {
                return redirect()->back()->with('success','Successfuly Created Data!');
            }else{
                return redirect()->back()->with('failed','Failed Created Data!');
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
            $new = Car::find($id);
            if ($new->delete()) {
                return redirect()->back()->with('success','Successfuly Created Data!');
            }else{
                return redirect()->back()->with('failed','Failed Created Data!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed',$th->getMessage());
        }
    }
}
