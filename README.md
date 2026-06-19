#  Short URL Service (Laravel)

Простое REST API для сокращения ссылок.
Пользователь отправляет длинный URL и получает короткий код.
При переходе по короткому коду происходит редирект на оригинальный URL.
Также доступна статистика переходов.

##  Стек технологий
- PHP 8+
- Laravel 10/11
- MySQL
- Docker / Docker Compose
- phpMyAdmin

##  Возможности
- Создание короткой ссылки
- Получение короткого URL
- Редирект по короткому коду (302)
- Подсчёт переходов (clicks)
- Получение статистики по ссылке

---

##  Установка и запуск

```bash
# 1. Клонировать проект


git clone git@github.com:MarsNazirov/laravel_short_url.git
cd laravel_short_url

# 2. Запуск через Docker
docker-compose up -d --build

# 3. Установка зависимостей
docker-compose exec app composer install

# 4. Миграции
docker-compose exec app php artisan migrate

# 5. Запуск приложения
API доступно по:
http://localhost:8000

phpMyAdmin:
http://localhost:8080
логин: root
пароль: root
