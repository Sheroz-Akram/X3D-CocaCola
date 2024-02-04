
-- Model Info Table
CREATE TABLE `modeldata` (
    `ID` INT NOT NULL,
    `modelName` VARCHAR(125) NOT NULL,
    `modelHeading` VARCHAR(125) NOT NULL,
    `tagLine` VARCHAR(125) NOT NULL,
    `description` TEXT NOT NULL,
    `fontFamily` VARCHAR(125) NOT NULL,
    `primaryColor` VARCHAR(125) NOT NULL,
    `secondaryColor` VARCHAR(125) NOT NULL,
    `backgroundColor` VARCHAR(125) NOT NULL,
    `modelTranslation` VARCHAR(125) NOT NULL,
    `modelRotation` VARCHAR(125) NOT NULL,
    `modelUrl` VARCHAR(125) NOT NULL,
    PRIMARY KEY (`ID`)
)

-- Render Images Table
CREATE TABLE `renderimages` (
    `ID` INT NOT NULL,
    `Location` VARCHAR(255) NOT NULL,
    FOREIGN KEY (`ID`) REFERENCES `modeldata`(`ID`)
)