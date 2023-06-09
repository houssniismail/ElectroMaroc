<?php
$data = ProductController::getAllProduct();

$client = ClientsController::loginClient();

$category = categoryController::getAllcategoryController();

// 
// $categoryfeltry = ProductController::fletre();

if (isset($_POST['add_to_cart'])) {
  cardsComtroller::addtocards();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="./views/js/index.js"></script>
  <style>
    /* width */
    #scroll::-webkit-scrollbar {
      width: 1px;
    }

    /* Track */
    #scroll::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    /* Handle */
    #scroll::-webkit-scrollbar-thumb {
      background: rgb(133, 132, 132);
    }

    .category-form>form:not(:last-child) {
      margin-right: 1rem;
      margin-bottom: 1rem;
    }

    .category-form>form>button {
      @apply bg-blue-500 hover: bg-blue-700 text-white font-bold py-2 px-4 rounded;
    }
  </style>
  <title>Products</title>
</head>

<body>
  <!-- navbar -->
  <div class="flex flex-wrap h-screen" style="height: 87px;">
    <section class="relative mx-auto ">
      <!-- navbar -->
      <nav class="flex justify-between bg-gray-900 text-white w-screen" style="width: 98.8vw;">
        <div class="px-5 xl:px-12 py-6 flex w-full items-center">
          <a class="text-3xl font-bold font-heading" href="#">
            <!-- <img class="h-9" src="logo.png" alt="logo"> -->
            ELECTRO<span class="text-rose-800">MAROC</span>
          </a>
          <!-- Nav Links -->
          <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
            <li><a class="hover:text-gray-200" href="./index">Home</a></li>
            <li><a class="hover:text-gray-200" href="./products">products</a></li>
            <li><a class="hover:text-gray-200" href="./Contact">Contact</a></li>
            <?php
            if ($_SESSION) {
              echo '<li><a class="hover:text-gray-200" href="./accounts">your account</a></li>';
            }
            ?>
          </ul>
          <!-- Header Icons -->
          <div class="hidden xl:flex items-center space-x-5 items-center">
            <?php if (!$_SESSION) { ?>
              <a class="flex items-center hover:text-gray-200" href="./login">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none"
                  viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </a>
            <?php } else { ?>

              <form method="POST" action="./cards">
                <input class="text-black" name="id_cline" type="hidden" value="<?php echo $_SESSION['Id']; ?>">
                <button type="submit" name="show_your_commend" class="flex items-center hover:text-gray-200">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
                  <span class="flex absolute -mt-5 ml-4">
                    <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
                    </span>
                  </span>
                </button>
              </form>
              <form method="POST">
                <button class="flex items-center hover:text-gray-200" name="logout">
                  <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </button>
              </form>
            <?php } ?>
          </div>

        </div>
        <!-- Responsive navbar -->
        <?php if( $_SESSION){ ?>
        <a class="xl:hidden flex mr-6 items-center" href="./cart">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          <span class="flex absolute -mt-5 ml-4">
            <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
            </span>
          </span>
        </a>
        <?php }?>
        <a id="openMenu" class="navbar-burger self-center mr-12 xl:hidden" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </a>
        <a id="closeMenu" class="hidden navbar-burger self-center mr-12 xl:hidden" href="#">
          <svg width="25px" height="25px" fill="none" stroke="currentColor" stroke-linecap="round"
            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 6 6 18"></path>
            <path d="m6 6 12 12"></path>
          </svg>
        </a>
      </nav>

    </section>
  </div>
  <div id="menu" class="w-[100vw] bg-blue-500 hidden">
    <ul class="flex-col">
      <li><a class="hover:text-gray-200" href="./index">Home</a></li>
      <li><a class="hover:text-gray-200" href="./products">products</a></li>
      <li><a class="hover:text-gray-200" href="./Contact">Contact</a></li>
      <?php if(!$_SESSION){?>
      <li><a class="hover:text-gray-200" href="./login">login</a></li>
      <?php }?>
      <li>
        <?php if ($_SESSION) {
          echo '<li><a class="hover:text-gray-200" href="./accounts">your account</a></li>';
        } ?>
      </li>
    </ul>
  </div>
  <br>
  <div class="category-form flex flex-wrap ">
    <?php foreach ($category as $elements): ?>
      <form class="mr-4 mb-4" action="./filerParCategory" method="POST">
        <input name="category" type="hidden" value="<?php echo $elements['nom'] ?>">
        <input class="hidden" type="hidden" name="filter" value="<?php echo $elements['nom'] ?>">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
          <?php echo $elements['nom'] ?>
        </button>
      </form>
    <?php endforeach; ?>
  </div>

  <!--end navbar -->
  <div class="flex mt-10 justify-around flex-wrap gap-6">
    <?php foreach ($data as $elements): ?>
      <div class="tuplats mx-8">
        <div
          class="product max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 text-center mx-auto mt-16">
          <a href="#">
            <img class="img rounded-t-lg mr-auto ml-auto m-4 w-[200px] h-[200px]" src="<?php echo $elements['image']; ?>"
              alt="" />
          </a>
          <strong>
            <?php echo $elements['name']; ?>
          </strong>
          <h2>
            <?php echo $elements['prix_achat'] . " . 00 $"; ?>
          </h2>
          <div class="p-5">
            <form action="" method="POST">
              <input type="hidden" name="id_client" value="<?php if ($_SESSION) {
                echo $_SESSION['Id'];
              } ?>">
              <?php ?>
              <input type="hidden" name="id" value="<?php echo $elements['id']; ?>">
              <input name="image" type="hidden" value="<?php echo $elements['image']; ?>">
              <input type="hidden" name="name" value="<?php echo $elements['name']; ?>">
              <input name="quentite" type="number" value="1">
              <input type="hidden" name="prix" value="<?php echo $elements['prix_achat']; ?>">
              <button name="add_to_cart"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                add to cart
              </button>
            </form>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <!-- <=====================================================================================> -->
  <!-- footer -->
  <footer class="text-center mt-32  bg-gray-900 text-white">

    <div class="text-center container px-6 pt-6 mr-auto ml-auto">
      <div class="text-center flex justify-center mb-6">
        <a href="#!" type="button"
          class="rounded-full border-2 border-white text-white leading-normal uppercase hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out w-9 h-9 m-1">
          <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" class="w-2 h-full mx-auto"
            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
            <path fill="currentColor"
              d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
            </path>
          </svg>
        </a>
        <a href="#!" type="button"
          class="rounded-full border-2 border-white text-white leading-normal uppercase hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out w-9 h-9 m-1">
          <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" class="w-3 h-full mx-auto"
            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor"
              d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
            </path>
          </svg>
        </a>

        <a href="#!" type="button"
          class="rounded-full border-2 border-white text-white leading-normal uppercase hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out w-9 h-9 m-1">
          <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google" class="w-3 h-full mx-auto"
            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512">
            <path fill="currentColor"
              d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z">
            </path>
          </svg>
        </a>

        <a href="#!" type="button"
          class="rounded-full border-2 border-white text-white leading-normal uppercase hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out w-9 h-9 m-1">
          <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" class="w-3 h-full mx-auto"
            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path fill="currentColor"
              d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
            </path>
          </svg>
        </a>

        <a href="#!" type="button"
          class="rounded-full border-2 border-white text-white leading-normal uppercase hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out w-9 h-9 m-1">
          <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in" class="w-3 h-full mx-auto"
            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path fill="currentColor"
              d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z">
            </path>
          </svg>
        </a>

        <a href="#!" type="button"
          class="rounded-full border-2 border-white text-white leading-normal uppercase hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out w-9 h-9 m-1">
          <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="github" class="w-3 h-full mx-auto"
            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
            <path fill="currentColor"
              d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z">
            </path>
          </svg>
        </a>
      </div>
    </div>
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2021 Copyright:
      <a class="text-whitehite" href="https://tailwind-elements.com/">Tailwind Elements</a>
    </div>
  </footer>
</body>

</html>
<script src="./Views/js/resNavbar.js"></script>