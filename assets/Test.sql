USE `colyseum2`;

SELECT `colyseum_Command`.`id_Command`,`colyseum_Command`.`ref_Command`,`colyseum_Command`.`id_Clients`,`colyseum_Command`.`id_Tickets`,`colyseum_tickets`.`id_Tickets`,`colyseum_shows`.`img_Shows`,`colyseum_shows`.`title_Shows`,`colyseum_shows`.`performer_Shows``colyseum_shows`.`dateHour_Shows`,`colyseum_shows`.`duration_Shows`
FROM `colyseum_command`
LEFT JOIN `colyseum_tickets`
ON `colyseum_Command`.`id_Tickets` = `colyseum_tickets`.`id_Tickets`
LEFT JOIN `colyseum_shows`
ON `colyseum_shows`.`id_Shows` = `colyseum_tickets`.`id_Shows`;






