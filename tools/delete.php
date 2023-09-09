<?php
include_once "./connect.php";

$id = $_GET['id'];
$delete_sql = sprintf("DELETE FROM `reviews` WHERE `reviews`.`id` = %s", $id);

if (mysqli_query($link, $delete_sql)) {
  echo "<h3>Отзыв удалён.</h3><br>";
} else {
  echo "<h3>Произошла ошибка! Попробуйте позже ещё раз.</h3><br><a href='/admin'>Вернуться к отзывам</a>";
}
echo "<a href='/admin'>Вернуться к отзывам</a>";
