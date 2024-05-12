<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class RegisterController extends Controller
{
    public function create()
    {
        return view('session.register');
    }

    public function store(Request $request)
    {
        try {
            $new = new User();
            $new->name = $request->name;
            $new->role = "User";
            $new->email = $request->email;
            $new->phone = $request->phone;
            $randomPassword = Str::random(10);
            $new->pw_text = $randomPassword;
            $new->password = bcrypt($randomPassword);
    
            if ($new->save()) {
                return redirect()->back()->with('success','Berhasil Register! Silahkan Simpan dan Gunakan Informasi tersebut untuk login ke akun anda (Stambuk / NIDN : '.$request->stambuk.' Password : '.$randomPassword.')');
            }else{
                return redirect()->back()->with('failed','Gagal Register!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Gagal Register,Mohon hubungi Developer!');
        }
    }
}
