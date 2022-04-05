<?php 
class User{
    public $id;
    public $name;
    public $email;
    public $pass;
    function __construct($id, $name, $email, $pass) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->pass = $pass;
    }
    function create(){
        $db = new Database();
        try{
            $stmt = $db->conn->prepare("INSERT INTO users (name, email, pass)
            VALUES (:name, :email, :pass)");
            $stmt->bindParam(':name' , $this->name);
            $stmt->bindParam(':email' , $this->email);
            $stmt->bindParam(':pass' , $this->pass);
            $stmt->execute();
            echo "Cadastrado com sucesso";
        }
        catch(PDOException $e){
            $result['message'] = "Error Select All User: " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }
    function delete(){
            $db = new Database(); 
            try{
                $stmt = $db->conn->prepare("DELETE FROM users WHERE id = :id;");
                $stmt->bindParam(':id', $this->id);
                $stmt->execute();
                echo "Deletado com sucesso";
            }
            catch(PDOException $e){
            $result['message'] = "Error Select All User: " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
            }
    }
    function update(){
        $db = new Database(); 
        try{
            $stmt = $db->conn->prepare("UPDATE users SET  name = :name, email = :email, pass = :pass WHERE id = :id;");
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':pass', $this->pass);
            $stmt->execute();
            echo "Modificado com sucesso";
        }
        catch(PDOException $e){
            $result['message'] = "Error Select All User: " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }   
    }
    function selectAll(){
        $db = new Database(); 
        try{
            $stmt = $db->conn->prepare("SELECT * FROM users");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
           $response = new Output();
           $response->out($result);
        }
        catch(PDOException $e){
            $result['message'] = "Error Select All User: " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }   
    }
    function selectByid(){
        $db = new Database(); 
        try{
            $stmt = $db->conn->prepare("SELECT * FROM users WHERE id = :id;");
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            print_r($result);
            echo "Selecionado o usuário com sucesso";
        }
        catch(PDOException $e){
            $result['message'] = "Error Select All User: " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }   
    }
}
?>