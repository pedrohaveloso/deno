<?

/**
 * -----------------------------------------------------------------------------
 * Esse é o arquivo responsável pela base de todas as páginas do sistema, 
 * qualquer requisição retornando uma view terá como base esse molde. O restante
 * da página será inserido no local da variável [$inner_content].
 * -----------------------------------------------------------------------------
 */

?>

<!DOCTYPE html>
<html lang="<?= LOCALE ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Deno shop page">

  <link rel="shortcut icon" href="/public/assets/favicon.ico" type="image/x-icon">

  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
  <script defer src="/public/assets/scripts/htmx/htmx-2.0.0.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    * {
      font-family: 'Poppins';
    }

    input:-webkit-autofill,
    input:-webkit-autofill:focus {
      transition: background-color 600000s 0s, color 600000s 0s;
    }

    input[data-autocompleted] {
      background-color: transparent !important;
    }
  </style>

  <title>
    Deno <?= isset($page_title) ? '|' . $page_title : '' ?>
  </title>
</head>

<body class="*:text-indigo-950 min-h-screen flex flex-col">
  <?= $inner_content ?>

  <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>

  <script defer src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>

  <script defer>
    document.addEventListener("DOMContentLoaded", () => {
      new window.VLibras.Widget('https://vlibras.gov.br/app');
    });
  </script>
</body>

</html>