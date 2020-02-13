## Url shortener (Сокращатель ссылок).

<p>Url shortener - сервис, позволяющий сделать из любой длинной ссылки короткую типа 
<code>https://shortener.ru/RoGc</code>.
В результате пользователь переходит по удобной короткой ссылке,
после чего сервис переадресовывает его по оригинальному адресу.</b></p>

## Руководство по развертыванию.

<ol>
  <li>Поместите все файлы проекта в директорию сайта</li>
  <li>Настройте веб сервер таким образом, чтобы для публичного доступа была доступна только папка public</li>
  <li>Установите все зависимости проекта с помощью composer командой <code>composer install</code></li>
  <li>Создайте базу данных для работы проекта</li>
  <li>В файле .env, лежащей в корне проекта, укажите настройки для доступа к Вашей базе данных</li>
  <li>В конфигурационном файле myconfig.php укажите ваш домен и длину коротких ссылок (по умолчанию 4)</li>
  <li>Создайте таблицы проекта одним из способов:</li>
  <ul>
    <li>Выполните в командрой строке <code>php artisan migrate</code></li>
    <li>Импортируйте в Вашу базу данных дамп url_shortener.sql, находящийся в каталоге dump корня проекта</li>
  </ul>
  <li>Готово. Руководство по API сервиса доступно по адресу <code><i>имя домена/</i>api/help</code></li>
</ol>


