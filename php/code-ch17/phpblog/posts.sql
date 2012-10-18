CREATE TABLE posts (
                    post_id int(11) NOT NULL auto_increment,
                    category_id int(11) NOT NULL,
                    user_id int(11) NOT NULL,
                    title varchar(150) NOT NULL,
                    body text NOT NULL,
                    posted timestamp,
                    PRIMARY KEY (post_id)
                   );