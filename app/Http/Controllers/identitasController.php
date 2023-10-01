<?php
namespace App\Http\Controllers;
use App\Models\identitas; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class identitasController extends Controller
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
            $data = Identitas::where('id', 'like', "%$katakunci%")
                ->orWhere('nama', 'like', "%$katakunci%")
                ->orWhere('tempat_lahir', 'like', "%$katakunci%")
                ->orWhere('tanggal_lahir', 'like', "%$katakunci%")
                ->orWhere('jenis_kelamin', 'like', "%$katakunci%")
                ->orWhere('agama', 'like', "%$katakunci%")
                ->orWhere('kewarganegaraan', 'like', "%$katakunci%")
                ->orWhere('status', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = Identitas::orderBy('id', 'desc')->paginate($jumlahbaris);
        }
        return view('identitas.index')->with('data', $data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('identitas.create'); 
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
        Session::flash('nama', $request->nama);
        Session::flash('tempat_lahir', $request->tempat_lahir);
        Session::flash('tanggal_lahir', $request->tanggal_lahir);
        Session::flash('jenis_kelamin', $request->jenis_kelamin);
        Session::flash('agama', $request->agama);
        Session::flash('kewarganegaraan', $request->kewarganegaraan);
        Session::flash('status', $request->status);

        $validator = Validator::make($request->all(), [
            'id' => 'unique:identitas' 
        ], [
            'id.unique' => 'ID sudah ada dalam database. Pilih ID yang berbeda.'
        ]);
        
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $foto_file = $request->file('pas_foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . '.' . $foto_ekstensi;
        $foto_file->move(public_path('pas_foto'), $foto_nama);

        $data = [
            'id' => $request->id,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'kewarganegaraan' => $request->kewarganegaraan,
            'status' => $request->status,
            'pas_foto' => $foto_nama
        ];

        Identitas::create($data); 
        return redirect()->to('identitas')->with('success', 'Berhasil menambahkan data'); 
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
    $data = Identitas::where('id', $id)->first(); 
    return view('identitas.edit')->with('data', $data); 
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
        'nama' => $request->nama,
        'tempat_lahir' => $request->tempat_lahir,
        'tanggal_lahir' => $request->tanggal_lahir,
        'jenis_kelamin' => $request->jenis_kelamin,
        'agama' => $request->agama,
        'kewarganegaraan' => $request->kewarganegaraan,
        'status' => $request->status,
    ];

    if ($request->hasFile('pas_foto')) {

        $foto_file = $request->file('pas_foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . '.' . $foto_ekstensi;
        $foto_file->move(public_path('pas_foto'), $foto_nama);

        $data['pas_foto'] = $foto_nama;
    }

    Identitas::where('id', $id)->update($data);
    return redirect()->to('identitas')->with('success', 'Berhasil melakukan update data');
}


/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    Identitas::where('id', $id)->delete(); 
    return redirect()->to('identitas')->with('success', 'Berhasil melakukan delete data'); 
}


}

