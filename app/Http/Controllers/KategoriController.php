<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriModel;
use Session;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = KategoriModel::all();
       return view('admin.kategori',compact('data'));
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
        $KategoriModel = new KategoriModel;
        $KategoriModel->nama = $request->nama;
        $KategoriModel->keterangan = $request->ket;
        $KategoriModel->status = 'aktif';
        $KategoriModel->tanggal = date('Y-m-d');
        $KategoriModel->save();
        if ($KategoriModel) {
            Session::flash('success','Success Tambah Data');
            return redirect()->route('user.kategori');
        } else {
            Session::flash('success','Failed Tambah Data');
            return redirect()->route('user.kategori');
        }
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
        $data = KategoriModel::find($id);
        return view('admin.edit_kategori',compact('data'));
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
        $KategoriModel = KategoriModel::find($id);
        $KategoriModel->nama = $request->nama;
        $KategoriModel->keterangan = $request->ket;
        $KategoriModel->status = $request->status;
        $KategoriModel->save();
        if ($KategoriModel) {
            Session::flash('success','Success Tambah Data');
            return redirect()->route('user.kategori');
        } else {
            Session::flash('success','Failed Tambah Data');
            return redirect()->route('user.kategori');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $KategoriModel = KategoriModel::find($id);
        $KategoriModel->delete();
        if ($KategoriModel) {
            Session::flash('success','Success Delete Data');
            return redirect()->route('user.kategori');
        } else {
            Session::flash('success','Failed Delete Data');
            return redirect()->route('user.kategori');
        }
    }

    public function search(request $request)
    {
        $cari = $request->get('cari');
        $data = KategoriModel::where('nama','LIKE','%'.$cari.'%')->get();
        return view('admin.kategori',compact('data'));

    }
}
