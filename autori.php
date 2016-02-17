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
	  if($_REQUEST['autor'] == 'Agatha Christie')
	  {
		  echo '<div>
		         <h3> Agatha Christie </h3>
				 <br><br>
				 Agatha Mary Clarissa Miller s-a nascut pe 15 sepembrie 1890 in Torquay, Anglia. Tatal ei, Frederick, a fost un investitor american. Mama 
				 Agathei, Clara, a fost o persoana oarecum timida, care a trecut fiicei sale multe din trasaturile ei introvertite. Cunoscuta mai ales pentru 
				 romanele "Murder on the Orient Express" si "And then there were none", lucrarile Agathei sunt indragite de multe generatii de cititori. Cu 
				 toate acestea, ea a fot si o maestra a nuvelelor: capodopera "Witness for the prosecution" (pe care s-a bazat clasicul film, cu acelasi nume), "Three blind mice" (ce a dus ulterior la piesa "Mousetrap", 
                 piesa cel mai mult pusa in scena din istorie), si multe alte povesti ingenioase, pline de bine cunoscutul suspans.
                 Agatha Christie este cel mai mare scriitor de fictiune din lume; opera sa este depasita ca vanzari doar de Biblie si operele lui Shakespeare. 
				 Este autoarea a sase romane sub pseudonimul Mary Westmacott, iar in numele ei a scris 80 de romane si nuvele politiste si 14 piese de teatru. 
				 Christie este creatoarea a doua personaje exceptionale a literaturii universale: Hercule Poirot si Doamna Jane Marple.
				 Cariera Agathei Christie s-a desfasurat pe parcursul a peste 50 de ani. Declarata "campionul inducerii in eroare" (New York Times) este 
				 pretutindeni cunoscuta si aprciata, personajele ei fiind iconice pentru litertura. Lucrarile scriitoarei au facut subiectul a numeroase 
				 filme si drame TV, in ultimii 75 de ani. Agatha Christie a murit in 1976, pe 12 ianuarie.
                 <br>
				 Bibliografie: <br>

 1920 The Mysterious Affair at Styles - Misterioasa Afacere de la Styles  <br>
 1922 The Secret Adversary - Adversarul Secret <br>
 1923 The Murder on the Links - Crima pe terenul de golf <br>
 1924 The Man in the Brown Suit - Omul în costum maro <br>
 1925 The Secret of Chimneys - Secretul de la Chimneys <br>
 1926 The Murder of Roger Ackroyd - Uciderea lui Roger Ackroyd <br>
 1927 The Big Four - Cei patru mari <br>
 1928 The Mystery of the Blue Train - Misterul trenului albastru <br>
 1929 The Seven Dials Mystery - Misterul celor sapte cadrane <br>
 1930 The Murder at the Vicarage - Crima la vicariat <br>
 1931 The Sittaford Mystery - Misterul de la Sittaford <br>
 1932 Peril at End House - Pericol la End House <br>
 1933 Lord Edgware Dies sau Thirteen at Dinner - Lordul Edgware moare <br>
 1934 Murder on the Orient Express - Crima din Orient Express <br>
 1934 Why Didn\'t They Ask Evans? sau The Boomerang Clue - De ce nu i-au cerut lui Evans? <br>
 1935 Three Act Tragedy sau Murder in Three Acts <br>
 1935 Death in the Clouds sau Death in the Air - Moarte în nori <br>
 1936 The A.B.C. Murders sau The Alphabet Murders - Ucigasul ABC <br>
 1936 Murder in Mesopotamia - Crima in Mesopotamia <br>
 1936 Cards on the Table - Cartile pe masa <br>
1937 Dumb Witness also Poirot Loses a Client - Martorul mut <br>
 1937 Death on the Nile - Moarte pe Nil <br>
 1938 Appointment with Death - Întâlnire cu moartea <br>
 1938 Hercule Poirot\'s Christmas sau Murder for Christmas - Craciunul lui Poirot <br>
 1939 Murder is Easy sau Easy to Kill - E usor sa ucizi <br>
 1939 And Then There Were None sau Ten Little Niggers - Zece negri mititei <br>
 1940 Sad Cypress - Chiparosul trist <br>
 1940 One, Two, Buckle My Shoe - Unu, doi, trei... <br>
 1941 Evil Under the Sun - Raul sub soare <br>
 1941 N or M? - N sau M <br>
 1942 The Body in the Balantary - Cadavrul din biblioteca<br>
1942 Five Little Pigs sau Murder in Retrospect - Cei cinci purcelusi <br>
 1942 The Moving Finger sau The Case of the Moving Finger - Mana ascunsa <br>
 1944 Towards Zero - Spre Zero <br>
 1944 Death Comes as the End - Moartea vine ca un sfârsit <br>
 1945 Sparkling Cyanide sau Remembered Death - Cianura scanteietoare <br>
 1946 The Hollow sau Murder After Hours ? <br>
 1948 Taken at the Flood sau There is a Tide... - Dusi de val <br>
 1949 Crooked House - Crima din casuta stramba <br>
 1950 A Murder is Announced - O crima anuntata <br>
1951 They Came to Baghdad - Locul intalnirii:Bagdad <br>
 1952 Mrs McGinty\'s Dead sau Blood Will Tell - Doamna McGinty a murit <br>
 1952 They Do It with Mirrors sau Murder with Mirrors - Impuscaturi la Stonygates <br>
 1953 After the Funeral sau Funerals are Fatal - Dupa funeralii <br>
 1953 A Pocket Full of Rye - Un buzunar plin cu secara<br>
 1954 Destination Unknown sau So Many Steps to Death - Misiune imposibila <br>
 1955 Hickory Dickory Dock sau Hickory Dickory Death ? <br>
 1956 Dead Man\'s Folly - Misterul crimelor inlantuite <br>
 1957 4.50 from Paddington sau Murder She Said - 4:50 din Paddington <br>
 1958 Ordeal by Innocence - Cele doua adevaruri <br>
 1959 Cat Among the Pigeons - Pisica printre porumbei <br>
 1961 The Pale Horse - Calul balan <br>
 1962 The Mirror Crack\'d from Side to Side sau The Mirror Crack\'d ? <br>
 1963 The Clocks - Ceasurile <br>
 1964 A Caribbean Mystery - Misterul din Caraibe <br>
 1965 At Bertram\'s Hotel - La hotelul Bertram <br>
 1966 Third Girl - A treia Fata / Falsa indentitate <br>
 1967 Endless Night - Infernul crimelor tainuite <br>
 1968 By the Pricking of My Thumbs - Cand ma furnica degetele <br>
 1969 Hallowe\'en Party - Noaptea diavolului <br>
 1970 Passenger to Frankfurt - Pasager spre Frankfurt <br>
 1971 Nemesis - Nemesis <br>
 1972 Elephants Can Remember - Elefantii nu uita niciodata <br>
 1973 Postern of Fate finalul Tommy si Tuppence - ultimul roman scris de Christie, Secretul casei dintre lauri <br>
 1975 Curtain ultima parte a lui Poirot, scrisa cu patru decenii în urma, Cortina <br>
 1976 Sleeping Murder ultima parte a lui Miss Marple, scrisa cu patru decenii în urma, Misterul crimei fara cadavru <br>

		       </div>';
	  }
    if($_REQUEST['autor' ] == 'Jules Verne')
	{
		echo '<div>
		      <h3> Jules Verne </h3>
			  <br><br>
			  Jules Verne s-a nascut la Nantes, in Franta, fiind fiul cel mare dintre cei cinci copii ai familiei. Si-a petrecut copilaria acasa cu parintii, 
			  pe o insula vecina cu raul Loara. La varsta de 9 ani, a fost trimis la scoala, la Liceul Nantes. Jules a studiat limba latina, pe care a folosit-o
			  ulterior in povestirea scurta "Le Mariage de Monsieur Anselme des Tilleuls". Patru dintre romanele sale evoca Romania, cel mai cunoscut fiind 
			  "Castelul din Carpati" (pentru ca intreaga actiune se petrece in Transilvania). Alte exemple sunt "Keraban incapatanatul", "Claudius Bombarnac" 
			  si "Pilotul de pe Dunare", ultimul fiind un roman postum.
              In cartea "Pe urmele lui Jules Verne in Romania", Simion Saveanu, autorul acesteia, emite ipoteza ca intre 1882 si 1884 Jules Verne ar fi fost in 
			  relatii intime cu o anume Luiza Müller, originara din Romania, mai precis din Homorod. La indemnul ei, ar fi facut o calatorie incognito cu o nava pe 
			  Dunare pâna la Giurgiu, apoi cu trenul la Bucuresti si apoi la Brasov si, in final, la Homorod. Cu aceasta ocazie ar fi cutrierat prin regiune mai multe 
			  saptamâni si ar fi vizitat Castelul Colt, care a devenit sursa de inspiratie pentru romanul "Castelul din Carpati".
              Filmul documentar "Jules Verne. O calatorie incredibila" este o biografie a lui Jules Verne, scriitorul care a descris calatorii ce inca nu 
			  puteau fi intreprinse in vremea sa (cum este si cea din romanul "20.000 de leghe sub mari"), dar nici în vremurile noastre ("Calatorie spre 
			  centrul Pamantului", de exemplu). Desi un autor talentat, marea sansa a lui Jules Verne, dupa cum chiar el a recunoscut, a fost intalnirea cu 
			  editorul Pierre-Jules Hetzel, cel care a publicat si opere ale lui Victor Hugo sau ale scriitoarei feministe George Sand (pseudonim).

		      </div>';
	}
	  
	?>
    </div>

</div>

</body>
</html>