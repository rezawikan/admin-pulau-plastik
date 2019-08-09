<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Screening;
use Illuminate\Http\Request;

class ScreeningController extends Controller
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
        $screenings = Screening::latest()->paginate(24);
        return view('upcomming.index', ['screenings' => $screenings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upcomming.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Screening::create(
          $request->merge([
          'created_at' => Carbon::parse($request->created_at)->format('Y-m-d H:i:s')
          ])->toArray()
        );

        return redirect()->route('upcomming.index');
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
    public function edit(Screening $screening)
    {
        return view('upcomming.edit', ['screening' => $screening]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Screening $screening)
    {
        $screening->update(
          $request->merge([
          'created_at' => Carbon::parse($request->created_at)->format('Y-m-d H:i:s')
          ])->toArray()
        );

        return redirect()->route('upcomming.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Screening $screening)
    {
        $screening->delete();

        return redirect()->route('upcomming.index');
    }
}
