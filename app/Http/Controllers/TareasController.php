<?php

namespace App\Http\Controllers;

use App\Models\Tareas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\MailTest;
use Illuminate\Support\Facades\Mail;

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Obtener el id del usuario actual
        $id = Auth::id();
        //Mostrar tareas en relacion con el usario logeado
        return view('index', [
            'tareas' => Tareas::with('user')->where('user_id',  $id)->get()
        ]);
    }

    public function ver_tareas()
    {
        //Obtener el id del usuario actual
        $id = Auth::id();
        $busqueda = '';
        //Mostrar tareas en relacion con el usario logeado
        return view('ver_tareas', [
            'tareas' => Tareas::with('user')->where('user_id',  $id)->get(),
            'busqueda' => $busqueda
        ]);
    }

    public function buscar_tareas(Request $request)
    {
        //Obtener el id del usuario actual
        $id = Auth::id();
        $busqueda = $request->buscar;

        
        //Mostrar tareas en relacion con el usario logeado
        return view('ver_tareas', [
            'tareas' => Tareas::with('user')
            ->where('user_id',  $id)
            ->where('titulo', 'LIKE', "%{$busqueda}%")
            ->orWhere('descripcion', 'LIKE', "%{$busqueda}%")
            ->orWhere('tags', 'LIKE', "%{$busqueda}%")
            ->orWhere('prioridad', 'LIKE', "%{$busqueda}%")
            ->get(),
            'busqueda' => $busqueda
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

        

        //Insertar nueva tarea en la base de datos
        $request->user()->tareas()->create($validated);        

        //Enviar correo con los datos del formulario
        //
        Mail::to(Auth::user()->email)->send(
            new MailTest(
            $validated['titulo'],
            $validated['descripcion'],
            $validated['tags'],
            $validated['prioridad'],
            Auth::user()->name

        ));
 
        //Redireccionar al usuario a index
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
        //Mostrar la vista editar con los modelos de la clase tarea
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
 
        //Validar datos del formulario editar
        $validated = $request->validate([
            'titulo' => 'required|string|max:55',
            'descripcion' => 'required|string|max:55',
            'tags' => 'required',
            'prioridad' => 'required',
        ]);
        
        //Actualizar la tarea en base al id
        $tarea->update($validated);
 
        //Redirigir al usuario a index
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
        
        //Borrar la tarea en base al id
        $tarea->delete();
 
        //Redirigir al usuario a index
        return redirect(route('tareas.index'))->with('message_delete', 'Tarea Eliminada con exito');
    }
}
