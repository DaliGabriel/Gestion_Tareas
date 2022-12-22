<?php

namespace App\Http\Controllers;

use App\Models\Tareas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mostrar tareas del usuario
        $id = Auth::id();
        return view('index', [
            'tareas' => Tareas::with('user')->where('user_id',  $id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Guardar tarea en base de datos
        $validated = $request->validate([
            'titulo' => 'required|string|max:55',
            'descripcion' => 'required|string|max:55',
            'tags' => 'required',
            'prioridad' => 'required',
            
        ]);
 
        $request->user()->tareas()->create($validated);
 
        
        return redirect(route('tareas.index'))->with('message', 'Tarea Añadida con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tareas  $tareas
     * @return \Illuminate\Http\Response
     */
    public function show(Tareas $tareas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tareas  $tareas
     * @return \Illuminate\Http\Response
     */
    public function edit(Tareas $tarea)
    {

        return view('edit', [
            'tarea' => $tarea,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tareas  $tareas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tareas $tarea)
    {
        
        //El usuario que quiere editar el post tiene que ser el dueño
        if ($tarea->user_id != auth()->id()){
            abort(403, 'Upss, parece que no tienes acceso');
        }
 
        $validated = $request->validate([
            'titulo' => 'required|string|max:55',
            'descripcion' => 'required|string|max:55',
            'tags' => 'required',
            'prioridad' => 'required',
        ]);
 
        $tarea->update($validated);
 
        return redirect(route('tareas.index'))->with('message', 'Tarea Editada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tareas  $tareas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tareas $tarea)
    {

        //El usuario que quiere editar el post tiene que ser el dueño
        if ($tarea->user_id != auth()->id()){
            abort(403, 'Upss, parece que no tienes acceso');
        }
 
        $tarea->delete();
 
        return redirect(route('tareas.index'))->with('message_delete', 'Tarea Eliminada con exito');
    }
}
