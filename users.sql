CREATE DATABASE `finalproject`;

USE `finalproject`;

CREATE TABLE `contacts`
(
    `id`    int(11) NOT NULL AUTO_INCREMENT,
    `firstName`  varchar(100) NOT NULL,
    `lastName`   varchar(100) NOT NULL,
    `email`     varchar(100) NOT NULL,
    `phoneNumber`   varchar(20) NOT NULL,
    `message`   TEXT NOT NULL,
    primary key (`id`)
);

CREATE TABLE `attorneys`
(
    `id`    int(11) NOT NULL AUTO_INCREMENT,
    `fullName`  varchar(100) NOT NULL,
    `email`     varchar(100) NOT NULL,
    `phoneNumber`   varchar(20) NOT NULL,
    `position`      varchar(50) NOT NULL,
    primary key (`id`)
);

insert into attorneys (fullName, email, phoneNumber, position)
values ('Phoenix Wright', 'phoenixwright@lawfirm.com', '9736711940', 'Partner');

insert into attorneys (fullName, email, phoneNumber, position)
values ('Athena Cykes', 'athenacykes@lawfirm.com', '2158930100', 'Associate');

insert into attorneys (fullName, email, phoneNumber, position)
values ('Apollo Justice', 'apollojustice@lawfirm.com', '2128383926', 'Of Counsel');

insert into attorneys (fullName, email, phoneNumber, position)
values ('Calisto Yew', 'calistoyew@lawfirm.com', '7185035243', 'Paralegal');