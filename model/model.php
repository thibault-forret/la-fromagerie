<?php

// Permet de faire le lien avec la bdd

$host = 'localhost:3306';
$dbname = 'b2-gp94';
$username = 'b2-gp94';
$password = '*T1zS6RqZ4gP';

try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

