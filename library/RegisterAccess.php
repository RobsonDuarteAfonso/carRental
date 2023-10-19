<?php

RequirePage::model('Log');

class RegisterAccess {

    static public function save($page) {

        $log = new Log;

        $data = [
            'address_ip' => $_SERVER['REMOTE_ADDR'],
            'guest',
            'user_id',
            'page_visited' => $page
        ];

        if (CheckSession::sessionAuth(false)) {
            $data['guest'] = 0;
            $data['user_id'] = $_SESSION['user_id'];
        }

        $log->insert($data);

    }
}

?>