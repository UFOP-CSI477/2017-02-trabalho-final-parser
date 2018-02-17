# Rede Social Regex. - RSR

# Requisitos

* além dos pacotes padrões do PHP, necessita-se php_mysqld e php_curl

* dotnet core para rodar a API utilizada. - https://www.microsoft.com/net/learn/get-started/

* Servidor WEB, (Apache, Nginx, etc). E configuração para code-igniter (Nginx Codeigniter / URLs amigáveis Apache)

* API FTCRegex clonada do repositório https://github.com/mayc0njr/FTCRegex.

* A API FTCRegex é usada para validação das Tags de expressão regular, sendo seu uso restrito à função "Cadastrar Tags". Ou seja, apenas para visualizar tags já cadastradas ou funções que não criam novas tags, seu uso é dispensável.

* Permissão para criar e conceder permissões a usuários no mysql, para rodar o script que criar o banco de dados com o usuário pre-definido.

# Execucao

* Rodar o Script do Banco de Dados, "script_tabelas.sql" pelo root ou outro usuário com as permissões adequadas.

* Copiar a pasta do projeto para a raiz web do servidor, ou para o diretório definido nas configurações do servidor.

* Rodar a API FTC Regex. (No repositório clonado, execute na raiz do mesmo "dotnet run").

* Acessar a Webpage http://localhost/parserufop
