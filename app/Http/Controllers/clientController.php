<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BeritaModel;
use App\TentangModel;
use App\KomentarModel;
use Session;

class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semua = BeritaModel::orderBy('created_at','DESC')
                ->where('status','aktif')
                ->take(4)
                ->get();
        $ekonomi =  BeritaModel::orderBy('created_at','DESC')
                    ->where('kategori_id',4)
                    ->where('status','aktif')
                    ->take(4)
                    ->get();
        $olahraga =  BeritaModel::orderBy('created_at','DESC')
                    ->where('kategori_id',5)
                    ->where('status','aktif')
                    ->take(4)
                    ->get();
        $politik =  BeritaModel::orderBy('created_at','DESC')
                    ->where('kategori_id',6)
                    ->where('status','aktif')
                    ->take(4)
                    ->get();
        $tekno =  BeritaModel::orderBy('created_at','DESC')
                    ->where('kategori_id',7)
                    ->where('status','aktif')
                    ->take(4)
                    ->get();
         $tops =  BeritaModel::orderBy('created_at','DESC')
                    ->where('status','aktif')
                    ->where('top_news','aktif')
                    ->take(8)
                    ->get();
        $about = TentangModel::find(1);
        return view('user.dasboard',compact('semua','ekonomi','olahraga','politik','tekno','tops','about')) ;
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $about = TentangModel::find(1);
        $news = BeritaModel::find($id);
        $semua = BeritaModel::orderBy('created_at','DESC')
                ->where('status','aktif')
                ->take(6)
                ->get();
   
        return view('user.detail',compact('about','news','semua'));
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
        $komen = new KomentarModel;
        $komen->nama = $request->nama;
        $komen->email = $request->email;
        $komen->keterangan = $request->isi;
        $komen->tanggal = date('Y-m-d');
        $komen->status = 'aktif';
        $komen->berita_id = $id;
        $komen->save();

        if ($komen) {
            Session::flash('success','Komentar berhasil ditamahkan');
            return redirect()->back();
        } else {
            Session::flash('success','Komentar gagal ditamahkan');
            return redirect()->back();
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
        //
    }

    public function list($id)
    {
         $about = TentangModel::find(1);
        $semua = BeritaModel::orderBy('created_at','DESC')
                ->where('status','aktif')
                ->take(6)
                ->get();
        $ekonomi =  BeritaModel::orderBy('created_at','DESC')
                    ->where('kategori_id',$id)
                    ->where('status','aktif')
                    ->get();
        return view('user.list',compact('about','semua','ekonomi')) ;
    }

    public function cari(Request $request)
    {
        $key = $request->get('cari');
        $ekonomi = BeritaModel::where('judul','LIKE','%'.$key.'%')->get();
        $about = TentangModel::find(1);
        $semua = BeritaModel::orderBy('created_at','DESC')
                ->where('status','aktif')
                ->take(6)
                ->get();
        return view('user.list',compact('about','ekonomi','semua')) ;
    }
}
