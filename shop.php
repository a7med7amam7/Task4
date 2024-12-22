<?php include 'header.php' ?>
<?php include 'navbar.php' ;?>


<section id="product1" class="section-p1">
    <h2>Featured Products</h2>
    <p>Summer Collection New Modren Desgin</p>
    <div class="pro-container">

        <?php 
         $selectProducts = "SELECT 
         p.id,
         p.name,
         p.content,
         p.image,
         p.price,
         p.size,
         p.rate,
         p.review,
         p.gender,
         c.name AS category_name,
         b.name AS brand_name
     FROM 
         product p
     JOIN 
         catgory c ON p.catg_id = c.id
     JOIN 
         brand b ON p.breand_id = b.id;
     ";
 
        $runSelectProducts=mysqli_query($conn,$selectProducts);
        $resultProducts=mysqli_fetch_all($runSelectProducts,MYSQLI_ASSOC);

        if(count($resultProducts)>0)
        {
            foreach($resultProducts as $product)
            { ?>
        <div class="pro">
            <!-- <form> -->
            <img src="http://localhost/Project_2/ecommerce/public/products/image/<?php echo $product['image'] ;?>"
                alt="p1" />
            <div class="des">
                <h2><?php echo $product['name']; ?></h2>
                <h5><?php echo $product['content']; ?></h5>
                <div class="star">
                    <?php
                    $rate = $product['rate'] ?? 0;
                    $not_rate = 5 - $rate;
                    for ($i = 0; $i < $rate; $i++) echo '<i class="fas fa-star"></i>';
                    for ($i = 0; $i < $not_rate; $i++) echo '<i class="far fa-star"></i>';
                    ?>
                </div>
                <h4><?php echo $product['price']; ?></h4>
                <form action="add_to_cart.php" method="POST" style="display: inline;">
                    <!-- حقل مخفي لنقل معرف المنتج -->
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">

                    <!-- حقل إدخال الكمية -->
                    <input type="number" name="quantity" value="1" min="1" style="width: 60px; margin-right: 10px;"
                        required>

                    <!-- زر الإرسال -->
                    <button type="submit" class="cart" style="background: none; border: none; cursor: pointer;"
                        name="cart">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </form>


            </div>
        </div>

        <?php }
        }
        ?>


    </div>

    </div>
</section>



<section id="pagenation" class="section-p1">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="shop.php" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1 of 2 </a></li>

            <li class="page-item">
                <a class="page-link" href="shop.php?" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>

</section>

<section id="newsletter" class="section-p1 section-m1">
    <div class="newstext ">
        <h4>Sign Up For Newletters</h4>
        <p>Get E-mail Updates about our latest shop and <span class="text-warning ">Special Offers.</span></p>
    </div>
    <div class="form ">
        <input type="text " placeholder="Enter Your E-mail... ">
        <button class="normal ">Sign Up</button>
    </div>
</section>


<?php include 'footer.php' ?>