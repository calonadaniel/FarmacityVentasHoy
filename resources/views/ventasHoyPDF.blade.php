<!DOCTYPE html>
<html lang="es">
    <head>
    {{--@include('components.head')--}}
    @include('components.styles')
    </head>
    <body>
        {{--@include('components.navbar') --}}
        <div class="section">
          <h2 class="text-center my-4 font-weight-bold">Ventas por Farmacia</h2>
          <div class="container text-center">
            <table class="table table-sm table-bordered">
              <thead class="">
                <tr >
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
                @foreach($ventasHoy as $ventasHoy) 
                <tr>
                  <th class="text-center"scope="row">{{$num++}}</th>
                  <td class="text-left">{{$ventasHoy->Farmacia}}</td>
                  <td class="text-right">L. {{number_format(round($ventasHoy->Venta),2)}}</td>
                  <td class="text-left">{{substr($ventasHoy->FechaHora,0,-3)}}</td>
                </tr>
                @endforeach

                <tr class="text-danger font-weight-bold">
                  <th scope="row"scope="row">#</th>
                  <td class="text-left">Total General</td>
                  <td class="text-right">L. {{number_format(round($ventasGeneralTotal),2)}}</td>
                  <td class="text-left">{{substr(now(),0,-3)}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        {{--@include('components.footer')--}}
        {{--@include('components.scripts'--}}
    </body>
</html>







