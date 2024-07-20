<?

namespace App\Repo;

class User extends Repo
{
  public static function get_by_email(string $email): array|null
  {
    return self::table(User::name())
      ->where(User::col('email'), '=', $email)
      ->first();
  }

  public static function insert(array &$user): bool
  {
    $result = self::table(User::name())
      ->insert(
        [User::col('fullname'), $user['fullname']],
        [User::col('email'), $user['email']],
        [User::col('password'), $user['password']],
      );

    if ($result === false) {

      return false;
    }

    $user['id'] = $result;

    return true;
  }

  public static function insert_changeset(array &$user): array
  {
    $changeset_errors = [];

    if (empty($user['fullname'])) {
      $changeset_errors['fullname'] = _('Nome obrigatório.');
    }

    if (empty($user['email'])) {
      $changeset_errors['email'] = _('E-mail obrigatório.');
    }

    if (empty($user['password'])) {
      $changeset_errors['password'] = _('Senha obrigatória.');
    } elseif (mb_strlen($user['password'] < 12)) {
      $changeset_errors['password'] = _('A senha deve ter no mínimo 12 caracteres.');
    }

    $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);

    return $changeset_errors;
  }
}