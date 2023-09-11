<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Обновление отзыва</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="container">
  <?php
  include_once "./connect.php";

  $id = $_GET['id'];

  $name = mysqli_real_escape_string($link, $_POST["name"]);
  $title = mysqli_real_escape_string($link, $_POST["title"]);
  $text = mysqli_real_escape_string($link, $_POST["text"]);

  $update_sql = sprintf("UPDATE `reviews` SET `name` = '%s', `title` = '%s', `text` = '%s', `isApproved` = '1' WHERE `reviews`.`id` = '%s'", $name, $title, $text, $id);
  if (mysqli_query($link, $update_sql)) {
    echo "<h3 class='mb-4'>Отзыв опубликован.</h3>";
  } else {
    echo "<h3 class='mb-4'>Произошла ошибка! Попробуйте позже ещё раз.</h3>";
  }
  echo "<a class='btn btn-secondary' role='button' href='/admin'>Вернуться к отзывам</a>";
  ?>

</body>

</html>