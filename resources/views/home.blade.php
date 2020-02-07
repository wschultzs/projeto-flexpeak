@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            @if ($message = Session::get('contact-added'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('contact-edited'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('deleted-contact'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ $message }}</strong>
                </div>
            @endif
                <div class="card-header text-center">
                    <h1><i class="far fa-address-book"></i> Meus Contatos</h1>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-4 ml-4">
                        <!-- Adicionar Contato -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-contact">
                            <i class="fas fa-user-plus"></i> Adicionar Contato
                        </button>
                    </div>
                </div>
                <div class="card-body">
                <table id="tabela-contatos" class="table data-table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>E-mail</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        </tbody>
                        
                    </table>
                </div>

                <!-- Modal para add contato -->
                <div class="modal fade" id="add-contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Preencha o formulário para adicionar um novo contato</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('armazenar.contato')}}" method="post" enctype="multipart/form-data">
                            @csrf 
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="primeiro_nome">Primeiro Nome</label>
                                    <input type="text" id="primeiro_nome" name="primeiro_nome" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sobrenome">Sobrenome</label>
                                    <input type="text" id="sobrenome" name="sobrenome" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" id="telefone" name="telefone" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">E-mail</label>
                                    <input type="text" id="email" name="email" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="foto">Foto</label>
                                    <input type="file" id="foto" class="form-control" name="foto"/>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="descricao">Descrição</label>
                                    <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                    
                    </div>
                </div>
                </div>

                <!-- Modal para editar contato -->
                <div class="modal fade" id="edit-contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Preencha os campos que deseja atualizar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{route('editar.contato')}}" method="post" enctype="multipart/form-data">
                            @csrf 
                            <input type="hidden" id="contato" name="contato">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="primeiro_nome">Primeiro Nome</label>
                                    <input type="text" id="primeiro_nome" name="primeiro_nome" class="form-control" > 
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sobrenome">Sobrenome</label>
                                    <input type="text" id="sobrenome" name="sobrenome" class="form-control" >
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" id="telefone" name="telefone" class="form-control" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">E-mail</label>
                                    <input type="text" id="email" name="email" class="form-control" >
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="foto">Foto</label>
                                    <input type="file" id="foto" class="form-control" name="foto" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="descricao">Descrição</label>
                                    <textarea class="form-control" id="descricao" name="descricao" rows="3" ></textarea>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                            </div>
                        </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
