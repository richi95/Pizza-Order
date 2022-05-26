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
  <script defer src="scripts.js"></script>
</head>

<body>
  <div class="container">
    <nav>
      <div>
        <a class="active" href="#home">Kezdőoldal</a>
        <a href="#news">Pizzák</a>
        <a href="#contact">Kapcsolat</a>
      </div>
      <div id="dropdown">
        <button id="drop-btn"><i class="fas fa-shopping-cart"></i></button>
        <div id="dropdown-content">
          <?php if (isset($_SESSION['cart'])) : ?>
            <form action="cartbuy.php" method="POST">
              <table>
                <?php foreach ($_SESSION['cart'] as $key => $cartitem) : ?>
                  <tr class="cart cart-row-<?= $key ?>">
                    <input type="hidden" name="allcart" value="<?= $allCart ?>">
                    <td><img width="80" src="images/<?= $cartitem['image'] ?>" alt="image"></td>
                    <td><?= $cartitem['name'] ?></td>
                    <td><?= $cartitem['price'] ?>Ft</td>
                    <td><?= $cartitem['pieces'] ?>x</td>
                    <td><button type="submit" name="delete-item-key" value="<?= $key ?>" formaction="delete-cart.php" id="delete-button"><i class="fas fa-trash"><i></button></td>
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

    <main>
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
          <form action="addcart.php" method="post">
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
    </main>
    <footer>
      <span>Copyright &copy;, Example Corporation</span>
    </footer>
  </div>
  
</body>

</html>