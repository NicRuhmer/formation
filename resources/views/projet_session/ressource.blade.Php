{{-- @if (count($stagiaire) == 0)
<h5>Précisez ici les exigeances matériels pour le projet</h5>
<section class="row px-3">
    <div class="col-md-4 p-0">
        <label for="" class="ps-2"> Titre </label>
        <input type="text" class="form-control ajout_form">
    </div>
    <div class="col-md-7  py-0 px-1">
        <label for="" class="ps-2"> Description </label>
        <input type="text" class="form-control ajout_form">
    </div>
    <div class="col-md-1 p-0">
        <label for="" class="ps-2">Action</label>
        <button class="btn-ajout mt-3"> Ajouter </button>
    </div>
</section>
@endif --}}

{{-- @if (count($stagiaire) != 0) --}}
<div class="shadow mb-3 col-12 pb-5">
    <div class="row">
        <div class="col-md-5">
            <span>
                <h5>Matériel nécessaire</h5>
            </span>
        </div>
        <div class="col-md-5">
            <span>
                <h5>Demandé(e) par :</h5>
            </span>
        </div>
    </div>
        <div id="affiche_ressource">
            @foreach ($ressource as $r)
                <div class="row" id="ressource_{{ $r->id }}">
                    <div class="col-md-5">
                        <section>
                            <i class="far fa-check-circle"></i>&nbsp; {{ $r->description }}
                        </section>
                    </div>
                    <div class="col-md-5">
                        <section>
                            {{ $r->demandeur }}
                        </section>
                    </div>
                    <div class="col-md-2">
                        <section>
                            <button type="button" class="supprimer_ressource" data-id="{{ $r->id }}"><i class="fa fa-trash-alt"></i></button>
                        </section>
                    </div>
                    <hr class="m-0">
                </div>

            @endforeach
        </div>
    <div class="mt-3">
        <h5>Autre(s)</h5>
        <section class="row px-3">
            <div class="col-md-8  py-0 px-1">
                <label for="" class="ps-2"> Description </label>
            </div>
        </section>
        <form action="">
            <section class="row px-3">
                <div class="col-md-7  py-0 px-1">
                    <input type="text" id="description_ressource" class="form-control ajout_form" required>
                </div>
                <div class="col-md-1 mt-3 p-0">
                    <button type="button" id="ajouter_ressource" class="btn-ajout mb-1"> Ajouter </button>
                </div>
            </section>
        </form>
    </div>
</div>
{{-- @endif --}}
<style>
    .ajout_form:focus {
        outline: none;
        box-shadow: none;
        transition: all 0.2ms ease-in;
        /* box-shadow: 2px solid rgb(130,33,100); */
    }

    .btn-ajout {
        border: 2px solid rgb(130, 33, 100);
        border-radius: 1rem;
        padding: 0 6px;
        color: rgb(130, 33, 100);
        height: auto;
    }

</style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $("#ajouter_ressource").on('click', function(e) {
        var ressource = $("#description_ressource").val();
        if(ressource === ''){
            return false;
        }
        var groupe_id = @php echo $projet[0]->groupe_id; @endphp;
        $.ajax({
            type: "GET",
            url: "{{ route('add_ressource') }}",
            data: {
                ressource: ressource,
                groupe: groupe_id,
            },
            dataType: "html",
            success: function(response) {
                var userData = JSON.parse(response);
                $('#affiche_ressource').empty();
                $("#description_ressource").val('');
                var html = '';
                for (var i = 0; i < userData.length; i++) {
                    html += '<div class="row" id="ressource_'+userData[i].id+'">';

                    html += '<div class="col-md-5">';
                    html += '<section>';
                    html += '<i class="far fa-check-circle"></i>&nbsp;'+userData[i].description;
                    html += '</section>';
                    html += '</div>';

                    html += '<div class="col-md-5">';
                    html += '<section>';
                    html += userData[i].demandeur;
                    html += '</section>';
                    html += '</div>';

                    html += '<div class="col-md-2">';
                    html += '<section>';
                    html += '<button type="button" class="supprimer_ressource" data-id="'+userData[i].id+'"><i class="fa fa-trash-alt"></i></button>';
                    html += '</section>';
                    html += '</div>';

                    html += '<hr class="m-0">';
                    html += '</div>';
                }
                $('#affiche_ressource').append(html);

            },
            error: function(error) {
                console.log(error)
            }
        });
    });

    $(".supprimer_ressource").on('click', function(e) {
        // var id = e.target.id;
        var id = $(this).data("id");
        var groupe_id = @php echo $projet[0]->groupe_id; @endphp;
        $.ajax({
            type: "GET"
            , url: "{{route('supprimer_ressource')}}"
            , data: {
                Id: id,
                groupe:groupe_id
            }
            , success: function(response) {
                if (response.success) {
                    var row=document.getElementById("ressource_"+id);
                    row.parentNode.removeChild(row);
                } else {
                    alert("Error")
                }
            }
            , error: function(error) {
                console.log(error)
            }
        });
    });
</script>
