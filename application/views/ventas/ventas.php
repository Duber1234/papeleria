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
                    <th>fecha</th>
                     
                    <th>cantidad</th>
                    <th>id producto</th>
                    <th>nombre</th>
                    <th>precio fabria</th>
                    <th>precio_venta</th>
                    <th>ganancia</th>
                    
                </tr>
                </thead>
                <tbody>
                </tbody>

                <tfoot>
                <tr>
                
                    <th>fecha</th>
                    
                    <th>cantidad</th>
                    <th>id producto</th>
                    <th>nombre</th>
                    <th>precio fabria</th>
                    <th>precio_venta</th>
                    <th>ganancia</th>
                </tr>
                </tfoot>
            </table>
        </div>
       
        
    </div>

    
</article>

<script type="text/javascript">
    $(document).ready(function () {

        //datatables
        table = $('#productstable').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('ventas/load_list')?>",
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