<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_siswa = Siswa::all();
        $data = [];
        foreach ($data_siswa as $siswa) {
            $data[] = [
                "id" => $siswa->id,
                "nama" => $siswa->nama,
                "jenis_kelamin" => $siswa->jenis_kelamin,
                "no_hp" => $siswa->no_hp,
                "tempat_lahir" => $siswa->getUser->tempat_lahir,
                "tanggal_lahir" => $siswa->getUser->tanggal_lahir,
                "alamat" => $siswa->getUser->alamat,
                "nama_ayah" => $siswa->nama_ayah,
                "nama_ibu" => $siswa->nama_ibu
            ];
        }

        return response()->json(['message' => 'Request Success!', 'data' => $data], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json(['message' => 'Not Found!'], 404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            "nama" => "required",
            "jenis_kelamin" => "required",
            "alamat" => "required",
            "nama_ayah" => "required",
            "nama_ibu" => "required",
            "no_hp" => "required",
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required"
        ]);

        if ($validasi->fails()) {
            return response()->json($validasi->errors(), 400);
        }

        $cek1 = Siswa::create([
            'id' => time(),
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'no_hp' => $request->no_hp
        ]);

        $cek = User::create([
            "id" => time(),
            "nama" => $request->nama,
            "email" => "siswa@gmail.com",
            "password" => bcrypt("password"),
            "alamat" => $request->alamat,
            "id_role" => 3,
            "no_hp" => $request->no_hp,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir
        ]);

        if ($cek) {
            $data = [
                'message' => 'Create Success!',
                'status' => true
            ];
        } else {
            $data = [
                'message' => 'Create Failed!',
                'status' => false
            ];
        }

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_siswa = Siswa::where("id", $id)->first();

        $data = [
            "id" => $data_siswa->id,
            "nama" => $data_siswa->nama,
            "jenis_kelamin" => $data_siswa->jenis_kelamin,
            "no_hp" => $data_siswa->no_hp,
            "tempat_lahir" => $data_siswa->getUser->tempat_lahir,
            "tanggal_lahir" => $data_siswa->getUser->tanggal_lahir,
            "alamat" => $data_siswa->getUser->alamat,
            "nama_ayah" => $data_siswa->nama_ayah,
            "nama_ibu" => $data_siswa->nama_ibu
        ];

        return response()->json(['message' => 'Request Success!', 'data' => $data], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json(['message' => 'Not Found!'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasi = Validator::make($request->all(), [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'no_hp' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required'
        ]);

        if ($validasi->fails()) {
            return response()->json($validasi->errors(), 400);
        }

        $cek_siswa = Siswa::where('id', $id)->update([
            "nama" => $request->nama,
            "jenis_kelamin" => $request->jenis_kelamin,
            "nama_ayah" => $request->nama_ayah,
            "nama_ibu" => $request->nama_ibu,
            "no_hp" => $request->no_hp,
        ]);

        $cek = User::where("no_hp", $request->oldNoHp)->update([
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "no_hp" => $request->oldNoHp,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir
        ]);

        if ($cek) {
            $data = [
                'message' => 'Update Success!',
                'status' => true
            ];
        } else {
            $data = [
                'message' => 'Update Failed!',
                'status' => false
            ];
        }

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Siswa::findOrfail($id);

        if ($role) {
            $cek = $role->delete();

            if ($cek) {
                $data = [
                    'message' => 'Delete Success!',
                    'status' => true
                ];
            } else {
                $data = [
                    'message' => 'Delete Failed!',
                    'status' => false
                ];
            }

            return response()->json($data, 200);
        }

        return response()->json(['message' => 'Not Found!'], 404);
    }
}
