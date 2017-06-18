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
                    <li class="active"><a href="?controller=pages&action=home">Messaggi</a>
                    </li>
                    <li><a href="?controller=instructors&action=show">Profilo</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="messaggi">
                        <h4>Messaggi</h4>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Allievo</th>
                                    <th>Messaggio</th>
                                    <th>Inviato il</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (count($mess) > 0) {
                                    foreach ($mess as $mm) {
                                $membro=Member::find($mm->msg_id);
                                $membro_full= $membro->mem_firstn." ".$membro->mem_lastn;

                                        ?>
                                    <tr class='odd gradeX'>
                                        <td><?php echo "<a href='?controller=pages&action=show&id=" . $mm->msg_id . "'>" . $membro_full . "</td><td>" . $mm->msg_text . " </td><td> " . date('d-m-Y H:i:s', $mm->msg_ts);
                                            "</td></tr>";
                                    }
                                }
                                else {
                                    echo "<tr class='odd gradeX'><td>Nessun messaggio irrisolto.</td><td></td><td><td></td><td></tr>";
                                }


                                ?>

                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->



                    </div>
                    <div class="tab-pane fade" id="profilo">
                        <h4>Profilo</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <div class="tab-pane fade" id="messages">
                        <h4>Messages Tab</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <div class="tab-pane fade" id="settings">
                        <h4>Settings Tab</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
