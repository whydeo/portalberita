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
        $ARTIS =  BeritaModel::orderBy('created_at','DESC')
                    ->where('kategori_id',1)
                    ->where('status','aktif')
                    ->take(4)
                    ->get();
        $FILM =  BeritaModel::orderBy('created_at','DESC')
                    ->where('kategori_id',2)
                    ->where('status','aktif')
                    ->take(4)
                    ->get();
        $MUSIK =  BeritaModel::orderBy('created_at','DESC')
                    ->where('kategori_id',3)
                    ->where('status','aktif')
                    ->take(4)
                    ->get();
        $TRENDING =  BeritaModel::orderBy('created_at','DESC')
                    ->where('kategori_id',4)
                    ->where('status','aktif')
                    ->take(4)
                    ->get();
         $tops =  BeritaModel::orderBy('created_at','DESC')
                    ->where('status','aktif')
                    ->where('top_news','aktif')
                    ->take(8)
                    ->get();
        $about = TentangModel::find(1);
        return view('user.dasboard',compact('semua','ARTIS','FILM','MUSIK','TRENDING','tops','about')) ;
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
    // public function update(Request $request, $id)
    // {
    //     $komen = new KomentarModel;
    //     $komen->nama = $request->nama;
    //     $komen->email = $request->email;
    //     $komen->keterangan = $request->isi;
    //     $komen->tanggal = date('Y-m-d');
    //     $komen->status = 'aktif';
    //     $komen->berita_id = $id;
    //     $komen->save();

    //     if ($komen) {
    //         Session::flash('success','Komentar berhasil ditamahkan');
    //         return redirect()->back();
    //     } else {
    //         Session::flash('success','Komentar gagal ditamahkan');
    //         return redirect()->back();
    //     }
    // }

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
        $ARTIS =  BeritaModel::orderBy('created_at','DESC')
                    ->where('kategori_id',$id)
                    ->where('status','aktif')
                    ->get();
        return view('user.list',compact('about','semua','ARTIS')) ;
    }

    public function cari(Request $request)
    {
        $key = $request->get('cari');
        $ARTIS = BeritaModel::where('judul','LIKE','%'.$key.'%')->get();
        $about = TentangModel::find(1);
        $semua = BeritaModel::orderBy('created_at','DESC')
                ->where('status','aktif')
                ->take(6)
                ->get();
        return view('user.list',compact('about','ARTIS','semua')) ;
    }
}
