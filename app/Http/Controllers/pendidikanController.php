<?php

namespace App\Http\Controllers;
use App\Models\pendidikan; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class pendidikanController extends Controller
{
           /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $data = pendidikan::where('id', 'like', "%$katakunci%")
                ->orWhere('nama_proyek', 'like', "%$katakunci%")
                ->orWhere('deskripsi', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = pendidikan::orderBy('id', 'desc')->paginate($jumlahbaris);
        }
        return view('portofolio.index')->with('data', $data); 
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('portofolio.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    Session::flash('id', $request->id);
    Session::flash('nama_proyek', $request->nama_proyek);
    Session::flash('deskripsi', $request->deskripsi);

    $validator = Validator::make($request->all(), [
        'id' => 'unique:portofolio' 
    ], [
        'id.unique' => 'ID sudah ada dalam database. Pilih ID yang berbeda.'
    ]);
    

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    // Periksa apakah file telah diunggah
    if ($request->hasFile('foto_proyek')) {
        $foto_file = $request->file('foto_proyek');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . '.' . $foto_ekstensi;
        $foto_file->move(public_path('foto_proyek'), $foto_nama);
    } else {
        // Tidak ada file yang diunggah, atur nilai $foto_nama ke string kosong
        $foto_nama = 'default.jpg';
    }

    $data = [
        'id' => $request->id,
        'nama_proyek' => $request->nama_proyek,
        'deskripsi' => $request->deskripsi,
        'foto_proyek' => $foto_nama
    ];

    pendidikan::create($data);

    return redirect()->to('portofolio')->with('success', 'Berhasil menambahkan data');
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
public function edit($id)
{
    $data = pendidikan::where('id', $id)->first(); 
    return view('portofolio.edit')->with('data', $data); 
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
    $data = [
        'nama_proyek' => $request->nama_proyek,
        'deskripsi' => $request->deskripsi,
    ];

    if ($request->hasFile('foto_proyek')) {

        $foto_file = $request->file('foto_proyek');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . '.' . $foto_ekstensi;
        $foto_file->move(public_path('foto_proyek'), $foto_nama);

        $data['foto_proyek'] = $foto_nama;
    }

    pendidikan::where('id', $id)->update($data);
    return redirect()->to('portofolio')->with('success', 'Berhasil melakukan update data');
}


/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    pendidikan::where('id', $id)->delete(); 
    return redirect()->to('portofolio')->with('success', 'Berhasil melakukan delete data'); 
}
}
