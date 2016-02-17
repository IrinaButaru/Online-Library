<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="ro">
<head>
<title>Biblioteca online</title>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="templatemo_container">

    <div id="templatemo_menu">
    	<ul>
            <li><a href="home_page.php?page=home" class="current">Home</a></li>
            
			<?php
			if(isset($_SESSION["username"])&&!empty($_SESSION["username"]) && $_SESSION["type"] == 1)
			{
			  echo '<li><a href="logout.php" class="current"> Logout </a></li>';
			  echo '<li><a href="home_page.php?page=admin" class="current">Admin Control</a></li>';
			}
			else
			{ if(isset($_SESSION["username"])&&!empty($_SESSION["username"]) && $_SESSION["type"] == 0)
				{
					 echo '<li><a href="logout.php" class="current"> Logout </a></li>';
					  echo '<li><a href="home_page.php?page=contact" class="current">Contact</a></li>';
				}
			   else
			    {  echo '<li><a href="register_page.php" class="current">Register</a></li>';
                    echo '<li><a href="home_page.php?page=contact" class="current">Contact</a></li>';			}
			}
			?>
			
		</ul>
    </div>

    <div id="templatemo_header">
        <div id="templatemo_special_offers">
		<p style="text-align:center"><i>Citatul zilei:</i> </p>
		 <?php
		 $homepage = file_get_contents('http://proverbele-si-citatele-zilei.blogspot.ro/');
		 $citat = explode('<font size="3">',$homepage);
         echo $citat[5];
         ?> 
		 
	    </div  >
    </div>
    <div id="templatemo_content">
        <div id="templatemo_content_left">
		    <div class="templatemo_content_left_section">
			<form action='login.php' method="POST">
			 <table>
			  <tr> 
			    <td> Username: </td>
				<td> <input style="width:115px" type="text" name="username"></td>
			  </tr>	
			  <tr> 
			    <td> Parola: </td>
				<td> <input style="width:115px" type="password" name="parola"> <td>
			  </tr>
			 </table>
			 <input id = "btn" type="submit" value = "Login">
			 </form>
			</div>
        	<div class="templatemo_content_left_section">
            	<h1>Categorii Carti</h1>
				<?php
				 require('./database_connection.php');
				 $query = "select distinct category from book";
				 $result = mysql_query($query);
                 while($row= mysql_fetch_row($result))
				 {
					 echo "<a href=\"categorie.php?categorie=".$row[0]."\">".$row[0]."</a><br>";
				 }

				?>
			</div>
		</div>
	
    <div id="templatemo_content_right">
	<?php
	  
	  if(isset($_REQUEST['categorie']) && !empty($_REQUEST['categorie']))
	  {
		require('./database_connection.php');
		$query = "select author,title,link,book_id from book where category='".$_REQUEST['categorie']."'";
		$result = mysql_query($query);
		$result2 = mysql_query("select user_id from user where username='".$_REQUEST["username"]."'");
		$row2 = mysql_fetch_row($result2);
        while($row= mysql_fetch_row($result))
       {
		   echo '<h4>'.$row[0].' - '.$row[1].'</h4>';
           if(isset($_SESSION["username"]) && !empty($_SESSION["username"]))
           {
			   echo '<input type="hidden" name="id_carte" value="'.$row[3].'">';
			   echo '<input type="hidden" name="id_user" value="'.$row2[0].'">';
			  /* echo '  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
                       <script language="javascript">
                       function insert_download() {
                        $.ajax({
                        type: "GET",
                        url: "insert_download.php" ,
                        success : function() { 
                        location.reload();
						}
                        });
                        }
                      </script>
			          <a onclick="insert_download()" href="'.$row[2].'" download> download </a>';*/
				
			    echo '<a href="'.$row[2].'" download> download </a>';
	       }
           else
          { echo '<p> login to download </p>'; }
        }
	 }
	  
	?>
    </div>
	</div>

</div>
</body>
</html>

