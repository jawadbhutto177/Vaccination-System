-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 10:09 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaccination_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `email`, `password`, `image`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'assets/imgs/DSC00957.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `h_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `v_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`id`, `p_id`, `h_id`, `date`, `time`, `v_id`, `status`) VALUES
(1, 1, 1, '2024-06-15', '9-11', 1, 'Booked'),
(2, 2, 6, '2024-06-12', '9-11', 3, 'Booked'),
(3, 3, 5, '2024-06-25', '11-1', 2, 'pending'),
(4, 3, 1, '2024-06-25', '9-11', 2, 'Cancel');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`id`, `name`) VALUES
(1, 'Karachi'),
(2, 'Lahore'),
(3, 'Faisalabad'),
(4, 'Rawalpindi'),
(5, 'Gujranwala'),
(6, 'Peshawar'),
(7, 'Multan'),
(8, 'Hyderabad'),
(9, 'Islamabad'),
(10, 'Quetta'),
(11, 'Sargodha'),
(12, 'Sialkot'),
(13, 'Bahawalpur'),
(14, 'Sukkur'),
(15, 'Jhang'),
(16, 'Sheikhupura'),
(17, 'Mardan'),
(18, 'Gujrat'),
(19, 'Larkana'),
(20, 'Kasur');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'hide'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `p_id`, `message`, `status`) VALUES
(1, 1, 'Good', 'show'),
(4, 1, 'Thank you so much for provide this facility..', 'show'),
(5, 3, 'Thank you so much for provide this facility..', 'show'),
(6, 1, 'Thank you', 'hide'),
(7, 1, 'Thank you', 'hide'),
(8, 1, 'M.sachal', 'hide'),
(9, 1, 'M.sachal', 'hide'),
(12, 0, 'Excellent', 'hide'),
(13, 0, 'Excellent', 'hide'),
(14, 2, 'Hi', 'hide'),
(15, 2, 'Good', 'hide');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hospital`
--

CREATE TABLE `tbl_hospital` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `cid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'deactivate'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_hospital`
--

INSERT INTO `tbl_hospital` (`id`, `name`, `contact`, `cid`, `email`, `password`, `image`, `address`, `status`) VALUES
(1, 'Dow University’s Ojha Campus', '922199215757', 1, 'dowojha@gmail.com', 'dow', 'assets/imgs/hospital-images/dow.jpg', 'W4VQ+CMW, Gulzar-e-Hijri Gulshan-e-Iqbal, Karachi, Karachi City, Sindh, Pakistan', 'activate'),
(2, 'Karachi Expo Centre', '02199215749', 1, 'dowojha@gmail.com', 'expo', 'assets/imgs/hospital-images/expo.jpg', 'Finance &Trade Centre، Main Shahrah-e-Faisal Rd, Karachi Cantonment, Karachi, Karachi City, Sindh, Pakistan', 'activate'),
(3, 'Sindh Government Qatar Hospital', '03113007750', 1, 'qatar@gmail.com', 'qatar', 'assets/imgs/hospital-images/qatar.jpg', 'Banaras Bazar Chowk, Sector 8 Orangi Town, Karachi, Karachi City, Sindh 75800, Pakistan ', 'activate'),
(4, 'Jinnah Postgraduate Medical Centre ', '03199201300', 1, 'jmpc@gmail.com', 'jmpc', 'assets/imgs/hospital-images/jinah.jpg', 'Rafiqui, Sarwar Shaheed Rd, Karachi Cantonment, Karachi, Karachi City, Sindh 75510, Pakistan', 'activate'),
(5, 'Lyari General Hospital', '03199201333', 1, 'lyari@gmail.com', 'lyari', 'assets/imgs/hospital-images/lyari.png', 'Rafiqui, Sarwar Shaheed Rd, Karachi Cantonment, Karachi, Karachi City, Sindh 75510, Pakistan', 'activate'),
(6, 'Children’s Hospital, North Nazimabad', '03199201453', 1, 'children@gmail.com', 'children', 'assets/imgs/hospital-images/children.png', 'W24J+GQX, Block 2 Nazimabad, Karachi, Karachi City, Sindh 74600, Pakistan', 'activate'),
(7, 'Sindh Government Hospital, Liaquatabad (SGHL)', '0335647745', 1, 'sghl@gmail.com', 'sghl', 'assets/imgs/hospital-images/SGHL.jpg', 'W362+M9Q, Sharifabad Block 1 Gulberg Town, Karachi, Karachi City, Sindh, Pakistan', 'activate'),
(8, 'Sindh Government Hospital, Korangi (SGHK)', '0377888928', 1, 'sghk@gmail.com', 'sghk', '', 'govt.hospital، sindh، korangi.#5, Sector 35 E Landhi Town, Karachi, Karachi City, Sindh 74900, Pakistan', 'deactivate'),
(9, 'Sindh Government Hospital, Saudabad (SGHS)', '0322768886', 1, 'sghs@gmail.com', 'sghs', '', 'V5VQ+2WX, Saudabad C Area Malir Colony Kala Board, Karachi, Karachi City, Sindh, Pakistan', 'deactivate'),
(10, 'Sindh Government Hospital, Murad Memon Goth (SGHMM', '0226748885', 1, 'sghmm@gmail.com', 'sghmm', '', 'Sindh Government Hospital, near Jamot Muhala, Memon Goth Murad Memon Goth Gadap Town, Karachi, Karachi City, Sindh 75040, Pakistan', 'deactivate'),
(11, 'Expo Centre Lahore', '0319972883', 2, 'ecl@gmail.com', 'ecl', '', 'Main Exhibition Halls, 1-A Abdul Haque Rd, Trade Centre Commercial Area Phase 2 Johar Town, Lahore, Punjab 54782, Pakistan', 'deactivate'),
(12, 'University of Health Sciences (UHS)', '042111333366', 2, 'uhs@gmail.com', 'uhs', '', 'Khayaban-e-Jamia Punjab, Block D Muslim Town, Lahore, Punjab 54600, Pakistan', 'deactivate'),
(13, 'Lahore General Hospital', '04299268801', 2, 'lgh@gmail.com', 'lgh', '', 'Ferozpur Road، near Chungi, Amar Sidhu Ismail Nagar, Lahore, Punjab 54000, Pakistan', 'deactivate'),
(14, 'Services Hospital Lahore', '04299203402', 2, 'shl@gmail.com', 'shl', '', 'Services hospital, Shadman 1 Shadman, Lahore, Punjab 40050, Pakistan', 'deactivate'),
(15, 'Mayo Hospital Lahore', '04299211129', 2, 'mhl@gmail.com', 'mhl', '', 'Hospital Rd, Anarkali Bazaar Lahore, Punjab 54000, Pakistan', 'deactivate'),
(16, 'Pakistan Kidney and Liver Institute and Research C', '042111117554', 2, 'pkli@gmail.com', 'pkli', '', 'Street 1, PKLI Avenue DHA Phase 6, Lahore, Punjab, Pakistan', 'deactivate'),
(17, 'Sir Ganga Ram Hospital Lahore', '04299200572', 2, 'sgrhl@gmail.com', 'sgrhl', '', 'H83C+P78، Shara-I-Fatima Jinnah،, Queen\'s Road, Jinnah Town, Lahore, Punjab', 'deactivate'),
(18, 'Children\'s Hospital Lahore', '04299230907', 2, 'chl@gmail.com', 'chl', '', 'Lahore – Kasur Rd, Nishtar Town, Lahore, Punjab 54000, Pakistan', 'deactivate'),
(19, 'Government Mian Munshi DHQ Teaching Hospital Lahor', '04299330044', 2, 'gmmdthl@gmail.com', 'gmmdthl', '', 'H7GQ+92R, near Taj Company, Sagian Wala, Interchange, Lahore Ring Rd, Band Road, Lahore, Punjab 54000, Pakistan', 'deactivate'),
(20, 'Civic Centers and Basic Health Units Lahore', ' 0329838847', 2, 'ccbhul@gmail.com', 'ccbhul', '', ' H8F5+749 Government College University Lahore (GCUL), near Anarkali Bazaar, Anarkali Bazaar Lahore, Punjab 54000, Pakistan', 'deactivate'),
(21, 'District Health Office Faisalabad', '0419200668', 3, 'dhof@gmail,com', 'dhof', '', 'Executive District Officer for Health, MA Jinnah Rd, Faisalabad, Punjab, Pakistan', 'deactivate'),
(22, 'Allied Hospital Faisalabad', '0419210095', 3, 'ahf@gmail.com', 'ahl', '', 'C3XJ+F38, Dr. Tusi Rd, Faisalabad, Punjab, Pakistan', 'deactivate'),
(23, 'Faisalabad Institute of Cardiology (FIC)', '0419201527', 3, 'fic@gmail.com', 'fic', '', 'New Chenab Club, Sargodha Rd, Civil Lines, Faisalabad, Punjab 38850, Pakistan', 'deactivate'),
(24, 'DHQ Hospital Faisalabad', '0419200140', 3, 'dhf@gmail.com', 'dhf', '', 'Mall Road, Faisalabad, Punjab, Pakistan', 'deactivate'),
(25, 'Government General Hospital Ghulam Muhammadabad Fa', '0419330323', 3, 'gghgmf@gmail.com', 'gghgmf', '', 'C2RW+W77, Block C Ghulam Muhammad Abad, Faisalabad, Punjab, Pakistan', 'deactivate'),
(26, 'Tehsil Headquarter Hospitals Faisalabad (THQF)', '0413422818', 3, 'thqf@gmail.com', 'thqf', '', 'Samundri, Faisalabad, Punjab, Pakistan', 'deactivate'),
(27, 'Basic Health Units (BHUs) and Rural Health Centers', '032224542', 3, 'ghc@gmail.com', 'ghc', '', '88X6+X32, Chak 65 GB Mukanpur, Faisalabad, Punjab, Pakistan', 'deactivate'),
(28, 'University of Agriculture Faisalabad (UAF)', '0419200161', 3, 'uaf@gmail.com', 'uaf', '', 'Jail road chak #212 city Narrwala road near Gulberq police station Rajay wala, Sidhu Pura Rd, Ghulam Muhammad Abad, faiz, Faisalabad, 38000, Pakistan', 'deactivate'),
(29, 'Punjab Medical College Faisalabad', '03457816636', 3, 'pmcf@gmail.com', 'pmcf', '', 'F3HG+4V2, Sargodha Rd, Nanakpur, Bawa Chack 120 JB, Faisalabad, Punjab, Pakistan', 'deactivate'),
(30, 'Rawalpindi Institute of Urology and Transplantatio', '032453654', 4, 'riut@gmail.com', 'riut', '', 'J3WH+73P, Satellite Town, Rawalpindi, Punjab, Pakistan', 'deactivate'),
(31, 'Benazir Bhutto Hospital Rawalpindi (BBHR)', '0519290301', 4, 'bbhr@gmail.com', 'bbhr', '', 'Murree Rd، near Chandni Chowk, Chah Sultan Rawalpindi, Punjab 23000, Pakistan', 'deactivate'),
(32, 'Holy Family Hospital Rawalpindi (HFHR)', '03345296506', 4, 'hfhr@gmail.com', 'hfhr', '', 'Holy Family Rd, Block F Block E Satellite Town, Rawalpindi, Punjab, Pakistan', 'deactivate'),
(33, 'District Headquarter Hospital Rawalpindi (DHQR)', '0515556311', 4, 'dhqr@gmail.com', 'dhqr', '', 'Kashmiri Bazaar Road, Raja Bazar, Rawalpindi, Punjab 46000, Pakistan', 'deactivate'),
(34, 'Tehsil Headquarter Hospitals Rawalpindi (THQR)', '0513761180', 4, 'thqr@gmail.com', 'thqr', '', 'House 1, Hospital, THQ Hospital, House 1 THQ Rd, Gujar Khan, Rawalpindi, Punjab 47850, Pakistan', 'deactivate'),
(35, 'Basic Health Units (BHUs) and Rural Health Centers', '0322546444', 4, 'rhcr@gmail.com', 'rhcr', '', 'PCP2+CQ6, kothe bazar karor, Village Karore, Rawalpindi, Punjab, Pakistan', 'deactivate'),
(36, 'Rawalpindi Medical University (RMU)', '079867676', 4, 'rmu@gmail.com', 'rmu', '', 'Tipu Rd, Chamanzar Colony, Rawalpindi, Punjab 46000, Pakistan', 'deactivate'),
(37, 'Cantonment General Hospital Rawalpindi (CGHR)', '0519270907', 4, 'cghr@gmail.com', 'cghr', '', 'Harding Rd, Saddar, Rawalpindi, Punjab 46000, Pakistan', 'deactivate'),
(38, 'Government General Hospital, Wah Cantt Rawalpindi ', '0519270907', 4, 'gghwcr@gmail.com', 'gghwcr', '', 'Harding Rd, Saddar, Rawalpindi, Punjab 46000, Pakistan', 'deactivate'),
(39, 'Red Crescent Hospital Rawalpindi (RCHR)', '0324453464', 4, 'rchr@gmail.com', 'rchr', '', 'J3R6+CVM, college chowk, Saidpur Rd, New Katarian Satellite Town, Rawalpindi, Punjab, Pakistan', 'deactivate'),
(40, 'District Health Office (DHO) Gujranwala (DHOG)', '0519261209', 5, 'dhog@gmail.com', 'dhog', '', 'M2QM+3HM, G-9 Markaz G 9 Markaz G-9, Gujrawala city, Punjab, Pakistan', 'deactivate'),
(41, 'DHQ Hospital Gujranwala (DHG)', '0519261209', 5, 'dhg@gmail.com', 'dhg', '', '559R+GPR, Civil Lines, Gujranwala, Punjab, Pakistan', 'deactivate'),
(42, 'Government Civil Hospital Gujranwala (GCHG)', '0559200110', 5, 'gchg@gmail.com', 'gchg', '', '559R+PJC, Hospital Rd, Civil Lines, Gujranwala, Punjab, Pakistan', 'deactivate'),
(43, 'Basic Health Units  in various localities Gujranwa', '0519261209', 5, 'bhulg@gmail.com', 'bhulg', '', '559R+GPR, Civil Lines, Gujranwala, Punjab, Pakistan', 'deactivate'),
(44, 'Tehsil Headquarters Hospital Gujranwala  (THQG) ', '0556606080', 5, 'thqg@gmail.com', 'thqg', '', 'C4V7+8P6, Circular Rd, Wazirabad, Gujranwala, Punjab, Pakistan', 'deactivate'),
(45, 'Lady Reading Hospital Peshawar (LRHP)', '0919211430', 6, 'lrhp@gmail.com', 'lrhp', '', 'Soekarno Rd, PTCL Colony Peshawar, Khyber Pakhtunkhwa 25000, Pakistan', 'deactivate'),
(46, 'Khyber Teaching Hospital Peshawar (KTHP)', '0919224400', 6, 'kthp@gmail.com', 'kthp', '', 'University Rd, Rahat Abad, Peshawar, Khyber Pakhtunkhwa, Pakistan', 'deactivate'),
(47, 'Hayatabad Medical Complex Peshawar (HMCP)', '0919217140', 6, 'hmcp@gmail.com', 'hmcp', '', 'Phase-4 Phase 4 Hayatabad, Peshawar, Khyber Pakhtunkhwa, Pakistan', 'deactivate'),
(48, 'Naseerullah Khan Babar Memorial Hospital Peshawar ', '0919212742', 6, 'nkbmhp@gmail.com', 'nkbmhp', '', 'Kohat Rd, Akbar Colony, Peshawar, Khyber Pakhtunkhwa, Pakistan', 'deactivate'),
(49, 'Khyber Pakhtunkhwa Institute of Child Health Pesha', '0919217625', 6, 'kpichp@gmail.com', 'kpichp', '', 'Passport Office Rd, near Regoinal Passport Office, Phase 5 Hayatabad, Peshawar, Khyber Pakhtunkhwa 25100, Pakistan', 'deactivate'),
(50, 'Nishtar Hospital Multan (NHM)', '0919217625', 7, 'nhm@gmail.com', 'nhm', '', 'Passport Office Rd, near Regoinal Passport Office, Phase 5 Hayatabad, Peshawar, Khyber Pakhtunkhwa 25100, Pakistan', 'deactivate'),
(51, 'Children\'s Hospital Multan (CsHM)', '0919217625', 7, 'cshm@gmail.com', 'cshm', '', 'Passport Office Rd, near Regoinal Passport Office, Phase 5 Hayatabad, Peshawar, Khyber Pakhtunkhwa 25100, Pakistan', 'deactivate'),
(52, 'District Headquarters (DHQ) Hospital Multan (DHHM)', '0919217625', 7, 'dhhm@gmail.com', 'dhhm', '', 'Passport Office Rd, near Regoinal Passport Office, Phase 5 Hayatabad, Peshawar, Khyber Pakhtunkhwa 25100, Pakistan', 'deactivate'),
(53, 'Civil Hospital Multan (CHM)', '0919217625', 7, 'chm@gmail.com', 'chm', '', 'Passport Office Rd, near Regoinal Passport Office, Phase 5 Hayatabad, Peshawar, Khyber Pakhtunkhwa 25100, Pakistan', 'deactivate'),
(54, 'Railway Hospital Multan (RHM)', '0919217625', 7, 'rhm@gmail.com', 'rhm', '', 'Passport Office Rd, near Regoinal Passport Office, Phase 5 Hayatabad, Peshawar, Khyber Pakhtunkhwa 25100, Pakistan', 'deactivate'),
(55, 'Social Security Hospital Multan (SSHM)', '0919217625', 7, 'sshm@gmail.com', 'sshm', '', 'Passport Office Rd, near Regoinal Passport Office, Phase 5 Hayatabad, Peshawar, Khyber Pakhtunkhwa 25100, Pakistan', 'deactivate'),
(56, 'Punjab Institute of Cardiology Multan Branch (PICM', '0919217625', 7, 'picmb@gmail.com', 'picmb', '', 'Passport Office Rd, near Regoinal Passport Office, Phase 5 Hayatabad, Peshawar, Khyber Pakhtunkhwa 25100, Pakistan', 'deactivate'),
(61, 'LUMHS (Liaquat University of Medical and Health Sc', '0229213305', 8, 'lumhs@gmail.com', 'lumhs', '', 'C7P9+4W6, Jamshoro, Sindh, Pakistan', 'deactivate'),
(62, 'District Headquarters Hyderabad (DHH)', '0229200740', 8, 'dhh@gmail.com', '', '', '98JQ+C55, Thandi Sarak, near Niaz Stadium, Rani Bagh Qasimabad, Hyderabad, Sindh 71500, Pakistan', 'deactivate'),
(63, 'Pakistan Institute of Medical Sciences Islamabad (', '0519261170', 9, 'pimsi@gmail.com', 'pimsi', '', 'Ibn-e-Sina Rd, G-8/3 G 8/3 G-8, Islamabad, Islamabad Capital Territory, Pakistan', 'deactivate'),
(64, 'Federal Government Services Hospital Islamabad(FGS', '0229248507', 9, 'fgshi@gmail.com', 'fgshi', '', 'P3CJ+CXF, 44 Luqman Hakeem Rd, G-6/2 G 6/2 G-6, Islamabad, Islamabad Capital Territory, Pakistan', 'deactivate'),
(65, 'Polyclinic Hospital Islamabad (PHI)', '0519218300', 9, 'phi@gmail.com', 'phi', '', '44 Luqman Hakeem Rd, G-6/2 G 6/2 G-6, Islamabad, Islamabad Capital Territory, Pakistan', 'deactivate'),
(66, 'National Institute of Rehabilitation Medicine Isla', '0519262213', 9, 'nirmi@gmail.com', 'nirmi', '', ' 2 Street 9, G-8/2 G 8/2 G-8, Islamabad, Islamabad Capital Territory 44000, Pakistan', 'deactivate'),
(67, 'Federal General Hospital Islamabad (FGHI)', '0518441197', 9, 'fghi@gmail.com', 'fghi', '', 'General Wards, NIH Rd, Islamabad, Islamabad Capital Territory 44000, Pakistan', 'deactivate'),
(68, 'Civil Hospital Quetta (CHQ)', '0819202017', 10, 'chq@gmail.com', 'chq', '', 'M.A Jinnah Road, Quetta, Balochistan, Pakistan', 'deactivate'),
(69, 'Bolan Medical Complex Hospital Quetta (BMCHQ)', '0819213030', 10, 'bmchq@gmail.com', 'bmchq', '', 'Brewery Rd، near Goli mar chowk, Quetta, Balochistan, Pakistan', 'deactivate'),
(70, 'Sandeman Provincial Hospital Quetta (SPHQ)', '0518444567', 10, 'sphq@gmail.com', 'sphq', '', '52Q5+732, Patel Bagh Quetta, Balochistan, Pakistan', 'deactivate'),
(71, 'Children\'s Hospital Quetta (CHQ)', '0812823705', 10, 'chq@gmail.com', 'chq', '', '52Q5+732, Quarry Rd, Patel Bagh Quetta, Balochistan, Pakistan', 'deactivate'),
(72, 'DHQ Hospital Quetta (DHQ)', '0819202017', 10, '', '', '', 'M.A Jinnah Road, Quetta, Balochistan, Pakistan', 'deactivate'),
(73, 'Sheikh Zayed Hospital Quetta (SZHQ)', '0812882655', 10, 'szhq@gmail.com', 'szhq', '', 'Kuch Road, Quetta, Balochistan 87300, Pakistan', 'deactivate'),
(74, 'District Headquarters Hospital Sargodha (DHHS)', '0489230340', 11, 'dhhs@gmail.com', 'dhhs', '', '3MJ7+4QF, Mianwali Road, Sargodha, Punjab, Pakistan', 'deactivate'),
(75, 'Shahbaz Sharif General Hospital Sargodha (SSGHS)', '0483221717', 11, 'ssghs@gmail.com', 'ssghs', '', 'Sargodha-Lahore Rd Chak 46-SB, Rafi Park, Sargodha, Punjab 40100, Pakistan', 'deactivate'),
(76, 'Allama Iqbal Memorial Teaching Hospital Sialkot (A', '0483203758', 12, 'aimths@gmail.com', 'aimths', '', 'GG2X+73W, Commissioner Rd, Muhammadpura, Sialkot, Punjab, Pakistan', 'deactivate'),
(77, 'Bahawal Victoria Hospital (BVH)', '0629250411', 13, 'bvh@gmail.com', 'bvh', '', 'Circular Rd, Bahawalpur Cantt, Bahawalpur, Punjab 63100, Pakistan', 'deactivate'),
(78, 'Civil Hospital Bahawalpur (CHB)', '0622720235', 13, 'chb@gmail.com', 'chb', '', 'Jail Rd, Gulshan E Iqbal, Bahawalpur, Punjab, Pakistan', 'deactivate'),
(79, 'Sheikh Zayed Medical College/Hospital Bahawalpur (', '0483356664', 13, 'szmhb@gmail.com', 'szmhb', '', 'VJC8+X4V, رحیم یار خان, Rahim Yar Khan, Punjab, Pakistan', 'deactivate');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient`
--

CREATE TABLE `tbl_patient` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cid` int(11) NOT NULL,
  `address` varchar(150) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'activate'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`id`, `name`, `contact`, `email`, `password`, `cid`, `address`, `gender`, `image`, `status`) VALUES
(2, 'Hussain', '03199201333', 'hussain@gmail.com', 'hussain', 1, 'Rafiqui, Sarwar Shaheed Rd, Karachi Cantonment, Karachi, Karachi City, Sindh 75510, Pakistan', 'male', 'assets/imgs/patient-images/Jawad Hussain.jpg', 'activate'),
(3, 'Adeel', '0346499124', 'adeel@gmail.com', 'adeel', 19, 'Shaikh Muhalla near Midtown Mall Larkana', 'Select Any Gend', 'assets/imgs/patient-images/1594698726980.png', 'activate');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test`
--

CREATE TABLE `tbl_test` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `h_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `result` varchar(50) NOT NULL DEFAULT 'Process'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_test`
--

INSERT INTO `tbl_test` (`id`, `p_id`, `h_id`, `date`, `time`, `result`) VALUES
(1, 1, 1, '', '', 'Process'),
(2, 2, 6, '', '', 'Process');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vaccine`
--

CREATE TABLE `tbl_vaccine` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_vaccine`
--

INSERT INTO `tbl_vaccine` (`id`, `name`, `status`) VALUES
(1, 'Sinopharm (BBIBP-CorV)', 'available'),
(2, 'Sinovac (CoronaVac)', 'available'),
(3, 'CanSino (Convidecia)', 'available'),
(4, 'Sputnik V', 'available'),
(5, 'Pfizer-BioNTech (Comirnaty)', 'available'),
(6, 'Moderna (Spikevax)', 'available'),
(7, 'AstraZeneca (Vaxzevria)', 'available'),
(8, 'Johnson & Johnson (Janssen)', 'available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hospital`
--
ALTER TABLE `tbl_hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_test`
--
ALTER TABLE `tbl_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vaccine`
--
ALTER TABLE `tbl_vaccine`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_hospital`
--
ALTER TABLE `tbl_hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_test`
--
ALTER TABLE `tbl_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_vaccine`
--
ALTER TABLE `tbl_vaccine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
