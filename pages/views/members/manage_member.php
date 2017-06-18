

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
                <ul class="nav nav-tabs">
                    <li class="active"><a href="?controller=members&action=manageMember&id=<?php echo $this->member->mem_id; ?>">Generalit&agrave;</a>
                    </li>
                    <li> <a href="?controller=members&action=showMessages&id=<?php echo $this->member->mem_id; ?>">Messaggi</a>

                    </li>
                    <li><a href="?controller=members&action=showInscriptions&id=<?php echo $this->member->mem_id; ?>">Iscrizioni</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="mess">
                        <div class="row">
                            <form role="form" method="POST" action='?controller=members&action=updateMember&id=<?php echo $this->member->mem_id; ?>'>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>

                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label>Cognome</label>
                                                    <input type="hidden" id="id" name="id" class="form-control" value="<?php echo $this->member->mem_id?>">
                                                    <input id="cognome" name="cognome" class="form-control" value="<?php echo $this->member->mem_lastn?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nome</label>
                                                    <input id="nome" name="nome" class="form-control" value="<?php echo $this->member->mem_firstn?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Titolo</label>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="tit" id="0" value="0" <?php echo ($this->member->mem_title=='0')?'checked':'' ?>>Nessuno
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="tit" id="1" value="1" <?php echo ($this->member->mem_title=='1')?'checked':'' ?>>Sig.
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="tit" id="2" value="3" <?php echo ($this->member->mem_title=='3')?'checked':'' ?>>Sig.ra
                                                        </label>
                                                    </div>
                                                </div>
                                                <div>
                                                    <label>Data di nascita</label>
                                                    <input type="date" name="nas" id="nas" value="<?php echo date('Y-m-d', intval($this->member->mem_birthdate)); ?>"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Indirizzo</label>
                                                    <input id="indirizzo" name="indirizzo" class="form-control" value="<?php echo $this->member->mem_address?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>CAP</label>
                                                    <input id="cap" name="cap" class="form-control" value="<?php echo $this->member->mem_zip?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Localit&agrave;</label>
                                                    <input id="citta" name="citta" class="form-control" value="<?php echo $this->member->mem_city?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Cellulare</label>
                                                    <input id="cell" name="cell" class="form-control" value="<?php echo $this->member->mem_mobile?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Telefono casa</label>
                                                    <input id="telcas" name="telcas" class="form-control" value="<?php echo $this->member->mem_phone?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>e-mail</label>
                                                    <input id="email" name="email" class="form-control" value="<?php echo $this->member->mem_email?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Categoria Patentino</label>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="cat" id="0" value="1" <?php echo ($this->member->mem_lic_cat=='1')?'checked':'' ?>>Nessuna
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="cat" id="0" value="2" <?php echo ($this->member->mem_lic_cat=='2')?'checked':'' ?>>B
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="cat" id="0" value="3" <?php echo ($this->member->mem_lic_cat=='3')?'checked':'' ?>>A
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="cat" id="0" value="5" <?php echo ($this->member->mem_lic_cat=='5')?'checked':'' ?>>A(Passaggio da A1)
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="cat" id="0" value="4" <?php echo ($this->member->mem_lic_cat=='4')?'checked':'' ?>>A1
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div>
                                                        <label>Data di rilascio</label>
                                                        <input type="date" name="ril" id="ril" value="<?php echo date('Y-m-d', intval($this->member->mem_lic_ts)); ?>"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>NIP</label>
                                                    <input id="nip" name="nip" class="form-control" value="<?php echo $this->member->mem_lic_pin?>">
                                                </div>

                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                    <div class="panel-body">
                                        <button type="submit" class="btn btn-default" id="modifica" name="modifica">Modifica
                                        </button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </div>
                            </form>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
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
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });



    function InitializeDate() {
        $('#nas').datepicker();
        // $('#nas').datepicker('setDate', ToDate);
        // $( "#nas" ).datepicker( "option", "dateFormat", "dd-mm-yyyy" );
    }


    // InitializeDate();
</script>







