<h1 align="center">
  <img src=".github/icon.png">
  <br>
    My Books API
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
  <a href="#how-to-consume-api">How to Consume API ?</a>
</p>

<div align="center">

![Screenshot1](.github/screenshot1.png)

![Screenshot2](.github/screenshotB.png)

</div>

### Features

<b>API</b> desenvolvida com <b>PHP</b>, <b>Mysql</b>, <b>Rotas</b>, <b>URL amigável</b>, <b>autenticação</b> por <b>JWT</b>, <b>OOP</b> e muito mais.
O projeto consiste da criação de usuários, podendo cada usuário, <b>cadastrar</b>, <b>editar</b> ou <b>deletar</b> seus livros.

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

- Configure o arquivo <b>config.php</b> com suas credenciais de banco de dados e edite o <b>BASE_URL</b> conforme a localização do projeto.

- Copie a pasta do projeto para dentro do servidor <b>Apache</b>.

- Ativar o ModRewrite: <b>comando via terminal</b>: ```a2enmod rewrite``` ou habilitar nas configurações do <b>Apache</b>.

- Executar os comandos <b>DDL</b> e <b>DML</b> do arquivo <b>database.sql</b>, o arquivo se encontra na raiz do projeto.

### How to consume API

Nos exemplos de consumo da <b>API</b>, será utilizado a funcionalidade <b>Fetch API</b> do <b>Javascript</b>.

```js

/**
 * @Route("/", methods: {"GET"})
*/

fetch('http://127.0.0.1/myBooksAPI/')
  .then(res => res.json())
  .then(console.log)

/* {
  "message": "Hey There! 🦍",
  "guide": "https://github.com/EricNeves/myBooksAPI"
} */

```

```js

/**
 * @Route("/users/create", methods: {"POST"})
*/

const config = {
  method: 'POST',
  body: JSON.stringify({ name, email, password })
}

fetch('http://127.0.0.1/myBooksAPI/users/create', config)
  .then(res => res.json())
  .then(console.log)

/* {
  login: "http://127.0.0.1/github/myBooksAPI/users/login",
  message: "Created"
} */

```

```js

/**
 * @Route("/users/login", methods: {"POST"})
*/

const config = {
  method: 'POST',
  body: JSON.stringify({ email, password })
}

fetch('http://127.0.0.1/myBooksAPI/users/login')
  .then(res => res.json())
  .then(console.log)

/* {
  message: "successfully",
  token: your-jwt-token
} */

```

```js

/**
 * @Route("/users", methods: {"GET"})
*/

const config = {
  method: 'GET',
  headers: {
    Authorization: 'Bearer ${your-jwt-token}'
  }
}

fetch('http://127.0.0.1/myBooksAPI/users', config)
  .then(res => res.json())
  .then(console.log)

/* {
  data: {
    "id": your-id,
    "name": your-name,
    "email: your-email,
  }
} */

```

```js

/**
 * @Route("/users/update", methods: {"PUT"})
*/

const config = {
  method: 'PUT',
  body: JSON.stringify({ name, password })
  headers: {
    Authorization: 'Bearer ${your-jwt-token}'
  }
}

fetch('http://127.0.0.1/myBooksAPI/users/update', config)
  .then(res => res.json())
  .then(console.log)

/* {message: 'User updated'} */

```

```js

/**
 * @Route("/books", methods: {"GET"})
*/

const config = {
  method: 'GET',
  headers: {
    Authorization: 'Bearer ${your-jwt-token}'
  }
}

fetch('http://127.0.0.1/myBooksAPI/books')
  .then(res => res.json())
  .then(console.log)

/* {
  "quantity": 0,
  "books": []
} */

```

```js

/**
 * @Route("/books/create", methods: {"POST"})
*/

const config = {
  method: 'POST',
  body: JSON.stringofy({ title, year }),
  headers: {
    Authorization: 'Bearer ${your-jwt-token}'
  }
}

fetch('http://127.0.0.1/myBooksAPI/books/create')
  .then(res => res.json())
  .then(console.log)

/* { "message": "Book created" } */

```

```js

/**
 * @Route("/books/list/{book_id}", methods: {"GET"})
*/

const config = {
  method: 'GET',
  headers: {
    Authorization: 'Bearer ${your-jwt-token}'
  }
}

fetch('http://127.0.0.1/myBooksAPI/books/list/{book_id}')
  .then(res => res.json())
  .then(console.log)

/* {
  book: {
    "id": book_id,
    "title": book_title,
    "year_created": book_year,
    "user_id": user_id,
  }
} */

```

```js

/**
 * @Route("/books/update/{book_id}", methods: {"PUT"})
*/

const config = {
  method: 'PUT',
  body: JSON.stringify({ title, year }),
  headers: {
    Authorization: 'Bearer ${your-jwt-token}'
  }
}

fetch('http://127.0.0.1/myBooksAPI/update/{book_id}')
  .then(res => res.json())
  .then(console.log)

/* {message: 'Book updated'} */

```

```js

/**
 * @Route("/books/remove/{book_id}", methods: {"DELETE"})
*/

const config = {
  method: 'DELETE',
  headers: {
    Authorization: 'Bearer ${your-jwt-token}'
  }
}

fetch('http://127.0.0.1/myBooksAPI/books/remove/{book_id}')
  .then(res => res.json())
  .then(console.log)

/* {message: 'Book deleted'} */

```


### License 📃

<img src="https://img.shields.io/github/license/ericneves/myBooksAPI?style=flat-square&logo=github&logoColor=white&color=red" alt="License">

---

### Author 🧑‍💻
><a href="https://www.instagram.com/ericneves_dev/"><img src="https://img.shields.io/badge/Instagram-E4405F?style=for-the-badge&logo=instagram&logoColor=white"></a> <a href="https://linkedin.com/in/ericnevesrr"> <img src="https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white"></a>
