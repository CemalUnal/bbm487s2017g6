CREATE TABLE library.users (
id INT NOT NULL AUTO_INCREMENT ,
name VARCHAR(50) NOT NULL,
surname VARCHAR(50) NOT NULL,
email VARCHAR(50) UNIQUE,
password VARCHAR(200),
admin boolean,
PRIMARY KEY(id,email)
);

CREATE TABLE library.books (
id INT NOT NULL AUTO_INCREMENT ,
name VARCHAR(50) NOT NULL,
author VARCHAR(50) NOT NULL,
year INT,
available boolean,
barcode VARCHAR(50) NOT NULL UNIQUE,
PRIMARY KEY(id,barcode)
);

CREATE TABLE library.userbooks (
userid INT ,
bookid INT ,
loandate DATE,
returndate DATE,
returned boolean,
paid boolean,
FOREIGN KEY (userid) REFERENCES library.users(id),
FOREIGN KEY (bookid) REFERENCES library.books(id),
PRIMARY KEY(userid,bookid)
);

CREATE TABLE library.waitlist (
userid INT NOT NULL ,
bookid INT NOT NULL ,
waitdate DATETIME NOT NULL,
FOREIGN KEY (userid) REFERENCES library.users(id),
FOREIGN KEY (bookid) REFERENCES library.books(id),
PRIMARY KEY(userid,bookid,waitdate)
);

CREATE TABLE library.messages (
userid INT NOT NULL ,
message VARCHAR(200) NOT NULL ,
messagedate DATETIME,
alreadyread boolean,
FOREIGN KEY (userid) REFERENCES library.users(id),
FOREIGN KEY (bookid) REFERENCES library.books(id),
PRIMARY KEY(userid,bookid,messagedate,alreadyread)
);




