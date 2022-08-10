-- Базы данных, уровень 2
-- Создание структуры базы данных, генерация тестовых данных

-- Построение реляционной базы данных
-- https://vk.com/geekbrainsru

-- Создание базы данных

-- Теперь у нас всё готово для создания таблиц, но сначала создадим базу данных vk:
$ sudo su - postgres
psql
postgres=# CREATE DATABASE vk;
           
-- Предоставим все права на базу данных test пользователю gb_user.
postgres=# GRANT ALL PRIVILEGES ON DATABASE vk to gb_user;
 

-- Проверим подключение созданным пользователем, по запросу вводим пароль пользователя gb_user:
psql -Ugb_user vk -h127.0.0.1

-- Также необходимо настроить подключение в приложении (графическом клиенте) pgAdmin.

-- Создание таблиц

-- На данном этапе у нас есть основа для создания структуры базы данных. Создаём таблицы с помощью команды CREATE TABLE. Для получения справочной информации по типам данных и ограничениям на столбцы PostgreSQL можно обратиться к официальной документации 

-- https://postgrespro.ru/docs/postgresql/13/ddl
-- https://postgrespro.ru/docs/postgresql/13/datatype

-- Таблица пользователей
DROP TABLE IF EXISTS users;

CREATE TABLE users (
  id SERIAL PRIMARY KEY,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  email VARCHAR(120) NOT NULL UNIQUE,
  phone VARCHAR(15) UNIQUE,
  main_photo_id INT,
  created_at TIMESTAMP
);

-- Таблица сообщений
DROP TABLE IF EXISTS messages;

CREATE TABLE messages (
  id SERIAL PRIMARY KEY,
  from_user_id INT NOT NULL,
  to_user_id INT NOT NULL,
  body TEXT,
  is_important BOOLEAN,
  is_delivered BOOLEAN,
  created_at TIMESTAMP
);

-- Таблица дружбы
DROP TABLE IF EXISTS friendship;

CREATE TABLE friendship (
  id SERIAL PRIMARY KEY,
  requested_by_user_id INT NOT NULL,
  requested_to_user_id INT NOT NULL,
  status_id INT NOT NULL,
  requested_at TIMESTAMP,
  confirmed_at TIMESTAMP
);

-- Таблица статусов дружбы
DROP TABLE IF EXISTS friendship_statuses;

CREATE TABLE friendship_statuses (
  id SERIAL PRIMARY KEY,
  name VARCHAR(30) UNIQUE
);

-- Таблица сообществ
DROP TABLE IF EXISTS communities;

CREATE TABLE communities (
  id SERIAL PRIMARY KEY,
  name VARCHAR(120) UNIQUE,
  creator_id INT NOT NULL,
  created_at TIMESTAMP
);

-- Таблица связи сообщества - пользователи
DROP TABLE IF EXISTS communities_users;

CREATE TABLE communities_users (
  community_id INT NOT NULL,
  user_id INT NOT NULL,
  created_at TIMESTAMP,
  PRIMARY KEY (community_id, user_id)
);

-- Таблица фотографий
DROP TABLE IF EXISTS photo;

CREATE TABLE photo (
  id SERIAL PRIMARY KEY,
  url VARCHAR(250) NOT NULL UNIQUE,
  owner_id INT NOT NULL,
  description VARCHAR(250) NOT NULL,
  uploaded_at TIMESTAMP NOT NULL,
  size INT NOT NULL
);

-- Таблица видео
DROP TABLE IF EXISTS video;

CREATE TABLE video (
  id SERIAL PRIMARY KEY,
  url VARCHAR(250) NOT NULL UNIQUE,
  owner_id INT NOT NULL,
  description VARCHAR(250) NOT NULL,
  uploaded_at TIMESTAMP NOT NULL,
  size INT NOT NULL
);

-- Таблица подписок на сообщества
DROP TABLE IF EXISTS subscription;

CREATE TABLE subscription (
  id SERIAL PRIMARY KEY,
  communities_id INT NOT NULL UNIQUE,
  subscription_status BOOLEAN,
  subscription_at TIMESTAMP,
  unsubscribe_at TIMESTAMP
);

INSERT INTO subscription (subscription_status,communities_id,subscription_at)
VALUES
  ('Yes',3,CURRENT_DATE),
  ('Yes',2,CURRENT_DATE),
  ('No',4,CURRENT_DATE),
  ('No',1,CURRENT_DATE),
  ('No',5,CURRENT_DATE);
-- Создание тестовых данных
-- http://www.generatedata.com/


-- Создание резервной копии
postgres@vhost:~$ pg_dump vk > vk.dump.sql

-- Восстановление из резервной копии

postgres@vhost:~$ createdb vk_test

-- Загрузим данные в тестовую БД:
postgres@vhost:~$ psql vk_test < vk.dump.sql

-- Или используем команду pg_restore
postgres@vhost:~$ pg_restore -d vk_test -1 vk.dump.sql

-- Проверим успешность загрузки данных, сделаем выборку из любой таблицы:

postgres=# \c vk_test

vk_test=# SELECT * FROM users LIMIT 3;

-- Наполнение данными 

INSERT INTO users (first_name,last_name,email,phone)
VALUES
  ('Ryder','Gilmore','nunc@aol.com','070 5975 8893'),
  ('Dustin','Mcconnell','eros.non@yahoo.edu','(01985) 34448'),
  ('Noah','Juarez','laoreet@yahoo.couk','0800 433053'),
  ('Talon','Avery','consequat.lectus.sit@protonmail.org','0845 46 47'),
  ('Garrison','Pitts','sodales.purus@yahoo.org','070 0120 0341');

INSERT INTO messages (from_user_id,to_user_id,body)
VALUES
  (0,2,'faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis'),
  (4,1,'ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor'),
  (0,3,'a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc'),
  (4,1,'mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam'),
  (1,4,'eget mollis lectus pede et risus. Quisque libero lacus, varius');

INSERT INTO friendship (requested_by_user_id,requested_to_user_id,status_id)
VALUES
  (0,2,1),
  (4,1,2),
  (0,3,3),
  (4,1,4),
  (1,4,5);

INSERT INTO friendship_statuses (name)
VALUES
  ('et'),
  ('Morbi'),
  ('eu'),
  ('facilisi.'),
  ('id');

INSERT INTO communities (name,creator_id)
VALUES
  ('dis parturient montes, nascetur',1),
  ('erat, eget tincidunt',2),
  ('mauris sapien, cursus in,',3),
  ('Nunc sed orci lobortis',4),
  ('quam',5);

INSERT INTO communities_users (community_id,user_id)
VALUES
  (2,1),
  (1,3),
  (3,1),
  (4,5),
  (3,5);

INSERT INTO photo (url,owner_id,description,size,uploaded_at)
VALUES
  ('USJ54UKZ2ER',1,'Nullam ut nisi a odio semper cursus. Integer mollis. Integer tincidunt',192,CURRENT_DATE),
  ('ODE74VZP9JM',2,'ac mattis semper, dui',243,'08/10/22'),
  ('LDL52RTL4LP',3,'In scelerisque scelerisque dui. Suspendisse ac metus vitae',389,CURRENT_DATE),
  ('KAS19XGN8FR',4,'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam',429,CURRENT_DATE),
  ('ICI40OLG6LW',5,'id, libero. Donec consectetuer',980,CURRENT_DATE);

INSERT INTO video (url,owner_id,description,size, uploaded_at)
VALUES
  ('HNU31OJB0SX',1,'purus. Nullam scelerisque neque sed sem egestas blandit.',679,CURRENT_DATE),
  ('HNW77JHZ2NC',2,'per inceptos hymenaeos. Mauris ut quam vel sapien imperdiet ornare.',793,CURRENT_DATE),
  ('JMF00QUG5OF',3,'nisl. Maecenas malesuada fringilla est.',510,CURRENT_DATE),
  ('PIL24LTK1SP',4,'Donec dignissim magna a tortor. Nunc commodo auctor',125,CURRENT_DATE),
  ('ACV53EYG5QS',5,'vulputate velit eu sem. Pellentesque ut ipsum ac',621,CURRENT_DATE);

-- Создание базы и подгрузка из дампа данных

CREATE DATABASE vk_staging;
GRANT ALL PRIVILEGES ON DATABASE vk_staging to gb_user;
psql -Ugb_user vk_staging -h127.0.0.1
psql vk_staging < vk.dump.sql
\c vk_staging
SELECT * FROM users LIMIT 3;