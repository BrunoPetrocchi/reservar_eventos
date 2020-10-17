@extends('layouts.app')
@section('content')
<div class="container">

  <br/>
  @foreach ($celebracao as $celebracaos)
<h3> {{ $celebracaos->igreja  }} |  Horas: {{ $celebracaos->horario  }} </h3>
<h3> {{ $pessoa->nome  }} {{ $pessoa->sobrenome  }} </h3>
@endforeach
  </div>