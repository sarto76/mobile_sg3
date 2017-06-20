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

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
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

                        <?php foreach ($this->allievi as $all):  ?>
                            <tr>
                                <td>
                                    <a href='?controller=members&action=manageMember&id=<?php echo $all->mem_id; ?>'/>
                                    <?php echo $all->mem_firstn." ".$all->mem_lastn;?> </td>
                                <td><?php echo getDayMonthNumYearByTs($all->mem_birthdate);?> </td>
                                <td><a href="tel:<?php echo $all->mem_mobile;?>"><?php echo $all->mem_mobile;?> </a></td>
                                <td><?php echo $all->mem_address.'<br>'.$all->mem_zip." ".$all->mem_city;?> </td>
                                <td><?php echo getLicenseTypeByNumber($all->mem_lic_cat);?> </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
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

