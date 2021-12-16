<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GB</title>
</head>
<body>
<script>
fetch('/conn_products.php')
  .then(response => response.text())
  .then(commits => document.body.innerHTML = commits);
  /*
    AMD Ryzen 3 1200 | цена: 6900
    описание: Современный процессор AMD Ryzen 3 1200 создан на основе ядра Pinnacle Ridge и имеет 4 потока обработки данных.

    GIGABYTE B450 AORUS ELITE V2 | цена: 3520
    описание: Если вы привыкли ни в чем себя не ограничивать, то выбирайте материнскую плату GIGABYTE B450 AORUS ELITE V2.

    Aerocool VX PLUS 500W | цена: 2080
    описание: Блок питания AEROCOOL VX PLUS 500W подойдет для игровой сборки с одной видеокартой.

    PALIT NVIDIA GeForce RTX 3060 | цена: 80990
    описание: Отлично проявляет себя в играх мощная видеокарта PALIT NVIDIA GeForce RTX 3060 с интерфейсом PCI-E 4.0.

    PCI-E CREATIVE Audigy RX | цена: 5000
    описание: Передовая карта звука PCI-E CREATIVE AudigyRX-7.1 позволяет получать непревзойденный пространственный звук.
  */
 </script> 
 
</body>
</html>