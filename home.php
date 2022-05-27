<section class="section-header">
    <h1>Bemutatkozás</h1>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi
        aperiam provident quos esse impedit, magnam cupiditate tenetur,
        dolor deserunt fuga tempora tempore nisi veritatis ipsa dignissimos
        quod saepe exercitationem nihil.
    </p>
</section>
<section class="section-product">
    <?php
    while ($row = $result->fetch_assoc()) :
    ?>
        <form action="cart-controller/addcart.php" method="post">
            <article>
                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                <input type="hidden" name="name" value="<?= $row['name']; ?>">
                <input type="hidden" name="image" value="<?= $row['image']; ?>">
                <input type="hidden" name="price" value="<?= $row['price']; ?>">
                <img src="images/<?= $row['image']; ?>" alt="example" />
                <a href="#" class="product-name"><?= $row['name']; ?></a>
                <div class="product-price">
                    <span><?= $row['price']; ?></span><span>Ft</span>
                    <input type="number" value="1" min="1" max="10" class="product-num" name="pieces">
                    <span>db</span>
                </div>
                <button type="submit" class="add-to-cart">Kosárba</button>
            </article>
        </form>
    <?php endwhile; ?>

</section>