drop database T197Tienda;
create database T197Tienda;

use T197Tienda; 

create table producto(
    idproducto int primary key auto_increment,
    nombreproducto varchar(255) not null default '',
    descripcionproducto varchar(1024) not null default '',
    precioproducto decimal (20,10) not null default 0,
    inventarioproducto int not null default 0,
    urlproducto varchar(2048) not null default 'imgs/nofoto.png',
    activo int not null default 0

);


insert into producto 
    (nombreproducto, descripcionproducto, precioproducto, inventarioproducto, urlproducto, activo) 
    values('Playera Nier: Automata','
Playera negra 100% algodón, impresa en serigrafía tacto cero.', 200, 18, 'imgs/playeranier.png', 1);


insert into producto 
    (nombreproducto, descripcionproducto, precioproducto, inventarioproducto, urlproducto, activo) 
    values('Playera RDRII','
Playera negra 100% algodón, impresa en serigrafía tacto cero.', 210, 20, 'imgs/playerardrii.png', 1);

insert into producto 
    (nombreproducto, descripcionproducto, precioproducto, inventarioproducto, urlproducto, activo) 
    values('Playera mega man','
Playera gris claro jaspe (90% Algodón/ 10% poliéster) cuello redondo, impresión digital directa a prenda (DTG) tacto cero. El tacto cero, da como resultado que no se perciba textura, ni altos relieves, ni rigidez en la estampación.', 350, 30, 'imgs/playeramegaman.png', 1);
