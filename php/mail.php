<?php
$to  = 'stalker_evil@mail.ru'; /*Укажите адрес, га который должно приходить письмо sale@mail.ru*/

$sendfrom   = "support@oneavon.ru"; /*Укажите адрес, с которого будет приходить письмо, можно не настоящий, нужно для формирования заголовка письма*/
$headers  = "From: " . strip_tags($sendfrom) . "\r\n";
$headers .= "Reply-To: ". strip_tags($sendfrom) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html;charset=utf-8 \r\n";
$subject = $_POST['formData'];//тема письма

$message = "<b>".$_POST['formData']."</b><br>\r\n";
$message .= "<b>ФИО :</b> ".$_POST['name']."<br>\r\n";
$message .= "<b>Телефон:</b> ".$_POST['phone']."<br>\r\n";

$message .= "<b>Почта:</b> ".$_POST['email']."<br>\r\n";



if(!empty($_POST['question'])) {
    $message .= "<b>Вопрос:</b> ".$_POST['question']."<br>\r\n";
}

if (mail ($to, $subject, $message, $headers))
{ // /index.html /s/avon
    //$path = "http://".$_SERVER['HTTP_HOST']."/index.html";//тут для повза серва фикс будет, для рабочего убрать нужно, чтобы не директило на папку tender
    $path = "http://".$_SERVER['HTTP_HOST']."/s/avon";//тут для повза серва фикс будет, для рабочего убрать нужно, чтобы не директило на папку tender
//    echo $path;
    setcookie('thx',1);
    header("Location: ".$path);
}
else
{
    echo 'error!';
}


//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//
//
//} else {
//    http_response_code(403);
//}
?>