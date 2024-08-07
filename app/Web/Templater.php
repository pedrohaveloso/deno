<?

namespace App\Web;

use App\Core\LocalConfig;

trait Templater
{
  protected static function remove_html_comments(string $template): string
  {
    return LocalConfig::get_remove_html_comments()
      ? preg_replace("~<!--(.*?)-->~s", "", $template)
      : $template;
  }

  protected static function render_layout()
  {
  }

  protected static function render_fragments(string $content): string
  {
    $fragments_pattern = '/<([A-Z][\.a-zA-Z0-9]*)([^>]*)>(.*?)<\/\1>/s';

    $content = preg_replace_callback(
      $fragments_pattern,
      function ($matches) {
        $name = $matches[1];
        $attributes_string = $matches[2];
        $children = $matches[3];

        $attributes = [];

        preg_match_all(
          '/([a-zA-Z0-9_:-]+)(?:="([^"]*)")?/',
          $attributes_string,
          $attributes_matches,
          PREG_SET_ORDER
        );

        foreach ($attributes_matches as $attr) {
          $attributes[$attr[1]] = $attr[2] ?? '';
        }

        $printed_attr = [];

        $attr = function (string $name) use ($attributes, $printed_attr) {
          if ($name === 'rest') {
            $rest = '';

            foreach ($attributes as $name => $value) {
              if (in_array($name, $printed_attr)) {
                continue;
              }

              $rest .= " $name=\"$value\" ";
            }

            return $rest;
          }

          $printed_attr[] = $name;

          return $attributes[$name] ?? null;
        };

        ob_start();

        echo '<!-- ------------------------------ -->';
        echo "<!-- $name fragment: -->";

        $scope = function () use ($name, $children, $attr) {
          $name = str_replace('.', '/', $name);

          include FRAGMENTSDIR . $name . '.php';
        };

        $scope();

        $child = ob_get_clean();

        return self::render_fragments($child);
      },
      $content
    );

    return self::remove_html_comments($content);
  }
}
