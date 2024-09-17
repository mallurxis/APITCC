<?php
 
class DbOperation
{
    
    private $con;
 
 
    function __construct()
    {
  
        require_once dirname(__FILE__) . '/DbConnect.php';
 
     
        $db = new DbConnect();
 

        $this->con = $db->connect();
    }
	
	
	function createAluno($rmAluno, $nomeAluno, $email, $senha, $modulo){
		$stmt = $this->con->prepare("INSERT INTO tbAlunos (rmAluno, nomeAluno, email, senha, modulo) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("ssis", $rmAluno, $nomeAluno, $email, $senha, $modulo);
		if($stmt->execute())
			return true; 			
		return false;
	}
	
	function getAlunos(){
		$stmt = $this->con->prepare("SELECT codAluno, rmAluno, nomeAluno, email, senha, modulo FROM tbAlunos");
		$stmt->execute();
		$stmt->bind_result($codAluno, $rmAluno, $nomeAluno, $email, $senha, $modulo);
		
		$tbAlunos = array(); 
		
		while($stmt->fetch()){
			$Aluno  = array();
			$Aluno['cod'] = $codAluno; 
			$Aluno['rm'] = $rmAluno; 
			$Aluno['nome'] = $nomeAluno; 
			$Aluno['email'] = $email; 
			$Aluno['senha'] = $senha; 
			$Aluno['modulo'] = $modulo; 

			array_push($tbAlunos, $Aluno); 
		}
		
		return $tbAlunos; 
	}
	
	
	function updateAluno ($codAluno, $rmAluno, $nomeAluno, $email, $senha, $modulo){
		$stmt = $this->con->prepare("UPDATE tbAlunos SET rm = ?, nome = ?, email = ?, senha = ?, modulo = ? WHERE cod = ?");
		$stmt->bind_param("ssisi", $rmAluno, $nomeAluno, $email, $senha, $modulo, $codAluno);
		if($stmt->execute())
			return true; 
		return false; 
	}
	
	
	function deleteAluno($codAluno){
		$stmt = $this->con->prepare("DELETE FROM tbAlunos WHERE cod = ? ");
		$stmt->bind_param("i", $codAluno);
		if($stmt->execute())
			return true; 
		return false; 
	}

	function createProf($nomePrf, $email, $senha){
		$stmt = $this->con->prepare("INSERT INTO tbAlunos (rmAluno, nomeAluno, email, senha, modulo) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("ssis", $rmAluno, $nomeAluno, $email, $senha, $modulo);
		if($stmt->execute())
			return true; 			
		return false;
	}
	
	function getAlunos(){
		$stmt = $this->con->prepare("SELECT codAluno, rmAluno, nomeAluno, email, senha, modulo FROM tbAlunos");
		$stmt->execute();
		$stmt->bind_result($codAluno, $rmAluno, $nomeAluno, $email, $senha, $modulo);
		
		$tbAlunos = array(); 
		
		while($stmt->fetch()){
			$Aluno  = array();
			$Aluno['cod'] = $codAluno; 
			$Aluno['rm'] = $rmAluno; 
			$Aluno['nome'] = $nomeAluno; 
			$Aluno['email'] = $email; 
			$Aluno['senha'] = $senha; 
			$Aluno['modulo'] = $modulo; 

			array_push($tbAlunos, $Aluno); 
		}
		
		return $tbAlunos; 
	}
	
	
	function updateAluno ($codAluno, $rmAluno, $nomeAluno, $email, $senha, $modulo){
		$stmt = $this->con->prepare("UPDATE tbAlunos SET rm = ?, nome = ?, email = ?, senha = ?, modulo = ? WHERE cod = ?");
		$stmt->bind_param("ssisi", $rmAluno, $nomeAluno, $email, $senha, $modulo, $codAluno);
		if($stmt->execute())
			return true; 
		return false; 
	}
	
	
	function deleteAluno($codAluno){
		$stmt = $this->con->prepare("DELETE FROM tbAlunos WHERE cod = ? ");
		$stmt->bind_param("i", $codAluno);
		if($stmt->execute())
			return true; 
		return false; 
	}
}