# Deno

Primeiramente, vamos saber o objetivo do projeto:

A criação de um catálogo virtual para uma loja, com apresentação dos produtos, preços, cadastro e entrada de usuários, além de uma área backoffice para controle dos produtos e estoques, com gerência de pedidos.

Para isso, pensei em usar nosso querido PHP, mas algo diferente... Sem algum framework como Laravel ou Symfony (como já utilizei antes), sem também uma estrutura front-end grande como Vue ou Svelte.

O objetivo técnico foi utilizar apenas PHP puro, com um projeto focado em renderização no lado do servidor e pequenas mudanças de estados ao lado do cliente apenas quando necessário.

Para isso, criei uma estrutura do zero para diversar coisas no PHP:

Como um sistema de componentes visuais controlados/renderizados ao lado do servidor. Além de views, layouts e templates. Dando uma olhada no fluxo do projeto, é possível entender como isso funciona.

Também migrator próprio para controle das migrations do projeto. Ainda no campo do banco, um query builder próprio com funções simples, utilizando, claro, PDO.

Ainda há outras coisas criadas, toda a estrutura do projeto foi feita do zero, no vídeo anexado acima (que você deve ver para entender o projeto) tudo (ou quase tudo) foi explicado.

# Imagens do projeto

# Desenvolvimento

docker compose -f ./priv/docker/dev/docker-compose.yaml up -d

# Prod:

docker compose -f ./priv/docker/prod/docker-compose.yaml up -d

Para implementação futura:

- Finalizar a feature de internacionalização do sistema.

- Aperfeiçoar o QueryBuilder. Atualmente, ele conta apenas com as operações SQL mais simples.

- Pré-processar os arquivos de template (./templates/\*) em ambiente de produção.

  Com o objetivo de otimizar cada requisição feita, as telas devem ser pré-processadas, fazendo o include dos componentes e remoção dos comentários.

  Atualmente, em todas as requisições esses passos são feitos, fazer isso e passar a usar os arquivos processados pode otimizar o site em produção.
