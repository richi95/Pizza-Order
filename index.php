<?php
session_start();
require "database.php";
require "config.php";
$allCart = $_SESSION['cart'];
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
  <script defer src="main.js"></script>
</head>

<body>
  <div class="container">
    <nav>
      <div class="tabs">
        <button data-tab="1" class="tab active">Kezdőoldal</button>
        <button data-tab="2" class="tab">Pizzák</button>
        <button data-tab="3" class="tab">Kapcsolat</button>
      </div>
      <div id="dropdown">
        <button id="drop-btn"><i class="fas fa-shopping-cart"></i></button>
        <div id="dropdown-content">
          <?php if (isset($_SESSION['cart'])) : ?>
            <form action="cart-controller/cartbuy.php" method="POST">
              <table>
                <?php foreach ($_SESSION['cart'] as $key => $cartitem) : ?>
                  <tr class="cart cart-row-<?= $key ?>">
                    <input type="hidden" name="allcart" value="<?= $allCart ?>">
                    <td><img width="80" src="images/<?= $cartitem['image'] ?>" alt="image"></td>
                    <td><?= $cartitem['name'] ?></td>
                    <td><?= $cartitem['price'] ?>Ft</td>
                    <td><?= $cartitem['pieces'] ?>x</td>
                    <td><button type="submit" name="delete-item-key" value="<?= $key ?>" formaction="cart-controller/delete-cart.php" id="delete-button"><i class="fas fa-trash"><i></button></td>
                  </tr>
                <?php endforeach; ?>
              </table>
              <div id="total-amount">
                <div><span>Teljes összeg:</span></div>
                <div><span><?= array_multisum($allCart) ?>Ft</span></div>
              </div>
              <div id="cart-buy">
                <button type="submit" id="cart-buy-button">Vásárlás</button>
              </div>
            </form>
          <?php endif; ?>
        </div>
      </div>
    </nav>
    <main class="main-content">
      <div class="page show" data-page="1">
        <?php require "home.php" ?>
      </div>
      <div class="page" data-page="2">
        <?php require "pizza-list.php" ?>
      </div>
      <div class="page" data-page="3">
        <?php require "pizza-list.php" ?>
      </div>
    </main>
    <footer>
      <span>Copyright &copy;, Example Corporation</span>
    </footer>
  </div>

</body>

</html>