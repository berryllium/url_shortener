<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Url shortener</title>
</head>
<body>
  <h1>Сокарщатель ссылок</h1>
  <h2>Описание API</h2>
  <ul>
    <li>
      <h4>Сокращение ссылки</h4>
      <p>
        Для получения короткой ссылки необходимо отправить POST-запрос на адрес 
        <code> {{$domain}}api/add </code>, указав параметру "url" значение в виде полной
        гипертекстовой ссылки на ресурс.
      </p>
    </li>
    <li>
      <h4>Распаковка ссылки (короткой в длинную)</h4>
      <p>
        Для получения исходной ссылки необходимо отправить GET-запрос на адрес  
        <code> {{$domain}}api/get </code>,
        указав параметру "url" значение в виде уникальной составляющей короткой ссылки.
        Например, <code> {{$domain}}api/get?url=1NUm </code>
      </p>
    </li>
  </ul>
</body>
</html>