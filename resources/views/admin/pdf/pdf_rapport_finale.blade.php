<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    {{-- <link href="{{public_path('bootstrapCss/css/bootstrap.min.css')}} " rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> --}}
    <title>Rapport finale pdf</title>
</head>
<body>


    <style type="text/css">

            .logo{
                width: 100px;
                height: 40px;
            }
            .logo-catalogue{
                width: 40px;
                height: 40px;
            }
            .hr-title-categorie{
                height:2px;
                border-width:0;
                color:rgb(108, 201, 218);
                background-color:rgb(108, 201, 218);
            }
            .navbar-pdf{
                background-color: black;
                color: white;
            }
            hr{
                background-color: black;
                border: 2px solid;
            }

.tarif-payer{
    background-color: #04803A;
    color: white;
}
.tarif-reste-positif{
    background-color: red;
    color: white;
}

.tarif-reste-negatif{
    background-color: black;
    color: white;
}

.titre-fiche-facture{
    color: rgb(218, 25, 115);
}

.introduction-title{
    color: green;
}

.size-module{
    color: #04803A;
}
.session{
    color: rgba(46, 46, 240, 0.329);
}

.date-heure{
    color: rgb(214, 177, 13);
}




/* h2 {

font-size: 80%;
}
h3 {

font-size: 80%;
} */

h4 {

    font-size: 70%;
}

h5 {

font-size: 80%;
}

h6 {

font-size: 80%;
}

p {

font-size: 70%;
}

li {

font-size: 70%;
}

table,th,td {

font-size: 80%;
}


.groupe{
    color: rgb(150, 187, 17);
}

hr{
    border: 1px;
}

.pourcent-globale{
    width: 80px;
    height: 80px;
    border-radius: 100%;
    box-shadow: #a4b3aa;
    background-color:  #a4b3aa;
    color: #04803A;
    text-align: center;
}

.progress-pdf {
  background-color: #e6e6dc;
  border-radius: 20px; /* (heightOfInnerDiv / 2) + padding */
  padding: 4px;
}

.progress-pdf>div {
  background-color: #1ef766;
  width: 48%;
  /* Adjust with JavaScript */
  height: 8px;
  border-radius: 10px;
}

    </style>


            <header class="navbar navbar-expand-lg navbar-light">
                <div class="float-left">
                    {{-- <img src="{{ asset('storage/'.$data["projet"]->logo) }}" alt="logonmk" class="logo"> --}}
                    <img src="{{ public_path('storage/'.$data["projet"]->logo) }}" alt="logonmk" class="logo">

                </div>
                <div class="float-right">
                    {{-- <img src="{{ asset('img/logo_numerika/logonmrk.png') }}" alt="logonmk" class="logo navbar-brand"> --}}
                    <img src="{{ public_path('img/logo_numerika/logonmrk.png') }}" alt="logonmk" class="logo navbar-brand">

                </div>
            </header>


<main class=" my-4">

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>

        <div class="col-md-10 text-center">
                    <h3>RAPPORT FINAL
                        du projet de renforcement de capacit??s
                        des membres de
                        <span class="introduction-title">
                            {{$data["projet"]->nom_etp}}
                         en EXCEL(Static)
                        </span>

                        </h3>
        </div>

        <div class="col-md-2"></div>
    </div>
</div>

<div class="container my-3">
    <div class="row">
        <div class="col-md-6">
                <p>Rapport N??20{{date('d').''.date('m').'20'.date('y')}} du {{'20'.date('y-m-d')}} par:</p>
                @foreach ($data["formateurs"] as $formateur)
                    <p >{{$formateur->nom_formateur.' '.$formateur->prenom_formateur}}</p>
                @endforeach

                <p >Consultant Formateur Expert EXCEL(Static)</p>
        </div>
        <div class="col-md-6"></div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light my-2">
    <div class="row">
        <div class="col-md-12">
            <div class="float-left">
                <p class="p-font-size">Rapport de formation EXCEL(Static)</p>
            </div>
            <div class="float-right">
                <p class="p-font-size">NUMERIKA</p>
            </div>

        </div>

    </div>
</nav>


<div class="container my-3">
    <div class="row">
        <div class="col-md-12 text-center">
            <h4>SOMMAIRE</h4>
        </div>
    </div>
    <div class="row my-5">
        <div class="col-md-12">
            <h6 class="introduction-title">1.INTRODUCTION</h6>
            <h6 class="introduction-title">2.PREPARATION ET CADRE DE LA FORMATION,FORMATEURS</h6>
                <p >2.1.	Pr??paration de la formation</p>
                <p >2.2 Liste des apprenants </p>
                <p >2.3 Equipe du projet </p>
                <p >2.4 Lieu de formation</p>
            <h6  class="introduction-title">3.DESCRIPTION PAR OBJECTIF ET ACTIVITE</h6>
                <p >3.1	But et objectifs du formation</p>
                <p >3.2 Programme d??taill?? des activit??s</p>
            <h6 class="introduction-title">4. METHODE PEDAGOGIQUE</h6>
                <p >4.1 Moyen p??dagogique</p>
            <h6 class="introduction-title">5. FEEDS BACKS</h6>
            <h6 class="introduction-title">6. CONCLUSION ET RECOMMANDATIONS (Recommandation strat??gique et pratique)</h6>
                <p>6.1	Conclusion</p>
                <p>6.2 Recommandations</p>
            <h6 class="introduction-title">7. Evaluation</h6>
                <p>7.1	Evaluation de l???action de formation</p>
                <p>7.2 Modalit??s d?????valuation des apprenants</p>
                <p>7.3 Evaluation des apprenants</p>
        </div>

    </div>
</div>

<div class="container my-2">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
                <h5 class="mb-3 introduction-title">1. INTRODUCTION</h5>
                <h6></h6>
                <p>
                    Dans le cadre de la collaboration avec l???organisme <strong>{{$data["projet"]->nom_etp}}</strong> , un projet de renforcement de <strong>{{$data["projet"]->nom_etp}}</strong>,un projet de renforcement de capacit?? destin?? au personnel de <strong>{{$data["projet"]->nom_etp}}</strong> a ??t?? planifi?? avec <strong>NUMERIKA</strong>. Ce projet permettra de disposer ?? terme des ressources humaines correspondant aux besoins de l???organisme <strong>{{$data["projet"]->nom_etp}}</strong> en quantit?? qu???en qualit?? sur l???utilisation du logiciel Microsoft Excel.
                </p>
                <p>
                    EXCEL(Static) est un logiciel tr??s connu, tr??s largement utilis?? mais paradoxalement peu de personnes connaissent toutes ses potentialit??s et ne savent tirer profit au maximum d'Excel de mani??re simple et efficace.
                </p>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

<div class="container my-2">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
                <h5 class="mb-3 introduction-title">2.	PREPARATION ET CADRE DE LA FORMATION, FORMATEURS :</h5>


                <h6>2.1.	PREPARATION DE LA FORMATION :</h6>
                <p>
                    Des briefings avant chaque formation ont ??t?? organis?? entre <strong>{{$data["projet"]->nom_etp}}</strong> et <strong>NUMERIKA</strong> afin d???analyser les besoins et de mieux cadrer la formation.
                </p>
            <h6>2.2.	LISTE DES APPRENANTS :</h6>
                <p>
                    Formation pr??sentielle et en ligne.(saisir)
                </p>

            @for ($i=0;$i<count($data["groupes"]);$i+=1)
            {{-- @foreach ($data["groupes"] as $groupe) --}}


            <div class="card mb-1">
                <div class="card-body">
                    <h5 class="groupe">{{$data["groupes"][$i]->nom_groupe}}</h5>
                    <h6 class="mb-2 text-muted">{{$data["groupes"][$i]->nom_module.'('.$data["groupes"][$i]->lieu.')'}}</h6>
                    <div class="card-text">
                        <table class="table" border="1">
                            <thead>
                                <tr>
                                    <th>Numero</th>
                                    <th>NOM</th>
                                    <th>PRENOM</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($data["stagiaires"] as $stagiaire)
                                @if ($data["groupes"][$i]->groupe_id == $stagiaire->groupe_id)

                                <tr>
                                    <th>N??{{$stagiaire->stagaire_id}}</th>
                                    <th scope="row">{{$stagiaire->nom_stagiaire}}</th>
                                    <td>{{$stagiaire->prenom_stagiaire}}</td>
                                </tr>

                                @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- @endforeach --}}
            @endfor



            <h6 class="my-1">2.3 EQUIPE DU PROJET :</h6>
            <p>L?????quipe du projet de formation est compos??e de quatre ({{count($data["toutformateurs"])}}) personnes remplissant chacune des responsabilit??s pr??cises.</p>
            <li>
                Le chef de projet :
            </li>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <p>En la personne de <strong>M. Levy RAVELOSON</strong> , qui est le garant de toute les op??rations administratives et financi??res du projet chez <strong>NUMERIKA</strong></p>
                </div>
            </div>

            <li>
                Les consultants formateurs junior qui assurent toutes les activit??s de formation ainsi que les activit??s de reporting qui suit :
            </li>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    @foreach ($data["toutformateurs"] as $listeformateur)
                    <li>
                        {{$listeformateur->prenom_formateur.' '.$listeformateur->nom_formateur}}
                    </li>
                    @endforeach

                </div>
            </div>

            <h6 class="my-3">2.4 LIEU DE FORMATION :</h6>
            <p>Lieu : Si??ge {{$data["projet"]->nom_etp.' '.$data["lieu_string"]}}</p>

            @foreach ($data["detail_formation"] as $detail)
                <p>Date : {{$detail->date_debut.' au '.$detail->date_fin}}</p>
            @endforeach


        </div>
        <div class="col-md-1"></div>
    </div>
</div>

<div class="container my-2">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
                <h5 class="mb-3 introduction-title">3.	Description par objectif et activit??  :</h5>


                <h6>3.1 BUTS ET OBJECTIFS DE LA FORMATION :</h6>
                <p>
                    L???atelier de formation comprenait :
                </p>

                {{-- Competence --}}

                @foreach ($data["but_objectif"] as $but)
                <p>>>
                    {{$but->reference.': ?? '.$but->nom_module.'??'}}
                </p>
                @endforeach

            @foreach ($data["desc_objectif"] as $object)

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <p>
                        {{$object->description}}
                    </p>

                    @foreach ($data["data_desc_objectif"] as $dataq)
                    @if ($dataq->but_objectif_id == $object->id)

                    <li>
                        {{$dataq->description}}
                    </li>

                    @endif
                    @endforeach

                </div>
            </div>

            @endforeach


            <h6 class="my-2">3.2. PROGRAMME DETAILLE DES ACTIVITES :</h6>

            {{-- @foreach ($detail_activiter as $detail) --}}
            @foreach ($data["groupes"] as $groupe)
            @foreach ($data["trie_detail_date"] as $trie_date)


            <div class="mb-1">
                <p class="size-module">{{$groupe->nom_groupe.','.$groupe->nom_module.'('.$groupe->lieu.')'}}</p>
                <div class="card">
                    <div class="card-body">
                        <h6 class="groupe date-heure">Session 1 :(mbol ts hay atw eto) </h6>


                        <p>Date: <span class="text-muted">{{$trie_date->date_detail}} </span> </p>
                        <p>Heure: <span class="text-muted">{{$trie_date->h_debut.'h ?? '.$trie_date->h_fin.'h'}}  </span> </p>

                        @foreach ($data["trie_detail_programme"] as $theme)
                        <p>Theme: <span class="text-muted">{{$theme->titre_programme}}</span></p>
                        <p>Objectif: <span class="text-muted">Ma??triser (miamp champ object dans table details)</span></p>

                        @foreach ($data["programme_detail_activiter"] as $activiter)

                        <div class="card-text">

                        @if ($groupe->groupe_id == $activiter->groupe_id && $trie_date->date_detail == $activiter->date_detail &&
                        $trie_date->h_debut == $activiter->h_debut && $trie_date->h_fin == $activiter->h_fin &&
                        $theme->programme_id == $activiter->programme_id)

                            <li class="text-end">{{$activiter->titre_cours}}</li>

                        @endif

                        </div>

                    @endforeach
                    @endforeach


                    </div>
                </div>
            </div>

            {{-- @endforeach --}}

            @endforeach
            @endforeach


        </div>
        <div class="col-md-1"></div>
    </div>
</div>


<div class="container my-2">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            @foreach ($data["pedagogique"] as $valiny)
                <h5 class="mb-3 introduction-title">{{$valiny->titre}}</h5>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <p>{{$valiny->description}}</p>
                    @foreach ($data["obj_pedagogique"] as $objectifs)
                    @if ($valiny->id == $objectifs->pedagogique_id)

                        <li>{{$objectifs->description}}</li>
                    @endif
                    @endforeach
                    </div>
                </div>
            @endforeach

        </div>
        <div class="col-md-1"></div>
    </div>
</div>


<div class="container my-2">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
                <h5 class="mb-3 introduction-title">5.	FEEDS BACKS</h5>
                @if ($data["feed_back"]!=null)
                <p>{{$data["feed_back"]->description}}</p>
                @else
                <p></p>
                @endif


        </div>
        <div class="col-md-1"></div>
    </div>
</div>


<div class="container my-2">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
                <h5 class="mb-3 introduction-title">6.	CONCLUSION ET RECOMMANDATIONS (Recommandation strat??gique et pratique)</h5>

                <h6 class="my-3">6.1 Conclusion :</h6>

                @foreach ($data["conclusion"] as $conclu)
                    <p>{{$conclu->description}}</p>
                @endforeach

                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <p>Les ??valuations ont donn?? les r??sultats : </p>

                            @foreach ($data["evaluation_resultat"] as $result)

                                <li>{{$result->description}}</li>

                            @endforeach

                        </div>
                    </div>

                    <h6 class="my-2">6.2 Recommandations :</h6>

                    @foreach ($data["desc_recommandation"] as $result)

                    <div class="row my-1">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <p class="text-center">{{$result->titre}}</p>
                            <hr>
                        @foreach ($data["data_desc_recommandation"] as $valiny)
                        @if ($result->id == $valiny->recommandation_id)

                            <li>{{$valiny->description}}</li>

                        @endif
                        @endforeach

                        </div>
                    </div>

                    @endforeach


        </div>
        <div class="col-md-1"></div>
    </div>
</div>


<div class="container my-2">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
                <h5 class="mb-3 introduction-title">7.	EVALUATION</h5>

                <h6 class="my-3">7.1 EVALUATION DE L???ACTION DE FORMATION</h6>
                    <p>
                        Les questionnaires post-formation visent ?? mesurer le ressenti des stagiaires vis-??-vis de la formation suivie, et ?? ??valuer leur degr?? de satisfaction. C???est le meilleur moyen d???am??liorer en continu l???organisation, la forme et le contenu des formations.(static)
                    </p>
                    <p>Apr??s synth??se des fiches d?????valuations de la formation Excel effectu?? par <strong>NUMERIKA</strong> pour <strong>{{$data["projet"]->nom_etp}}</strong>
                        ,nous constatons avec plaisir une bonne note de satisfaction globale des apprenants par rapport ?? l???ensemble de la formation dont ci-apr??s les grandes lignes.(mbol modifier)
                    </p>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card text-center">
                                <div class="card-header mb-5">
                                    @if ($data["globale_evaluation_action_formation"] != null)
                                    <h5 class="card-title">Globale: {{$data["globale_evaluation_action_formation"]->globale.' %/100'}}</h5>

                                    @else
                                    <h5 class="card-title"></h5>
                                    @endif


                                </div>
                                <div class="card-body ">
                                    <table class="table" border="1">

                                        <tbody>
                                        @foreach ($data["evaluation_action_formation"] as $dt)

                                            <tr>
                                                <th>{{$dt->titre}}</th>
                                                <td scope="row">{{$dt->pourcent.' %'}}</td>
                                            </tr>

                                        @endforeach
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>



                    <h6 class="my-2">7.2 MODALITE D???EVALUATION DES APPRENANTS :</h6>

                    <div class="row my-1">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <p class="text-center">Avant la formation  :</p>
                            <hr>
                            <p>Deux tests ont ??t?? effectu?? afin de mieux cerner le niveau des apprenants et de mesurer leur ??volution apr??s la formation :</p>

                            <li>
                                Test de niveau 1 pour v??rifier leur maitriser de calcul dans Excel(mbol modifier)
                            </li>
                            <li>
                                Test de niveau 2 pour v??rifier leur assimilation du logiciel Excel(mbol modifier)
                            </li>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <p class="text-center">Apr??s chaque formation :</p>
                            <hr>
                            <p>Le formateur ??value chaque apprenant selon leur capacit?? ?? ??tre autonome et efficacit?? ?? r??soudre un probl??me dans Microsoft Excel(mbol modifier). </p>
                        </div>
                    </div>

                    <h6 class="my-2">7.3 EVALUATION DES APPRENNANTS </h6>

                    <div class="row my-1">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <p>
                                La notation utilis??e par  <strong>NUMERIKA</strong> est de deux sortes : notation sur 5 ou bien exprim?? en %
                            </p>
                            <li>1 ou [0 ?? 20 % [Niveau Initial]</li>

                            <p>
                                Le candidat a une connaissance limit??e des fonctionnalit??s de base du logiciel et ne peut pas correctement l'utiliser.
                            </p>
                            <li>2 ou [20 ?? 40 % [Niveau Basique]</li>

                            <p>
                                Le candidat sait utiliser les fonctionnalit??s de base du logiciel et peut r??aliser des t??ches simples.
                            </p>
                            <li>3 ou [40 ?? 60% [Niveau Op??rationnelle]</li>

                            <p>
                                Le candidat conna??t les principales fonctionnalit??s du logiciel et parvient ?? ses fins.
                            </p>
                            <li>4 ou [60 ?? 80% [Niveau Avanc??]</li>

                            <p>
                                Le candidat dispose d'une tr??s bonne ma??trise du logiciel, y compris dans ses fonctionnalit??s avanc??es. Sa productivit?? est excellente.
                            </p>
                            <li>5 ou [80 ?? 100% [Niveau Expert]</li>

                        </div>
                    </div>

                    <p>Le candidat dispose d'une connaissance compl??te de l'ensemble des fonctionnalit??s du logiciel. Il conna??t les diff??rentes m??thodes pour r??aliser une t??che. Sa productivit?? est optimale.(static)</p>
                    <p>Formation <strong>{{$data["projet"]->nom_etp}}</strong> en ligne (Teams) du Jeudi 01 Mars 2021 au Jeudi 22 Avril 2021(mbol ho amboarina)</p>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table" border="1">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nom et Pr??nom</th>
                                        <th scope="col">Avant(note/5)</th>
                                        <th scope="col">Apr??s(note/5)</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach ($data["stagiaire_evaluation_apprenant"] as $stg)
                                    <tr>
                                        <th>N??{{$stg->stagaire_id}}</th>
                                        <th scope="row">{{$stg->nom_stagiaire.' '.$stg->prenom_stagiaire}}</th>
                                        <td>{{$stg->note_avant}}</td>
                                        <td>{{$stg->note_apres}}</td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>



        </div>
        <div class="col-md-1"></div>
    </div>
</div>




<h3 class="my-2">Evolution des participants de <strong>{{$data["projet"]->nom_etp}}</strong> ?? la formation Excel(mbol ovaina)</h3>

    <div class="row my-1">
        <div class="col-md-12">

            <canvas id="userChart" class="rounded shadow"></canvas>

        </div>
    </div>



<div style="background-color: #04803A;">
<div class="container mb-5">
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="float-left">
                <h3>Merci</h3>
            </div>
            <div class="float-right">
                <img src="{{ public_path('img/logo_numerika/logonmrk.png') }}" alt="logonmk" class="logo navbar-brand">
            </div>
        </div>
    </div>

    <br class="my-5">

    <div class="row my-5 flex-center">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h4 class="mb-5">pour votre confiance</h4>

            <div class="position-center">
            <img width="500px;" height="400px;" src="{{ public_path('img/logo_numerika/graphique-rapport_finale.jpg') }}" alt="logonmk">
            </div>

        </div>
        <div class="col-md-4"></div>
    </div>

</div>



</div>



</main>

<footer class="my-5 navbar-pdf bg-dark">
    <table class="table" width="auto">
        <tr>
            <th>&copy;20{{date('y')}}</th>
            <th>contact@numerika.center</th>
            <th>0332313563</th>
            <th>www.numerika.center</th>
        </tr>
</table>

</footer>

{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>


<!-- CHARTS -->
<script>
    var ctx = document.getElementById('userChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',
// The data for our dataset

        data: {
            labels:  {!! json_encode($data["chart"]["labels"]) !!} ,
            datasets: [
                {
                    label: 'Note Avant',
                    backgroundColor: {!! json_encode($data["chart"]["colours"]) !!} ,
                    data:  {!! json_encode($data["chart"]["dataset"]) !!} ,
                },
            ]
        },
// Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback: function(value) {if (value % 1 === 0) {return value;}}
                    },
                    scaleLabel: {
                        display: false
                    }
                }]
            },
            legend: {
                labels: {
                    // This more specific font property overrides the global property
                    fontColor: '#122C4B',
                    fontFamily: "'Muli', sans-serif",
                    padding: 25,
                    boxWidth: 25,
                    fontSize: 14,
                }
            },
            layout: {
                padding: {
                    left: 10,
                    right: 10,
                    top: 0,
                    bottom: 10
                }
            }
        }
    });
</script>

</body>
</html>
