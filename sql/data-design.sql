ALTER DATABASE checkendorn CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS profilePersonality;
DROP TABLE IF EXISTS profile;
DROP TABLE IF EXISTS personality;

CREATE TABLE personality (
	personalityId BINARY(16) NOT NULL,
	personalityType CHAR(6) NOT NULL,
	personalityName VARCHAR (20),
	personalityDescription VARCHAR (1000),
	PRIMARY KEY (personalityId)
);

CREATE TABLE profile (
	profileId BINARY(16) NOT NULL,
	profileName VARCHAR(30) NOT NULL,
	profileEmail VARCHAR(100) NOT NULL,
	UNIQUE(profileEmail),
	PRIMARY KEY(profileId)
);

CREATE TABLE profilePersonality (
	profilePersonalityPersonalityId BINARY(16) NOT NULL,
	profilePersonalityProfileId BINARY(16)NOT NULL,
	INDEX(profilePersonalityPersonalityId),
	INDEX(profilePersonalityProfileId),
	FOREIGN KEY(profilePersonalityProfileId) REFERENCES profile(profileId),
	FOREIGN KEY(profilePersonalityPersonalityId) REFERENCES personality(personalityId),
	PRIMARY KEY(profilePersonalityPersonalityId, profilePersonalityProfileId)
);