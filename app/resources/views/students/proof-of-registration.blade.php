<html>

<head>
    <style>
        @page {
            margin: 100px 25px;
        }
        
        header {
            position: relative;
            top: -60px;
            left: 0px;
            right: 0px;
        }
        
        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 50px;
        }
        
        div.secttion {
            page-break-after: always;
        }
        
        div.secttion:last-child {
            page-break-after: never;
        }
    </style>
</head>

<body>
    <header>
    	<img src="assets/img/membrete3.png" style="width: 100%; margin-bottom: 40px;">
    	<table style="width: 100%;">
    		<tr>
    			<td style="width: 100px;">
			    	<img src="assets/img/logoEscuela.png" style="width: 100%;">
    			</td>
    			<td>
			    	<p style="text-align: center; margin: auto;">
			    		República Bolivariana de Venezuela<br>
			    		Ministerio del Poder Popular para la Educación<br>
			    		Unidad Educativa Escuela Bolivariana "Uverito"<br>
			    	</p>
    			</td>
    			<td style="width: 200px; text-align: center;">
    				<b>Fecha de inscripción</b> <br>
					{{ explode(" ", $student->inscriptions[0]->created_at)[0] }}
    			</td>
    		</tr>
    	</table>
    </header>
  
    <footer style="text-align: center;">
    	<p>Fecha de impresion {{ date('Y-m-d') }}</p>
    </footer>
    <main>


    	<h2 style="text-align: center;">CONSTANCIA DE INSCRIPCIÓN</h2>

    	<hr>
		
    	<p><b>C.I.:</b> {{ $student->people->identification }} - <b>Estudiante</b> {{ $student->people->fullName() }}</p>

		
		<p><b>PERÍODO:</b> {{ $student->inscriptions[0]->academic_period->academic_period }} - Inscripcion</p>

		<p><b>GRADO Y SECCIÓN:</b> {{ $student->inscriptions[0]->grade->grade }} {{ $student->inscriptions[0]->section->section }}</p>


        <h2>Datos del estudiante</h2>

        <table border="2" style="width: 100%">
            <tr>
                <td>
                    <b>Estudiante</b>
                </td>
                <td>
                    {{ $student->people->fullName() }}
                </td>
            </tr>
            <tr>
                <td>
                    <b>Cédula</b>
                </td>
                <td>
                    {{ $student->people->identification }}
                </td>
            </tr>
            <tr>
                <td>
                    <b>Sexo</b>
                </td>
                <td>
                    {{ $student->people->gender() }}
                </td>
            </tr>
            <tr>
                <td>
                    <b>Fecha de nacimiento</b>
                </td>
                <td>
                    {{ $student->people->birthdate }}
                </td>
            </tr>
            <tr>
                <td>
                    <b>Edad</b>
                </td>
                <td>
                    {{ $student->people->age() }}
                </td>
            </tr>
        </table>

        

        @if ($student->mother !== null)
		    
	        <h2>Datos de la madre</h2>
	        <table border="2" style="width: 100%">
	            <tr>
	                <td>
	                    <b>Madre</b>
	                </td>
	                <td>
	                    {{ $student->mother->people->fullName() }}
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <b>Cédula</b>
	                </td>
	                <td>
	                    {{ $student->mother->people->identification }}
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <b>Sexo</b>
	                </td>
	                <td>
	                    {{ $student->mother->people->gender() }}
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <b>Fecha de nacimiento</b>
	                </td>
	                <td>
	                    {{ $student->mother->people->birthdate }}
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <b>Edad</b>
	                </td>
	                <td>
	                    {{ $student->mother->people->age() }}
	                </td>
	            </tr>
	        </table>

		@endif

		@if ($student->father !== null)
		    
	        <h2>Datos del padre</h2>
	        <table border="2" style="width: 100%">
	            <tr>
	                <td>
	                    <b>Padre</b>
	                </td>
	                <td>
	                    {{ $student->father->people->fullName() }}
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <b>Cédula</b>
	                </td>
	                <td>
	                    {{ $student->father->people->identification }}
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <b>Sexo</b>
	                </td>
	                <td>
	                    {{ $student->father->people->gender() }}
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <b>Fecha de nacimiento</b>
	                </td>
	                <td>
	                    {{ $student->father->people->birthdate }}
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <b>Edad</b>
	                </td>
	                <td>
	                    {{ $student->father->people->age() }}
	                </td>
	            </tr>
	        </table><br></br>

		@endif

		@if ($student->auxiliary !== null)
		    
	        <h2>Datos del Representante</h2>
	        <table border="2" style="width: 100%">
	            <tr>
	                <td>
	                    <b>Representante</b>
	                </td>
	                <td>
	                    {{ $student->auxiliary->people->fullName() }}
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <b>Cédula</b>
	                </td>
	                <td>
	                    {{ $student->auxiliary->people->identification }}
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <b>Sexo</b>
	                </td>
	                <td>
	                    {{ $student->auxiliary->people->gender() }}
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <b>Fecha de nacimiento</b>
	                </td>
	                <td>
	                    {{ $student->auxiliary->people->birthdate }}
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <b>Edad</b>
	                </td>
	                <td>
	                    {{ $student->auxiliary->people->age() }}
	                </td>
	            </tr>
	        </table>

		@endif


		<div style="text-align: center;">
			------------------------------------------ <br>
			{{$student->inscriptions[0]->director}} <br> {{$student->inscriptions[0]->ci_director}} <br>
			Firma Director:

		</div>
		<br>
		<div style="text-align: center;">
			
			------------------------------------------ <br>
			Firma Reprecentante:

		</div>



    </main>
</body>

</html>