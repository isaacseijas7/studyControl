<?php

namespace App\Http\Controllers;

use App\Inscription;
use App\AcademicPeriod;
use App\Student;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DataTables;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $num_active = AcademicPeriod::where('status', 'active')->orderby('created_at','DESC')->take(1)->get();

        if($num_active->count() < 1){
            Session::flash('delete','No hay un período académico activo');
            return back();
        }

        $att_inscription = Inscription::where('student_id', $request->get('student_id'))
                ->where('academic_period_id', $num_active[0]->id)
                ->orderby('created_at','DESC')
                ->take(1)
                ->get();

        if($att_inscription->count() > 0){
            Session::flash('delete','Estudiante ya inscrito en el período académico actual <a target="__black" href="/dashboard/proof-of-registration/'.$request->get('student_id').'"> <i class="fa fa-download" aria-hidden="true"></i> Descargar Constancia </a>');
            return back();
        }


        $this->validate(request(), [
            'grade_id' => 'required|string',
            'section_id' => 'required|string',
        ]);

        if ($request->get('mother_id') == null  && $request->get('father_id') == null  && $request->get('auxiliary_id') == null ) {


            return back()->withErrors(['mother_id' => 'Seleccione almeno un representante'])->withInput();

        }

        $student = Student::find($request->get('student_id'));
        $student->mother_id = $request->get('mother_id');
        $student->father_id = $request->get('father_id');
        $student->auxiliary_id = $request->get('auxiliary_id');
        $student->save();

        $inscription = new Inscription();
        $inscription->fill($request->all());
        $inscription->academic_period_id = $num_active[0]->id; 
        $inscription->save();
        
        Session::flash('save','Estudiante inscrito con exito <a target="__black" href="/dashboard/proof-of-registration/'.$student->id.'"> <i class="fa fa-download" aria-hidden="true"></i> Descargar Constancia </a>');
        return back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inscription  $inscription
     * @return \Illuminate\Http\Response
     */
    public function show(Inscription $inscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inscription  $inscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Inscription $inscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inscription  $inscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscription $inscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inscription  $inscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inscription $inscription)
    {
        //
    }

    public function proofOfRegistration(Student $student)
    {

        $num_active = AcademicPeriod::where('status', 'active')->orderby('created_at','DESC')->take(1)->get();

        $student->load('people', 'mother.people', 'father.people', 'auxiliary.people');
        $student->load(['inscriptions' => function ($query) use ($num_active) {
            $query->where('id', $num_active[0]->id)->first();
        }]);
        $student->load('inscriptions.academic_period');

        if($student->inscriptions->count() < 1){
            Session::flash('delete','Estudiante no esta inscrito en el período académico actual');
            return back();
        }
        
        //return $student;
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('students.proof-of-registration', [
            'student' => $student,
        ])->setPaper('letter');

        return $pdf->stream('constancia.pdf');

    }

}
