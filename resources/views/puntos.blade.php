@extends('components.template')

@section('content')

<div class="section">
  <div class="container" id="puntosFarmacia">

    {{--<div class="row">
        <div class="col-6">
        <table class="table table-hover table-sm table-bordered table-responsive" >
            <h2 class="text-left mt-4 font-weight-bold h2-ventas my-3">Puntos Acumulados{{now()->day}}</h2>
            <thead class="">
                <tr class="text-center">
                <th class="text-left"scope="col">Puntos Acumulados</th>
                <th scope="col">Puntos Canjeados</th>
                </tr>
            </thead>  
            <tbody>
                <tr>
                <td class="text-right">{{$puntosAcumulados}}</td>
                <td class="text-right">{{$puntosCanjeados*-1}}</td>
                </tr>
            </tbody>
        </table>
        </div>
        <div class="col-6">
            <table class="table table-hover table-sm table-bordered table-responsive" >
                <h2 class="text-left mt-4 font-weight-bold h2-ventas my-3">Puntos Acumulados {{now()->month}} </h2>
                <thead class="">
                    <tr class="text-center">
                    <th class="text-left"scope="col">Puntos Acumulados</th>
                    <th scope="col">Puntos Canjeados</th>
                    </tr>
                </thead>  
                <tbody>
                    <tr>
                    <td class="text-right">{{$puntosAcumuladosmes}}</td>
                    <td class="text-right">{{$puntosCanjeadosmes*-1}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>--}}

    <h2 class="text-left mt-4 font-weight-bold h2-ventas my-3">Puntos por Farmacia</h2>
    <table class="table table-hover table-sm table-bordered table-responsive" >
      <thead class="">
        <tr class="text-center">
          <th class="text-center" scope="col">#</th>
          <th class="text-left"scope="col">Sucursal</th>
          <th scope="col">Acumulados Mes</th>
          <th class="text-center" scope="col">Canjeados Mes</th>
          <th scope="col">Acumulados Hoy</th>
          <th class="text-center" scope="col">Canjeados Hoy</th>
        </tr>
      </thead>  
      <tbody>
        @php
              $num = 1;
        @endphp
       <tr class="text-danger font-weight-bold">
          <th scope="row"scope="row">#</th>
          <td class="text-left">Total General</td>
          <td class="text-danger text-right">{{number_format(round($totalAcumuladosmes),2)}}</td>
          <td class="text-danger text-right">{{number_format(round($totalCanjeadosmes)*-1,2)}}</td>
          <td class="text-danger text-right">{{number_format(round($totalAcumuladoshoy),2)}}</td> 
          <td class="text-danger text-right">{{number_format(round($totalCanjeadoshoy)*-1,2)}}</td>
        </tr>
        @foreach($listafarmaciaspuntos as $listafarmaciaspuntos) 
        <tr>
          <th class="text-center"scope="row">{{$num++}}</th>
          <td class="text-left">{{$listafarmaciaspuntos->Farmacia}}</td>

          @if($listafarmaciaspuntos->acumuladosMes < 1) 
            <td class="text-danger text-right">{{number_format(round($listafarmaciaspuntos->acumuladosMes),2)}}</td>
          @else  
            <td class="text-right">{{number_format(round($listafarmaciaspuntos->acumuladosMes),2)}}</td>
          @endif


          @if($listafarmaciaspuntos->canjeadosMes < 1) 
            <td class="text-danger text-right">{{number_format(round($listafarmaciaspuntos->canjeadosMes),2)}}</td>
          @else  
            <td class="text-right">{{number_format(round($listafarmaciaspuntos->canjeadosMes),2)}}</td>
          @endif


          @if($listafarmaciaspuntos->acumuladosHoy < 1) 
            <td class="text-danger text-right">{{number_format(round($listafarmaciaspuntos->acumuladosHoy),2)}}</td>
          @else  
            <td class="text-right">{{number_format(round($listafarmaciaspuntos->acumuladosHoy),2)}}</td>
          @endif

          
          @if($listafarmaciaspuntos->canjeadosHoy < 1) 
            <td class="text-danger text-right">{{number_format(round($listafarmaciaspuntos->canjeadosHoy),2)}}</td>
          @else  
            <td class="text-right">{{number_format(round($listafarmaciaspuntos->canjeadosHoy),2)}}</td>
          @endif

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection