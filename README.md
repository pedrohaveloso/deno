# Deno

Qual o objetivo do projeto? Seguir um Figma... <a href="https://www.figma.com/design/KSsVeKaPty3zxZO5QGtrJq/Deno?node-id=0-1&t=xnvj0GpSebZ28mJM-1" target="_blank">Esse Figma</a>.

Basicamente, um _website_ de uma indústria, com seus produtos expostos e um painel backoffice (proposto pela Eficaz na Unimar, aliás). Esse era o objetivo em si, mas quis focar em outro ponto: implementar coisas novas com PHP puro.

Já utilizei alguns _frameworks_ PHP como Laravel, Symfony, CakePHP, mas algumas coisas como componentização visual ao lado de servidor, query builder, roteadores etc., nunca havia implementado na mão antes.

O objetivo se tornou esse, não finalizar um _front-end_ simples, pois bem, espaçamento e responsividade são pontos mais simples, mas sim criar uma estrutura funcional do zero.

Foram várias coisas criadas do zero, mas explicar tudo num README não é útil e levaria muito texto, uma boa conversa ajudaria a explicar melhor. Mas se quiser dar uma olhada no projeto, só ir abrindo as pastas e tentanto ver o fluxo...

# Teste de velocidade, acessibilidade, SEO...

![Teste](/public/assets/images/readme/speedtest.png)

# Imagens do projeto

![Página Home](/public/assets/images/readme/home.png)

![Página de contato](/public/assets/images/readme/contact.png)

![Página de Escolha de Login/Cadastro](/public/assets/images/readme/user_choice.png)

![Página de Login](/public/assets/images/readme/user_login.png)

![Página de Cadastro](/public/assets/images/readme/user_register.png)

# Como rodar?

Primeiramente, tenha o Docker na sua máquina, esse é o único requisito.

Clone o projeto em alguma pasta de seu computador, dentro da pasta do projeto, faça:

```bash
$ docker compose -f ./priv/docker/dev/docker-compose.yaml up -d
```

Pronto, o projeto estará rodando em modo DEV, o modo PROD de rodar ainda não está finalizado.

Mas o banco provavelmente está sem tabelas, você precisará rodar as migrations, para isso, faça:

```bash
$ docker exec -it deno-phpfpm bash

$ php /deno/repo/migrator up
```

Agora o projeto roda por completo em seu computador, parabéns!

# TODO...

Ainda falta a parte funcional do _backoffice_, compra dos produtos etc., mas vou deixar anotado o que falta no quesito técnico:

- Finalizar a feature de internacionalização do sistema.

- Aperfeiçoar o QueryBuilder. Atualmente, ele conta apenas com as operações SQL mais simples.

- Pré-processar os arquivos de template (./templates/\*) em ambiente de produção.

  Com o objetivo de otimizar cada requisição feita, as telas devem ser pré-processadas, fazendo o include dos componentes e remoção dos comentários.

  Atualmente, em todas as requisições esses passos são feitos, fazer isso e passar a usar os arquivos processados pode otimizar o site em produção.

Entre algumas outras coisas ainda não anotadas aqui, mas apenas em minha mente.

# Contatos

WhatsApp: [14 98183-8507](tel:+5514981838507).

E-mail: [contatopedrohalves@gmail.com](mailto:contatopedrohalves@gmail.com).

# Obrigato pela leitura!
