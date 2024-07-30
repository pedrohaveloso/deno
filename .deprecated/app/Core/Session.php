<?

namespace App\Core;

class Session
{
  private static bool $started = false;

  private static function start(): void
  {
    if (self::$started) {
      return;
    }

    session_start();
    self::$started = true;
  }

  const SESSION_NAME = 'site_session';

  public static function set(string $key, mixed $value): void
  {
    self::start();

    $_SESSION[self::SESSION_NAME][$key] = $value;
  }

  public static function get(string $key): mixed
  {
    self::start();

    return $_SESSION[self::SESSION_NAME][$key] ?? null;
  }

  public static function unset(string $key): void
  {
    self::start();

    unset($_SESSION[self::SESSION_NAME][$key]);
  }

  public static function destroy(): void
  {
    self::start();

    session_destroy();
  }

  const CURRENT_USER_SESSION_NAME = 'current_user';

  public static function set_user(array $user): void
  {
    self::set(self::CURRENT_USER_SESSION_NAME, $user);
  }

  public static function get_user(): ?array
  {
    return self::get(self::CURRENT_USER_SESSION_NAME);
  }

  public static function user_is_logged(): bool
  {
    return !empty(self::get_user());
  }

  const CURRENT_ADMIN_SESSION_NAME = 'current_admin';

  public static function set_admin(array $admin): void
  {
    self::set(self::CURRENT_ADMIN_SESSION_NAME, $admin);
  }

  public static function get_admin(): ?array
  {
    return self::get(self::CURRENT_ADMIN_SESSION_NAME);
  }

  public static function admin_is_logged(): bool
  {
    return !empty(self::get_admin());
  }

  public static function unset_admin(): void
  {
    self::unset(self::CURRENT_ADMIN_SESSION_NAME);
  }
}