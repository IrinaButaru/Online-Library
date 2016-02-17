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
	  if($_REQUEST['page'] == 'home')
	  {
		  echo '<div class = "templatemo_product_box">
                 <h1 style="text-align:center"> Agatha Christie </h1>	
                 <img src="images/Agatha_Christie.png" alt="Agatha_Christie" />				 
		          <div class="product_info">
                	<p> Agatha Christie(15 Septembrie 1890 - 12 Ianuarie 1976), a fost o scriitoare engleza de romane, povestiri scurte si piese de teatru 
					    politiste.</p>
				  </div>
                    <div class="detail_button"><a href="autori.php?autor=Agatha Christie">Detalii</a></div>
		       </div>
			   <div class = "templatemo_product_box">
			    <h1 style="text-align:center"> Jules Verne </h1>
				<img src="images/Jules_Verne.jpg" alt="Agatha_Christie" />
				<div class="product_info">
				<p> Jules Verne(8 februarie 1828 - 24 martie 1905) a fost un scriitor francez si un precursor al literaturii stiintifico-fantastice. </p>
				</div>
				 <div class="detail_button"><a href="autori.php?autor=Jules Verne">Detalii</a></div>
			   </div>';
	  }
	  if($_REQUEST['page'] == 'contact')
	  {
		  echo ' 
     		  <h2> Va rugam sa completati formularul de contact de mai jos!</h2>
	          <form action="contact.php" method="post">
			  <table>
			  <tr> 
			   <td> Nume*: </td>
			   <td> <input type="text" name="nume" required="true"> </td>
			  </tr>
			  <tr> 
			   <td> Prenume*: </td>
			   <td> <input type="text" name="prenume" required="true"> </td>
			  </tr>
			  <tr> 
			   <td> Email*: </td>
			   <td> <input type="email" name="mail" required="true"> </td>
			  </tr>
			  <tr>
			   <td> Mesaj*: </td>
			   <td> <textarea  rows="10" cols="50" name="mesaj" ></textarea> </td>
			  </tr>
			  <tr>
			  <td> <input type="submit" value = "Send"> </td>
			  </tr>
			  </table>
			  </form>
			
		  ';
	  }
	  if($_REQUEST['page'] == 'admin')
	  {
		  echo '  <div class="templatemo_product_box">
	              <span style="text-align:center"> <h2> Adauga carte: </h2> </span>
	              <form action="adauga_carte.php" method="post">
	              <table>
	              <tr>
		          <td>Titlu*:</td>
		          <td><input type="text" name="titlu" required="true"></td>
		          </tr>
		          <tr>
		          <td>Autor*:</td>
		          <td><input type="text" name="autor" required="true"></td>
		          </tr>
		          <tr>
		          <td>Link*:</td>
		          <td><input type="text" name="link" required="true"></td>
		          </tr>
		          <tr>
		          <td>Categorie*:</td>
		          <td><input type="text" name="categorie" required="true"></td>
		          </tr>
	              </table>
	              <input type="submit" value = "Adauga">
	              </form>
                  </div> 
				   <div class="templatemo_product_box">
	              <span style="text-align:center"> <h2> Sterge carte: </h2> </span>'
				  ;
				  require('./database_connection.php');
				 $query = "select author,title from book";
				 $result = mysql_query($query);
                 while($row= mysql_fetch_row($result))
				 {
					 echo '<a href="sterge_carte.php?autor='.$row[0].'&titlu='.$row[1].'">'.$row[0].' - '.$row[1].'</a><br>';
				 }
				  echo '</div>';
				  echo ' <div class="templatemo_product_box">
	                     <span style="text-align:center"> <h2> Elemente statistice: </h2> </span>
						 <a href="statistics.php?view=user" > Utilizatori </a><br>
						<!-- <a href="statistics.php?view=book" > Carti </a> -->
						 </div>';
				  echo '<div class="templatemo_product_box">
				        <span style="text-align:center"> <h2> Compune newsletter: </h2> </span>
						<form action="newsletter.php" method="post">
						<label> Numar carti*:</label>
						<input type = "number" name="numar_carti" required="true">
						<input type="submit" value = "OK">
						</form>
				        </div>';

	  }
	?>
    </div>

</div>

</body>
</html>