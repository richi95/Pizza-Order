<?php
$summaryDataTitle = ['Név', 'Email', 'Telefonszám', 'Irányítószám', 'Város', 'Utca, hsz'];
?>
<section class="section-buy-content">
    <form method="POST">
        <div class="summary-grid">
            <div id="shipping-data">
                <table>
                    <h1>Szállítási adatok</h1>
                    <?php foreach ($this->combineSummaryKeyData($summaryDataTitle, $_SESSION['shipping_data']) as $key => $data) : ?>
                        <tr>
                            <td style="font-weight:bold"><?= $key ?></td>
                            <td style="width: 100%;"></td>
                            <td><?= $data ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div id="billing-data">
                <table>
                    <h1>Számlázási adatok</h1>
                    <?php foreach ($this->combineSummaryKeyData($summaryDataTitle, $_SESSION['billing_data']) as $key => $data) : ?>
                        <tr>
                            <td style="font-weight:bold"><?= $key ?></td>
                            <td style="width: 100%;"></td>
                            <td><?= $data ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div id="summary-price-data">
                <div>
                    <p>Fizetési mód</p>
                    <p><?= $_SESSION['billing_data']['payment'] ?></p>
                </div>
                <div>
                    <p>Nettó ár</p>
                    <p><?=array_multisum($_SESSION['cart']) ?>Ft</p>
                </div>
                <div>
                    <p>Szállítási költség</p>
                    <p>250Ft</p>
                </div>
                <div>
                    <p>Összesen</p>
                    <p><?=array_multisum($_SESSION['cart'])+250 ?>Ft</p>
                </div>
                <hr>
            </div>

            <div id="summary" class="summary">
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
            </div>
            <div id="summary-submit">
                <button class="button-back" type="submit" formaction="?action=back"><i class="fa-solid fa-angle-left"></i>Vissza</button>
                <button class="button-final" type="submit" formaction="?action=successOrder">Rendelés véglegesítése<i class="fa-solid fa-angle-right"></i></button>
            </div>
        </div>
    </form>
</section>