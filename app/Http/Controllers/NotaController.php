<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNotaRequest;
use App\Http\Requests\UpdateNotaRequest;
use App\Models\Nota;
use Exception;
use Illuminate\Http\Response as HttpResponse;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $notas = Nota::all()->load('usuario');
            return response()->json($notas, 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error listando notas.'], HttpResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNotaRequest $request)
    {
        try {
            $nota = Nota::create($request->validated());
            return response()->json($nota, HttpResponse::HTTP_CREATED);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error creando nota.'], HttpResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Nota $nota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotaRequest $request, Nota $nota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nota $nota)
    {
        //
    }
}
