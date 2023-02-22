<?php

namespace helper;

class Admin
{
    private ?int $id;
    private ?string $email;
    private ?string $type;

    private static ?Admin $admin=null;

    /**
     * @param string|null $email
     * @param string|null $type
     * @param int|null $id
     */

    protected function __construct(?string $email, ?string $type, ?int $id=null)
    {
        $this->email = $email;
        $this->type = $type;
        $this->id = $id;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    public function getnav(){
        return [ "Įmonė"=>"index.php",
                 "Svečias"=>"customers.php" ];
    }

    private static function createAdmin():Admin{
        if ($_SESSION['user']['type'] == "superAdmin"){
            return new SuperAdmin( $_SESSION['user']['email'],  $_SESSION['user']['type'],  $_SESSION['user']['id']);
        }else{
            return new Admin( $_SESSION['user']['email'],  $_SESSION['user']['type'],  $_SESSION['user']['id']);
        }
    }

    public static function login(string $email, string $password):?Admin{
        $pdo=DB::getDB();
        $stm=$pdo->prepare("SELECT * FROM user WHERE email=?");
        $stm->execute([$email]);
        $user=$stm->fetch(\PDO::FETCH_ASSOC);
        if ($user==null){
            return null;
        }
        if (password_verify($password, $user['password'])){
            $_SESSION['user']['email']=$user['email'];
            $_SESSION['user']['type']=$user['type'];
            $_SESSION['user']['id']=$user['id'];
            return self::createAdmin();
        }else{
            return null;
        }
    }

    public static function loginVerify(){
        if (isset($_SESSION['user'])){
            self::$admin=self::createAdmin();
        }else{
            header("location:http://localhost/objektinisProg/login.php");
            die();
        }
    }

    public function __toString(): string
    {
        return $this->email;
    }
    public static function getAdmin():?Admin{
        if (self::$admin=null){
            self::loginVerify();
        }
        return self::$admin;
    }

    public static function isLogin(){
        return isset($_SESSION['user']);
    }

    public static function logout(){
        session_destroy();
        header("location: http://localhost/objektinisProg/login.php");
        die();
    }
}
