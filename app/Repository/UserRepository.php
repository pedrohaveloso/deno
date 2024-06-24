<?

namespace App\Repository;

class UserRepository extends Repository
{
  public static function get_by_email(string $email): array|null
  {
    $query = self::db()->prepare(<<<SQL
      SELECT * FROM "User" WHERE "email" = :email;
    SQL);

    $query->bindValue(':email', $email);

    $query->execute();

    return $query->fetchAll(\PDO::FETCH_ASSOC)[0] ?? null;
  }

  public static function insert(array &$user): bool
  {
    $query = self::db()->prepare(<<<SQL
        INSERT INTO "User" ("fullname", "password", "email")
        VALUES (:fullname, :password, :email)
        RETURNING "id";
      SQL);

    $query->bindValue(':fullname', $user['fullname']);
    $query->bindValue(':password', $user['password']);
    $query->bindValue(':email', $user['email']);

    $result = $query->execute();

    if ($result) {
      $user['id'] = $query->fetchColumn();
    } else {
      return false;
    }

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