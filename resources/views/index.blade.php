@extends('components.template')
@section('content')

<div class="section">
  <div class="container" id="ventashoy">
    <h2 class="text-left mt-4 font-weight-bold h2-ventas my-3">Ventas por Farmacia</h2>
    {{--<a class="btn btn-sm my-3" 
            href="{{route('ventasHoyPDF')}}" 
            role="button" target="_blank">Generar Reporte
    </a>--}}
    <table class="table table-hover table-sm table-bordered table-responsive" >
      <thead class="">
        <tr class="text-center">
          <th class="text-center" scope="col">#</th>
          <th class="text-left"scope="col">Sucursal</th>
          <th scope="col">Ventas Totales</th>
          <th class="text-center" scope="col">Última Actualización</th>
        </tr>
      </thead>  
      <tbody>
        @php
              $num = 1;
        @endphp
        <tr class="text-danger font-weight-bold">
          <th scope="row"scope="row">#</th>
          <td class="text-left">Total General</td>
          <td class="text-right">L. {{number_format(round($ventasGeneralTotal),2)}}</td>
          <td class="text-left">{{substr(now(),0,-3)}}</td>
        </tr>
        @foreach($ventasHoy as $ventasHoy) 
        <tr>
          <th class="text-center"scope="row">{{$num++}}</th>
          <td class="text-left">{{$ventasHoy->Farmacia}}</td>
          <td class="text-right">L. {{number_format(round($ventasHoy->Venta),2)}}</td>
          <td class="text-left">{{substr($ventasHoy->FechaHora,0,-3)}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection