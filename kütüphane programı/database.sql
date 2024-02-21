CREATE DATABASe kutuphane;
USE kutuphane;

CREATE TABLE kullanici (
    id INT PRIMARY KEY,
    ad VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);

CREATE TABLE kitaplar (
    id INT PRIMARY KEY,
    kitapAdi VARCHAR(255),
    yazar VARCHAR(255),
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES kullanici(id)
);

INSERT INTO users (username, email,id) VALUES
    ('Pelin', 'pelin@example.com',1),
    ('Kadir', 'kadir@example.com',2);

INSERT INTO books (title, author, user_id) VALUES
    ('Bir Kurt Adam Vakası', 'Sigmund Freud', 1),
    ('Musa ve Tek Tanrıcılık', 'Sigmund Freud', 2);