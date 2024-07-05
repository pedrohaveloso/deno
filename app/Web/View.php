<?

namespace App\Web;

final class View
{
  use \App\Web\Templater;

  public static function render(string $name, ...$attributes)
  {
    extract($attributes);

    ob_start();
    include VIEWSDIR . $name . '.view.php';
    $content = ob_get_clean();

    if (isset($layout)) {
      ob_start();
      include LAYOUTSDIR . $layout . '.layout.php';
      $content = ob_get_clean();
    }

    $content = self::render_fragments($content);

    include TEMPLATESDIR . '/root.template.php';
  }
}
