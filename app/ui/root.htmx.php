<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="HTMX + PHP page">

  <link rel="shortcut icon" href="/public/assets/favicon.ico" type="image/x-icon">

  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
  <script defer src="/public/assets/scripts/htmx/htmx-2.0.0.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>

  <title>HTMX</title>
</head>

<body class="*:text-indigo-950">
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