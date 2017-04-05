<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Linea;
use Illuminate\Http\Request;

class LineaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lineas = Linea::orderBy('idlinea', 'desc')->paginate(10);

		return view('lineas.index', compact('lineas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('lineas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$linea = new Linea();



		$linea->save();

		return redirect()->route('lineas.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$linea = Linea::findOrFail($id);

		return view('lineas.show', compact('linea'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$linea = Linea::findOrFail($id);

		return view('lineas.edit', compact('linea'));
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
		$linea = Linea::findOrFail($id);



		$linea->save();

		return redirect()->route('lineas.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$linea = Linea::findOrFail($id);
		$linea->delete();

		return redirect()->route('lineas.index')->with('message', 'Item deleted successfully.');
	}

}
