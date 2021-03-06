

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    {{-- Lien font awesome icons --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{asset('../assets/css/smooth_page.css')}}">
    <link rel="stylesheet" href="{{ asset('maquette/style_maquette.css') }}">
    <script src="{{ asset('maquette/javascript.js') }}"></script>
    <link rel="shortcut icon" href="{{  asset('maquette/real_logo.ico') }}" type="image/x-icon">
    <style>
        h6{
            text-align: justify;
        }
        .navperso{
            position: sticky;
            top: 5rem;
        }
    </style>
    <title> Formation.mg </title>
</head>
<body>
    <button
        type="button"
        class="btn btn-floating btn-lg" id="btn-back-to-top">
        <i class="far fa-arrow-up"></i>
    </button>
    <div class="row"  style="margin-top: 100px">
        <header class="col-4">
            <nav class="navbar_accueil fixed-top d-flex justify-content-between">
                <div class="left_menu ms-2">
                    <p class="titre_text m-0 p-0"><img class="img-fluid" src="{{ asset('maquette/logo_fmg54Ko.png') }}" width="60px" height="60px"> Formation.mg</p>
                </div>
                <div class="right_menu d-flex justify-content-end align-items-center">
                    <div class="child_right_menu">
                        <a href="{{url('contact')}}"><button class="btn_bordure_violet mx-2"><i class="fa fa-phone-alt"></i>&nbsp; Contactez-nous</button></a>
                    </div>
                    <div class="child_right_menu">
                       <a href="{{route('create+compte+client')}}"><button class="btn_bordure_violet mx-2"><i class="fa fa-layer-plus"></i>&nbsp; Cr??er un compte</button></a>
                    </div>
                    <div class="child_right_menu">
                        <button class="btn bouton_violet mx-2"><a href="{{ route('sign-in') }}"><i class="fa fa-sign-in-alt"></i>&nbsp; Connexion </a></button>
                    </div>
                </div>
            </nav>
            <ul class="nav flex-column navperso" >
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="#access">Acc??s aux Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#inscription">Inscription</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="#usage">Usage strictement personnel, Comptes administrateurs et utilisateurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#duree">Dur??e de l???abonnement, d??sinscription</a>
                </li>
                <li class="nav-item">
                <a class="nav-link " href="#description">Description des Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#condition">Conditions financi??res</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link " href="#responsabilite">Responsabilit??s et garanties du Client
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#comportement">Comportements prohib??s</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#obligation">Obligations et responsabilit?? du A WORLD FOR US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#propriete">Propri??t?? Intellectuelle
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#donnees">Donn??es ?? caract??re personnel</a>
                </li> --}}

            </ul>
        </header>

        <main class="col-6" >
            <div id = "access"></div>
            <h1>Conditions g??n??rales de la plateforme Formation.mg</h1>
            <div >
                <h2 >Acc??s aux Services</h2>
                1. Capacit?? juridique
                    <h6>Les services sont accessibles ?? toute personne morale agissant par l???interm??diaire d???une personne physique disposant de la capacit?? juridique pour contracter au nom et pour le compte de la personne morale.</h6><br>
                2. Services destin??s exclusivement aux professionnel.
                    <h6>Les Services s???adressent exclusivement aux professionnels entendus comme toutes personnes physiques ou morales exer??ant une activit?? r??mun??r??e de fa??on non occasionnelle dans tous les secteurs li??s ?? la formation ou ?? la gestion de comp??tences. </h6><br>
                3. Commande des Services et acceptation des conditions g??n??rales
                    <h6 id = "inscription">La validation du Devis par le Client, toute commande de Service ou toute souscription d???abonnement n??cessite son inscription sur le Site, et l???acceptation pleine et enti??re des dispositions des pr??sentes conditions g??n??rales.
                Toute adh??sion sous r??serve est consid??r??e comme nulle et non avenue.</h6>
            </div>
            <div >
                <h2 >Inscription</h2>
                <h6>1. L???acc??s aux Services n??cessite que le Client s???inscrive sur le Site, lui-m??me ou par le biais d???un administrateur qu???il aura d??sign??, en remplissant le formulaire pr??vu ?? cet effet.
                    </h6><br>
                <h6>2. Le Client, ou l???administrateur, doit fournir l???ensemble des informations marqu??es comme obligatoires, notamment son nom, pr??nom, adresse email professionnelle et mot de passe. Il reconna??t et accepte que l???adresse email renseign??e sur le formulaire d???inscription constitue son identifiant de connexion.</h6><br>
                <h6>Toute inscription incompl??te ne sera pas valid??e. </h6><br>
                <h6>L???inscription entra??ne l???ouverture d???un compte au nom du Client , lui donnant acc??s ?? un espace personnel qui lui permet de g??rer son utilisation des Services sous une forme et selon les moyens techniques que Formation.mg juge les plus appropri??s pour rendre lesdits Services.</h6><br>
                <h6>Le Client garantit que toutes les informations qu???il donne dans le formulaire d???inscription sont exactes, ?? jour et sinc??res et ne sont entach??es d???aucun caract??re trompeur.</h6><br>
                <h6>Il s???engage ?? mettre ?? jour ces informations dans son Espace Personnel en cas de modifications, afin qu???elles correspondent toujours aux crit??res susvis??s.</h6><br>
                <h6 id="usage"> Client est inform?? et accepte que les informations saisies aux fins de cr??ation ou de mise ?? jour de son Compte, par lui ou par le biais de l???Administrateur, vaillent preuve de son identit??. Les informations saisies par le Client l???engagent d??s leur validation.</h6>
            </div>
            <div>
                <h2>Usage strictement personnel, Comptes administrateurs et utilisateurs</h2>
                <h6>Une fois son inscription valid??e, le Client, ou l???administrateur qu???il aura d??sign??, dispose de la facult?? de cr??er plusieurs comptes utilisateurs via son Espace Personnel, donnant acc??s aux Services.</h6><br>
                <h6> appartient au Client ou ?? l???administrateur de s??lectionner les utilisateurs ayant acc??s ?? l???Application ou aux Services, dans la limite du nombre maximum pr??vu dans l???abonnement du Client, de d??terminer la nature des acc??s qui leur sont donn??s, ainsi que les donn??es et informations auxquelles ils ont acc??s.</h6><br>
                <h6>L???utilisateur et/ou l???administrateur peuvent acc??der ?? tout moment au Compte du Client par le biais de leur propre Espace Personnel, apr??s s?????tre identifi??s ?? l???aide de leur identifiant de connexion ainsi que de leur mot de passe.</h6><br>
                <h6>L???utilisateur et l???administrateur s???engagent ?? utiliser personnellement les Services et ?? ne permettre ?? aucun tiers de les utiliser ?? leur place ou pour leur compte, sauf ?? en supporter l???enti??re responsabilit??.</h6><br>
                <h6>Ils sont pareillement responsables du maintien de la confidentialit?? de leur identifiant et de leur mot de passe, et reconnaissent express??ment que toute utilisation des Services depuis leur Compte sera r??put??e avoir ??t?? effectu??e par eux. Ces derniers doivent imm??diatement contacter Formation;mg s???ils remarquent que leur Compte a ??t?? utilis?? ?? leur insu. Ils reconnaissent ?? formation.mg le droit de prendre toutes mesures appropri??es en pareil cas.</h6><br>
                <h6  id = "duree">Le Client est responsable de l???utilisation des Services par l???administrateur et les utilisateurs. Toute utilisation des Services avec l???identifiant et le mot de passe d???un Compte administrateur et/ou utilisateur est r??put??e effectu??e par le Client.</h6><br>
            </div>
            <div>
                <h2>Dur??e de l???abonnement, d??sinscription</h2>
                <h6>1. La licence d???utilisation de l???Application et l???ensemble des Services pr??vus aux pr??sentes sont souscrits par le Client sous la forme d???un abonnement mensuel ou annuel, dont la date de d??but est indiqu??e dans l???email de confirmation de son inscription. Cet abonnement se renouvellera ensuite tacitement pour une p??riode de m??me dur??e, sauf d??nonciation par l???une ou l???autre des parties adress??e ?? l???autre partie par tout moyen ??crit 8 (huit) jours au moins avant l???expiration de la p??riode en cours.
                </h6><br>
                <h6  id="description">2. Tout abonnement aux Services est souscrit pour une dur??e ind??termin??e. La suppression d???un compte ne pourrait pas se faire, du fait que c???est un site collaboratif. Cependant, le client peut suspendre son compte  et y avoir acc??s d??s qu???il entre son identifiant et son mot de passe.
                </h6><br>
            </div>
            <div>
                <h2>Description des Services</h2>
                <h6>1. Licence(s) d???utilisation de l???Application</h6>
                <h6 style="margin-left: 10px">1.1 Objet de la licence</h6>
                <h6>A WORLD FOR US conc??de au Client une licence non exclusive, personnelle et non transmissible d???utilisation de son Application, dans sa version existante ?? la date des pr??sentes et dans toutes ??ventuelles versions ?? venir, aux seules fins de la fourniture des Services.</h6><br>
                <h6>L???acc??s ?? l???Application est fourni : </h6><br>
                <ul>
                    <li>- Gratuitement en ce qui concerne l???abonnement basique ;</li>
                    <li>- Moyennant un abonnement payant concernant les fonctionnalit??s Premium propos??es sur le Site.
                    </li>
                </ul>
                <h6>Cette licence est consentie pour le monde entier et pour la dur??e de l???abonnement souscrit.</h6><br>
                <h6>Il est interdit au Client d???en c??der ou d???en transf??rer le b??n??fice ?? un tiers, quel qu???il soit.</h6><br>
                <h6 style="margin-left: 10px">1.2 H??bergement</h6>
                <h6>Le Client n???autorise aucune utilisation des donn??es collect??es par le biais de l???Application par A WORLD FOR US ou par un tiers, qui ne serait pas rendue n??cessaire par l???ex??cution du Contrat, sans son autorisation explicite et ??crite.</h6><br>
                <h6>En cas de changement de prestataire d???h??bergement, A WORLD FOR US s???engage ?? en aviser le Client dans les plus brefs d??lais, par tout moyen ??crit utile. L???identit?? du nouvel h??bergeur, ainsi que le territoire dans lequel ses serveurs seront situ??s s???ils sont hors Europe, seront communiqu??s au Client.</h6><br>
                <h6>A WORLD FOR US s???engage ?? mettre en ??uvre l???ensemble des moyens techniques conformes ?? l?????tat de l???art n??cessaires pour assurer la s??curit?? et l???acc??s ?? l???Application et aux Services, portant sur la protection et la surveillance des infrastructures, le contr??le de l???acc??s physique et/ou immat??riel auxdites infrastructures, ainsi que sur la mise en ??uvre des mesures de d??tection, de pr??vention et de r??cup??ration pour prot??ger ses serveurs d???actes malveillants.</h6><br>
                <h6>Eu ??gard ?? la complexit?? d???Internet, l???in??galit?? des capacit??s des diff??rents sous-r??seaux, l???afflux ?? certaines heures des Clients de l???Application, aux diff??rents goulots d?????tranglement sur lesquels A WORLD FOR US n???a aucune ma??trise, la responsabilit?? de A WORLD FOR US sera limit??e au fonctionnement de ses propres serveurs, dont les limites ext??rieures sont constitu??es par les points de raccordement.</h6><br>
                <h6>A WORLD FOR US ne saurait ??tre tenue pour responsable (i) de l???indisponibilit?? des serveurs du Client ou de ceux de son syst??me d???exploitation, (ii) des vitesses d???acc??s ?? ses serveurs, (iii) des ralentissements externes ?? ses serveurs, et (iv) des mauvaises transmissions dues ?? une d??faillance ou ?? un dysfonctionnement de ses r??seaux.</h6><br>
                <h6 style="margin-left: 10px">1.3 Maintenance ??volutive</h6>
                <h6>A WORLD FOR US s???engage ?? faire b??n??ficier le Client des ??volutions et mises ?? jour de son Application, dont la nature et la fr??quence seront laiss??es ?? la libre appr??ciation de A WORLD FOR US.</h6><br>
                <h6>A WORLD FOR US se r??serve la possibilit?? de limiter ou de suspendre l???acc??s ?? l???Application pendant les op??rations de maintenance. Elle informera le Client au pr??alable par tout moyen utile de la r??alisation de ces op??rations.</h6><br>
                <h6 style="margin-left: 10px">1.4 Support technique</h6>
                <h6>En dehors des dysfonctionnements et pour toute question li??e ?? la simple utilisation des Services, A WORLD FOR US offre au Client un support technique consistant en une assistance et un conseil.</h6><br>
                <h6>Le support technique est accessible ?? l???adresse email info@digiforma.com ou par chat.</h6><br>
                <h6 style="margin-left: 10px">1.5 Autres Services</h6>
                <h6>A WORLD FOR US se r??serve le droit de proposer tous autres Services ou abonnement qu???elle jugera utile, sous une forme et selon les fonctionnalit??s et moyens techniques qu???elle estimera les plus appropri??s pour rendre lesdits Services. Aucune prestation suppl??mentaire n???aura lieu sans que le Client n???en ait accept?? le prix et les conditions de mise en ??uvre de fa??on expresse, pr??alable et par ??crit.</h6><br>
            </div>
            <div>
                <h2>Conditions financi??res</h2>
                <h6>1. Prix des Services </h6>
                <h6 >En contrepartie de la r??alisation des Services, le Client s???engage ?? payer ?? A WORLD FOR US le prix de l???abonnement choisi, tel qu???indiqu?? sur le Site et pr??alablement ?? son inscription  mensuelle ou annuelle,  par virement bancaire.</h6><br>
                <h6>2. Facturation </h6>
                <h6>Les Services font l???objet de factures ponctuelles ou mensuelles communiqu??es au Client par email et ?? chaque nouvelle souscription de Service ou d???abonnement.</h6><br>
                <h6   id="condition">3. R??vision du Prix </h6>
                <h6>Le Prix a ??t?? calcul?? en fonction de l???abonnement choisi par le Client et des options ??ventuellement souscrites. Si l???un de ces param??tres venait ?? ??voluer en cours de Contrat, le Prix des Services serait recalcul?? en cons??quence.</h6><br>
                <h6>4. Retards et d??fauts de paiement
                <h6>De convention expresse entre les parties, tout retard de paiement de tout ou partie d???une somme due ?? son ??ch??ance au titre de l???ex??cution des Services entra??nera automatiquement et sans mise en demeure pr??alable : (i) la d??ch??ance du terme de l???ensemble des sommes dues par le Client et leur exigibilit?? imm??diate, (ii) la suspension imm??diate des Services jusqu???au complet paiement de l???int??gralit?? des sommes dues et (iii) la facturation au profit de A WORLD FOR US d???un int??r??t de retard au taux de 3 fois (trois fois) le taux d???int??r??t l??gal, assis sur le montant de l???int??gralit?? des sommes dues par le Client.</h6><br>
            </div>
            {{-- <div>
                <h2>Responsabilit??s et garanties du Client</h2>
                <h6>1. Le Client est seul responsable du respect des lois et r??glements en vigueur applicables ?? son activit??. Il est notamment seul responsable du bon accomplissement de toutes les formalit??s administratives, fiscales et/ ou sociales qui lui incombent en relation avec son utilisation des Services.</h6><br>
                <h6>2. Le Client reconnait ??tre seul responsable du traitement des donn??es ?? caract??re personnel pouvant ??tre collect??es ?? travers les Services et s???engage ?? respecter la l??gislation applicable. A WORLD FOR US n???intervient qu???en qualit?? de sous-traitant et met en ??uvre les moyens n??cessaires au maintien de la s??curit?? et de la confidentialit?? desdites donn??es. </h6><br>
                <h6>3.
                Le Client s???interdit, en son nom et au nom des Utilisateurs, de c??der, conc??der ou transf??rer tout ou partie de ses droits ou obligations au titre des pr??sentes ?? un quelconque tiers, y compris si ce tiers a un lien direct ou indirect avec le Client, de quelque mani??re que ce soit.
                <h6>4.
                Le Client est inform?? et accepte que la mise en ??uvre des Services n??cessite qu???il soit connect?? ?? internet et que la qualit?? des Services d??pend directement de cette connexion.
                <h6>5.
                Le Client d??clare avoir pris connaissance des caract??ristiques et des fonctionnalit??s de l???Application, qu???il est inform?? de la configuration technique n??cessaire ?? son utilisation, qu???il a re??u de A WORLD FOR US tous conseils, instructions et pr??cisions qui lui sont n??cessaires pour souscrire aux Services en toute connaissance de cause, qu???il dispose ainsi d???une connaissance suffisante des Services et qu???il a, pr??alablement aux pr??sentes, suffisamment ??chang?? avec A WORLD FOR US pour s???assurer que les Services correspondent ?? ses attentes, besoins et contraintes.
                <h6>6.
                De fa??on g??n??rale, le Client s???engage ?? ne rien faire qui puisse, de quelque mani??re que ce soit, nuire ?? l???image de marque ou ?? la r??putation de A WORLD FOR US.
                <h6>7.
                Le Client est seul responsable des contenus de toute nature (r??dactionnels, graphiques, audios, audiovisuels ou autres) qu???il publie sur l???Application et de toute cons??quence qui en d??coulerait.
                <h6>8.
                Le Client garantit ?? Formation.mg qu???il dispose de tous les droits et autorisations n??cessaires ?? la diffusion de ces Contenus. Il s???engage ?? ce que lesdits Contenus soient licites, ne portent pas atteinte ?? l???ordre public, aux bonnes m??urs ou aux droits de tiers, n???enfreignent aucune disposition l??gislative ou r??glementaire et plus g??n??ralement, ne soient aucunement susceptibles de mettre en jeu la responsabilit?? civile ou p??nale de Formation.mg.
                Le Client s???interdit ainsi de diffuser, notamment et sans que cette liste soit exhaustive :
                des Contenus p??dopornographiques, pornographiques, diffamatoires, injurieux, racistes, obsc??nes, ind??cents, choquants, violents, x??nophobes ou r??visionnistes,
                des Contenus contrefaisants,
                des Contenus attentatoires ?? l???image d???un tiers,
                des Contenus mensongers, trompeurs ou proposant ou promouvant des activit??s illicites, frauduleuses ou trompeuses,
                et plus g??n??ralement des Contenus susceptibles de porter atteinte aux droits de tiers ou d?????tre pr??judiciables ?? des tiers, de quelque mani??re et sous quelque forme que ce soit.
                <h6>9.
                Le Client garantit Formation.mg contre toutes plaintes, r??clamations, actions et/ou revendications quelconques que Formation.mg pourrait subir du fait d???un manquement par le Client de l???une quelconque de ses obligations ou garanties aux termes des pr??sentes. Il s???engage ?? indemniser Formation.mg de tout pr??judice qu???il subirait et ?? lui payer tous les frais, charges et/ou condamnations qu???il pourrait avoir ?? supporter de ce fait.

            </div> --}}

        </main>
        <footer class="footer_container">

            <div class="d-flex justify-content-center pt-3">
                <div class="bordure">&copy; Copyright 2022</div>
                <div class="bordure">Informations l??gales</div>
                <div><a href="{{url('contact')}}" class="bordure" style="color: #801D62;text-decoration:none">Contactez-nous</a></div>
                <div class="bordure">Politique de confidentialit??s</div>
                <div class="bordure" > <a href="{{route('condition_generale_de_vente')}}" style="color:#801D68 !important" target="_blank"> Condition d'utilisation</a> </div>
                <div class="bordure">Tarifs</div>
                <div class="bordure">Cr??dits</div>
                <div> &nbsp; Version 0.9</div>
            </div>
</footer>
    </div>

</body>
</html>
