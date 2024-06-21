<?

namespace App\Repository;

class UserRepository extends Repository
{
  public static function get_by_email(string $email): array|null
  {
    $query = self::db()->prepare(<<<SQL
      SELECT * FROM users WHERE email = :email;
    SQL);

    $query->bindValue(':email', $email);

    $query->execute();

    return $query->fetchAll(\PDO::FETCH_ASSOC)[0] ?? null;
  }

  public static function insert(array $user): bool
  {
    $query = self::db()->prepare(<<<SQL
        INSERT INTO users (fullname, password, email)
        VALUES (:fullname, :password, :email);
      SQL);

    $query->bindValue(':fullname', $user['fullname']);
    $query->bindValue(':password', $user['password']);
    $query->bindValue(':email', $user['email']);

    return $query->execute();
  }

  public static function insert_changeset(array $user): array
  {
    $changeset_errors = [];

    if (empty($user['fullname'])) {
      $changeset_errors['fullname'] = _('Nome obrigatório.');
    }

    if (empty($user['email'])) {
      $changeset_errors['email'] = _('E-mail obrigatória.');
    }

    if (empty($user['password'])) {
      $changeset_errors['password'] = _('Senha obrigatória.');
    }

    return $changeset_errors;
  }
}