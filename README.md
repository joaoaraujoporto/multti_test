##### Este repositório contém a solução ao teste proposto para avaliar as habilidades práticas do candidato João Porto à vaga de Desenvolvedor(a) Back-end na Multti.

## Sumário
1. [Configuração do ambiente de execução](#configuração-do-ambiente-de-execução)
1. [Uso da API](#uso-da-api)

## Configuração do ambiente de execução

Para executar a API presente neste repositório utilizando um container Docker basta ter o docker-compose instalado e executar, a partir da pasta raiz do repositório, o seguinte comando:

    $ docker-compose up -d

Com isso o container será criado e sua linha de comando pode ser acessada com o comando:

    $ docker exec -it <container_id_app> bash

O comando docker-compose também criará um container com um servidor PostgreSQL que pode ser acessado via linha de comando de forma semelhante:

    $ docker exec -it <container_id_db> bash

Após acessar a linha de comando do container da API, execute o seguinte comando para criar as tabelas da API no banco de dados

    $ php ./artisan migrate

## Uso da API

Veja [aqui a documentação da API](https://documenter.getpostman.com/view/15577728/UVC5F87A) para informações de como usá-la.