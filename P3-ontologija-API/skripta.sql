create database isvalina_20_20 default character set utf8;

use isvalina_20_20;

create table ontologija(
    sifra int not null primary key auto_increment,
    nazivFilma varchar(255) not null,
    zanr varchar(255) not null,
    nagrada varchar(255) not null,
    godinaIzlaska int(8) not null,
    trajanjeFilma varchar(255) not null
);


drop table ontologija;

insert into ontologija(sifra, nazivFilma, zanr, nagrada, godinaIzlaska, trajanjeFilma) values (2, "Testni Film","testni SF","testni Oscar",2010,"testnih 106 min");

select * from ontologija 

DELETE FROM ontologija
WHERE sifra = 1;