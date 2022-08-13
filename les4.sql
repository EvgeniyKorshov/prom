--Вложенные запросы
--Это коррелирующие подзапросы?по другому сделать не получается...

SELECT
id as video_id,
(SELECT string_agg(first_name,',') as name from users where users.id = video.owner_id),
(SELECT string_agg(last_name,',') as surname from users where users.id = video.owner_id),
(SELECT string_agg(url,',') as photo_url from photo where  video.owner_id = photo.owner_id),
url as video_url,
size as video_size
FROM video
where size > 650;

--С помощью join

SELECT
video.id as video_id,
users.first_name,
users.last_name,
photo.url as photo_url,
video.url as video_url,
video.size as video_size
FROM video
JOIN users
ON video.owner_id = users.id
JOIN photo
ON photo.owner_id = users.id
WHERE video.size > 650
order BY video.id;

--Временные таблицы
DROP TABLE IF EXISTS avg_size_video CASCADE

CREATE TEMPORARY TABLE avg_size_video (
video_id INT,
first_name varchar,
last_name varchar,
url_video varchar,
url_photo varchar,
video_size INT
);

INSERT INTO avg_size_video
SELECT
video.id as video_id,
users.first_name,
users.last_name,
photo.url as photo_url,
video.url as video_url,
video.size as video_size
FROM video
JOIN users
ON video.owner_id = users.id
JOIN photo
ON photo.owner_id = users.id;

select video_id,first_name,last_name,url_video,url_photo,video_size from avg_size_video WHERE video_size > 650
order BY video_id;

--Общие табличные выражения

WITH avg_size_video_cte as
(SELECT
video.id ,
users.first_name,
users.last_name,
photo.url as photo_url,
video.url as video_url,
video.size as video_size
FROM video
JOIN users
ON video.owner_id = users.id
JOIN photo
ON photo.owner_id = users.id)
select id,first_name,last_name,video_url,photo_url,video_size 
from avg_size_video_cte 
WHERE video_size > 650
order BY id;

--------------------------------------
