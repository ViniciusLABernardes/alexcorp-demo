<?php $server="localhost";
$user='root';
$password="Vinileandro0807200323!";
$name='animesite';
$port=3308; $connect=new mysqli($server, $user, $password, $name, $port); if ($connect->connect_error){ die("Connection failed: " . $connect->connect_error);} if ($_SERVER['REQUEST_METHOD']==='GET' && isset($_GET['mostLiked']) && $_GET['mostLiked']==='true'){ $query="SELECT Id, user_name, message_text, created_at, likes FROM anime_messages ORDER BY likes DESC LIMIT 5"; $stmt=$connect->prepare($query); if ($stmt){ if ($stmt->execute()){ $result=$stmt->get_result(); $messages=array(); while ($row=$result->fetch_assoc()){ $message=array( 'Id'=>$row['Id'], 'user_name'=>$row['user_name'], 'user_profile_pic'=>'./assets/images/usericon.png', 'message_text'=>$row['message_text'], 'created_at'=>$row['created_at'], 'likes'=>$row['likes'], ); $messages[]=$message;} header('Content-Type: application/json'); echo json_encode($messages);} else{ echo "Erro na execução da consulta: " . $stmt->error;} $stmt->close();} else{ echo "Erro na preparação da consulta: " . $connect->error;}} $connect->close();
?>