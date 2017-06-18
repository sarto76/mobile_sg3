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
                    <li class="active"><a href="#gen" data-toggle="tab">Generalit&agrave;</a>
                    </li>
                    <li><a href="#mess" data-toggle="tab">Messaggi</a>
                    </li>
                    <li><a href="#iscriz" data-toggle="tab">Iscrizioni</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="mess">
                        <h4>Messaggi</h4>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Messaggio</th>
                                    <th>Inviato il</th>
                                    <th>Risolto</th>
                                    <th>Risposta</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr class='odd gradeX'>
                                    <td><?php echo $messaggio->msg_id . "</td><td>" . $messaggio->msg_text . " </td>
                                    <td> " . date('d-m-Y H:i:s', $messaggio->msg_ts). " </td>
                                    <td> " . $messaggio->msg_ins. " </td>
                                    <td> " . $messaggio->msg_type;
                                        "</td></tr>";





                                        ?>

                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
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
