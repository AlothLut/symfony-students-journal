## Tested on Ubuntu 20.1

## Dependencies:
- Docker
- Docker-compose

## Task:
Реализовать микросервис для работы с журналом студентов. В сервисе две сущности студент и курсы. Каждый студент может посещать любое количество курсов.
Нужно:
1. Релизовать классы для работы с БД (студент: фио, возраст, пол; курс: название курса)
2. Сделать два АПИ:
- Первое АПИ возвращает курсы, которые посещает студент по его ID
- Второе АПИ строит отчёт для военкомата, путём вывода всех студентов мальчиков, которым сейчас 18 лет.

## To check, follow these steps:
1) run ```docker-compose up -d --build```

2) install dependencies ```docker-compose exec -T php-sj bash -c "composer install"```

3) copy /app/.env-example to /app/.env or create yourself

4) run migrations ```docker-compose exec -T php-sj bash -c "php bin/console doctrine:migrations:migrate"```

5) run fixtures ```docker-compose exec -T php-sj bash -c "php bin/console doctrine:fixtures:load"```

6) check  API endpoints http://0.0.0.0/voen and http://0.0.0.0/{students-id}
