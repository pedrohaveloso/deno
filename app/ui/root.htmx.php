<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="HTMX + PHP page">

  <link rel="shortcut icon" href="/public/assets/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/public/assets/styles/global.css">

  <title>HTMX</title>
</head>

<body>
  <script defer src="/public/assets/scripts/htmx/htmx-2.0.0.min.js"></script>

  <?= $inner_content ?>
</body>

</html>