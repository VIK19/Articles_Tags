<?php  // index.php - main program of  Articles site
	session_start();
	
	//changing language
        include 'language.php';
	global $lan;
        $lan = $_SESSION['lan'];

	if (isset($_SESSION['autor_registr']))
	{$autor_registr='yes';}
	else { $autor_registr='no';}
	$p_main = '1';
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php  echo $lan['Articles_and_Tags']; ?></title>	

	<link rel="stylesheet" type="text/css"  href="/css/main.css" />	
    <script type="text/javascript" src="js/jquery-3.2.0.min.js"></script> 
	<script type="text/javascript" src="js/jquery.complexify.js"></script> 
    <script type="text/javascript" src="js/site_js_library.js"></script>	
	<meta charset="UTF-8" />
	<meta http-equiv="DESCRIPTION" content="Articles and Tags">
	<meta http-equiv="KEYWORDS" content="article, tag">
</head>

<body  onload="contant_main(&#34;<?php echo $p_main ?>&#34;)">
  <div class="wrapper">
        <div id="header_top">  
		   <h1 align="center"><?php echo $lan["Catalog_of_Articles"] ?></h1>
		   <form action="forma_lang.php" method="post">		   
             <button type="submit" name="button_rus"  id="head_flag_rus"><img src="./img/rus.png" 
			         width="26" title="RRRRRRRRRRRRRR" height="40" >
			 </button>
             <button type="submit" name="button_eng" id="head_flag_eng"><img  src="./img/eng.png" 
			         width="26" title="<?php echo $lan['English'] ?>" height="40" >
			 </button>        
		   </form> 			 
        </div> 

        <div id="content_main1">	<!-- rab --> 	
	    </div>
		
		<div id="content_main">		<!-- rab -->   
	    </div>
		
        <div id="content_main11">	<!-- for forms of article -->	
	    </div>
		
		<div id="content_main2"> <!-- for content of articles -->
	    </div>
		
		<div id="content_main3">	<!-- for buttons and forms-->		 	
                 <div id="select_page"></div> 
			     <form id="searchform" name="name_searchform" method="post">
					  <input id="button_prev_page" type="button" name="name_prev_page" size="100" 
					         value=<?php echo $lan["prev_page"] ?>  />
					  <input id="button_next_page" type="button" name="name_next_page" size="100" 
					         value=<?php echo $lan["next_page"]?>  />
                      <SPAN id="many_pages"><?php echo $lan["Page"]?></SPAN> 
					  <input  id="button_article_search" type="button"  align="middle" name="ok_article_search" size="130" 
					         value=<?php echo $lan["Search"] ?> /> 
					  <input  id="button_article_add" type="button"  align="middle" name="ok_article_add" size="100" 
					         value=<?php echo $lan["Add"] ?> onClick="article_add()"/>
					  <input id="read_page" type="button" name="name_read_page" size="100" 
					         value=<?php echo $lan["read_page"] ?> /> 
					  <input  id="button_article_edit" type="button"  align="middle" name="ok_article_edit" size="100"
					         value=<?php echo $lan["Edit"] ?> />
					  <input  id="button_article_del" type="button"  align="middle" name="ok_article_del" size="100"
          				     value=<?php echo $lan["Delete"] ?> onClick="article_del()">
                      <SPAN id="search_article"></SPAN>							 
                 </form> 	
				 
                 <!-- Form for reading selected article  -->
				 <div id="select_page_read"></div> 
				 <div id="search_article_read"></div>
				 <form id="searchform_read" method="post">
				      <input id="button_prev_page_read" type="button" name="name_prev_page_read" size="100" 
					         value=<?php echo $lan["prev_page"] ?>  />	
					  <input id="button_next_page_read" type="button" name="name_next_page_read" size="100" 
					         value=<?php echo $lan["next_page"]?>  />
                      <SPAN id="many_pages_read"><?php echo $lan["Page"]?></SPAN> 
					  <input  id="button_article_search_read" type="button"  align="middle" name="ok_article_search_read" size="130" 
					         value=<?php echo $lan["Search"] ?> />
					  <input  id="back_menu_article" type="button"  align="middle" name="name_back_menu_article" size="100" 
					         value=<?php echo $lan["Back"] ?> />
							 
                 </form> 
				 
	    </div>
		
 		<div id="menu_bottom">	<!-- rab --> 
		</div>
        
        <div id="footer">
			<div id="copyright1">
                <h5 align="center">Copyright &#169 - <?php echo $lan["Articles_and_Tags"] ?></h5>
			</div>
			<div id="designer"> <!-- rab --> 
			</div>        
        </div>	            
  </div>
</body>
</html>
