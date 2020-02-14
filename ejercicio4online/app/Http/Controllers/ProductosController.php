<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Productos::all();

		return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'Isan'=>'required',
        'titulo'=>'required',
        'director'=>'required',
		'guionista'=>'required',
		'productor'=>'required',
		'anyo'=>'required'
    ]);

    $producto = new Productos([
        'Isan' => $request->get('Isan'),
        'titulo' => $request->get('titulo'),
        'director' => $request->get('director'),
        'guionista' => $request->get('guionista'),
		'productor' => $request->get('productor'),
        'anyo' => $request->get('anyo')
    ]);

    $producto->save();

    return redirect('/productos')->with('success', '¡Producto guardado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $producto = Productos::find($id);
    return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        'Isan'=>'required',
        'titulo'=>'required',
        'director'=>'required',
		'guionista'=>'required',
		'productor'=>'required',
		'anyo'=>'required'		
		]);
		
		$producto = Productos::find($id);
		$producto->Isan =  $request->get('Isan');
		$producto->titulo =  $request->get('titulo');
		$producto->director = $request->get('director');
		$producto->guionista = $request->get('guionista');
		$producto->productor = $request->get('productor');
		$producto->anyo = $request->get('anyo');
		$producto->save();
	
    return redirect('/productos')->with('success', '¡Producto actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $producto = Productos::find($id);
    $producto->delete();
	return redirect('/productos')->with('success', '¡Producto borrado!');
    }
}
