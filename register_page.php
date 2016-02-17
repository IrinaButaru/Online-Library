<?php
// Start the session
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
			  echo '<li><a href="logout.php" class="current" > Logout </a></li>';
			  echo '<li><a href="home_page.php?page=admin" class="current" >Admin Control</a></li>';
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
	 <div >
	     <form action='register.php' method="post">
			 <table>
			 <tr>
			 <td> Nume*: </td>
			 <td> <input type="text" name="nume" required = "true" > <td>
			 </tr>
			 <tr>
			 <td> Prenume*: </td>
			 <td> <input type="text" name="prenume" required = "true" > <td>
			 </tr>
			  <tr> 
			    <td> Email*: </td>
				<td> <input type="email" name="email" required = "true" ></td>
			  </tr>	
			  <tr> 
			    <td> Username*: </td>
				<td> <input type="text" name="username" required = "true" > <td>
			  </tr>
			  <tr> 
			    <td> Parola*: </td>
				<td> <input type="password" name="parola" required = "true" > <td>
			  </tr>
			  <tr> 
			    <td> Confirmare parola*: </td>
				<td> <input type="password" name="confirmare_parola" required = "true" > <td>
			  </tr>
			 </table>
			 <input type="checkbox" name="newsletter" value="1">Vreau sa primesc prin email informare cu privire la cartile adaugate<br><br>
			 <img id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image" />
			 <br><br>
			 Introduceti codul de mai sus
			 <br>
			 <input type="text" name="captcha_code" maxlength="6" />
            	<a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">
				[ Alt Cod ]</a> 
		    <br><br>
			 <input type="submit" value = "Register">
			 </form>
	 </div>
    </div>
	</div>

</div>

</body>
</html>