<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reviews</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  include_once "./connect.php";

  $id = $_GET['id'];
  $sql = "SELECT * FROM `reviews` WHERE `id`= $id";
  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($result);

  if ($_POST["name"]) {
    $name = mysqli_real_escape_string($link, $_POST["name"]);
    $title = mysqli_real_escape_string($link, $_POST["title"]);
    $text = mysqli_real_escape_string($link, $_POST["text"]);

    $update_sql = sprintf("UPDATE `reviews` SET `name` = '%s', `title` = '%s', `text` = '%s', `isApproved` = '1' WHERE `reviews`.`id` = '%s'", $name, $title, $text, $id);
    if (mysqli_query($link, $update_sql)) {
      echo "<h3>Отзыв опубликован.</h3><br><a href='/admin'>Вернуться к отзывам</a>";
    } else {
      echo "<h3>Произошла ошибка! Попробуйте позже ещё раз.</h3><br><a href='/admin'>Вернуться к отзывам</a>";
    }
  }
  ?>

  <form class="form" name="review" method="POST" action="/tools/change.php?id=<?= $id ?>">
    <p>
      <label for="name">Ваше имя: </label><br><input type="text" name="name" value="<?= $row["name"] ?>" required>
    </p>
    <p>
      <label for="title">Заголовок: </label><br><input type="text" name="title" value="<?= $row["title"] ?>" required>
    </p>
    <p>
      <label for="text">Сообщение: </label><br><textarea name="text" required><?= $row["text"] ?></textarea>
    </p>

    <label for="rating">Оценка: </label><br>
    <select name="rating" disabled required>
      <option value="<?= $row["rating"] ?>"><?= $row["rating"] ?></option>
    </select>

    <input type="submit" name="send" value="Добавить отзыв">
  </form>
</body>

</html>