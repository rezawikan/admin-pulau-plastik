<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimony;
use Carbon\Carbon;

class TestimonyController extends Controller
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
        $testimonies = Testimony::paginate(12);
        return view('testimony.index', ['testimonies' => $testimonies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testimony.create');
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
          'name'      => $request->name,
          'order'      => $request->order,
          'created_at' => Carbon::parse($request->created_at)->format('Y-m-d H:i:s')
        ];

        foreach (config('translatable.locales') as $key => $value) {
          if (empty($request->{$value.'_position'})) {
              continue;
          }
          $data[$value]['position']   = $request->{$value.'_position'} ?? null;
          $data[$value]['summary'] = $request->{$value.'_summary'} ?? null;
        }


        Testimony::create($data);

        return redirect()->route('testimony.index');
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
    public function edit(Testimony $testimony)
    {
        return view('testimony.edit', ['testimony' => $testimony]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimony $testimony)
    {
        $data = [
          'name'      => $request->name,
          'order'      => $request->order,
          'created_at' => Carbon::parse($request->created_at)->format('Y-m-d H:i:s')
        ];

        foreach (config('translatable.locales') as $key => $value) {
          if (empty($request->{$value.'_position'})) {
              continue;
          }
          $data[$value]['position']   = $request->{$value.'_position'} ?? null;
          $data[$value]['summary'] = $request->{$value.'_summary'} ?? null;
        }

        $testimony->update($data);

        return redirect()->route('testimony.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimony $testimony)
    {
        $testimony->deleteTranslations();
        $testimony->delete();

        return redirect()->route('testimony.index');
    }
}
