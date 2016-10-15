CREATE TABLE salesman(
id SERIAL PRIMARY KEY,
name TEXT NOT NULL);

CREATE TABLE appt(
id SERIAL PRIMARY KEY,
info TEXT NOT NULL,
pointval INT NOT NULL,
user_id INT REFERENCES salesman(id)
);

CREATE TABLE call(
id SERIAL PRIMARY KEY,
info TEXT NOT NULL,
pointval INT NOT NULL,
user_id INT REFERENCES salesman(id)
);

CREATE TABLE deal(
id SERIAL PRIMARY KEY,
info TEXT NOT NULL,
pointval INT NOT NULL,
user_id INT REFERENCES salesman(id)
);

INSERT INTO salesman(name)
VALUES ('Joel Simmons');
INSERT INTO salesman(name)
VALUES ('Jeff Simmons');

INSERT INTO deal (info, pointval, user_id)
VALUES ('sold a car', 15, 1);
INSERT INTO deal (info, pointval, user_id)
VALUES ('sold a house', 15, 1);
INSERT INTO deal (info, pointval, user_id)
VALUES ('sold a boat', 15, 2);

INSERT INTO appt (info, pointval, user_id)
VALUES ('set an appt - Friday', 15, 2);
INSERT INTO appt (info, pointval, user_id)
VALUES ('set an appt - Thursday', 15, 1);
INSERT INTO appt (info, pointval, user_id)
VALUES ('set an appt - Sunday', 15, 1);

INSERT INTO call (info, pointval, user_id)
VALUES ('call made - Thursday', 15, 1);
INSERT INTO call (info, pointval, user_id)
VALUES ('call made - Sunday', 15, 2);
INSERT INTO call (info, pointval, user_id)
VALUES ('call made - Sunday', 15, 1);
