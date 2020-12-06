@extends('layouts.app')
@section('title', 'Menu')

@section('corazon')
<a href="/menu">
    <img src="images/corazon.png">
</a>
@endsection

@section('pag_title','Menu')

@section('content')

<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-10 dark:bg-gray-900 sm:items-center sm:pt-0">
      
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div align ="center" class="p-6">
                        <img src="portafolio.png" width="200" height="200"/>
                        <br></br>
                        <div class="texto box-gray">
                        <a href="/portafolio">Portfolio</a>
                        </div>
                    </div>

                    <div align="center" class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                        <img src="terapia-fisica.png" width="200" height="200"/>
                        <br></br>
                        <div class="texto box-gray">
                        <a href="/physiotherapy">Physiotherapy</a>
                        </div>
                    </div>

                    <div align="center" class="p-6 border-t border-gray-200 dark:border-gray-700">
                        <img src="cuidado-de-la-salud.png" width="200" height="200"/> 
                        <br></br>
                        <div  class="texto box-gray">
                            <a href="/data">Data</a>
                        </div>
                    </div>

                    <div align="center" class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                        <img src="prescripcion.png" width="200" height="200"/>
                        <br></br>
                        <div class="texto box-gray">
                        <a href="/formulas1">Formulas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


@endsection