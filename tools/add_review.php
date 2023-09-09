<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <title>Отзыв</title>
</head>

<body class="p-4">
  <?php
  include_once "./connect.php";

  $name = mysqli_real_escape_string($link, $_POST["name"]);
  $title = mysqli_real_escape_string($link, $_POST["title"]);
  $text = mysqli_real_escape_string($link, $_POST["text"]);
  $rating = mysqli_real_escape_string($link, $_POST["rating"]);

  $insert_sql = sprintf("INSERT INTO `reviews` (`name`, `title`, `text`, `rating`) VALUES ('%s', '%s', '%s', '%s')", $name, $title, $text, $rating);

  if (mysqli_query($link, $insert_sql)) {
    echo "<h3 class='mb-4'>Ваш отзыв отправлен на проверку модератору!</h3>";
  } else {
    echo "<h3 class='mb-4'>Произошла ошибка! Попробуйте позже ещё раз.</h3>";
  }

  echo "<a class='btn btn-secondary' role='button' href='/'>Вернуться к отзывам</a>";
  ?>
</body>

</html>