
DROP TABLE IF EXISTS users CASCADE;

CREATE TABLE users (
  id SERIAL PRIMARY KEY,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  email VARCHAR(120) NOT NULL UNIQUE,
  phone VARCHAR(15) UNIQUE,
  profile_id INT NOT NULL
);

DROP TABLE IF EXISTS messages CASCADE;

CREATE TABLE messages (
  id SERIAL PRIMARY KEY,
  from_user_id INT NOT NULL,
  to_user_id INT NOT NULL,
  body TEXT,
  is_important BOOLEAN,
  is_delivered BOOLEAN,
  created_at TIMESTAMP
);

DROP TABLE IF EXISTS photo CASCADE;

CREATE TABLE photo (
  id SERIAL PRIMARY KEY,
  url VARCHAR(250) NOT NULL UNIQUE,
  owner_id INT NOT NULL,
  description VARCHAR(250) NOT NULL,
  uploaded_at TIMESTAMP NOT NULL,
  size INT NOT NULL
);

DROP TABLE IF EXISTS video CASCADE;

CREATE TABLE video (
  id SERIAL PRIMARY KEY,
  url VARCHAR(250) NOT NULL UNIQUE,
  owner_id INT NOT NULL,
  description VARCHAR(250) NOT NULL,
  uploaded_at TIMESTAMP NOT NULL,
  size INT NOT NULL
);

DROP TABLE IF EXISTS friendship_statuses CASCADE;

CREATE TABLE friendship_statuses (
  id SERIAL PRIMARY KEY,
  name VARCHAR(30) UNIQUE
);

DROP TABLE IF EXISTS profiles CASCADE;

CREATE TABLE profiles (
  id SERIAL PRIMARY KEY,
  main_photo_id INT,
  created_at TIMESTAMP
);

DROP TABLE IF EXISTS friendship CASCADE;

CREATE TABLE friendship (
  id SERIAL PRIMARY KEY,
  requested_by_user_id INT NOT NULL,
  requested_to_user_id INT NOT NULL,
  status_id INT NOT NULL,
  requested_at TIMESTAMP,
  confirmed_at TIMESTAMP
);
DROP TABLE IF EXISTS subscription CASCADE;

CREATE TABLE subscription (
  id SERIAL PRIMARY KEY,
  communities_id INT NOT NULL UNIQUE,
  subscription_status BOOLEAN,
  subscription_at TIMESTAMP,
  unsubscribe_at TIMESTAMP
);

DROP TABLE IF EXISTS communities CASCADE;

CREATE TABLE communities (
  id SERIAL PRIMARY KEY,
  name VARCHAR(120) UNIQUE,
  creator_id INT NOT NULL,
  video_id INT,
  photo_id INT,
  created_at TIMESTAMP
);

DROP TABLE IF EXISTS communities_users CASCADE;

CREATE TABLE communities_users (
  community_id INT NOT NULL,
  user_id INT NOT NULL,
  created_at TIMESTAMP,
  PRIMARY KEY (community_id, user_id)
);