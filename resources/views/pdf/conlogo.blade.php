<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta name="author" content="EstateX">
    <title>Todo Para Sus Pies</title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  

<style type="text/css">
/*! normalize.css v3.0.2 | MIT License | git.io/normalize */

body { 
width:100% !important;
margin:0 !important;
padding:0 !important;
line-height: 1.45; 
font-family: Garamond,"Times New Roman", serif; 

background: none; 
font-size: 14pt; 



}

/* Headings */
h1,h2,h3,h4,h5,h6 { page-break-after:avoid;margin:0 }
h1{font-size:25pt;}
h2{font-size:20pt;}
h3{font-size:15pt;}
h4{font-size:14pt;}
h5{font-size:13pt;}
h6{font-size:9pt;}


p, h2, h3 { orphans: 3; widows: 3; }


blockquote { margin: 1.2em; padding: 1em;  font-size: 12pt; }
hr { background-color: #ccc; }

/* Images */
img { float: left; margin: 1em 1.5em 1.5em 0; max-width: 100% !important; }
a img { border: none; }

/* Links */
a:link, a:visited { background: transparent; font-weight: 700; text-decoration: underline;color:#333; }
a:link[href^="http://"]:after, a[href^="http://"]:visited:after { content: " (" attr(href) ") "; font-size: 90%; }



/* Don't show linked images  */
a[href^="http://"] {color:#000; }
a[href$=".jpg"]:after, a[href$=".jpeg"]:after, a[href$=".gif"]:after, a[href$=".png"]:after { content: " (" attr(href) ") "; display:none; }



p { font-size:11pt; width: 40%; text-align: justify; }




</style>



      
  </head>

  <body>  
    <!-- Header Section Start -->

   
  
  <p style="margin: 1em;"><img src="socio-assets/images/logo.jpg" width="300px" heigth="300px" alt=""></p>
              
  <p style="margin: 1em 1em 1em 60%;">
                 
           Todo Para Sus Pies<br>    
           Checklist Franquiciatarios
         
         
      </p>
 
        



________________________________________________________________________
      <p style="margin: 1em;">
<h3></h3>
  
</p>


<p style="margin: 1em 1em 1em 50%;">  
  @la_display($module, 'sucursal_id')
            @la_display($module, 'fecha')
            <h2 style="color: #48B0F7;">FACHADA</h2>

          
            <div class="form-group">
              <label for="fachada1" class="col-md-6"><h4><strong>1. Cuenta con anuncio en letras separadas de aluminio :</strong></h4></label>
              <div class="col-md-6"><h5>{{$checklist->fachada1}}</h5></div>
            </div>
                      
            
            @la_display($module, 'comentarios')
           

            <h4>2.@la_display($module, 'fachada2')</h4>
      
            @la_display($module, 'comentarios2')
      

            <h4>3.@la_display($module, 'fachada3')</h4>
        
            @la_display($module, 'comentarios3')
          

            <h4>4.@la_display($module, 'fachada4')</h4>
       
            @la_display($module, 'comentarios4')
         

            <h4>5.@la_display($module, 'fachada5')</h4>
       
            @la_display($module, 'comentarios5')
     

            <h4>6.@la_display($module, 'fachada6')</h4>
          
            @la_display($module, 'comentarios6')
      
            <h2 style="color: #48B0F7;">IMAGEN</h2>
            <h4>7.@la_display($module, 'imagenpregunta1')</h4>
         
            @la_display($module, 'comentarios7')
          
            <h4>8.
            @la_display($module, 'imagenpregunta2')</h4>
          
            @la_display($module, 'comentarios8')
          
            <h4>9.
            @la_display($module, 'imagenpregunta3')</h4>
          
            @la_display($module, 'comentarios9')
         
            <h4>10.
            @la_display($module, 'imagenpregunta4')</h4>
      
            @la_display($module, 'comentarios10')
           
            <h4>11.
            @la_display($module, 'imagenpregunta5')</h4>
          
            @la_display($module, 'comentarios11')
          
            <h4>12.
            @la_display($module, 'imagenpregunta6')</h4>
           
            @la_display($module, 'comentarios12')
         
            <h4>13.
            @la_display($module, 'imagenpregunta7')</h4>
        
            @la_display($module, 'comentarios13')
        
            <h4>14.
            @la_display($module, 'imagenpregunta8')</h4>
          
            @la_display($module, 'comentarios14')
          
            <h4>15.
            @la_display($module, 'imagenpregunta9')</h4>
           
            @la_display($module, 'comentarios15')
       
            <h2 style="color: #48B0F7;">RECEPCIÓN</h2>
            <h4>16.
            @la_display($module, 'recepcion1')</h4>
          
            @la_display($module, 'comentarios16')
           
            <h4>17.
            @la_display($module, 'recepcion2')</h4>
          
            @la_display($module, 'comentarios17')
     
            <h4>18.
            @la_display($module, 'recepcion3')</h4>
         
            @la_display($module, 'comentarios18')
           
            <h4>19.
            @la_display($module, 'recepcion4')</h4>
          
            @la_display($module, 'comentarios19')
           
            <h4>20.
            @la_display($module, 'recepcion5')</h4>
         
            @la_display($module, 'comentarios20')
           
            <h4>21.
            @la_display($module, 'recepcion6')</h4>
          
            @la_display($module, 'comentarios21')
         
            <h4>22.
            @la_display($module, 'recepcion7')</h4>
           
            @la_display($module, 'comentarios22')
           
            <h4>23.
            @la_display($module, 'recepcion8')</h4>
          
            @la_display($module, 'comentarios23')
          
            <h2 style="color: #48B0F7;">CUBÍCULO</h2>
            <h4>24.
            @la_display($module, 'cubiculo1')</h4>
          
            @la_display($module, 'comentarios24')
            
            <h4>25.
            @la_display($module, 'cubiculo2')</h4>
           
            @la_display($module, 'comentarios25')
          
            <h4>26.
            @la_display($module, 'cubiculo3')</h4>
          
            @la_display($module, 'comentarios26')
         
            <h4>27.
            @la_display($module, 'cubiculo4')</h4>
          
            @la_display($module, 'comentarios27')
          
            <h4>28.
            @la_display($module, 'cubiculo5')</h4>
           
            @la_display($module, 'comentarios28')
          
            <h4>29.
            @la_display($module, 'cubiculo6')</h4>
          
            @la_display($module, 'comentarios29')
           
            <h4>30.
            @la_display($module, 'cubiculo7')</h4>
         
            @la_display($module, 'comentarios30')
          
            <h4>31.
            @la_display($module, 'cubiculo8')</h4>
         
            @la_display($module, 'comentarios31')
      
            <h2 style="color: #48B0F7;">PROCESO</h2>
            <h4>32.
            @la_display($module, 'proceso1')</h4>
         
            @la_display($module, 'comentarios32')
           
            <h4>33.
            @la_display($module, 'proceso2')</h4>
            
            @la_display($module, 'comentarios33')
            <h4>34.
            @la_display($module, 'proceso3')</h4>
          
            @la_display($module, 'comentarios34')
            <h4>35.
            @la_display($module, 'proceso4')</h4>
           
            @la_display($module, 'comentarios35')
            <h4>36.
            @la_display($module, 'proceso5')</h4>
           
            @la_display($module, 'comentarios36')
           
            <h4>37.
            @la_display($module, 'proceso6')</h4>
           
            @la_display($module, 'comentarios37')
            <h4>38.
            @la_display($module, 'proceso7')</h4>
         
            @la_display($module, 'comentarios38')           
          
            <h4>39.
            @la_display($module, 'proceso8')</h4>
           
            @la_display($module, 'comentarios39')           
        
              <h4>40.
            @la_display($module, 'proceso9')</h4>
          
            @la_display($module, 'comentarios40')
          
            <h4>41.
            @la_display($module, 'proceso10')</h4>
          
            @la_display($module, 'comentarios41')
          
            <h4>42.
            @la_display($module, 'proceso11')</h4>
           
            @la_display($module, 'comentarios42')
            <h4>43.
            @la_display($module, 'proceso12')</h4>
           
            @la_display($module, 'comentarios43')
            <h4>44.
            @la_display($module, 'proceso13')</h4>
          
            @la_display($module, 'comentarios44')
            <h2 style="color: #48B0F7;">INVENTARIO</h2>
            <h4>45.
            @la_display($module, 'inventario1')</h4>
           
            @la_display($module, 'comentarios45')
       
            <h4>46.
            @la_display($module, 'inventario2')</h4>
          
            @la_display($module, 'comentarios46')
        
            <h2 style="color: #48B0F7;">SISTEMA</h2>
            <h4>47.
            @la_display($module, 'sistema4')</h4>
           
            @la_display($module, 'comentarios47')
           
            <h4>48.
            @la_display($module, 'sistema3')</h4>
       
            @la_display($module, 'comentarios48')
        
            <h4>49.
            @la_display($module, 'sistema2')</h4>
            
            @la_display($module, 'comentarios49')
           
            <h4>50.
            @la_display($module, 'sistema1')</h4>
          
            @la_display($module, 'comentarios50')
          
            <h2 style="color: #48B0F7;">Calificación Final</h2>
            @la_display($module, 'calfinal')
          

 </p>

				
				
			
</body>
</html>