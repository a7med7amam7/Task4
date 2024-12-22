<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>

<section id="page-header" class="about-header">
    <h2>#Cart</h2>
    <p>Let's see what you have.</p>
</section>

<section id="cart" class="section-p1">
    <table width="100%">
        <thead>
            <tr>
                <td>Image</td>
                <td>Name</td>
                <td>Size</td>
                <td>Color</td>
                <td>Quantity</td>
                <td>Price</td>
                <td>Subtotal</td>
                <td>Remove</td>
                <td>Edit</td>
            </tr>
        </thead>
        <tbody>
            <?php
            // الاتصال بقاعدة البيانات
            require_once('db.php');

            // جلب البيانات من جدول cart
            $query = "SELECT * FROM `card`";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // حساب المجموع الفرعي لكل منتج
                    $subtotal = $row['price'] * $row['quant'];
                    echo "<tr>
                        <td><img src='http://localhost/Project_2/ecommerce/public/products/image/{$row['image']}' alt='{$row['name']}' style='width: 50px; height: 50px;'></td>
                        <td>{$row['name']}</td>
                        <td>{$row['size']}</td>
                        <td>{$row['color']}</td>
                        <td>{$row['quant']}</td>
                        <td>{$row['price']}</td>
                        <td>{$subtotal}</td>
                        <td><button type='button' class='btn btn-danger'>Remove</button></td>
                        <td><button type='button' class='btn btn-warning'>Edit</button></td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No items in the cart.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</section>

<?php include "footer.php"; ?>