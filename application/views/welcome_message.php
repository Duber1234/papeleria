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
                                        <span>Total</span>
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
                    <th>foto</th>
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
                    <th>foto</th>
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

    $(document).ready(function () {

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

        $.post(baseurl+"productos/vender1",{'id_pr':id_pr},function(data){

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