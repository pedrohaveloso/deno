<?

namespace App\Web;

trait Templater
{
  protected static function render_layout()
  {
  }

  protected static function render_fragments(string $content): string
  {
    $fragments_pattern = '/<([A-Z][\\\a-zA-Z0-9]*)([^>]*)>(.*?)<\/\1>/s';

    $content = preg_replace_callback(
      $fragments_pattern,
      function ($matches) {
        $name = $matches[1];
        $attributes_string = $matches[2];
        $children = $matches[3];

        $attributes = [];

        preg_match_all(
          '/([a-zA-Z0-9_:-]+)="([^"]*)"/',
          $attributes_string,
          $attributes_matches,
          PREG_SET_ORDER
        );

        foreach ($attributes_matches as $attr) {
          $attributes[$attr[1]] = $attr[2];
        }

        ob_start();

        $scope = function () use ($name, $children, $attributes) {
          $name = str_replace('\\', '/', $name);

          include FRAGMENTSDIR . $name . '.php';
        };

        $scope();

        $child = ob_get_clean();

        return self::render_fragments($child);
      },
      $content
    );

    return $content;
  }
}
