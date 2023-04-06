<?php
   $products = infocommend::showStatus();
?>   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
<div class="overflow-x-auto">
  <table class="mx-auto max-w-[70vw] w-full whitespace-no-wrap bg-white rounded-lg shadow-md text-center">
    <thead>
      <tr class="text-left font-bold text-center">
        <th class="px-6 py-4 bg-grey-lightest">ID</th>
        <th class="px-6 py-4 bg-grey-lightest">Date de création</th>
        <th class="px-6 py-4 bg-grey-lightest">date_de_livraison</th>
        <th class="px-6 py-4 bg-grey-lightest">ID Client</th>
        <th class="px-6 py-4 bg-grey-lightest">Prix Total</th>
        <th class="px-6 py-4 bg-grey-lightest">Status</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($products as $data) { ?>
        <tr class="hover:bg-grey-lighter">
          <td class="px-6 py-4 whitespace-no-wrap"><?php echo $data['id']; ?></td>
          <td class="px-6 py-4 whitespace-no-wrap"><?php echo $data['date_de_creation']; ?></td>
          <td class="px-6 py-4 whitespace-no-wrap"><?php echo $data['date_de_livraison'] ?? '-'; ?></td>
          <td class="px-6 py-4 whitespace-no-wrap"><?php echo $data['id_client']; ?></td>
          <td class="px-6 py-4 whitespace-no-wrap"><?php echo number_format($data['prixTotal'], 2, '.', ''); ?></td>
          <td class="px-6 py-4 whitespace-no-wrap">
            <span class="rounded-full px-2 py-1 text-sm font-bold text-white <?php echo $data['status'] == 'envoyé' ? 'bg-green-500' : 'bg-red-500'; ?>">
              <?php echo ucfirst($data['status']); ?>
            </span>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</body>
</html>

