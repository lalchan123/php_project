--
-- Database: 'doctorappointment'
--

-- --------------------------------------------------------
CREATE TABLE `patients` (
  `PatientID` int(11) NOT NULL PRIMARY KEY,
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `ContactNumber` varchar(40) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Bloodtype` varchar(10) NOT NULL,
  `Images` BLOB NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

------------------------------------------------------------
--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `DoctorID` int(11) NOT NULL PRIMARY KEY,
  `DoctorName` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `ContactNumber` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `categorey` varchar(255) NOT NULL,
  `timing` varchar(255) NOT NULL,
  `visit` varchar(255) NOT NULL,
  `images` BLOB NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


------------------------------------------------------------
--
-- Table structure for table `doctor_reply`
--

CREATE TABLE `doctor_reply` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `PatientID` int(11) NOT NULL,
  `DoctorID` int(11) NOT NULL,
  `DoctorName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ContactNumber` varchar(255) NOT NULL,
  `reply_message` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT(0),
  `date` timestamp current_timestamp NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



------------------------------------------------------------
--
-- Table structure for table ` patient_message`
--

CREATE TABLE `patient_message` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `DoctorID` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `ContactNumber` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT(0),
  `date` timestamp current_timestamp NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




------------------------------------------------------------
--
-- Table structure for table `patient_feedback`
--

CREATE TABLE `patient_feedback` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `DoctorID` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `feedback` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT(0),
  `date` timestamp current_timestamp NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




