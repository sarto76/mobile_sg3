<?php
class PagesController {
    public function home() {

        $msg= new Message();
        $mess=$msg->getMessagesByType(1);

       // echo "<pre>"; print_r($mess); echo "</pre>";
        $titolo_pagina="Cruscotto";
        require_once('views/home.php');
    }

    public function error() {
        $titolo_pagina="Error!";
        require_once('views/error.php');
    }

    public function show() {
        $titolo_pagina="Messaggi allievo";
        if (!isset($_GET['id']))
            return call('pages', 'error');

        // we use the given id to get the right post
        $messaggio = Message::find($_GET['id']);
        require_once('views/messages/show.php');
    }
}
?>