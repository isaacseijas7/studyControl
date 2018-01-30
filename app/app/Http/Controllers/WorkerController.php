<?php

namespace App\Http\Controllers;

use App\Worker;
use App\People;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DataTables;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('workers.index');
    }

    public function dataTable()
    {

        return DataTables::of(Worker::select('id', 'people_id')
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
                    
                        $buttons .= "<a href='". route('workers.edit', $new->id) ."' role='button' class='btn btn-info btn-sm edit' data-toggle='tooltip' data-placement='left' title='Editar'><i class='fa fa-edit' ></i></a>";

                        $buttons .= "<a href='". route('workers.delete', $new->id) ."' role='button' class='btn btn-danger btn-sm delete' data-toggle='tooltip' data-placement='left' title='eliminar'><i class='fa fa-trash-o'></i></a>";

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
        return view('workers.create');
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

        $worker = new Worker;
        $worker->fill($request->all());
        $worker->people_id = $people->id;
        $worker->save();

        Session::flash('save','Obrero registrado con éxito');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function show(Worker $worker)
    {
        return view('workers.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function edit(Worker $worker)
    {
        return view('workers.edit')->with(['worker' => $worker->people]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Worker $worker)
    {
        $validar = ($worker->identification == $request->get('identification'))?[
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

        $worker->people->fill($request->all());
        $worker->people->save();

        $worker->fill($request->all());
        $worker->save();

        Session::flash('save','Obrero editado con éxito');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Worker $worker)
    {
        $worker->people->delete();
        Session::flash('save','Obrero eliminado con éxito.');
        
        return back();
    }
}
