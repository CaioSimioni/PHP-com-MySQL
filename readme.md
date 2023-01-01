# Como usar PHP com MySQL utilizando PDO.

## 1° Preparando ambiente

- Servidor Apache
Antes de tudo tenha um Servidor Apache com o PDO(PHP Data Objects) intalado, visto que o PDO será um facilitador para conectar com o Banco de Dados e fazer as requisições.
Eu recomento o [Wampserver](https://www.wampserver.com/en/), pois já vem com o PDO e o MySQL prontos para utilizarmos.

- POO
Também será necessário ter conhecimento de como funciona a POO(Programação Orientada a Objetos).
Caso nunca tenha visto sobre como funciona, o Curso em Vídeo e suas alunas de [POO](https://youtube.com/playlist?list=PLHz_AreHm4dmGuLII3tsvryMMD7VgcT7x).

## 2° Criando o Banco de Dados

No seu ambiente MySQL crie o banco `my_database`, com a tabela `users` que possuí os campos `id, nome e senha`.

Ou copie o comando abaixo:
~~~MySQL
    CREATE DATABASE my_database;
~~~
~~~MySQL
    CREATE TABLE users(
        id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        name VARCHAR(64) NOT NULL,
        pass VARCHAR(40) NOT NULL 
    );
~~~
Resultando em:
my_database  | 
------------ |
id (int) |
name (varchar) |
pass (varchar) |

## 3° Mão na massa

Agora sim!  Com tudo pronto, veja o código disponibilizado nesse repositório e aprenda como utilizar **Banco de Dados** com **PHP**, usando PDO e POO.
