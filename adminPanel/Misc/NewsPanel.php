<html>

<head>
    <title>Admin Panel - Identity Fraud</title>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="../Admin.css">
      <script src="../../scripts/functions.js"></script>    
      <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Oxygen:wght@300;400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>

<body>
    <?php include("../adminHome.php"); ?>
    <div class="admininfo">
        <h1>Add News Article</h1>
        <form id="news_form" onsubmit="erro_news(event)" enctype="multipart/form-data" style="height: auto;">
      <h5>
        <p>
          <input type="text" name="Title" class="inputtext" size="50" max="20" placeholder="Title" required> | <input type="date" name="DateOfCreation" class="inputtext" style="width: 150px" required><br>
        </p>
        <p>
        <input type="text" name="Description" size="50" class="inputtext" max="500" placeholder="Description" required> | 

        <span class="upload-container">
          <label for="file-upload" class="custom-file-upload">
            <i class="fa fa-cloud-upload"></i> Add Image
          </label>
          <input id="file-upload" type="file" name="Image"></input>
          <img id="preview" src="#" alt="Preview"></img>
        </span>

        </p>
        <p>Categoria:       
            <input type="radio" id="Op1" name="Cat" value="MV">Mais Vistas
            <input type="radio" id="Op2" name="Cat" value="DE">Destaque
            <input type="radio" id="Op3" name="Cat" value="DR">Drama
            <input type="radio" id="Op3" name="Cat" value="NC">NoticiasDaCasa
        </p>

         <p><span id="erro" style="color: red; font-size: 15px;"></span> </p>

       <input class="actionbutton" type="submit" value="Add">
      </h5>
    </form>
    <hr>
</div>
</body>
<script> 
  document.getElementById("file-upload").addEventListener("change", 
    function(event) 
    { 
      const file = event.target.files[0]; 
      const preview = document.getElementById("preview"); 
      if (file) { 
        const reader = new FileReader(); 
        
        reader.onload = function(e) { 
          preview.src = e.target.result; 
          preview.style.display = "block"; 
          } 
          
        reader.readAsDataURL(file); 
      } else { 
        preview.style.display = "none"; 
        } 
      }); 
</script>
</html>