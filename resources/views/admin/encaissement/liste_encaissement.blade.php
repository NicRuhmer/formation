@extends('./layouts/admin')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('img/logo_numerika/logonmrk.png')}}" sizes="90x60" type="image/png">
    <link href="{{asset('bootstrapCss/css/bootstrap.min.css')}} " rel="stylesheet">
    <link rel="stylesheet" href="{{asset('login_css/css/style.css')}}">
</head>
<body>

<div id="page-wrapper">
    <div class="container-fluid">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                        <a class="nav-link  {{ Route::currentRouteNamed('liste_facture',2) || Route::currentRouteNamed('liste_facture',2) ? 'active' : '' }}" href="{{route('liste_facture',2)}}">
                            <i class="fa fa-list">Liste des Factures</i></a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <div class="row">
            <div class="col-lg-12">
            	<br>
                <h3>EXTRAIT DE COMPTE CLIENT</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th scope="col">Date payement</th>
                                        <th scope="col">Libellé</th>
                                        <th scope="col">Facture</th>
                                        <th scope="col">Montant facture(Ariary)</th>
                                        <th scope="col">Paiement(Ariary)</th>
                                        <th scope="col">Montant ouvert(Ariary)</th>
                                        <th scope="col">Mode de payement</th>
                                        <th colspan="2">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($encaissement as $info)
                                            <tr>
                                                <td>{{ $info->date_encaissement }}</td>
                                                <td>{{ $info->libelle }}</td>
                                                <td>{{ $info->num_facture }}</td>
                                                <td class="text-end">{{ number_format($info->montant_facture, 2, ',', ' ') }}</td>
                                                <td class="text-end">{{ number_format($info->payement, 2, ',', ' ') }}</td>
                                                <td class="text-end">{{ number_format($info->montant_ouvert, 2, ',', ' ') }}</td>
                                                <td>{{ $info->description }}</td>
                                                <td><button class="btn btn-success btn-block mb-2 payement" data-id="{{ $info->id }}" id="{{ $info->id }}" data-toggle="modal" data-target="#modal"><i class="fa fa-edit"></i></button></td>
                                    			<td><a href="{{ route('supprimer',[$info->id]) }}" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet encaissement ?');"><button class="btn btn-danger supprimer" ><span class = "fa fa-trash"></span></button></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                  </table>
                            </div>
                        </div>

                    </div>
                    @error('montant')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                    @error('libelle')
                        <span style="color: red">{{ $message }}</span>
                    @enderror

                </div>
            </div>

            {{-- debut modal encaissement --}}
            <div id="modal"  class="modal fade" data-backdrop="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        </div>
                        <div class="modal-body">
                            <div class="card p-3">
                                <form action="{{ route('modifier_encaissement') }}" method="POST">
                                    @csrf
                                    <div id="modification"></div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            {{-- fin --}}

        </div>

    </div>
</div>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />

<script type="text/javascript">

    $(".payement").on('click',function(e){
        $('#modification').html('');
        var id = $(this).data("id");
        $.ajax({
            method: "GET",
            url:  "{{route('page_modification')}}",
            data:{encaissement_id:id},
            dataType: "html",
            success:function(response){
                var userData=JSON.parse(response);

                var html = '';
                html += '<h6 class="text-uppercase">Modification</h6><br>';
                html += '<input autocomplete="off" type="text" name="libelle" class="form-control" value="'+userData[1]+'" required="required"><br>';
                html += '<input autocomplete="off" type="number" min="1" pattern="[0-9]" name="montant" class="form-control formPayement" value="'+userData[0]+'" required="required"><br>';
                html += '<input type="hidden" name="encaissement_id" value="'+id+'">';
                html += '<input type="hidden" name="num_facture" value="'+userData[2]+'">';
                html += '<div class="mt-4 mb-4 d-flex justify-content-between"> <span><button type="button" class="btn btn-danger annuler" data-dismiss="modal">Annuler</button></span>';
                html += '<button type="submit" class="btn btn-success px-3">Modifier</button>';
                $("#modification").append(html);
            },
            error:function(error){
                console.log(error)
            }
        });
    });
</script>
@endsection
