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
                <form role="form" method="POST" action='?controller=courses&action=updateLesson&id=<?php echo $this->lesson->les_id; ?>'>
                <table width="100%" class="table table-striped table-bordered table-hover table-responsive">
                    <tr>


                        <td>Modifica data lezione: </td>

                        <td>
                            <div class="form-group">
                                <input type="hidden" id="id" name="id" class="form-control" value="<?php echo $this->lesson->les_id; ?>">
                                <div id="datetimepicker14" class="input-group date form_datetime " data-date-format="dd-mm-yyyy hh:ii" data-link-field="dataLez">
                                    <input id="valData" class="form-control" type="text" value="" readonly name="dataLez">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>

                                </div>

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Modifica docente: </td>
                        <td>

                            <select name="instructor" class="form-control">
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
                                    <input type="radio" name="iscrizioni" id="optionsRadiosInline1" value="1" <?php echo ($this->lesson->les_status=='1')?'checked':'' ?>>Aperte
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="iscrizioni" id="optionsRadiosInline2" value="2" <?php echo ($this->lesson->les_status=='2')?'checked':'' ?>>Chiuse
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="iscrizioni" id="optionsRadiosInline3" value="3" <?php echo ($this->lesson->les_status=='3')?'checked':'' ?>>Invisibili
                                </label>
                            </div>





                        </td>
                    </tr>


                </table>
                <button type="submit" class="btn btn-default" id="modifica" name="modifica">Modifica
                </button>
                <button type="reset" class="btn btn-default">Reset</button>
                </form>

            </div>
            <!-- /.panel-body -->
            <div class="panel-body">

                <div class="row">
                    <div class="col-lg-12">
                        <h4>
                            <?php
                            $numtot=new Setting();
                            $maxall=$numtot->getValueByName('mot_max');

                            echo 'Allievi ('.count($allievi).' su '.$maxall.')';
                            ?>
                        </h4>

                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover table-responsive">
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

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Aggiungi allievo alla lezione</h4>

                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="searchall">
                                <thead>
                                <tr>
                                    <td>Nome e Cognome</td>
                                    <td>Data di Nascita</td>
                                    <td>Telefono</td>
                                    <td>Domicilio</td>
                                    <td>Patentino</td>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($this->allAllievi as $all):  ?>
                                    <tr>
                                        <td>
                                            <a href='?controller=courses&action=addMemberToLesson&id=<?php echo $all->mem_id; ?>&les_id=<?php echo $lesson_id; ?>'/>
                                            <?php echo $all->mem_firstn." ".$all->mem_lastn;?> </td>
                                        <td><?php echo getDayMonthNumYearByTs($all->mem_birthdate);?> </td>
                                        <td><?php echo $all->mem_mobile;?> </td>
                                        <td><?php echo $all->mem_address.'<br>'.$all->mem_zip." ".$all->mem_city;?> </td>
                                        <td><?php echo getLicenseTypeByNumber($all->mem_lic_cat);?> </td>
                                    </tr>
                                <?php endforeach; ?>
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
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->



<script>
    $(document).ready(function() {

        var dataAtt = '<?php echo date('d-m-Y H:i',$this->lesson->les_ts); ?>';
        $('#valData').val(dataAtt);

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
        });

        $('#searchall').DataTable( {
            "lengthMenu": [[3,6,-1], [3,6,"All"]],
            "paging":   true,
            "ordering": true,
            "info":     false,
            "pagingType": "simple_numbers"
        } );




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

    $('#datetimepicker14').datetimepicker({
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