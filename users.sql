CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    city VARCHAR(50),
    state VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

INSERT INTO
    users (name, email, password, city, state)
values
    (
        'John Doe',
        'johndoe@gmail.com',
        '123456',
        'San Francisco',
        'California'
    ),
    (
        'Jane Smith',
        'janesmith@gmail.com',
        '654321',
        'New York',
        'New York'
    ),
    (
        'Bob Wilson',
        'bobwilson@gmail.com',
        'abc123',
        'Chicago',
        'Illinois'
    ),
    (
        'Alice Brown',
        'alicebrown@gmail.com',
        'qwerty',
        'Los Angeles',
        'California'
    ),
    (
        'Mike Johnson',
        'mikej@gmail.com',
        'pass123',
        'Seattle',
        'Washington'
    ),
    (
        'Sarah Davis',
        'sarahd@gmail.com',
        'secure789',
        'Boston',
        'Massachusetts'
    ),
    (
        'Tom Anderson',
        'toma@gmail.com',
        'tompass123',
        'Miami',
        'Florida'
    ),
    (
        'Lisa Chen',
        'lisac@gmail.com',
        'chen456',
        'Houston',
        'Texas'
    ),
    (
        'David Miller',
        'davidm@gmail.com',
        'mill789',
        'Denver',
        'Colorado'
    ),
    (
        'Emma Wilson',
        'emmaw@gmail.com',
        'wilson321',
        'Portland',
        'Oregon'
    );