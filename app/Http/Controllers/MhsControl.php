<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Student; //Load Model

class MhsControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['mhs'] = DB::table('mhs')->get();
        $data['mhs'] = Student::all();
        return view('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = new Student;
        // $data->std_nim = $request->nim;
        // $data->std_nama = $request->nama;
        // $data->std_jurusan = $request->jurusan;
        // $data->std_jk = $request->jk;
        // $data->save(); // Cara tanpa merubah2 model

        // Student::create($request->all()); // Dapat digunakan jika nama kolom tbl dan inputan sama & telah mengisi $fillable

        $request->validate([
            'nim' => 'required|unique:students,std_nim',
            'nama' => 'required|min:4',
            'jurusan' => 'required',
            'jk' => 'required',
        ]); 

        Student::create([
            'std_nim' => $request->nim,
            'std_nama' => $request->nama,
            'std_jurusan' => $request->jurusan,
            'std_jk' => $request->jk,
        ]);

        return redirect('data')->with('notif', 'Data Tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student) //menggunakan Route Data Binding
    {
        // $student = Student::where('std_id', $id)->get(); //cara lama
        $data['mhs'] = $student;
        return view('detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $request->validate([
            'nim' => 'required',
            'nama' => 'required|min:4',
            'jurusan' => 'required',
            'jk' => 'required',
        ]); 

        Student::where('std_id', $id)->update([
            'std_nim' => $request->nim,
            'std_nama' => $request->nama,
            'std_jurusan' => $request->jurusan,
            'std_jk' => $request->jk,
        ]);

         return redirect('data')->with('notif','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::destroy($id);
        return redirect('data')->with('notif','Data Berhasil Dihapus');
    }
}
