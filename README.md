# ITLabs Test Task – Guest Table API

Тестовое задание для компании ITLabs.  
Проект реализует REST API и административную панель для управления гостями и столами с использованием Symfony 7, API Platform и EasyAdmin.

## 📌 Описание

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

## 🚀 Установка и запуск

### 1. Клонировать репозиторий

```bash
git clone git@github.com:terriblepanic/itlabs-test-task.git
cd itlabs-test-task
````

### 2. Установить зависимости

```bash
composer install
```

### 3. Настроить переменные окружения

В файле `.env` и укажите подключение к БД:

```
DATABASE_URL="mysql://username:password@127.0.0.1:3306/guest_table_api?serverVersion=10.4.32-MariaDB"
```

### 4. Создать базу данных и применить миграции

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

### 5. Создать администратора


* Логин: `admin`
* Пароль: `foo`

Нужно задать вручную:

```bash
php bin/console security:hash-password
# Введите пароль, скопируйте сгенерированный хеш
```

Добавьте пользователя в БД:

```sql
INSERT INTO user (email, password) VALUES ('admin', 'скопированный_хеш_пароля');
```

---

## ⚙️ Запуск сервера

С помощью Symfony CLI:

```bash
symfony serve --no-debug --env=prod
```

Или стандартный PHP сервер:

```bash
php -S localhost:8000 -t public
```

---
