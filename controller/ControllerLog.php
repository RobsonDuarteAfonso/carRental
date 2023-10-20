<?php

RequirePage::model('Log');

class ControllerLog extends Controller {

    public function __construct() {
            
        CheckSession::sessionAuth();
    }        

    public function index() {
       
        CheckSession::checkAccessAdmin();
        $log = new Log;
        $select = $log->select(true, true);

        Twig::render('log/log-index.php', ['logs'=>$select]);
    }
}   
?>