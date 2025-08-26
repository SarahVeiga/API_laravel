
### ✅ **Passo a Passo — Laravel Maps App (OpenStreetMap + Leaflet)**

---

#### **1. Pré-requisitos**

* XAMPP ou ambiente com MySQL
* PHP 8.2+
* Composer
* Node.js + npm (opcional)
* MySQL Workbench ou phpMyAdmin

---

#### **2. Criar Projeto Laravel**

* Use o Composer para criar o projeto Laravel dentro do diretório `htdocs`.

---

#### **3. Configurar `.env`**

* Copie o `.env.example` para `.env` e gere a chave.
* Configure os dados do banco de dados MySQL.

---

#### **4. Criar Banco de Dados**

* Crie o banco no MySQL com charset `utf8mb4`.
* Atualize o `.env` com nome, usuário e senha do banco.

---

#### **5. Criar Migration da Tabela `locations`**

* Crie a migration e defina os campos: nome, descrição, latitude, longitude, endereço, categoria.

---

#### **6. Rodar Migrations**

* Execute `php artisan migrate` para criar as tabelas no banco.

---

#### **7. Criar Model `Location`**

* Defina os campos que podem ser preenchidos e os casts de latitude/longitude como `float`.

---

#### **8. Criar Controllers**

* Crie dois controllers:

  * Um controller **web (resource)** com todas as ações CRUD.
  * Um controller **API REST** com os endpoints para consumo externo.

---

#### **9. Validação no Controller**

* Implemente validações de campos como `name`, `latitude` e `longitude` nos métodos `store` e `update`.

---

#### **10. Rotas**

* `web.php`: redireciona para `locations.index` e define as rotas do controller resource.
* `api.php`: define a API REST com `Route::apiResource()`.

---

#### **11. Views (Blade)**

* Crie as views:

  * `layouts/app.blade.php` (template base com Bootstrap + Leaflet via CDN)
  * `locations/index.blade.php`, `create.blade.php`, `edit.blade.php`, `show.blade.php`

* Use Bootstrap para layout e Leaflet para renderizar o mapa (div com `#map`).

---

Segue Prints:


