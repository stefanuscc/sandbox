<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Model
use App\Models\Pegawai;
use App\Models\Jabatan;

class PegawaiController extends Controller
{
    public function index()
    {
        $nik = request()->get('nik');
        $nama = request()->get('nama');
        
        $records = Pegawai::where('nik', 'like', '%'.$nik.'%')
                          ->where('nama', 'like', '%'.$nama.'%')
                          ->paginate(3);

        return view('pegawai.index', ['records' => $records]);
    }

    public function add()
    {
        $jabatan = Jabatan::all();

        return view('pegawai.add', ['jabatan' => $jabatan]);
    }

    public function edit($id)
    {
        $jabatan = Jabatan::all();
        $data = Pegawai::find($id);

        return view('pegawai.edit', [
            'record' => $data, 
            'jabatan' => $jabatan
        ]);
    }
    public function save(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required|max:10|min:2',
            'nama' => 'required',
            'alamat' => 'required',
            'jabatan_id' => 'required',
        ]);

        // dd($request->all());
        $data = new Pegawai;
        $data->fill($request->all());
        $data->save();
        return redirect('pegawai');
    }
    public function update(Request $request, $id)
    {
        $data = Pegawai::find($id);
        $data->fill($request->all());
        $data->save();
        return redirect('pegawai');
    }
    public function destroy($id)
    {
        $destroy = Pegawai::find($id)->delete();
        return redirect('pegawai');
    }

    //layout
    public function layout()
    {
        return view('pegawai.layout');
    }
}
