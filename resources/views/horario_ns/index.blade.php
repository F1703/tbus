@extends('horario_ns.layouts.main')

{{-- @section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Horario_ns
            <a class="btn btn-success pull-right" href="{{ route('horario_ns.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection --}}

@section('content')

  {{-- <div class="w3-row">
    <div class="col-md-12">
        <ul class="w3-ul w3-card-4">
            <li class="w3-padding-16">
              <span onclick="this.parentElement.style.display='none'"
              class="w3-button w3-white w3-xlarge w3-right">×</span>
              <span class="w3-large">Tesa</span><br>
              <span>Web Designer</span>
            </li>
            <li class="w3-padding-16">
              <span onclick="this.parentElement.style.display='none'"
              class="w3-button w3-white w3-xlarge w3-right">×</span>
              <span class="w3-large">Exprebus</span><br>
              <span>Support</span>
            </li>
        </ul>
    </div>
  </div> --}}

<div class="w3-row">
  <div class="w3-container">
  {{--  el if es para el render, tiene q estar el paginate para que funcione --}}
    {{-- @if ($localidades->count()) --}}
      <form class="w3-container w3-card-4 w3-light-grey">
      <p>
        <label class="w3-text-teal" for="desde"> <b>Desde</b></label>
        <select class="form-control w3-hoverable" id="desde" name="">
            {{-- <option value="0">Seleccione..</option> --}}
          @foreach ($localidades as $localidad)
            <option value="{{$localidad->idlocalidad}}">{{$localidad->localidad}}</option>
          @endforeach
        </select>
      </p>

      <p>
        <label class="w3-text-teal"> <b>Hasta</b></label>
        <select class="form-control" id="hasta" name="">
          {{-- <option value="0">Seleccione..</option> --}}
          @foreach ($localidades as $localidad)
            <option value="{{$localidad->idlocalidad}}"> {{$localidad->localidad}}</option>
          @endforeach
        </select>
      </p>
    </form>
    {{-- @endif --}}
  </div>
</div>


<br>
  <div class="w3-row">
      <div class="col-md-12">
            @if($horario_ns->count())
                <table class="w3-table-all w3-hoverable  w3-card-4" >
                    <thead>
                        <tr class="w3-green">
                            <th>ID</th>
                            <th>Hora_ns</th>
                            <th>Parada</th>
                            <th>Servicio</th>
                            <th>Tipo</th>
                            <th>Localidad</th>
                            <th>Linea</th>
                        </tr>
                    </thead>

                    <tbody id="res">
                        @foreach($horario_ns as $horario_n)
                            <tr >
                                <td >{{$horario_n->id}}</td>
                                <td>{{$horario_n->hora_ns}}</td>
                                <td>{{$horario_n->parada}}</td>
                                <td>{{$horario_n->servicio}}</td>
                                <td>{{$horario_n->tipo}}</td>
                                <td>{{$horario_n->localidad}}</td>
                                <td>{{$horario_n->linea}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {!! $horario_ns->render() !!} --}}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif


      </div>
  </div>
  {!! Form::open(['route'=>['horario_ns.consulta',':USER_ID',':USER_ID_2'],'method'=>'GET', 'id'=>'form'])!!}
  {!! Form::close()!!}
@endsection

@section('script')
<script type="text/javascript">
  // var desde=0;
  // var hasta=0;
  $('#desde').click(function(){
    desde= $('#desde').val();
    hasta= $('#hasta').val();
    console.log(desde+ " y "+hasta);
    var form = $('#form');
    var url =form.attr('action').replace(':USER_ID',desde).replace(':USER_ID_2',hasta);
    var fecha =new Date();
    var hora = fecha.getHours()+":"+fecha.getMinutes();
    // alert(hora);
    console.log(url+", hora= "+hora);
    // $.ajax(
    //   url: "google.com",
    //   data: {"d": desde, "h": hasta},
    //   type: "GET",
    //   datatype: "json",
    // ).done(function(dat){
    //   console.log(dat);
    // });
  });

  $('#hasta').click(function(){
    hasta = $('#hasta').val();
    desde= $('#desde').val();
    console.log(desde+ " y "+hasta);
    var form = $('#form');
    var url =form.attr('action').replace(':USER_ID',desde).replace(':USER_ID_2',hasta);
    // alert(url);
    $.ajax({
      url: url,
      method: 'GET',
      datatype: "json"
    }).done(function(dato){
      // console.log(dato);
      $('#res').text('');
      $.each(dato,function(index, el) {
        $('#res').append(
            '<tr>'+
            ' <td>'+el.id+'</td>'+
            ' <td>'+el.hora_ns+'</td>'+
            ' <td>'+el.parada+'</td>'+
            ' <td>'+el.servicio+'</td>'+
            ' <td>'+el.tipo+'</td>'+
            ' <td>'+el.localidad+'</td>'+
            ' <td>'+el.linea+'</td>'+
            '</tr>'
        );
        console.log(el);
      });
    }); //done()
    // console.log(url);
  });

</script>
@endsection
