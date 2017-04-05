<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Parada;
use Illuminate\Http\Request;

class ParadaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$paradas = Parada::orderBy('idparada', 'desc')->paginate(10);

		return view('paradas.index', compact('paradas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('paradas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$parada = new Parada();



		$parada->save();

		return redirect()->route('paradas.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$parada = Parada::findOrFail($id);

		return view('paradas.show', compact('parada'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$parada = Parada::findOrFail($id);

		return view('paradas.edit', compact('parada'));
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
		$parada = Parada::findOrFail($id);



		$parada->save();

		return redirect()->route('paradas.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$parada = Parada::findOrFail($id);
		$parada->delete();

		return redirect()->route('paradas.index')->with('message', 'Item deleted successfully.');
	}

}
