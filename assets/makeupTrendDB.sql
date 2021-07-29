
-- Autor: Andrés Ricardo Beltrán Sarta - 2021 

-- CREDENCIALES PRUEBAS

-- Base de datos: makeuptrend
-- localhost
-- username: root
-- password: 
-- Correr el sql por partes para evitar fallos.

-- CREDENCIALES PRUEBAS

-- Base de datos: makeuptr_makeuptrend
-- localhost
-- username: makeuptr_admin
-- password: Ih*8SOYF[A$6
-- Correr el sql por partes para evitar fallos.


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

create table state_sale (
    id int(11) AUTO_INCREMENT primary key,
    name varchar(60) not null
);

create table products (
    id int(11) AUTO_INCREMENT primary key,
    name varchar(255) not null,
    quantity int(3) unsigned not null,
    sale_price int(11) not null,
    categorie_id int(11) not null,
    media_id int(11) not null,
    date datetime not null,
    description varchar(5000) not null,
    brand_id int(11) not null,
    offer int(11) not null,
    unique (id)
);

create table sales (
    id int(11) AUTO_INCREMENT primary key,
    name varchar(200) not null,
    cel_phone varchar(11) not null,
    email varchar(200) not null,
    department varchar(200) not null,
    city varchar(200) not null,
    direction varchar(200) not null,
    neighborhood varchar(200) not null,
    type_ubication varchar(200) not null,
    payment_method varchar(200) not null,
    shipping_type varchar(200) not null,
    state int(11) not null,
    shipping varchar(11) not null,
    channel varchar(30) not null,
    date date not null,
    description_products varchar(5000)
);

create table sales_products (
    id int(11) not null,
    product_id int(11) not null,
    qty int(11) not null,
    price int(11) not null,
    price_product int(11) not null
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

alter table sales_products
add constraint fk_sale
foreign key (id) references sales(id);

alter table sales_products
add constraint fk_product_sales
foreign key (product_id) references products(id);

alter table sales
add constraint fk_state_sale
foreign key (state) references state_sale(id);

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

insert into state_sale (name) values
('Completada'),
('Pago Pendiente'),
('Pago Exitoso'),
('Pago Rechazado'),
('Cancelada');

insert into products (name, quantity, sale_price, categorie_id, media_id, date, description, brand_id, offer) values
('Filtro de gasolina', 100, 1000, 1, 1, '2017-06-16 07:03:16','Producto de comercialización, pureba número 1', 1, 0);

insert into user_groups (group_name, group_level, group_status) values
('Admin', 1, 1),
('User', 3, 1);

insert into users (name, username, password, user_level, image, status, last_login) values
('Administrador', 'wwdani2011@hotmail.com', 'cf39b7344ee731194fd703a3a31efd5ec421c89a', 1, 'pzg9wa7o1.jpg', 1, '2017-06-16 07:11:11');


