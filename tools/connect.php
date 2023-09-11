<?php
$link = mysqli_connect("localhost", "root", "", "test");
// $link = mysqli_connect("www.db4free.net:3306", "asdfg63", "qa234db1", "studentos");

if ($link == false) {
  echo '<h3 class="m-4"><b>Ошибка:</b> При подключении к базе данных произошла ошибка. Попробуйте позже или обратитесь к администратору ресурса</h3>';
  exit;
}
