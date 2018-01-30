<html>

<head>
    <style>
        @page {
            margin: 100px 25px;
        }
        
        header {
            position: fixed;
            top: -60px;
            left: 0px;
            right: 0px;
            background-color: lightblue;
            height: 50px;
        }
        
        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            background-color: lightblue;
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
    	<h2>Header</h2>
    </header>
    <footer>
    	<h4>Footer</h4>
    </footer>
    <main>


    	<h2 style="text-align: center;">CONSTANCIA DE INSCRIPCIÓN</h2>

    	<hr>

    	<p><b>C.I.:</b> {{ $student->people->identification }} - <b>Estudiante</b> {{ $student->people->fullName() }}</p>

		
		<p><b>PERÍODO:</b> {{ $student->inscriptions[0]->academic_period->academic_period }} - Inscripcion</p>
        <h2>Datos del estudiante</h2>
        <table>
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

        <hr>

        @if ($student->mother !== null)
		    
	        <h2>Datos de la madre</h2>
	        <table>
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
	        <table>
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
	        </table>

		@endif

		@if ($student->auxiliary !== null)
		    
	        <h2>Datos del Representante</h2>
	        <table>
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



    </main>
</body>

</html>