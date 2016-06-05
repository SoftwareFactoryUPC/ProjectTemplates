CREATE TABLE accounts(
    account_id INT NOT NULL AUTO_INCREMENT,
    customer_id INT NOT NULL ,
    balance FLOAT NOT NULL,
    PRIMARY KEY ( account_id ), 
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id) 
) ENGINE=INNODB;