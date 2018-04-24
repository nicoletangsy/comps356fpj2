<?php

// Parse a string of semicolon delimited SQL statement,
// returns an array of sql statement
// array parse_sql ( string $string )
function parse_sql($string)
{
    return split_statement(strip_sql_comments($string));
}

function split_statement($string) {
    $stmts = array_map(function ($part) {
        return trim(replace_in_quote($part, "%SINGLEQUOTE%", ";"));
    }, explode(";", replace_in_quote($string, ";", "%SINGLEQUOTE%")));
    array_pop($stmts);
    return $stmts;
}

function replace_in_quote($string, $target, $replacement)
{
    $parts = explode("'", $string);
    foreach ($parts as $i => $_) {
        if ($i % 2 !== 0) {
            $parts[$i] = str_replace($target, $replacement, $parts[$i]);
        }
    }
    return implode("'", $parts);
}

function strip_sql_comments($string)
{
    $strip_comment = function ($line) {
        return preg_replace('/^(.*?)(?:--.*)?$/', '\1', $line);
    };
    return implode("\n", array_map($strip_comment, explode("\n", $string)));
}

function execute_query($query_string)
{
    $mysqli = new mysqli('localhost', 'root', '', 'Cellfish');
    $mysqli->query($query_string);

    if ($mysqli->errno === 0) {
        echo 'QUERY OK', PHP_EOL;
        echo $query_string, PHP_EOL, PHP_EOL;
    } else {
        echo 'QUERY ERROR errno=' . $mysqli->errno . ', error=' . $mysqli->error, PHP_EOL;
        echo $query_string, PHP_EOL, PHP_EOL;
        die();
    }
}

function execute_queries($queries)
{
    array_map("execute_query", $queries);
}

function initialize_database()
{
    $mysqli = new mysqli('localhost', 'root', '');
    if ($mysqli->connect_errno) {
        die('Connect Error ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error);
    }

    if ($mysqli->select_db('Cellfish')) {
        $mysqli->query('DROP DATABASE `Cellfish`');
        if ($mysqli->errno) {
            die('Error ' . $mysqli->errno . ': ' . $mysqli->error);
        }
    }

    $mysqli->query('CREATE DATABASE `Cellfish` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
    if ($mysqli->errno) {
        die('Error ' . $mysqli->errno . ': ' . $mysqli->error);
    }

    $mysqli->select_db('Cellfish');
    if ($mysqli->errno) {
        die('Error ' . $mysqli->errno . ': ' . $mysqli->error);
    }

    $mysqli->close();
}


echo date('Y-m-d H:i:s'), ' Initialize database tables', PHP_EOL;
echo 'PHP version: ' . phpversion(), PHP_EOL, PHP_EOL;

initialize_database();
execute_queries(parse_sql(file_get_contents(__DIR__ . '/create_tables.sql')));
execute_queries(parse_sql(require(__DIR__ . '/seeds.sql.php')));
