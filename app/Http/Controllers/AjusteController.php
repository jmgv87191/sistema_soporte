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

        return view( 'admin.ajustes.index', compact('divisas') );
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
        //return response()->json($request->all());
        
        $empresa = new Ajuste(); // o el nombre de tu modelo 
        $empresa->nombre = $request->nombre; 
        $empresa->descripcion = $request->descripcion; 
        $empresa->sucursal = $request->sucursal; 
        $empresa->telefonos = $request->telefonos; 
        $empresa->direccion = $request->direccion; 
        $empresa->divisa = $request->divisa; 
        $empresa->correo = $request->correo; 
        $empresa->pagina_web = $request->pagina_web; 

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $path = $file->store('public/logos','public'); // Guarda en storage/app/public/logos
            $empresa->logo = Storage::url($path); // Guarda la URL accesible públicamente
        }

        if ($request->hasFile('logo_auto')) {
            $file = $request->file('logo_auto');
            $path = $file->store('public/logos','public'); // Guarda en storage/app/public/logos
            $empresa->logo_auto = Storage::url($path); // Guarda la URL accesible públicamente
        }


        $empresa->save(); 
        
        return redirect()->back()->with('success', 'Ajustes guardados correctamente.');

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
