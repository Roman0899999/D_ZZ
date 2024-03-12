<!DOCTYPE html>
<html>
<head>
    <title>Список книг</title>
</head>
<body>
    <h1>Список книг</h1>
    <table border="1">
        <tr>
            <th>Название</th>
            <th>Автор</th>
            <th>Жанр</th>
            <th>Год издания</th>
            <th>Издательство</th>
            <th>ISBN</th>
            <th>Количество страниц</th>
            <th>Цена</th>
            <th>Дата добавления</th>
        </tr>
        <!-- Здесь будет генерация строк таблицы с данными из базы данных -->
<?php
// Подключение к базе данных
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "my_library";

$conn = new mysqli($servername, $username, $password, $dbname);

// Получение данных из формы
$title = $_POST['title'];
$author = $_POST['author'];
$genre = $_POST['genre'];
$publication_year = $_POST['publication_year'];
$publisher = $_POST['publisher'];
$isbn = $_POST['isbn'];
$pages = $_POST['pages'];
$price = $_POST['price'];
$date_added = date("Y-m-d");

// SQL запрос для добавления книги в базу данных
$sql = "INSERT INTO Books (Title, Author, Genre, PublicationYear, Publisher, ISBN, Pages, Price, DateAdded) 
        VALUES ('$title', '$author', '$genre', $publication_year, '$publisher', '$isbn', $pages, $price, '$date_added')";

if ($conn->query($sql) === TRUE) {
    echo "Книга успешно добавлена";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
 </table>
</body>
</html>