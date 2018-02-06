<?php

namespace App\Http\Controllers;

use App\AcademicPeriod;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DataTables;

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

    public function dataTable()
    {

        return DataTables::of(AcademicPeriod::select('id', 'academic_period', 'date_int', 'date_fin' ,'status')
                ->get())

            ->editColumn('id', function($new){ return $new->id;})
            ->editColumn('academic_period', function($new){ return $new->academic_period;})
            ->editColumn('date_int', function($new){ return $new->date_int;})
            ->editColumn('date_fin', function($new){ return $new->date_fin;})
            ->editColumn('status', function($new){ return $new->status;})
            ->addColumn('action', function($new){
                    $buttons = "<div class='btn-group'>";
                
                        /*$buttons .= "<a href='". route('students.delete', $new->id) ."' role='button' class='btn btn-danger btn-sm delete' data-toggle='tooltip' data-placement='left' title='eliminar'><i class='fa fa-trash-o'></i></a>";*/

                    $buttons .= "</div>";
                    return $buttons;
                })
            ->make(true);

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
            'date_int' => 'required',
            'date_fin' => 'required',
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
