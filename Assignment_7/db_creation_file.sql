CREATE DATABASE event_tracker;
use event_tracker;
CREATE TABLE User (
  UserId INT AUTO_INCREMENT,
  FirstName VARCHAR(255),
  LastName VARCHAR(255),
  Email VARCHAR(255),
  Password VARCHAR(32),
  PRIMARY KEY (UserId)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE Event (
  EventId INT AUTO_INCREMENT,
  EventName VARCHAR(255),
  EventType VARCHAR(255),
  EventLocation VARCHAR(255),
  StartTime DATETIME,
  EndTime DATETIME,
  HoursDuration DECIMAL,
  PRIMARY KEY (EventId)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE Groups (
  GroupId INT AUTO_INCREMENT,
  GroupName VARCHAR(255),
  GroupPassword VARCHAR(32),
  GroupAdminId INT,
  PRIMARY KEY (GroupId)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE Calendar (
  CalendarId INT AUTO_INCREMENT,
  UserId INT,
  EventId INT,
  AttendProbability INT,
  PRIMARY KEY (CalendarId)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE GroupMembership (
  GroupMembershipId INT AUTO_INCREMENT,
  UserId INT,
  GroupId INT,
  PRIMARY KEY (GroupMembershipId)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE Share (
  ShareId INT AUTO_INCREMENT,
  GroupId INT,
  CalendarId INT,
  PRIMARY KEY (ShareId)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
