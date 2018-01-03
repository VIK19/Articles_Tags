/*  global */
var  all_curent_row, curent_rowm, tek_kadr;

var rab = ajax_prev1();//start programs

function fnselect1(all_row_current_page) //select thirst row
{
   for (var i = 1; i <= all_row_current_page; i++) 
   {
       document.getElementById("row"+i).style.background = "#b3b3b3";
   }//for
   document.getElementById("row1").style.background = "#d0c3b2";
   curent_row = 1;
   rab = f_read_page();
}//

function fnselect2(all_row_current_page) //select 2-th row
{
   for (var i = 1; i <= all_row_current_page; i++) 
   {
       document.getElementById("row"+i).style.background = "#b3b3b3";
   }//for
   document.getElementById("row2").style.background = "#d0c3b2";
   curent_row = 2;
   rab = f_read_page();
}//

function fnselect3(all_row_current_page)//select 3-th row
{
   for (var i = 1; i <= all_row_current_page; i++) 
   {
       document.getElementById("row"+i).style.background = "#b3b3b3";
   }//for
   document.getElementById("row3").style.background = "#d0c3b2";
   curent_row = 3;
   rab = f_read_page();   
}//
function fnselect4(all_row_current_page) //select 4-th row
{
   for (var i = 1; i <= all_row_current_page; i++) 
   {
       document.getElementById("row"+i).style.background = "#b3b3b3";
   }//for
   document.getElementById("row4").style.background = "#d0c3b2";
   curent_row = 4;
   rab = f_read_page();
}//
function fnselect5(all_row_current_page)//select 5-th row
{
   for (var i = 1; i <= all_row_current_page; i++) 
   {
       document.getElementById("row"+i).style.background = "#b3b3b3";
   }//for
   document.getElementById("row5").style.background = "#d0c3b2";
   curent_row = 5;
   rab = f_read_page();
}//
function fnselect6(all_row_current_page)//select 6-th row
{
   for (var i = 1; i <= all_row_current_page; i++) 
   {
       document.getElementById("row"+i).style.background = "#b3b3b3";
   }//for
   document.getElementById("row6").style.background = "#d0c3b2";
   curent_row = 6;
   rab = f_read_page();
}//
function fnselect7(all_row_current_page)//select 7-th row
{
   for (var i = 1; i <= all_row_current_page; i++) 
   {
       document.getElementById("row"+i).style.background = "#b3b3b3";
   }//for
   document.getElementById("row7").style.background = "#d0c3b2";
   curent_row = 7;
   rab = f_read_page();
}//
function fnselect8(all_row_current_page)//select 8-th row
{
   for (var i = 1; i <= all_row_current_page; i++) 
   {
       document.getElementById("row"+i).style.background = "#b3b3b3";
   }//for
   document.getElementById("row8").style.background = "#d0c3b2";
   curent_row = 8;
   rab = f_read_page();
}//
function fnselect9(all_row_current_page)//select 9-th row
{
   for (var i = 1; i <= all_row_current_page; i++) 
   {
       document.getElementById("row"+i).style.background = "#b3b3b3";
   }//for
   document.getElementById("row9").style.background = "#d0c3b2";
   curent_row = 9;
   rab = f_read_page();
}//
function fnselect10(all_row_current_page)//select 10-th row
{
   for (var i = 1; i <= all_row_current_page; i++) 
   {
       document.getElementById("row"+i).style.background = "#b3b3b3";
   }//for
   document.getElementById("row10").style.background = "#d0c3b2";
   curent_row = 10;
   rab = f_read_page();
}//

function f_read_page()//read page with selected row
{

   $("#content_main2").show(); 
   var curent_row_DB = curent_row;    
   $.post("./f_read_page.php", {search_term : curent_row}, function(data)
		   {
               if (data.length>0)
		       { 
                   $("#content_main2").html(data); 
               } 
           }
		   ) 
}//read_page


function ajax_prev1()//start program after user event
{

       $(document).ready(function() 
	   { 	   
          $("#button_next_page").on('click',null,function(e)
		  { 
  
             e.preventDefault(); 
             next_page(); 
			 select_page2();
          }
	      );
		  
		  $("#button_next_page_read").on('click',null,function(e)
		  { 
		  
             e.preventDefault(); 
             ajax_read_page('2');
          }
	      );
		  
		  $("#back_menu_article").on('click',null,function(e) //back to articles menu from reading selected article
		  { 
		  
             e.preventDefault(); 
             back_menu_article();
			 
			 //hide all buttons in #content_main3   
		     document.getElementById("button_prev_page").style.visibility = 'visible';
		     document.getElementById("button_next_page").style.visibility = 'visible';
		     document.getElementById("many_pages").style.visibility = 'visible';
		     document.getElementById("select_page").style.visibility = 'visible';
	         document.getElementById("button_article_search").style.visibility = 'visible';
		     document.getElementById("button_article_add").style.visibility = 'visible';
		     document.getElementById("read_page").style.visibility = 'visible';
		     document.getElementById("button_article_edit").style.visibility = 'visible';
		     document.getElementById("button_article_del").style.visibility = 'visible';
		     document.getElementById("search_article").style.visibility = 'visible';
			 document.getElementById("searchform").style.visibility = 'visible';
	   
		     //visible all buttons in #content_main3  for reading the article	   
		     document.getElementById("button_prev_page_read").style.visibility = 'hidden';   
		     document.getElementById("button_next_page_read").style.visibility = 'hidden';
		     document.getElementById("many_pages_read").style.visibility = 'hidden';
		     document.getElementById("select_page_read").style.visibility = 'hidden';
	         document.getElementById("button_article_search_read").style.visibility = 'hidden';
		     document.getElementById("back_menu_article").style.visibility = 'hidden';	  
			 document.getElementById("searchform_read").style.visibility = 'hidden';
			 document.getElementById("search_article_read").style.visibility = 'hidden';
		     document.getElementById("button_prev_page_read").style.zIndex = "0";   
		     document.getElementById("button_next_page_read").style.zIndex = "0";
		     document.getElementById("many_pages_read").style.zIndex = "0";
		     document.getElementById("select_page_read").style.zIndex = "0";
	         document.getElementById("button_article_search_read").style.zIndex = "0";
		     document.getElementById("back_menu_article").style.zIndex = "0";
             document.getElementById("searchform_read").style.zIndex = "0";			 
			 document.getElementById("search_article_read").style.zIndex = "0";
			 
          }
	      );
		  		    
		  $("#button_prev_page_read").on('click',null,function(e)
		  { 
		  
             e.preventDefault(); 
             ajax_read_page('-1');
          }
	      );
		  
		  $("#main").on('click',null,function(e)
		  { 
	  
             e.preventDefault(); 
             ajax_select_page();
			 ajax_list_tags();
          }
	      );
		  
		  $("#many_pages").on('onchange',null,function(e)
		  {  
  
             e.preventDefault(); 
             ajax_select_page();
          }
	      );
		  	  
		  $("#select_number_page_read").on('click',null,function(e)
		  {  

             e.preventDefault(); 
             next_page_article_read();
          }
	      );
		  
		  $("#button_article_search").on('click',null,function(e)
		  {  

             e.preventDefault(); 
             next_page_next_article();
			 ajax_list_page();
			 select_page2();
          }
	      );
		  		  
		  $("#button_article_search_read").on('click',null,function(e)
		  {  

             e.preventDefault(); 
             next_page_next_article_read();

          }
	      );
		  
          $("#button_prev_page").on('click',null,function(e)
		  { 
		  
             e.preventDefault(); 
             ajax_prev_article();
             ajax_list_page();
             select_page2();			 
          }
	      );
		  
		  $("#read_page").on('click',null,function(e)  //reading content of selected article
		  { 	 
             e.preventDefault(); 
			 all_pages_read(); //defenition of  pages number of content of selected article
			 ajax_list_page_read();//defenition of  pages list of content of selected article
             ajax_read_page('1');//image first page of content of selected article
			 ajax_list_tag_read();//defenition of  tags list of content of selected article
          }
	      );
		  
		  $("#button_article_edit").on('click',null,function(e)  //editing selected article
		  { 
		  
		     //hide all buttons in #content_main3   
		     document.getElementById("button_prev_page").style.visibility = 'hidden';
		     document.getElementById("button_next_page").style.visibility = 'hidden';
		     document.getElementById("many_pages").style.visibility = 'hidden';
		     document.getElementById("select_page").style.visibility = 'hidden';
	         document.getElementById("button_article_search").style.visibility = 'hidden';
		     document.getElementById("button_article_add").style.visibility = 'hidden';
		     document.getElementById("read_page").style.visibility = 'hidden';
		     document.getElementById("button_article_edit").style.visibility = 'hidden';
		     document.getElementById("button_article_del").style.visibility = 'hidden';
		     document.getElementById("search_article").style.visibility = 'hidden';
			 document.getElementById("searchform").style.visibility = 'hidden';
	   
		     //hide all buttons in #content_main3  for reading the article	   
		     document.getElementById("button_prev_page_read").style.visibility = 'hidden';   
		     document.getElementById("button_next_page_read").style.visibility = 'hidden';
		     document.getElementById("many_pages_read").style.visibility = 'hidden';
		     document.getElementById("select_page_read").style.visibility = 'hidden';
	         document.getElementById("button_article_search_read").style.visibility = 'hidden';
		     document.getElementById("back_menu_article").style.visibility = 'hidden';	  
			 document.getElementById("searchform_read").style.visibility = 'hidden';
			 document.getElementById("search_article_read").style.visibility = 'hidden';

             e.preventDefault(); 
			 all_pages_read(); //defenition of  pages number of content of selected article
			 button_article_edit2(); //editing form of selected article
          }
	      );
		  
         $("#search_term").on('keyup',null,function() 
		  { 
	  
		    var str = $(this).val();
            next_page(); 
          }
	      );
        }
		);
		
}//function ajax_prev1()


function button_article_edit2() //editing form of selected article
{ 
           try{document.getElementById("forma_article").style.visibility = "visible";}
	       catch(e){}
           $("#content_main11").show(); 
           search_val = '1';	   
           $.post("./button_article_edit.php", {search_term : search_val}, function(data)
		   {
               if (data.length>0)
		       { 
                   $("#content_main11").html(data); 
               } 
           }
		   ) 		   
		   
}// function button_article_edit2()

function ajax_article()//read next page
{ 

           $("#content_main2").show(); 
           var search_val=$("#search_term").val(); 
           $.post("./next_page.php", {search_term : search_val}, function(data)
		   {
               if (data.length>0)
		       { 
                   $("#content_main2").html(data); 
               } 
           }
		   ) 
}// function ajax_article()

function back_menu_article()//back to articles table from reading the article
{ 

           $("#content_main2").show(); 
           var search_val=$("#search_term").val(); 
           $.post("./back_menu_article.php", {search_term : search_val}, function(data)
		   {
               if (data.length>0)
		       { 
                   $("#content_main2").html(data); 
               } 
           }
		   ) 
}// function ajax_article()

function ajax_select_page()//go to selected page
{ 

           try {selected_page = document.forms.form_number_page.elements.select_number_page.value;}
           catch(e) {selected_page = 1;}
	   
           $("#content_main2").show(); 

           $.post("./select_page.php", {search_term : selected_page}, function(data)
		   {
               if (data.length>0)
		       { 
                   $("#content_main2").html(data); 
               } 
           }
		   ) 
		   rab = select_page(); //goto selected page
}// function ajax_select_page()

function next_page_article_read()
		{ 

           var search_page = document.forms["search_article_read"].elements["search_article_read"].value;
           $("#content_main2").show(); 
           var search_val=$("#search_number_article").val(); 
           $.post("./search_page2_read.php", {search_term : search_page}, function(data)
		   {
               if (data.length>0)
		       { 
                   $("#search_article_read").html(data); 
               } 
           }
		   ) 

}// function ajax_select_page()

function next_page_next_article() //search next article with this tag
		{ 

           var search_page = '^^^';//serch next page
           $("#content_main2").show(); 
           var search_val=$("#search_number_article").val(); 
           $.post("./search_page.php", {search_term : search_page}, function(data)
		   {
               if (data.length>0)
		       { 
                   $("#content_main2").html(data); 
               } 
           }
		   ) 

}// function ajax_select_page()

function next_page_next_article_read() //search next tag position in this article
		{ 

           var search_page = '^^^';
           $("#content_main2").show(); 
           var search_val=$("#search_number_article").val(); 
           $.post("./search_page_read.php", {search_term : search_page}, function(data)
		   {
               if (data.length>0)
		       { 
                   $("#content_main2").html(data); 
               } 
           }
		   ) 

}// function ajax_select_page()

function ajax_list_tags() // search article with selected tag from tags list
{

           try { var selected_tag = document.forms.searchform.elements.search_number_article.value;}  //forms["searchform"].
           catch(e) {var selected_tag = 1;}

		   
           $("#content_main2").show(); 
           var search_val=$("#search_term").val(); 
           $.post("./ajax_list_tags.php", {search_term : selected_tag}, function(data)
		   {
               if (data.length>0)
		       { 
                   $("#search_article").html(data); 
               } 
           }
		   ) 
}//function ajax_list_tags()

function tags_list_edit() // creating article tags list for editing selected article
{

           try { var selected_tag = document.forms.forma_article.elements.Name_tag_auto.value;}  //forms["forma_article"].
           catch(e) {var selected_tag = '^^^';}

		   
           $("#Article_Tags").show(); 
           var search_val=$("#search_term").val(); 
           $.post("./tags_list_edit.php", {search_term : selected_tag}, function(data)
		   {
               if (data.length>0)
		       { 
                   $("#Article_Tags").html(data); 
               } 
           }
		   ) 
}//function tags_list_edit()

function ajax_list_tag_read() // creating  tags list for reading selected article
{

           try { var selected_tag = document.forms.forma_article.elements.Name_tag_auto.value;}  
           catch(e) {var selected_tag = '^^^';}

		   
           $("#search_article_read").show(); 
 
           $.post("./ajax_list_tag_read.php", {search_term : selected_tag}, function(data)
		   {
               if (data.length>0)
		       { 
                   $("#search_article_read").html(data); 
               } 
           }
		   ) 
}//function ajax_list_tag_read()

function next_page_tag()
{

           var selected_page = document.forms["searchform"].elements["search_number_article"].value;
           $("#search_article").show(); 
           var search_val=$("#search_number_article").val(); 
           $.post("./search_tag_article.php", {search_term : selected_page}, function(data)
		   {
               if (data.length>0)
		       { 
                   $("#search_article").html(data); 
               } 
           }
		   ) 
}//function next_page_tag()

function ajax_prev_article()
		{ 

           $("#content_main2").show(); 
           var search_val=$("#search_term").val();
		   
           $.post("./prev_page.php", {search_term : search_val}, function(data)
		   {
               if (data.length>0)
		       { 
                   $("#content_main2").html(data); 
               } 
           }
		   ) 
}// function ajax_prev_article()

function ajax_read_page(param)//reading curent page of content of selected article
{ 

           $("#content_main2").show(); 
		   if((param == '2') || (param == '-1') || (param == '1')) search_val = param
		   else var search_val=$("#search_term").val(); 
	   
           $.post("./read_page.php", {search_term : search_val}, function(data)
		   {//read_page.php - reading curent page of selected article
               if (data.length>0)
		       { 
                   $("#content_main2").html(data); 
               } 
           }
		   ) 
		   
		   select_page2_read();//rewrite list pages list with selected curent page for reading selected article
		   
}// function ajax_prev_article()

function back_menu_article()  //return to menu of navigation of articles (in content_main3)
{

           $("#content_main2").show(); 
           var search_val=$("#search_term").val(); 
           $.post("./back_menu_article.php", {search_term : search_val}, function(data)
		   {
               if (data.length>0)
		       { 
                   $("#content_main2").html(data); 
               } 
           }
		   ) 
		   rab = next_page(); //read next (first) page
		   //hide all buttons in #content_main3   
		   document.getElementById("button_prev_page").style.visibility = 'visible';
		   document.getElementById("button_next_page").style.visibility = 'visible';
		   document.getElementById("many_pages").style.visibility = 'visible';
		   document.getElementById("select_page").style.visibility = 'visible';
	       document.getElementById("button_article_search").style.visibility = 'visible';
		   document.getElementById("button_article_add").style.visibility = 'visible';
		   document.getElementById("read_page").style.visibility = 'visible';
		   document.getElementById("button_article_edit").style.visibility = 'visible';
		   document.getElementById("button_article_del").style.visibility = 'visible';
		   document.getElementById("search_article").style.visibility = 'visible';
	   
		   //visible all buttons in #content_main3  for reading the article	   
		   document.getElementById("button_prev_page_read").style.visibility = 'hidden';   
		   document.getElementById("button_next_page_read").style.visibility = 'hidden';
		   document.getElementById("many_pages_read").style.visibility = 'hidden';
		   document.getElementById("select_page_read").style.visibility = 'hidden';
	       document.getElementById("button_article_search_read").style.visibility = 'hidden';
		   document.getElementById("back_menu_article").style.visibility = 'hidden';	   

}//function back_menu_article()

function select_page()  //read selected page number
{ 

           try {selected_page = document.forms.form_number_page.elements.select_number_page.value;}
           catch(e) {selected_page = 1;}

		   
           $("#content_main2").show(); 
		   
           $.post("./select_page.php", {search_term : selected_page}, function(data)
		   {
               if (data.length>0)
		       { 
                   $("#content_main2").html(data); 
               } 
           }
		   ) 
}// function select_page()

function select_page_read()  //read selected page of content of selected article
{ 

           try {selected_page = document.forms.form_number_page_read.elements.select_number_page_read.value;}
           catch(e) {selected_page = 1;}

		   
           $("#content_main2").show(); 
		   
           $.post("./select_page_read.php", {search_term : selected_page}, function(data)
		   {
               if (data.length>0)
		       { 
                   $("#content_main2").html(data); 
               } 
           }
		   ) 
}// function select_page()

function select_page2()  //rewrite list pages list with selected curent page
{ 

           try {selected_page = document.forms.form_number_page.elements.select_number_page.value;}
           catch(e) {selected_page = 1;}

		   
           $("#content_main2").show(); 
		   
           $.post("./select_page2.php", {search_term : selected_page}, function(data)
		   {
               if (data.length>0)
		       { 
                   $("#select_page").html(data); 
               } 
           }
		   ) 
}// function select_page()

function select_page2_read()  //rewrite list pages list with selected curent page for reading selected article
{ 

           try {selected_page = document.forms.form_number_page.elements.select_number_page.value;}
           catch(e) {selected_page = 1;}

		   
           $("#select_page_read").show(); 
		   
           $.post("./select_page2_read.php", {search_term : selected_page}, function(data)
		   {
               if (data.length>0)
		       { 
                   $("#select_page_read").html(data); 
               } 
           }
		   ) 
}// function select_page()

function StatusSearch() //first search of the article accoding the selected tag
{ 

           var selected_tag = document.forms["searchform"].elements["search_number_article"].value;

           $("#content_main2").show(); 
	   
           $.post("./search_page.php", {search_term : selected_tag}, function(data)
		   {
               if (data.length>0)
		       { 
                   $("#content_main2").html(data); 
               } 
           }
		   ) 
		   
}// function StatusSearch()

function StatusSearch_read() //defenition of page for reading using selected tag
{ 

           try {selected_tag = document.forms["form_search_article_read"].elements["search_page_article"].value;}
           catch(e) {selected_page = "^^^";}

           $("#content_main2").show(); 
		   
           $.post("./search_page_read.php", {search_term : selected_tag}, function(data)
		   {
               if (data.length>0)
		       { 
                   $("#content_main2").html(data); 
               } 
           }
		   ) 
		   

}// function StatusSearch_read()



function ajax_list_page() //and  ajax_list_page.php - creating pages list
{

          $("#select_page").show(); 
           var search_val=$("#search_term").val(); 
           $.post("./ajax_list_page.php", {search_term : search_val}, function(data)
		   {
               if (data.length>0)
		       { 
                   $("#select_page").html(data); 
               } 
           }
		   ) 
}//function ajax_list_page()

function ajax_list_page_read() // ajax_list_page_read.php - creating pages list
{

           $("#select_page").show(); 
           var search_val=$("#search_term").val(); 
           $.post("./ajax_list_page_read.php", {search_term : search_val}, function(data)
		   {
               if (data.length>0)
		       { 
                   $("#select_page_read").html(data); 
               } 
           }
		   )
           document.getElementById("select_page_read").style.zIndex = "20";		   
}//function ajax_list_page()

function thirst_page() //read thirst page of articles
		{ 

           $("#content_main2").show(); 
           var search_val=$("#search_term").val(); 
           $.post("./thirst_page.php", {search_term : search_val}, function(data)
		   {
               if (data.length>0)
		       { 
                   $("#content_main2").html(data); 
               } 
           }
		   ) 

}// function thirst_page()

function next_page() //read next page of articles
		{ 

           $("#content_main2").show(); 
           var search_val=$("#search_term").val(); 
           $.post("./next_page.php", {search_term : search_val}, function(data)
		   {
               if (data.length>0)
		       { 
                   $("#content_main2").html(data); 
               } 
           }
		   ) 
}// function next_page()

function all_pages() //calculation all articles pages
{
    try{document.getElementById("forma_article").style.visibility = 'visible';}
	catch(e){}
    $("#content_main2").show(); 
    var search_val="1"; 
    $.post("./all_pages.php?.session_name().'='.session_id()", {search_term : search_val}, function(data)
		   {
               if (data.length>0)
		       { 
                   $("#content_main2").html(data); 
               } 
           }
		   ) 
}//function all_pages()

function all_pages_read() //calculate   pages and tags of selected article
{

    $("#content_main2").show(); 
    var search_val="1"; 
    $.post("./all_pages_read.php", {search_term : search_val}, function(data)
		   {
               if (data.length>0)
		       { 
                   $("#content_main11").html(data); 
               } 
           }
		   ) 
}//function  all_pages_read()


 function bigPict(par2){

    var srcnew = document.getElementById(par2).src;
	var pos, pos1, rab, indn;	
    pos  = srcnew.indexOf("foto",0);  
	pos1 = srcnew.indexOf(".jpg",0);  
	rab  = srcnew.charAt(pos+4);
	if (pos1 - pos - 4 > 1)
	{
	  rab = rab + srcnew.charAt(pos-1);    
	} //if

    document.getElementById("big_foto").src = 'img/gal_foto_big' + rab + '.jpg';
	document.getElementById("big_foto").style.visibility = 'visible';	
	document.getElementById("out").style.visibility = 'visible';	
    
}

function visibl_form_reg(){
	document.getElementById("form_registr").style.visibility = 'visible';
    document.getElementById("out_messages").style.visibility = 'visible';   	
	document.getElementById("menu_bottom").style.visibility = 'hidden'; 
}

function  out_messages1(){
    document.getElementById("form_registr").style.visibility = 'hidden';
    document.getElementById("out_messages").style.visibility = 'hidden';
	document.getElementById("messages").style.visibility = 'hidden';
	document.getElementById("menu_bottom").style.visibility = 'visible';
	document.getElementById('login_auto').value = "";
	document.getElementById('password_auto').value = "";	
}


function getXmlHttp() {  
     var xmlhttp;  
     try {  
         xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");  
     } catch (e) {  
         try {  
             xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");  
         } catch (E) {  
            xmlhttp = false;  
        }  
     }  
     if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {  
         xmlhttp = new XMLHttpRequest();  
     }  
     return xmlhttp;  
 }  

 function messages() {  /* Registration Form: 0 - hide, other - show  */
     var xmlhttp = getXmlHttp();  
	 var fname2 = 'flag_reg.txt';
     xmlhttp.open('GET', fname2, false);  
     xmlhttp.send(null);  
     if (xmlhttp.status == 200) {  
         var text = xmlhttp.responseText;  
	
		if ((text !== '0')&&(text !== 'f')){
			document.getElementById("messages").style.visibility = 'hidden';  
			document.getElementById("form_registr").style.visibility = 'visible';
			document.getElementById("out_messages").style.visibility = 'visible';

		}
		if (text == '0'){
			document.getElementById("messages").style.visibility = 'visible';  
			document.getElementById("form_registr").style.visibility = 'hidden'; 
			document.getElementById("out_messages").style.visibility = 'hidden';
            document.getElementById("menu_bottom").style.visibility = 'visible';
	
			var fs = require('fs');
			fs.writeFileSync(fname2, 'f');	
		}    
		if (text == 'f'){
			document.getElementById("messages").style.visibility = 'hidden';  
			document.getElementById("form_registr").style.visibility = 'hidden'; 
			document.getElementById("out_messages").style.visibility = 'hidden';
			document.getElementById("menu_bottom").style.visibility = 'visible';
			
		}    
	
     }  	 
 } /* function messages() */
 
function out_form(){ // Output from Registration
    
      var login = document.getElementById('login').value;
        
	  var password1 = document.getElementById('password').value;
	  
	  var password2 = document.getElementById('password2').value;
	  
	  var email2 = document.getElementById('email2').value;

      var load1 = document.getElementById('load1');

      var answer = document.getElementById('answer');

      var answer2 = document.getElementById('answer2');
	  
     var parameter = 'login='+login+'&password='+password1+'&password2='+password2+'&email2='+email2;		 

       answer.innerHTML = load1.innerHTML;

       var network = createRequestObject();

            network.open('POST','form_processing.php',true);

            network.setRequestHeader("Content-type","application/x-www-form-urlencoded; charset=UTF-8");	

            network.onreadystatechange = function () {
              if(network.readyState == 4) {answer.innerHTML = ''; answer2.innerHTML = network.responseText;  }
            }		

             network.send(parameter);

} /* function out_form() */


function FLevelPassword() // complexity level of Password
{
  	  $(function () 
	   { $("#password").complexify({}, 
	     function (valid, complexity) 
	     { 		 
           document.getElementById("LevelPassword").value = complexity;
		   document.getElementById("ProcLevelPassword").value = Math.round(complexity) + '%'; 
	     }
	    ); 
	   });	
	
}//function testf()

function difficultPassword(password_f,password_d)//Definition of complexity levelpassword_f and its next - password_d
{
console.log("password_f", password_f);	
  var difPas = 0;
  var pass1 = $('#password'),
      pass2 = $('#password2');
console.log("pass1", pass1);	  
  if(password_f != '')
  {
    pass1.complexify({minimumChars:6, strengthScaleFactor:0.7}, 
    function(valid, complexity)
    {	  
      difPas = (complexity/100)*268 - 134;

    }//function(valid, complexity)
    )//pass1.complexify({minimumChars:6, strengthScaleFactor:0.7}, 
  }//if
  return difPas;
}//function difficultPassword()

function checkPassword(form) /* Changing password complexitycomplexity */
{
    var password = form.password.value; // password from form
    var s_letters = "qwertyuiopasdfghjklzxcvbnm"; // down registr
    var b_letters = "QWERTYUIOPLKJHGFDSAZXCVBNM"; // up registr
    var digits = "0123456789"; 
    var specials = "!@#$%^&*()_-+=\|/.,:;[]{}"; 
    var is_s = false; 
    var is_b = false; 
    var is_d = false; 
    var is_sp = false; 
    for (var i = 0; i < password.length; i++) {
      
      if (!is_s && s_letters.indexOf(password[i]) != -1) is_s = true;
      else if (!is_b && b_letters.indexOf(password[i]) != -1) is_b = true;
      else if (!is_d && digits.indexOf(password[i]) != -1) is_d = true;
      else if (!is_sp && specials.indexOf(password[i]) != -1) is_sp = true;
    }
    var rating = 0;
    var text = "";
    if (is_s) rating++; 
    if (is_b) rating++; 
    if (is_d) rating++; 
    if (is_sp) rating++; 
    
    if (password.length < 6 && rating < 3) text = "simple";
    else if (password.length < 6 && rating >= 3) text = "middle";
    else if (password.length >= 8 && rating < 3) text = "middle";
    else if (password.length >= 8 && rating >= 3) text = "difficult";
    else if (password.length >= 6 && rating == 1) text = "simple";
    else if (password.length >= 6 && rating > 1 && rating < 4) text = "middle";
    else if (password.length >= 6 && rating == 4) text = "difficult";

    return false; 
}	/* function checkPassword */

	function createRequestObject() 
	{
		  try { return new XMLHttpRequest() }
		  catch(e) {
			try { return new ActiveXObject('Msxml2.XMLHTTP') }
			catch(e) {
				try { return new ActiveXObject('Microsoft.XMLHTTP') }
				catch(e) { return null; }
			}
		  }
	}
	
	function out2_form()
	{
		document.getElementById("form_registr").style.visibility = 'hidden'; 
		document.getElementById("out_messages").style.visibility = 'hidden';
		document.getElementById("menu_bottom").style.visibility = 'visible';
	}
	
	function in_autoriz()
	{
	  document.getElementById("messages").style.visibility = 'visible';
      document.getElementById("out_messages").style.visibility = 'visible';  
  
      var login = document.getElementById('login_auto').value;

	  var password = document.getElementById('password_auto').value;

      var load1_auto = document.getElementById('load1_auto');

      var answer_auto = document.getElementById('answer_auto');

      var answer2_auto = document.getElementById('answer2_auto');
	
      var parameter = 'login='+login+'&password='+password;

       answer_auto.innerHTML = load1_auto.innerHTML;
      var network = createRequestObject();
            
            network.open('POST','authoriz.php',true);

            network.setRequestHeader("Content-type","application/x-www-form-urlencoded; charset=UTF-8");	

            network.onreadystatechange = function () {
              if(network.readyState == 4) {answer_auto.innerHTML = ''; answer2_auto.innerHTML = network.responseText;  }
            }		

             network.send(parameter);
    } /* function out_form() */
	
	function Re_password()// recovery password
	{
	  document.getElementById("messages").style.visibility = 'visible';
      document.getElementById("out_messages").style.visibility = 'visible';  
	  document.getElementById("answer2_auto").style.visibility = 'visible';  

      var login = document.getElementById('login_auto').value;

      var parameter = 'login='+login;

      answer_auto.innerHTML = load1_auto.innerHTML;

      var network = createRequestObject();

      network.open('POST','recovery_password.php',true);

      network.setRequestHeader("Content-type","application/x-www-form-urlencoded; charset=UTF-8");	

      network.onreadystatechange = function () 
	  {
        if(network.readyState == 4) {answer_auto.innerHTML = ''; answer2_auto.innerHTML = network.responseText;  }
      }		

      network.send(parameter);
	}//function Re_password()
	
	function in_email_rec() //Input for recovery password
	{
	  document.getElementById("messages").style.visibility = 'hidden';  
	  document.getElementById("out_messages").style.visibility = 'hidden'; 

      var login = document.getElementById('login_auto').value;
	  var email_rec_p_value = document.getElementById('email_rec_p').value;

      var parameter = 'login='+login+'&email_rec_p_value='+email_rec_p_value;

      answer_auto.innerHTML = load1_auto.innerHTML;

      var network = createRequestObject();

      network.open('POST','recovery_password2.php',true);

      network.setRequestHeader("Content-type","application/x-www-form-urlencoded; charset=UTF-8");	

      network.onreadystatechange = function () 
	  {
        if(network.readyState == 4) {answer_auto.innerHTML = ''; answer2_auto.innerHTML = network.responseText;  }
      }		

      network.send(parameter);
	}//function in_email_rec()
	
	function form_email_rec()
	{
	}//function form_email_rec()
	
	function out_autoriz_ok(){ //out from autorization (it was successfull)

		document.getElementById("messages").style.visibility = 'hidden';  
		document.getElementById("out_messages").style.visibility = 'hidden'; 
		document.getElementById('login_auto').value = "";
	    document.getElementById('password_auto').value = "";
        document.getElementById("author").style.visibility = 'hidden'; 
		document.getElementById("authoriz1").style.visibility = 'hidden';
		document.getElementById("login1").style.visibility = 'hidden';
		document.getElementById("content_left").style.visibility = 'hidden';
		
		//hide all buttons in #content_main3   
		document.getElementById("button_prev_page").style.visibility = 'visible';
		document.getElementById("button_next_page").style.visibility = 'visible';
		document.getElementById("many_pages").style.visibility = 'visible';
		document.getElementById("select_page").style.visibility = 'visible';
	    document.getElementById("button_article_search").style.visibility = 'visible';
		document.getElementById("button_article_add").style.visibility = 'visible';
		document.getElementById("read_page").style.visibility = 'visible';
		document.getElementById("button_article_edit").style.visibility = 'visible';
		document.getElementById("button_article_del").style.visibility = 'visible';
		document.getElementById("search_article").style.visibility = 'visible';
		document.getElementById("searchform").style.visibility = 'visible';
	   
		//visible all buttons in #content_main3  for reading the article	   
		document.getElementById("button_prev_page_read").style.visibility = 'hidden';   
		document.getElementById("button_next_page_read").style.visibility = 'hidden';
		document.getElementById("many_pages_read").style.visibility = 'hidden';
		document.getElementById("select_page_read").style.visibility = 'hidden';
	    document.getElementById("button_article_search_read").style.visibility = 'hidden';
		document.getElementById("back_menu_article").style.visibility = 'hidden';
		document.getElementById("searchform_read").style.visibility = 'hidden';
		document.getElementById("search_article_read").style.visibility = 'hidden';
		document.getElementById("button_prev_page_read").style.zIndex = "-1";   
		document.getElementById("button_next_page_read").style.zIndex = "-1";
		document.getElementById("many_pages_read").style.zIndex = "-1";
		document.getElementById("select_page_read").style.zIndex = "-1";
	    document.getElementById("button_article_search_read").style.zIndex = "-1";
		document.getElementById("back_menu_article").style.zIndex = "-1";	  
		document.getElementById("searchform_read").style.zIndex = "-1";
		document.getElementById("button_next_page_read").style.zIndex = "-1";
	
		all_pages(); //calculation all articles pages
	    ajax_list_tags(); //creating all tags list for all articles of this user	
        ajax_list_page();	//creating pages list
	    thirst_page(); //read first page

	}//function out_autoriz_ok()
	
	function out_autoriz_err(){
		document.getElementById("messages").style.visibility = 'hidden';  
		document.getElementById("out_messages").style.visibility = 'hidden'; 	
		document.getElementById("author").style.visibility = 'visible'; 
		document.getElementById("authoriz1").style.visibility = 'visible';
		document.getElementById("login1").style.visibility = 'visible';
		document.getElementById("content_left").style.visibility = 'hidden';
		document.getElementById("messages_err").style.visibility = 'hidden';
	}
	
    function out2_autoriz_err(){
		document.getElementById("messages").style.visibility = 'hidden';  
		document.getElementById("out_messages").style.visibility = 'hidden';
		document.getElementById("content_left").style.visibility = 'visible';
		
	}//function out2_autoriz_err()
	
	function out_articles1()
	{

      var parameter = 'q=1';

      answer_auto.innerHTML = load1_auto.innerHTML;

      var network = createRequestObject();

      network.open('POST','content_main.php',true);

      network.setRequestHeader("Content-type","application/x-www-form-urlencoded; charset=UTF-8");	

      network.onreadystatechange = function () 
	  {
        if(network.readyState == 4) {answer_auto.innerHTML = ''; answer2_auto.innerHTML = network.responseText;  }
      }		

      network.send(parameter);
		
	}//function out2_autoriz_err()
	
	function out3_autoriz_err(){
		document.getElementById("messages").style.visibility = 'hidden';  
		document.getElementById("messages_err").style.visibility = 'hidden'; 
		document.getElementById("answer_auto").style.visibility = 'hidden'; 
		document.getElementById("button_ok").style.visibility = 'hidden'; 
		document.getElementById("out_messages").style.visibility = 'hidden'; 	
		document.getElementById("author").style.visibility = 'visible'; 
		document.getElementById("authoriz1").style.visibility = 'visible';
		document.getElementById("login1").style.visibility = 'visible';
		document.getElementById("content_left").style.visibility = 'visible';
		document.getElementById("login_auto").focus();
		
	}//function out3_autoriz_err()
	
	function out4_autoriz_err(){
		document.getElementById("messages").style.visibility = 'hidden';  
		document.getElementById("out_messages").style.visibility = 'hidden'; 	
		document.getElementById("author").style.visibility = 'visible'; 
		document.getElementById("authoriz1").style.visibility = 'visible';
		document.getElementById("login1").style.visibility = 'visible';
		document.getElementById("content_left").style.visibility = 'visible';
		document.getElementById("login_auto").focus();
		
	}//function out4_autoriz_err()
	
	function out5_autoriz_err(){
		document.getElementById("messages").style.visibility = 'hidden';  
		document.getElementById("out_messages").style.visibility = 'hidden'; 	
		document.getElementById("author").style.visibility = 'visible'; 
		document.getElementById("authoriz1").style.visibility = 'visible';
		document.getElementById("login1").style.visibility = 'visible';
		document.getElementById("content_left").style.visibility = 'visible';
		document.getElementById("password_auto").focus();
		
	}//function out4_autoriz_err()
	

// Output from form  forma_Record
function out_forma_Record()
{
  document.getElementById("forma_Record").style.visibility = 'hidden';
  document.getElementById("out_forma_Record").style.visibility = 'hidden'; 
}

function Add_Record()
{
  document.getElementById("forma_Record").style.visibility = 'visible';
  document.getElementById("out_forma_Record").style.visibility = 'visible'; 
} 

function articles()
{
  str = '1';
  var main1_wrapper = document.getElementById('content_main1');
  var main_wrapper = document.getElementById('content_main');
  var main2_wrapper = document.getElementById('content_main2');
  
  var parameter = 'q='+str;
 
  var network = createRequestObject();

  {  network.open("GET","articles1.php?q="+str,true);}
  
  network.setRequestHeader("Content-type","application/x-www-form-urlencoded; charset=UTF-8");
 
  network.onreadystatechange = function () {
       if(network.readyState == 4) {content_main.innerHTML = ''; content_main2.innerHTML = network.responseText;  }
  }		

  network.send(parameter);
}//function articles()

function contant_main(str) //- main contant site Articles
{
  var content_main1 = document.getElementById('content_main1');
  var content_main = document.getElementById('content_main');
  var content_main2 = document.getElementById('content_main2');

  //hide menu of reading the article
		   document.getElementById("button_prev_page_read").style.visibility = 'hidden';   
		   document.getElementById("button_next_page_read").style.visibility = 'hidden';
		   document.getElementById("many_pages_read").style.visibility = 'hidden';
		   document.getElementById("select_page_read").style.visibility = 'hidden';
	       document.getElementById("button_article_search_read").style.visibility = 'hidden';
		   document.getElementById("search_article_read").style.visibility = 'hidden';		   
		   document.getElementById("back_menu_article").style.visibility = 'hidden';

  var parameter = 'name_Theme2='+str;

  var network = createRequestObject();
  
  if (str == '1')
  {  network.open("GET","content_main.php?q="+str,true);}
  else
  { network.open("GET","content_main.php?q="+str,true);
   
  }
  
  network.setRequestHeader("Content-type","application/x-www-form-urlencoded; charset=UTF-8");
 
  network.onreadystatechange = function () {
       if(network.readyState == 4) {content_main.innerHTML = ''; content_main2.innerHTML = network.responseText;  }
  }		
  

  network.send(parameter);
  
} //contant_main()


function article_add() // - add article
{

  str = '1';   
  //parametr to server
  var parameter = 'name_Theme2='+str;
 
  //joing with ajax
  var network = createRequestObject();
  
  network.open("GET","article_form.php?q="+str,true);
  
  // UTF-8
  network.setRequestHeader("Content-type","application/x-www-form-urlencoded; charset=UTF-8");
 
  network.onreadystatechange = function () {
       if(network.readyState == 4) {content_main11.innerHTML = ''; content_main11.innerHTML = network.responseText;  }
  }		
  
  network.send(parameter);
  
} //article_add()


function article_del() // - delete article
{
  str = '1';   
  
  //parametr to server
  var parameter = 'name_Theme2='+str;
 
  //joing with ajax
  var network = createRequestObject();
  
  network.open("GET","article_del.php?q="+str,true);
  
  // UTF-8
  network.setRequestHeader("Content-type","application/x-www-form-urlencoded; charset=UTF-8");
 
  network.onreadystatechange = function () {
       if(network.readyState == 4) {content_main11.innerHTML = ''; content_main11.innerHTML = network.responseText;  }
  }		
  
  network.send(parameter);
  
  all_pages(); //calculation all articles pages
  next_page(); //read next (first) page	
  ajax_list_page();	//creating pages list	
  ajax_list_tags(); //creating all tags list for all articles of this user
} //article_del()

function cancel_form_a() // - cancel form for article
{

  //visible all buttons in #content_main3  for list of articles
  document.getElementById("button_prev_page").style.visibility = 'visible';
  document.getElementById("button_next_page").style.visibility = 'visible';
  document.getElementById("many_pages").style.visibility = 'visible';
  document.getElementById("select_page").style.visibility = 'visible';
  document.getElementById("button_article_search").style.visibility = 'visible';
  document.getElementById("button_article_add").style.visibility = 'visible';
  document.getElementById("read_page").style.visibility = 'visible';
  document.getElementById("button_article_edit").style.visibility = 'visible';
  document.getElementById("button_article_del").style.visibility = 'visible';
  document.getElementById("search_article").style.visibility = 'visible';
	   
  //hide all buttons in #content_main3  for reading the article	   
  document.getElementById("button_prev_page_read").style.visibility = 'hidden';   
  document.getElementById("button_next_page_read").style.visibility = 'hidden';
  document.getElementById("many_pages_read").style.visibility = 'hidden';
  document.getElementById("select_page_read").style.visibility = 'hidden';
  document.getElementById("button_article_search_read").style.visibility = 'hidden';
  document.getElementById("back_menu_article").style.visibility = 'hidden';
  try{
      document.getElementById("forma_article_2").style.visibility  = 'hidden';
  } catch(e) { }
  try{
      document.getElementById("forma_article").style.visibility  = 'hidden';
  } catch(e) { }
  document.getElementById("searchform_read").style.visibility = 'hidden';	
  document.getElementById("search_article_read").style.visibility = 'hidden';

 var parameter = 'q=1';
 
  //joing with ajax
  var network = createRequestObject();
  
  network.open("GET","cancel_form_a.php?q=1",true);
  
  network.setRequestHeader("Content-type","application/x-www-form-urlencoded; charset=UTF-8");
 
  network.onreadystatechange = function () {
       if(network.readyState == 4) {Article_Tags.innerHTML = ''; Article_Tags.innerHTML = network.responseText;  }
  }		 
  network.send(parameter);
   
}//function cancel_form_a()


function save_tag()  // save_tag() - add new tag
{
  str = '1';
//  var new_tag = document.getElementById('Name_tag_auto');
  var new_tag = document.forms["forma_add_article"].elements["Name_tag"].value;
  if(new_tag.length > 0)
  {
     var parameter = 'new_tag= '+new_tag; 
     //parameter to server
     var parameter = 'new_tag='+new_tag;
 
     //joing with ajax
     var network = createRequestObject();
  
     network.open("GET","save_new_tag.php?q="+new_tag,true);
  
     //UTF-8
     network.setRequestHeader("Content-type","application/x-www-form-urlencoded; charset=UTF-8");
 
     network.onreadystatechange = function () {
       if(network.readyState == 4) {Article_Tags.innerHTML = ''; Article_Tags.innerHTML = network.responseText;  }
     }		
  
     network.send(parameter);
  }//if
  
} //save_tag()


// ok_err_no_name_a() - push OK if no Name of Article
function ok_err_no_name_a()
{
  var add_new_URL_adress_article = "";
  var add_new_name_article = "";
  var add_new_content_article = "";
  add_new_name_article = document.forms["forma_add_article"].elements["Name_article"].value;  //name_article
  add_new_content_article = document.forms["forma_add_article"].elements["text_form_article"].value;  //content_article
  add_new_URL_adress_article = document.forms["forma_add_article"].elements["name_URL_adress"].value;  //URL_adress article

  var parameter = 'p_Name_article='+add_new_name_article+'&p_text_form_article='+add_new_content_article+'&p_button_URL_adress='+add_new_URL_adress_article;
 
  //joing with ajax
  var network = createRequestObject();
  
  network.open("GET","ok_err_no_name_a.php?p_Name_article="+add_new_name_article+"&p_text_form_article="+add_new_content_article+"&p_button_URL_adress="+add_new_URL_adress_article,true);

  network.setRequestHeader("Content-type","application/x-www-form-urlencoded; charset=UTF-8");
 
  network.onreadystatechange = function () {
       if(network.readyState == 4) {Article_Tags.innerHTML = ''; Article_Tags.innerHTML = network.responseText;  }
  }		
  
  network.send(parameter);

  
} //ok_err_no_name_a()


function edit_tag() // edit_tag() - edit tag
{

//  var new_tag_edit = document.getElementById('select_flag');
  var new_tag_edit = document.forms["forma_add_article"].elements["select_flag"].value;
 
  //parametr to server
  var parameter = 'new_tag_edit='+new_tag_edit;
 
  //joing with ajax
  var network = createRequestObject();
  
  network.open("GET","edit_new_tag.php?q="+new_tag_edit,true);
  
  network.setRequestHeader("Content-type","application/x-www-form-urlencoded; charset=UTF-8");
 
  network.onreadystatechange = function () {
       if(network.readyState == 4) {Article_Tags.innerHTML = ''; Article_Tags.innerHTML = network.responseText;  }
  }		
  
  network.send(parameter);
  
} //edit_tag()


// save_edit_tag() - edit tag
function save_edit_tag()
{

//  var new_tag_edit = document.getElementById('select_flag');
  var save_new_tag_edit = document.forms["forma_add_article"].elements["edit_tag"].value;
  //parametr to server
  var parameter = 'new_tag_edit='+save_new_tag_edit;
 
  //joing with ajax
  var network = createRequestObject();
  
  network.open("GET","save_edit_new_tag.php?q="+save_new_tag_edit,true);
  
  network.setRequestHeader("Content-type","application/x-www-form-urlencoded; charset=UTF-8");
 
  network.onreadystatechange = function () {
       if(network.readyState == 4) {Article_Tags.innerHTML = ''; Article_Tags.innerHTML = network.responseText;  }
  }		
  
  network.send(parameter);
  
} //save_edit_tag()


// del_tag() - edit tag
function del_tag()
{
  var delete_new_tag = document.forms["forma_add_article"].elements["select_flag"].value;
  //parametr to server
  var parameter = 'delete_new_tag='+delete_new_tag;
 
  //joing with ajax
  var network = createRequestObject();
  
  network.open("GET","delete_new_tag.php?q="+delete_new_tag,true);
  
  network.setRequestHeader("Content-type","application/x-www-form-urlencoded; charset=UTF-8");
 
  network.onreadystatechange = function () {
       if(network.readyState == 4) {Article_Tags.innerHTML = ''; Article_Tags.innerHTML = network.responseText;  }
  }		
  
  network.send(parameter);
  
} //del_tag()


function add_data_form_a()  // add_data_form_a() - add data form of new article
{
//  var new_tag_edit = document.getElementById('select_flag');
  var add_new_name_article = document.forms["forma_add_article"].elements["Name_article"].value;  //name_article
  var add_new_content_article = document.forms["forma_add_article"].elements["text_form_article"].value;  //content_article
  var add_new_URL_adress_article = document.forms["forma_add_article"].elements["name_URL_adress"].value;  //URL_adress article
 
  //parametr to server
  var parameter = 'p_Name_article='+add_new_name_article+'&p_text_form_article='+add_new_content_article+'&p_button_URL_adress='+add_new_URL_adress_article;
 
  //joing with ajax
  var network = createRequestObject();
  
  network.open("GET","add_data_form_a.php?p_Name_article="+add_new_name_article+"&p_text_form_article="+add_new_content_article+"&p_button_URL_adress="+add_new_URL_adress_article,true);
  
  //form coding  - UTF-8
  network.setRequestHeader("Content-type","application/x-www-form-urlencoded; charset=UTF-8");
 
  //reply from server
  network.onreadystatechange = function () {
       if(network.readyState == 4) {Article_Tags.innerHTML = ''; Article_Tags.innerHTML = network.responseText;  }
  rab = all_pages();
  rab = select_page();
  rab = ajax_list_tags();

  }		
  
  //send request
  network.send(parameter);
    
} //add_data_form_a()


function edit_data_form_a()  // edit data form of new article
{			 
			 //visibile all buttons in #content_main3   
		     document.getElementById("button_prev_page").style.visibility = 'visible';
		     document.getElementById("button_next_page").style.visibility = 'visible';
		     document.getElementById("many_pages").style.visibility = 'visible';
		     document.getElementById("select_page").style.visibility = 'visible';
	         document.getElementById("button_article_search").style.visibility = 'visible';
		     document.getElementById("button_article_add").style.visibility = 'visible';
		     document.getElementById("read_page").style.visibility = 'visible';
		     document.getElementById("button_article_edit").style.visibility = 'visible';
		     document.getElementById("button_article_del").style.visibility = 'visible';
		     document.getElementById("search_article").style.visibility = 'visible';
			 document.getElementById("searchform").style.visibility = 'visible';
	   
		     //hide all buttons in #content_main3  for reading the article	   
		     document.getElementById("button_prev_page_read").style.visibility = 'hidden';   
		     document.getElementById("button_next_page_read").style.visibility = 'hidden';
		     document.getElementById("many_pages_read").style.visibility = 'hidden';
		     document.getElementById("select_page_read").style.visibility = 'hidden';
	         document.getElementById("button_article_search_read").style.visibility = 'hidden';
		     document.getElementById("back_menu_article").style.visibility = 'hidden';	  
			 document.getElementById("searchform_read").style.visibility = 'hidden';
			 document.getElementById("search_article_read").style.visibility = 'hidden';
		     document.getElementById("button_prev_page_read").style.zIndex = "0";   
		     document.getElementById("button_next_page_read").style.zIndex = "0";
		     document.getElementById("many_pages_read").style.zIndex = "0";
		     document.getElementById("select_page_read").style.zIndex = "0";
	         document.getElementById("button_article_search_read").style.zIndex = "0";
		     document.getElementById("back_menu_article").style.zIndex = "0";
             document.getElementById("searchform_read").style.zIndex = "0";			 
			 document.getElementById("search_article_read").style.zIndex = "0";

  var add_new_name_article = document.forms["forma_add_article"].elements["Name_article"].value;  //name_article
  var add_new_content_article = document.forms["forma_add_article"].elements["text_form_article"].value;  //content_article
  var add_new_URL_adress_article = document.forms["forma_add_article"].elements["name_URL_adress"].value;  //URL_adress article
  
  var parameter = 'p_Name_article='+add_new_name_article+'&p_text_form_article='+add_new_content_article+'&p_button_URL_adress='+add_new_URL_adress_article;
 
  //joing with ajax
  var network = createRequestObject();
 
  network.open("GET","edit_data_form_a.php?p_Name_article="+add_new_name_article+"&p_text_form_article="+add_new_content_article+"&p_button_URL_adress="+add_new_URL_adress_article,true);

  network.setRequestHeader("Content-type","application/x-www-form-urlencoded; charset=UTF-8");
 
  network.onreadystatechange = function () {
       if(network.readyState == 4) {Article_Tags.innerHTML = ''; Article_Tags.innerHTML = network.responseText;  }
//  rab = all_pages();
//  rab = select_page();
  rab = ajax_list_tags();
  }		
  
  //send request
  network.send(parameter);    
 
} //edit_data_form_a()

function rewrite_table_a() //rewrite articles table
{
  q = '1';
  //parametr to server
  var parameter = 'q='+q;
 
  //joing with ajax
  var network = createRequestObject();
  
  network.open("GET","rewrite_table.php?q="+q,true);
  
  network.setRequestHeader("Content-type","application/x-www-form-urlencoded; charset=UTF-8");
 
  network.onreadystatechange = function () {
       if(network.readyState == 4) {table1_articles.innerHTML = ''; table1_articles.innerHTML = network.responseText;  }
  }		
  
  network.send(parameter);
    
} //rewrite_table_a()

function prev_page() // - previous page of the articles list
{
  str == '1';   
  
  //parametr to server
  var parameter = 'name_Theme2='+str;
 
  //joing with ajax
  var network = createRequestObject();
  
  network.open("GET","prev_page.php?q="+str,true);
  
  network.setRequestHeader("Content-type","application/x-www-form-urlencoded; charset=UTF-8");
 
  network.onreadystatechange = function () {
       if(network.readyState == 4) {articles_content1.innerHTML = ''; articles_content1.innerHTML = network.responseText;  }
  }		
  
  network.send(parameter);
  
} //prev_page()

function ok_err_no_content_a()// ok_err_no_content_a()- push OK if no Content of Article
{
  var add_new_name_article = document.forms["forma_add_article"].elements["Name_article"].value;  //name_article
  var add_new_content_article = document.forms["forma_add_article"].elements["text_form_article"].value;  //content_article
  var add_new_URL_adress_article = document.forms["forma_add_article"].elements["name_URL_adress"].value;  //URL_adress article
  
  //parametr to server
  var parameter = 'p_Name_article='+add_new_name_article+'&p_text_form_article='+add_new_content_article+'&p_button_URL_adress='+add_new_URL_adress_article;
 
  //joing with ajax
  var network = createRequestObject();
  
  network.open("GET","ok_err_no_content_a.php?p_Name_article="+add_new_name_article+"&p_text_form_article="+add_new_content_article+"&p_button_URL_adress="+add_new_URL_adress_article,true);
  
  //UTF-8
  network.setRequestHeader("Content-type","application/x-www-form-urlencoded; charset=UTF-8");
 
  network.onreadystatechange = function () {
       if(network.readyState == 4) {Article_Tags.innerHTML = ''; Article_Tags.innerHTML = network.responseText;  }
  }		
  
  network.send(parameter);
  
} //ok_err_no_content_a()


