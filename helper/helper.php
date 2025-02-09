<?php

function successMessage(){ //الهدف منها هو عرض رسالة نجاح للمستخدم لو كان فيه رسالة مخزنة في $_SESSION['success']
    if (isset($_SESSION['success'])) { //للتحقق من وجود رسالة نجاح مخزنه في السيشن ولا لا
        echo "<div class='alert alert-success text-center mb-0' role='alert'>" . //هيتم عرض الرساله هنا
             htmlspecialchars(trim($_SESSION['success'])) . 
             "</div>";
        unset($_SESSION['success']); //لمسح الرساله بعد عرضها لتجنب ظهورها بعد تحديث الصفحه
    }
}

function errorMessage() {
    if (isset($_SESSION['errors'])) {
        echo "<div class='alert alert-danger p-2 mb-0'>"; 
        //بتأكد ان الاخطاء متخزنه في مصفوفه و لو مش مصفوفه هيحولها لمصفوفه
        $errors = is_array($_SESSION['errors']) ? $_SESSION['errors'] : [$_SESSION['errors']];
        
        echo "<ul class='mb-0 ps-3'>";
        foreach ($errors as $error) {  //بنستخدمها لعرض كل الاخطاء اللى في المصفوفه
            echo "<li class='small'>" . htmlspecialchars(trim($error)) . "</li>";
        }
        echo "</ul>";

        echo "</div>";
        unset($_SESSION['errors']);
    }
}


// function successMessage()
// {
//     if(!empty($_SESSION['success'])){
//         echo "<div class='alert alert-success text-center' role='alert'>{$_SESSION['success']}</div>";
//         unset($_SESSION['success']);
//     }
// }

// function errorMessage() {
//     if (isset($_SESSION['errors'])) {
//         echo "<div class='alert alert-danger p-2'>";
        
//         $errors = is_array($_SESSION['errors']) ? $_SESSION['errors'] : [$_SESSION['errors']];
        
//         echo "<ul class='mb-0 ps-3'>"; // تقليل المسافات حول القائمة
//         foreach ($errors as $error) {
//             echo "<li class='small'>$error</li>"; // تقليل حجم النص قليلاً
//         }
//         echo "</ul>";

//         echo "</div>";
//         unset($_SESSION['errors']);
//     }
  
// }