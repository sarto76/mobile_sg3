<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="../vendor/bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $titolo_pagina; ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">

    <div class="col-lg-12">
        <?php echo $this->l_error;?>
        <div class="panel panel-default">

            <div class="panel-body">
                <!-- Nav tabs -->
                <form role="form" method="POST" action='?controller=courses&action=addCourse'>
                    <div class="col-lg-6">
                        <table width="100%" class="table table-striped table-bordered table-hover">
                            <tr>
                                <input type="hidden" id="type" value="<?php echo $this->getTipo(); ?>" name="type"/>
                                <?php for($lez=1;$lez<$this->lezioni+1;$lez++):  ?>

                                <td>Data lezione <?php echo $lez; ?>: </td>

                                <td>
                                    <div class="form-group">
                                        <div id="datetimepicker14" class="input-group date form_datetime " data-date-format="dd-mm-yyyy hh:ii" data-link-field="data<?php echo $lez;?>">
                                            <input class="form-control" type="text" value="" readonly name="data<?php echo $lez;?>">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>

                                        </div>

                                    </div>
                                </td>
                                <td>

                                    <select name="ins<?php echo $lez;?>" class="form-control">
                                        <?php foreach ($this->istruttori as $ist):  ?>
                                        <option value='<?php echo $ist->ins_id; ?>'><?php echo $ist->ins_firstn; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                                <?php endfor; ?>

                            <tr>
                                <td>Stato iscrizioni: </td>
                                <td colspan="2">
                                    <div class="form-group">

                                        <label class="radio-inline">
                                            <input type="radio" name="iscrizioni" id="optionsRadiosInline1" value="1" checked>Aperte
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="iscrizioni" id="optionsRadiosInline2" value="2" >Chiuse
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="iscrizioni" id="optionsRadiosInline3" value="3" >Invisibili
                                        </label>
                                    </div>
                                </td>
                            </tr>

                        </table>

                        <div class="panel-body">
                            <button type="submit" class="btn btn-default" id="inserisci" name="inserisci">Inserisci
                            </button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                </form>

            </div>
            <!-- /.col-lg-6 -->

        </div>
        <!-- /.panel-body -->
    </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<script src="../vendor/jquery/jquery.min.js"></script>

<script type="text/javascript" src="../vendor/bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="../vendor/bootstrap/js/locales/bootstrap-datetimepicker.it.js" charset="UTF-8"></script>




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