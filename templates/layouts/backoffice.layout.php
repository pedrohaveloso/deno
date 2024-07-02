<div x-data="{ open: true }" class="flex flex-grow">
  <aside x-bind:class="open ? 'w-64' : 'w-24'"
    class="min-h-screen p-8 bg-indigo-950 text-white transition-width duration-300 flex items-center justify-center">

    <nav class="flex flex-col justify-between h-full">
      <button class="flex gap-2" x-bind:aria-label="open ? '<?= _('Fechar menu') ?>' : '<?= _('Abrir menu') ?>'"
        x-on:click="open = !open">
        <template x-if="!open">
          <_icon name="menu" class="*:fill-white"></_icon>
        </template>

        <template x-if="open">
          <_icon name="close" class="*:fill-white"></_icon>
        </template>

        <span x-show="open" class="transition-opacity duration-300" x-bind:class="{'opacity-0': !open}">
          <?= _('Fechar') ?>
        </span>
      </button>

      <menu class="flex flex-col gap-6">
        <li>
          <a href="/admin/profile" class="flex gap-2">
            <_icon name="satisfied" class="*:fill-white"></_icon>

            <span x-show="open" class="transition-opacity duration-300" x-bind:class="{'opacity-0': !open}">
              <?= _('Sua conta') ?>
            </span>
          </a>
        </li>

        <li>
          <a href="/backoffice/users" class="flex gap-2">
            <_icon name="person" class="*:fill-white"></_icon>

            <span x-show="open" class="transition-opacity duration-300" x-bind:class="{'opacity-0': !open}">
              <?= _('Usuários') ?>
            </span>
          </a>
        </li>

        <li>
          <a href="/backoffice/admins" class="flex gap-2">
            <_icon name="shield_person" class="*:fill-white"></_icon>

            <span x-show="open" class="transition-opacity duration-300" x-bind:class="{'opacity-0': !open}">
              <?= _('Administradores') ?>
            </span>
          </a>
        </li>

        <li>
          <a href="/backoffice/carts" class="flex gap-2">
            <_icon name="cart" class="*:fill-white"></_icon>

            <span x-show="open" class="transition-opacity duration-300" x-bind:class="{'opacity-0': !open}">
              <?= _('Carrinhos') ?>
            </span>
          </a>
        </li>

        <li>
          <a href="/backoffice/products" class="flex gap-2">
            <_icon name="products" class="*:fill-white"></_icon>

            <span x-show="open" class="transition-opacity duration-300" x-bind:class="{'opacity-0': !open}">
              <?= _('Produtos') ?>
            </span>
          </a>
        </li>

        <li>
          <a href="/backoffice/categories" class="flex gap-2">
            <_icon name="category" class="*:fill-white"></_icon>

            <span x-show="open" class="transition-opacity duration-300" x-bind:class="{'opacity-0': !open}">
              <?= _('Categorias') ?>
            </span>
          </a>
        </li>
      </menu>

      <a href="/admin/logoff" class="flex gap-2">
        <_icon name="logout" class="*:fill-white"></_icon>

        <span x-show="open" class="transition-opacity duration-300" x-bind:class="{'opacity-0': !open}">
          <?= _('Sair') ?>
        </span>
      </a>
    </nav>
  </aside>

  <div class="flex-grow">
    <?= $inner_content ?>
  </div>
</div>