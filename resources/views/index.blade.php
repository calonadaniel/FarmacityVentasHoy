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
          <th scope="col">Lab Farmacity</th>
          <th scope="col">Calox</th>
          <th scope="col">La Santé</th>
          <th scope="col">Adiuvo</th>
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
          <td class="text-right">L. {{number_format(round($deptFarmacityTotal),2)}}</td>
          <td class="text-right">L. {{number_format(round($deptCaloxTotal),2)}}</td>
          <td class="text-right">L. {{number_format(round($deptLaSanteTotal),2)}}</td>
          <td class="text-right">L. {{number_format(round($deptAdiuvoTotal),2)}}</td>
          <td class="text-right">{{substr(now(),0,-3)}}</td>
        </tr>
        @foreach($ventasHoy as $ventasHoy) 
        <tr>
          <th class="text-center"scope="row">{{$num++}}</th>
          <td class="text-left">{{$ventasHoy->Farmacia}}</td>

          @if($ventasHoy->Venta > 0)
            <td class="text-right">L. {{number_format(round($ventasHoy->Venta),2)}}</td>
          @else
            <td class="text-right text-danger">L. {{number_format(round($ventasHoy->Venta),2)}}</td>
          @endif

          @if($ventasHoy->FC > 0)
            <td class="text-right">L. {{number_format(round($ventasHoy->FC),2)}}</td>
          @else
            <td class="text-right text-danger">L. {{number_format(round($ventasHoy->FC),2)}}</td>
          @endif

          @if($ventasHoy->CLX > 0)
            <td class="text-right">L. {{number_format(round($ventasHoy->CLX),2)}}</td>
          @else
            <td class="text-right text-danger">L. {{number_format(round($ventasHoy->CLX),2)}}</td>
          @endif

          @if($ventasHoy->LS > 0)
            <td class="text-right">L. {{number_format(round($ventasHoy->LS),2)}}</td>
          @else
            <td class="text-right text-danger">L. {{number_format(round($ventasHoy->LS),2)}}</td>
          @endif

          @if($ventasHoy->AD > 0)
            <td class="text-right">L. {{number_format(round($ventasHoy->AD),2)}}</td>
          @else
            <td class="text-right text-danger">L. {{number_format(round($ventasHoy->AD),2)}}</td>
          @endif

          <td class="text-right">{{substr($ventasHoy->FechaHora,0,-3)}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection