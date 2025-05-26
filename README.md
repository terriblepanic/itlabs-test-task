# ITLabs Test Task – Guest Table API

Тестовое задание для компании ITLabs.  
Проект реализует REST API и административную панель для управления гостями и столами с использованием Symfony 7, API Platform и EasyAdmin.

## Описание

Данное приложение позволяет:
- Управлять столами и гостями (CRUD через админку)
- Просматривать статистику по количеству гостей и присутствующих
- Вести учёт присутствия гостей за столами
- Использовать защищённую авторизацию (логин: `admin`, пароль: `foo`)

## Стек технологий

- **PHP 8.2+**
- **Symfony 7**
- **API Platform**
- **EasyAdminBundle**
- **Doctrine ORM**
- **MariaDB/MySQL**

## Установка

**Клонируйте репозиторий:**
   ```
   git clone git@github.com:terriblepanic/itlabs-test-task.git
   cd itlabs-test-task```
  ```
**Установите зависимости:**

   ```
   composer install
  ```

**Создайте файл окружения `.env.local` при необходимости и настройте подключение к базе данных:**

   ```
   DATABASE_URL="mysql://username:password@127.0.0.1:3306/guest_table_api?serverVersion=10.4.32-MariaDB"
```
**Соберите и примените миграции:**

   ```
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
```
**Создайте пользователя-админа (если нужно вручную):**

   > Админ по умолчанию:
   > Логин: `admin`
   > Пароль: `foo`

   Если необходимо вручную создать пользователя-админа, выполните:

   ```
   php bin/console security:hash-password
   # (вставьте пароль, скопируйте хеш)
```

Затем добавьте пользователя напрямую в БД или через PHPMyAdmin:
```
INSERT INTO user (email, roles, password) VALUES ('admin', '["ROLE_ADMIN"]', 'скопированный_хеш_пароля');
```

Запустите сервер:
```
symfony serve --no-debug --env=prod
```
или

```
php -S localhost:8000 -t public
```
