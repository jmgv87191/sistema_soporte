<?php

namespace App\Http\Controllers;

use App\Models\Ajuste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AjusteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $jsonData = file_get_contents(  'https://api.hilariweb.com/divisas');
        $divisas = json_decode( $jsonData, true );
        $ajuste = Ajuste::first();
        return view( 'admin.ajustes.index', compact('divisas','ajuste') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
{
    $empresa = new Ajuste(); 
    $empresa->nombre = $request->nombre; 
    $empresa->descripcion = $request->descripcion; 
    $empresa->sucursal = $request->sucursal; 
    $empresa->telefonos = $request->telefonos; 
    $empresa->direccion = $request->direccion; 
    $empresa->divisa = $request->divisa; 
    $empresa->correo = $request->correo; 
    $empresa->pagina_web = $request->pagina_web; 

    // Guardar logo principal en public/logos
    if ($request->hasFile('logo')) {
        $file = $request->file('logo');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('logos'), $filename);
        $empresa->logo = 'logos/' . $filename; // ruta relativa a public
    }

    // Guardar logo para auto en public/logos
    if ($request->hasFile('logo_auto')) {
        $file = $request->file('logo_auto');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('logos'), $filename);
        $empresa->logo_auto = 'logos/' . $filename; // ruta relativa a public
    }

    $empresa->save(); 
    
    return redirect()
        ->back()
        ->with('message', 'Ajustes guardados correctamente.')
        ->with('icon', 'success');
}



    /**
     * Display the specified resource.
     */
    public function show(Ajuste $ajuste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ajuste $ajuste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ajuste $ajuste)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ajuste $ajuste)
    {
        //
    }
}
