ALTER TABLE users
ADD CONSTRAINT users_profile_id_fk
FOREIGN KEY (profile_id)
REFERENCES profiles (id) 
ON DELETE CASCADE; 

ALTER TABLE news
ADD CONSTRAINT users_news_id_fk
FOREIGN KEY (author_id)
REFERENCES users (id) 
ON DELETE CASCADE; 

ALTER TABLE news_releases_video
ADD CONSTRAINT users_news_releases_video_fk
FOREIGN KEY (owner_id)
REFERENCES users (id) 
ON DELETE CASCADE; 

ALTER TABLE news_photo
ADD CONSTRAINT users_news_photo_fk
FOREIGN KEY (owner_id)REFERENCES users (id) 
ON DELETE CASCADE;

ALTER TABLE news
ADD CONSTRAINT advertisement_news_id_fk
FOREIGN KEY (advertisement_id)
REFERENCES advertisement (id) 
ON DELETE CASCADE; 

ALTER TABLE news
ADD CONSTRAINT category_news_id_fk
FOREIGN KEY (category_id)
REFERENCES category_news (id) 
ON DELETE CASCADE; 

ALTER TABLE news
ADD CONSTRAINT news_photo_id_fk
FOREIGN KEY (news_photo_id)
REFERENCES news_photo (id) 
ON DELETE CASCADE; 

ALTER TABLE news
ADD CONSTRAINT news_video_id_fk
FOREIGN KEY (news_video_id)
REFERENCES news_releases_video (id) 
ON DELETE CASCADE; 

ALTER TABLE profiles
ADD CONSTRAINT profiles_subscribe_id_fk
FOREIGN KEY (subscribe_id)
REFERENCES subscribe_to_the_news (id) 
ON DELETE CASCADE; 

ALTER TABLE subscribe_to_the_news
ADD CONSTRAINT subscribe_news_category_fk
FOREIGN KEY (category_news_id)
REFERENCES category_news (id) 
ON DELETE CASCADE; 

ALTER TABLE news_releases_video
ADD CONSTRAINT news_releases_video_category_fk
FOREIGN KEY (news_releases_video_category_id)
REFERENCES news_releases_video_category (id) 
ON DELETE CASCADE; 

ALTER TABLE profiles
ADD CONSTRAINT profile_photo_fk
FOREIGN KEY (main_photo_id)
REFERENCES profile_photo (id) 
ON DELETE CASCADE; 

ALTER TABLE profile_photo
ADD CONSTRAINT profile_photo_users_fk
FOREIGN KEY (owner_id)
REFERENCES users (id) 
ON DELETE CASCADE; 

