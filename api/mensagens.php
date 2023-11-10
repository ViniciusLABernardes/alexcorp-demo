<?php

$connect=new mysqli($server, $user, $password, $name,); if ($connect->connect_error){ die("Connection failed: " . $connect->connect_error);} if ($_SERVER['REQUEST_METHOD']==='POST'){ $animeName=$_POST['animeName']; $nickname=$_POST['nickname']; $message=$_POST['message']; $userProfilePicForum=$_POST['userProfilePicForum']; $query="INSERT INTO anime_messages (anime_name, user_name, message_text) VALUES (?, ?, ?)"; $stmt=$connect->prepare($query); $stmt->bind_param("sss", $animeName, $nickname, $message); if ($stmt->execute()){ echo "Mensagem salva com sucesso!";} else{ echo "Erro ao salvar mensagem: " . $stmt->error;}} elseif ($_SERVER['REQUEST_METHOD']==='GET'){ $animeName=$_GET['animeName']; $query="SELECT Id, user_name, message_text, created_at, likes FROM anime_messages WHERE anime_name=? ORDER BY created_at ASC";
$stmt=$connect->prepare($query); if ($stmt){ if ($stmt->bind_param("s", $animeName)){ if ($stmt->execute()){ $result=$stmt->get_result(); $messages=array(); while ($row=$result->fetch_assoc()){ $message=array( 'Id'=>$row['Id'], 'user_profile_pic'=>'./assets/images/usericon.png', 'user_name'=>$row['user_name'], 'message_text'=>$row['message_text'], 'created_at'=>$row['created_at'], 'likes'=>$row['likes'], ); $messages[]=$message;} echo json_encode($messages);} else{ echo "Erro na execução da consulta: " . $stmt->error;} $stmt->close();} else{ echo "Erro na associação de parâmetros: " . $stmt->error;}} else{ echo "Erro na preparação da consulta: " . $connect->error;}}elseif ($_SERVER['REQUEST_METHOD']==='DELETE'){ $Id=$_GET['Id']; $query="DELETE FROM anime_messages WHERE Id=?"; $stmt=$connect->prepare($query); $stmt->bind_param("i", $Id); if ($stmt->execute()){ if ($stmt->affected_rows >0){ echo "Mensagem excluída com sucesso!";} else{ echo "Nenhuma mensagem encontrada com o ID fornecido.";}} else{ echo "Erro ao excluir mensagem: " . $stmt->error;}}
$connect->close(); ?>