@extends('components.template')
@section('content')


<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 d-flex justify-content-center mb-3">
                <div class="card mt-2 " style="width:18rem">
                    <img class="card-img-top mt-1" src=".\img\about.png"  style="max-width:auto; height:70%" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Sobre la aplicación:</h5>
                        <p class="card-text text-justify">Aplicación web con sistema de autentificación para consultar las ventas y puntos en tiempo real por sucursal, el total general e información afín.</p>
                        <a href="{{route('index')}}" class="btn">Consultar Ventas</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="col-sm-12">
                    <div class="card  mb-3 mt-3">
                        <div class="card-header  ">Ficha Técnica:</div>
                        <div class="card-body ">
                        <p class="card-text">Laravel Framework</p>
                        <p class="card-text">Bootstrap</p>
                        <p class="card-text">HTML5 & CSS</p>
                        <p class="card-text">Javascript</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="card my-3">
                        <div class="card-header">Autor:</div>
                        <div class="card-body ">
                        {{--<p class="card-text">Daniel Leonardo Valenzuela Calona</p> --}}
                        <p class="card-text">Departamento de Sistemas Farmacity S. de R.L. de C.V.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-header">*Derechos de uso otorgados a Farmacity S. de R.L. de C.V.</div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>

@endsection