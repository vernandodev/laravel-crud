<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Program;
use App\Models\Edulevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::with('edulevel')->get();
        return view ('layouts.program.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edulevels = Edulevel::all();
        return view('layouts.program.create', compact('edulevels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|min:2',
        //     'edulevel_id' => 'required',
        // ], [
        //     'name.required' => 'Nama jenjang tidak boleh kosong',
        //     'edulevel_id.required' => 'Nama Edulevel tidak boleh kosong'
        // ]);

        // DB::table('programs')->insert([
        //     'name' => $request->name,
        //     'edulevel_id' => $request->edulevel_id,
        //     'student_price' => $request->student_price,
        //     'student_max' => $request->student_max,
        //     'info' => $request->info,
        //     'created_at' => Carbon::now()->toDateTimeString(),
        //     'updated_at' => Carbon::now()->toDateTimeString(),
        // ]);
        // return redirect('programs')->with('status', 'Program berhasil ditambah!');

        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        // $program = Program::find($id);

        // $program = Program::where('id', $id)->get(); // array object
        // $program = $program[0]; // agar tidak array object

        return view('layouts.program.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        $edulevels = Edulevel::all();
        return view('layouts.program.edit', compact('edulevels', 'program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $request->validate([
            'name' => 'required|min:2',
            'edulevel_id' => 'required',
        ], [
            'name.required' => 'Nama jenjang tidak boleh kosong',
            'edulevel_id.required' => 'Nama Edulevel tidak boleh kosong',
        ]);

        $program->name = $request->name;
        $program->edulevel_id = $request->edulevel_id;
        $program->student_price = $request->student_price;
        $program->student_max = $request->student_max;
        $program->info = $request->info;
        $program->save();

        return redirect('programs')->with('status', 'Program berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        //
    }
}
