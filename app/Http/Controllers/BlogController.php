<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Carbon\Carbon;

class BlogController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::translated()->latest()->paginate(24);
        return view('blog.index',['posts' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $data = [
          'author_id' => $request->author,
          'image' => $request->image,
          'created_at' => Carbon::parse($request->created_at)->format('Y-m-d H:i:s')
        ];

        foreach (config('translatable.locales') as $key => $value) {
          if (empty($request->{$value.'_title'})) {
              continue;
          }
          $data[$value]['title']   = $request->{$value.'_title'} ?? null;
          $data[$value]['slug']    = str_slug($request->{$value.'_title'}) ?? null;
          $data[$value]['content'] = $request->{$value.'_content'} ?? null;
        }

        $post = Blog::create($data);

        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit', ['post' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
          $data = [
            'author_id'  => $request->author,
            'image'      => $request->image,
            'created_at' => Carbon::parse($request->created_at)->format('Y-m-d H:i:s')
          ];

          foreach (config('translatable.locales') as $key => $value) {
            if (empty($request->{$value.'_title'})) {
                continue;
            }
            $data[$value]['title']   = $request->{$value.'_title'} ?? null;
            $data[$value]['slug']    = str_slug($request->{$value.'_title'}) ?? null;
            $data[$value]['content'] = $request->{$value.'_content'} ?? null;
          }

          $blog->update($data);

          return redirect()->route('blog.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->deleteTranslations();
        $blog->delete();

        return redirect()->route('blog.index');
    }
}
