<?

namespace App\Core\Database;

enum JoinType: string
{
  case Inner = 'INNER';
  case Left = 'LEFT';
  case Right = 'RIGHT';
}