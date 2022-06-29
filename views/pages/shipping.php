<section class="section-buy-content">
    <form action="?action=shipping" method="POST">
        <div class="shipping-form">
            <div class="shipping">

                <h1>Számlázási adatok</h1>

                <label for="shipping_name">Név </label>
                <input type="text" name="shipping_name" id="shipping_name" value="<?= $this->old(@$_SESSION['old']['shipping_name']) ?>">
                <?php isset($_SESSION['errors']['shipping_name']) ? print '<span style="color:red; font-style: italic;">' . $_SESSION['errors']['shipping_name'] . '</span>' : '' ?>

                <label for="shipping_email">Email </label>
                <input type="text" name="shipping_email" id="shipping_email" value="<?= $this->old(@$_SESSION['old']['shipping_email']) ?>">
                <?php isset($_SESSION['errors']['shipping_email']) ? print '<span style="color:red; font-style: italic;">' . $_SESSION['errors']['shipping_email'] . '</span>' : '' ?>

                <label for="shipping_phone">Telefonszám </label>
                <input type="text" name="shipping_phone" id="shipping_phone" value="<?= $this->old(@$_SESSION['old']['shipping_phone']) ?>">
                <?php isset($_SESSION['errors']['shipping_phone']) ? print '<span style="color:red; font-style: italic;">' . $_SESSION['errors']['shipping_phone'] . '</span>' : '' ?>

                <label for="shipping_zip_code">Irányítószám </label>
                <input type="text" name="shipping_zip_code" id="shipping_zip_code" value="<?= $this->old(@$_SESSION['old']['shipping_zip_code']) ?>">
                <?php isset($_SESSION['errors']['shipping_zip_code']) ? print '<span style="color:red; font-style: italic;">' . $_SESSION['errors']['shipping_zip_code'] . '</span>' : '' ?>

                <label for="shipping_city">Város </label>
                <input type="text" name="shipping_city" id="shipping_city" value="<?= $this->old(@$_SESSION['old']['shipping_city']) ?>">
                <?php isset($_SESSION['errors']['shipping_city']) ? print '<span style="color:red; font-style: italic;">' . $_SESSION['errors']['shipping_city'] . '</span>' : '' ?>

                <label for="shipping_postcode">Utca, házszám </label>
                <input type="text" name="shipping_postcode" id="shipping_postcode" value="<?= $this->old(@$_SESSION['old']['shipping_postcode']) ?>">
                <?php isset($_SESSION['errors']['shipping_postcode']) ? print '<span style="color:red; font-style: italic;">' . $_SESSION['errors']['shipping_postcode'] . '</span>' : '' ?>
                              
            </div>

            <div class="summary">
                <table>
                    <?php foreach ($_SESSION['cart'] as $key => $cartitem) : ?>
                        <tr class="cart cart-row-<?= $key ?>">
                            <td><img src="images/<?= $cartitem['image'] ?>" style="width: 80px" alt="image"></td>
                            <td><?= $cartitem['name'] ?></td>
                            <td><?= $cartitem['price'] ?>Ft</td>
                            <td><?= $cartitem['pieces'] ?>x</td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <div class="summary-price">
                    <div><span>Teljes összeg:</span></div>
                    <div><span><?= array_multisum($cart) ?>Ft</span></div>
                </div>
            </div>
        </div>
        <div class="shipping-submit">
            <button class="button-back" type="submit" formaction="?action=back"><i class="fa-solid fa-angle-left"></i>Vissza</button>
            <button class="button-next" type="submit">Tovább<i class="fa-solid fa-angle-right"></i></button>
        </div>
    </form>
</section>