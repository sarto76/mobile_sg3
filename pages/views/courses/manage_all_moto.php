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
                    <li class="active"><a href="?controller=courses&action=manage_all_moto" data-toggle="tab">Iscrizioni</a>
                    </li>
                    <li><a href=?controller=courses&action=manage_moto" data-toggle="tab">Dettagli</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="mess">
                        <h4>
                            <?php
                            $numtot=new Setting();
                            $maxall=$numtot->getValueByName('mot_max');

                            echo 'Allievi ('.count($allievi).' su '.$maxall.')';
                            ?>
                        </h4>
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
                                    <td><?php echo getDayMonthNumByTs($corso->cou_ts_1); ?></td>
                                    <td><?php echo getDayMonthNumByTs($corso->cou_ts_2); ?></td>
                                    <td><?php echo getDayMonthNumByTs($corso->cou_ts_3); ?></td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (count($allievi) > 0) {
                                    $cont=1;
                                    foreach ($allievi as $applications) {

                                        $pagamento=Payment::getPaymentsByMemberAndCourseId($applications->app_member,$corso->cou_id);
                                        //print_r($pagamento);
                                        $membro=Member::find($applications->app_member);
                                        $membro_full= $membro->mem_firstn." ".$membro->mem_lastn;
                                        $instructor=Instructor::find($pagamento->pay_instructor);
                                        $checked1="";
                                        $checked2="";
                                        $checked3="";
                                        $amount_and_instructor=$pagamento->pay_amount.' '.$instructor->ins_init;

                                        //print_r($applications->getLessonPresenceByCourseAndMember(1,$applications->app_course,$membro->mem_id));
                                        if($applications->getLessonPresenceByCourseAndMember(1,$applications->app_course,$membro->mem_id)==1)
                                        {
                                            $checked1="checked";
                                        }
                                        if($applications->app_2nd == 1){
                                            $checked2="checked";
                                        }
                                        if($applications->app_3rd == 1){
                                            $checked3="checked";
                                        }
                                        //print_r('checked1= '.$checked1);

                                        ?>
                                        <tr class='odd gradeX'>
                                            <td><?php echo $cont;?></td>
                                            <td><?php echo "<a href='?controller=members&action=manage&id=" . $membro->mem_id . "'>" . $membro_full . "</td>
                                            <td>" . getLicenseTypeByNumber($membro->mem_lic_cat,1) . " </td>
                                            <td>" . $membro->mem_mobile . " </td>
                                             <td>" . $applications->app_notes . " </td>
                                              <td>
                                              <select>
                                              
                                 
                                              <option selected value='".$amount_and_instructor."'>$amount_and_instructor</option>
                                             
                                              
                                              </select>
                                               
                                              </td>
                                              <td><input type='checkbox' name='$applications->app_id' $checked1/></td>
                                              <td><input type='checkbox' name='$applications->app_id' $checked2/> </td>
                                              <td><input type='checkbox' name='$applications->app_id' $checked3/> </td>
                                              <td>
                                            
                                             
                                             
                                             <button type=\"button\" 
                                                data-toggle=\"modal\" data-target=\"#delMem\" data-id=\"". $applications->app_id."\">
                                                <i class=\"fa fa-trash\"></i>
                                                </button>
                                             
                                              </td> 
                                        </tr>";
                                         $cont++;
                                    }
                                }
                                else {
                                    echo "<tr class='odd gradeX'><td>Nessun allievo.</td><td></td><td><td></td><td></tr>";
                                }


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


<script src="../vendor/jquery/jquery.min.js"></script>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
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
            $("a[class=linkOk]").attr("href", '?controller=courses&action=deleteMemberFromCourse&app_id='+app_id)
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

