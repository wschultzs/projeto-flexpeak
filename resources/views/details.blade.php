@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="background-color: #ecf0f1; padding: 70px; margin-top: -23px;">
        <div class="row">
            <img class="rounded-circle" style="display: block; margin: 0 auto;" src="{{url('uploads/'.$contact->foto)}}" alt="{{$contact->filename}}">
        </div>
        <div class="row">
            <div class="col-md-12" >
                <h1 class="text-center">Esse é {{$contact->primeiro_nome}}</h1>
                <div class="borda mb-3"></div>
                <p class="text-center">{{$contact->descricao}}</p>
            </div>
        </div>
        <div class="row" id="row-info">
            <div class="col-md-6 text-sm-right text-center">
                <i class="fas fa-phone fa-lg mr-3"></i>{{$contact->telefone}}
            </div>
            <div class="col-md-6 text-sm-left text-center">
                <i class="fas fa-envelope fa-lg mr-3"></i>{{$contact->email}}
            </div>
        </div>
    </div>
@endsection