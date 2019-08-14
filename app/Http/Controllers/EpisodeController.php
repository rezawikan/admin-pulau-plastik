<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;
use Carbon\Carbon;

class EpisodeController extends Controller
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
    public function index(Request $request)
    {
        $episodes = Episode::latest()->paginate(24);
        return view('episode.index', ['episodes' => $episodes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('episode.create');
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
          'order'      => $request->order
        ];

        foreach (config('translatable.locales') as $key => $value) {
          if (empty($request->{$value.'_title'})) {
              continue;
          }
          $data[$value]['title']   = $request->{$value.'_title'} ?? null;
          $data[$value]['summary'] = $request->{$value.'_summary'} ?? null;
        }


        Episode::create($data);

        return redirect()->route('episode.index');
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
    public function edit(Episode $episode)
    {
        return view('episode.edit', ['episode' => $episode]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Episode $episode)
    {
        $data = [
          'order'  => $request->order
        ];

        foreach (config('translatable.locales') as $key => $value) {
          if (empty($request->{$value.'_title'})) {
              continue;
          }
          $data[$value]['title']   = $request->{$value.'_title'} ?? null;
          $data[$value]['summary'] = $request->{$value.'_summary'} ?? null;
        }


        $episode->update($data);

        return redirect()->route('episode.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Episode $episode)
    {
        $episode->deleteTranslations();
        $episode->delete();

        return redirect()->route('episode.index');
    }
}
