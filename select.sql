--Создать два сложных (многотабличных) запроса с использованием подзапросов.

select 
title,
number_of_views
from news 
where author_id = (select id from users where first_name = 'Xenos');

select 
news.title,
(select url from news_photo where owner_id = news.author_id),
(select url from news_releases_video where owner_id = news.author_id)
from news 
where news.id = 1;

select 
first_name,
last_name,
email,
(select specialization from profiles where profiles.id = users.profile_id),
(select publications from profiles where profiles.id = users.profile_id),
(select subscribe_id from profiles where profiles.id = users.profile_id)
from users
where profile_id = 16;

--Создать два сложных запроса с использованием объединения JOIN и без использования подзапросов.


select 
news.id,
news.title,
news.number_of_views,
profiles.specialization 
from news 
left join users on users.id = news.author_id 
left join profiles on users.profile_id = profiles.id 
where users.first_name = 'Xenos';

select 
users.first_name,
users.last_name,
users.email,
profiles.main_photo_id,
profiles.specialization ,
profiles.publications,
profiles.subscribe_id,
profiles.created_at 
from users 
left join profiles on profiles.id = users.profile_id
where users.id = 10;

--Создать два представления, в основе которых лежат сложные запросы.

DROP VIEW IF EXISTS specific_news;
CREATE VIEW specific_news AS
SELECT
news.title as n,category_news.title as cn
FROM news
left join category_news
on news.category_id = category_news.id
where news.id =1 ;
select n,cn from specific_news;

DROP VIEW IF EXISTS count_news;
CREATE VIEW count_news AS
SELECT 
count(news.id) as all_news,
sum(news.number_of_views) as sum_views,
(select avg(size) from news_releases_video) as avg_size
FROM news;
select all_news,sum_views,avg_size from count_news;

--Создать пользовательскую функцию.

DROP FUNCTION IF EXISTS clean_news;
CREATE FUNCTION clean_news  (x integer) RETURNS integer AS $$
DELETE FROM news
WHERE number_of_views < x;
SELECT number_of_views FROM news WHERE number_of_views < x;
$$ LANGUAGE SQL;
SELECT clean_news(220);

--Создать триггер.

DROP FUNCTION IF EXISTS process_news CASCADE;

CREATE OR REPLACE FUNCTION process_news() RETURNS TRIGGER AS 
$$
    BEGIN
       
        IF (TG_OP = 'DELETE') THEN
            RAISE EXCEPTION 'Удаление запрещено';

        ELSIF (TG_OP = 'UPDATE') THEN
            RAISE EXCEPTION 'Не разрешено внести изменения';
        END IF;

        RETURN new; 

    END;
$$
LANGUAGE plpgsql;

DROP TRIGGER check_author_id ON news;

CREATE TRIGGER check_author_id
  BEFORE UPDATE OR DELETE ON news
    FOR EACH ROW EXECUTE FUNCTION process_news();

UPDATE news SET title = 'Изменено' WHERE id = 1;

--Для одного из запросов, созданных в пункте 6, провести оптимизацию. 
--В качестве отчета приложить планы выполнения запроса, ваш анализ и показать действия, 
--которые улучшили эффективность запроса. 

--Подготовка:
--sudo nano /etc/postgresql/12/main/postgresql.conf
--#shared_preload_libraries = 'pg_stat_statements' # (change requires restart)
--sudo systemctl restart postgresql
--CREATE EXTENSION pg_stat_statements;

--проверяем какие индексы уже есть в таблицах users и profiles

SELECT indexname FROM pg_indexes WHERE tablename = 'users';
SELECT indexname FROM pg_indexes WHERE tablename = 'profiles';

--добавить нужно только внешний ключ для таблицы users.profile_id

CREATE INDEX  users_profile_id_fk ON users (profile_id);

--Выполняем запрос и в отчете видно что поиск просиходит по: Index Scan using users_pkey on users  (cost=0.14..8.15 rows=1 width=498) (actual time=0.032..0.035 rows=1 loops=1 Index Cond: (id = 10))

EXPLAIN ANALYZE select 
users.first_name,
users.last_name,
users.email,
profiles.main_photo_id,
profiles.specialization ,
profiles.publications,
profiles.subscribe_id,
profiles.created_at 
from users 
left join profiles on profiles.id = users.profile_id
where users.id = 10;

--Изменяем логику поиска по users.profile_id и включается поиselect 
users.first_name,
users.last_name,
users.email,
profiles.main_photo_id,
profiles.specialization ,
profiles.publications,
profiles.subscribe_id,
profiles.created_at 
from users 
left join profiles on profiles.id = users.profile_id
where users.profile_id = 10;ск по индексу : Index Scan using users_profile_id_fk on users  (cost=0.14..8.15 rows=1 width=498) (actual time=0.027..0.029 rows=1 loops=1) Index Cond: (profile_id = 10)

EXPLAIN ANALYZE 