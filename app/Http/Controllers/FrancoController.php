<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Franco;
use Illuminate\Http\Request;
 
class FrancoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$francos = Franco::orderBy('id', 'desc')->paginate(10);

		return view('francos.index', compact('francos'));
		// return view('francos.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('francos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$franco = new Franco();



		$franco->save();

		return redirect()->route('francos.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$franco = Franco::findOrFail($id);

		return view('francos.show', compact('franco'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$franco = Franco::findOrFail($id);

		return view('francos.edit', compact('franco'));
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
		$franco = Franco::findOrFail($id);



		$franco->save();

		return redirect()->route('francos.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$franco = Franco::findOrFail($id);
		$franco->delete();

		return redirect()->route('francos.index')->with('message', 'Item deleted successfully.');
	}

}
