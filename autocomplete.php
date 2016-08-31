<?php
$host  = 'localhost';
$user  = 'd00c81e5';
$pass  = '92224dtw';
$dbase = 'd00c81e5';
mysql_connect($host, $user, $pass) or die("Could not connect to database");
mysql_select_db($dbase) or die("Could not select database");
mysql_query("SET NAMES 'utf-8'");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>           
  <head>                 
    <meta http-equiv="content-type" content="text/html; charset=utf-8">           
    <meta name="robots" content="nofollow,noindex">    
    <title>Finder              
    </title>    
    <style type="text/css">    
      <!--
            *{margin:0px}
      #searchbox
      {
      width:250px;
      border:solid 1px #000;
      padding:3px;
      }
      #display
      {
      width:250px;
      display:none;
      margin-right:30px;
      border-left:solid 1px #dedede;
      border-right:solid 1px #dedede;
      border-bottom:solid 1px #dedede;
      overflow:hidden;
      }
      .display_box
      {
      padding:4px; 
      border-top:solid 1px #dedede; 
      font-size:12px; 
      
      }
      .display_box:hover
      {
      background:#3b5998;
      color:#FFFFFF;
      }
          //-->    
    </style>    
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="jquery.js"></script>
<script>
$(document).ready(function(){
$(".search").keyup(function() 
{
var searchbox = $(this).val();
var dataString = 'searchword='+ searchbox;
if(searchbox=='')
{}
else
{
$.ajax({
type: "POST",
url: "search_auto.php",
data: dataString,
cache: false,
success: function(html)
{
$("#display").html(html).show();
}
});
}return false; 
});
});
</script>          
  </head>           
  <body>   
    <input type="text" class="search" id="searchbox" />
    <div id="display">
    </div>
  </body>
</html>