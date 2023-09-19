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
		                    <li class="breadcrumb-item active">
		                        Bem-vindo <strong>{{$auth->name}}</strong>!
		                    </li>
		                </ol>
		                <!-- breadcrumb -->
		            </div>
		        </div>
		    </div>
		    <!-- end row -->

		  
			
			<!-- end row -->
		</div> <!-- container-fluid -->
	</div>
</div>

@endsection