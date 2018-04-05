/*
 ************** this file include database sql *******************
 *           this V.1.0 of mazad website at 28 mar 2018          *
 *          this file contains database sql queries              *
 *****************************************************************
*/
CREATE DATABASE Mazad;
USE Mazad;
CREATE TABLE users (id int(11) AUTO_INCREMENT  PRIMARY KEY, 
                                firstName varchar(255) NOT NULL, 
                                lastName varchar(255) NOT NULL,
                                gender TINYINT(2) NOT NULL,
                                userName varchar(255) NOT NULL, 
                                email varchar(255) NOT NULL,
                                birthDate date,
                                userPassword varchar(255) NOT NULL,
                                imagePath varchar(255) DEFAULT "imgs/original.jpg",
                                userRole TINYINT(2) DEFAULT 2,
                                balance int(11) DEFAULT 5,
                                active TINYINT(2) DEFAULT 1,
                                blocked TINYINT(2) DEFAULT 0,
                                rate int(11) DEFAULT 0,
                                UNIQUE(email),
                                UNIQUE(userName));

                                CREATE TABLE notification (
                                id int(11) AUTO_INCREMENT  PRIMARY KEY,
                                fromId int(11) NOT NULL,
                                toId int(11) NOT NULL,
                                kind int(11) NOT NULL,
                                targetLink varchar(255),
                                seen TINYINT(2) DEFAULT 0,
                                notificationTime DATETIME,
                                FOREIGN KEY (fromId) REFERENCES user(id),
                                FOREIGN KEY (toId) REFERENCES user(id))

                                CREATE TABLE session(
                                id int(11) AUTO_INCREMENT  PRIMARY KEY,
                                autoSell int(11) DEFAULT 0,
                                Blind int(11),
                                startTime DATETIME NOT NULL,
                                endTime DATETIME NOT NULL,
                                sessionPassword varchar(255),
                                itemId int(11),
                                sessionOwnerId int(11) NOT NULL,
                                currentOffer int(11) NOT NULL,
                                currentUser int(11),
                                finished TINYINT(2) DEFAULT 0,
                                FOREIGN KEY (sessionOwnerId) REFERENCES user(id),
                                FOREIGN KEY (currentUser) REFERENCES user(id));

                                CREATE TABLE product(
                                id int(11) AUTO_INCREMENT  PRIMARY KEY,
                                imagePath varchar(255) NOT NULL,
                                tags varchar(255),
                                sessionId int(11) NOT NULL,
                                productName varchar(255) NOT NULL,
                                catId int(11) NOT NULL,
                                stars int(11) DEFAULT 0,
                                bidderId int(11),
                                FOREIGN KEY (sessionId) REFERENCES session(id),
                                FOREIGN KEY (catId) REFERENCES categorie(id),
                                FOREIGN KEY (bidderId) REFERENCES user(id))

                                CREATE TABLE categorie(
                            id int(11) AUTO_INCREMENT  PRIMARY KEY,
                            icon varchar(255),
                            catiegorieName varchar(255) NOT NULL,
                            details varchar(255) NOT NULL)

                            CREATE TABLE feedback(
                            id int(11) AUTO_INCREMENT  PRIMARY KEY,
                            feedback varchar(255) NOT NULL,
                            fromId int(11) NOT Null,
                            aboutId int(11) NOT NULL,
                            stars int(11) DEFAULT 0,
                            FOREIGN KEY (fromId) REFERENCES user(id),
                            FOREIGN KEY (aboutId) REFERENCES user(id))

                                CREATE TABLE follow(
                                id int(11) AUTO_INCREMENT  PRIMARY KEY,
                                fromId int(11) NOT NULL,
                                toId int(11) NOT NULL,
                                FOREIGN KEY (fromId) REFERENCES user(id),
                                FOREIGN KEY (toId) REFERENCES user(id))


                                use Mazad;
 ALTER TABLE session ADD FOREIGN KEY (itemId) REFERENCES product(id);