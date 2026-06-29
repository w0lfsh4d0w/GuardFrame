<?php
require_once __DIR__ . '/../Core/Model.php';

class User extends Model
{
    public function findByEmail($email)
    {
        $query = 'select * from users where email = :email';
        $stm = $this->pdo->prepare($query);
        $stm->execute([':email' => $email]);
        return $stm->fetch();
    }

    public function createUser($username , $email ,$password )
    {
        $query = 'Insert Into users  (username , email , password) 
        Values (:username , :email, :password)';
        $stm = $this->pdo->prepare($query);
        $stm->execute([':username' => $username , ':email' => $email, ':password' => $password]);
       
         return $this->pdo->lastInsertId();
    }
    public function findRole($email)
    {
        $query = 'select role from users where email = :email';
        $stm = $this->pdo->prepare($query);
        $stm->execute([':email' => $email]);
        return $stm->fetch();   
    }
}
