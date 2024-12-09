# Sistema de Comanda de Restaurante

Este projeto é um sistema simples de comanda de restaurante desenvolvido em PHP, MySQL, HTML, CSS e JavaScript. Ele permite:

- Exibir um cardápio de produtos.
- Adicionar itens do cardápio à comanda (carrinho).
- Finalizar o pedido, armazenando os dados no banco de dados.
- Exibir, em uma página de administração, todos os pedidos realizados.

## Estrutura de Arquivos

```
|-- index.php          (Página principal do cliente)
|-- styles.css         (Estilos CSS gerais)
|-- script.js          (Scripts JavaScript)
|-- admin.php          (Página de administração para ver pedidos)
|-- db_connect.php     (Conexão com o banco de dados)
|-- process_order.php  (Processamento do pedido)
|-- create_tables.sql  (Script SQL para criar as tabelas)
```

### Descrição dos Arquivos

- **index.php**:  
  Página principal do sistema. Exibe o cardápio (produtos) e permite adicionar itens ao carrinho, bem como finalizar o pedido.

- **styles.css**:  
  Folha de estilo responsável pela aparência visual da aplicação, incluindo layout das páginas, estilização dos itens do cardápio e dos pedidos.

- **script.js**:  
  Código JavaScript que gerencia o carrinho no lado do cliente (front-end). Permite adicionar, remover itens e enviar o pedido para o back-end via AJAX.

- **admin.php**:  
  Página para administração do sistema. Exibe uma lista de todos os pedidos realizados, incluindo detalhes dos itens de cada pedido.

- **db_connect.php**:  
  Arquivo de conexão com o banco de dados MySQL. Nele você deve configurar as credenciais de acesso ao banco (host, usuário, senha e nome do banco).

- **process_order.php**:  
  Endpoint PHP que recebe o pedido do front-end (carrinho), insere o pedido e seus itens no banco de dados, e retorna um JSON com o status da operação.

- **create_tables.sql**:  
  Script SQL que cria as tabelas necessárias no banco de dados e insere alguns produtos de exemplo. Deve ser executado antes de rodar a aplicação.

## Configuração do Ambiente

1. **Instalar dependências**:  
   Certifique-se de ter um ambiente com PHP e MySQL instalados. Pode ser um servidor local como [XAMPP](https://www.apachefriends.org/pt_br/index.html) ou [WampServer](https://www.wampserver.com/), ou um ambiente configurado manualmente com Apache/Nginx + PHP + MySQL.

2. **Clonar o repositório**:  
   Clone o repositório do GitHub para a pasta do seu servidor web local. Por exemplo, se estiver usando o XAMPP:
   ```bash
   cd C:\xampp\htdocs\
   git clone https://github.com/seu-usuario/seu-repositorio.git restaurante_comanda
   ```

3. **Criar o Banco de Dados**:  
   Crie um banco de dados no MySQL e ajuste as credenciais no arquivo `db_connect.php`. Por exemplo, se o nome do seu BD é `restaurante`, usuário `root` e senha vazia:
   ```php
   $host = "localhost";
   $user = "root";
   $pass = "";
   $dbname = "restaurante";
   ```

   Em seguida, rode o script `create_tables.sql`:
   ```bash
   mysql -u root -p restaurante < create_tables.sql
   ```

4. **Verificação da Conexão**:  
   Certifique-se de que o `db_connect.php` aponta para o banco de dados correto e que as tabelas foram criadas.

## Utilização

- **Acessar a página principal (index.php)**:  
  Abra em seu navegador:  
  [http://localhost/restaurante_comanda/index.php](http://localhost/restaurante_comanda/index.php)  
  Aqui você verá o cardápio com produtos de exemplo.  
  - Adicione itens ao carrinho.
  - Finalize o pedido clicando em "Finalizar Pedido".
  - Será exibido um alerta com o ID do pedido criado no banco de dados.

- **Acessar a página de administração (admin.php)**:  
  [http://localhost/restaurante_comanda/admin.php](http://localhost/restaurante_comanda/admin.php)  
  Nesta página, você verá todos os pedidos já feitos, com seus detalhes.

## Customizações e Extensões

- **Adicionar/Remover Produtos**:  
  Os produtos iniciais são definidos no script `create_tables.sql`. Para adicionar novos produtos, insira novos registros na tabela `produtos`.

- **Autenticação no Admin**:  
  Por questões de simplicidade, não há controle de acesso à página `admin.php`. Para uso em produção, recomenda-se implementar autenticação (login/senha).

- **Melhorias no Layout**:  
  Ajuste o `styles.css` para personalizar a aparência. Também é possível adicionar frameworks como Bootstrap ou Tailwind.

- **Validações e Segurança**:  
  O código serve como exemplo básico. Em um ambiente de produção, implemente validações de entrada, proteção contra SQL Injection (usamos prepared statements, mas é sempre bom revisar), e HTTPS para segurança.

## Suporte

Caso tenha dúvidas ou problemas, abra uma [issue](https://github.com/seu-usuario/seu-repositorio/issues) no repositório do GitHub.
