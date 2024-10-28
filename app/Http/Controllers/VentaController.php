<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\Detalle_venta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $ventas=Venta::orderBy('id','ASC')->paginate(10);
        return view('venta.index',compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //obtener  todos los clientes
        $clientes=Cliente::all();

        //obtener todos los productos

        $productos= Producto::all();

       return view('venta.create',compact('clientes','productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'detalles' => 'required|array',
            'detalles.*.producto_id' => 'required|exists:productos,id',
            'detalles.*.cantidad' => 'required|integer|min:1',           
            'descuento' => 'nullable|numeric|min:0',
        ]);

        //iniciar transaccion
        DB::transaction(function()use($request){
         
            //obtener el ide del vendedor
            $vendedorId=Auth::id();

            //Crear venta
            $venta =Venta::create([
                'cliente_id'=>$request->cliente_id,
                'vendedor_id'=>$vendedorId,
                'descuento' => $request->descuento ?? 0,
                'total' => 0,
            ]);
            
            $totalVenta=0;
            
            foreach($request->detalles as $detalle){
                $producto = Producto::find($detalle['producto_id']);
                $subtotal = $detalle['cantidad'] * $producto->precio_venta;
                $totalVenta+=$subtotal;

                // Crear el detalle de la venta
                Detalle_venta::create([
                'venta_id' => $venta->id,
                'producto_id' => $detalle['producto_id'],
                'cantidad' => $detalle['cantidad'],
                'precio_unitario' => $producto->precio_venta, // Guardar el precio de venta real
                'subtotal' => $subtotal,
            ]);

             // Actualizar el stock del producto
             $producto->stock -= $detalle['cantidad']; 
             $producto->save(); 
              
              // Actualizar el total de la venta
             $venta->total = $totalVenta -  $totalVenta*($request->descuento ?? 0)/100;
             $venta->save();

            }


        });
        return redirect()->route('venta.index')->with('success', 'Venta creada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
