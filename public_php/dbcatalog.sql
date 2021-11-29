    DROP TABLE IF EXISTS images;
    CREATE TABLE images (
    post_id SERIAL PRIMARY KEY,
    address varchar(255),
    size int,
    name varchar(255),
    FOREIGN KEY (post_id) REFERENCES products(id)
    );
    
    DROP TABLE IF EXISTS products;
    CREATE TABLE products (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    price BIGINT,
    catalog_id BIGINT UNSIGNED
    );


    INSERT INTO products (title,price,catalog_id,description) VALUES
    ('AMD Ryzen 3 1200','6900', '1','Современный процессор AMD Ryzen 3 1200 создан на основе ядра Pinnacle Ridge и имеет 4 потока обработки данных.'),
    ('GIGABYTE B450 AORUS ELITE V2','3520', '2','Если вы привыкли ни в чем себя не ограничивать, то выбирайте материнскую плату GIGABYTE B450 AORUS ELITE V2.'),
    ('Aerocool VX PLUS 500W','2080', '3','Блок питания AEROCOOL VX PLUS 500W подойдет для игровой сборки с одной видеокартой.'),
    ('PALIT NVIDIA GeForce RTX 3060','80990', '4','Отлично проявляет себя в играх мощная видеокарта PALIT NVIDIA GeForce RTX 3060 с интерфейсом PCI-E 4.0.'),
    ('PCI-E CREATIVE Audigy RX','5000', '5','Передовая карта звука PCI-E CREATIVE AudigyRX-7.1 позволяет получать непревзойденный пространственный звук.'),
    ('ATX Zalman i3','4020', '6','Представленный на данной странице корпус ATX ZALMAN i3 имеет типоразмер midi-Tower с 5 внутренними отсеками для жестких дисков и 7 слотами расширения.'),
    ('WiFi TP-LINK TL-WN821N USB 2.0','590', '7','Поддерживающий стандарт Wi-Fi 802.11n сетевой адаптер WiFi TP-LINK TL-WN821N обеспечивает высокую скорость передачи данных, которая может достигать 300 Мбит/с.'),
    ('DVD-RW ASUS DRW-24D5MT/BLK/B/AS','1170', '8','Интерфейс SATA Цвет черный Тип поставки OEM'),
    ('AMD Radeon R7 Performance Series R748G2606U2S-UO DDR4 - 8ГБ 2666','2390', '9','В AMD Radeon R7 Performance Series R748G2606U2S-UO сочетается все необходимое для модуля ОЗУ на сегодняшний день.'),
    ('GLACIALTECH IceWind 6015','160', '10','Гарантия на произведенный в Китае вентилятор GLACIALTECH IceWind 6015 составляет полгода. ');

    SELECT products.id,products.title,products.price,products.description,images.address from products JOIN (images) ON (products.id =images.post_id);
    