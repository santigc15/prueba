<?php
global $config;
$config = include('config.php');

class Database
{

    public $conn;


    public function __construct()
    {
        global $config;
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4";
        $user = $config['user'];
        $password = $config['password'];
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        );
        try {
            $this->conn = new PDO($dsn, $user, $password, $options);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function insertarlibro()
    {
        $sql = 'INSERT INTO libros (titulo, precio) VALUES (:titulo, :precio)';
        $stmt = $this->conn->prepare($sql);
        $titulo = $_POST['titulo'];
        $precio = $_POST['precio'];
        $stmt->bindparam(':titulo', $titulo);
        $stmt->bindparam(':precio', $precio);

        $stmt->execute();
    }

    public function listarLibros()
    {
        $sql = 'SELECT * FROM libros';
        $stmt = $this->conn->prepare($sql);


        $stmt->execute();
        $resultados = $stmt->fetchAll();

        return $resultados;
    }
}
