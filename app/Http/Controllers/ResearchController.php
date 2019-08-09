<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Research;
use Carbon\Carbon;

class ResearchController extends Controller
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
        $researches = Research::translated()->latest()->paginate(24);
        return view('research.index', ['researches' => $researches]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('research.create');
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

        Research::create($data);

        return redirect()->route('research.index');
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
    public function edit(Research $research)
    {
        return view('research.edit', ['research' => $research]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Research $research)
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

        $research->update($data);

        return redirect()->route('research.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Research $research)
    {
        $research->deleteTranslations();
        $research->delete();

        return redirect()->route('research.index');
    }
}
