<?php
session_start();
include('../connect.php');

try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'CREATE TABLE IF NOT EXISTS
table_parameters_site
(
  par_id INT(11) NOT NULL AUTO_INCREMENT,   
  max_rows_page VARCHAR(3) NOT NULL, 
  n_symbols_in_row VARCHAR(3) NOT NULL,
  max_rows_page_read VARCHAR(3) NOT NULL,
  base_url VARCHAR(100) NOT NULL,
  current_page VARCHAR(4) NOT NULL, 
  current_page_read VARCHAR(4) NOT NULL,
  all_pages VARCHAR(4) NOT NULL, 
  all_pages_read VARCHAR(4) NOT NULL, 
  index_array_user_articles_tag VARCHAR(3),
  index_array_user_articles_tag_read VARCHAR(3),
  array_user_articles_tag VARCHAR(200), 
  array_user_articles_tag_read VARCHAR(200),
  current_row_table VARCHAR(4) NOT NULL, 
  ar_tags VARCHAR(200),
  ar_tags_read VARCHAR(200),
  first_number_symbol_current_page VARCHAR(3) NOT NULL,
  last_number_symbol_current_page VARCHAR(3) NOT NULL,
  login_user VARCHAR(20),
  n_symbols_article VARCHAR(5) NOT NULL,
  article_data_time DATETIME,
  t_article_name VARCHAR(100),
  id_article_read VARCHAR(5),
  current_tag VARCHAR(30) NOT NULL,
  current_tag_read VARCHAR(30) NOT NULL,
  n_pos_tag_in_article VARCHAR(5) NOT NULL,
  article_URL VARCHAR(200),
  admin_login VARCHAR(32),
  password VARCHAR(32),
  new_password VARCHAR(32),
  Back_Mail VARCHAR(100) NOT NULL,
  all_row_current_page VARCHAR(4) NOT NULL,
  users_id INT(11),
  autor_registr VARCHAR(3),
  PRIMARY KEY(par_id)
);
';
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table MyGuests created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

?> 
