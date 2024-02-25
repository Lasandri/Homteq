CREATE TABLE Product (
    prodId INT PRIMARY KEY AUTO_INCREMENT,
    prodName VARCHAR(30),
    prodPicNameSmall VARCHAR(100),
    prodPicNameLarge VARCHAR(100),
    prodDescripShort VARCHAR(1000) DEFAULT NULL,
    prodDescripLong VARCHAR(3000) DEFAULT NULL,
    prodPrice DECIMAL(6, 2),
    prodQuantity INT
);


INSERT INTO Product (prodName, prodPicNameSmall, prodPicNameLarge, prodDescripShort, prodDescripLong, prodPrice, prodQuantity)
VALUES ('Product 1 Name', 'small_image1.jpg', 'large_image1.jpg', 'Short description for Product 1', 'Long description for Product 1', 49.99, 100),
       ('Product 2 Name', 'small_image2.jpg', 'large_image2.jpg', 'Short description for Product 2', 'Long description for Product 2', 59.99, 75),
       ('Product 3 Name', 'small_image3.jpg', 'large_image3.jpg', 'Short description for Product 3', 'Long description for Product 3', 29.99, 200),
       ('Product 4 Name', 'small_image4.jpg', 'large_image4.jpg', 'Short description for Product 4', 'Long description for Product 4', 79.99, 50);
