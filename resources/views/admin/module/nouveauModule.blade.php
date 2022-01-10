@extends('./layouts/admin')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <br>
                <h3>Modules</h3>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">

                                        <a class="nav-link {{ Route::currentRouteNamed('liste_formation') || Route::currentRouteNamed('liste_projet') ? 'active' : '' }}" aria-current="page" href="{{route('liste_formation')}}">
                                            <i class="bx bx-list-ul" style="font-size: 20px;"></i><span>&nbsp;Liste des formations</span></a>


                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  {{ Route::currentRouteNamed('liste_module') || Route::currentRouteNamed('liste_module') ? 'active' : '' }}" href="{{route('liste_module')}}">
                                            <i class="bx bx-list-minus" style="font-size: 20px;"></i><span>&nbsp;Liste des modules</span></a>

                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link  {{ Route::currentRouteNamed('nouveau_module') || Route::currentRouteNamed('nouveau_module') ? 'active' : '' }}" href="{{route('nouveau_module')}}"><i class="bx bxs-plus-circle"></i><span>&nbsp;Nouvelle Module</span></a>
                                    </li>


                                    <li class="nav-item">

                                        <a class="nav-link  {{ Route::currentRouteNamed('liste_programme') || Route::currentRouteNamed('liste_programme') ? 'active' : '' }}" aria-current="page" href="{{route('liste_programme')}}">
                                            <i class="bx bx-list-minus" style="font-size: 20px;"></i><span>&nbsp;Liste des programmes</span></a>


                                    </li>

                                </ul>
                            </div>
                        </div>
                    </nav>


                    <div class="panel-body">
                        <div class="row">
                            <div class="container">
                                <div class="col-lg-12">
                                    <form action="{{route('module.store')}}" method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col me-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="reference" name="reference" placeholder="Référence" required>
                                                    @error('reference')
                                                    <div class="col-sm-6">
                                                        <span style="color:#ff0000;"> {{$message}} </span>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="nom_module" name="nom_module" placeholder="Nom du module" required>
                                                    @error('nom_module')
                                                    <div class="col-sm-6">
                                                        <span style="color:#ff0000;"> {{$message}} </span>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="duree" name="duree" min="1" max="8760" placeholder="Durée en Heure (H)" onfocus="(this.type='number')" title="entrer une durée en heure" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" d="jour" name="jour" min="1" max="365" placeholder="Durée en Jours (J)" onfocus="(this.type='number')" title="entrer une durée en jours" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="tel" class="form-control" id="prix" name="prix" placeholder="Prix en AR" minlength="1" maxlength="7" pattern="[0-9]{1,7}" title="entrer une montant raisonnable en chiffre" required>
                                                    @error('prix')
                                                    <div class="col-sm-6">
                                                        <span style="color:#ff0000;"> {{$message}} </span>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" id="objectifs" name="objectifs" placeholder="Objectifs" rows=3 required></textarea>
                                                    @error('objectifs')
                                                    <div class="col-sm-6">
                                                        <span style="color:#ff0000;"> {{$message}} </span>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <Span> Ajouter un nouveau Niveau de formation : &nbsp;</Span><i class="bx bxs-edit close" onclick="myFunction()"></i>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <select name="categorie" class="form-control select_formulaire" id="categorie" name="categorie" style="height: 50px;">
                                                        <option value="null" disable selected hidden>Choisissez la catégorie de formation ...</option>
                                                        @foreach($liste as $li)
                                                        <option value="{{$li->id}}">{{$li->nom_formation}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <select name="modalite" class="form-control" id="modalite" name="modalite" style="height: 50px;">
                                                        <option value="null" selected hidden>Choisissez une modalité de formation ...</option>
                                                        <option value="En ligne">En ligne</option>
                                                        <option value="Présentiel">Présentiel</option>
                                                        <option value="En ligne/Présentiel">En ligne/Présentiel</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <select name="niveau" class="form-control" id="niveau" style="height: 50px;">
                                                        <option value="null" selected hidden>Veuillez saisir un niveau adapté...</option>
                                                        @foreach($niveau as $nv)
                                                        <option value="{{$nv->id}}">{{$nv->niveau}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" id="prerequis" name="prerequis" placeholder="Prérequis" required></textarea>
                                                    @error('prerequis')
                                                    <div class="col-sm-6">
                                                        <span style="color:#ff0000;"> {{$message}} </span>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" id="description" name="description" placeholder="Déscription" required></textarea>
                                                    @error('description')
                                                    <div class="col-sm-6">
                                                        <span style="color:#ff0000;"> {{$message}} </span>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Matériel nécessaire" name="materiel" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="A qui s'adresse cette formation ?" name="cible" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row mb-5">
                                            <div class="col" align="center">
                                                <button type="submit" class="btn btn-secondary w-50"><i class="bx bxs-plus-circle"></i> Ajouter</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                                <div class="modal" tabindex="-1" role="dialog" id="ouvrir_flottant">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Changer le niveau</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-lg-12">
                                                    <div id="myDIV" class="card" style="display: none;">
                                                        <table class="table">
                                                            <thead align="center">
                                                                <th >Niveau</th>
                                                                <th >Supprimer</th>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($niveau as $nv)
                                                                <tr>
                                                                    <td>{{$nv->niveau}}</td>
                                                                    <td align="center"><a href="{{route('supprimer_niveau',$nv->id)}}"><i class="bx bxs-trash"></i></a></td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        <div class="d-flex justify-content-end mx-5 pb-3">
                                                            <button type="button" class="btn btn-secondary" onclick="myFunction()">Retour</button>&nbsp;
                                                            <button class="btn btn-primary" onclick="myFunction1()">Ajouter un niveau</button>
                                                        </div>
                                                        <div id="mydiv" style="display: none;">
                                                            <form action="{{route('enregistrer_niveau')}}" method="POST">
                                                                @csrf
                                                                <table class="table">
                                                                    <thead>
                                                                        <th>Nouvelle niveau : </th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <input type="text" class="form-control" name="niveau" placeholder="niveau" required>
                                                                            </td>
                                                                            <td align="center" class="p-2">
                                                                                <button type="submit" class="btn btn-primary mt-3">Enregistrer</button>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    function myFunction() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
            x.style.display = "block";
            $('#ouvrir_flottant').modal('show');
        } else {
            x.style.display = "none";
            $('#ouvrir_flottant').modal('hide');
        }
    }

    function myFunction1() {
        var x = document.getElementById("mydiv");
        if (x.style.display === "none") {
            x.style.display = "block";
            $('#ouvrir_flottant').modal('show');
        } else {
            x.style.display = "none";
            $('#ouvrir_flottant').modal('hide');
        }
    }

</script>
@endsection
