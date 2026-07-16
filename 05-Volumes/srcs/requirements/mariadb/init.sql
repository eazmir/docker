CREATE DATABASE login_app;

CREATE user 'eazmir'@'%' IDENTIFIED by 'lx01';
GRANT ALL PRIVILEGES ON login_app.* TO 'eazmir'@'%';

FLUSH PRIVILEGES;

use login_app;
CREATE TABLE users(
	id INT AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(50) NOT NULL,
	password VARCHAR(255) NOT NULL
);
