<?php  //back_menu_article.php -  back to articles table from reading the article
    if (session_id() == "") session_start();

	global $lan, $conn, $_PSESSION;
	
    include_once 'connect.php';

	include_once 'site_php_library.php';
	 
	p_write_table_parameters_site('id_article_read',''); //article id for reading
	p_write_table_parameters_site('current_tag_read','^^^'); //curent  tag searchinh page of reading article
	p_write_table_parameters_site('n_pos_tag_in_article','0');//curent number of tag position in content of the article
	p_write_table_parameters_site('current_page_read','1'); //curent page for reading
	p_write_table_parameters_site('all_pages_read','0'); //all pages for reading
	p_write_table_parameters_site('ar_tags_read','');//array of tags for reading article
	p_write_table_parameters_site('first_number_symbol_current_page','0'); //number of first symbol curent page for reading
	p_write_table_parameters_site('last_number_symbol_current_page','0'); //number of last symbol curent page for reading
	p_write_table_parameters_site('n_symbols_article','0');//symbol number of all content of the article
	p_write_table_parameters_site('article_data_time', '');//time and data creating article for reading
	p_write_table_parameters_site('t_article_name',''); // article name for reading
	       		   
    table_articles();//List of Articles

?>
