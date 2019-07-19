<?php

$pdo = new PDO('sqlite:./database.sq');
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

$isTableExists = $pdo->query("SELECT name FROM sqlite_master WHERE name='girl'")->fetch();

if (!$isTableExists) {
    $pdo->exec(<<< SQL
CREATE TABLE girl (
    id INTEGER  PRIMARY KEY AUTOINCREMENT,
    last_name varchar(255),
    first_name varchar(255),
    size_of_boobs int
);
SQL
    );
}
$pdo->exec(<<<SQL
INSERT INTO girl (last_name, first_name, size_of_boobs)
VALUES ('Henintsoa', 'Randrianasolo', 2);
SQL
);

$girls = $pdo->query("SELECT * FROM girl")->fetchAll();
var_dump($girls);