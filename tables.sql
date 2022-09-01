        CREATE DATABASE rbk_news;
       
        DROP TABLE IF EXISTS users CASCADE;

        CREATE TABLE users (
        id SERIAL PRIMARY KEY,
        first_name VARCHAR(50) NOT NULL,
        last_name VARCHAR(50) NOT NULL,
        email VARCHAR(120) NOT NULL UNIQUE,
        profile_id INT NOT NULL
        );

        DROP TABLE IF EXISTS profiles CASCADE;

        CREATE TABLE profiles (
        id SERIAL PRIMARY KEY,
        main_photo_id INT,
        specialization VARCHAR(120) UNIQUE,
        publications INT DEFAULT 0,
        subscribe_id INT,
        created_at TIMESTAMP
        );

        DROP TABLE IF EXISTS news CASCADE;

        CREATE TABLE news (
        id SERIAL PRIMARY KEY,
        title VARCHAR(250) NOT NULL,
        description VARCHAR(250) NOT NULL,
        number_of_views INT DEFAULT 0,
        author_id INT NOT NULL,
        advertisement_id INT NOT NULL,
        category_id INT NOT NULL,
        news_photo_id INT ,
        news_video_id INT,
        created_at TIMESTAMP
        );

        DROP TABLE IF EXISTS category_news CASCADE;

        CREATE TABLE category_news (
        id SERIAL PRIMARY KEY,
        title VARCHAR(250) NOT NULL
        );


        DROP TABLE IF EXISTS subscribe_to_the_news CASCADE;

        CREATE TABLE subscribe_to_the_news (
        id SERIAL PRIMARY KEY,
        category_news_id INT NOT NULL,
        subscription_status BOOLEAN,
        subscription_at TIMESTAMP,
        unsubscribe_at TIMESTAMP
        );

        DROP TABLE IF EXISTS advertisement CASCADE;

        CREATE TABLE advertisement (
        id SERIAL PRIMARY KEY,
        title VARCHAR(250) NOT NULL,
        description VARCHAR(250) NOT NULL
        );

        DROP TABLE IF EXISTS news_releases_video CASCADE;

        CREATE TABLE news_releases_video (
        id SERIAL PRIMARY KEY,
        url VARCHAR(250) NOT NULL UNIQUE,
        owner_id INT NOT NULL,
        description VARCHAR(250) NOT NULL,
        uploaded_at TIMESTAMP NOT NULL,
        size INT NOT NULL,
        news_releases_video_category_id INT NOT NULL
        );

        DROP TABLE IF EXISTS news_releases_video_category CASCADE;

        CREATE TABLE news_releases_video_category (
        id SERIAL PRIMARY KEY,
        title VARCHAR(250) NOT NULL
        );

        DROP TABLE IF EXISTS news_photo CASCADE;

        CREATE TABLE news_photo (
        id SERIAL PRIMARY KEY,
        url VARCHAR(250) NOT NULL UNIQUE,
        owner_id INT NOT NULL,
        description VARCHAR(250) NOT NULL,
        uploaded_at TIMESTAMP NOT NULL,
        size INT NOT NULL
        );


        DROP TABLE IF EXISTS profile_photo CASCADE;

        CREATE TABLE profile_photo (
        id SERIAL PRIMARY KEY,
        url VARCHAR(250) NOT NULL UNIQUE,
        owner_id INT NOT NULL,
        uploaded_at TIMESTAMP NOT NULL,
        size INT NOT NULL
        );
