<?php
if ($_SESSION) {
  $data = cardsComtroller::getAllproductscards();
}
if (!$_SESSION['email']) {
  Redirect::to('login');
}
if ($data = NULL) {
} else {
  $data = cardsComtroller::getAllproductscards();
}
if (isset($_POST['delete'])) {
  cardsComtroller::deletProducttocard();
}
if (isset($_POST['check'])) {


  FormController::addinfo();

}
if (isset($_POST['check'])) {

  checkoutController::check();
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
  <title>your Commend</title>
</head>

<body>
  <div class="flex flex-wrap h-screen" style="height: 87px;">
    <section class="relative mx-auto ">
      <nav class="flex justify-between bg-gray-900 text-white w-screen">
        <div class="px-5 xl:px-12 py-6 flex w-full items-center">
          <a class="text-3xl font-bold font-heading" href="#">
            ELECTRO<span class="text-rose-800">MAROC</span>
          </a>
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
          <div class="hidden xl:flex items-center space-x-5 items-center">
            <form method="POST" action="./cards">
              <input class="text-black" name="id_cline" type="hidden" value="<?php echo $_SESSION['Id']; ?>">
              <button type="submit" name="show_your_commend" class="flex items-center hover:text-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
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
          </div>
        </div>
        <a class="xl:hidden flex mr-6 items-center" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          <span class="flex absolute -mt-5 ml-4">
            <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
            </span>
          </span>
        </a>
        <a class="navbar-burger self-center mr-12 xl:hidden" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </a>
      </nav>
    </section>
  </div>
  <div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 w-[100%]" style="margin-left: auto; margin-right: auto;">
      <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="min-w-full text-center">
            <thead class="border-b bg-gray-800">
              <tr>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                  Name
                </th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                  quentite
                </th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                  prix total
                </th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                  image
                </th>
                <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                  actions
                </th>
              </tr>
            </thead class="border-b">
            <tbody>
              <?php foreach ($data as $ele) : ?>
                <tr class="bg-white border-b">
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <?php echo $ele['name']; ?>
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <?php echo $ele['quentity']; ?>
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <?php echo $ele['prix'] * $ele['quentity']; ?>
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap ">
                    <img src="<?php echo $ele['image'] ?>" alt="" width="50px" style="margin-left: auto; margin-right: auto;">
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap ">
                    <form action="" class="delete" method="POST">
                      <input type="hidden" name="id" value="<?php echo $ele['id'] ?>">
                      <button name="delete"><i class="fa-solid fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <div>


            <button type="button" class="p-2 bg-sky-500 rounded" id="checkout-btn">checkout</button>
  

          </div>
        </div>
      </div>
    </div>




    <!-- Add this to your HTML file -->
    <div class="fixed z-10 inset-0 overflow-y-auto hidden" id="checkout-modal">
      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
          <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
          <div class="bg-white shadow-md rounded-lg px-6 py-4">
            <h2 class="text-xl font-bold mb-3">Contact Information</h2>
            <div class="mb-4">


              <form action="" method="POST">

                <label class="block text-gray-700 font-bold mb-2" for="full_name">Full Name:</label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="full_name" id="full_name" type="text" placeholder="John Doe">
            </div>
            <div class="mb-4">
              <label class="block text-gray-700 font-bold mb-2" for="email">Email:</label>
              <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="email" type="email" placeholder="johndoe@example.com">
            </div>
            <div class="mb-4">
              <label class="block text-gray-700 font-bold mb-2" for="phone">Phone Number:</label>
              <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="phone" id="phone" type="tel" placeholder="(555) 555-5555">
            </div>
            <div class="flex justify-between">
              <button class="p-2 bg-gray-300 rounded" onclick="hideModal()">Close</button>
              <input name="id_client" type="hidden" value="<?php echo $_SESSION['Id'] ?>">

              <button type="submit" class="p-2 bg-sky-500 rounded" name="check">Submit</button>

              <form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>




  </div>






  </div>



  <script>
    const checkoutModal = document.getElementById('checkout-modal');
    const checkoutBtn = document.getElementById('checkout-btn');
    const submitContactInfoBtn = document.getElementById('submit-contact-info');

    checkoutBtn.addEventListener('click', () => {
      checkoutModal.classList.remove('hidden');
    });

    submitContactInfoBtn.addEventListener('click', () => {
      checkoutModal.classList.add('hidden');
    });

    function hideModal() {
      const modal = document.getElementById('checkout-modal');

      modal.classList.add('hidden');

      document.body.classList.remove('overflow-hidden');
    }
  </script>

</body>

</html>