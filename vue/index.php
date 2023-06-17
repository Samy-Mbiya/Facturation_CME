<?php
	require 'Head.php';
?>
       <div class="span4"></div>
	  <div class="span4">
        <!-- Contenue
        ================================================== -->
		 <section id="dropdowns">
		 	<div class="span6"></div>
		 	<div style="margin-top:25%; padding:10%; background-color:#00CCCC; text-align:center; border-radius:10px;" >
				<div><h3>Login</h3></div>
			   <form method="post"> 
					<p><input type="text"   name="User" id="User" placeholder="User......"></p>
					<p><input type="password"  name="Pw" id="PW" placeholder="Password......"></p>
					<input style="width:10px; visibility:collapse" value="1"  name="code" id="code"/>
					<button type="submit" class="btn btn-warning" id="lg">Connexion</button>	
			   </form>
			    <div id="message"></div>
			 </div>
			
		   </section>
        </div>
		<div style="margin-top:500px;"></div>
  <?php
  require 'Footer.php';