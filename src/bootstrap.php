<?php
require '../vendor/autoload.php';
function err(){
    require '../public/404.php';
    exit();
}

function dd (...$vars){
    foreach ($vars as $var) {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }
}




class Connexion
{
    private static $bdd ;
    private $conn;
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $name = 'calendar';

    private function __construct()
    {
        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=calendar','root','0000',[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public static function getConnect()
    {
        if (self::$bdd == null) {
            self::$bdd = new Connexion();
        }
        return self::$bdd;
    }

    public function getConnection() : PDO
    {
        return $this->conn;
    }

    public function __destruct()
    {
        self::$bdd = null;
    }
}

;


Connexion::getConnect();


function h(?string $value) : string{
    if($value === null){
        return '';
    }
    return htmlentities($value);
}

function render(string $view, $parameters = [] ){
    extract($parameters);
    include "../views/{$view}.php";
}