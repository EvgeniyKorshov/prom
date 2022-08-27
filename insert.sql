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

INSERT INTO friendship (requested_by_user_id,requested_to_user_id,status_id,requested_at,confirmed_at)
VALUES
  (3,2,1,CURRENT_DATE,CURRENT_DATE),
  (4,2,2,CURRENT_DATE,CURRENT_DATE),
  (6,3,3,CURRENT_DATE,CURRENT_DATE),
  (4,6,4,CURRENT_DATE,CURRENT_DATE),
  (5,4,5,CURRENT_DATE,CURRENT_DATE);

INSERT INTO messages (from_user_id,to_user_id,body,is_important,is_delivered,created_at)
VALUES
  (1,2,'faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis','yes','yes',CURRENT_DATE),
  (4,1,'ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor','yes','yes',CURRENT_DATE),
  (5,3,'a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc','yes','yes',CURRENT_DATE),
  (4,1,'mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam','yes','yes',CURRENT_DATE),
  (1,4,'eget mollis lectus pede et risus. Quisque libero lacus, varius','yes','yes',CURRENT_DATE);

INSERT INTO friendship_statuses (name)
VALUES
  ('et'),
  ('Morbi'),
  ('eu'),
  ('facilisi.'),
  ('id');

INSERT INTO communities_users (community_id,user_id,created_at)
VALUES
  (2,4,CURRENT_DATE),
  (5,3,CURRENT_DATE),
  (3,2,CURRENT_DATE),
  (4,5,CURRENT_DATE),
  (3,5,CURRENT_DATE);

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

INSERT INTO subscription (subscription_status,communities_id,subscription_at,unsubscribe_at)
VALUES
  ('Yes',6,CURRENT_DATE,CURRENT_DATE),
  ('No',7,CURRENT_DATE,CURRENT_DATE),
  ('No',8,CURRENT_DATE,CURRENT_DATE),
  ('No',9,CURRENT_DATE,CURRENT_DATE),
  ('No',10,CURRENT_DATE,CURRENT_DATE);

INSERT INTO communities (name,creator_id,video_id,photo_id,created_at)
VALUES
  ('dis parturient montes, nascetur',1,1,1,CURRENT_DATE),
  ('erat, eget tincidunt',2,2,2,CURRENT_DATE),
  ('mauris sapien, cursus in,',3,3,3,CURRENT_DATE),
  ('Nunc sed orci lobortis',4,4,4,CURRENT_DATE),
  ('quam',5,5,5,CURRENT_DATE);