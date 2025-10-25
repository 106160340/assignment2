CREATE TABLE eoi (
eoi_id INT AUTO_INCREMENT PRIMARY KEY,

job_ref VARCHAR(5) NOT NULL,

first_name VARCHAR(20) NOT NULL,
last_name VARCHAR(20) NOT NULL,
date_of_birth DATE NOT NULL,
gender ENUM('male', 'female', 'other') NOT NULL,

street VARCHAR(40) NOT NULL,
suburb VARCHAR(40) NOT NULL,
state ENUM('VIC', 'NSW', 'QLD', 'TAS', 'ACT', 'NT', 'WA', 'SA') NOT NULL,
postcode CHAR(4) NOT NULL,

email VARCHAR(100) NOT NULL,
phone VARCHAR(12) NOT NULL,

skills TEXT,
other_skill_text VARCHAR(100),

status ENUM('New', 'Current', 'Final') DEFAULT 'New'
);