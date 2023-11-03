# oracle_php

CREATE TABLE register_tbl (
    rg_id int GENERATED AS IDENTITY Primary Key ,
    user_name VARCHAR2(50) NOT NULL,
    phonenumber VARCHAR2(20) NOT NULL,
    user_pass VARCHAR2(50) NOT NULL,
    created_at date NULL,
    updated_at date NULL,
);


CREATE TABLE cover_tbl (
    cover_id int GENERATED AS IDENTITY Primary Key,
    artist_name VARCHAR2(255) NOT NULL,
    type_of_song VARCHAR2(50) NOT NULL,
    description VARCHAR2(50) NOT NULL,
    cover_image VARCHAR2(255),
    created_at TIMESTAMP DEFAULT NULL,
    upload_date TIMESTAMP DEFAULT NULL,
);
