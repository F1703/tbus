<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tipos = Tipo::orderBy('idtipo', 'desc')->paginate(10);

		return view('tipos.index', compact('tipos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tipos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$tipo = new Tipo();



		$tipo->save();

		return redirect()->route('tipos.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tipo = Tipo::findOrFail($id);

		return view('tipos.show', compact('tipo'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tipo = Tipo::findOrFail($id);

		return view('tipos.edit', compact('tipo'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$tipo = Tipo::findOrFail($id);



		$tipo->save();

		return redirect()->route('tipos.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$tipo = Tipo::findOrFail($id);
		$tipo->delete();

		return redirect()->route('tipos.index')->with('message', 'Item deleted successfully.');
	}

}
