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
            <h5>Clientes</h5>
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
                                        <span>Clientes</span>
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
            <table id="table1" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                     <th>#</th>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>T. Doc.</th>
                    <th>N° Doc</th>
                    <th>Direccion</th>
                    <th>Correo</th>
                    <th>Celular 1</th>
                    <th>Celular 2</th>
                    <th>Celular 3</th>
                    <th>Acciones</th>
                    
                </tr>
                </thead>
                <tbody>
                </tbody>

                <tfoot>
                <tr>
                   <th>#</th>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>T. Doc.</th>
                    <th>N° Doc</th>
                    <th>Direccion</th>
                    <th>Correo</th>
                    <th>Celular 1</th>
                    <th>Celular 2</th>
                    <th>Celular 3</th>
                    <th>Acciones</th>
                </tr>
                </tfoot>
            </table>
        </div>
        
        
    </div>

    
</article>
<script type="text/javascript">

    var table;
    
    $(document).ready(function () {

        //datatables
        table = $('#table1').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('clientes/get_list_ajax')?>",
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

   
</script>
