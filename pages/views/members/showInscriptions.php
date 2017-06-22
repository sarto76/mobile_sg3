
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


                    <div class="col-lg-6">

                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <b>Corsi disponibili</b>


                            </div>

                        </div>




                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-mot">




                            <?php
                            if (count($corsi) > 0):
                            foreach ($corsi as $mm):

                            $maxall=$numtot->getValueByName($mm->cou_type."_max");
                            $this->lezioni = $mm->lessons;

                            //echo"<pre>";
                            //print_r("aa".Course::hasFreePlaces($mm->cou_id));
                            //echo"</pre>";

                            ?>

                            <?php if(Course::hasFreePlaces($mm->cou_id)): ?>
                            <thead>

                            <!--
                                        <tr>

                                            <td><b>Tipo</b></td>
                                            <?php //for ($i=1;$i<count($this->lezioni)+1;$i++): ?>
                                                <?php //if(Lesson::hasFreePlaces($this->lezioni[$i-1]->les_id)): ?>
                                                    <td><b>Lez <?php //echo $i ?> </b></td>
                                                <?php //endif ?>
                                            <?php //endfor; ?>
                                        </tr>
                                        -->

                            </thead>
                            <tbody>

                            <tr class='odd gradeX'>
                                <td> <?php echo $mm->cou_type?></td>
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
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </tr>
                            <?php endif; ?>

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
                <div class="row">


                    <div class="col-lg-12">

                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <b>Iscrizioni</b>
                            </div>
                        </div>




                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-mot">




                            <?php
                            if (count($corsi) > 0):
                            foreach ($corsi as $mm):

                            $maxall=$numtot->getValueByName($mm->cou_type."_max");
                            $this->lezioni = $mm->lessons;

                            //echo"<pre>";
                            //print_r("aa".Course::hasFreePlaces($mm->cou_id));
                            //echo"</pre>";

                            ?>

                            <?php if(Course::hasFreePlaces($mm->cou_id)): ?>
                            <thead>

                            <!--
                                        <tr>

                                            <td><b>Tipo</b></td>
                                            <?php //for ($i=1;$i<count($this->lezioni)+1;$i++): ?>
                                                <?php //if(Lesson::hasFreePlaces($this->lezioni[$i-1]->les_id)): ?>
                                                    <td><b>Lez <?php //echo $i ?> </b></td>
                                                <?php //endif ?>
                                            <?php //endfor; ?>
                                        </tr>
                                        -->

                            </thead>
                            <tbody>

                            <tr class='odd gradeX'>
                                <td> <?php echo ($mm->cou_type)?></td>
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
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </tr>
                            <?php endif; ?>

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
            "responsive": true,
            "ordering": false,
            "searching": false
        } );

    });
</script>





