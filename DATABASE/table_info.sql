/*  create database and use */
CREATE DATABASE infinity_bank;

USE infinity_bank;

/*  First Table Name : account  */
CREATE TABLE account (
    id INT(11) NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(15) NOT NULL,
    father_name VARCHAR(15) NOT NULL,
    surname VARCHAR(15) NOT NULL,
    dob DATE NOT NULL,
    mobile_no VARCHAR(10) NOT NULL,
    email_id VARCHAR(30) NOT NULL,
    address VARCHAR(100) NOT NULL,
    gender VARCHAR(6) NOT NULL,
    aadhaar_no VARCHAR(12) NOT NULL,
    pan_no VARCHAR(10) NOT NULL,
    account_number VARCHAR(10) NOT NULL,
    amount INT(11) NOT NULL,
    PRIMARY KEY (id)
);

/*   Second Table Name :  fd_account  */
CREATE TABLE fd_account (
    id INT(11) NOT NULL AUTO_INCREMENT,
    account_number VARCHAR(10) NOT NULL,
    start_date VARCHAR(15) NOT NULL,
    end_date VARCHAR(15) NOT NULL,
    time INT(11) NOT NULL,
    amount INT(11) NOT NULL,
    interest INT(11) NOT NULL,
    fd_account_number VARCHAR(10) NOT NULL,
    email VARCHAR(40),
    PRIMARY KEY (id)
);

/*   Third Table Name :  gold_loan  */
CREATE TABLE gold_loan (
    id INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    account_number VARCHAR(10) NOT NULL,
    gold_weight INT(11) NOT NULL,
    locker_number INT(11) NOT NULL,
    loan_amount INT(11) NOT NULL,
    interest INT(11) NOT NULL,
    email VARCHAR(30) NOT NULL,
    start_date VARCHAR(15) NOT NULL,
    loan_account_number VARCHAR(10) NOT NULL,
    PRIMARY KEY (id)
);

/*   Fourth Table Name : nominee   */
CREATE TABLE nominee (
    id INT(11) NOT NULL AUTO_INCREMENT,
    n_first_name VARCHAR(15) NOT NULL,
    n_father_name VARCHAR(15) NOT NULL,
   registration n_surname VARCHAR(15) NOT NULL,
    relationship VARCHAR(8) NOT NULL,
    n_address VARCHAR(100) NOT NULL,
    account_number VARCHAR(10) NOT NULL,
    PRIMARY KEY (id)
);

/*   Fifth Table Name : registration   */
CREATE TABLE registration (
    id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(15) NOT NULL,
    PRIMARY KEY (id)
);

/*   Sixth Table Name : statements   */
CREATE TABLE statements (
    id INT(11) NOT NULL AUTO_INCREMENT,
    type VARCHAR(10) NOT NULL,
    date VARCHAR(15) NOT NULL,
    time VARCHAR(10) NOT NULL,
    name VARCHAR(30) NOT NULL,
    from_no VARCHAR(10) NULL,
    account_number VARCHAR(10) NULL,
    amount INT(11) NOT NULL,
    PRIMARY KEY (id)
);

/*  Seventh Table Name : virtual_cards*/
CREATE TABLE virtual_cards (
    id INT(11) NOT NULL AUTO_INCREMENT,
    account_number VARCHAR(10) NOT NULL,
    card_number INT(4) NOT NULL,
    pin INT(4) NOT NULL,
    PRIMARY KEY (id)
);