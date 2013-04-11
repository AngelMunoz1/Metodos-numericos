<?php
	require("funciones.php");
	if(!empty($_POST)){
		
		$matriz[0][0] = $_POST['x1']; $matriz[0][1] = $_POST['y1']; $matriz[0][2] = $_POST['z1']; $matriz[0][3] = $_POST['t1'];
		$matriz[1][0] = $_POST['x2']; $matriz[1][1] = $_POST['y2']; $matriz[1][2] = $_POST['z2']; $matriz[1][3] = $_POST['t2'];
		$matriz[2][0] = $_POST['x3']; $matriz[2][1] = $_POST['y3']; $matriz[2][2] = $_POST['z3']; $matriz[2][3] = $_POST['t3'];

	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Dehivis Perez</title>
<meta name="description" content="Place your description here">
<meta name="keywords" content="put, your, keyword, here">
<meta name="author" content="dehivix" >
<meta charset="utf-8">
<link rel="stylesheet" href="../css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="../css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
<script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../js/cufon-yui.js"></script>
<script type="text/javascript" src="../js/cufon-replace.js"></script>
<script type="text/javascript" src="../js/Myriad_Pro_300.font.js"></script>
<script type="text/javascript" src="../js/Myriad_Pro_400.font.js"></script>
<script type="text/javascript" src="../js/Myriad_Pro_600.font.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<!--[if lt IE 7]>
<script type="text/javascript" src="http://info.template-help.com/files/ie6_warning/ie6_script_other.js"></script>
 <![endif]-->
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<![endif]-->
</head>
<body id="page3">
<div class="tail-top2">
<!-- header -->
	<header>
		<div class="container">
			<div class="header-box">
				<div class="left">
					<div class="right">
						<nav>
							<ul>
								<li><a href="#">Prof:</a></li>
								<li class="current"><a href="#">Dessire</a></li>
								<li><a href="#">Blanco</a></li>
							</ul>
						</nav>
						<h1><a href="../index.html"><span>Métodos</span>Numéricos</a></h1>
					</div>
				</div>
			</div>
			
		</div>
	</header>
	<!-- content -->
	<section id="content"><div class="inner_copy">More <a href="http://www.templatemonster.com/">Website Templates</a> at TemplateMonster.com!</div>
		<div class="container">
			<div class="inside bot-indent">
				<div id="slogan">
					<div class="inside">
						<h2><span>Método d</span>e Gauss</h2>
						<p>Se conoce como forma matricial en la cual se escriben los coeficientes sin las incognitas separados por una linea vertical en donde se toma el primer coeficiente de la ecuación número uno, y se le busca un número que multiplicado y luego sumado o restado con el primer coeficiente de la segunda ecuación sea igual a cero.</p>
					</div>
				</div>
				<h2 class="extra">Resultados</h2>
				<div class="box extra">
					<div class="border-right">
						<div class="border-bot">
							<div class="border-left">
								<div class="left-top-corner1">
									<div class="right-top-corner1">
										<div class="right-bot-corner">
											<div class="left-bot-corner">
												<div class="inner">
																	<article class="col-1 indent">
					<br /><br /><br /><br /><br /><br />
                		<center><table>
                        	<tr>
                            <td><img src="img/reguccion.gif" /></td>
                            <td colspan="2">                            
                            	<?php
									# MOSTRANDO EL SISTEMA DE ECUACION
									for($i=0; $i < 3; $i++){
										if($i <=0){echo $matriz[0][0]."X ";} if($i >0 and $i <=1){echo $matriz[1][0]."X ";} if($i >=2){ echo $matriz[2][0]."X ";}		
										if($matriz[$i][1] >= 0){echo " + ".$matriz[$i][1]."Y ";}else{echo " ".$matriz[$i][1]."Y ";}	
										if($matriz[$i][2] >= 0){echo " + ".$matriz[$i][2]."Z"; echo " = ".$matriz[$i][3];}else{echo " ".$matriz[$i][2]."Z"; echo " = ".$matriz[$i][3];}
										echo"<br />";
									}

								?>
                             </td></tr>
                            <tr><td colspan="3">
								<?php
								
										# MOSTRANDO LAS ECUACIONES EN LA MATRIZ			
										echo "<center><table width='200' border='1'>";
										for($i = 0; $i < 3; $i++){
											echo "<tr>";
											for($j = 0; $j < 4; $j++){
												echo "<td width='10'>".$matriz[$i][$j]."</td>";
											}	echo "</tr>";
										}echo "</table></center>";
                  						
										# DESPEJANDO PARA HALLAR A ?
										$e2 = gauss($matriz[0][0],$matriz[1][0]);
										$e3 = gauss($matriz[0][0],$matriz[2][0]);
										
										# GENERANDO NUEVAS ECUACIONES DE 2 Y 3 MULTIPLICADO EL VALOR DEL DESPEJE CON LA ECUACION (1,1) Y SUMANDO CON ECUACION (2,3)
										for($j = 0; $j < 4; $j++){

													$matriz[1][$j] = ($e2 * $matriz[0][$j]) + $matriz[1][$j];
					
													$matriz[2][$j] = ($e3 * $matriz[0][$j]) + $matriz[2][$j];
										}
										
										# DESPEJANDO PARA HALLAR A?
										$e3 = gauss($matriz[1][1],$matriz[2][1]);
										
										# GENERANDO NUEVA ECUACION 3
										for($j = 0; $j < 4; $j++){
					
												$matriz[2][$j] = ($e3 * $matriz[1][$j]) + $matriz[2][$j];
										}
								?>
                                </td>
                                </tr>
                             <tr>
                             <td colspan="3">
                                	<?php	
										# MOSTRANDO NUEVA MATRIZ GENERADA											
										echo "<center><table width='200' border='1'>";
										for($i = 0; $i < 3; $i++){
											echo "<tr>";
											for($j = 0; $j < 4; $j++){
												echo "<td width='10'>".$matriz[$i][$j]."</td>";
											}	echo "</tr>";
										}echo "</table></center>";
										# HALLANDO Z, Y, X
										$z = $matriz[2][2] / $matriz[2][3];
										$y = ($matriz[1][3] + (-1 * ($matriz[1][2] * $z))) / $matriz[1][1];
										$x = ($matriz[0][3] + (-1 * ($matriz[0][2] * $z)) + (-1 * ($matriz[0][1] * $y))) / $matriz[0][0];
									?>
                              </td>
                              </tr>
                 				
                                <tr>
                                <td colspan="3">
                                	<?php
										# MOSTRANDO RESULTADOS
										echo"<center><table>";
										echo "<tr><td><b>Z</b> = ".$z."</td></tr>";
										echo "<tr><td><b>Y</b> = ".$y."</td></tr>";
										echo "<tr><td><b>X</b> = ".$x."</td></tr>";
										echo"</table><b></center>";
									?>
                                 </td>
                                 </tr>
                          </table></center>
    		</article>
																	<div class="clear"></div>
																</div>
															</div>
														</div>
													</div>
													
																				<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<!-- aside -->
<aside>
	<div class="container">
		<div class="inside">
			
						<h1><span>   Creado por:   </span>    "Dehivis Pérez" <span>  Cédula:   </span>"20.363.511" <span>  Sección:   </span>"1"</h1>
							
						
		</div>
	</div>
</aside>
<!-- footer -->
<footer>

	<div class="container">
		<div class="inside">
			</div>
	</div>
</footer>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>