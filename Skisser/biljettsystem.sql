DROP TABLE IF EXISTS adresses;
DROP TABLE IF EXISTS customer_login;
DROP TABLE IF EXISTS tickets;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS eventDate;
DROP TABLE IF EXISTS events;
DROP TABLE IF EXISTS venue;
DROP TABLE IF EXISTS customers;
DROP TABLE IF EXISTS admins;

CREATE TABLE customers (
  username varchar(255) NOT NULL,
  lastName varchar(50) NOT NULL,
  firstName varchar(50) NOT NULL,
  PRIMARY KEY (username)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert  into customers (username,lastName,firstName)
values
("marica.aldman@gmail.com", "Aldman", "Marica"),
("james@cole.com", "Cole", "James");

CREATE TABLE customer_login (
    username varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
  PRIMARY KEY (username),
  CONSTRAINT customerLoginConstraint FOREIGN KEY (username) REFERENCES customers (username)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert  into customer_login (username, password)
values
("marica.aldman@gmail.com", '$2y$10$d.Y7CIbWnod/GKlU3LWycO6dave72Y.bty6Y/MrHbfHUDqZl5mGGe'),
("james@cole.com", '$2y$10$OwJ15X.U.2MCSEyXXruuNOgnIB9XvTfjzmamB5MPKmSCz2WMK0OCW');

CREATE TABLE adresses (
    adressID int(11) NOT NULL,
    username varchar(255) NOT NULL,
    streetadress varchar(50) NOT NULL,
    postalnumber int(11) NOT NULL,
    postaltown  varchar(50) NOT NULL,
  PRIMARY KEY (adressID),
  CONSTRAINT customerAdressConstraint FOREIGN KEY (username) REFERENCES customers (username)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert  into adresses (adressID, username,streetadress,postalnumber,postaltown)
values
(1, "marica.aldman@gmail.com", "Faringe-Ösby Ösbyberg 104", 74010, "Almunge"),
(2, "james@cole.com", "Faringe-Ösby Ösbyberg 104", 74010, "Almunge");

CREATE TABLE events (
    eventID int(11) NOT NULL,
    eventName varchar(255) NOT NULL,
    premere DATE NOT NULL,
    finished DATE,
    director varchar(255) NOT NULL,
    originalLanguage varchar(255) NOT NULL,
    info TEXT NOT NULL,
    price int(11) NOT NULL,
    picture varchar(255),
  PRIMARY KEY (eventID)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert  into events (eventID, eventName, premere, director, originalLanguage, info, price)
values
(1, "Spider-Man", "2019-04-10", "Sam Raimi", "English", "When bitten by a genetically modified spider, a nerdy, shy, and awkward high school student gains spider-like abilities that he eventually must use to fight evil as a superhero after tragedy befalls his family.", 150),
(2, "Hellboy", "2019-04-11", "Neil Marshall", "English", "Based on the graphic novels by Mike Mignola, Hellboy, caught between the worlds of the supernatural and human, battles an ancient sorceress bent on revenge.", 200);

CREATE TABLE venue (
    venueID int(11) NOT NULL,
    theater varchar(55) NOT NULL,
    size int(255) NOT NULL,
  PRIMARY KEY (venueID)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert  into venue (venueID, theater,size)
values
(1, "Salong 1", 310),
(2, "Salong 2", 150);

CREATE TABLE eventDate (
    eventDateID int(11) NOT NULL,
    eventID int(11) NOT NULL,
    venueID int(11) NOT NULL,
    dateAndTime DATETIME NOT NULL,
  PRIMARY KEY (eventDateID),
  CONSTRAINT eventDateEventConstraint FOREIGN KEY (eventID) REFERENCES events (eventID),
  CONSTRAINT eventDateVenueConstraint FOREIGN KEY (venueID) REFERENCES venue (venueID)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert  into eventDate (eventDateID, eventID,venueID,dateAndTime)
values
(1, 1, 1, "2019-05-10 22:00:00"),
(2, 1, 1, "2019-05-11 20:00:00"),
(3, 2, 2, "2019-05-11 22:00:00"),
(4, 2, 2, "2019-05-12 22:00:00");

CREATE TABLE orders (
    orderID int(11) NOT NULL,
    username varchar(255) NOT NULL,
  PRIMARY KEY (orderID)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert  into orders (orderID, username)
values
(1, "marica.aldman@gmail.com"),
(2, "marica.aldman@gmail.com"),
(3, "james@cole.com"),
(4, "james@cole.com");

CREATE TABLE tickets (
    ticketID int(11) NOT NULL,
    eventDateID int(11) NOT NULL,
    username varchar(255) NOT NULL,
    orderID int(11) NOT NULL,
    used int(11) NOT NULL,
  PRIMARY KEY (ticketID),
  CONSTRAINT ticketEventDateConstraint FOREIGN KEY (eventDateID) REFERENCES eventDate (eventDateID),
  CONSTRAINT ticketOrderConstraint FOREIGN KEY (orderID) REFERENCES orders (orderID),
  CONSTRAINT eventDateCustomerConstraint FOREIGN KEY (username) REFERENCES customers (username)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert into tickets (ticketID, eventDateID,username,orderID,used)
values
(1, 1, "marica.aldman@gmail.com", 1, 0),
(2, 3, "marica.aldman@gmail.com", 2, 0),
(3, 1, "james@cole.com", 3, 0),
(4, 3, "james@cole.com", 4, 0);


CREATE TABLE admins (
    username varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
  PRIMARY KEY (username)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert  into admins (username,password)
values
("marica.aldman@gmail.com", '$2y$10$CxbObTDuoGGbu9fidcvtGOKDfP6hABHBCKjCP31yWc1qvt3pJJJtS'),
("james@cole.com", '$2y$10$RszVvzZRYJnPKzBrivJk4eVxKYvadvzRD4FkpHK/kuY5KfjIPupjm');