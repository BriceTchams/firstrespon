-- liste des restaurants avec leur differents menus du jour 

SELECT  *
-- nom , libelle , pu , id_plat , url_photo , id_restau
FROM Restaurant , Plat 

WHERE Restaurant.id_restau = Plat.id_restau ;

-- commandes et ligne de commmande

SELECT * FROM  Commande c , Ligne_commande lc

WHERE c.id_com = lc.id_Com;


SELECT * FROM plat p , restaurant r , Ligne_commande l , client c  , commande cm
WHERE cm.id_client = c.id_client AND l.id_Com = cm.id_com AND l.id_plat = p.id_plat AND 
p.id_restau = r.id_restau AND p.id_restau='1' ;
