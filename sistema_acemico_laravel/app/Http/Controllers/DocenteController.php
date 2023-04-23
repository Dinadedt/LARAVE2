<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()//GET
    {
        //select * from docentes;
        return docente::get();
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
    public function store(Request $request)//POST
    {
        //insert into docentes...
        Docente::create($request->all());
        return response()->json(['msg'=>'ok'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Docente $docente)//GET
    {
        //seelct * from docente where idDocente=?
        return $docente;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Docente $docente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Docente $docente)//PUT
    {
        //update docentes set ? where id=?
        //$docente->update($request->all(), $request->all());
        $docente::where('idDocente', $request['idDocente']) ->update([
            'codigo'=>$request['codigo'],
            'nombre'=>$request['nombre'],
        ]);
        return response()->json(['msg'=>'ok'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Docente $docente)//DELETE
    {
        //delete docentes from docentes where id=?
        //delete docentes from docentes where iddocente=?
        //$docente->delete();
        $docente::where('idDocente', $request['idDocente'])->delete();
        return response()->json(['msg'=>'ok'], 200);
    }
}
