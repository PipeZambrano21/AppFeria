<!--    esto es algo comentado--->
<div class="wizard-card ct-wizard-green">
</div>
<br>
<h3>Perfil:</h3>
<br>
<div class="form-group">
    <textarea class="form-control" id="perfil" name="perfil" rows="5" style="resize: none;"
        placeholder="Descripcción del perfil (max 1200)"></textarea>
</div>
<h3>Formacion Academica:</h3>
<br>
<div class="suma">
    <div class="buttons">
        <button type="button" name="add" id="addf1" class="btn btn-success"
            style="background-color: #0B7984; border-color: #0B7984;">Añadir campo</button>
        </button>
    </div>
    <br>
    <div class="element" id="formAca">
        <p>(0)formaciones academicas</p>
    </div>
    <div class="results" id="agregarf1">
    </div>
</div>
<br>
<br>

<h3>Formacion Complementaria:</h3>
<br>
<div class="sumaCom">
    <div class="buttons">
        <button type="button" name="addf2" id="addf2" class="btn btn-success"
            style="background-color: #0B7984; border-color: #0B7984;">Añadir campo</button>
        </button>
        <br><br>
    </div>
    <div class="elementCom" id="formLab">
        <p>(0)formaciones laborales</p>
    </div>
    <div class="resultsCom" id="agregarf2">
    </div>
</div>
<input type="hidden" id="numComplementaria" name="numComplementaria" value="">
<input type="hidden" id="numAcademica" name="numAcademica" value="">




<br><br>
<script>
$(document).ready(function() {

    $('#addf1').click(function() {
        i++;
        cambiar = document.getElementById("formAca");
        cambiar.innerHTML = "<p>(" + i + ")formaciones academicas</p>";


        $('#agregarf1').append('<div id="row1' + i +
            '" class="suma"> <div class="buttons"> </div> <br> <div class="element"> <div class="row no-gutters"> <div class="col-md-6 mb-3"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">face</i> </span> </div> <input autocomplete="new-false" type="text" class="form-control" placeholder="Titulo" aria-label="Username" id="academica' +
            i + '[]" required name="academica' + i +
            '[]"> </div><div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">assignment_ind</i> </span> </div> <select autocomplete="false" type="text" class="form-control"  aria-label="Username" id="academica' +
            i + '[]" required name="academica' + i +
            '[]"> <option disabled="" selected="" >Seleccionar tipo de formacion</option> <option value="1"> Bachillerato </option><option value="2"> Tecnico profesional </option><option value="3"> Tecnologico</option><option value="4"> Profesional </option><option value="5"> Especializacion tecnica </option><option value="6"> Especializacion tecnologica </option><option value="7"> Especializacion profesional </option><option value="8"> Maestria </option><option value="9"> Doctorado </option> </select> </div> </div> <div class="col-md-6 mb-3"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">phone</i> </span> </div> <input autocomplete="false" type="text" class="form-control" placeholder="Institucion" name="academica' +
            i + '[]"  required id="academica' + i +
            '[]" aria-label="Username"> </div> </div> <div class="col-md-6 mb-3"> <h5>Fecha de inicio</h5> <br> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">assignment_ind</i> </span> </div> <input  required autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username" id="academica' +
            i + '[]" required name="academica' + i +
            '[]"> </div> </div> <div class="col-md-6 mb-3"> <h5>Fecha de finalizacion</h5> <br> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">assignment_ind</i> </span> </div> <input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username" required id="academica' +
            i + '[]" required name="academica' + i +
            '[]"> </div> </div><button type="button" name="remove" id="' +
            i + '" class="btn btn-danger btn_removeF1">Remover</button><br>');

    });

    $('#addf2').click(function() {
        j++;
        cambiar = document.getElementById("formLab");
        cambiar.innerHTML = "<p>(" + j + ")formaciones laborales</p>";
        $('#agregarf2').append('<div id="row2' + j +
            '" class="sumaCom"> <div class="buttons"> <br> </div> <div class="elementCom"> <div class="row no-gutters"> <div class="col-md-6 mb-3"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">assignment_ind</i> </span> </div> <select autocomplete="false" type="text" class="form-control" aria-label="Username" id="complementaria' +
            j + '[]"  required name="complementaria' + j +
            '[]"> <option disabled="" selected="" >Seleccionar tipo de formacion</option> <option value="Seminario"> Seminario </option> <option value="Diplomado"> Diplomado </option> <option value="Curso"> Curso </option> </select> </div> </div> <div class="col-md-6 mb-3"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">phone</i> </span> </div> <input autocomplete="false" type="text" class="form-control" placeholder="Nombre del curso" aria-label="Username" id="complementaria' +
            j + '[]"  required name="complementaria' + j +
            '[]"> </div> </div> <div class="col-md-6 mb-3"> <h5>Fecha de inicio</h5> <br> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">assignment_ind</i> </span> </div> <input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username" id="complementaria' +
            j + '[]"  required name="complementaria' + j +
            '[]"> </div> </div> <div class="col-md-6 mb-3"> <h5>Fecha de finalizacion</h5> <br> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="material-icons">assignment_ind</i> </span> </div> <input autocomplete="false" type="date" class="form-control" placeholder="" aria-label="Username" id="complementaria' +
            j + '[]" required name="complementaria' + j +
            '[]"> </div> </div><button type="button" name="remove" id="' +
            j + '" class="btn btn-danger btn_removeF2">Remover</button>');

    });


    $(document).on('click', '.btn_removeF1', function() {
        var button_id = $(this).attr("id");
        $('#row1' + button_id + '').remove();
        i--;
        cambiar = document.getElementById("formAca");
        cambiar.innerHTML = "<p>(" + i + ")formaciones academicas</p>";
    });

    $(document).on('click', '.btn_removeF2', function() {
        var button_id = $(this).attr("id");
        $('#row2' + button_id + '').remove();
        j--;
        cambiar = document.getElementById("formLab");
        cambiar.innerHTML = "<p>(" + j + ")formaciones laborales</p>";
    });





});
</script>