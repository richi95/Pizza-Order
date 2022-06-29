<section class="section-buy-content">
    <form action="?action=billing" method="POST">
        <div class="shipping-form">
            <div class="shipping">

                <h1>Szállítási adatok</h1>

                <label for="billing_name">Név </label>
                <input type="text" name="billing_name" id="billing_name" value="<?= $this->old(@$_SESSION['old']['billing_name']) ?>">
                <?php isset($_SESSION['errors']['billing_name']) ? print '<span style="color:red; font-style: italic;">' . $_SESSION['errors']['billing_name'] . '</span>' : '' ?>

                <label for="billing_email">Email </label>
                <input type="text" name="billing_email" id="billing_email" value="<?= $this->old(@$_SESSION['old']['billing_email']) ?>">
                <?php isset($_SESSION['errors']['billing_email']) ? print '<span style="color:red; font-style: italic;">' . $_SESSION['errors']['billing_email'] . '</span>' : '' ?>

                <label for="billing_phone">Telefonszám </label>
                <input type="text" name="billing_phone" id="billing_phone" value="<?= $this->old(@$_SESSION['old']['billing_phone']) ?>">
                <?php isset($_SESSION['errors']['billing_phone']) ? print '<span style="color:red; font-style: italic;">' . $_SESSION['errors']['billing_phone'] . '</span>' : '' ?>

                <label for="billing_zip_code">Irányítószám </label>
                <input type="text" name="billing_zip_code" id="billing_zip_code" value="<?= $this->old(@$_SESSION['old']['billing_zip_code']) ?>">
                <?php isset($_SESSION['errors']['billing_zip_code']) ? print '<span style="color:red; font-style: italic;">' . $_SESSION['errors']['billing_zip_code'] . '</span>' : '' ?>

                <label for="billing_city">Város </label>
                <input type="text" name="billing_city" id="billing_city" value="<?= $this->old(@$_SESSION['old']['billing_city']) ?>">
                <?php isset($_SESSION['errors']['billing_city']) ? print '<span style="color:red; font-style: italic;">' . $_SESSION['errors']['billing_city'] . '</span>' : '' ?>

                <label for="billing_postcode">Utca, házszám </label>
                <input type="text" name="billing_postcode" id="billing_postcode" value="<?= $this->old(@$_SESSION['old']['billing_postcode']) ?>">
                <?php isset($_SESSION['errors']['billing_postcode']) ? print '<span style="color:red; font-style: italic;">' . $_SESSION['errors']['billing_postcode'] . '</span>' : '' ?>
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
        <div class="billing" style="display: flex;">
            <h1>Fizetési mód</h1>
            <div class="credit_card">
                <input type="radio" id="credit_card" name="payment" value="Bankártyás fizetés">
                <label for="credit_card">Bankártyás fizetés</label>
            </div>
            <div class="prepayment">
                <input type="radio" id="prepayment" name="payment" value="Előre utalás">
                <label for="prepayment">Előre utalás</label>
            </div>
            <div class="afterpayment">
                <input type="radio" id="afterpayment" name="payment" value="Utánvét">
                <label for="afterpayment">Utánvét</label>
            </div>
            <?php isset($_SESSION['errors']['payment']) ? print '<span style="color:red; font-style: italic;">' . $_SESSION['errors']['payment'] . '</span>' : '' ?>
        </div>

        <div class="shipping-submit">
            <button class="button-back" type="submit" formaction="?action=back"><i class="fa-solid fa-angle-left"></i>Vissza</button>
            <button class="button-next" type="submit">Tovább<i class="fa-solid fa-angle-right"></i></button>
        </div>
    </form>
</section>