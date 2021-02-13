<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\ventasHoy;
use App\Models\puntosDetalle;
use Illuminate\Support\Facades\DB;

use PDF;

class ventashoyController extends Controller
{
    public function index () {

        $ventasHoy = ventasHoy::orderby('Farmacia','asc')->get(); 
        $ventasGeneralTotal = ventasHoy::sum('Venta');
        return view('index', compact('ventasHoy','ventasGeneralTotal'));
    }

    public function about() {
 
        return view('about');
    }

    public function pdf()
    {
        $ventasHoy = ventasHoy::orderby('Farmacia','asc')->get(); 
        $ventasGeneralTotal = ventasHoy::sum('Venta');
        $pdf = PDF::loadView('ventasHoyPDF', compact ('ventasHoy','ventasGeneralTotal'));
        return $pdf->stream();        
    }

    public function puntos() {
        $totalAcumuladoshoy = 0;
        $totalAcumuladosmes = 0;

        $totalCanjeadoshoy = 0;
        $totalCanjeadosmes = 0;

        $listafarmaciaspuntos = puntosDetalle::from('puntos_detalle as pd')
        ->selectraw("store.name as Farmacia, pd.store, 
        sum(case Tipo when 'C' then Puntos*(-1) else 0 end ) as canjeadosMes, 
        sum(case Tipo when 'F' then Puntos*1 else 0 end) as acumuladosMes, 
        (select sum(case pdc.Tipo when 'C' then pdc.Puntos*(-1) else 0 end ) from puntos_detalle pdc where pdc.store = pd.store and DATEADD(dd, 0, DATEDIFF(dd, 0, pdc.Fecha)) = DATEADD(dd, 0, DATEDIFF(dd, 0, GETDATE())) ) as canjeadosHoy, 
        (select sum(case pda.Tipo when 'F' then pda.Puntos*1 else 0 end ) from puntos_detalle pda where pda.store = pd.store and DATEADD(dd, 0, DATEDIFF(dd, 0, pda.Fecha)) = DATEADD(dd, 0, DATEDIFF(dd, 0, GETDATE())) ) as acumuladosHoy")
        ->join ('store', 'pd.store','=','store.id')
        ->whereraw("pd.Fecha >= DATEADD(MONTH, DATEDIFF(MONTH, 0, GetDate()), 0)
                   and pd.Fecha < DATEADD(MONTH, DATEDIFF(MONTH, 0, GetDate())+1, 0)")
        ->where('store.name', 'not like', '%ZZ%' )
        ->where('store.name', 'not like', '%ProNAF%')
        ->where('store.name', 'not like', '%Administracion%')
        ->where('store.name', 'not like', '%Bodega%')
        ->where('store.name', 'not like', '%Distribucion%')
        ->where('store.name', 'not like', '%DevolucionesPro%')
        ->orderby('store.name','asc')
        ->groupby('store.name','pd.store')
        ->get();

        /*if(carbon::today()->hour < 7) {

            $totalAcumuladoshoy = puntosDetalle::where('Tipo','=','F')
            ->wheredate('Fecha', carbon::yesterday())
            ->sum('Puntos');
    
            $totalAcumuladosmes = puntosDetalle::where('Tipo','=','F')
            ->whereYear('Fecha', carbon::yesterday()->year)
            ->whereMonth('Fecha',carbon::yesterday()->month)
            ->sum('Puntos');
            $totalAcumuladosmes -= puntosDetalle::where('Tipo','=','F')
            ->wheredate('Fecha', carbon::today())
            ->sum('Puntos');
    
            $totalCanjeadoshoy = puntosDetalle::where('Tipo','=','C')
            ->wheredate('Fecha', carbon::yesterday())
            ->sum('Puntos');
    
            $totalCanjeadosmes = puntosDetalle::where('Tipo','=','C')
            ->whereYear('Fecha', carbon::yesterday()->year)
            ->whereMonth('Fecha',carbon::yesterday()->month)
            ->sum('Puntos');
            $totalCanjeadosmes -= puntosDetalle::where('Tipo','=','C')
            ->wheredate('Fecha', carbon::today())
            ->sum('Puntos');

        }else {*/
            $totalAcumuladoshoy = puntosDetalle::where('Tipo','=','F')
            ->wheredate('Fecha', today())
            ->sum('Puntos');
    
            $totalAcumuladosmes = puntosDetalle::where('Tipo','=','F')
            ->whereYear('Fecha', today()->year)
            ->whereMonth('Fecha',today()->month)
            ->sum('Puntos');
    
            $totalCanjeadoshoy = puntosDetalle::where('Tipo','=','C')
            ->wheredate('Fecha', today())
            ->sum('Puntos');
    
            $totalCanjeadosmes = puntosDetalle::where('Tipo','=','C')
            ->whereYear('Fecha', today()->year)
            ->whereMonth('Fecha',today()->month)
            ->sum('Puntos');
            
        //}

        return view('puntos', compact('listafarmaciaspuntos','totalAcumuladoshoy','totalAcumuladosmes','totalCanjeadoshoy','totalCanjeadosmes'));

    }
}
