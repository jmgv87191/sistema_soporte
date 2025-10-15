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
        request()->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'sucursal' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefonos' => 'required|string|max:200',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo_auto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'divisa' => 'required|string|max:10',
            'correo' => 'required|email|max:255',
            'pagina_web' => 'nullable|url|max:255',
        ]);

        $ajuste = Ajuste::first();
        if (!$ajuste) {
            $ajuste = new Ajuste();
        }

        $ajuste->nombre = $request->nombre;
        $ajuste->descripcion = $request->descripcion;
        $ajuste->sucursal = $request->sucursal;
        $ajuste->direccion = $request->direccion;
        $ajuste->telefonos = $request->telefonos;
        $ajuste->divisa = $request->divisa;
        $ajuste->correo = $request->correo;
        $ajuste->pagina_web = $request->pagina_web;
        if ($request->hasFile('logo')) {
            if ($ajuste->logo && Storage::exists('public/logos/'.$ajuste->logo)) {
                // Eliminar el logo anterior si existe
                Storage::delete( 'public/logos'.$ajuste->logo);
            }

    }
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
