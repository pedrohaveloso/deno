# Desenvolvimento

docker compose -f ./priv/docker/dev/docker-compose.yaml up -d

# Prod:

docker compose -f ./priv/docker/prod/docker-compose.yaml up -d

Para implementação futura:

- Aperfeiçoar o QueryBuilder. Atualmente, ele conta apenas com as operações SQL mais simples.

- Pré-processar os arquivos de template (./templates/\*) em ambiente de produção.

  Com o objetivo de otimizar cada requisição feita, as telas devem ser pré-processadas, fazendo o include dos componentes e remoção dos comentários.

  Atualmente, em todas as requisições esses passos são feitos, fazer isso e passar a usar os arquivos processados pode otimizar o site em produção.
