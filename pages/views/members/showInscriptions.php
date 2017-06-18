
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $titolo_pagina ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">

    <div class="col-lg-12">
        <?php echo $this->l_error?>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">


                    <div class="col-lg-12">

                        <div class="panel panel-yellow">
                            <div class="panel-heading">



                            </div>

                        </div>




                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-mot">




                            <?php
                            if (count($corsi) > 0):
                                foreach ($corsi as $mm):

                                    $maxall=$numtot->getValueByName($mm->cou_type."_max");
                                    $this->lezioni = $mm->lessons;
                                    /*
                                    echo"<pre>";
                                    print_r($lezioni);
                                    echo"</pre>";
                                    */
                                    ?>
                            <thead>
                            <tr>

                                <td>Tipo</td>
                                <?php for ($i=1;$i<count($this->lezioni)+1;$i++): ?>
                                    <?php if(Lesson::hasFreePlaces($this->lezioni[$i-1]->les_id)): ?>
                                    <td colspan="2">Lez <?php echo $i ?> </td>
                                    <?php endif ?>
                                <?php endfor; ?>
                            </tr>
                            </thead>
                            <tbody>

                                    <tr class='odd gradeX'>
                                        <td> <?php echo getCourseTypeByInitials($mm->cou_type)?></td>
                                        <?php foreach ($this->lezioni as $lez):
                                        $data=date('d-m-Y', (float)$lez->les_ts);
                                        $ora=date('H:i', (float)$lez->les_ts);
                                        $ins=Instructor::find($lez->les_instructor)->ins_init;
                                        $num_all=Application::getMembersCountByLesson($lez->les_id);
                                        ?>
                                        <?php if(Lesson::hasFreePlaces($lez->les_id)): ?>
                                        <td><span style="display: none;"><?php echo '$lez->les_ts' ?></span>
                                            <a href='?controller=courses&action=manageLesson&id=<?php echo $lez->les_id?>'>
                                                <?php echo $data?>
                                                <div><?php echo $ora?></div>
                                        </td>
                                        <td><?php echo $num_all."/".$maxall?>
                                        </td>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach ?>
                            <?php else:      ?>
                                <tr class='odd gradeX'><td>Nessun corso Programmato.</td><td></td><td><td></td><td></tr>

                            <?php endif ?>

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



<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        //conto quante colonne ci sono nella tabella
        var ultima =$('#dataTables-mot').find("tr:first td").length-1;


        //setto non ordinabile l'ultima e la setto al 10%
        $('#dataTables-mot').dataTable( {

            "columnDefs": [
                { "orderable": false, "targets": +ultima },
                { "width": "10%", "targets":  +ultima }
            ],
            responsive: true
        } );




        var table=$('#dataTables-mot').DataTable();

        table
            .order( [ 0, 'desc' ] )
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

