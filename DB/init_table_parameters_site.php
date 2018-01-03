<?php  //init_table_parameters_site.php - initialisation of table table parameters_site
	global $lang, $lan,  $autor_registr, $conn;
	include ('../connect.php'); 
	global $conn;

	$max_rows_page  = '10'; //max number of rows in first page of the table
    $n_symbols_in_row  = '80'; //number of symbols in the row (for reading)
    $max_rows_page_read  = '20'; //max number of articles on the page for reading
    $base_url = '192.168.56.101'; //WEB-server
    $current_page = '0'; //curent page
    $current_page_read = '0'; //all pages for reading
    $all_pages  = '0'; //all pages
    $all_pages_read  = '0'; //all pages for reading
	$index_array_user_articles_tag = ''; //how times user push on the search tag button
    $index_array_user_articles_tag_read = ''; //how times user push on the search tag button in the reading article
    $array_user_articles_tag = ''; //  list of all article of this user with this tag
    $array_user_articles_tag_read = ''; #  list of all pages  with this tag for reading selected article
    $current_row_table =  ''; //number of selected row on current page
    $ar_tags = ''; # list of  of tags
    $ar_tags_read = ''; # list  of tags for reading article
    $first_number_symbol_current_page  = '0'; //number of first symbol curent page for reading
    $last_number_symbol_current_page  = '0'; //number of last symbol curent page for reading
    $login_user  = ''; //user login
    $n_symbols_article = '0';  //symbol number of all content of the article
    $article_data_time  = ''; //time and data creating article for reading
    $t_article_name  = '';  //article name for reading
    $id_article_read  = ''; //article id for reading
	$current_tag  = '^^^'; //curent  tag for searching article names with selected tag
    $current_tag_read  = '^^^'; //curent  tag searchinh page of reading article
    $n_pos_tag_in_article  = '-1'; //curent number of tag position in content of the article
    $article_URL  = ''; //article URL
	$admin_login = '111'; //admin login
	$password = md5(md5('111'));//admin password
    $new_password  = ''; //new password
    $Back_Mail  = 'vladik1910@gmail.com'; //back email
    $all_row_current_page = '0';  // all row current page
    $autor_registr   = ''; // = 'yes' or 'no' - yes or no registration of this user 	

	$sql = "INSERT INTO table_parameters_site 
	        ( max_rows_page,
              n_symbols_in_row,
              max_rows_page_read,
              base_url,
              current_page,
              current_page_read,
              all_pages,
              all_pages_read,
			  index_array_user_articles_tag,
              index_array_user_articles_tag_read,
              array_user_articles_tag,
              array_user_articles_tag_read,
              current_row_table,
              ar_tags,
              ar_tags_read,
              first_number_symbol_current_page,
              last_number_symbol_current_page,
              login_user,
              n_symbols_article,
              t_article_name,
              id_article_read,
			  current_tag,
              current_tag_read,
              n_pos_tag_in_article,
              article_URL,
			  admin_login,
			  password,
              new_password,
              Back_Mail,
              all_row_current_page
			)
	        VALUES 
			 ('10',
              '80',
              '20',
              '192.168.56.102',
              '0',
              '0',
              '0',
              '0',
			  '0',
			  '0',
              '',
              '',
              '-1',
              '',
              '',
              '0',
              '0',
              '',
              '0',
              '',
              '',
              '^^^',
              '^^^',
              '0',
              '',"
			  .$conn->quote($admin_login).","
			  .$conn->quote($password).",
              '',
              'vladik1910@gmail.com',
              '0'
			 )
		   ";

          // Prepare statement
          $stmt = $conn->prepare($sql);
		  // execute the query
		  $stmt->execute();

?>	