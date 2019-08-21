<?php

namespace App\Http\Controllers;

use App\Models\MediaCoverage;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MediaCoverageController extends Controller
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
        $mediaCoverage = MediaCoverage::latest()->paginate(24);
        return view('media-coverage.index', ['coverages' => $mediaCoverage]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('media-coverage.create');
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
          'media_id' => $request->media,
          'link' => $request->link,
          'created_at' => Carbon::parse($request->created_at)->format('Y-m-d H:i:s')
        ];

        foreach (config('translatable.locales') as $key => $value) {
          if (empty($request->{$value.'_title'})) {
              continue;
          }
          $data[$value]['title']   = $request->{$value.'_title'} ?? null;
        }

        $media = MediaCoverage::create($data);

        return redirect()->route('media-coverage.index');
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
    public function edit(MediaCoverage $coverage)
    {
        return view('media-coverage.edit', ['coverage' => $coverage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MediaCoverage $coverage)
    {
        $data = [
          'media_id'   => $request->media,
          'link'       => $request->link,
          'created_at' => Carbon::parse($request->created_at)->format('Y-m-d H:i:s')
        ];

        foreach (config('translatable.locales') as $key => $value) {
          if (empty($request->{$value.'_title'})) {
              continue;
          }
          $data[$value]['title']   = $request->{$value.'_title'} ?? null;
        }

        $coverage->update($data);

        return redirect()->route('media-coverage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MediaCoverage $coverage)
    {
        $coverage->deleteTranslations();
        $coverage->delete();

        return redirect()->route('media-coverage.index');
    }
}
