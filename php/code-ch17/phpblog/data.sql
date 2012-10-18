INSERT INTO categories VALUES (1,'Press Releases');
INSERT INTO categories VALUES (2,'Feature Requests');

INSERT INTO posts VALUES (NULL,1,1,'PHP Version 12','PHP Version 12, to be
released third quarter 2020. Featuring the artificial inteligence engine that
writes the code for you.',NULL);
INSERT INTO posts VALUES (NULL,1,1,'MySQL Version 8','Returns winning lotto
number.',NULL);
INSERT INTO posts VALUES (NULL,2,2,'Money Conversion',' Please add functions
for converting between foreign currencies. ',NULL);

INSERT INTO comments VALUES (NULL,1,1,'Correction','Release delayed till the
year 2099',NULL);

INSERT INTO users VALUES (NULL,'Michele','Davis','mdavis',md5('secret'));
INSERT INTO users VALUES (NULL,'Jon','Phillips','jphillips',md5('password'));
INSERT INTO users VALUES (NULL,'Shaoning','Zeng','zengsn',md5('password'));