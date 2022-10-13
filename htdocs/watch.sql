DROP DATABASE IF EXISTS watch_shop;

CREATE DATABASE watch_shop DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

USE watch_shop;

CREATE TABLE tbl_watch
(	 
    cd_watch INT PRIMARY KEY AUTO_INCREMENT,
    nm_watch VARCHAR(70) NOT NULL,
    photo VARCHAR (100) NOT NULL,
    price DECIMAL(6,2) NOT NULL,
    label VARCHAR (30) NOT NULL, 
    qt_store INT NOT NULL,
    ds_product TEXT NOT NULL,
    ds_cover VARCHAR(255) NOT NULL,
    sg_new enum('S','N') not null
);


CREATE TABLE tbl_contact(
    con_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    con_name VARCHAR (50) NOT NULL,
    con_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    con_email VARCHAR (100) NOT NULL,
    con_tel VARCHAR (20) NOT NULL,
    cont_sub ENUM ('sugestao','critica', 'elogio','outro'),
    con_tent TEXT NOT NULL
);

CREATE TABLE tbl_users (
  user_id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  user_name varchar(220) NOT NULL,
  user_email varchar(520) NOT NULL,
  user_pass varchar(50) NOT NULL,
  user_status ENUM('on','off', 'deleted')DEFAULT 'on' NOT NULL,
  user_type ENUM ('1', '2') NOT NULL DEFAULT '2',
  created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  modified datetime DEFAULT NULL,
  user_address VARCHAR(60) NOT NULL,
  user_birth DATE NOT NULL,
  user_zipcode VARCHAR(10) NOT NULL,
  user_number VARCHAR(10) NOT NULL,
  user_complement VARCHAR(60) NOT NULL,
  user_reference  VARCHAR(60) NOT NULL,
  user_cpf VARCHAR(20) NOT NULL,
  user_phone VARCHAR(20) NOT NULL
);

CREATE TABLE tbl_dropshipping(
  comp_id INT PRIMARY KEY AUTO_INCREMENT,
  comp_name VARCHAR (40) NOT NULL,
  comp_email VARCHAR (30) NOT NULL,
  comp_country VARCHAR (20)NOT NULL
);


CREATE TABLE  tbl_order (
  order_id int(11) PRIMARY KEY AUTO_INCREMENT,
  nb_ticket varchar(15) NOT NULL,
  id_client INT(11) NOT NULL,
  id_product INT(11) NOT NULL,
  qt_product INT(11) NOT NULL,
  vl_item DECIMAL(10,2) NOT NULL,
  vl_total_item DECIMAL(10,2) GENERATED ALWAYS AS ((qt_product * vl_item)) VIRTUAL,
  dt_order TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE VIEW vw_venda
AS SELECT
tbl_order.nb_ticket,
tbl_order.id_client,
tbl_order.dt_order,
tbl_watch.nm_watch,
tbl_order.id_product,
tbl_order.qt_product,
tbl_order.vl_total_item   
FROM tbl_order inner join tbl_watch
ON tbl_order.id_product = tbl_watch.cd_watch;

INSERT INTO tbl_users (user_name, user_email, user_pass, user_type) VALUES
( 'Cesar Szpak', 'cesar@celke.com.br', SHA1('minhasenha'),1),
( 'Kelly', 'kelly@celke.com.br', SHA1('minhasenha'), 2),
('Jessica', 'jessica@celke.com.br', SHA1('1234'), 2);


INSERT INTO tbl_users(
user_name,
user_email,
user_pass,
user_address,
user_type,
user_birth,
user_zipcode,
user_number,
user_complement,
user_reference,
user_cpf,
user_phone
)VALUES (
  'Roberto Pimenta',
  'tomas@nett.com',
  SHA1('abc12345'),
  'Rua das ervas',
  2,
  '1987-07-13',
  '45070-980',
  '669',
  'APTO',
  'Próximo ao posto ipiranga',
  '999.888.777-66',
  '(21) 99999-8888'
);


CREATE VIEW vw_watch 
AS SELECT * FROM tbl_watch;

INSERT INTO `tbl_watch` (`cd_watch`, `nm_watch`, `photo`, `price`, `label`, `qt_store`, `ds_product`, `ds_cover`, `sg_new`) VALUES
(10, 'Mültich', '../img/6330bd374100f.png', '2000.00', 'RedDot', 13, 'Relógio feito em ouro e prata, produzido nas montanhas do Himalaia', '', 'S'),
(11, 'Dexter Mandala', '../img/6330bde2d7388.png', '230.00', 'Rosenberg', 27, 'Relógio em prata. Ele é produzido pela marca israelense Rosenberg.', '', 'N'),
(12, 'Ritchie', '../img/6330be764a2a4.png', '200.00', 'Vought', 10, 'Relógio de ferro produzido pela marca alemã Vought. As horas são mostradas em números.', '', 'N'),
(13, 'Roxan', '../img/6330c14bd4c08.png', '350.00', 'Vision', 40, 'Relógio em ouro legítimo da marca Vision. Horas marcas em números.', '', 'S'),
(14, 'Fitch', '../img/6330c19bd7f9b.png', '150.00', 'Brasil relógios', 19, 'Relógio nacional. Lançamento 2022.', '', 'N'),
(15, 'Maxmilian', '../img/6330c2ba09925.png', '200.56', 'Max', 23, 'Relógio austríaco. Este modelo vem sendo reproduzido desde os anos 70.', '', 'N'),
(16, 'Luz', '../img/6330c319e7527.png', '600.00', 'Roswell', 15, 'Relógio de marca estrangeira, mas produzido no Brasil. Ele é feito do verdadeiro metal brasileiro.', '', 'N'),
(17, 'Oceano', '../img/6330c38863283.png', '463.00', 'RedDot', 5, 'Edição limitada para o Brasil. ', '', 'S'),
(18, 'Wanda', '../img/6330c4024a540.png', '6000.00', 'Pitty', 12, 'Este é o verdadeiro relógio de luxo. Apenas quem tem a elegância em alta estima o usa.', '', 'N'),
(19, 'Caçador', '../img/6330c446ba483.png', '300.00', 'Mültich', 16, 'Relógio de bolso sem capa.', '', 'N'),
(20, 'Kansas', '../img/6330c4881830f.png', '530.00', 'Decompress', 34, 'Relógio de marca americana.', '', 'N'),
(21, 'Vivian', '../img/6330c4d63e451.png', '120.00', 'Carrier', 280, 'Relógio de bolso básico.', '', 'N'),
(22, ' Relógio Naruto', '../img/6330c510d556a.png', '360.00', 'Animes & CIA', 80, 'Relógio temático do Naruto. Edição limitada.', '', 'S'),
(23, 'Grand', '../img/6330c568db7c6.png', '780.00', 'Winchester', 6, 'Relógio clássico. Este foi feito no início dos anos 50, e mantido conservado até hoje.', '', 'N'),
(24, 'Holandês voador', '../img/6330c6a95d748.png', '470.00', 'Rosenberg', 18, 'Mais um relógio de alta qualidade da marca Rosenberg. ', '', 'N'),
(25, 'Carey', '../img/6330c7238891e.png', '2300.00', 'Pitty', 30, 'Relógio criado em homenagem à cantora Mariah Carey.', '', 'N'),
(26, 'Vida', '../img/6330c7727e1c1.png', '1000.00', 'Roswell', 20, 'Relógio inglês feito do verdadeiro ouro europeu.', '', 'N'),
(27, 'Ros', '../img/6330c7d31e80b.png', '3650.00', 'Roswell', 13, 'Relógio da verdadeira prata europeia.', '', 'N'),
(29, 'Diaz', '../img/6330c868eb50a.png', '958.00', 'Rosenberg', 22, 'Relógio da marca Rosenberg.', '', 'N'),
(30, 'Demander', '../img/6330c8d9d6168.png', '800.00', 'Roswell', 23, 'Relógio Roswell. A qualidade já é conhecida.', '', 'N');
