<h1 align="center">
  <img src=".github/icon.png">
  <br>
    Books API
  <br>
</h1>

<h4 align="center">
  API RESTFul desenvolvida com <b>PHP</b>, <b>Mysql</b>, autenticação por <b>JWT</b>, <b>CRUD</b> de dados, rotas e entre outros.
</h4>

<p align="center">
  <img src="https://img.shields.io/github/last-commit/ericneves/myBooksAPI?style=flat-square&logo=github&logoColor=yellow&color=yellow">
  <img src="https://img.shields.io/github/languages/top/ericneves/myBooksAPI?style=flat-square&logo=php&logoColor=blue&labelColor=white">
  <img src="https://img.shields.io/github/license/ericneves/myBooksAPI?style=flat-square&logo=github&logoColor=white&color=red">
</p>

<p align="center">
  <a href="#features">Features</a> •
  <a href="#how-to-use">How to User ?</a>
</p>

<div align="center">

![Screenshot1](.github/screenshot1.png)

![Screenshot2](.github/screenshotB.png)

</div>

URI: [In Progress]()

### Features

API desenvolvida com <b>PHP</b>, <b>Mysql</b>, <b>Rotas</b>, <b>URL amigável</b>, autenticação por <b>JWT</b>, <b>OOP</b> e muito mais.

* PHP
  - <b>JWT</b>
  - <b>PDO (Mysql)</b>
  - <b>OOP </b>
  - <b>Routes</b>
  - <b>SPL - Autoload</b>
* MYSQL
  - <b>DDL</b>
  - <b>DML</b>

### How to use

Segue-se alguns passos para a execução da aplicação:

- Iniciar o servidor <b>Apache</b> e o <b>Mysql</b>.

- Configure o arquivo config.php com suas credenciais de banco de dados e edite o BASE_URL conforme a necessidade.

- Copie a pasta do projeto para dentro do servidor <b>Apache</b>.

- Ativar o ModRewrite: <b>comando via terminal</b>: ```a2enmod rewrite``` ou habilitar nas configurações do <b>Apache</b>.

- Executar os comandos <b>DDL</b> e <b>DML</b> do arquivo <b>database.sql</b>, o arquivo se encontra na raiz do projeto.

### How to consume API

Nos exemplos de consumo da <b>API</b>, será utilizado a funcionalidade <b>Fetch API</b> do <b>Javascript</b>.

```js
// @Route "/" => Home

fetch('http://URL/myBooksAPI/')
  .then(res => res.json())
  .then(console.log)

```


### License 📃

<img src="https://img.shields.io/github/license/ericneves/myBooksAPI?style=flat-square&logo=github&logoColor=white&color=red" alt="License">

---

### Author 🧑‍💻
><a href="https://www.instagram.com/ericneves_dev/"><img src="https://img.shields.io/badge/Instagram-E4405F?style=for-the-badge&logo=instagram&logoColor=white"></a> <a href="https://linkedin.com/in/ericnevesrr"> <img src="https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white"></a>