@extends('layout')
@section('header')
<div class="page-header">
        <h1>Servicios / Show #{{$servicio->idservicio}}</h1>
        <form action="{{ route('servicios.destroy', $servicio->idservicio) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('servicios.edit', $servicio->idservicio) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            {{-- <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <label for="nome">Servicio</label>
                    <p class="form-control-static"></p>
                </div>

            </form> --}}

              <table class="table table-responsive table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Servicio</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$servicio->idservicio}}</td>
                    <td>{{$servicio->servicio}}</td>
                  </tr>
                </tbody>

              </table>

            <a class="btn btn-link" href="{{ route('servicios.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection
