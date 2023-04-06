<?php
  $newLogin = AdminController::logincontroller();
  if(!$_SESSION['emailAdmin']){
    Redirect::to('login');
  }
 $commendes = infodashbord::getAllcommend();
 if(isset($_POST['updatstatus'])){
  infodashbord::livrer();
 }
 if(isset($_POST['updatstatusenvoi'])){
  infodashbord::evoi();
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>dashboardclient</title>
</head>
<body>
<div>
  <section>
<nav class="flex justify-between bg-gray-900 text-white w-screen">
      <div class="px-5 xl:px-12 py-6 flex w-full items-center">
        <a class="text-3xl font-bold font-heading" href="#">
          <!-- <img class="h-9" src="logo.png" alt="logo"> -->
          ELECTRO<span class="text-rose-800">MAROC</span>
        </a>
        <!-- Nav Links -->
        <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
          <li><a class="hover:text-gray-200" href="./dashboard">dashpord</a></li>
          <li><a class="hover:text-gray-200" href="./add">add Product</a></li>
          <li><a class="hover:text-gray-200" href="./addCategory">add category</a></li>
          <li><a class="hover:text-gray-200" href="./category">show all category</a></li>
          <li><a class="hover:text-gray-200" href="./ProductAdmin">show all product</a></li>
        </ul>
        <!-- Header Icons -->
      </div>
      <!-- Responsive navbar -->
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
<div class="overflow-x-auto">
  <table class="mx-auto max-w-[90vw] w-full whitespace-no-wrap bg-white rounded-lg shadow-md text-center">
    <thead>
      <tr class="text-left font-bold text-center">
        <th class="px-6 py-4 bg-grey-lightest">ID</th>
        <th class="px-6 py-4 bg-grey-lightest">Date de création</th>
        <th class="px-6 py-4 bg-grey-lightest">date_d_envoi</th>
        <th class="px-6 py-4 bg-grey-lightest">date_de_livraison</th>
        <th class="px-6 py-4 bg-grey-lightest">ID Client</th>
        <th class="px-6 py-4 bg-grey-lightest">Prix Total</th>
        <th class="px-6 py-4 bg-grey-lightest">Status</th>
        <th class="px-6 py-4 bg-grey-lightest">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($commendes as $data) { ?>
        <tr class="hover:bg-grey-lighter">
          <td class="px-6 py-4 whitespace-no-wrap"><?php echo $data['id']; ?></td>
          <td class="px-6 py-4 whitespace-no-wrap"><?php echo $data['date_de_creation']; ?></td>
          <td class="px-6 py-4 whitespace-no-wrap"><?php echo $data['date_d_envoi'] ?? '-'; ?></td>
          <td class="px-6 py-4 whitespace-no-wrap"><?php echo $data['date_de_livraison'] ?? '-'; ?></td>
          <td class="px-6 py-4 whitespace-no-wrap"><?php echo $data['id_client']; ?></td>
          <td class="px-6 py-4 whitespace-no-wrap"><?php echo number_format($data['prixTotal'], 2, '.', ''); ?></td>
          <td class="px-6 py-4 whitespace-no-wrap">
            <span class="rounded-full px-2 py-1 text-sm font-bold text-white <?php echo $data['status'] == 'envoyé' ? 'bg-green-500' : 'bg-red-500'; ?>">
              <?php echo ucfirst($data['status']); ?>
            </span>
          </td>
          <td class="px-6 py-4 whitespace-no-wrap">
            <?php if($data['status'] != "envoiyer"){?>

            <form method="POST" >
              <input type="hidden" name="status" value="envoiyer">
              <input type="hidden" value="<?php echo $data['id_client']; ?>" name="id_client">
              <button name="updatstatusenvoi">envoiyer</button>
            </form>
            <?php }else{?>
              <form method="POST" >
              <input type="hidden" name="status" value="Levraison">
              <input type="hidden" value="<?php echo $data['id_client']; ?>" name="id_client">
              <button name="updatstatus">Levraison</button>
            </form>
            <?php } ?>

          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</body>
</html>