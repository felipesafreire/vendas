# Projeto Vendas

Projeto desenvolvido o back-end em Laravel e o front-end Vue.js

## Instalação
<ul>
  <li>Para executar o projeto do back-end é preciso criar um banco de dados MySQL antes com o nome de <strong>vendas</strong>.</li>
  <li>Configurar o arquivo <strong>.env</strong> na raiz do projeto com a conexão do MySQL (DB_HOST=127.0.0.1, DB_PORT=3306, DB_DATABASE=vendas, DB_USERNAME=root, DB_PASSWORD=).</li>
  <li>Instalando as dependências do back-end e rodando o projeto</li>
</ul>

```bash
cd backend
composer install # instalar as dependencias do projeto
php artisan migrate
php artisan db:seed
php artisan serve
```

Instalando as dependências do front-end e rodando o projeto
```bash
cd frontend
npm i # instalar as dependencias do projeto
npm run serve
```

