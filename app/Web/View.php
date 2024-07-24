<?

namespace App\Web;

final class View
{
  use \App\Web\Templater;

  public static function render(string $name, ...$attributes)
  {
    extract($attributes);

    ob_start();

    echo '<!-- ------------------------------ -->';
    echo "<!-- $name view: -->";

    include VIEWSDIR . $name . '.view.php';

    $content = ob_get_clean();

    if (isset($layout)) {
      ob_start();

      echo '<!-- ------------------------------ -->';
      echo "<!-- $layout layout: -->";

      include LAYOUTSDIR . $layout . '.layout.php';

      $content = ob_get_clean();
    }

    $content = self::render_fragments($content);

    ob_start();
    include TEMPLATESDIR . '/root.template.php';
    $template = ob_get_clean();

    echo self::remove_html_comments($template);
  }
}
