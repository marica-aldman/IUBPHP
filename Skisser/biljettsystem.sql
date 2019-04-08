USE biljettsystem;

DROP TABLE IF EXISTS adresses;
DROP TABLE IF EXISTS customer_login;
DROP TABLE IF EXISTS tickets;
DROP TABLE IF EXISTS eventDate;
DROP TABLE IF EXISTS events;
DROP TABLE IF EXISTS venue;
DROP TABLE IF EXISTS customers;
DROP TABLE IF EXISTS admins;

CREATE TABLE customers (
  customerNumber int(11) NOT NULL,
  lastName varchar(50) NOT NULL,
  firstName varchar(50) NOT NULL,
  PRIMARY KEY (customerNumber)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert  into customers (customerNumber,lastName,firstName)
values
(1, "Aldman", "Marica"),
(2, "Cole", "James");

CREATE TABLE customer_login (
    customerNumber int(11) NOT NULL,
    username varchar(50) NOT NULL,
    password varchar(255) NOT NULL,
  CONSTRAINT customerLoginConstraint FOREIGN KEY (customerNumber) REFERENCES customers (customerNumber)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert  into customer_login (customerNumber,username,password)
values
(1, "marica.aldman@gmail.com", "test"),
(2, "jamesdlcole@gmail.com", "test2");

CREATE TABLE adresses (
    adressID int(11) NOT NULL,
    customerNumber int(11) NOT NULL,
    streetadress varchar(50) NOT NULL,
    postalnumber int(11) NOT NULL,
    postaltown  varchar(50) NOT NULL,
  PRIMARY KEY (adressID),
  CONSTRAINT customerAdressConstraint FOREIGN KEY (customerNumber) REFERENCES customers (customerNumber)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert  into adresses (adressID, customerNumber,streetadress,postalnumber,postaltown)
values
(1, 1, "Faringe-Ösby Ösbyberg 104", 74010, "Almunge"),
(2, 2, "Faringe-Ösby Ösbyberg 104", 74010, "Almunge");

CREATE TABLE events (
    eventID int(11) NOT NULL,
    eventName varchar(255) NOT NULL,
    premere DATETIME NOT NULL,
    finished DATETIME,
    director varchar(255) NOT NULL,
    originalLanguage varchar(255) NOT NULL,
    info TEXT NOT NULL,
    price int(11) NOT NULL,
    picture varchar(255),
  PRIMARY KEY (eventID)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert  into events (eventID, eventName,premere,director,originalLanguage,info,price)
values
(1, "Spider-Man", "2019-04-10 22:00:00", "Sam Raimi", "English", "When bitten by a genetically modified spider, a nerdy, shy, and awkward high school student gains spider-like abilities that he eventually must use to fight evil as a superhero after tragedy befalls his family.", 150),
(2, "Hellboy", "2019-04-11 22:00:00", "Neil Marshall", "English", "Based on the graphic novels by Mike Mignola, Hellboy, caught between the worlds of the supernatural and human, battles an ancient sorceress bent on revenge.", 200);

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
(1, 1, 1, "2019-04-10 22:00:00"),
(2, 1, 1, "2019-04-11 20:00:00"),
(3, 2, 2, "2019-04-11 22:00:00"),
(4, 2, 2, "2019-04-12 22:00:00");

CREATE TABLE tickets (
    ticketID int(11) NOT NULL,
    eventDateID int(11) NOT NULL,
    customerNumber int(11) NOT NULL,
    used int(11) NOT NULL,
  PRIMARY KEY (ticketID),
  CONSTRAINT ticketEventDateConstraint FOREIGN KEY (eventDateID) REFERENCES eventDate (eventDateID),
  CONSTRAINT eventDateCustomerConstraint FOREIGN KEY (customerNumber) REFERENCES customers (customerNumber)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert  into tickets (ticketID, eventDateID,customerNumber,used)
values
(1, 1, 1, 0),
(2, 3, 1, 0),
(3, 1, 2, 0),
(4, 3, 2, 0);

CREATE TABLE admins (
    adminsID int(11) NOT NULL,
    username varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
  PRIMARY KEY (adminsID)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

insert  into admins (adminsID, username,password)
values
(1, "marica.aldman@gmail.com", "qwerty"),
(2, "jamesdlcole@gmail.com", "qwerty");