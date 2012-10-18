CREATE TABLE comments (
                       comment_id int(11) NOT NULL auto_increment,
                       user_id int(11) NOT NULL,
                       post_id int(11) NOT NULL,
                       title varchar(150) NOT NULL,
                       body text NOT NULL,
                       posted timestamp,
                       PRIMARY KEY (comment_id)
                      );