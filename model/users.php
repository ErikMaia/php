<?
// criptografar na senha se tiver tempo
class User{
   private $con;
   
   public function __construct(){
      $this->$con = new PDO($_ENV["CONECT_STRING"],$_ENV["USER"],$_ENV["PASS"]);      
   }
   public function create($user,$email,$pass){
      $prepare = $this->con->prepare("INSERT INTO users('username','email','password') VALUES(:users,:email,:pass");
      $prepare->bindParam(":users",$user);
      $prepare->bindParam(":email",$email);
      $prepare->bindParam(":pass",$pass);
      $response = $prepare->execute();
      return $response;
   }
   public function getOne($email, $pass){
      $prepare = $this->con->prepare("SELECT ('id','username','email','password') FROM users WHERE 'email' = :email AND 'password' = :pass");
      $prepare->bindParam(':email', $email, PDO::PARAM_STR);
      $prepare->bindParam(':pass', $pass, PDO::PARAM_STR);
      $response = $prepare->execute();
      return $response;
   }
}
?>