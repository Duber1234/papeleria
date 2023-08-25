<style type="text/css">
    .cl-ck-f:hover{
     transform: scale(4);
}
</style>
<article class="content">
    <div class="card card-block">
        <div id="notify" class="alert alert-success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>

            <div class="message"></div>
        </div>
        <div id="notificaciones">
            
        </div>
        <div class="grid_3 grid_4 animated fadeInRight">
            <h5>Productos</h5>
            <div class="row">

                <div class="col-xl-4 col-lg-6 col-xs-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-block">
                                <div class="media">
                                    <div class="media-body text-xs-left">
                                        <h3 class="green"><span id="dash_0"></span></h3>
                                        <span>STOCK</span>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="icon-rocket green font-large-2 float-xs-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-xs-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-block">
                                <div class="media">
                                    <div class="media-body text-xs-left">
                                        <h3 class="red"><span id="dash_1"></span></h3>
                                        <span>STOK</span>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="icon-blocked red font-large-2 float-xs-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-xs-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-block">
                                <div class="media">
                                    <div class="media-body text-xs-left">
                                        <h3 class="cyan" id="dash_2"></h3>
                                        <span>Total Mes Actual<?= ' : $ '.number_format(($total_mes_actual[0]['total']),0,",",".") ?></span><br>
                                        <span>Total Mes Anterior<?= ' : $ '.number_format(($total_mes_anterior[0]['total']),0,",",".") ?></span>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="icon-stats-bars22 cyan font-large-2 float-xs-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>

            <div style="width: 100%;text-align: center;">
                <div>  <label>Cliente</label> </div>
                 
                    <select name="clientes" style="width:70%" id="clientes" class="form-control">
                    <option value="">-</option>
                <?php
                    foreach ($clientes as $row) {
                        $row->n_documento=str_replace(".","", $row->n_documento);
                        $texto=$row->nombre_cl." - ".$row->n_documento;
                        echo "<option value='$row->id'>$texto</option>";
                    }
                    ?>
                </select>
            </div>
        <div class="table-responsive">
            <table id="productstable" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
					<th>ID</th>
                    <th>nombre</th>
                    <th>cantidad</th>
                    <?php if($mostrar_precio_fabrica==1){ ?>
                    <th>precio_fabrica</th>
                    <?php } ?>
                    <th>precio_venta</th>
                    <th>Ganancia *1</th>
                    <th>foto</th>
                    <th>Prox.pedido</th>
                    <th>Acciones</th>
                    
                </tr>
                </thead>
                <tbody>
                </tbody>

                <tfoot>
                <tr>
                   <th>#</th>
                    <th>ID</th>
                    <th>nombre</th>
                    <th>cantidad</th>
                    <?php if($mostrar_precio_fabrica==1){ ?>
                    <th>precio_fabrica</th>
                    <?php } ?>
                    <th>precio_venta</th>
                    <th>Ganancia *1</th>
                    <th>foto</th>
                    <th>Prox.pedido</th>
                    <th>Acciones</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <input type="checkbox" id="mostrar_precio_fabrica" style="cursor: pointer;" onclick="ocultar_precio_fabrica()" <?= ($mostrar_precio_fabrica==1)? 'checked="true"':'' ?>>&nbsp;Precio Fabrica
        
    </div>

    <input type="hidden" id="dashurl" value="products/prd_stats">
</article>
<script type="text/javascript">

    var table;
    $(document).on("click",'.cl-ck-f',function(ev){
        var sel=$(this).prop('checked');
        var id=$(this).data("id-producto");
        $.post(baseurl+"productos/prox_ped",{'sel':sel,'id':id},function(data){

        });
    });
    var prod_id=0;
    $(document).on("click",".btn-add-p",function(ev){
        ev.preventDefault();
        prod_id=$(this).data("id-producto");
        console.log(prod_id);
        $.post(baseurl+"productos/get_prod",{'id':prod_id},function(data){
            $("#nombre_producto").val(data.nombre);
            $("#cantidad").val(data.cantidad);
            $("#precio_fabrica").val(data.precio_fabrica);
            $("#precio_venta").val(data.precio_venta);
            $("#id_prod").val(prod_id);
            $("#modal-agregar-stock").modal("show");
        },'json');
        
    });
function calcular_precios(){
        var precio_caja=$("#precio_caja").val();
        var cantidad=$("#cantidad").val();
        var fabrica=precio_caja/cantidad;
        var precio_venta=((fabrica*20)/100)+fabrica;
        var ganancia =precio_venta-fabrica;
        $("#precio_fabrica").val(Math.round(fabrica));
        $("#precio_venta").val(Math.round(precio_venta));
        $("#ganancia").html("ganancia "+Math.round(ganancia));
    }
    $(document).ready(function () {
$("#clientes").select2();
        //datatables
        table = $('#productstable').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('welcome/load_list')?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [0], //first column / numbering column
                    "orderable": false, //set not orderable
                },
            ],

        });
        //miniDash();
    });

    function vender1(link){
       var id_pr=$(link).data("id-producto");
       var id_cl=$("#clientes").val();
        $.post(baseurl+"productos/vender1",{'id_pr':id_pr,'id_cl':id_cl},function(data){

                $("#notificaciones").html('<div id="notify1" class="alert alert-success" style="display:none;"><a href="#" class="close" data-dismiss="alert">&times;</a><div class="message"></div></div>');
                $("#notify1 .message").html("<strong>" + data.status + "</strong>: " + data.message);
                $("#notify1").removeClass("alert-danger").addClass("alert-success").fadeIn();
                $("html, body").scrollTop($("body").offset().top);
                $("#cantidad-id-"+id_pr).html(data.cantidad_producto);

        },"json");
    }
    function ocultar_precio_fabrica(){
            var mostrar_precio_fabrica=$("#mostrar_precio_fabrica").prop('checked');
            $.post(baseurl+"productos/desabilitar_precio_fabrica",{'mostrar_precio_fabrica':mostrar_precio_fabrica},function (){
                    location.reload();
            },"json");                        
    }
    $(document).on("submit","#data_form",function(e){
        e.preventDefault();
        var d1=$("#data_form").serialize();
        $.post(baseurl+"productos/editar",d1,function(data){
            if(data.status=="ok"){
                location.reload();
            }
        },'json');
    });
</script>
<div id="delete_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">borrar</h4>
            </div>
            <div class="modal-body">
                <p>borrar producto</p>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="object-id" value="">
                <input type="hidden" id="action-url" value="products/delete_i">
                <button type="button" data-dismiss="modal" class="btn btn-primary"
                        id="delete-confirm">Eliminar</button>
                <button type="button" data-dismiss="modal"
                        class="btn">cancelar</button>
            </div>
        </div>
    </div>
</div>
<div id="modal-agregar-stock" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h5>Editar Producto</h5>
                
            </div>

            <div class="modal-body">
                <form method="post" action="#" id="data_form" class="form-horizontal">

                

                <div class="form-group row">

                    <label class="col-sm-3 col-form-label" for="name">Nombre Producto</label>

                    <div class="col-sm-9">
                        <input type="text" placeholder="nombre_producto"
                               class="form-control margin-bottom  required" id="nombre_producto" name="nombre_producto">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="name">Cantidad</label>

                    <div class="col-sm-9">
                        <input type="text" placeholder="cantidad" id="cantidad" 
                               class="form-control margin-bottom  required" name="cantidad">
                    </div>
                    
                </div>
          
                
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="name">Precio Fabrica</label>

                    <div class="col-sm-9">
                        <input type="text" id="precio_fabrica" placeholder="precio_fabrica"
                               class="form-control margin-bottom  required" name="precio_fabrica">
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="name">Precio Venta</label>

                    <div class="col-sm-9">
                        <input type="text" id="precio_venta" placeholder="precio_venta"
                               class="form-control margin-bottom  required" name="precio_venta">
                    </div>
                    
                </div>
           
                


            


                    
                     

                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">Cerrar</button>
                        <input type="hidden" value="0" name="id_prod" id="id_prod">
                        <input type="submit" id="submit-data5" class="btn btn-success margin-bottom"
                               value="Guardar" >
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>