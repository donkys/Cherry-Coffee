 CREATE TABLE M_Employee(
    M_EmpID INT NOT NULL PRIMARY KEY,
    M_EmpUser varchar(50) UNIQUE NOT NULL ,
    M_EmpPwd varchar(50),
    M_EmpName varchar(50),
    M_EmpSurname varchar(50),
    M_EmpSex varchar(2),
    M_EmpBod DATE ,
    M_EmpAddress varchar(100),
    M_EmpTel varchar(20),
    M_EmpEmail varchar(50),
    M_EmpUpdate DATE
);

CREATE TABLE M_Admin(
    Admin_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Admin_Name varchar(50),
    Admin_Surname varchar(50),
    Admin_User varchar(50) UNIQUE NOT NULL ,
    Admin_Pwd varchar(50)
);

CREATE TABLE M_Member(
    Member_ID INT NOT NULL PRIMARY KEY,
    Member_Name varchar(50),
    Member_Surname varchar(50),
    Member_Address varchar(100),
    Member_Tel varchar(20)
);

CREATE TABLE M_Grade(
    Grade_ID INT NOT NULL PRIMARY KEY,
    Grade_Detail varchar(2),
    Grade_Price FLOAT,
    Grade_Update DATE
);

CREATE TABLE T_BUY (
    T_DATE DATE NOT NULL,
    T_TIME TIME NOT NULL,
    M_EmpID INT NOT NULL,
    Member_ID INT NOT NULL,
    T_Class varchar(20),
    T_Weight FLOAT,
    T_Grade varchar(20),
    T_GWeight FLOAT,
    T_PWeight FLOAT,
    T_GoodMoney FLOAT,
    T_PoorMoney FLOAT,
    T_CommonFee FLOAT,
    T_MemberSaving FLOAT,
    T_Net FLOAT,
    Grade_Price FLOAT,
    PRIMARY KEY (T_DATE, T_TIME),
    FOREIGN KEY (M_EmpID) REFERENCES M_Employee(M_EmpID),
    FOREIGN KEY (Member_ID) REFERENCES M_Member(Member_ID)
);

INSERT INTO M_Employee(M_EmpID, M_EmpUser, M_EmpPwd, M_EmpName, M_EmpSurname, M_EmpSex, M_EmpBod, M_EmpAddress, M_EmpTel, M_EmpEmail, M_EmpUpdate)
VALUES
(1, 'u1', 'p1', 'John', 'Doe', 'M', '2000-01-01', 'Add1', '123456', 'j@email.com', '2022-01-01'),
(2, 'u2', 'p2', 'Jane', 'Doe', 'F', '2001-02-01', 'Add2', '234567', 'jane@email.com', '2022-02-01'),
(3, 'u3', 'p3', 'Mike', 'Smith', 'M', '2002-03-01', 'Add3', '345678', 'mike@email.com', '2022-03-01'),
(4, 'u4', 'p4', 'Emily', 'Johnson', 'F', '2003-04-01', 'Add4', '456789', 'emily@email.com', '2022-04-01'),
(5, 'u5', 'p5', 'William', 'Brown', 'M', '2004-05-01', 'Add5', '567890', 'william@email.com', '2022-05-01'),
(6, 'u6', 'p6', 'Ashley', 'Davis', 'F', '2005-06-01', 'Add6', '678901', 'ashley@email.com', '2022-06-01'),
(7, 'u7', 'p7', 'Michael', 'Wilson', 'M', '2006-07-01', 'Add7', '789012', 'michael@email.com', '2022-07-01'),
(8, 'u8', 'p8', 'Emily', 'Martins', 'F', '2007-08-01', 'Add8', '890123', 'emilym@email.com', '2022-08-01'),
(9, 'u9', 'p9', 'Daniel', 'Johnson', 'M', '2008-09-01', 'Add9', '901234', 'daniel@email.com', '2022-09-01'),
(10, 'u10', 'p10', 'Sophie', 'Brown', 'F', '2009-10-01', 'Add10', '102345', 'sophie@email.com', '2022-10-01');


INSERT INTO M_Admin (Admin_ID, Admin_Name, Admin_Surname, Admin_User, Admin_Pwd)
VALUES
(1, 'John', 'Doe', 'adm1', 'p1'),
(2, 'Jane', 'Doe', 'adm2', 'p2'),
(3, 'Mike', 'Smith', 'adm3', 'p3'),
(4, 'Emily', 'Johnson', 'adm4', 'p4'),
(5, 'William', 'Brown', 'adm5', 'p5'),
(6, 'Ashley', 'Davis', 'adm6', 'p6'),
(7, 'Michael', 'Wilson', 'adm7', 'p7'),
(8, 'Emily', 'Martins', 'adm8', 'p8'),
(9, 'Daniel', 'Johnson', 'adm9', 'p9'),
(10, 'Sophie', 'Brown', 'adm10', 'p10');

-- INSERT INTO M_Admin (Admin_ID, Admin_Name, Admin_Surname, Admin_User, Admin_Pwd)
-- VALUES
-- (1, 'Alex', 'Johnson', 'adm1', 'p1'),
-- (2, 'Sophia', 'Smith', 'adm2', 'p2'),
-- (3, 'William', 'Brown', 'adm3', 'p3'),
-- (4, 'Olivia', 'Davis', 'adm4', 'p4'),
-- (5, 'James', 'Wilson', 'adm5', 'p5'),
-- (6, 'Ava', 'Martins', 'adm6', 'p6'),
-- (7, 'Henry', 'Johnson', 'adm7', 'p7'),
-- (8, 'Isabella', 'Brown', 'adm8', 'p8'),
-- (9, 'Oliver', 'Davis', 'adm9', 'p9'),
-- (10, 'Mia', 'Smith', 'adm10', 'p10');

INSERT INTO M_Member (Member_ID, Member_Name, Member_Surname, Member_Address, Member_Tel)
VALUES
(1, 'Emily', 'Johnson', '123 Main St', '1234567890'),
(2, 'William', 'Brown', '456 Main St', '2345678901'),
(3, 'Michael', 'Wilson', '789 Main St', '3456789012'),
(4, 'Sophie', 'Martins', '246 Main St', '4567890123'),
(5, 'Daniel', 'Johnson', '369 Main St', '5678901234'),
(6, 'John', 'Smith', '159 Main St', '6789012345'),
(7, 'Jane', 'Doe', '753 Main St', '7890123456'),
(8, 'Emily', 'Brown', '967 Main St', '8901234567'),
(9, 'Alex', 'Johnson', '147 Main St', '9012345678'),
(10, 'Olivia', 'Smith', '258 Main St', '0123456789');

INSERT INTO M_Grade (Grade_ID, Grade_Detail, Grade_Price, Grade_Update)
VALUES
(1, 'A', 99.99, '2022-02-03'),
(2, 'B', 49.99, '2022-02-03'),
(3, 'C', 29.99, '2022-02-03');
-- (4, 'Platinum', 199.99, '2022-04-01'),
-- (5, 'Diamond', 499.99, '2022-05-01'),
-- (6, 'Emerald', 299.99, '2022-06-01'),
-- (7, 'Ruby', 999.99, '2022-07-01'),
-- (8, 'Sapphire', 799.99, '2022-08-01'),
-- (9, 'Topaz', 499.99, '2022-09-01'),
-- (10, 'Amethyst', 199.99, '2022-10-01');

INSERT INTO T_BUY (T_DATE, T_TIME, M_EmpID, Member_ID, T_Class, T_Weight, T_Grade, T_GWeight, T_PWeight, T_GoodMoney, T_PoorMoney, T_CommonFee, T_MemberSaving, T_Net, Grade_Price) 
VALUES 
('2022-01-01', '08:00:00', 1, 1, 'Class A', 100.0, 'Grade 1', 90.0, 10.0, 1000.0, 100.0, 50.0, 200.0, 800.0, 100.0),
('2022-01-02', '09:00:00', 2, 2, 'Class B', 200.0, 'Grade 2', 180.0, 20.0, 2000.0, 200.0, 100.0, 400.0, 1600.0, 200.0),
('2022-01-03', '10:00:00', 3, 3, 'Class C', 300.0, 'Grade 3', 270.0, 30.0, 3000.0, 300.0, 150.0, 600.0, 2400.0, 300.0),
('2022-01-04', '11:00:00', 4, 4, 'Class D', 400.0, 'Grade 4', 360.0, 40.0, 4000.0, 400.0, 200.0, 800.0, 3200.0, 400.0),
('2022-01-05', '12:00:00', 5, 5, 'Class E', 500.0, 'Grade 5', 450.0, 50.0, 5000.0, 500.0, 250.0, 1000.0, 4000.0, 500.0),
('2022-02-01', '08:00:00', 6, 6, 'Class F', 600.0, 'Grade 6', 540.0, 60.0, 6000.0, 600.0, 300.0, 1200.0, 4800.0, 600.0),
('2022-02-02', '09:00:00', 7, 7, 'Class G', 700.0, 'Grade 7', 630.0, 70.0, 7000.0, 700.0, 350.0, 1400.0, 5600.0, 700.0),
('2022-02-03', '10:00:00', 8, 8, 'Class H', 800.0, 'Grade 8', 720.0, 80.0, 8000.0, 800.0, 400.0, 1600.0, 6400.0, 800.0),
('2022-02-04', '11:00:00', 9, 9, 'Class I', 900.0, 'Grade 9', 810.0, 90.0, 9000.0, 900.0, 450.0, 1800.0, 7200.0, 900.0),
('2022-02-05', '12:00:00', 10, 10, 'Class J', 1000.0, 'Grade 10', 900.0, 100.0, 10000.0, 1000.0, 500.0, 2000.0, 8000.0, 1000.0);




