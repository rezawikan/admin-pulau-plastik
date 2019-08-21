<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Initiative;
use Carbon\Carbon;

class InitiativeController extends Controller
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
        $initiatives = Initiative::translated()->latest()->paginate(24);
        return view('initiative.index',['initiatives' => $initiatives]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('initiative.create');
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
          'image'      => $request->image,
          'link'       => $request->link
        ];

        foreach (config('translatable.locales') as $key => $value) {
          if (empty($request->{$value.'_title'})) {
              continue;
          }
          $data[$value]['title']   = $request->{$value.'_title'} ?? null;
          $data[$value]['summary'] = $request->{$value.'_summary'} ?? null;
        }

        Initiative::create($data);

        return redirect()->route('initiative.index');
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
    public function edit(Initiative $initiative)
    {
        return view('initiative.edit', ['initiative' => $initiative]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Initiative $initiative)
    {
        $data = [
          'link'       => $request->link,
          'image'      => $request->image
        ];
        foreach (config('translatable.locales') as $key => $value) {
          if (empty($request->{$value.'_title'})) {
              continue;
          }
          $data[$value]['title']   = $request->{$value.'_title'} ?? null;
          $data[$value]['summary'] = $request->{$value.'_summary'} ?? null;
        }

        $initiative->update($data);

        return redirect()->route('initiative.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Initiative $initiative)
    {
        $initiative->deleteTranslations();
        $initiative->delete();

        return redirect()->route('initiative.index');
    }
}
