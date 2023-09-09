<?php
include_once "./connect.php";

$id = $_GET['id'];
$update_sql = sprintf("UPDATE `reviews` SET `isApproved` = 1 WHERE `reviews`.`id` = %s", $id);

if (mysqli_query($link, $update_sql)) {
  echo "<h3>Отзыв опубликован.</h3>";
} else {
  echo "<h3>Произошла ошибка! Попробуйте позже ещё раз.</h3>";
}
echo "<a href='/admin'>Вернуться к отзывам</a>";
