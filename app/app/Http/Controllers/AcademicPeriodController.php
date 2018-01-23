<?php

namespace App\Http\Controllers;

use App\AcademicPeriod;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;

class AcademicPeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('periodo_academico.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periodo_academico.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $num_active = DB::table('academic_periods')
                    ->where('status', 'active')
                    ->count();

        if($num_active > 0){
            Session::flash('delete','Ya hay un período académico activo, para crear una nueva tiene que culminar la actual');
            return back();
        }

        $this->validate(request(), [
            'academic_period' => 'required|string|unique:academic_periods',
        ]);
        
        $academic_period = new AcademicPeriod;
        $academic_period->fill($request->all());

        $academic_period->save();
        Session::flash('save','Período académico  creando con éxito');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AcademicPeriod  $academicPeriod
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicPeriod $academicPeriod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AcademicPeriod  $academicPeriod
     * @return \Illuminate\Http\Response
     */
    public function edit(AcademicPeriod $academicPeriod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AcademicPeriod  $academicPeriod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcademicPeriod $academicPeriod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AcademicPeriod  $academicPeriod
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcademicPeriod $academicPeriod)
    {
        //
    }
}
