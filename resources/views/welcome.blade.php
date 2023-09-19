<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->

    <title>Proconsult</title>

    <!-- Icons font CSS-->
    <link href="{{ URL::asset('assets/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ URL::asset('assets/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Vendor CSS-->
    <link href="{{ URL::asset('assets/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ URL::asset('assets/vendor/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ URL::asset('assets/css/main.css')}}" rel="stylesheet" media="all">
</head>

<body>

    <div class="page-wrapper bg-blue p-t-60 p-b-100 font-robo">

        <div class="wrapper wrapper--w960">
            <div style="padding: 10px;" class="card card-2">
                <h3 class="text-center m-0">
                    <a href="{{route('login')}}" class="logo logo-admin"><img class="logo_medio" src="{{asset('assets/cms/images/logo.png')}}" alt="logo"></a>
                </h3>

                @include('cms.includes.error_messages')
                
                <form method="POST" action="{{ route('users.cadastrar') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cpf" class="col-md-4 col-form-label text-md-right">CPF</label>

                            <div class="col-md-6">
                               
                                <input type="text" class="form-control cpf" placeholder="Digite seu cpf" id="cpf" value="{{ old('cpf') }}" name="cpf" required >

                                
                            </div>
                        </div>


                        

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar senha</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Cadastrar
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{ URL::asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <!-- Vendor JS-->
    <script src="{{ URL::asset('assets/vendor/select2/select2.min.js')}}"></script>
    <script src="{{ URL::asset('assets/vendor/datepicker/moment.min.js')}}"></script>
    <script src="{{ URL::asset('assets/vendor/datepicker/daterangepicker.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <!-- Inclusão do Plugin jQuery Validation-->
    <script src="https://jqueryvalidation.org/files/dist/jquery.validate.js"></script>


    <!-- Main JS-->
    <script src="{{ URL::asset('assets/js/global.js')}}"></script>

    <script type="text/javascript">
        var url= "{{env('APP_URL')}}";
        
    </script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->