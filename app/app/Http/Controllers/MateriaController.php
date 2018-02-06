<?php

namespace App\Http\Controllers;

use App\Materia;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DataTables;
use Illuminate\Support\Facades\Auth;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //return Auth::user()->persona->materias;
        return view('materias.index');
    }

    public function dataTableMy()
    {

        return DataTables::of(Materia::orderBy('id', 'ASC')
                
                ->get())

            ->addColumn('id', function($new){ return $new->id;})
            ->addColumn('materia', function($new){ return $new->materia;})
            ->addColumn('grade_id', function($new){ return $new->grade_id;})
            ->editColumn('grade', function($new){ return $new->grade->grade;})
        
            ->addColumn('action', function($new){
                    $buttons = "<div class='btn-group'>";

                        //$buttons .= "<a href='". route('students.edit', $new->id) ."' role='button' class='btn btn-info btn-sm edit' data-toggle='tooltip' data-placement='left' title='Editar'><i class='fa fa-edit' ></i></a>";

                        //$buttons .= "<a href='". route('students.delete', $new->id) ."' role='button' class='btn btn-danger btn-sm delete' data-toggle='tooltip' data-placement='left' title='eliminar'><i class='fa fa-trash-o'></i></a>";

                    //$buttons .= "</div>";
                    return $buttons;
                })
            ->make(true);

    }


    public function dataTable()
    {

        return DataTables::of(Materia::orderBy('id', 'ASC')
                ->get())

            ->addColumn('id', function($new){ return $new->id;})
            ->addColumn('materia', function($new){ return $new->materia;})
            ->addColumn('grade_id', function($new){ return $new->grade_id;})
            ->editColumn('grade', function($new){ return $new->grade->grade;})
        
            ->addColumn('action', function($new){
                    $buttons = "<div class='btn-group'>";

                        //$buttons .= "<a href='". route('students.edit', $new->id) ."' role='button' class='btn btn-info btn-sm edit' data-toggle='tooltip' data-placement='left' title='Editar'><i class='fa fa-edit' ></i></a>";

                        //$buttons .= "<a href='". route('students.delete', $new->id) ."' role='button' class='btn btn-danger btn-sm delete' data-toggle='tooltip' data-placement='left' title='eliminar'><i class='fa fa-trash-o'></i></a>";

                    //$buttons .= "</div>";
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit(Materia $materia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materia $materia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materia $materia)
    {
        //
    }
}
