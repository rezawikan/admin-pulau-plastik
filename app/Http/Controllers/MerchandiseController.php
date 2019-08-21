<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use Illuminate\Http\Request;

class MerchandiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $merchandises = Merchandise::ordered()->paginate(24);
        return view('merchandise.index', ['merchandises' => $merchandises]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merchandise.create');
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
          'image' => $request->image,
          'order' => $request->order
        ];

        foreach (config('translatable.locales') as $key => $value) {
          if (empty($request->{$value.'_name'})) {
              continue;
          }
          $data[$value]['name']   = $request->{$value.'_name'} ?? null;
          $data[$value]['summary'] = $request->{$value.'_summary'} ?? null;
          $data[$value]['price'] = $request->{$value.'_price'} ?? null;
        }

        Merchandise::create($data);

        return redirect()->route('merchandise.index');
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
    public function edit(Merchandise $merchandise)
    {
        return view('merchandise.edit',[ 'merchandise' => $merchandise]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Merchandise $merchandise)
    {
        $data = [
          'image' => $request->image,
          'order' => $request->order
        ];

        foreach (config('translatable.locales') as $key => $value) {
          if (empty($request->{$value.'_name'})) {
              continue;
          }
          $data[$value]['name']   = $request->{$value.'_name'} ?? null;
          $data[$value]['summary'] = $request->{$value.'_summary'} ?? null;
          $data[$value]['price'] = $request->{$value.'_price'} ?? null;
        }

        $merchandise->update($data);

        return redirect()->route('merchandise.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merchandise $merchandise)
    {
        $merchandise->deleteTranslations();
        $merchandise->delete();

        return redirect()->route('merchandise.index');
    }
}
