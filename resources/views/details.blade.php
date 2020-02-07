@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="wrapper" style="background-color: #ecf0f1; padding: 70px; margin-top: -23px;">
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
        @if ($message = Session::get('task-added'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
            </div>
        @endif
        @if ($message = Session::get('deleted-task'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
            </div>
        @endif
       
        <div class="row">
            <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <div class="form-wrapper mb-2" style="margin-left: 70px;">
                            <form action="{{route('criar.tarefa')}}" class="form-inline mt-4">
                                <input type="hidden" value="{{$contact->id}}" name="contato_id">
                                <input type="text" name="task" class="form-control mb-2 mr-sm-2" id="task" placeholder="Adicionar Tarefa">  

                               <button type="submit" class="btn btn-primary mb-2">Adicionar</button>
                            </form>
                        </div>
                    <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th class="text-center">Tarefas</th>
                            <th class="text-center">Concluir/Remover</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($todo as $task)
                        <tr>
                            <th class="text-center">
                                {{$task->descricao}}
                            </th>
                            <th class="text-center"><a href="{{route('remover.tarefa', $task->id)}}"><i style="color: red;" class="far fa-window-close fa-lg text-center"></i></a></th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
@endsection