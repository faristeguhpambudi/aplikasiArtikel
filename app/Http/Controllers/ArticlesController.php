<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //menampilkan semua data artikel
        //Jika ada kata cari
        if($request->has('cari'))
        {
            //ambil data artikel dari database
            $articles = Article::where('title', 'LIKE','%'.$request->cari.'%')->get();
        }else{
            //ambil semua data artikel dari database
            $articles = Article::orderBy('id', 'desc')->paginate(6);
        }
        return view('article/index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //UNTUK HALAMAN FORM ARTIKEL
        return view('article.buatartikel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validasi form
        $request->validate([
            'title' => 'required|',
            'subject' => 'required|min:20',
            'thumbnail' => 'required|mimes:jpeg,jpg,png,gif|max:1024'
        ]);

        //untuk upload gambar
        //ambil nama file untuk ke database
        $namaGambar = $request->thumbnail->getClientOriginalName() . '-' . time() . '.' . $request->thumbnail->extension();
        //untuk upload file ke folder image
        $request->thumbnail->move(public_path('image'), $namaGambar);

        //Menympan data ke database
        Article::create([
            'title' => $request->title,
            'kategori' => $request->kategori,
            'penulis' => $request->penulis,
            'subject' => $request->subject,
            'thumbnail' => $namaGambar
        ]);

        //redirect
        return redirect('/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //untuk halaman detail
        return view('article.single', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //Halaman edit
        //mendapatkan data yang ingin di edit
        //lempar ke halaman edit
        return view('article.editartikel', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //Validasi form
        $request->validate([
            'title' => 'required',
            'subject' => 'required|min:20'
        ]);

        //untuk upload gambar
        $namaGambar = $request->thumbnail;
        if ($request->thumbnail !== null) {
            # code...
            //ambil nama file untuk ke database
            $namaGambar = $request->thumbnail->getClientOriginalName() . '-' . time() . '.' . $request->thumbnail->extension();
            //untuk upload file ke folder image
            $request->thumbnail->move(public_path('image'), $namaGambar);
        }

        //simpan ke database
        Article::find($article);
        $article->title = $request->title;
        $article->kategori = $request->kategori;
        $article->penulis = $request->penulis;
        $article->subject = $request->subject;
        $article->thumbnail = $namaGambar;
        $article->save();
        //redirect
        return redirect('/articles');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //menghapus data di database
        Article::destroy($article->id);
        //redirect
        return redirect('/articles');
    }
}
