<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Localidad;
use Illuminate\Http\Request;

class LocalidadController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$localidads = Localidad::orderBy('idlocalidad', 'desc')->paginate(10);

		return view('localidads.index', compact('localidads'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('localidads.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$localidad = new Localidad();



		$localidad->save();

		return redirect()->route('localidads.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$localidad = Localidad::findOrFail($id);

		return view('localidads.show', compact('localidad'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$localidad = Localidad::findOrFail($id);

		return view('localidads.edit', compact('localidad'));
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
		$localidad = Localidad::findOrFail($id);



		$localidad->save();

		return redirect()->route('localidads.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$localidad = Localidad::findOrFail($id);
		$localidad->delete();

		return redirect()->route('localidads.index')->with('message', 'Item deleted successfully.');
	}

}
