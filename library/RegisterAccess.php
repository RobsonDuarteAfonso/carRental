<?php

RequirePage::model('Log');

class RegisterAccess {

    static public function save(page) {

        $log = new Log;
        $log.address_ip = page;

        if (CheckSession::sessionAuth(false)) {
            $log.guest = 1;
        }

        

    }
}

?>