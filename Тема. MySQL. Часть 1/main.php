// К на странице main для кнопки "ить категорию"
<button onclick="window.location.href='.php'">Добав категорию</button>

// category.php
// Форма для добавления категории
<form action="addCategory.php" method="post">
  <input type="text" name="Name" placeholder="Name">
  <select name="Sector">
    <?php
      // Подключение к БД и получение списка секторов для выпадающего списка
      $sectors = // SQL запрос для получения списка секторов
      foreach ($sectors as $sector) {
        echo "<option value='".$sector['sector_id']."'>".$sector['sector_name']."</option>";
      }
    ?>
  </select>
  <button type="submit" name="addCategory" disabled>Добавить</button>
</form>

// addCategory.php
// Код для проверки и добавления новой категории
<?php
  if(isset($_POST['addCategory'])){
    $name = $_POST['Name'];
    $sector = $_POST['Sector'];
    // Проверка наличия категории в БД
    $categoryExists = // SQL запрос для проверки наличия категории
    if ($categoryExists) {
      echo "Error: Category already exists";
    } else {
      // Добавление новой категории в БД
      // SQL запрос для добавления новой категории
      echo "Category added successfully";
      header("Location: main.php");
      exit;
    }
  }
?>

// main.php
// Код на странице main.php для кнопки "Добавить товар"
<button onclick="window.location.href='product.php'">Добавить товар</button>

// product.php
// Форма для добавления продукта
<form action="addProduct.php" method="post">
  <input type="text" name="Name" placeholder="Name">
  <input type="text" name="Price" placeholder="Price">
  <input type="text" name="Make" placeholder="Make">
  <input type="text" name="Model" placeholder="Model">
  <input type="text" name="Country" placeholder="Country">
  <input type="text" name="Description" placeholder="Description">
  <select name="Category">
    <?php
      // Подключение к БД и получение списка категорий для выпадающего списка
      $categories = // SQL запрос для получения списка категорий
      foreach ($categories as $category) {
        echo "<option value='".$category['category_id']."'>".$category['category_name']."</option>";
      }
    ?>
  </select>
  <button type="submit" name="addProduct" disabled>Добавить</button>
</form>

// addProduct.php
// Код для добавления и обновления информации о продукте
<?php
  if(isset($_POST['addProduct'])){
    // Добавление нового продукта или обновление информации о существующем продукте
    // Вывод ошибок при несоответствии введенных значений
  }
?>

// Добавление валидации для всех полей формы AddProduct и вывод соответствующих ошибок
// Код для валидации полей:
<?php
  $name = $_POST['Name'];
  $price = $_POST['Price'];
  $make = $_POST['Make'];
  $modelPOST['Model'];
  $country = $_POST['Country'];
  $description = $_POST['Description'];

  if (empty($name) || strlen($name) > 20) {
    echo "Error: Name cannot be empty and should not exceed 20 characters";
  }

  if ($price <= 0) {
    echo "Error: Price cannot be 0";
  }
  // Проверка других полей и вывод соответствующих ошибок
?>

// Добавление сессии и кнопки "Выход"
// Код для старта сессии и кнопки "Выход":
<?php
  session_start();
  $_SESSION['start'] = time();
  $_SESSION['expire'] = $_SESSION['start'] + (60 * 60); // сессия длится 1 час
?>
<button onclick="window.location.href='logout.php'">Выход</button>

// logout.php
// Код для завершения сессии:
<?php
  session_start();
  session_destroy();
  header("Location: login.php");
  exit;
?>