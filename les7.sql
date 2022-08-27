--Первое задание

--Транзакция

BEGIN;
DELETE FROM users WHERE id = (select users.id from users left join friendship on users.id = friendship.requested_by_user_id where friendship.status_id = 1);
COMMIT;

--Второе задание

SELECT
users.id,
users.first_name,
users.last_name,
COUNT(photo.id)  OVER (PARTITION BY photo.owner_id) AS photo_count,
rank() OVER (PARTITION BY photo.owner_id ORDER BY photo.id ),
COUNT(video.id) OVER (PARTITION BY video.owner_id) AS video_count,
rank() OVER (PARTITION BY photo.owner_id ORDER BY photo.id)
FROM users
left join photo on users.id = photo.owner_id 
left join video on users.id = video.owner_id
ORDER BY users.id;

--Третье задание

SELECT
video.owner_id,
users.first_name,
users.last_name,
avg(video.size)  OVER (PARTITION BY communities.id) AS video,
avg(photo.size) OVER (PARTITION BY communities.id) AS photo
FROM communities
left join photo on communities.photo_id = photo.id 
left join video on communities.video_id = video.id
left join users on users.id = photo.owner_id and  users.id = video.owner_id
WHERE communities.id = 1
ORDER BY communities.id;