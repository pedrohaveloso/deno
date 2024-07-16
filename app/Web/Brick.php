<?

namespace App\Web;

final class Brick
{
  use \App\Web\Templater;

  public static function get(string $name, ...$attributes)
  {
    extract($attributes);

    ob_start();
    include BRICKSDIR . '/' . $name . '.brick.php';
    $brick_content = ob_get_clean();

    $brick_content = self::render_fragments($brick_content);

    return $brick_content;
  }

  public static function get_render(string $name, ...$attributes)
  {
    self::render(self::get($name, $attributes));
  }

  public static function render(string $brick_content)
  {
    echo $brick_content;
  }

  public static function redirect(string $to)
  {
    ?>
    <div>
      <meta http-equiv="refresh" content="0; url=<?= $to ?>">
    </div>
    <?
  }
}
