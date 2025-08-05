# Laravel CRUD API

Проект представляет собой RESTful API для управления пользователями, постами и комментариями, построенный на Laravel.

## Требования

- PHP 8.2+
- MySQL 8.0+
- Composer

## Установка

1. Клонируйте репозиторий:
```bash
git clone https://github.com/
cd laravel-crud-api
```

2. Установите зависимости:
```bash
composer install
```

3. Настройте окружение:
```bash
cp .env.example .env
php artisan key:generate
```

4. Настройте базу данных в `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_crud_api
DB_USERNAME=root
DB_PASSWORD=
```

5. Запустите миграции и сиды:
```bash
php artisan migrate --seed
```

6. Запустите сервер:
```bash
php artisan serve
```

## Docker установка

Альтернативно можно использовать Docker:

```bash
docker-compose up -d --build
docker-compose exec app composer install
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate --seed
```

API будет доступно по адресу: `http://localhost:8000`

## API Endpoints

### Пользователи
- `GET /api/users` - Список пользователей
- `POST /api/users` - Создать пользователя
- `GET /api/users/{id}` - Получить пользователя
- `PUT /api/users/{id}` - Обновить пользователя
- `DELETE /api/users/{id}` - Удалить пользователя
- `GET /api/users/{id}/posts` - Посты пользователя
- `GET /api/users/{id}/comments` - Комментарии пользователя

### Посты
- `GET /api/posts` - Список постов
- `POST /api/posts` - Создать пост
- `GET /api/posts/{id}` - Получить пост
- `PUT /api/posts/{id}` - Обновить пост
- `DELETE /api/posts/{id}` - Удалить пост
- `GET /api/posts/{id}/comments` - Комментарии поста

### Комментарии
- `GET /api/comments` - Список комментариев
- `POST /api/comments` - Создать комментарий
- `GET /api/comments/{id}` - Получить комментарий
- `PUT /api/comments/{id}` - Обновить комментарий
- `DELETE /api/comments/{id}` - Удалить комментарий

## Тестирование

Для запуска тестов:

```bash
php artisan test
```

Или с Docker:
```bash
docker-compose exec app php artisan test
```

## Документация API

Документация Swagger доступна после запуска сервера:
```
http://localhost:8000/api/documentation
```

Для генерации документации:
```bash
php artisan l5-swagger:generate
```

## Структура БД

### Таблицы
- **users**: id, name, created_at, updated_at
- **posts**: id, user_id, body, created_at, updated_at
- **comments**: id, post_id, user_id, body, created_at, updated_at

## Используемые технологии

- Laravel 11
- MySQL
- Swagger для документации
- Docker
- PHPUnit для тестирования

## Лицензия

MIT License.