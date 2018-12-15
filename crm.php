<?php public function actionContact() 
{ 

// Переменные для формы 
$userEmail = false; 
$userText = false; 
$result = false; 

// Обработка формы 
if (isset($_POST['submit'])) { 
// Если форма отправлена 
// Получаем данные из формы 
$userEmail = $_POST['userEmail']; 
$userText = $_POST['userText']; 

// Флаг ошибок 
$errors = false; 

// Валидация полей 
if (!User::checkEmail($userEmail)) { 
$errors[] = 'Неправильный email'; 
} 

if ($errors == false) { 
// Если ошибок нет 
// Отправляем письмо администратору 
$adminEmail = 'alexsandr9813@yandex.ru'; 
$message = "Текст: {$userText}. От {$userEmail}"; 
$subject = 'Тема письма'; 
$result = mail($adminEmail, $subject, $message); 
$result = true; 
} 
} 

// Подключаем вид 
require_once(ROOT . '/crm.php'); 
return true; 
}
?>