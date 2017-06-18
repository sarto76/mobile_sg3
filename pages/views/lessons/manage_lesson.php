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
                <table width="100%" class="table table-striped table-bordered table-hover">
                    <tr>


                        <td>Modifica data lezione: </td>

                        <td>
                            <div class="form-group">
                                <div id="datetimepicker2" class="input-group date form_datetime " data-date-format="dd-mm-yyyy hh:ii" data-link-field="data<?php echo $this->lesson->les_number;?>">
                                    <input class="form-control" type="text" value="" readonly name="data<?php echo $this->lesson->les_number;?>">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>

                                </div>

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Modifica docente: </td>
                        <td>

                            <select name="ins<?php echo $this->lesson->les_number;?>" class="form-control">
                                <?php foreach ($this->istruttori as $ist):  ?>
                                    <option value='<?php echo $ist->ins_id."'
                                    ".($ist->ins_id==$this->istruttore->ins_id?'selected="selected"':"")   ?>'><?php echo $ist->ins_firstn; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Stato iscrizioni: </td>
                        <td>

                            <div class="form-group">

                                <label class="radio-inline">
                                    <input type="radio" name="iscrizioni" id="optionsRadiosInline1" value="aperte" <?php echo ($course->cou_status=='1')?'checked':'' ?>>Aperte
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="iscrizioni" id="optionsRadiosInline2" value="chiuse" <?php echo ($course->cou_status=='2')?'checked':'' ?>>Chiuse
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="iscrizioni" id="optionsRadiosInline3" value="invisibili" <?php echo ($course->cou_status=='3')?'checked':'' ?>>Invisibili
                                </label>
                            </div>





                        </td>
                    </tr>


                </table>


                <div class="row">
                    <div class="col-lg-12">
                        <h4>
                            <?php
                            $numtot=new Setting();
                            $maxall=$numtot->getValueByName('mot_max');

                            echo 'Allievi ('.count($allievi).' su '.$maxall.')';
                            ?>
                        </h4>
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <a style="cursor: pointer;" href='?controller=courses&action=addMember&lesson=<?php echo $this->lesson->les_id; ?>'><i class="fa fa-plus-circle"></i>
                                    Aggiungi allievo
                                </a>


                            </div>

                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Allievo</td>
                                    <td>Cat</td>
                                    <td>Telefono</td>
                                    <td>Osservazioni</td>
                                    <td>Pagamenti</td>

                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (count($allievi) > 0):
                                    $cont=1;
                                    foreach ($allievi as $all):
                                        $app=Application::getApplicationByLessonAndMember($lesson_id,$all->mem_id);
                                        $pagamento=Payment::getPaymentsByMemberAndCourseId($all->mem_id,$this->lesson->les_course);
                                        //print_r($pagamento);
                                        //$membro=Member::find($applications->app_member);
                                        $membro_full= $all->mem_firstn." ".$all->mem_lastn;
                                        $instructor=Instructor::find($pagamento->pay_instructor);
                                        $instructor=Instructor::find($pagamento->pay_instructor);
                                        $amount_and_instructor=$pagamento->pay_amount.' '.$instructor->ins_init;

                                        //print_r($applications->getLessonPresenceByCourseAndMember(1,$applications->app_course,$membro->mem_id));

                                        //print_r('$amount_and_instructor= '.$amount_and_instructor);
                                 ?>
                                        <tr class='odd gradeX'>
                                            <td><?php echo $cont;?></td>
                                            <td><a href='?controller=members&action=manageMember&id=<?php echo $all->mem_id ?>'> <?php echo $membro_full ?></td>
                                            <td><?php echo getLicenseTypeByNumber($all->mem_lic_cat,1) ?></td>
                                            <td><?php echo$all->mem_mobile ?></td>
                                            <td><?php echo $app->app_notes ?></td>
                                            <td>
                                                <select>
                                                    <option selected value='<?php echo $amount_and_instructor?>'><?php echo $amount_and_instructor ?></option>
                                                </select>

                                            </td>
                                            <td>
                                                <button type="button"
                                                        data-toggle="modal" data-target="#delMem" data-id="<?php echo $app->app_id ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php $cont++; ?>

                                    <?php endforeach ?>
                                <?php else:      ?>
                                    <tr class='odd gradeX'><td>Nessun allievo.</td><td></td><td><td></td><td></tr>

                                <?php endif ?>




                                </tbody>
                            </table>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->



                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->



<script>
    $(document).ready(function() {
        //prendo i dati dal bottone e li passo al modale
        $('#delMem').on('shown.bs.modal', function (event) {
            //ricavo il bottone da cui ho fatto click
            var button = $(event.relatedTarget);
            //ricavo data-id del bottone
            var app_id = button.data('id');
            var modal = $(this);
            modal.find('.modal-title').text('Conferma eliminazione allievo con id='+app_id);
            modal.find('.modal-body1').text('Sicuro di voler eliminare questo allievo?');
            $("a[class=linkOk]").attr("href", '?controller=courses&action=deleteMemberFromApplication&app_id='+app_id)
        })
    });
</script>





<!-- MODAL BEGIN -->

<div class="modal fade" id="delMem" tabindex="-1" role="dialog">
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




<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        language:  'it',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });










</script>