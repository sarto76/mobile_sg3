
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $titolo_pagina; ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">

    <div class="col-lg-12">
        <?php echo $l_error;?>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">


                    <div class="col-lg-12">

                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <a style="cursor: pointer;" href='?controller=courses&action=addCourse&type=mot'><i class="fa fa-plus-circle"></i>
                                Nuovo corso
                                </a>


                            </div>

                        </div>




                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-mot">

                            <thead>
                            <tr>
                                <td>Lezione 1: </td>
                                <td>Iscritti: </td>
                                <td>Lezione 2: </td>
                                <td>Iscritti: </td>
                                <td>Lezione 3: </td>
                                <td>Iscritti: </td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
<?php
                            //print_r (count($corsi));

                            if (count($corsi) > 0) {
                            foreach ($corsi as $mm) {
                                $numtot=new Setting();
                                $maxall=$numtot->getValueByName('mot_max');
                                $lezioni=$mm->getLessons($mm->cou_id);
                                /*
                                echo"<pre>";
                                print_r($lezioni);
                                echo"</pre>";
                                */
                                echo "<tr class='odd gradeX'>";
                                foreach ($lezioni as $lez) {


                                    $data=date('d-m-Y', (float)$lez->les_ts);
                                    $ora=date('H:i', (float)$lez->les_ts);

                                    $ins=Instructor::find($lez->les_instructor)->ins_init;




                                    $num_all=Application::getMembersCountByLesson($lez->les_id);





                                    echo "
                                                <td><span style=\"display: none;\">". $lez->les_ts."</span> 
                                                    <a href='?controller=courses&action=manageMoto&id=" . $mm->cou_id . "'>" . $data . "
                                                    <div>".$ora."</div>
                                                    <div>".$ins."</div>
                                                </td>
                                                <td>" . $num_all."/".$maxall. " 
                                                </td>";

                                 }
                                    



                                               echo " <td>
                                                    <button type=\"button\"
                                                    data-toggle=\"modal\" data-target=\"#myModal\" data-id=\"". $mm->cou_id."\">
                                                    <i class=\"fa fa-trash\"></i>
                                                    </button>
                                                </td>
                                            </tr>";

                            }
                                    }
                                    else {
                                        echo "<tr class='odd gradeX'><td>Nessun corso presente.</td><td></td><td><td></td><td></tr>";
                                    }


 ?>
                            </tbody>
                        </table>

                    </div>
                    <!-- /.col-lg-6 -->

                </div>
                <!-- /.div row -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->


<script src="../vendor/jquery/jquery.min.js"></script>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {

        $('#dataTables-mot').DataTable({
            "columns":[
                {
                    "sortable": true
                },
                {
                    "sortable": true
                },
                {
                    "sortable": true
                },
                {
                    "sortable": true
                },
                {
                    "sortable": false
                }
            ]
        });



        var table=$('#dataTables-mot').DataTable();

        table
            .order( [ 1, 'desc' ] )
            .draw();

        //prendo i dati dal bottone e li passo al modale
        $('#myModal').on('shown.bs.modal', function (event) {
            //ricavo il bottone da cui ho fatto click
            var button = $(event.relatedTarget);
            //ricavo data-id del bottone
            var id = button.data('id');
            var modal = $(this);
            modal.find('.modal-title').text('Conferma eliminazione corso con id='+id);
            modal.find('.modal-body1').text('Sicuro di voler eliminare questo corso?');
            $("a[class=linkOk]").attr("href", '?controller=courses&action=deleteCourse&id='+id)
        })
    });
</script>





<!-- MODAL BEGIN -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body1">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annulla</button>
                <a class="linkOk">
                <button type="button" class="btn btn-primary">Elimina</button>
                </a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

