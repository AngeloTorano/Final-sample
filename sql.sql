-- ------------------------------
-- Roles Table
-- ------------------------------
CREATE TABLE Roles (
    RoleID INT AUTO_INCREMENT PRIMARY KEY,
    RoleName ENUM('Admin', 'City Coordinator', 'Country Coordinator', 'Supply Manager') UNIQUE,
    Created_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Updated_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ------------------------------
-- Users Table
-- ------------------------------
CREATE TABLE Users (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    RoleID INT,
    FirstName VARCHAR(100),
    LastName VARCHAR(100),
    Username VARCHAR(10) UNIQUE,
    PasswordHash VARCHAR(255),
    PhoneNumber VARCHAR(20),
    City VARCHAR(100),
    Country VARCHAR(100),
    Created_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Updated_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (RoleID) REFERENCES Roles(RoleID)
);

-- ------------------------------
-- Materials Table
-- ------------------------------
CREATE TABLE Materials (
    MaterialID INT AUTO_INCREMENT PRIMARY KEY,
    MaterialName VARCHAR(100),
    Unit VARCHAR(20),
    Description TEXT,
    Created_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Updated_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ------------------------------
-- Inventory Table
-- ------------------------------
CREATE TABLE Inventory (
    InventoryID INT AUTO_INCREMENT PRIMARY KEY,
    MaterialID INT,
    Location VARCHAR(100),
    Quantity INT DEFAULT 0,
    LastUpdatedBy INT,
    Created_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Updated_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (MaterialID) REFERENCES Materials(MaterialID),
    FOREIGN KEY (LastUpdatedBy) REFERENCES Users(UserID)
);

-- ------------------------------
-- Patients Table
-- ------------------------------
CREATE TABLE Patients (
    PatientID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(100),
    Surname VARCHAR(100),
    Gender ENUM('Male', 'Female'),
    DOB DATE,
    MobileNumber VARCHAR(20),
    AlternativeNumber VARCHAR(20),
    CityOrVillage VARCHAR(100),
    RegionOrDistrict VARCHAR(100),
    Created_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Updated_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ------------------------------
-- Education and Employment
-- ------------------------------
CREATE TABLE Education_Employment (
    EEID INT AUTO_INCREMENT PRIMARY KEY,
    PatientID INT,
    IsCurrentlyInSchool BOOLEAN,
    SchoolName VARCHAR(150),
    SchoolPhone VARCHAR(30),
    HighestEducation ENUM('None', 'Primary', 'Secondary', 'Post Secondary'),
    EmploymentStatus ENUM('Employed', 'Self Employed', 'Not Employed'),
    Created_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Updated_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (PatientID) REFERENCES Patients(PatientID)
);

-- ------------------------------
-- Visit Types Table
-- ------------------------------
CREATE TABLE VisitTypes (
    VisitTypeID INT AUTO_INCREMENT PRIMARY KEY,
    Type ENUM('Service Center', 'School', 'Other'),
    Created_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Updated_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ------------------------------
-- Visits Table
-- ------------------------------
CREATE TABLE Visits (
    VisitID INT AUTO_INCREMENT PRIMARY KEY,
    PatientID INT,
    VisitTypeID INT,
    Phase ENUM('Phase 1', 'Phase 2', 'Phase 3'),
    VisitDate DATE,
    City VARCHAR(100),
    IsReturnVisit BOOLEAN,
    ServiceOrSchoolName VARCHAR(150),
    SchoolYear ENUM('1st', '2nd', '3rd', 'Patient Unreachable'),
    Created_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Updated_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (PatientID) REFERENCES Patients(PatientID),
    FOREIGN KEY (VisitTypeID) REFERENCES VisitTypes(VisitTypeID)
);

-- ------------------------------
-- General Hearing Questions Table
-- ------------------------------
CREATE TABLE GeneralHearingQuestions (
    QuestionID INT AUTO_INCREMENT PRIMARY KEY,
    PatientID INT,
    VisitID INT,
    HasHearingLoss BOOLEAN,
    UsesSignLanguage BOOLEAN,
    UsesSpeech BOOLEAN,
    HearingLossCause ENUM('Medication', 'Meningitis', 'Aging', 'Ear Infection', 'HIV', 'Tuberculosis', 'Malaria', 'Trauma', 'Birth', 'Other', 'Unknown'),
    HasTinnitus BOOLEAN,
    HasEarPain BOOLEAN,
    AdultSatisfactionLevel ENUM('Unsatisfied', 'Undecided', 'Satisfied'),
    RepeatsInConversation ENUM('No', 'Sometimes', 'Yes'),
    Created_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Updated_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (PatientID) REFERENCES Patients(PatientID),
    FOREIGN KEY (VisitID) REFERENCES Visits(VisitID)
);

-- ------------------------------
-- Ear Findings Table
-- ------------------------------
CREATE TABLE EarFindings (
    FindingID INT AUTO_INCREMENT PRIMARY KEY,
    VisitID INT,
    Side ENUM('Left', 'Right'),
    Wax BOOLEAN,
    Infection BOOLEAN,
    Tinnitus BOOLEAN,
    Atresia BOOLEAN,
    Perforation BOOLEAN,
    OtherFinding VARCHAR(255),
    ClearForImpression BOOLEAN,
    ClearForFitting BOOLEAN,
    MedicalRecommendation BOOLEAN,
    Medication ENUM('Antibiotic', 'Analgesic', 'Antiseptic', 'Antifungal'),
    Created_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Updated_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (VisitID) REFERENCES Visits(VisitID)
);

-- ------------------------------
-- Hearing Screening
-- ------------------------------
CREATE TABLE HearingScreening (
    ScreeningID INT AUTO_INCREMENT PRIMARY KEY,
    VisitID INT,
    Side ENUM('Left', 'Right'),
    Method ENUM('Audiogram', 'WFA', 'Voice Test'),
    Result ENUM('Pass', 'Fail'),
    Created_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Updated_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (VisitID) REFERENCES Visits(VisitID)
);

-- ------------------------------
-- Hearing Satisfaction
-- ------------------------------
CREATE TABLE HearingSatisfaction (
    SatisfactionID INT AUTO_INCREMENT PRIMARY KEY,
    VisitID INT,
    SatisfactionLevel ENUM('Unsatisfied', 'Undecided', 'Satisfied'),
    RepeatsAsked ENUM('No', 'Sometimes', 'Yes'),
    Created_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Updated_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (VisitID) REFERENCES Visits(VisitID)
);

-- ------------------------------
-- Hearing Aids
-- ------------------------------
CREATE TABLE HearingAids (
    AidID INT AUTO_INCREMENT PRIMARY KEY,
    VisitID INT,
    Side ENUM('Left', 'Right'),
    PowerLevel VARCHAR(50),
    Volume VARCHAR(50),
    Model VARCHAR(50),
    Battery ENUM('13', '675'),
    Earmold BOOLEAN,
    Created_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Updated_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (VisitID) REFERENCES Visits(VisitID)
);

-- ------------------------------
-- AfterCare Evaluation
-- ------------------------------
CREATE TABLE AfterCareEvaluation (
    EvaluationID INT AUTO_INCREMENT PRIMARY KEY,
    VisitID INT,
    Side ENUM('Left', 'Right'),
    HearingAidIssue ENUM('Dead', 'InternalFeedback', 'PowerChangeLow', 'PowerChangeLoud', 'LostOrStolen', 'NoProblem'),
    EarmoldIssue ENUM('TooTight', 'TooLoose', 'Damaged', 'LostOrStolen', 'NoProblem'),
    Created_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Updated_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (VisitID) REFERENCES Visits(VisitID)
);

-- ------------------------------
-- Services Completed
-- ------------------------------
CREATE TABLE ServicesCompleted (
    ServiceID INT AUTO_INCREMENT PRIMARY KEY,
    VisitID INT,
    Side ENUM('Left', 'Right'),
    HAService ENUM('TestedDemo', 'SentToSHF', 'NotBenefiting'),
    EarmoldService ENUM('UnpluggedModified', 'Modified', 'FitStock', 'FitModifiedImpression', 'FitCustom'),
    Created_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Updated_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (VisitID) REFERENCES Visits(VisitID)
);

-- ------------------------------
-- General Services
-- ------------------------------
CREATE TABLE GeneralServices (
    ServiceRecordID INT AUTO_INCREMENT PRIMARY KEY,
    VisitID INT,
    CounselingGiven BOOLEAN,
    BatteriesProvided INT,
    BatteryType ENUM('13', '675'),
    Referral ENUM('AfterCareCenter', 'NextPhase2Mission'),
    Notes TEXT,
    Created_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Updated_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (VisitID) REFERENCES Visits(VisitID)
);

-- ------------------------------
-- Final Quality Control
-- ------------------------------
CREATE TABLE FinalQualityControl (
    FQCID INT AUTO_INCREMENT PRIMARY KEY,
    VisitID INT,
    SatisfactionLevel ENUM('Unsatisfied', 'Undecided', 'Satisfied'),
    RepeatsAsked ENUM('No', 'Sometimes', 'Yes'),
    PatientSignature BOOLEAN,
    Created_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Updated_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (VisitID) REFERENCES Visits(VisitID)
);

-- ------------------------------
-- Material Usage Tracking
-- ------------------------------
CREATE TABLE MaterialUsage (
    UsageID INT AUTO_INCREMENT PRIMARY KEY,
    VisitID INT,
    MaterialID INT,
    QuantityUsed INT,
    UsedBy INT,
    Created_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Updated_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (VisitID) REFERENCES Visits(VisitID),
    FOREIGN KEY (MaterialID) REFERENCES Materials(MaterialID),
    FOREIGN KEY (UsedBy) REFERENCES Users(UserID)
);


 
