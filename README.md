# Desenvolvimento

docker compose -f ./priv/docker/dev/docker-compose.yaml up -d

# Prod:

docker compose -f ./priv/docker/prod/docker-compose.yaml up -d

TODO:

remover comments html

```php
$t = ob_get_clean();
echo preg_replace("~<!--(.*?)-->~s", "", $t);
```
