<?php

$connect=mysqli_connect($server, $user, $password, $name, ); if (!$connect){ die("Connection failed: " . mysqli_connect_error());}
error_log("Início do script", 0);
if (isset($_POST['email_or_username'], $_POST['password'])){ $emailOrUsername=$_POST['email_or_username']; $userPassword=$_POST['password']; $checkQuery="SELECT * FROM cadastro WHERE Email='$emailOrUsername' OR UserName='$emailOrUsername'"; $result=mysqli_query($connect, $checkQuery); if (mysqli_num_rows($result) >0){ $row=mysqli_fetch_assoc($result); $hashedPasswordInDB=$row['Senha']; if (password_verify($userPassword, $hashedPasswordInDB)){ $username=$row['UserName']; $response=array("status"=>"success", "message"=>"Login bem-sucedido!", "username"=>$username); echo json_encode($response); $_SESSION['username']=$username;} else{ $response=array("status"=>"error", "message"=>"Senha incorreta!"); echo json_encode($response);}} else{ $response=array("status"=>"error", "message"=>"E-mail ou Nome de Usuário não encontrado!"); echo json_encode($response);}} mysqli_close($connect);
?>