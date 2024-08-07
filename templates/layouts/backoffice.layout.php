<div x-data="{ open: $persist(false) }" class="flex flex-grow">
  <aside x-bind:class="open ? 'w-64 !flex' : 'w-24 !flex'"
    class="hidden fixed h-screen p-8 bg-indigo-950 text-white transition-width duration-300 items-center justify-center">

    <nav class="flex flex-col justify-between h-full">
      <button class="flex gap-2"
        x-bind:aria-label="open ? '<?= _('Fechar menu') ?>' : '<?= _('Abrir menu') ?>'"
        x-on:click="open = !open">
        <template x-if="!open">
          <Icon name="menu" class="*:fill-white"></Icon>
        </template>

        <template x-if="open">
          <Icon name="close" class="*:fill-white"></Icon>
        </template>

        <span x-show="open" class="transition-opacity duration-300"
          x-bind:class="{'opacity-0': !open}">
          <?= _('Fechar') ?>
        </span>
      </button>

      <menu class="flex flex-col gap-6">
        <li>
          <a href="/admin/profile" class="flex gap-2"
            aria-label="<?= _('Sua conta') ?>">
            <Icon name="satisfied" class="*:fill-white"></Icon>

            <span x-show="open" class="transition-opacity duration-300"
              x-bind:class="{'opacity-0': !open}">
              <?= _('Sua conta') ?>
            </span>
          </a>
        </li>

        <li>
          <a href="/backoffice/users" class="flex gap-2"
            aria-label="<?= _('Usuários') ?>">
            <Icon name="person" class="*:fill-white"></Icon>

            <span x-show="open" class="transition-opacity duration-300"
              x-bind:class="{'opacity-0': !open}">
              <?= _('Usuários') ?>
            </span>
          </a>
        </li>

        <li>
          <a href="/backoffice/admins" class="flex gap-2"
            aria-label="<?= _('Administradores') ?>">
            <Icon name="shield_person" class="*:fill-white"></Icon>

            <span x-show="open" class="transition-opacity duration-300"
              x-bind:class="{'opacity-0': !open}">
              <?= _('Administradores') ?>
            </span>
          </a>
        </li>

        <li>
          <a href="/backoffice/carts" class="flex gap-2"
            aria-label="<?= _('Carrinhos') ?>">
            <Icon name="cart" class="*:fill-white"></Icon>

            <span x-show="open" class="transition-opacity duration-300"
              x-bind:class="{'opacity-0': !open}">
              <?= _('Carrinhos') ?>
            </span>
          </a>
        </li>

        <li>
          <a href="/backoffice/products" class="flex gap-2"
            aria-label="<?= _('Produtos') ?>">
            <Icon name="products" class="*:fill-white"></Icon>

            <span x-show="open" class="transition-opacity duration-300"
              x-bind:class="{'opacity-0': !open}">
              <?= _('Produtos') ?>
            </span>
          </a>
        </li>

        <li>
          <a href="/backoffice/categories" class="flex gap-2"
            aria-label="<?= _('Categorias') ?>">
            <Icon name="category" class="*:fill-white"></Icon>

            <span x-show="open" class="transition-opacity duration-300"
              x-bind:class="{'opacity-0': !open}">
              <?= _('Categorias') ?>
            </span>
          </a>
        </li>
      </menu>

      <a href="/admin/logoff" class="flex gap-2" aria-label="<?= _('Sair') ?>">
        <Icon name="logout" class="*:fill-white"></Icon>

        <span x-show="open" class="transition-opacity duration-300"
          x-bind:class="{'opacity-0': !open}">
          <?= _('Sair') ?>
        </span>
      </a>
    </nav>
  </aside>

  <div class="flex-grow ms-24">
    <?= $content ?>
  </div>
</div>