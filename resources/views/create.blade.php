@extends('layouts.app')
@section('content')
<div class="container">
  <br/>
<h2>Cadastro de Celebração </h2>
<hr/>
  <form name="frmreserva" id="frmreserva" action="{{  url('reserva') }}" method="POST">
    @csrf
    
  <div class="row">
    <div class="col-6">
        <label for="igreja">Data e Local Celebração</label>
        <input type="text" class="form-control" name="igreja" id="igreja">
    </div>
   
    <div class="col-6">
        <label for="horario">Horário</label>
        <input type="text" class="form-control" name="horario" id="horario">
    </div>
  </div>
  <div class="row">
    <div class="col-4">
      <label for="quantidade">Quantidade de Lugares</label>
      <input type="number" class="form-control" name="quantidade" id="quantidade">
    </div>    
  </div>
  <br/>
  <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  </div>