<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $titolo_pagina; ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">

    <div class="col-lg-12">
        <div class="panel panel-default">

            <div class="panel-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li><a href="?controller=pages&action=home">Messaggi</a>
                    </li>
                    <li class="active"><a href="?controller=instructors&action=show">Profilo</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="profilo">
                        <h4>Profilo</h4>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <tr>
                                            <td>Nome e cognome: </td>
                                            <td><?php echo $istruttore->ins_firstn." ".$istruttore->ins_lastn;?> </td>
                                        </tr>
                                        <tr class='odd gradeX'>
                                            <td>Iniziali: </td>
                                            <td><?php echo $istruttore->ins_init;?> </td>
                                        </tr>
                                        <tr class='odd gradeX'>
                                            <td>Telefono: </td>
                                            <td><?php echo $istruttore->ins_mobile;?> </td>
                                        </tr>
                                        <tr class='odd gradeX'>
                                            <td>E-mail: </td>
                                            <td><?php echo $istruttore->ins_email;?> </td>
                                        </tr>
                                    </table>

                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-6">
                                    <form role="form" method="POST" action="?controller=instructors&action=changePass" >
                                        <div class="form-group">
                                            <label>Nuova Password:</label>
                                            <input class="form-control" type="password" id="new_pass" name="new_pass">
                                        </div>

                                        <div class="form-group">
                                            <label>Ripeti Password:</label>
                                            <input class="form-control" type="password" id="rep_pass" name="rep_pass">
                                            <?php echo $l_error; ?>
                                        </div>
                                        <div class="panel-body">
                                                <button type="submit" class="btn btn-info btn-circle"><i class="fa fa-check"></i>
                                                </button>
                                            <button type="reset" class="btn btn-warning btn-circle"><i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </form>
                                    <!-- /.role-form -->
                                </div>
                                <!-- /.col-lg-6 -->
                            </div>
                            <!-- /.div row -->
                        </div>
                        <!-- /.panel-body -->



                    </div>
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
