-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2025 at 10:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `st_alphonsus_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `ClassID` int(11) NOT NULL,
  `ClassName` varchar(50) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `TeacherID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`ClassID`, `ClassName`, `Capacity`, `TeacherID`) VALUES
(1, 'Reception Year', 40, 1),
(2, 'Year One', 40, 2),
(3, 'Year Two', 40, 3),
(4, 'Year Three', 40, 4),
(5, 'Year Four', 40, 5),
(6, 'Year Five', 40, 6),
(7, 'Year Six', 40, 7);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `ParentID` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`ParentID`, `FullName`, `Address`, `Email`, `Phone`) VALUES
(1, 'Mr. James Smith', '101 Maple Dr', 'james.smith@email.com', '07700900200'),
(2, 'Mrs. Mary Smith', '101 Maple Dr', 'mary.smith@email.com', '07700900201'),
(3, 'Mr. Robert Johnson', '102 Oak Ln', 'rob.j@email.com', '07700900202'),
(4, 'Ms. Patricia Williams', '103 Pine St', 'patty.w@email.com', '07700900203'),
(5, 'Mr. Michael Brown', '104 Cedar Rd', 'mike.b@email.com', '07700900204'),
(6, 'Mrs. Jennifer Jones', '105 Elm Ave', 'jen.j@email.com', '07700900205'),
(7, 'Mr. William Garcia', '106 Birch Blvd', 'will.g@email.com', '07700900206'),
(8, 'Mrs. Elizabeth Miller', '107 Ash Ct', 'liz.m@email.com', '07700900207'),
(9, 'Mr. David Davis', '108 Willow Way', 'dave.d@email.com', '07700900208'),
(10, 'Ms. Susan Rodriguez', '109 Poplar Pl', 'sue.r@email.com', '07700900209'),
(11, 'Mr. Richard Martinez', '110 Spruce St', 'rich.m@email.com', '07700900210'),
(12, 'Mrs. Jessica Hernandez', '111 Fir Ln', 'jess.h@email.com', '07700900211'),
(13, 'Mr. Joseph Lopez', '112 Redwood Rd', 'joe.l@email.com', '07700900212'),
(14, 'Ms. Sarah Gonzalez', '113 Cypress Dr', 'sarah.g@email.com', '07700900213'),
(15, 'Mr. Thomas Wilson', '114 Sequoia St', 'tom.w@email.com', '07700900214'),
(16, 'Mrs. Karen Anderson', '115 Magnolia Ave', 'karen.a@email.com', '07700900215'),
(17, 'Mr. Charles Thomas', '116 Dogwood Dr', 'charles.t@email.com', '07700900216'),
(18, 'Ms. Lisa Taylor', '117 Hawthorn Ln', 'lisa.t@email.com', '07700900217'),
(19, 'Mr. Christopher Moore', '118 Sycamore St', 'chris.m@email.com', '07700900218'),
(20, 'Mrs. Nancy Jackson', '119 Laurel Rd', 'nancy.j@email.com', '07700900219'),
(21, 'Mr. Daniel Martin', '120 Juniper Ave', 'dan.m@email.com', '07700900220'),
(22, 'Ms. Betty Lee', '121 Acorn St', 'betty.l@email.com', '07700900221'),
(23, 'Mr. Matthew Perez', '122 Chestnut Dr', 'matt.p@email.com', '07700900222'),
(24, 'Mrs. Margaret Thompson', '123 Walnut Way', 'marge.t@email.com', '07700900223'),
(25, 'Mr. Anthony White', '124 Pecan Pl', 'tony.w@email.com', '07700900224'),
(26, 'Ms. Sandra Harris', '125 Beech Blvd', 'sandra.h@email.com', '07700900225'),
(27, 'Mr. Mark Sanchez', '126 Cherry Ln', 'mark.s@email.com', '07700900226'),
(28, 'Mrs. Ashley Clark', '127 Apple St', 'ashley.c@email.com', '07700900227'),
(29, 'Mr. Donald Ramirez', '128 Pear Rd', 'don.r@email.com', '07700900228'),
(30, 'Ms. Kimberly Lewis', '129 Peach Dr', 'kim.l@email.com', '07700900229'),
(31, 'Mr. Paul Robinson', '130 Plum Ave', 'paul.r@email.com', '07700900230'),
(32, 'Mrs. Donna Walker', '131 Orange St', 'donna.w@email.com', '07700900231'),
(33, 'Mr. Steven Young', '132 Lemon Ln', 'steve.y@email.com', '07700900232'),
(34, 'Ms. Emily Hall', '201 Rose St', 'emily.h@email.com', '07700900233'),
(35, 'Mr. Andrew Allen', '202 Tulip Rd', 'andy.a@email.com', '07700900234'),
(36, 'Mrs. Michelle King', '203 Lily Ln', 'michelle.k@email.com', '07700900235'),
(37, 'Mr. Kenneth Wright', '204 Daisy Dr', 'ken.w@email.com', '07700900236'),
(38, 'Ms. Amanda Scott', '205 Orchid Ave', 'mandy.s@email.com', '07700900237'),
(39, 'Mr. George Torres', '206 Violet Way', 'george.t@email.com', '07700900238'),
(40, 'Mrs. Melissa Nguyen', '207 Jasmine Pl', 'mel.n@email.com', '07700900239'),
(41, 'Mr. Joshua Hill', '208 Lotus Blvd', 'josh.h@email.com', '07700900240'),
(42, 'Ms. Deborah Flores', '209 Sunflower St', 'deb.f@email.com', '07700900241'),
(43, 'Mr. Brian Green', '210 Marigold Rd', 'brian.g@email.com', '07700900242'),
(44, 'Mrs. Stephanie Adams', '211 Poppy Ln', 'steph.a@email.com', '07700900243'),
(45, 'Mr. Edward Nelson', '212 Iris Dr', 'ed.n@email.com', '07700900244'),
(46, 'Ms. Rebecca Baker', '213 Bluebell Ave', 'bec.b@email.com', '07700900245'),
(47, 'Mr. Kevin Carter', '214 Fern St', 'kev.c@email.com', '07700900246'),
(48, 'Mrs. Sharon Mitchell', '215 Moss Rd', 'sharon.m@email.com', '07700900247'),
(49, 'Mr. Ronald Perez', '216 Ivy Ln', 'ron.p@email.com', '07700900248'),
(50, 'Ms. Cynthia Roberts', '217 Vine Dr', 'cindy.r@email.com', '07700900249'),
(51, 'Mr. Timothy Turner', '218 Leaf Way', 'tim.t@email.com', '07700900250'),
(52, 'Mrs. Kathleen Phillips', '219 Root Pl', 'kath.p@email.com', '07700900251'),
(53, 'Mr. Jason Campbell', '220 Branch St', 'jason.c@email.com', '07700900252'),
(54, 'Ms. Amy Parker', '221 Stem Rd', 'amy.p@email.com', '07700900253'),
(55, 'Mr. Jeffrey Evans', '222 Petal Ln', 'jeff.e@email.com', '07700900254'),
(56, 'Mrs. Shirley Edwards', '223 Seed Dr', 'shirley.e@email.com', '07700900255'),
(57, 'Mr. Frank Collins', '224 Sprout Ave', 'frank.c@email.com', '07700900256'),
(58, 'Ms. Angela Stewart', '225 Bloom St', 'angie.s@email.com', '07700900257'),
(59, 'Mr. Scott Sanchez', '226 Garden Rd', 'scott.s@email.com', '07700900258'),
(60, 'Mrs. Helen Morris', '227 Park Ln', 'helen.m@email.com', '07700900259'),
(61, 'Mr. Eric Rogers', '228 Meadow Dr', 'eric.r@email.com', '07700900260'),
(62, 'Ms. Anna Reed', '229 Field Way', 'anna.r@email.com', '07700900261'),
(63, 'Mr. Stephen Cook', '230 Grove Pl', 'stephen.c@email.com', '07700900262'),
(64, 'Mrs. Brenda Morgan', '301 River Rd', 'brenda.m@email.com', '07700900263'),
(65, 'Mr. Larry Bell', '302 Lake Ln', 'larry.b@email.com', '07700900264'),
(66, 'Ms. Pamela Murphy', '303 Ocean Dr', 'pam.m@email.com', '07700900265'),
(67, 'Mr. Raymond Bailey', '304 Sea St', 'ray.b@email.com', '07700900266'),
(68, 'Mrs. Nicole Rivera', '305 Bay Blvd', 'nicki.r@email.com', '07700900267'),
(69, 'Mr. Gregory Cooper', '306 Cove Way', 'greg.c@email.com', '07700900268'),
(70, 'Ms. Catherine Richardson', '307 Tide Pl', 'cathy.r@email.com', '07700900269'),
(71, 'Mr. Samuel Cox', '308 Wave St', 'sam.c@email.com', '07700900270'),
(72, 'Mrs. Ruth Howard', '309 Surf Rd', 'ruth.h@email.com', '07700900271'),
(73, 'Mr. Patrick Ward', '310 Sand Ln', 'pat.w@email.com', '07700900272'),
(74, 'Ms. Christine Peterson', '311 Shell Dr', 'chris.p@email.com', '07700900273'),
(75, 'Mr. Dennis Gray', '312 Coral Ave', 'dennis.g@email.com', '07700900274'),
(76, 'Mrs. Debra Brooks', '313 Reef St', 'deb.b@email.com', '07700900275'),
(77, 'Mr. Jerry Kelly', '314 Fish Rd', 'jerry.k@email.com', '07700900276'),
(78, 'Ms. Rachel Sanders', '315 Shark Ln', 'rachel.s@email.com', '07700900277'),
(79, 'Mr. Tyler Price', '316 Whale Dr', 'tyler.p@email.com', '07700900278'),
(80, 'Mrs. Janet Bennett', '317 Dolphin Way', 'janet.b@email.com', '07700900279');

-- --------------------------------------------------------

--
-- Table structure for table `pupils`
--

CREATE TABLE `pupils` (
  `PupilID` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `MedicalInfo` text DEFAULT NULL,
  `ClassID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pupils`
--

INSERT INTO `pupils` (`PupilID`, `FullName`, `Address`, `MedicalInfo`, `ClassID`) VALUES
(1, 'Oliver Smith', '101 Maple Dr', 'None', 1),
(2, 'George Johnson', '102 Oak Ln', 'Asthma', 1),
(3, 'Harry Williams', '103 Pine St', 'None', 1),
(4, 'Noah Brown', '104 Cedar Rd', 'Peanut Allergy', 1),
(5, 'Jack Jones', '105 Elm Ave', 'None', 1),
(6, 'Leo Garcia', '106 Birch Blvd', 'None', 1),
(7, 'Arthur Miller', '107 Ash Ct', 'None', 1),
(8, 'Muhammad Davis', '108 Willow Way', 'None', 1),
(9, 'Oscar Rodriguez', '109 Poplar Pl', 'None', 1),
(10, 'Charlie Martinez', '110 Spruce St', 'None', 1),
(11, 'Thomas Hernandez', '111 Fir Ln', 'None', 1),
(12, 'Henry Lopez', '112 Redwood Rd', 'None', 1),
(13, 'Jacob Gonzalez', '113 Cypress Dr', 'None', 1),
(14, 'Alfie Wilson', '114 Sequoia St', 'None', 1),
(15, 'Archie Anderson', '115 Magnolia Ave', 'None', 1),
(16, 'Freddie Thomas', '116 Dogwood Dr', 'None', 1),
(17, 'Theodore Taylor', '117 Hawthorn Ln', 'None', 1),
(18, 'Isaac Moore', '118 Sycamore St', 'None', 1),
(19, 'Teddy Jackson', '119 Laurel Rd', 'None', 1),
(20, 'Finley Martin', '120 Juniper Ave', 'None', 1),
(21, 'Lucas Lee', '121 Acorn St', 'None', 1),
(22, 'Edward Perez', '122 Chestnut Dr', 'None', 1),
(23, 'Daniel Thompson', '123 Walnut Way', 'None', 1),
(24, 'Max White', '124 Pecan Pl', 'None', 1),
(25, 'Alexander Harris', '125 Beech Blvd', 'None', 1),
(26, 'Sebastian Sanchez', '126 Cherry Ln', 'None', 1),
(27, 'Roman Clark', '127 Apple St', 'None', 1),
(28, 'Adam Ramirez', '128 Pear Rd', 'None', 1),
(29, 'Mason Lewis', '129 Peach Dr', 'None', 1),
(30, 'Ethan Robinson', '130 Plum Ave', 'None', 1),
(31, 'Harrison Walker', '131 Orange St', 'None', 1),
(32, 'William Young', '132 Lemon Ln', 'None', 1),
(33, 'Olivia Hall', '201 Rose St', 'None', 2),
(34, 'Amelia Allen', '202 Tulip Rd', 'None', 2),
(35, 'Isla King', '203 Lily Ln', 'None', 2),
(36, 'Ava Wright', '204 Daisy Dr', 'None', 2),
(37, 'Mia Scott', '205 Orchid Ave', 'None', 2),
(38, 'Ivy Torres', '206 Violet Way', 'None', 2),
(39, 'Lily Nguyen', '207 Jasmine Pl', 'None', 2),
(40, 'Freya Hill', '208 Lotus Blvd', 'None', 2),
(41, 'Florence Flores', '209 Sunflower St', 'None', 2),
(42, 'Willow Green', '210 Marigold Rd', 'None', 2),
(43, 'Rosie Adams', '211 Poppy Ln', 'None', 2),
(44, 'Sienna Nelson', '212 Iris Dr', 'None', 2),
(45, 'Sophia Baker', '213 Bluebell Ave', 'None', 2),
(46, 'Grace Carter', '214 Fern St', 'None', 2),
(47, 'Daisy Mitchell', '215 Moss Rd', 'None', 2),
(48, 'Elsie Perez', '216 Ivy Ln', 'None', 2),
(49, 'Emily Roberts', '217 Vine Dr', 'None', 2),
(50, 'Evie Turner', '218 Leaf Way', 'None', 2),
(51, 'Charlotte Phillips', '219 Root Pl', 'None', 2),
(52, 'Millie Campbell', '220 Branch St', 'None', 2),
(53, 'Alice Parker', '221 Stem Rd', 'None', 2),
(54, 'Ruby Evans', '222 Petal Ln', 'None', 2),
(55, 'Isabella Edwards', '223 Seed Dr', 'None', 2),
(56, 'Ella Collins', '224 Sprout Ave', 'None', 2),
(57, 'Evelyn Stewart', '225 Bloom St', 'None', 2),
(58, 'Scarlett Sanchez', '226 Garden Rd', 'None', 2),
(59, 'Chloe Morris', '227 Park Ln', 'None', 2),
(60, 'Phoebe Rogers', '228 Meadow Dr', 'None', 2),
(61, 'Sophie Reed', '229 Field Way', 'None', 2),
(62, 'Layla Cook', '230 Grove Pl', 'None', 2),
(63, 'James Morgan', '301 River Rd', 'None', 3),
(64, 'Benjamin Bell', '302 Lake Ln', 'None', 3),
(65, 'William Murphy', '303 Ocean Dr', 'None', 3),
(66, 'Joshua Bailey', '304 Sea St', 'None', 3),
(67, 'Logan Rivera', '305 Bay Blvd', 'None', 3),
(68, 'Lucas Cooper', '306 Cove Way', 'None', 3),
(69, 'Caleb Richardson', '307 Tide Pl', 'None', 3),
(70, 'Ethan Cox', '308 Wave St', 'None', 3),
(71, 'Samuel Howard', '309 Surf Rd', 'None', 3),
(72, 'Joseph Ward', '310 Sand Ln', 'None', 3),
(73, 'Matthew Peterson', '311 Shell Dr', 'None', 3),
(74, 'David Gray', '312 Coral Ave', 'None', 3),
(75, 'Andrew Brooks', '313 Reef St', 'None', 3),
(76, 'Ryan Kelly', '314 Fish Rd', 'None', 3),
(77, 'Elijah Sanders', '315 Shark Ln', 'None', 3),
(78, 'Nathan Price', '316 Whale Dr', 'None', 3),
(79, 'Aiden Bennett', '317 Dolphin Way', 'None', 3),
(80, 'John Wood', '318 Seal Pl', 'None', 3),
(81, 'Dylan Barnes', '319 Crab St', 'None', 3),
(82, 'Anthony Ross', '320 Lobster Rd', 'None', 3),
(83, 'Jonathan Henderson', '321 Clam Ln', 'None', 3),
(84, 'Gabriel Coleman', '322 Oyster Dr', 'None', 3),
(85, 'Christian Jenkins', '323 Pearl Ave', 'None', 3),
(86, 'Carter Perry', '324 Boat St', 'None', 3),
(87, 'Luke Powell', '325 Ship Rd', 'None', 3),
(88, 'Christopher Long', '326 Sail Ln', 'None', 3),
(89, 'Isaac Patterson', '327 Mast Dr', 'None', 3),
(90, 'Owen Hughes', '328 Deck Way', 'None', 3),
(91, 'Wyatt Flores', '329 Anchor Pl', 'None', 3),
(92, 'Levi Washington', '330 Port St', 'None', 3),
(93, 'Julian Butler', '331 Harbor Rd', 'None', 3),
(94, 'Grayson Simmons', '332 Dock Ln', 'None', 3),
(95, 'Aaron Foster', '333 Pier Dr', 'None', 3),
(96, 'Lincoln Gonzales', '334 Marina Ave', 'None', 3),
(97, 'Mateo Bryant', '335 Coast St', 'None', 3),
(98, 'Harper Alexander', '401 Hill St', 'None', 4),
(99, 'Evelyn Russell', '402 Mountain Rd', 'None', 4),
(100, 'Abigail Griffin', '403 Peak Ln', 'None', 4),
(101, 'Emily Diaz', '404 Summit Dr', 'None', 4),
(102, 'Ella Hayes', '405 Valley Ave', 'None', 4),
(103, 'Elizabeth Myers', '406 Canyon Way', 'None', 4),
(104, 'Camila Ford', '407 Cliff Pl', 'None', 4),
(105, 'Luna Hamilton', '408 Ridge St', 'None', 4),
(106, 'Sofia Graham', '409 Slope Rd', 'None', 4),
(107, 'Avery Sullivan', '410 Rock Ln', 'None', 4),
(108, 'Mila Wallace', '411 Stone Dr', 'None', 4),
(109, 'Aria Woods', '412 Pebble Ave', 'None', 4),
(110, 'Scarlett Cole', '413 Boulder St', 'None', 4),
(111, 'Penelope West', '414 Gravel Rd', 'None', 4),
(112, 'Layla Jordan', '415 Dirt Ln', 'None', 4),
(113, 'Chloe Owens', '416 Mud Dr', 'None', 4),
(114, 'Victoria Reynolds', '417 Clay Way', 'None', 4),
(115, 'Madison Fisher', '418 Dust Pl', 'None', 4),
(116, 'Eleanor Ellis', '419 Ground St', 'None', 4),
(117, 'Grace Harrison', '420 Earth Rd', 'None', 4),
(118, 'Nora Gibson', '421 Sky Ln', 'None', 4),
(119, 'Riley McDonald', '422 Cloud Dr', 'None', 4),
(120, 'Zoey Cruz', '423 Rain Ave', 'None', 4),
(121, 'Hannah Marshall', '424 Storm St', 'None', 4),
(122, 'Hazel Ortiz', '425 Thunder Rd', 'None', 4),
(123, 'Lily Gomez', '426 Lightning Ln', 'None', 4),
(124, 'Ellie Murray', '427 Wind Dr', 'None', 4),
(125, 'Violet Freeman', '428 Breeze Way', 'None', 4),
(126, 'Lillian Wells', '429 Gust Pl', 'None', 4),
(127, 'Zoe Webb', '430 Gale St', 'None', 4),
(128, 'Stella Simpson', '431 Fog Rd', 'None', 4),
(129, 'Aurora Stevens', '432 Mist Ln', 'None', 4),
(130, 'Natalie Tucker', '433 Snow Dr', 'None', 4),
(131, 'Emilia Porter', '434 Ice Ave', 'None', 4),
(132, 'Everly Hunter', '435 Hail St', 'None', 4),
(133, 'Leah Hicks', '436 Sleet Rd', 'None', 4),
(134, 'Aubrey Crawford', '437 Frost Ln', 'None', 4),
(135, 'Willow Henry', '438 Cold Dr', 'None', 4),
(136, 'Adrian Boyd', '501 Sun St', 'None', 5),
(137, 'Cameron Mason', '502 Moon Rd', 'None', 5),
(138, 'Leo Morales', '503 Star Ln', 'None', 5),
(139, 'Maverick Kennedy', '504 Planet Dr', 'None', 5),
(140, 'Hudson Warren', '505 Orbit Ave', 'None', 5),
(141, 'Nolan Dixon', '506 Space Way', 'None', 5),
(142, 'Easton Ramos', '507 Comet Pl', 'None', 5),
(143, 'Eli Reyes', '508 Asteroid St', 'None', 5),
(144, 'Colton Burns', '509 Galaxy Rd', 'None', 5),
(145, 'Ezra Gordon', '510 Universe Ln', 'None', 5),
(146, 'Isaiah Shaw', '511 Cosmos Dr', 'None', 5),
(147, 'Brayden Holmes', '512 Solar Ave', 'None', 5),
(148, 'Bentley Rice', '513 Lunar St', 'None', 5),
(149, 'Jordan Robertson', '514 Eclipse Rd', 'None', 5),
(150, 'Dominic Hunt', '515 Phase Ln', 'None', 5),
(151, 'Jaxon Black', '516 Dark Dr', 'None', 5),
(152, 'Austin Daniels', '517 Light Way', 'None', 5),
(153, 'Adam Palmer', '518 Shine Pl', 'None', 5),
(154, 'Ian Mills', '519 Bright St', 'None', 5),
(155, 'Elias Nichols', '520 Glow Rd', 'None', 5),
(156, 'Jaxson Grant', '521 Ray Ln', 'None', 5),
(157, 'Greyson Knight', '522 Beam Dr', 'None', 5),
(158, 'Jose Ferguson', '523 Spark Ave', 'None', 5),
(159, 'Ezekiel Rose', '524 Flash St', 'None', 5),
(160, 'Carson Stone', '525 Glint Rd', 'None', 5),
(161, 'Evan Hawkins', '526 Shimmer Ln', 'None', 5),
(162, 'Maverick Dunn', '527 Glimmer Dr', 'None', 5),
(163, 'Bryson Perkins', '528 Twinkle Way', 'None', 5),
(164, 'Jace Hudson', '529 Star Pl', 'None', 5),
(165, 'Cooper Spencer', '530 Night St', 'None', 5),
(166, 'Xavier Gardner', '531 Day Rd', 'None', 5),
(167, 'Parker Stephens', '532 Noon Ln', 'None', 5),
(168, 'Roman Payne', '533 Dawn Dr', 'None', 5),
(169, 'Addison Pierce', '601 Red St', 'None', 6),
(170, 'Brooklyn Berry', '602 Blue Rd', 'None', 6),
(171, 'Bella Matthews', '603 Green Ln', 'None', 6),
(172, 'Claire Arnold', '604 Yellow Dr', 'None', 6),
(173, 'Skylar Wagner', '605 Orange Ave', 'None', 6),
(174, 'Lucy Willis', '606 Purple Way', 'None', 6),
(175, 'Paisley Ray', '607 Pink Pl', 'None', 6),
(176, 'Everleigh Watkins', '608 Black St', 'None', 6),
(177, 'Anna Olson', '609 White Rd', 'None', 6),
(178, 'Caroline Carroll', '610 Gray Ln', 'None', 6),
(179, 'Nova Duncan', '611 Brown Dr', 'None', 6),
(180, 'Genesis Snyder', '612 Silver Ave', 'None', 6),
(181, 'Emery Hart', '613 Gold St', 'None', 6),
(182, 'Kennedy Cunningham', '614 Bronze Rd', 'None', 6),
(183, 'Maya Bradley', '615 Copper Ln', 'None', 6),
(184, 'Valentina Lane', '616 Metal Dr', 'None', 6),
(185, 'Naomi Andrews', '617 Iron Way', 'None', 6),
(186, 'Ayla Ruiz', '618 Steel Pl', 'None', 6),
(187, 'Kinsley Harper', '619 Rust St', 'None', 6),
(188, 'Allison Fox', '620 Zinc Rd', 'None', 6),
(189, 'Gabriella Riley', '621 Tin Ln', 'None', 6),
(190, 'Alice Armstrong', '622 Lead Dr', 'None', 6),
(191, 'Madelyn Carpenter', '623 Nickel Ave', 'None', 6),
(192, 'Cora Weaver', '624 Chrome St', 'None', 6),
(193, 'Ruby Greene', '625 Brass Rd', 'None', 6),
(194, 'Eva Lawrence', '626 Alloy Ln', 'None', 6),
(195, 'Serenity Elliott', '627 Mix Dr', 'None', 6),
(196, 'Autumn Chastain', '628 Pure Way', 'None', 6),
(197, 'Adeline Sims', '629 Solid Pl', 'None', 6),
(198, 'Hailey Austin', '630 Liquid St', 'None', 6),
(199, 'Gianna Peters', '631 Gas Rd', 'None', 6),
(200, 'Kaylee Kelley', '632 Vapor Ln', 'None', 6),
(201, 'Isla Franklin', '633 Steam Dr', 'None', 6),
(202, 'Eliana Lawson', '634 Smoke Ave', 'None', 6),
(203, 'Quinn Fields', '635 Fume St', 'None', 6),
(204, 'Nevaeh Gutierrez', '636 Haze Rd', 'None', 6),
(205, 'Ivy Ryan', '637 Mist Ln', 'None', 6),
(206, 'Miles Schmidt', '701 Fast St', 'None', 7),
(207, 'Micah Carr', '702 Slow Rd', 'None', 7),
(208, 'Vincent Vasquez', '703 Quick Ln', 'None', 7),
(209, 'Chase Castillo', '704 Rapid Dr', 'None', 7),
(210, 'Cole Wheeler', '705 Speed Ave', 'None', 7),
(211, 'Nathaniel Chapman', '706 Pace Way', 'None', 7),
(212, 'Harrison Oliver', '707 Race Pl', 'None', 7),
(213, 'Ryder Montgomery', '708 Run St', 'None', 7),
(214, 'Justin Richards', '709 Jog Rd', 'None', 7),
(215, 'Bryce Williamson', '710 Walk Ln', 'None', 7),
(216, 'Jason Johnston', '711 Sprint Dr', 'None', 7),
(217, 'Emmett Banks', '712 Dash Ave', 'None', 7),
(218, 'Declan Meyer', '713 Rush St', 'None', 7),
(219, 'Braxton Bishop', '714 Hurry Rd', 'None', 7),
(220, 'Axel McCoy', '715 Zoom Ln', 'None', 7),
(221, 'Miguel Howell', '716 Zip Dr', 'None', 7),
(222, 'Giovanni Alvarez', '717 Zap Way', 'None', 7),
(223, 'Silas Morrison', '718 Fly Pl', 'None', 7),
(224, 'Weston Hansen', '719 Soar St', 'None', 7),
(225, 'Diego Fernandez', '720 Glide Rd', 'None', 7),
(226, 'Kai Garza', '721 Slide Ln', 'None', 7),
(227, 'Christian Harvey', '722 Slip Dr', 'None', 7),
(228, 'Luis Little', '723 Trip Ave', 'None', 7),
(229, 'George Burton', '724 Fall St', 'None', 7),
(230, 'Victor Stanley', '725 Jump Rd', 'None', 7),
(231, 'Jonah Nguyen', '726 Hop Ln', 'None', 7),
(232, 'Kingston George', '727 Skip Dr', 'None', 7),
(233, 'Beau Jacobs', '728 Leap Way', 'None', 7),
(234, 'Patricio Reid', '729 Bound Pl', 'None', 7),
(235, 'Antonio Kim', '730 Spring St', 'None', 7),
(236, 'Asher Fuller', '731 Bounce Rd', 'None', 7),
(237, 'Gael Lynch', '732 Rebound Ln', 'None', 7),
(238, 'Rowan Dean', '733 Ricochet Dr', 'None', 7),
(239, 'Luca Gilbert', '734 Echo Ave', 'None', 7),
(240, 'Timothy Garrett', '735 Sound St', 'None', 7),
(241, 'Kevin Romero', '736 Noise Rd', 'None', 7),
(242, 'Brian Welch', '737 Silent Ln', 'None', 7);

-- --------------------------------------------------------

--
-- Table structure for table `pupil_parent_link`
--

CREATE TABLE `pupil_parent_link` (
  `LinkID` int(11) NOT NULL,
  `PupilID` int(11) NOT NULL,
  `ParentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pupil_parent_link`
--

INSERT INTO `pupil_parent_link` (`LinkID`, `PupilID`, `ParentID`) VALUES
(1, 1, 1),
(243, 1, 50),
(2, 2, 2),
(244, 2, 51),
(3, 3, 3),
(245, 3, 52),
(4, 4, 4),
(246, 4, 53),
(5, 5, 5),
(247, 5, 54),
(6, 6, 6),
(248, 6, 55),
(7, 7, 7),
(249, 7, 56),
(8, 8, 8),
(250, 8, 57),
(9, 9, 9),
(251, 9, 58),
(10, 10, 10),
(252, 10, 59),
(11, 11, 11),
(253, 11, 60),
(12, 12, 12),
(254, 12, 61),
(13, 13, 13),
(255, 13, 62),
(14, 14, 14),
(256, 14, 63),
(15, 15, 15),
(257, 15, 64),
(16, 16, 16),
(258, 16, 65),
(17, 17, 17),
(259, 17, 66),
(18, 18, 18),
(260, 18, 67),
(19, 19, 19),
(261, 19, 68),
(20, 20, 20),
(262, 20, 69),
(21, 21, 21),
(263, 21, 70),
(22, 22, 22),
(264, 22, 71),
(23, 23, 23),
(265, 23, 72),
(24, 24, 24),
(266, 24, 73),
(25, 25, 25),
(267, 25, 74),
(26, 26, 26),
(268, 26, 75),
(27, 27, 27),
(269, 27, 76),
(28, 28, 28),
(270, 28, 77),
(29, 29, 29),
(271, 29, 78),
(30, 30, 30),
(272, 30, 79),
(31, 31, 31),
(273, 31, 80),
(274, 32, 1),
(32, 32, 32),
(275, 33, 2),
(33, 33, 33),
(276, 34, 3),
(34, 34, 34),
(277, 35, 4),
(35, 35, 35),
(278, 36, 5),
(36, 36, 36),
(279, 37, 6),
(37, 37, 37),
(280, 38, 7),
(38, 38, 38),
(281, 39, 8),
(39, 39, 39),
(282, 40, 9),
(40, 40, 40),
(283, 41, 10),
(41, 41, 41),
(284, 42, 11),
(42, 42, 42),
(285, 43, 12),
(43, 43, 43),
(286, 44, 13),
(44, 44, 44),
(287, 45, 14),
(45, 45, 45),
(288, 46, 15),
(46, 46, 46),
(289, 47, 16),
(47, 47, 47),
(290, 48, 17),
(48, 48, 48),
(291, 49, 18),
(49, 49, 49),
(292, 50, 19),
(50, 50, 50),
(51, 51, 51),
(52, 52, 52),
(53, 53, 53),
(54, 54, 54),
(55, 55, 55),
(56, 56, 56),
(57, 57, 57),
(58, 58, 58),
(59, 59, 59),
(60, 60, 60),
(61, 61, 61),
(62, 62, 62),
(63, 63, 63),
(64, 64, 64),
(65, 65, 65),
(66, 66, 66),
(67, 67, 67),
(68, 68, 68),
(69, 69, 69),
(70, 70, 70),
(71, 71, 71),
(72, 72, 72),
(73, 73, 73),
(74, 74, 74),
(75, 75, 75),
(76, 76, 76),
(77, 77, 77),
(78, 78, 78),
(79, 79, 79),
(80, 80, 80),
(81, 81, 1),
(82, 82, 2),
(83, 83, 3),
(84, 84, 4),
(85, 85, 5),
(86, 86, 6),
(87, 87, 7),
(88, 88, 8),
(89, 89, 9),
(90, 90, 10),
(91, 91, 11),
(92, 92, 12),
(93, 93, 13),
(94, 94, 14),
(95, 95, 15),
(96, 96, 16),
(97, 97, 17),
(98, 98, 18),
(99, 99, 19),
(100, 100, 20),
(101, 101, 21),
(102, 102, 22),
(103, 103, 23),
(104, 104, 24),
(105, 105, 25),
(106, 106, 26),
(107, 107, 27),
(108, 108, 28),
(109, 109, 29),
(110, 110, 30),
(111, 111, 31),
(112, 112, 32),
(113, 113, 33),
(114, 114, 34),
(115, 115, 35),
(116, 116, 36),
(117, 117, 37),
(118, 118, 38),
(119, 119, 39),
(120, 120, 40),
(121, 121, 41),
(122, 122, 42),
(123, 123, 43),
(124, 124, 44),
(125, 125, 45),
(126, 126, 46),
(127, 127, 47),
(128, 128, 48),
(129, 129, 49),
(130, 130, 50),
(131, 131, 51),
(132, 132, 52),
(133, 133, 53),
(134, 134, 54),
(135, 135, 55),
(136, 136, 56),
(137, 137, 57),
(138, 138, 58),
(139, 139, 59),
(140, 140, 60),
(141, 141, 61),
(142, 142, 62),
(143, 143, 63),
(144, 144, 64),
(145, 145, 65),
(146, 146, 66),
(147, 147, 67),
(148, 148, 68),
(149, 149, 69),
(150, 150, 70),
(151, 151, 71),
(152, 152, 72),
(153, 153, 73),
(154, 154, 74),
(155, 155, 75),
(156, 156, 76),
(157, 157, 77),
(158, 158, 78),
(159, 159, 79),
(160, 160, 80),
(161, 161, 1),
(162, 162, 2),
(163, 163, 3),
(164, 164, 4),
(165, 165, 5),
(166, 166, 6),
(167, 167, 7),
(168, 168, 8),
(169, 169, 9),
(170, 170, 10),
(171, 171, 11),
(172, 172, 12),
(173, 173, 13),
(174, 174, 14),
(175, 175, 15),
(176, 176, 16),
(177, 177, 17),
(178, 178, 18),
(179, 179, 19),
(180, 180, 20),
(181, 181, 21),
(182, 182, 22),
(183, 183, 23),
(184, 184, 24),
(185, 185, 25),
(186, 186, 26),
(187, 187, 27),
(188, 188, 28),
(189, 189, 29),
(190, 190, 30),
(191, 191, 31),
(192, 192, 32),
(193, 193, 33),
(194, 194, 34),
(195, 195, 35),
(196, 196, 36),
(197, 197, 37),
(198, 198, 38),
(199, 199, 39),
(200, 200, 40),
(201, 201, 41),
(202, 202, 42),
(203, 203, 43),
(204, 204, 44),
(205, 205, 45),
(206, 206, 46),
(207, 207, 47),
(208, 208, 48),
(209, 209, 49),
(210, 210, 50),
(211, 211, 51),
(212, 212, 52),
(213, 213, 53),
(214, 214, 54),
(215, 215, 55),
(216, 216, 56),
(217, 217, 57),
(218, 218, 58),
(219, 219, 59),
(220, 220, 60),
(221, 221, 61),
(222, 222, 62),
(223, 223, 63),
(224, 224, 64),
(225, 225, 65),
(226, 226, 66),
(227, 227, 67),
(228, 228, 68),
(229, 229, 69),
(230, 230, 70),
(231, 231, 71),
(232, 232, 72),
(233, 233, 73),
(234, 234, 74),
(235, 235, 75),
(236, 236, 76),
(237, 237, 77),
(238, 238, 78),
(239, 239, 79),
(240, 240, 80),
(241, 241, 1),
(242, 242, 2);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `TeacherID` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `AnnualSalary` varchar(10) DEFAULT NULL,
  `BackgroundCheck` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`TeacherID`, `FullName`, `Address`, `Phone`, `AnnualSalary`, `BackgroundCheck`) VALUES
(1, 'Mr. John Smith', '12 Maple Ln', '07700900101', '32000', 1),
(2, 'Mrs. Sarah Jones', '45 Oak Rd', '07700900102', '34500', 1),
(3, 'Ms. Emily White', '88 Birch St', '07700900103', '29000', 1),
(4, 'Mr. David Brown', '99 Cedar Ave', '07700900104', '41000', 1),
(5, 'Mrs. Linda Green', '10 Elm Dr', '07700900105', '38000', 1),
(6, 'Mr. Robert Black', '22 Ash Ct', '07700900106', '33500', 1),
(7, 'Ms. Jennifer Grey', '33 Pine Pl', '07700900107', '30500', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `PasswordHash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `PasswordHash`) VALUES
(3, 'admin', '$2y$10$tVFIuEjmHsPozGkXJT2mgul0Ij0LEoXLN4aCZwPg/1QsUK3Xt5QUO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`ClassID`),
  ADD UNIQUE KEY `TeacherID` (`TeacherID`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`ParentID`);

--
-- Indexes for table `pupils`
--
ALTER TABLE `pupils`
  ADD PRIMARY KEY (`PupilID`),
  ADD KEY `ClassID` (`ClassID`);

--
-- Indexes for table `pupil_parent_link`
--
ALTER TABLE `pupil_parent_link`
  ADD PRIMARY KEY (`LinkID`),
  ADD UNIQUE KEY `PupilID` (`PupilID`,`ParentID`),
  ADD KEY `ParentID` (`ParentID`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`TeacherID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `ClassID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `ParentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `pupils`
--
ALTER TABLE `pupils`
  MODIFY `PupilID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `pupil_parent_link`
--
ALTER TABLE `pupil_parent_link`
  MODIFY `LinkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `TeacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`TeacherID`) REFERENCES `teachers` (`TeacherID`) ON DELETE SET NULL;

--
-- Constraints for table `pupils`
--
ALTER TABLE `pupils`
  ADD CONSTRAINT `pupils_ibfk_1` FOREIGN KEY (`ClassID`) REFERENCES `classes` (`ClassID`);

--
-- Constraints for table `pupil_parent_link`
--
ALTER TABLE `pupil_parent_link`
  ADD CONSTRAINT `pupil_parent_link_ibfk_1` FOREIGN KEY (`PupilID`) REFERENCES `pupils` (`PupilID`) ON DELETE CASCADE,
  ADD CONSTRAINT `pupil_parent_link_ibfk_2` FOREIGN KEY (`ParentID`) REFERENCES `parents` (`ParentID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
