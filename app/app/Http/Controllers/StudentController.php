<?php

namespace App\Http\Controllers;

use App\People;
use App\Student;
use App\Representative;
use App\Section;
use App\Grade;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DataTables;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('students.index');
    }

    public function dataTable()
    {

        return DataTables::of(Student::select('id', 'people_id','mother_id', 'people_id')
                ->get())

            ->editColumn('id', function($new){ return $new->id;})
            ->editColumn('people_id', function($new){ return $new->people_id;})
            ->editColumn('mother_id', function($new){ return $new->mother_id;})
            ->editColumn('people_id', function($new){ return $new->people_id;})
            ->addColumn('ful_name', function($new){ return $new->people->fullName();})
            ->addColumn('identification', function($new){ return $new->people->identification;})
            ->addColumn('gender', function($new){ return $new->people->gender();})
            ->addColumn('birthdate', function($new){ return $new->people->birthdate;})
            ->addColumn('age', function($new){ return $new->people->age();})
            ->addColumn('action', function($new){
                    $buttons = "<div class='btn-group'>";
                    
                        $buttons .= "<a href='". route('students.inscribe', $new->id) ."' role='button' class='btn btn-success btn-sm edit' data-toggle='tooltip' data-placement='left' title='Inscribir estudiante'><i class='fa fa-university' ></i></a>";

                        $buttons .= "<a href='". route('students.edit', $new->id) ."' role='button' class='btn btn-info btn-sm edit' data-toggle='tooltip' data-placement='left' title='Editar'><i class='fa fa-edit' ></i></a>";

                        $buttons .= "<a href='". route('students.delete', $new->id) ."' role='button' class='btn btn-danger btn-sm delete' data-toggle='tooltip' data-placement='left' title='eliminar'><i class='fa fa-trash-o'></i></a>";

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
        return view('students.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createRegular()
    {
        return view('students.createRegular');
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
            'identification' => 'nullable|numeric|unique:people',
            'gender' => 'required|string',
            'birthdate' => 'required|string',
        ]);

        $people = new People();
        $people->fill($request->all());

        if ($people->age() >= 12) {
            
            return back()->withErrors(['birthdate' => 'El estudiante es mayor de 12 años'])->withInput();

        }else if ($people->age() <= 6) {
            
            return back()->withErrors(['birthdate' => 'El estudiante es menor de 6 años'])->withInput();
            
        }

        $people->save();

        $student = new Student;
        $student->fill($request->all());
        $student->people_id = $people->id;
        $student->save();

        Session::flash('save','Estudiante registrado con éxito ya puede inscribir al estudiante');
        
        return redirect()->guest('/dashboard/students/inscribe/'.$student->id);

        //return back();
    }

    public function inscribe(Request $request, Student $student)
    {

        //Representative;
        //Section;
        //Grade;
        
        $representatives = Representative::orderBy('id', 'ASC')
                ->with('people')
                ->get()
                ->pluck('people.lavel_select', 'id');

        $grades = Grade::orderBy('id', 'ASC')->pluck('grade', 'id');
        
        $sections = Section::orderBy('id', 'ASC')->pluck('section', 'id');

        return view('students.inscribe')->with([
                'student' => $student->people,
                'representatives' => $representatives,
                'grades' => $grades,
                'sections' => $sections,
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit')->with(['student' => $student->people]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $validar = ($student->identification == $request->get('identification'))?[
            'name' => 'required|string',
            'last_name' => 'required|string',
            'identification' => 'nullable|numeric|unique:people',
            'gender' => 'required|string',
            'birthdate' => 'required|string',
        ]:[
            'name' => 'required|string',
            'last_name' => 'required|string',
            'identification' => 'nullable|numeric',
            'gender' => 'required|string',
            'birthdate' => 'required|string',
        ];

        $this->validate(request(), $validar);

        $student->people->fill($request->all());

        $people = new People();
        $people->fill($request->all());

        if ($people->age() >= 12) {
            return back()->withErrors(['birthdate' => 'El estudiante es mayor de 12 años']);
        }else if ($people->age() <= 6) {
            return back()->withErrors(['birthdate' => 'El estudiante es menor de 6 años']);
        }

        $student->people->update();

        $student->fill($request->all());

        $student->update();

        Session::flash('save','Estudiante editado con éxito');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->people->delete();
        Session::flash('save','Estudiante eliminado con éxito.');
        
        return back();
    }
}
