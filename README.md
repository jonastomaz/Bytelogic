# BYTELOGIC

Sistema web desenvolvido para gerenciamento e resolução de questões, com área de autenticação, painel administrativo e gerenciamento do banco de dados.

## 📌 Sobre o Projeto

O BYTELOGIC é um sistema desenvolvido em **PHP**, **MySQL**, **HTML5**, **CSS3** e **JavaScript**, permitindo que usuários realizem login e respondam questões cadastradas por administradores.

O sistema possui uma área exclusiva para administração, onde é possível gerenciar questões e controlar o conteúdo disponibilizado aos usuários.

---

## 🚀 Funcionalidades

### Usuário

* Login no sistema
* Acesso às questões cadastradas
* Interface responsiva
* Logout seguro

### Administrador

* Login administrativo
* Cadastro de novas questões
* Gerenciamento do banco de dados
* Área administrativa protegida
* Logout
---

## 🛠 Tecnologias Utilizadas

* PHP
* MySQL
* HTML5
* CSS3
* JavaScript

---

## 📂 Estrutura do Projeto

```text
BYTELOGIC/
│
├── index.php
├── login.php
├── logout.php
├── admin.php
├── iniciarAdmin.php
├── cadastrarQuestao.php
├── conexao.php
│
├── css/
│   ├── style.css
│   ├── admin.css
│   └── cadastrarQuestao.css
│
├── js/
│
├── imagens/
│
└── banco/
    └── bytelogic.sql
```

---

## ⚙️ Como Executar

### 1. Clone o repositório

```bash
git clone https://github.com/jonastomaz/Bytelogic.git
```

### 2. Coloque o projeto na pasta do servidor

Exemplo utilizando o XAMPP:

```text
xampp/htdocs/BYTELOGIC
```

### 3. Crie o banco de dados

Abra o phpMyAdmin e execute o arquivo:

```
bd_bytelogic.sql
```
### 4. Configure a conexão

Edite o arquivo:
```
conexao.php
```
Informando:

* Host
* Usuário
* Senha
* Nome do banco

### 5. Execute o projeto

Abra o navegador e acesse:

```
http://localhost/BYTELOGIC/
```

---

## 🔒 Segurança

O sistema possui:

* Autenticação de usuários
* Controle de sessão
* Área administrativa protegida
* Logout com encerramento da sessão
---

## 📈 Melhorias Futuras

* Recuperação de senha
* Edição e exclusão de questões
* Controle de níveis de acesso
* Histórico de respostas
* Estatísticas de desempenho
* Dashboard administrativo
* Responsividade aprimorada
* Validação de formulários
* Pesquisa e filtros de questões

---

## 👨‍💻 Autor

Projeto desenvolvido por Jonas Tomaz. 
