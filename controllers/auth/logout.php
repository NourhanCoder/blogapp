<?php
session_unset(); //تقوم هذه الدالة بحذف جميع القيم المخزنة في $_SESSION لكنها لا تدمر الجلسة نفسها
session_destroy();  //هذه الدالة تحذف الجلسة نهائيًا من السيرفر

header("location: index.php?page=login");
exit;