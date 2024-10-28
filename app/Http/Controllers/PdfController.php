<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Producto;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    //
    public function pdfProductos(){
        $productos = Producto::select('id', 'nombre', 'descripcion', 'precio',
        'precio_venta', 'stock','id_categoria') 
                     ->orderBy('id', 'ASC')
                     ->get();
        $pdf = Pdf::loadView('pdf.productos', ['productos'=>$productos]);
        $pdf->setPaper('carta','A4');
        return $pdf->stream();
    }
}
