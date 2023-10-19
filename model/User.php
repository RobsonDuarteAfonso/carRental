<?php

    require_once('Crud.php');

    class User extends Crud {

        public $table = 'user';
        public $primaryKey = 'id';

        public $table2 = 'privilege';
        public $primaryKey2 = 'id';

        public $fillable = [
            'id',
            'name', 
            'email',
            'password',
            'address',
            'driver_license',
            'expiration_date',
            'privilege_id'
        ];

        public function checkUser($email, $password) {

            $sql = "SELECT * FROM $this->table WHERE email = ?";
            $stmt = $this->prepare($sql);
            $stmt->execute(array($email));
    
            $count = $stmt->rowCount();

            if ($count === 1) {

                $user = $stmt->fetch();

                var_dump($user);

                $options = [
                    'cost' => 10
                ];
    
                $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
               
                if (password_verify($password, $user['password'])) {

                    session_regenerate_id();
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_nom'] = $user['nom'];
                    $_SESSION['privilege'] = $user['privilege_id'];
                    $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);
                    return true;

                } else {

                    return false;
                }

            } else {

                return false;
            }
        }        
    }

?>