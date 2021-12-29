<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Podrska_prvog_nivoa;
use App\Models\Zalbe;
use App\Models\Podrska_drugog_nivoa;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $polja = $request->validate([
            'ime' => 'required|string',
            'prezime' => 'required|string',
            'korisnickoIme' => 'required|string|unique:podrska_prvog_nivoa,korisnickoIme',
            'password' => 'required|string|confirmed',
            'id_nadredjenog' => 'required'
        ]);

        $korisnik = Podrska_prvog_nivoa::create([
            'ime' => $polja['ime'],
            'prezime' => $polja['prezime'],
            'korisnickoIme' => $polja['korisnickoIme'],
            'password' => bcrypt($polja['password']),
            'id_nadredjenog' => $polja['id_nadredjenog']
        ]);

        $token = $korisnik->createToken('aplikacijatoken')->plainTextToken;
        $response = [
            'korisnik' => $korisnik,
            'token' => $token
        ];
        return response($response, 201);
    }

    public function registerDrugiNivo(Request $request)
    {
        $polja = $request->validate([
            'id' => 'required|string',
            'ime' => 'required|string',
            'prezime' => 'required|string'
        ]);

        $radnik = Podrska_prvog_nivoa::find($polja['id']);

        if (is_null($radnik)) {
            return [
                'message' => 'Radnik ne postoji!'
            ];
        }

        $korisnik = Podrska_drugog_nivoa::create([
            'ime' => $radnik['ime'],
            'prezime' => $radnik['prezime'],
            'korisnickoIme' => $radnik['korisnickoIme'],
            'password' => $radnik['password']
        ]);

        $token = $korisnik->createToken('aplikacijatoken')->plainTextToken;
        $response = [
            'korisnik' => $korisnik,
            'token' => $token
        ];
        // Podrska_Prvog_Nivoa::destroy($polja['id']);
        $flag = Zalbe::where('id_prvog_nivoa', 'like', $polja['id'])->get();
        if (is_null($flag)) {
            Podrska_Prvog_Nivoa::destroy($polja['id']);
        }


        return response($response, 201);
    }

    public function login(Request $request)
    {
        $polja = $request->validate([
            'korisnickoIme' => 'required|string',
            'password' => 'required|string'
        ]);
        $korisnik = Podrska_prvog_nivoa::where('korisnickoIme', $polja['korisnickoIme'])->first();
        if (!$korisnik) {
            $korisnik = Podrska_drugog_nivoa::where('korisnickoIme', $polja['korisnickoIme'])->first();
        }

        if (!$korisnik || !Hash::check($polja['password'], $korisnik->password)) {
            return response([
                'message' => 'Pogresno korisnicko ime ili sifra'
            ], 401);
        }

        $token = $korisnik->createToken('aplikacijatoken')->plainTextToken;
        $response = [
            'korisnik' => $korisnik,
            'token' => $token
        ];
        return response($response, 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Izlogovani ste'
        ];
    }
}
