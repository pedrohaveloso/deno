<?

namespace App\Web;

use App\Core\Database\QueryBuilder;

class Paginator
{
  private function __construct()
  {
  }

  public static function from_query(
    QueryBuilder $query,
    string $target = '#paginator',
    int $page = null,
    int $limit = null
  ): Paginator {
    $paginator = new Paginator();

    if ($page === null) {
      $page = Request::get_data_by_key('paginator')['page'] ?? 1;
    }

    if ($limit === null) {
      $limit = Request::get_data_by_key('paginator')['limit'] ?? 20;
    }

    $paginator->total = $query->count();
    $paginator->results = $query->paginate($page, $limit)->get();
    $paginator->page = $page;
    $paginator->per_page = $limit;
    $paginator->target = $target;

    return $paginator;
  }

  public array $results = [];

  public ?int $page = null;

  public ?int $per_page = null;

  public ?int $total = null;

  public ?string $target = null;

  public function render()
  {
    $filter = http_build_query(['filter' => Request::get_data_by_key('filter')]);
    $base_path = Request::path() . "?$filter" . "&paginator[page]=";

    $disable_return = $this->page <= 1;
    $disable_advance = ($this->page * $this->per_page) > $this->total;

    $return_path = $base_path . ($disable_return ? 1 : $this->page - 1);
    $advance_path = $base_path . ($disable_advance ? $this->page : $this->page + 1);

    $total_pages = ceil($this->total / $this->per_page);

    ?>
    <div class="flex flex-col items-center justify-center gap-2">
      <p>
        <small>
          <? if ($this->total === 1): ?>
            <?= _('Foi encontrado 1 resultado') ?>.
          <? else: ?>
            <?= _('Foram encontrados') . ' ' . $this->total . ' ' . _('resultados') ?>.
          <? endif ?>
        </small>
      </p>

      <div class="flex items-center justify-center gap-4">
        <Button\Primary aria-label="<?= _('Voltar') ?>" <?= $disable_return ? 'disabled="true"' : '' ?>
          hx-get="<?= $return_path ?>" hx-trigger="click" hx-target="<?= $this->target ?>"
          class="grid place-items-center text-base font-normal h-12 w-12">
          <Icon name="chevron_left" class="!h-8 !w-8 *:fill-white"></Icon>
        </Button\Primary>

        <div class="flex items-center justify-center gap-1">
          <? for ($i = 1; $i <= $total_pages; $i++): ?>
            <button aria-label="<?= _('Página') . ' ' . $i ?>" hx-get="<?= "$base_path$i" ?>" hx-trigger="click"
              hx-target="<?= $this->target ?>"
              class="<?= $i == $this->page ? 'bg-indigo-600 text-white' : 'bg-indigo-50' ?> rounded-2xl h-10 w-10 grid place-items-center font-medium">
              <?= $i ?>
            </button>
          <? endfor ?>
        </div>

        <Button\Primary aria-label="<?= _('Avançar') ?>" <?= $disable_advance ? 'disabled="true"' : '' ?>
          hx-get="<?= $advance_path ?>" hx-trigger="click" hx-target="<?= $this->target ?>"
          class="grid place-items-center text-base font-normal h-12 w-12">
          <Icon name="chevron_right" class="!h-8 !w-8 *:fill-white"></Icon>
        </Button\Primary>
      </div>
    </div>
    <?
  }
}