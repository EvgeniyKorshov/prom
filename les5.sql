--Первое задание

CREATE ROLE Аналитик;
CREATE ROLE Тестировщик;

--SELECT rolname FROM pg_roles;

CREATE USER "Федор Серов";
CREATE USER "Роман Белов";

--SELECT rolname FROM pg_roles;

ALTER ROLE "Федор Серов" WITH PASSWORD 'some_password';
ALTER ROLE "Роман Белов" WITH PASSWORD 'some_password';

GRANT Аналитик TO "Федор Серов";
GRANT Тестировщик TO "Роман Белов";

--\du

--\c vk

GRANT ALL ON ALL TABLES IN SCHEMA public TO Тестировщик;
GRANT USAGE ON SCHEMA public TO Аналитик;
GRANT SELECT ON ALL TABLES IN SCHEMA public TO Аналитик;

psql -U "Федор Серов" -d vk -h 127.0.0.1 -W;

UPDATE users SET first_name = 'John' WHERE id = 3;

psql -U "Роман Белов" -d vk -h 127.0.0.1 -W;

UPDATE users SET first_name = 'John' WHERE id = 3;

--Второе задание
--Расширение собирает статистику по работе всех баз данных: какие запросы какое время выполнялись, есть ли запросы, особо нагружающие систему, и т.д.

SELECT * FROM pg_available_extensions;
CREATE EXTENSION "pg_stat_statements";
SELECT * FROM pg_extension WHERE extname = 'pg_stat_statements';


--Третье задание

DROP TABLE IF EXISTS users CASCADE;

CREATE TABLE users (
  id SERIAL PRIMARY KEY,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  email VARCHAR(120) NOT NULL UNIQUE,
  phone VARCHAR(15) UNIQUE,
  profile_id INT NOT NULL
);

ALTER TABLE users
ADD CONSTRAINT users_profile_id_fk
FOREIGN KEY (profile_id)
REFERENCES profiles (id);

DROP TABLE IF EXISTS profiles CASCADE;

CREATE TABLE profiles (
  id SERIAL PRIMARY KEY,
  main_photo_id INT,
  created_at TIMESTAMP
);

INSERT INTO users (first_name,last_name,email,phone,profile_id)
VALUES
  ('Ryder','Gilmore','nunc@aol.com','070 5975 8893',1),
  ('Dustin','Mcconnell','eros.non@yahoo.edu','(01985) 34448',2),
  ('Noah','Juarez','laoreet@yahoo.couk','0800 433053',3),
  ('Talon','Avery','consequat.lectus.sit@protonmail.org','0845 46 47',4),
  ('Garrison','Pitts','sodales.purus@yahoo.org','070 0120 0341',5);

  INSERT INTO profiles (main_photo_id,created_at)
VALUES
  (1,CURRENT_DATE),
  (2,CURRENT_DATE),
  (3,CURRENT_DATE),
  (4,CURRENT_DATE),
  (5,CURRENT_DATE);