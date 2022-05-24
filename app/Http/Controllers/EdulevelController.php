<?php

namespace App\Http\Controllers;

use App\Models\Edulevel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EdulevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edulevel = DB::table('edulevels')->get();
        // passing data
        // return view('layouts.edulevel', ['edulevels' => $edulevel]);
        // return view('layouts.edulevel', compact('edulevels'));
        return view('layouts.edulevel.edulevel')->with('edulevels', $edulevel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edulevel = DB::table('edulevels')->get();
        return view('layouts.create.create')->with('edulevels', $edulevel);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'desc' => 'required',
        ], [
            'name.required' => 'Nama jenjang tidak boleh kosong',
            'desc.required' => 'Keterangan tidak boleh kosong'
        ]);

        DB::table('edulevels')->insert([
            'name' => $request->name,
            'desc' => $request->desc,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        return redirect('edulevels')->with('status', 'Jenjang berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Edulevel  $edulevel
     * @return \Illuminate\Http\Response
     */
    public function show(Edulevel $edulevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Edulevel  $edulevel
     * @return \Illuminate\Http\Response
     */
    public function edit(Edulevel $edulevel, $id)
    {
        $getData = DB::table('edulevels')->where('id', $id)->first();
        return view('layouts.edit.edit')->with('edulevels', $getData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Edulevel  $edulevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Edulevel $edulevel, $id)
    {
        $request->validate([
            'name' => 'required|min:2',
            'desc' => 'required',
        ], [
            'name.required' => 'Nama jenjang tidak boleh kosong',
            'desc.required' => 'Keterangan tidak boleh kosong'
        ]);

        DB::table('edulevels')->where('id', $id)
            ->update([
                'name' => $request->name,
                'desc' => $request->desc
            ]);
        return redirect('edulevels')->with('status', 'Jenjang berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Edulevel  $edulevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Edulevel $edulevel, $id)
    {
        DB::table('edulevels')->where('id', $id)->delete();
        return redirect('edulevels')->with('status', 'Jenjang berhasil dihapus!');
    }
}
