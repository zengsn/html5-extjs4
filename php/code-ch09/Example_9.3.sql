--
-- Table structure for table authors
--
DROP TABLE IF EXISTS authors;
CREATE TABLE authors (
author_id int(11) NOT NULL auto_increment,
title_id int(11) NOT NULL default '0',
author varchar(125) default NULL,
PRIMARY KEY (author_id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
--
-- Dumping data for table authors
--
INSERT INTO authors VALUES (1,1,'Ellen Siever'),(2,1,'Aaron Weber'),
(3,2,'Arnold Robbins'),(4,2,'Nelson H.F. Beebe');
--
-- Table structure for table books
--
DROP TABLE IF EXISTS books;
CREATE TABLE books (
title_id int(11) NOT NULL auto_increment,
title varchar(150) default NULL,
pages int(11) default NULL,
PRIMARY KEY (title_id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
--
-- Dumping data for table books
--
INSERT INTO books VALUES (1,'Linux in a Nutshell',476),(2,'Classic Shell
Scripting',256);
--
-- Table structure for table purchases
--
DROP TABLE IF EXISTS purchases;
CREATE TABLE purchases (
id int(11) NOT NULL auto_increment,
user varchar(10) default NULL,
title varchar(150) default NULL,
day date default NULL,
PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
--
-- Dumping data for table purchases
--
LOCK TABLES purchases WRITE;
INSERT INTO purchases VALUES (1,'Mdavis','Regular Expression Pocket Reference',
'2005-02-15'),
(2,'Mdavis','JavaScript & DHTML Cookbook','2005-02-10');