<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Parada;
use App\Linea;

use App\Horario_n;
use App\Localidad;
use Illuminate\Http\Request;

class Horario_nController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// $horario_ns = Horario_n::orderBy('id', 'desc')->get();
		$loaclidades = Localidad::orderBy('idlocalidad','asc')->get();
		// $lineas = Linea::get();
		// $paradas = Parada::get();

		$horario_ns = \DB::table('horario_ns')
			->join('parada','horario_ns.idparada','=','parada.idparada')
			->join('servicio','horario_ns.idservicio','=','servicio.idservicio')
			->join('tipo','horario_ns.idtipo','=','tipo.idtipo')
			->join('localidad','parada.idlocalidad','=','localidad.idlocalidad')
			->join('linea','servicio.idlinea','=','linea.idlinea')
			// ->get();
			->paginate(11140);
			// $hora = date("Y-m-d (H:i:s)", time());
			// $da= date('Y-m-d\TH:i:sO');
			// $d = date("M d Y H:i:s", mktime(0, 0, 0, 1, 1, 1998));
			// $dd = gmdate("M d Y H:i:s", mktime(0, 0, 0, 1, 1, 1998));
			$feha_hora = gmdate("Y/m/j H:i:s", time() + 3600*( -3 +date("I")));
			$fecha = gmdate("Y/m/j", time() + 3600*( -3 +date("I")));
			$hora_2 = gmdate("H:i:s", time()+3600*( -3 +date("I"))) +2 .":".+gmdate("i:s", time()+3600*( -3 +date("I")));
			// dd($hora_2);
		// dd($horario_ns);
		// dd($loaclidades);
		return view('horario_ns.index', compact('horario_ns'))
			->with('localidades', $loaclidades);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('horario_ns.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$horario_n = new Horario_n();



		$horario_n->save();

		return redirect()->route('horario_ns.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// $horario_n = Horario_n::findOrFail($id);
		$horario_ns = Horario_n::Busqueda($id)->get();
		// dd($horario_n);
		// return view('horario_ns.show', compact('horario_n'));
		$loaclidades = Localidad::orderBy('idlocalidad','asc')->get();
		return  view('horario_ns.index',compact('horario_ns'))
			->with('localidades', $loaclidades);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$horario_n = Horario_n::findOrFail($id);

		return view('horario_ns.edit', compact('horario_n'));
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
		$horario_n = Horario_n::findOrFail($id);



		$horario_n->save();

		return redirect()->route('horario_ns.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$horario_n = Horario_n::findOrFail($id);
		$horario_n->delete();

		return redirect()->route('horario_ns.index')->with('message', 'Item deleted successfully.');
	}

	public function consulta($o, $h){
		// $horario_ns = Horario_n::Busqueda($o,$h)->get();
		// $loaclidades = Localidad::orderBy('idlocalidad','asc')->get();
			$hora = gmdate("H:i:s", time()+3600*( -3 +date("I")));
			$hora_2 = gmdate("H:i:s", time()+3600*( -3 +date("I"))) +2 .":".+gmdate("i:s", time()+3600*( -3 +date("I")));
			$horario_ns = \DB::table('horario_ns')
			->join('parada','horario_ns.idparada','=','parada.idparada')
			->join('servicio','horario_ns.idservicio','=','servicio.idservicio')
			->join('tipo','horario_ns.idtipo','=','tipo.idtipo')
			->join('localidad','parada.idlocalidad','=','localidad.idlocalidad')
			->join('linea','servicio.idlinea','=','linea.idlinea')
			// ->where('hora_ns','>=',gmdate("H:i:s", time() + 3600*( -3 +date("I"))))
			// ->orWhere('hora_ns','<',$hora_2)
			->whereBetween('hora_ns',[$hora,$hora_2])
			->get();
			;

			// ->paginate(11140);
		// dd($horario);
		// dd($horario_ns);
		return $horario_ns;
		// return  view('horario_ns.index',compact('horario_ns'));
			// ->with('localidades', $loaclidades);
	}

}
