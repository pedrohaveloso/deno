<?

/**
 * -----------------------------------------------------------------------------
 * Esse é o arquivo responsável pela base de todas as páginas do sistema, 
 * qualquer requisição retornando uma view terá como base esse molde. O restante
 * da página será inserido no local da variável [$content].
 * -----------------------------------------------------------------------------
 */

?>

<!DOCTYPE html>
<html lang="<?= LOCALE ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Deno shop page">

  <link rel="shortcut icon" href="/public/assets/favicon.ico"
    type="image/x-icon">

  <!-- --------------------------------------------------------------------- -->
  <!-- App styles: -->
  <link href="/public/assets/styles/tailwind.css" rel="stylesheet">

  <!-- --------------------------------------------------------------------- -->
  <!-- Google Fonts: -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <!-- --------------------------------------------------------------------- -->
  <!-- Google Fonts - Poppins: -->
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <title>
    Deno <?= isset($page_title) ? "| $page_title" : '' ?>
  </title>
</head>

<body class="*:text-indigo-950 min-h-screen flex flex-col">
  <!-- --------------------------------------------------------------------- -->
  <!-- Content: -->
  <?= $content ?>

  <!-- --------------------------------------------------------------------- -->
  <!-- App script: -->
  <script defer src="/public/assets/scripts/main.js"></script>

  <!-- --------------------------------------------------------------------- -->
  <!-- AlpineJS script: -->
  <script defer
    src="/public/assets/scripts/alpinejs/persist-3.14.1.min.js"></script>
  <script defer
    src="/public/assets/scripts/alpinejs/alpinejs-3.14.1.min.js"></script>

  <!-- --------------------------------------------------------------------- -->
  <!-- HTMX script: -->
  <script defer src="/public/assets/scripts/htmx/htmx-2.0.0.min.js"></script>

  <!-- --------------------------------------------------------------------- -->
  <!-- VLibras widget: -->
  <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>

  <!-- --------------------------------------------------------------------- -->
  <!-- VLibras script: -->
  <script defer
    src="/public/assets/scripts/vlibras/vlibras-6.0.0.min.js"></script>
  <script defer>
    document.addEventListener("DOMContentLoaded", () => {
      new window.VLibras.Widget('https://vlibras.gov.br/app');
    });
  </script>
</body>

</html>