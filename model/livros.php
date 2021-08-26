<?
class Livros{
   private $con;
   
   public function __construct(){
      $this->$con = new PDO($_ENV["CONECT_STRING"],$_ENV["USER"],$_ENV["PASS"]);      
   }
   public function getAll(){
      $response = $this->con->query("SELECT (a.nome,l.titulo,l.valor,l.id) FROM livros as l JOIN autor as a;");
      return $response;
   }
   public function getOne($i){
      $prepare = $this->con->prepare("SELECT (a.nome,l.titulo,l.valor) FROM livros as l JOIN autor as a WHERE l.id = :i;");
      $prepare->bindParam(':i', $i, PDO::PARAM_STR);
      $response = $prepare->execute();
      return $response;
   }
}
?>