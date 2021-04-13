<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Teste de personalidade</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
		<style>
		.teste {
			background-color: #6c757d;
			width: 300px;
			height: 150px;
			margin-top: 10px; /* altura que está do topo */
			margin-left: 500px; /* altura que está do topo */
			top: 5px; /* altura que vai parar antes do topo */
			position: sticky;
		}
		</style>
	</head>
    <body>
		<div  class="teste">
			A <input id="faixaA" type="range" min="0" max="40"><input type="text" id="ca" readonly size="3"><br> 
			B <input id="faixaB" type="range" min="0" max="40"><input type="text" id="cb" readonly size="3"><br> 
			C <input id="faixaC" type="range" min="0" max="40"><input type="text" id="cc" readonly size="3"><br> 
			D <input id="faixaD" type="range" min="0" max="40"><input type="text" id="cd" readonly size="3"><br> 
		</div>
		<form>
		 <fieldset class="form-group">
			
		<?php
		$arq="./caixas.txt";		//qual arquivo vamos trabalhar
		$pont=fopen($arq,"r");		//fopen abre um arquivo para LEITURA = r ou para Escrita = w
		$linha=fgets($pont);		//pegar primeira linha
		$caixaI=1;
		$caixaII=2;
		$n=0;
		
		
		
		while($linha){ 				//enquanto houver linhas e não for uma linha em branco
			$temp=explode(" ",$linha);
			$id1=$temp[0]."_".$caixaI;
			$id2=$temp[2]."_".$caixaII;
			echo "<div class='row'> <div class='col-sm-2'> <div class='form-check'> <input id='".$id1."' class='form-check-input' type='radio' onclick='f1()' name='caixa".$caixaI."'><label class='form-check-label' for='gridRadios1' onclick='f2(\"".$id1."\")'>".$temp[0]." ".$temp[1]."</label></div></div>";
			echo "                  <div class='col-sm-2'> <div class='form-check'> <input id='".$id2."' class='form-check-input' type='radio' onclick='f1()' name='caixa".$caixaII."'><label class='form-check-label' for='gridRadios1' onclick='f2(\"".$id2."\")'>".$temp[2]." ".$temp[3]."</label></div></div></div>";
			$n++;
			if($n%4==0){
				$caixaI+=2;	
				$caixaII+=2;
				echo "<hr>";
			}
			$linha=fgets($pont);	//pegar a próxima linha
		}
		?>
		
		<hr>
		<input type="button" onclick="f1()" value="Calcular resultado">
		<hr>
		

		  </fieldset>
		  
		</form>
		

		<script>
			function f2(onde){
				console.log(onde);
				document.getElementById(onde).checked=true;
				document.getElementById(onde).clicked=true;
				f1();
			}
			function f1(){
				var contador = [];
				contador[0]=0;
				contador[1]=0;
				contador[2]=0;
				contador[3]=0;
				//var marcou = document.getElementsByName('caixa1');
				
				var inputs = document.getElementsByTagName('input');
				//console.log("->"+inputs.length);
				for (index = 0; index < inputs.length; ++index) {
					if(inputs[index].getAttribute("type") == "radio") {	
						if(inputs[index].checked==true){ 
							if(inputs[index].getAttribute("id").includes("A")){
								contador[0]++;						
							}
							if(inputs[index].getAttribute("id").includes("B")){
								contador[1]++;						
							}
							if(inputs[index].getAttribute("id").includes("C")){
								contador[2]++;						
							}
							if(inputs[index].getAttribute("id").includes("D")){
								contador[3]++;						
							}
						}	
					}
				}

				console.table(contador);
				document.getElementById("faixaA").value=contador[0];
				document.getElementById("faixaB").value=contador[1];
				document.getElementById("faixaC").value=contador[2];
				document.getElementById("faixaD").value=contador[3];
				
				document.getElementById("ca").value=contador[0];
				document.getElementById("cb").value=contador[1];
				document.getElementById("cc").value=contador[2];
				document.getElementById("cd").value=contador[3];
			}

        </script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
     </body>
</html>

