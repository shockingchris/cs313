DROP TABLE scripture;

CREATE TABLE scripture (
id SERIAL PRIMARY KEY,
book TEXT NOT NULL,
chapter INT NOT NULL,
verse INT NOT NULL,
content TEXT NOT NULL);

INSERT INTO scripture (book, chapter, verse, content)
	VALUES('John',1,5,'heyy');
INSERT INTO scripture (book, chapter, verse, content)
	VALUES('Matt',2,6,'yo');
INSERT INTO scripture (book, chapter, verse, content)
	VALUES('Luke',4,7,'hello');
INSERT INTO scripture (book, chapter, verse, content)
	VALUES('Mark',12,35,'AHHHH');