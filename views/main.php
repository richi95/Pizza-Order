<?php
require "./config.php";

//session_destroy();
@$cart = $_SESSION['cart'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pizza rendelő alkalmazás</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="shortcut icon" href="images/pizza-icon.png" type="image/x-icon" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <script defer src="./main.js"></script>
</head>

<body>
  <div class="container">
    <nav>
      <div class="tabs">
        <form method="POST">
          <button data-tab="1" class="tab active" formaction="?action=back" type="submit">Pizzák</button>
          <button data-tab="2" class="tab">Kapcsolat</button>
        </form>
      </div>
      <div id="dropdown">
        <button id="drop-btn"><i class="fas fa-shopping-cart"></i></button>
        <div id="dropdown-content">
          <?php if (isset($_SESSION['cart'])) : ?>
            <form action="?action=cartbuy" method="POST">
              <table>
                <?php foreach ($_SESSION['cart'] as $key => $cartitem) : ?>
                  <tr class="cart cart-row-<?= $key ?>">

                    <input type="hidden" name="allcart[<?= $key ?>][image]" value="<?= $cartitem['image'] ?>">
                    <input type="hidden" name="allcart[<?= $key ?>][name]" value="<?= $cartitem['name'] ?>">
                    <input type="hidden" name="allcart[<?= $key ?>][price]" value="<?= $cartitem['price'] ?>">
                    <input type="hidden" name="allcart[<?= $key ?>][pieces]" value="<?= $cartitem['pieces'] ?>">

                    <td><img width="80" src="images/<?= $cartitem['image'] ?>" alt="image"></td>
                    <td><?= $cartitem['name'] ?></td>
                    <td><?= $cartitem['price'] ?>Ft</td>
                    <td><?= $cartitem['pieces'] ?>x</td>
                    <td><button type="submit" name="delete-item-key" value="<?= $key ?>" formaction="?action=deletecart" id="delete-button"><i class="fas fa-trash"><i></button></td>
                  </tr>
                <?php endforeach; ?>
              </table>
              <div id="total-amount">
                <div><span>Teljes összeg:</span></div>
                <div><span><?= array_multisum($_SESSION['cart']) ?>Ft</span></div>
              </div>
              <div id="cart-buy">
                <button type="submit" id="cart-buy-button">Vásárlás</button>
              </div>
            </form>
          <?php else : ?>
            <span>Üres kosár</span>
          <?php endif; ?>

        </div>
      </div>
    </nav>
    <main class="main-content">
      <?php if (isset($_SESSION['success'])) : ?>
        <div class="success">
          <p><?= 'Sikeres rendelés!' ?></p>
        </div>
        <?php session_destroy(); ?>
      <?php endif; ?>
      <?php
      if (isset($_SESSION['selected_cart']) && @count($_SESSION['cart'])>0) :
      ?>
        <div class="tab-buy-buttons">
          <button data-tab="1" class="tab-buy <?= isset($_SESSION['shipping']) ? 'active' : '' ?>" disabled>Számlázási adatok</button>
          <button data-tab="2" class="tab-buy <?= isset($_SESSION['billing']) ? 'active' : '' ?>" disabled>Szállítási adatok</button>
          <button data-tab="3" class="tab-buy <?= isset($_SESSION['summary']) ? 'active' : '' ?>" disabled>Összegzés, fizetés</button>
        </div>
        <div class="shipping-methods">
          <div class="page" data-page="1">
            <?php require_once "pages/shipping.php" ?>
          </div>
          <div class="page" data-page="2">
            <?php require "pages/billing.php" ?>
          </div>
          <div class="page" data-page="3">
            <?php require "pages/summary.php" ?>
          </div>
        </div>
      <?php else : ?>
        <div class="page show" data-page="1">
          <?php require "home.php" ?>
        </div>
        <div class="page" data-page="2">
          <?php require "pizza-list.php" ?>
        </div>
        <div class="page" data-page="3">
          <?php require "pizza-list.php" ?>
        </div>
        <?php endif; ?>
    </main>
    <footer>
      <span>Copyright &copy;, Example Corporation</span>
    </footer>
  </div>
</body>

</html>