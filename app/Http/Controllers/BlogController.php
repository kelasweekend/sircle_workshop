<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->blog = new Blog;
    }

    public function index()
    {
        return view('blog.index', ['blog' => $this->blog->index()]);
    }

    public function create()
    {
        return view('blog.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = [
            'title'  => 'required',
            'body'   => 'required|min:5',
        ];

        $pesan = [
            'title.required' => 'Judul Artikel Wajib di isi',
            'body.required'  => 'Isi artikel Masih Kosong',
        ];

        $send_validasi = Validator::make($request->all(), $validasi, $pesan);

        if ($send_validasi->fails()) {
            return redirect()->back()->withErrors($send_validasi)->withInput($request->all());
        }

        // insert data
        $this->blog->title = $request->title;
        $this->blog->slug_url = str_replace(' ', '-', $request->title);
        $this->blog->body = $request->body;
        $this->blog->save();
        
        return redirect()->route('blog')->with('success', 'Artikel Sudah di Publish');

    }

    public function edit($id)
    {
        return view('blog.edit', ['blog' => $this->blog->show($id)]);
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
        $validasi = [
            'title'  => 'required',
            'body'   => 'required|min:5',
        ];

        $pesan = [
            'title.required' => 'Judul Artikel Wajib di isi',
            'body.required'  => 'Isi artikel Masih Kosong',
        ];

        $send_validasi = Validator::make($request->all(), $validasi, $pesan);

        if ($send_validasi->fails()) {
            return redirect()->back()->withErrors($send_validasi)->withInput($request->all());
        }

        // insert data
        $edit = Blog::find($id);
        $edit->title = $request->title;
        $edit->slug_url = str_replace(' ', '-', $request->title);
        $edit->body = $request->body;
        $edit->update();
        
        return redirect()->route('blog')->with('success', 'Artikel Sudah di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Blog::find($id);
        $book->delete();
        return redirect()->route('blog')->with('success', 'Artikel Sudah di Hapus');
    }
}
