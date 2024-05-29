-- trigger pour restaurant
DELIMITER $

CREATE TRIGGER insertion_restaurant
BEFORE INSERT ON Restaurant for each row
BEGIN
	declare counter int;
    select count(*) into counter from Restaurant;
	set new.id_restau = concat('RESTAU',counter);
END$

-- TRIGGER POUR LES CLIENTS 


CREATE TRIGGER insertion_CLIENT
BEFORE INSERT ON Client for each row
BEGIN
	declare counter int;
    select count(*) into counter from Client;
	set new.id_client = concat('CL',counter);
END$

