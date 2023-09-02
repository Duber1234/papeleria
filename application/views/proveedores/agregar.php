<article class="content">
    <div class="card card-block">
        <div id="notify" class="alert alert-success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>

            <div class="message"></div>
        </div>
        <div class="grid_3 grid_4">


            <form method="post" id="data_form" class="form-horizontal">

                <h5><?=$title ?></h5>
                <hr>

                <div class="form-group row">

                    <label class="col-sm-2 col-form-label" for="name">Nombre Completo</label>

                    <div class="col-sm-10">
                        <input type="text" placeholder="Nombre del Cliente"
                               class="form-control margin-bottom  required" name="nombre">
                    </div>
                </div>
<hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="name">Tipo de Documento</label>

                    <div class="col-sm-10">
                        <select class="form-control margin-bottom  required" name="tipo_documento">
                            <option value="NIT">NIT</option>
                            <option value="CC">CC</option>
                            <option value="CC-EXTRANGERIA">CC EXTRANGERIA</option>
                        </select>
                        
                    </div>
                    
                </div>
                <hr>
                <div class="form-group row">

                    <label class="col-sm-2 col-form-label" for="name">N° Documento</label>

                    <div class="col-sm-10">
                        <input type="text" placeholder="N° Documento"
                               class="form-control margin-bottom  required" name="n_documento" onkeyup="formatNumber(this)">
                    </div>
                </div>
                <hr>
                <div class="form-group row">

                    <label class="col-sm-2 col-form-label" for="name">Direccion</label>

                    <div class="col-sm-10">
                        <input type="text" placeholder="Dirección"
                               class="form-control margin-bottom" name="direccion">
                    </div>
                </div>
                <hr>
                <div class="form-group row">

                    <label class="col-sm-2 col-form-label" for="name">Correo Electronico</label>

                    <div class="col-sm-10">
                        <input type="email" placeholder="Correo"
                               class="form-control margin-bottom" name="email">
                    </div>
                </div>
                <hr>
                <div class="form-group row">

                    <label class="col-sm-2 col-form-label" for="name">Celular Principal</label>

                    <div class="col-sm-10">
                        <input type="number" placeholder="Celular Principal"
                               class="form-control margin-bottom" name="celular1">
                    </div>
                </div>
                <hr>
                <div class="form-group row">

                    <label class="col-sm-2 col-form-label" for="name">Celular 2</label>

                    <div class="col-sm-10">
                        <input type="number" placeholder="Celular 2"
                               class="form-control margin-bottom" name="celular2">
                    </div>
                </div>
                <hr>
                <div class="form-group row">

                    <label class="col-sm-2 col-form-label" for="name">Celular 3</label>

                    <div class="col-sm-10">
                        <input type="number" placeholder="Celular 3"
                               class="form-control margin-bottom" name="celular3">
                    </div>
                </div>
                <hr>
                <div class="form-group row">

                    <label class="col-sm-2 col-form-label" for="name">fecha entrega</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control required"
                                           placeholder="Start Date" name="fecha_entrega" id="sdate2"
                                            autocomplete="false" >
                    </div>
                </div>
                <hr>
                <div class="form-group row">

                    <label class="col-sm-2 col-form-label"></label>

                    <div class="col-sm-4">
                        <input type="submit" id="submit-data" class="btn btn-success margin-bottom"
                               value="Guardar" data-loading-text="Adding...">
                        <input type="hidden" value="proveedores/guardar" id="action-url">
                    </div>
                </div>


            </form>
        </div>
    </div>
</article>
<script type="text/javascript">
   function formatNumber(input) {
  var value = input.value.replace(/\D/g, ''); // Eliminar todo excepto los dígitos
            var formattedValue = new Intl.NumberFormat().format(value);
            input.value = formattedValue;


        }
</script>