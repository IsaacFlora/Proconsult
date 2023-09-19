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
                            <li class="breadcrumb-item"><a href="{{route('chamados.index')}}">Chamados</a></li>
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

                            @if( $chamado->mensagens->count() )


                                @foreach( $chamado->mensagens as $mensagem )

                                <div>
                                    
                                    <p><strong>{{( $mensagem->remetente->id==$auth->id )? 'Você' : $mensagem->remetente->name }}</strong> ( {{dataBr( Carbon\Carbon::parse( $mensagem->created_at ), true )}} )</p>
                                    <p>{{$mensagem->texto}}</p>

                                </div>

                                @endforeach

                            @endif

                            @if( $chamado->status!=2 )
                            <form action="{{route('meuschamados.responder', $chamado->id)}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT" />


                                <hr>

                                <div class="form-group row">
                                    <div class="col-md-12"> <!-- <resposta> do slide -->
                                        <label for="resposta">Resposta</label>
                                        <textarea class="form-control" rows="5" name="resposta"></textarea>
                                    </div>
                                </div>

                                <hr>

                                <div class="form-group row">
                                    <div class="col-md-12 text-right">
                                        <button class="btn btn-primary btn-lg"><i class="fas fa-save"></i> Responder</button>
                                        <a href="{{route('meuschamados.index')}}" class="btn btn-danger btn-lg"><i class="fas fa-window-close"></i> Cancelar</a>
                                    </div>
                                </div>
                            </form>
                            @else
                            <h5>Chamado Finalizado!</h5>
                            @endif
	                    	
	                    </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->        
        </div> <!-- container-fluid -->
    </div> <!-- content -->
</div>
@endsection