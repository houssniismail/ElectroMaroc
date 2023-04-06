<?php

if (!$_SESSION['email']) {
  Redirect::to('login');
}
$prixs = infocommend::aficher_tout_product();
// var_dump($prixs);
$data = infocommend::infocommend();
// var_dump($data);
$commands = infocommend::gitcommend();
// var_dump($commands);
$client = ClientsController::loginClient();

if ($client == NULL) {
} else {
  foreach ($client as $ele) {
    $_SESSION['Id'] = $ele['Id'];
    $_SESSION['nom'] = $ele['nom'];
    $_SESSION['prenom'] = $ele['prenom'];
  }
}
// if (isset($_POST['show_your_commend'])) {
//   $data = CommendComtroller::getAllCommendDeclient();
//   // var_dump($data);
//   Redirect::to('commend');
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Carte de produits</title>
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
                            <input class="text-black" name="id_cline" type="hidden"
                                value="<?php echo $_SESSION['Id']; ?>">
                            <button type="submit" name="show_your_commend"
                                class="flex items-center hover:text-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span class="flex absolute -mt-5 ml-4">
                                    <span
                                        class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
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
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="flex absolute -mt-5 ml-4">
                        <span
                            class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
                        </span>
                    </span>
                </a>
                <a class="navbar-burger self-center mr-12 xl:hidden" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </a>
            </nav>
        </section>
    </div>
    </div>
    <div class="flex flex-col md:flex-row">
        <div class="w-full md:w-[55vw]">
            <h1 class="text-center text-3xl font-bold">Your Orders</h1>
            <div class="overflow-x-auto">
                <table class="text-center ml-auto mr-auto w-full md:w-[50vw]">
                    <thead class="ml-auto mr-auto">
                        <tr class="justify-between border-2">
                            <th>Date de création</th>
                            <th>Date d'envoi</th>
                            <th>Date de livraison</th>
                            <th>Prix</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($commands as $elements): ?>
                        <tr>
                            <td>
                                <?php echo $elements['date_de_creation'] ?>
                            </td>
                            <td>
                                <?php echo $elements['date_d_envoi'] ?>
                            </td>
                            <td>
                                <?php echo $elements['date_de_livraison'] ?>
                            </td>
                            <td>
                                <?php echo $elements['prixTotal'] ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table> 
            </div>
        </div>
        <div class="w-full md:w-[20vw] border-2 mt-8 text-center ml-auto mr-auto">
            <div class="font-bold">Status</div>
            <div>
            <?php foreach($commands as $comme)?>
                <form action="./status" method="POST">
                    <input name="status" value="envoiyer" type="hidden">
                    <input name="id_client" value="<?php echo $comme['id_client']?>" type="hidden">
                 <button name="showStatu" class="bg-blue-500 hover:bg-blue-700 w-full md:w-[15vw] text-white font-bold py-2 px-4 border border-blue-700 rounded mt-4">
                   En envoi
                 </button>
                </form>
            </div>
            <div>
            <form action="./status" method="POST">
                    <input name="status" value="levraison" type="hidden">
                    <input name="id_client" value="<?php echo $comme['id_client']?>" type="hidden">
                 <button name="showStatu" class="bg-blue-500 hover:bg-blue-700 w-full md:w-[15vw] text-white font-bold py-2 px-4 border border-blue-700 rounded mt-4">
                   En levraison
                 </button>
                </form>
            </div>
        </div>
        <div class="w-full md:w-[20vw] border-2 mt-8 text-center ml-auto mr-auto ">
            <div class="font-bold">Total de prix</div>
            <div class="flex flex-col">
                <?php foreach ($prixs as $ele): ?>
                <div>
                    <?php echo $ele['prixTotal'] . '$' ?>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="border-t-4">
                <?php foreach ($data as $ele): ?>
                <div>
                    <?php echo $ele['SUM(prixTotal)'] . '$' ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>