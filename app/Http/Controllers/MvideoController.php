<?php

namespace App\Http\Controllers;

use App\Mvideo;
use App\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Scope;

class MvideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::select('id', 'name')->get();
        $videos = Mvideo::orderBy('created_at', 'desc')->paginate(10);
        return view ('backend.video.index', compact('category', 'videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::select('id', 'name')->get();
        return view ('backend.video.create', compact('category'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $rules = [
            'title' => 'required|unique:mvideos,title|max:200',
            'description' => 'required|max:180',
            'cover' => 'required|image',
            'media' => 'mimetypes:video/mp4,video/webm,video/ogg'
        ];
        $customMessages = [
            'required' => 'Kolom :attribute wajib diisi!',
            'title.unique' => 'Judul sudah ada di database',
            'image' => 'File yang anda pilih bukan gambar',
            'media.mimetypes' => 'File harus berformat mp4, webm atau ogg'
        ];
        $this->validate($request, $rules, $customMessages);

        // cover thumbnail
        $cover = $request->file('cover');
        $newCover = time() . $cover->getClientOriginalName();
        $cover->move('public/mvideo/cover/', $newCover);

        // media video
        $media = $request->file('media');
        $newMedia = time() . $media->getClientOriginalName();
        $media->move('public/mvideo/video/', $newMedia);

        $schedule = $request->published_at;
        if (empty($schedule)) {
            $schedule = Carbon::now()->toDateTimeString();
        }

        $video = Mvideo::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . Str::random(4),
            'description' => $request->description,
            'body' => $request->body,
            // 'cat_id' => $request->cat_id,
            'isPublished' => $request->isPublished,
            'published_at' => $schedule,
            'cover' => 'public/mvideo/cover/' . $newCover,
            'media' => 'public/mvideo/video/' . $newMedia
        ]);
        // Categories include
        $video->category()->attach($request->categories);

        return redirect('/mvideo')->with('status', 'Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mvideo  $mvideo
     * @return \Illuminate\Http\Response
     */
    public function show(Mvideo $mvideo)
    {
        //
    }

    public function update_published(Request $request, Mvideo $mvideo)
    {
        $published = [
            'isPublished' => $request->isPublished,
        ];
        $mvideo->update($published);
        // cara ketiga. cara ini digunakan apabila sudah mengisi protected $filable pada Model
        return redirect('/mvideo')->with('status', 'Sukses menerbitkan artikel!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mvideo  $mvideo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $video = Mvideo::findorfail($id);
        
        return view ('backend.video.edit', compact('category', 'video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mvideo  $mvideo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mvideo $mvideo)
    {
        // validation
        $rules = [
            'title' => 'required|max:200',
            'description' => 'required|max:180',
            'cover' => 'image',
            'media' => 'mimetypes:video/mp4,video/webm,video/ogg'
        ];
        $customMessages = [
            'required' => 'Kolom :attribute wajib diisi!',
            'image' => 'File yang anda pilih bukan gambar',
            'media.mimetypes' => 'File harus berformat mp4, webm atau ogg'
        ];
        $this->validate($request, $rules, $customMessages);

        // process
        if ($request->has('cover') && $request->has('media')) {

            $cover = $request->cover;
            $newCover = time() . $cover->getClientOriginalName();
            $cover->move('public/mvideo/cover/', $newCover);
            
            $media = $request->media;
            $newMedia = time() . $media->getClientOriginalName();
            $media->move('public/mvideo/video/', $newMedia);
            
            $post_data = [
                'title' => $request->title,
                'description' => $request->description,
                'body' => $request->body,
                'isPublished' => $request->isPublished,
                'cover' => 'public/mvideo/cover/' . $newCover,
                'media' => 'public/mvideo/video/' . $newMedia
            ];
        } elseif ($request->has('media'))
        {
            $media = $request->media;
            $newMedia = time() . $media->getClientOriginalName();
            $media->move('public/mvideo/video/', $newMedia);

            $post_data = [
                'title' => $request->title,
                'description' => $request->description,
                'body' => $request->body,
                'isPublished' => $request->isPublished,
                'media' => 'public/mvideo/video/' . $newMedia
            ];
        } elseif ($request->has('cover')) {
            $cover = $request->cover;
            $newCover = time() . $cover->getClientOriginalName();
            $cover->move('public/mvideo/cover/', $newCover);

            $post_data = [
                'title' => $request->title,
                'description' => $request->description,
                'body' => $request->body,
                'isPublished' => $request->isPublished,
                'cover' => 'public/mvideo/cover/' . $newCover,
            ];
        } else {
            $post_data = [
                'title' => $request->title,
                'description' => $request->description,
                'body' => $request->body,
                'isPublished' => $request->isPublished,
            ];
        }

        $mvideo->category()->sync($request->categories);
        $mvideo->update($post_data);
        // dd($post_data);

        return redirect()->route('mvideo.index')->with('status', 'Sukses mengubah artikel!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mvideo  $mvideo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $videos = Mvideo::findorfail($id);
        $videos->delete();

        return redirect()->back()->with('status', 'Sukses memasukan ke Trashed List');
    }
    
    public function trashed()
    {
        $videos = Mvideo::onlyTrashed()->paginate(10);
        return view('backend.video.trash', compact('videos'));
    }
    public function restore($id)
    {
        $videos = Mvideo::withTrashed()->where('id', $id)->first();
        $videos->restore();

        return redirect()->route('mvideo.index')->with('status', 'Successfull restore post');
    }

    public function kill($id)
    {
        $videos = Mvideo::withTrashed()->where('id', $id)->first();
        $videos->forceDelete();

        return redirect()->back()->with('status', 'Successfull permanent delete');
    }
}
