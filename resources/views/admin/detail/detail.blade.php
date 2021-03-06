<style>
    .icon_plus {
        border: 2px solid whitesmoke;
        font-size: 0.5rem;
    }

    .nouveau_detail {
        background-color: #822164;
        border-radius: 20px;
        color: #fff;
        padding: 0 8;
    }

    .nouveau_detail:hover {
        background-color: #b8368f;
        color: #fff;
    }

    .outline {
        outline: none;
        box-shadow: none;
    }

    .th_sans_donnee {
        font-weight: bold;
        text-align: center;
    }

    .form_control_time {
        height: .5rem;
    }

    input[type="text"],
    input[type="date"] {
        height: auto !important;
    }

    .intervention {
        background-color: rgb(241, 241, 242);
        padding: 2px 8px;
        border-radius: 1rem;
        text-align: center;
    }

    .icon_plus {
        color: #b8368f;
        margin-top: -1rem;
        font-size: 3rem;
        position: sticky;
        margin-left: 90%;
    }

    .icon_plus:hover {
        cursor: pointer;
    }

    p {
        text-align: center !important;
    }

</style>

@if (count($datas) === 0)
    <form onsubmit="change_active()" id="non_existante" action="{{ route('detail.store') }}" method="post">
        @csrf
        <input type="hidden" name="projet" value="{{ $projet[0]->projet_id }}">
        <input type="hidden" name="groupe" value="{{ $projet[0]->groupe_id }}">

        <div class="row">
            <div class="col-md-4 p-0">
                <div class="row">
                    <div class="col-md-5 ps-2">
                        <p><i class="fa fa-calendar-day entete"></i>&nbsp;Date </p>
                    </div>
                    <div class="col-md-7 p-0 d-flex justify-content-around entete">
                        <p><i class="fa fa-clock"></i>&nbsp;Heure début </p>
                        <p><i class="fa fa-clock"></i>&nbsp;Heure fin </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row entete">
                    <div class="col-md-4">
                        <p> <i class="fa fa-user"></i>&nbsp;Formateur </p>
                    </div>
                    <div class="col-md-8">
                        <p><i class="fa fa-map-marker-alt"></i>&nbsp;Lieu </p>
                    </div>
                </div>
            </div>
        </div>
        @canany(['isCFP'])
            <div id="conteneur">
                <div class="fils m-0">
                    @php
                        $i = 0;
                    @endphp
                    @while ($i < 3)
                        <div class="row" id="inputFormRow">
                            <div class="col-md-4 p-0">
                                <div class="row">
                                    <div class="col-md-5 p-0">
                                        <input type="date" name="date[]" placeholder="" class="form-control m-1" required>
                                    </div>
                                    <div class="col-md-7 ps-1 d-flex">
                                        <input type="time" name="debut[]" class="form-control my-1 ms-1" required>
                                        <input type="time" name="fin[]" class="form-control my-1 ms-1" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-5 px-2">
                                        <div class="input-group">
                                            {{-- <div class="input-group-prepend my-1">
                                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                                </div> --}}
                                            <select name="formateur[]" id="" class="form-control  my-1" required>
                                                <option value="" selected hidden> Choisir formateur </option>
                                                @foreach ($formateur as $format)
                                                    <option value="{{ $format->formateur_id }}">
                                                        {{ $format->prenom_formateur }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-7 px-0 pe-2">
                                        <div class="input-group">
                                            <input type="text" name="lieu[]" class="form-control my-1" required>
                                            <button id="removeRow" type="button"><i
                                                    class="far fa-minus-circle mx-1 my-3"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $i++;
                        @endphp
                    @endwhile
                </div>

                <div id="newRow"></div>
                <div class="text-end ms-4">
                    <button id="addRow" type="button"><i class="far fa-plus-circle"></i></button>
                </div>


            </div>
            <div class="enregistrer">
                <button type="submit" class="btn btn-success"><i class="far fa-save"></i>&nbsp;Enregistrer</button>
            </div>
        @endcanany
    </form>
@endif

{{-- donnee non exiatante --}}

@if (count($datas) != 0)
    <div id="existante">
        {{-- <div class="row">
            <div class="col-lg-12">
                <br>
                <h3>DETAILS DES PROJETS</h3>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteNamed('liste_detail') ? 'active' : '' }}" aria-current="page" href="{{route('liste_detail')}}">
                                    <i class="fa fa-list"> Listes des Détails</i></a>
                            </li>
                            @canany(['isCFP'])
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteNamed('nouveau_detail') ? 'active' : '' }}" aria-current="page" href="{{route('nouveau_detail')}}">
                                    <i class="fa fa-list"> Nouveau détail</i></a>
                            </li>
                            @endcanany


                            <li class="nav-item ">
                                <form class="navbar-form navbar-left" role="search">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                            Tout <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{route('liste_detail',5)}}">5</a></li>
                                            <li><a href="{{route('liste_detail',10)}}">10</a></li>
                                            <li><a href="{{route('liste_detail',25)}}">25</a></li>
                                            <li><a href="{{route('liste_detail',25)}}">50</a></li>
                                            <li><a href="{{route('liste_detail',25)}}">100</a></li>
                                            <li class="divider"></li>
                                            <li><a href="{{route('liste_detail')}}">Tout</a></li>
                                        </ul>
                                    </div>

                                </form>
                            </li>

                            {{-- @canany(['isCFP'])
                            <li class="nav-item">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    Rechercher par entreprise <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach ($liste as $etp)
                                    <li><a href="{{route('show_detail_entreprise',$etp->entreprise_id)}}">{{$etp->nom_etp}}</a></li>
                                    @endforeach
                                    <li class="divider"></li>
                                    <li><a href="{{route('liste_detail')}}">Tout</a></li>
                                </ul>
                            </li>
                            @endcanany --}}

        {{-- </ul>

                    </div>
                </div>
            </nav> --}}


        {{-- </div> --}}
        <!-- /.row -->


        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">

                    <div class="panel-body">
                        @canany(['isCFP'])
                            <nav class="d-flex justify-content-end mb-1">
                                <a class="nouveau_detail btn" aria-current="page" data-toggle="modal"
                                    data-target="#modal_nouveau_detail">
                                    <i class="far fa-plus-circle p-1"
                                        style="background-color: white; border-radius: 50%; font-weight: bold;"></i>
                                    <small class="text-white">Nouveau détail</small class="text-white"></a>
                            </nav>
                        @endcanany
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    @canany(['isReferent', 'isManager'])
                                        <th>CFP</th>
                                    @endcanany
                                    <th>Module</th>
                                    <th width="30%">Lieu</th>
                                    <th>Date</th>
                                    <th>Début</th>
                                    <th>Fin</th>
                                    <th>Formateur</th>
                                    @canany(['isCFP'])
                                        <th>Action</th>
                                    @endcanany
                                </thead>
                                <tbody>
                                    @foreach ($datas as $d)
                                        <tr>
                                            @canany(['isReferent', 'isManager'])
                                                <td>{{ $d->nom_cfp }}</td>
                                            @endcanany
                                            <td>{{ $d->nom_module }}</td>
                                            <td>{{ $d->lieu }}</td>
                                            <td>{{ $d->date_detail }}</td>
                                            <td>{{ $d->h_debut }} h</td>
                                            <td>{{ $d->h_fin }} h</td>
                                            {{-- test commit --}}
                                            <td>{{ $d->nom_formateur . ' ' . $d->prenom_formateur }}</td>
                                            @canany(['isCFP'])
                                                <td><i class="fa fa-trash-alt" style="color:rgb(130,33,100);"></i></td>
                                            @endcanany
                                            {{-- @canany(['isFormateur'])
                                                <td><i data-toggle="collapse" href="#stagiaire_presence" class="fa fa-edit"
                                                        style="color:rgb(130,33,100);">Emargement</i></td>
                                            @endcanany --}}
                                            {{-- <td >
                                                <a href="{{route('execution',[$d->detail_id])}}" class ="btn btn-info" id="{{$d->detail_id}}"><span class="glyphicon glyphicon-eye-open"></span></a>
                                        </td>
                                        <td><button class="btn btn-success modifier" id="{{$d->detail_id}}" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil"></span> Modifier</button></td>
                                        <td><button class="btn btn-danger supprimer" id="{{$d->detail_id}}"><span class="glyphicon glyphicon-remove"></span> Supprimer</button></td> --}}
                                        
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                        </tbody>
                        </table>
                        @canany('isCFP')
                            <div class="modal fade" id="modal_nouveau_detail">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-title pt-3" style="height: 50px; align-items: center;">
                                            <h5 class="text-center my-auto">Nouveau detail</h5>
                                        </div>
                                        <form class="btn-submit" action="{{ route('detail.store') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="projet" value="{{ $projet[0]->projet_id }}">
                                            <input type="hidden" name="groupe" value="{{ $projet[0]->groupe_id }}">
                                            <div class="form-group mx-auto">
                                                <label for="formateur">Formateur</label><br>
                                                <select class="form-control" id="formateur" name="formateur">
                                                    @foreach ($formateur as $format)
                                                        <option value="{{ $format->formateur_id }}">
                                                            {{ $format->nom_formateur }}
                                                            {{ $format->prenom_formateur }}</option>
                                                    @endforeach
                                                </select>
                                                <p><strong style="color: red" id="err_formateur"></strong></p>
                                            </div>
                                            <div class="form-group mx-auto">
                                                <label for="lieu">Lieu</label>
                                                <input type="text" class="form-control" id="lieu" name="lieu"
                                                    placeholder="Lieu">

                                            </div>
                                            <div class="form-group mx-auto">
                                                <label for="date">Date</label>
                                                <input type="date" class="form-control" id="date_detail" name="date"
                                                    min="" max="">
                                            </div>
                                            <div class="form-group mx-auto">
                                                <label for="debut">Heure début</label>
                                                <input type="time" class="form-control" id="debut" name="debut"
                                                    min="07:00" max="17:00">
                                            </div>
                                            <div class="form-group mx-auto">
                                                <label for="fin">Heure fin</label>
                                                <input type="time" class="form-control" id="fin" name="fin" min="08:00"
                                                    max="18:08">
                                            </div>
                                            <div class="d-flex justify-content-center mb-3">
                                                <input type="submit" id="ajouter" class="btn btn-primary" value="Ajouter">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endcanany

                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Modification</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="btn-submit">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nom">Projet</label>
                                                <input type="text" class="form-control" id="projetModif"
                                                    placeholder="Projet">
                                            </div>
                                            <div class="form-group">
                                                <label for="groupe">Groupe</label>
                                                <input type="text" class="form-control" id="groupeModif"
                                                    placeholder="Groupe">
                                            </div>
                                            <div class="form-group">
                                                <label for="lieu">Lieu</label>
                                                <input type="text" class="form-control" id="lieuModif"
                                                    placeholder="Lieu">
                                            </div>
                                            <div class="form-group">
                                                <label for="debut">Date début</label>
                                                <input type="date" class="form-control" id="debutModif" name="debut">
                                            </div>
                                            <div class="form-group">
                                                <label for="fin">Date fin</label>
                                                <input type="date" class="form-control" id="finModif" name="fin">
                                            </div>
                                            <button class="btn btn-success modification " id="action1"><span
                                                    class="glyphicon glyphicon-pencil"></span> Modifier</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script></script>
<script>
    $("#non_existante").on('submit', function() {
        document.getElementById('#non_existante').onsubmit = function() {
            document.querySelector('#non_existante').style.display = "none";
            document.querySelector('#existante').style.display = "block";
        }
    });

    function change_active() {
        document.querySelector('#non_existante').style.display = "none";
        document.querySelector('#existante').style.display = "block";
    };
    // document.getElementById('#non_existante').onsubmit = function (){
    //      document.querySelector('#non_existante').style.display = "none";
    //     document.querySelector('#existante').style.display = "block";
    // }
    // function change_active(){
    //     document.querySelector('#non_existante').style.display = "none";
    //     document.querySelector('#existante').style.display = "block";
    // }


    var id_detail;
    $(".modifier").on('click', function(e) {
        var id = e.target.id;

        $.ajax({
            type: "GET",
            url: "{{ route('edit_detail') }}",
            data: {
                Id: id
            },
            dataType: "html",
            success: function(response) {
                var userData = JSON.parse(response);
                for (var $i = 0; $i < userData.length; $i++) {
                    $("#projetModif").val(userData[$i].projet.nom_projet);
                    $("#groupeModif").val(userData[$i].projet.groupe_projet);
                    $("#lieuModif").val(userData[$i].lieu);
                    $("#debutModif").val(userData[$i].date_debut);
                    $("#finModif").val(userData[$i].date_fin);
                    id_detail = userData[$i].id;
                }
                $('#action1').val('Modifier');
            },
            error: function(error) {
                console.log(error)
            }
        });
    });
    $(".supprimer").on('click', function(e) {
        var id = e.target.id;
        $.ajax({
            type: "GET",
            url: "{{ route('destroy_detail') }}",
            data: {
                Id: id
            },
            success: function(response) {
                if (response.success) {
                    window.location.reload();
                } else {
                    alert("Error")
                }
            },
            error: function(error) {
                console.log(error)
            }
        });
    });
    $("#action1").click(function(e) {
        var lieu = $("#lieu").val();
        var date_debut = $('#debut').val();
        var date_fin = $('#fin').val();
        var url = 'update_detail/' + id_detail;
        $.ajax({
            url: url,
            method: 'get',
            data: {

                Lieu: lieu,
                Debut: date_debut,
                Fin: date_fin,

            },
            success: function(response) {
                if (response.success) {
                    window.location.reload();
                } else {
                    alert("Error")
                }
            },
            error: function(error) {
                console.log(error)
            }
        });
    });

    $(document).on('click', '#removeRow', function() {
        $(this).closest('#inputFormRow').remove();
    });

    $(document).on('click', '#addRow', function() {
        $('#frais').empty();
        $.ajax({
            url: "{{ route('all_formateurs') }}",
            type: 'get',
            success: function(response) {
                var userData = response;
                var html = '';
                html += '<div class="row" id ="inputFormRow">';

                html += '<div class="col-md-4 p-0">';
                html += '<div class="row">';
                html += '<div class="col-md-5 p-0">';
                html +=
                    '<input type="date" name="date[]" placeholder="" class="form-control m-1" required>';
                html += '</div>';
                html += ' <div class="col-md-7 ps-1 d-flex">';
                html +=
                    '<input type="time" name="debut[]" class="form-control my-1 mx-1" required>';
                html += '<input type="time" name="fin[]" class="form-control my-1" required>';
                html += '</div>';
                html += '</div>';
                html += '</div>';

                html += '<div class="col-md-8">';
                html += '<div class="row">';
                html += '<div class="col-md-5 px-2">';
                html += '<div class="input-group">';
                html += '<select name="formateur[]" id="" class="form-control  my-1" required>';
                html += '<option value="" selected hidden> Choisir formateur </option>';
                for (var $i = 0; $i < userData.length; $i++) {
                    html += '<option value="' + userData[$i].formateur_id + '">' + userData[$i]
                        .prenom_formateur + '</option>';
                }
                html += '</select>';
                html += '</div>';
                html += '</div>';
                html += '<div class="col-md-7 px-0 pe-2">';
                html += '<div class="input-group">';
                html += '<input type="text" name="lieu[]" class="form-control my-1" required>';
                html +=
                    '<button id="removeRow" type="button"><i class="far fa-minus-circle mx-1 my-3"></i></button> ';
                html += '</div>';
                html += '</div>';


                html += '</div>';
                html += '</div>';
                html += '</div>';

                $('#newRow').append(html);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
</script>
