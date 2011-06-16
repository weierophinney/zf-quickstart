-- scripts/data.sqlite.sql
--
-- You can begin populating the database with the following SQL statements.

INSERT INTO guestbook (email, comment, created) VALUES
    ('ralph.schindler@zend.com',
    'Hello! Hope you enjoy this sample zf application!',
    DATETIME('NOW'));
INSERT INTO guestbook (email, comment, created) VALUES
    ('foo@bar.com',
    'Baz baz baz, baz baz Baz baz baz - baz baz baz.',
    DATETIME('NOW'));
