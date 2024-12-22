<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('location:index.php');
    exit();
}
session_start();
require_once('db.php');

if (isset($_POST['cart'])) {
    $id = $_POST['product_id'];
    $selectProducts = "SELECT * FROM `product` WHERE `id`='$id'";
    $result = mysqli_query($conn, $selectProducts);

    // التحقق من وجود نتائج
    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result); // الحصول على الصف الأول كـ array

        // تخزين البيانات في الجلسة
        $_SESSION['title'] = $product['name'];
        $_SESSION['image'] = $product['image'];
        $_SESSION['price'] = $product['price'];

        // استدعاء دالة الإدراج
        $insert = insert_card(
            $_SESSION['title'],
            $_SESSION['image'],
            $_SESSION['price'],
            $_POST['product-size'] ?? 'Default Size', // تحقق من وجود القيمة
            "White",
            $_POST['quantity'] ?? 1, // كمية افتراضية 1
            $_SESSION['user_id']
        );

        header('location:shop.php');
        exit();
    } else {
        echo "Error: Product not found!";
    }
}
?>