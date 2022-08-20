--Третье задание из пятого урока,забыл связать таблицу профилей и фото

ALTER TABLE profiles
ADD CONSTRAINT profiles_main_photo_id_fk
FOREIGN KEY (main_photo_id)
REFERENCES photo (id);


--Далее шестой урок
--Первое задание

DROP FUNCTION IF EXISTS user_most_active_by_messages;

CREATE FUNCTION user_most_active_by_messages()
RETURNS integer AS
$$
SELECT from_user_id as from_user_id 
FROM messages
GROUP BY from_user_id
ORDER BY COUNT(*) DESC
LIMIT 1;
$$
LANGUAGE SQL;

SELECT user_most_active_by_messages();

--Второе задание


CREATE OR REPLACE PROCEDURE checking_for_the_owner
(main_photo_id_moderated int)
LANGUAGE PLPGSQL AS
$$
DECLARE owner_id RECORD;

BEGIN
FOR owner_id IN
select * from profiles LEFT JOIN photo 
ON photo.id = profiles.main_photo_id where photo.id != profiles.main_photo_id

LOOP
UPDATE profiles SET main_photo_id = main_photo_id_moderated WHERE main_photo_id != owner_id.main_photo_id;
END LOOP;

COMMIT;
END;

$$;


CALL checking_for_the_owner(null);


SELECT * FROM profiles;

--Третье задание

CREATE OR REPLACE FUNCTION update_main_photo_id_trigger()
RETURNS TRIGGER AS
$$
 BEGIN 
 IF (TG_OP = 'UPDATE')  THEN
 IF(old.main_photo_id != new.main_photo_id ) THEN
 RAISE EXCEPTION 'не разрешено внести изменения в столбец идентификатор фотографии';
 END IF;
 END IF;
 RETURN NULL;
END
$$
LANGUAGE PLPGSQL;


DROP TRIGGER check_main_photo_id_on_update ON profiles;
CREATE TRIGGER check_main_photo_id_on_update BEFORE UPDATE ON profiles
FOR EACH ROW
EXECUTE FUNCTION update_main_photo_id_trigger();


SELECT main_photo_id FROM profiles WHERE id = 1;
UPDATE profiles SET main_photo_id = 122 WHERE id = 1;
SELECT main_photo_id FROM profiles WHERE id = 1;

--Четвертое задание

DROP VIEW IF EXISTS video_view;

CREATE VIEW video_view AS
SELECT video.size,video.id
FROM video
LEFT JOIN users
ON video.owner_id =  users.id
WHERE video.size > 100
LIMIT 2;

select video_view.size,video_view.id from video_view;
UPDATE video_view SET size = 2000 WHERE id = 1;

--ERROR:  cannot update view "video_view"
--ПОДРОБНОСТИ:  Views containing LIMIT or OFFSET are not automatically updatable.
--ПОДСКАЗКА:  To enable updating the view, provide an INSTEAD OF UPDATE trigger or an unconditional ON UPDATE DO INSTEAD rule.

CREATE VIEW video_uploaded_at_last_month AS
 SELECT * FROM video
 WHERE uploaded_at > (CURRENT_DATE - interval '1 month');

 SELECT owner_id FROM video_uploaded_at_last_month LIMIT 3;
 UPDATE video_uploaded_at_last_month SET owner_id = 2 WHERE id = 1;
 SELECT owner_id FROM video_uploaded_at_last_month WHERE id = 1;

 SELECT owner_id FROM video WHERE id = 1;