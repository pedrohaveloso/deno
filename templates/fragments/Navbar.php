<?

use App\Core\Session;

$current_page = $attr('current-page') ?? '';

$search_element = function (string $responsive) {
  ?>
  <search class="<?= $responsive ?> h-10 max-w-64 bg-indigo-100 rounded-2xl">
    <input type="text" name="search" placeholder="<?= _('Pesquisar...') ?>"
      class="w-full h-full bg-transparent ps-4 outline-none">

    <button aria-label="<?= _('Pesquisar') ?>" class="pe-4">
      <Icon name="search"></Icon>
    </button>
  </search>
  <?
};

$menu_options_element = function () use ($current_page, $search_element) {
  ?>
  <li>
    <a href="/home" class="flex gap-1 <?= $current_page == 'home' ? 'font-bold' : '' ?>">
      <Icon name="home"></Icon>
      <?= _('Início') ?>
    </a>
  </li>

  <li>
    <a href="/products" class="flex gap-1 <?= $current_page == 'products' ? 'font-bold' : '' ?>">
      <Icon name="products"></Icon>
      <?= _('Produtos') ?>
    </a>
  </li>

  <li>
    <a href="/contact" class="flex gap-1 <?= $current_page == 'contact' ? 'font-bold' : '' ?>">
      <Icon name="contact"></Icon>
      <?= _('Atendimento') ?>
    </a>
  </li>

  <li class="flex md:hidden">
    <? $search_element('flex md:hidden w-full !max-w-full !bg-indigo-50') ?>
  </li>
  <?
};

?>

<nav x-data="{ open: false }" class="flex flex-col p-4 sm:px-8 bg-indigo-50 gap-4 drop-shadow-sm">
  <div class="flex justify-between">
    <section class="flex gap-2 items-center">
      <a href="/" aria-label="<?= _('Página inicial') ?>" class="mr-4">
        <Icon name="logo" class="h-10 w-10"></Icon>
      </a>

      <button x-bind:aria-label="open ? '<?= _('Fechar menu') ?>' : '<?= _('Abrir menu') ?>'" x-on:click="open = !open"
        class="lg:hidden">
        <template x-if="!open">
          <Icon name="menu"></Icon>
        </template>

        <template x-if="open">
          <Icon name="close"></Icon>
        </template>
      </button>

      <menu class="hidden lg:flex gap-4">
        <? $menu_options_element() ?>
      </menu>
    </section>

    <section class="flex gap-4 items-center">
      <a href="/cart" aria-label="<?= _('Seu carrinho') ?>" class="flex gap-2">
        <Icon name="cart"></Icon>
        Seu carrinho
      </a>

      <? $search_element('hidden md:flex') ?>

      <a href="<?= Session::user_is_logged() ? '/profile' : '/user/choice' ?>">
        <button aria-label="<?= _('Sua conta') ?>"
          class="bg-indigo-100 hover:bg-indigo-200 transition-all duration-500 rounded-2xl h-10 w-10 grid place-items-center">
          <Icon name="person"></Icon>
        </button>
      </a>
    </section>
  </div>

  <template x-if="open">
    <menu class="flex flex-col lg:hidden gap-4 bg-indigo-100 p-4 rounded-2xl">
      <? $menu_options_element() ?>
    </menu>
  </template>
</nav>