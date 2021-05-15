
-- Autor: Andrés Ricardo Beltrán Sarta - 2021 


-- Base de datos: makeuptrend
-- localhost
-- username: root
-- password: 


--------------- CREACIÓN DE TABLAS -----------------

create table categories (
    id int(11) AUTO_INCREMENT primary key,
    name varchar(60) not null
);

create table brands (
    id int(11) AUTO_INCREMENT primary key,
    name varchar(60) not null
);

create table media (
    id int(11) AUTO_INCREMENT primary key,
    file_name varchar(255) not null,
    file_type varchar(100) not null
);

create table products (
    id int(11) AUTO_INCREMENT primary key,
    name varchar(255) not null,
    quantity int(3) not null,
    sale_price decimal(25,2) not null,
    categorie_id int(11) not null,
    media_id int(11) not null,
    date datetime not null,
    description varchar(5000 not null,
    brand_id int(11) not null,
    unique (id)
);

create table sales (
    id int(11) AUTO_INCREMENT primary key,
    product_id int(11) not null,
    qty int(11) not null,
    price decimal(25,2) not null,
    date date not null
);

create table users (
    id int(11) AUTO_INCREMENT primary key,
    name varchar(60) not null,
    username varchar(50) not null,
    password varchar(255) not null,
    user_level int(11) not null,
    image varchar(255) default 'no_image.jpg',
    status int(1) not null,
    last_login datetime default null,
    unique (username)
);

create table user_groups (
    id int(11) AUTO_INCREMENT primary key,
    group_name varchar(150) not null,
    group_level int(11) not null,
    group_status int(1) not null,
    unique (group_level)
);


--------------- CREACIÓN DE RELACIONES -----------------

alter table products
add constraint fk_categorie_product
foreign key (categorie_id) references categories(id);

alter table products
add constraint fk_brand_product
foreign key (brand_id) references brands(id);

alter table products
add constraint fk_media_product
foreign key (media_id) references media(id);

alter table sales
add constraint fk_product_sales
foreign key (product_id) references products(id);

alter table users
add constraint fk_user
foreign key (user_level) references user_groups(group_level);


--------------- INGRESO DE DATOS A LAS TABLAS -----------------

insert into categories (name) values 
('Brochas'),
('Cejas'),
('Cuidado de piel'),
('Labios'),
('Ojos'),
('Piel');

insert into brands (name) values
('Trendy'),
('Dolce Bella'),
('DepilYa');

insert into media (file_name, file_type) values
('filter.jpg','image/jpeg');

insert into products (name, quantity, sale_price, categorie_id, media_id, date, description, brand_id) values
('Filtro de gasolina', 100, 10.00, 1, 1, '2017-06-16 07:03:16','Producto de comercialización, pureba número 1', 1);

insert into user_groups (group_name, group_level, group_status) values
('Admin', 1, 1),
('Special', 2, 0),
('User', 3, 1);

insert into users (name, username, password, user_level, image, status, last_login) values
('Admin Users', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'pzg9wa7o1.jpg', 1, '2017-06-16 07:11:11'),
('Special User', 'special', 'ba36b97a41e7faf742ab09bf88405ac04f99599a', 2, 'no_image.jpg', 1, '2017-06-16 07:11:26'),
('Default User', 'user', '12dea96fec20593566ab75692c9949596833adc9', 3, 'no_image.jpg', 1, '2017-06-16 07:11:03');



insert into products (name, quantity, sale_price, categorie_id, media_id, date, description, brand_id) values
('TRENDY SKINCARE CREMA CONTORNO DE OJOS TRENDY 30ML (IDEAL DESDE LOS 20-30 AÑOS)', 100, 10.00, 1, 1, '2017-06-16 07:03:16',
'¿Por qué debemos usar contorno de ojos? Esta parte de nuestra piel es menos gruesa que el resto del rostro, además es de las que necesit más flexibilidad debido al movimiento que hacemos con los ojos. Es por eso que cuando estamos felices, tristes, cansados o simplemente con la edad se van notando signos de envejecimiento especialmente en esta zona, antes que en el resto de la cara. Otro factor es que  posee menos fibras de elastina y colágeno, así como menos glándulas sebáceas.
¿Qué es un contorno de ojos? Es un producto en crema que tiene muchísimos beneficios en nuestra piel, aportando hidratación y flexibilidad, tiene un alto poder re afirmante y antiarrugas. Recuerda que al igual que todos los productos de cuidado de piel debe ser progresivo y su éxito depende de su aplicación constante para potenciar su efecto.
¿Por qué tenemos 2 tipos de contorno de ojos?
1. CONTORNO DE OJOS: Enfocado para pieles mixtas a grasas entre los 20-35 años. Está diseñada para humectar y revitalizar la zona, formulada especialmente con:
Extracto de úrea: lo que hace que evitemos la pérdida de agua en la piel.
Extracto de pepino: es astringente, por lo que reduce el acné y la producción excesiva de grasa en el rostro.
Extracto de avena: elimina células muertas e impurezas, tiene efecto limpiador, absorbe la suciedad que se acumula en los poros.
Extracto de Aloe: suaviza la piel, actuando como un excelente regenerador celular, asegura una muy buena penetración del producto en la piel.
2. CONTORNO DE OJOS, ARRUGAS Y BOLSAS: Enfocado a pieles mixtas a secas mayores a 35 años, o maduras. No es una restricción obligatoria la edad sino más en el tipo de piel, ya que tenemos diferentes necesidades. Diseñado para disminuir la presencia de ojeras o círculos negros, líneas de expresión o bolsas de inflamación, formulada especialmente con:
Extracto de pepino: es astringente, por lo que reduce el acné y la producción excesiva de grasa en el rostro.
Extracto de caléndula: ayuda a tonificar la zona, aportando suavidad, rápida cicatrización y propiedades antiinflamatorias.
Extracto de Pfaffia: oxigena las cédulas de la piel, actuando como un agente protector, permitiendo una mejor circulación y una mejor apariencia.
Extracto de úrea: lo que hace que evitemos la pérdida de agua en la piel.
Extracto de flor de lirio: hidrata y suaviza la piel en profundidad desde la última capa y estimula la capacidad de autorregulación de la piel.
MODO DE USO EN LA MAÑANA:
Suero antiedad
Crema hidratante
Protector solar
Contorno de ojos
MODO DE USO EN LA NOCHE CON EL ROSTRO LIMPIO:
Suero antiedad
(Opcional: Crema hidratante)
Contorno de ojos', 1);

