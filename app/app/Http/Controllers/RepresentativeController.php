<?php

namespace App\Http\Controllers;

use App\People;
use App\Representative;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DataTables;

class RepresentativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('representatives.index');
    }

    public function dataTable()
    {

        return DataTables::of(Representative::select('id', 'profession','work_place', 'people_id')
                ->get())

            ->editColumn('id', function($new){ return $new->id;})
            ->editColumn('profession', function($new){ return $new->profession;})
            ->editColumn('work_place', function($new){ return $new->work_place;})
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
                    
                        $buttons .= "<a href='". route('representatives.edit', $new->id) ."' role='button' class='btn btn-info btn-sm edit' data-toggle='tooltip' data-placement='left' title='Editar'><i class='fa fa-edit' ></i></a>";

                        $buttons .= "<a href='". route('representatives.delete', $new->id) ."' role='button' class='btn btn-danger btn-sm delete' data-toggle='tooltip' data-placement='left' title='eliminar'><i class='fa fa-trash-o'></i></a>";

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
        return view('representatives.create');
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

        $representative = new Representative;
        $representative->fill($request->all());
        $representative->people_id = $people->id;
        $representative->save();

        Session::flash('save','Repesentante registrado con éxito');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Representative  $representative
     * @return \Illuminate\Http\Response
     */
    public function show(Representative $representative)
    {
        return view('representatives.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Representative  $representative
     * @return \Illuminate\Http\Response
     */
    public function edit(Representative $representative)
    {
        return view('representatives.edit')->with(['representative' => $representative->people]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Representative  $representative
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Representative $representative)
    {   

        $validar = ($representative->identification == $request->get('identification'))?[
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

        $representative->people->fill($request->all());
        $representative->people->save();

        $representative->fill($request->all());
        $representative->save();

        Session::flash('save','Repesentante editado con éxito');
        return back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Representative  $representative
     * @return \Illuminate\Http\Response
     */
    public function destroy(Representative $representative)
    {
        
        $representative->people->delete();
        Session::flash('save','Repesentante eliminado con éxito.');
        
        return back();
    }
}
