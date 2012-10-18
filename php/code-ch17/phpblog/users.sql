CREATE TABLE users (
                    user_id int(11) NOT NULL auto_increment,
                    first_name varchar(100) NOT NULL,
                    last_name varchar(100) NOT NULL,
                    username varchar(45) NOT NULL,
                    password varchar(32) NOT NULL,
                    PRIMARY KEY (user_id));