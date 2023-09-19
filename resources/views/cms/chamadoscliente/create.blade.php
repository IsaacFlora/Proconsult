@extends('layouts.cms_app')

@section('content')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">{{$title}}</h4>
                        <!-- breadcrumb -->
		                <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Painel</a></li>
                            <li class="breadcrumb-item"><a href="{{route('meuschamados.index')}}">Chamados</a></li>
                            <li class="breadcrumb-item active">{{$title}}</li>
		                </ol>
		                <!-- breadcrumb -->
                    </div>
                </div>
            </div> <!-- end row -->
            
            <!-- Verifica e mostra erros dos campos obrigatórios -->
            @include('cms.includes.error_messages')

            <div class="row">
                <!-- Verifica e mostra mensagem de sucesso -->
                @include('cms.includes.alert_messages')

                <div class="col-12">
                    <div class="card m-b-20">

	                    <div class="card-body">

	                    	<form action="{{route('meuschamados.store')}}" method="POST" enctype="multipart/form-data">
	                    		{{ csrf_field() }}


                                <div class="form-group row">
                                    <div class="col-md-12"> <!-- <raio_atendimento> -->
                                        <label for="titulo">Título</label>
                                        <input class="form-control" type="text" name="titulo" value="{{old('titulo')}}" />
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-12 col-md-12"> <!-- <descricao> do conteúdo -->
                                        <label for="texto">Descrição</label>
                                        <textarea class="form-control" rows="5" name="texto">{{old('texto')}}</textarea>
                                    </div>
                                   
                                </div>

                                
                                <hr>

		                        <div class="form-group row">
                                    <div class="col-md-12 text-right">
                                        <button class="btn btn-primary btn-lg"><i class="fas fa-save"></i> Salvar alterações</button>
                                        <a href="{{route('meuschamados.index')}}" class="btn btn-danger btn-lg"><i class="fas fa-window-close"></i> Cancelar</a>
                                    </div>
		                        </div>
	                        </form>
	                    </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->        
        </div> <!-- container-fluid -->
    </div> <!-- content -->
</div>
@endsection
