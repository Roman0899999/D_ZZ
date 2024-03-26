class Product {
    publicname;
    publicprice;

    public __construct($_name $_price) {
 $this->name = $_name;
        $this->price = $_price;
    }

    public function getProduct() {
        return "Name: {$this->name}; Price: {$this->price}";
    }

    public static function searchByName($products, $productName) {
        foreach ($products as $product) {
            if ($product->name === $productName) {
                return $product;
            }
        }
        return null;
    }
}

// index.php
session_start();
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $product = new Product($name, $price);
    $_SESSION['products'][] = $product;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $searchName = $_POST['searchName'];
    $foundProduct = Product::searchByName($_SESSION['products'], $searchName);
}

echo '<form method="POST">
    <input type="text" name="name" placeholder="Product Name">
    <input type="text" name="price" placeholder="Product Price">
    <button type="submit" name="add">Add</button>
</form>';

echo '<h2>Products</h2>';
foreach ($_SESSION['products'] as $product) {
    echo $product->getProduct() . '<br>';
}

echo '<form method="POST">
    <input type="text" name="searchName" placeholder="Search Product by Name">
    <button type="submit" name="search">Search</button>
</form>';

if (isset($foundProduct)) {
    if ($foundProduct) {
        echo 'Found Product: ' . $foundProduct->getProduct();
    } else {
        echo 'Product not found';
    }
}