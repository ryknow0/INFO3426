CREATE TABLE Checkout (
  CheckoutId INT AUTO_INCREMENT,
  UserId INT,
  BookId INT,
  CheckoutDate DATETIME,
  DueDate DATETIME,
  ActualReturnDate DATETIME,
  ReturnCondition VARCHAR(255),
  PRIMARY KEY (CheckoutId)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE Book (
  BookId  INT AUTO_INCREMENT,
  Title VARCHAR(255),
  Authors VARCHAR(255),
  PRIMARY KEY (BookId)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE User (
  UserId  INT AUTO_INCREMENT,
  Firstname VARCHAR(255),
  Lastname VARCHAR(255),
  Email VARCHAR(255),
  Password VARCHAR(32),
  PRIMARY KEY(UserId)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE Waitlist (
  WaitingListId INT AUTO_INCREMENT,
  UserId INT,
  BookId INT,
  ListPosition INT,
  WaitTerminatedDate DATETIME,
  PRIMARY KEY  (WaitingListId)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

