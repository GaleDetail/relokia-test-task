# Relokia PHP Developer Test Task

## Завдання

1. Зареєструватися на платформі Zendesk або Freshdesk.
2. Встановити PhpStorm, Insomnia, Docker, Docker-compose та xDebug.
3. Запустити два контейнери (nginx та php 7.4) за допомогою docker-compose і налаштувати xDebug у PHP контейнері.
4. Встановити Composer і бібліотеку Guzzle.
5. Написати скрипт на PHP, який буде отримувати Tickets з обраної платформи через API, використовуючи Guzzle, і зберігати їх у CSV файл.

### Версії
* PHP: 7.4
* Nginx: latest
* Composer: latest
* Guzzle: 7.x

## Як запустити

1. Клонувати репозиторій:
```
git clone <repository_url>
cd project-root
```
2. Запустити Docker-контейнери:
```
docker-compose up -d
```
3. Встановити залежності через Composer:
```
docker-compose run php composer install
```
4. Налаштувати xDebug в PhpStorm згідно з інструкціями.

## Конфігурація

5. Заповнити файл `config/config.php` необхідними даними:
    ```php
    return [
        'zendesk' => [
            'subdomain' => 'your_zendesk_subdomain',
            'username' => 'your_email',
            'token' => 'your_api_token',
        ],
        'csv' => [
            'path' => 'path/to/your/output.csv',
        ],
    ];
    ```
4. Відкрити в браузері http://localhost:8080 і переконайтеся, що в папці **output**  зявився ```tickets.csv```

