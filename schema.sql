CREATE TABLE IF NOT EXISTS employees(
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE employee_attendance(
    employee_id BIGINT UNSIGNED NOT NULL,
    date VARCHAR(10) NOT NULL,
    status ENUM('presence', 'absence'),
    FOREIGN KEY (employee_id) REFERENCES employees(id) ON UPDATE CASCADE ON DELETE CASCADE
);