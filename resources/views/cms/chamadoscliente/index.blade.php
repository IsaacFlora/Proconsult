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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Chamados</a></li>
                            <li class="breadcrumb-item active">{{$title}}</li>
		                </ol>
		                <!-- breadcrumb -->
                    </div>
                </div>
            </div> <!-- end row -->

            <!-- Filtrar Registro -->
            <div class="row">
                <div class="col-6">
                    <form action="{{route('meuschamados.busca')}}" method="GET" class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <input type="text" name="busca" placeholder="Buscar por: (nome, e-mail)" class="form-control">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Buscar" />
                            </div>
                        </div>
                    </form>
                </div>

                
            </div>

            <div class="row">
                <!-- Verifica e mostra mensagem de sucesso -->
                @include('cms.includes.alert_messages')
                <div class="col-12">
                    <div class="card m-b-20">
                        <div class="card-body">
                        	<table class="table table-striped mb-0">
	                        	<thead>
									<tr>
			                            <th>ID</th>
                                        <th>COLABORADOR</th>
                                        <th>TÍTULO</th>
                                        <th>STATUS</th>
                                        <th>DATA</th>
			                            <th></th>
		                            </tr>
	                        	</thead>
							
								<tbody>
                                @if(count($chamados)>0)
    								@foreach($chamados as $chamado)

                            
    	                        	<tr>
    		                            <th scope="row">{{$chamado->id}}</th>
                                        <th>{{( isset($chamado->colaborador->name) )? $chamado->colaborador->name : 'Aguardando resposta' }}</th>
                                        <th>{{$chamado->titulo}}</th>
                                        <th scope="row">
                                            @php
                                            switch($chamado->status){
                                                case 1:
                                                echo 'Em Atendimento';
                                                break;
                                                case 2:
                                                echo 'Finalizado';
                                                break;
                                                default:
                                                echo 'Aberto';

                                            }

                                            @endphp
                                        </th>
                                        
                                        <th scope="row">{{dataBr( Carbon\Carbon::parse( $chamado->created_at ) )}}</th>
                                        
                                        
                                        <td>
                                            
                                          

                                            <div class="btn-group" role="group" aria-label="Basic example"
                                            >
                                                <a href="{{route('meuschamados.listarchamados', $chamado->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i> Visualizar</a>
                                                
                                            </div>
                                        </td>

    		                        </tr>
    		                        @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">
                                           Não há chamados cadastrados! 
                                        </td>
                                    </tr>
                                @endif
		                        </tbody>
	                        </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

            <div class="row">
                <div class="col-md-12">
                    {{$chamados->appends(Request::except('page'))->links()}}
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div> <!-- content -->
</div>
@endsection