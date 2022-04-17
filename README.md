# Установка проекта
1. docker-compose build
2. docker-compose up -d 
3. Зайти в контейнер приложения: docker exec -it project_app bash<br />
   - Выполнить установку зависимостей: composer install
   - Создать .env: cp .env.example .env
   - Настроить .env:
       - DB_CONNECTION=mysql
       - DB_HOST=db
       - DB_PORT=3306
       - DB_DATABASE=projectdb
       - DB_USERNAME=root
       - DB_PASSWORD=root
       - REDIS_HOST=redis
       - REDIS_PASSWORD=null
       - REDIS_PORT=6379
   - Сгенерировать ключ: php artisan key:generate
   - Выполнить миграции: php artisan migrate

# Доступ проекта
- Бэкэнд приложение: http://localhost:8080/
- Админер БД: http://localhost:8888/