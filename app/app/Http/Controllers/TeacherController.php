<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\People;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DataTables;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teachers.index');
    }

    public function dataTable()
    {

        return DataTables::of(Teacher::select('id', 'people_id')
                ->get())

            ->editColumn('id', function($new){ return $new->id;})
            ->editColumn('people_id', function($new){ return $new->people_id;})
            ->addColumn('ful_name', function($new){ return $new->people->fullName();})
            ->addColumn('identification', function($new){ return $new->people->identification;})
            ->addColumn('gender', function($new){ return $new->people->gender();})
            ->addColumn('birthdate', function($new){ return $new->people->birthdate;})
            ->addColumn('location', function($new){ return $new->people->location;})
            ->addColumn('domicile', function($new){ return $new->people->domicile;})
            ->addColumn('phone_local', function($new){ return $new->people->phone_local;})
            ->addColumn('phone_movil', function($new){ return $new->people->phone_movil;})
            ->addColumn('action', function($new){
                    $buttons = "<div class='btn-group'>";
                    
                        $buttons .= "<a href='". route('teachers.edit', $new->id) ."' role='button' class='btn btn-info btn-sm edit' data-toggle='tooltip' data-placement='left' title='Editar'><i class='fa fa-edit' ></i></a>";

                        $buttons .= "<a href='". route('teachers.delete', $new->id) ."' role='button' class='btn btn-danger btn-sm delete' data-toggle='tooltip' data-placement='left' title='eliminar'><i class='fa fa-trash-o'></i></a>";

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
        return view('teachers.create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|string',
            'last_name' => 'required|string',
            'identification' => 'required|min:7|numeric|unique:people',
            'gender' => 'required|string',
            'birthdate' => 'required|string',
            'domicile' => 'required|string',
            //'phone_local' => 'required|string',
            'phone_movil' => 'required|numeric',
            //'profession' => 'required|string',
            //'work_place' => 'required|string',
        ]);


        $people = new People();
        $people->fill($request->all());

        $people->save();

        $teacher = new Teacher;
        $teacher->fill($request->all());
        $teacher->people_id = $people->id;
        $teacher->save();

        Session::flash('save','Profesor registrado con éxito');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit')->with(['teacher' => $teacher->people]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $validar = ($teacher->identification == $request->get('identification'))?[
            'name' => 'required|string',
            'last_name' => 'required|string',
            'identification' => 'required|min:7|numeric|unique:people',
            'gender' => 'required|string',
            'birthdate' => 'required|string',
            'domicile' => 'required|string',
            'phone_movil' => 'required|numeric',
        ]:[
            'name' => 'required|string',
            'last_name' => 'required|string',
            'identification' => 'required|min:7|numeric',
            'gender' => 'required|string',
            'birthdate' => 'required|string',
            'domicile' => 'required|string',
            'phone_movil' => 'required|numeric',
        ];

        $this->validate(request(), $validar);

        $teacher->people->fill($request->all());
        $teacher->people->save();

        $teacher->fill($request->all());
        $teacher->save();

        Session::flash('save','Profesor editado con éxito');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->people->delete();
        Session::flash('save','Profesor eliminado con éxito.');
        
        return back();
    }
}
