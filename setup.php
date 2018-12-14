<?php
include("config.php");

mysqli_query($conn,"DROP TABLE IF EXISTS `grades`;");
mysqli_query($conn,"DROP TABLE IF EXISTS `users`;");
mysqli_query($conn,"CREATE TABLE `grades` (`studentid` int(11) NOT NULL,`courseid` int(11) NOT NULL,`grade` double(4,2) NOT NULL,`addedby` int(11) NOT NULL) ENGINE=MyISAM DEFAULT CHARSET=latin1;");
mysqli_query($conn,"CREATE TABLE `users` (`id` int(11) NOT NULL AUTO_INCREMENT,`username` varchar(25) NOT NULL,`password` varchar(64) NOT NULL,`firstname` varchar(20) NOT NULL,`lastname` varchar(20) NOT NULL,`token` varchar(64) NOT NULL,`role` int(11) NOT NULL DEFAULT '1',PRIMARY KEY (id)) ENGINE=MyISAM DEFAULT CHARSET=latin1;");

rename($_SERVER['SCRIPT_FILENAME'],$_SERVER['SCRIPT_FILENAME']."_done");  

echo "Setup Done";  
?>