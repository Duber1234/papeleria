<article class="content">
    <div class="card card-block">
        <div id="notify" class="alert alert-success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>

            <div class="message"></div>
        </div>
        <div class="grid_3 grid_4">


            <form method="post" id="data_form" class="form-horizontal">

                <h5>Agregar Nuevo Producto</h5>
                <hr>
                <div class="form-group row">

                    <label class="col-sm-2 col-form-label" for="name">Codigo Producto</label>

                    <div class="col-sm-10">
                        <input type="text" placeholder="codigo producto"
                               class="form-control margin-bottom  required" name="codigo_producto">
                    </div>
                </div>
                <div class="form-group row">

                    <label class="col-sm-2 col-form-label" for="name">Nombre Producto</label>

                    <div class="col-sm-10">
                        <input type="text" placeholder="nombre_producto"
                               class="form-control margin-bottom  required" name="nombre_producto">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="name">Cantidad</label>

                    <div class="col-sm-10">
                        <input type="text" placeholder="cantidad" id="cantidad" 
                               class="form-control margin-bottom  required" name="cantidad">
                    </div>
                    
                </div><!--
                        <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="name">Numero de Cajas</label>

                    <div class="col-sm-10">
                        <input type="text" placeholder="cantidad"
                               class="form-control margin-bottom  required" name="numero_de_caja">
                    </div>
                    
                </div> -->
          
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="name">Precio Caja/paquete</label>

                    <div class="col-sm-10">
                        <input id="precio_caja" type="text" placeholder="Precio Caja"
                               class="form-control margin-bottom" name="precio_caja" onkeyup="formatNumber(this)">
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="name">Ganancia</label>

                    <div class="col-sm-2">
                        <input type="number" name="" id="in_porcentaje" class="form-control margin-bottom" placeholder="Porcentaje Calculo" value="20">
                        
                    </div>
                    <div class="col-sm-8">%  <input type="button" onclick="calcular_precios()" class="btn btn-success margin-bottom"
                               value="Calcular" data-loading-text="Calcular"> <small>Recuerda que esto es solo para el calculo, puedes cambiar el precio del producto si lo deseas</small></div>
                    
                </div>
                     
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="name">Precio Fabrica</label>

                    <div class="col-sm-10">
                        <input type="text" id="precio_fabrica" placeholder="precio_fabrica"
                               class="form-control margin-bottom  required" name="precio_fabrica" onkeyup="formatNumber(this)">
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="name">Precio Venta</label>

                    <div class="col-sm-10">
                        <input type="text" id="precio_venta" placeholder="precio_venta"
                               class="form-control margin-bottom  required" name="precio_venta" onkeyup="formatNumber(this)">
                    </div>
                    
                </div>
           
                <div class="form-group row">

                    <label class="col-sm-2 col-form-label"></label>

                    <div class="col-sm-4">
                        <input type="submit" id="submit-data" class="btn btn-success margin-bottom"
                               value="Guardar" data-loading-text="Adding...">
                        <input type="hidden" value="productos/guardar" id="action-url">
                    </div>
                </div>


            </form>
        </div>
    </div>
</article>
<script type="text/javascript">
    function calcular_precios(){
        var precio_caja=$("#precio_caja").val();
        precio_caja = precio_caja.replace(/\./g, "");
        
        var cantidad=$("#cantidad").val();
        var fabrica=precio_caja/cantidad;

        var porcentaje=$("#in_porcentaje").val();
        var precio_venta=((fabrica*porcentaje)/100)+fabrica;
        var ganancia =precio_venta-fabrica;

        var formattedValue = new Intl.NumberFormat().format(Math.round(fabrica));

        $("#precio_fabrica").val(formattedValue);
        formattedValue = new Intl.NumberFormat().format(Math.round(precio_venta));
        $("#precio_venta").val(formattedValue);
        $("#ganancia").html("ganancia "+Math.round(ganancia));
    }
    function formatNumber(input) {
  var value = input.value.replace(/\D/g, ''); // Eliminar todo excepto los dígitos
            var formattedValue = new Intl.NumberFormat().format(value);
            input.value = formattedValue;


        }
</script>