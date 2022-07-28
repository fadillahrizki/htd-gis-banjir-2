CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
);

CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE role_routes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_id INT NOT NULL,
    route_path VARCHAR(100) NOT NULL,
    CONSTRAINT fk_role_routes_role_id FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
);

CREATE TABLE user_roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    role_id INT NOT NULL,
    CONSTRAINT fk_user_roles_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    CONSTRAINT fk_user_roles_role_id FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
);

CREATE TABLE application (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    phone VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

CREATE TABLE migrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(100) NOT NULL,
    execute_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

create table kategori (
    id int AUTO_INCREMENT PRIMARY key,
    nama varchar(100),
    bobot varchar(100)
);

create table skor(
    id int AUTO_INCREMENT PRIMARY key,
    kategori_id int not null,
    nama varchar(100),
    nilai varchar(100),
    warna varchar(100),
    CONSTRAINT fk_skor_kategori_id FOREIGN KEY (kategori_id) REFERENCES kategori(id) ON DELETE CASCADE
);

create table hasil(
    id int AUTO_INCREMENT PRIMARY key,
    nama varchar(100),
    nilai_awal varchar(100),
    nilai_akhir varchar(100)
);

create table subjek(
    id int AUTO_INCREMENT PRIMARY key,
    nama varchar(100),
    lat varchar(100),
    lng varchar(100),
    shape varchar(100)
);

create table penilaian(
    id int AUTO_INCREMENT PRIMARY key,
    subjek_id int not null,
    kategori_id int not null,
    skor_id int not null,
    CONSTRAINT fk_penilaian_subjek_id FOREIGN KEY (subjek_id) REFERENCES subjek(id) ON DELETE CASCADE,
    CONSTRAINT fk_penilaian_kategori_id FOREIGN KEY (kategori_id) REFERENCES kategori(id) ON DELETE CASCADE,
    CONSTRAINT fk_penilaian_skor_id FOREIGN KEY (skor_id) REFERENCES skor(id) ON DELETE CASCADE
);