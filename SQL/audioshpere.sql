-- TABLE - AUDIOS
CREATE TABLE `audiosphere`.`audios` (`ID` INT NOT NULL AUTO_INCREMENT , `audioTitle` VARCHAR(256) NOT NULL , `audioDesc` TEXT NOT NULL , `audioThumb` VARCHAR(256) NOT NULL , `audioFile` VARCHAR(256) NOT NULL , `audioUserID` INT NOT NULL , `audioCategoryID` INT NOT NULL ,  `audioCreated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`ID`)) ENGINE = InnoDB;

-- TABLE - audioUsers
CREATE TABLE `audiosphere`.`audioUsers` (`audioUserID` INT NOT NULL AUTO_INCREMENT , `audioUsername` VARCHAR(256) NOT NULL , `audioUserEmail` VARCHAR(256) NOT NULL , `audioUserPass` VARCHAR(256) NOT NULL , PRIMARY KEY (`audioUserID`)) ENGINE = InnoDB;


-- TABLE - audioCategories
CREATE TABLE `audiosphere`.`audioCategories` (`audioCategoryID` INT NULL AUTO_INCREMENT , `audioCategory` VARCHAR(256) NOT NULL , PRIMARY KEY (`audioCategoryID`)) ENGINE = InnoDB;

--Added Category Image Column
ALTER TABLE `audioCategories` ADD `audioCategoryImage` VARCHAR(256) NOT NULL AFTER `audioCategory`;

--Lisst of categories
INSERT INTO `audioCategories` (`audioCategoryID`, `audioCategory`) VALUES (NULL, 'Arts'), (NULL, 'Business and Finance'), (NULL, 'Comedy'), (NULL, 'Education'), (NULL, 'Fiction'), (NULL, 'Health and Wellness'), (NULL, 'History'), (NULL, 'Language Learning'), (NULL, 'Music'), (NULL, 'News and Politics'), (NULL, 'Parenting'), (NULL, 'Religion and Spirituality'), (NULL, 'Science'), (NULL, 'Self-Improvement'), (NULL, 'Society and Culture'), (NULL, 'Sports'), (NULL, 'Technology'), (NULL, 'Technology and Gaming'), (NULL, 'Travel'), (NULL, 'True Crime');

INSERT INTO `audioCategories` (`audioCategoryID`, `audioCategory`) VALUES (NULL, 'Arts'), (NULL, 'Business'), (NULL, 'Education'), (NULL, 'Fiction'), (NULL, 'Wellbeing'), (NULL, 'History'), (NULL, 'Music'), (NULL, 'Science'), (NULL, 'Sports'), (NULL, 'Technology');


--CONTRAINTS

ALTER TABLE `audios` ADD CONSTRAINT `audioCategoryID` FOREIGN KEY (`audioCategoryID`) REFERENCES `audioCategories`(`audioCategoryID`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `audios` ADD CONSTRAINT `audioUserID` FOREIGN KEY (`audioUserID`) REFERENCES `audioUsers`(`audioUserID`) ON DELETE RESTRICT ON UPDATE RESTRICT;






