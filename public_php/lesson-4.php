<?php 
function img_php(){
  $images = scandir("img");

  foreach ($images as $value){
              if($value !=='.' && $value !=='..'){
                echo '<a href="/img/' .  ($value) . '" target="_blank"><img src="/img/' .  ($value) . '" width="200" /></a>'."\n";
                
              }
            
            }
}


?>

<html>
  <head>
    <title>Welcome to gb.com!</title>
  </head>
  <body>
  
  

  <h1>Хостинг для изображений</h1>
  <div class="wraper">
  
  <form method="post" action="core/upload.php" enctype="multipart/form-data">
    <input type="file" name="image">
    <button type="submit">Загрузить</button>
  </form>
  
  <div class="img" >
  <p><button class="btn">Модалка</button></p>
  <?php 
   $cfiles = count(array_diff(scandir("img/"), [".", ".."]));
   if($cfiles === 0){
       printf("<p>Файлов нет</p>");
   }
  img_php();
  ?>
  <div class="modal"><div class="modal_content">
    
  <?php 
  $asds = scandir("img");
  foreach($asds as $value){
    if($value !=='.' && $value !=='..'){
      echo '<img src="img/' .  ($value) . '" width="900" />';
    }
  
   
  }
  ?></div></div>
  </div>
  </div>
  
  
  </body>
</html>
<style>
  .modal_content{
    background: #fff;
    height: 100%;
    width:900px;
    z-index: 8;
    margin:300 auto;
    display: grid;
    grid-template-columns: 1fr;
  }
  .modal{
    margin:0 auto;
    z-index: 5;
    position: fixed;
    left:0;
    top:0;
    width: 100%;
    height: 100%;
    display:none;
    background:rgba(0,0,0,0.6);
    overflow:auto;
  }
  h1 {
      display: flex;
      justify-content:center
  }

  
  .wraper{
    background-color:#fff;
    
    display: grid;
    grid-template-columns: 1fr;
    width: 700px;
    margin: 0 auto;
  }
  .img{
    padding:10px;
    }

  

  ul
    {
    list-style-type: decimal;
    }

    form
      {
        display: flex;
        justify-content:center;
      }
      p
      {
        display: flex;
        justify-content:center;
      }
</style>

<script>
       const modal = document.querySelector(".modal");
      const img = document.querySelector(".img");

        img.addEventListener("click",function(e){
        let targetitem =e.target;
        console.log(targetitem);
        if(targetitem.closest(".btn")){
          targetitem.closest(".btn");
          
         modal.style.display = "block";
          }
         
        }
      );
      window.onclick=function(event){
        if(event.target == modal){
           modal.style.display = "none";
        }
      }
      
</script>