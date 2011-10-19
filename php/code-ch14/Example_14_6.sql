CREATE TABLE users (user_id INT NOT NULL AUTO_INCREMENT,
                    first_name VARCHAR(100),
                    last_name VARCHAR(100),
                    username VARCHAR(45),
                    password CHAR(32),
       PRIMARY KEY (user_id));

INSERT INTO users (first_name, last_name, username, password)
VALUES ('Michele','Davis', 'mdavis', MD5('secret'));