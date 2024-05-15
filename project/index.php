<?php 

    # database connection file
	include 'db.conn.php';

	# fetching images
	$sql  = "SELECT img_name FROM
	         images ORDER BY id DESC";

	$stmt = $conn->prepare($sql);
	$stmt->execute();

	$images = $stmt->fetchAll();

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Portfolio</title>


      <!--  <style></style>-->

        

        <!-- font awesome cdn link -->
         <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css  ">

           <!-- swiper css link -->
           <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
          
         <!-- custom css file link -->
         <link rel="stylesheet" href="css/style.css">

         

</head>
<body>


<div class="container">

<?php @include 'header.php';  ?>

<!----------------------------------------Form Start------------------------------------------>

<form method="post" 
	      action="upload.php"
	      enctype="multipart/form-data">

	    <?php  
            if (isset($_GET['error'])) {
            	echo "<p class='error'>";
            	    echo htmlspecialchars($_GET['error']);
            	echo "</p>";
            }
	    ?>

		<input type="file"
		       name="images[]"
		       multiple>

		<button type="submit"
		        name="upload">
		    Upload</button>
	</form>

    <?php if ($stmt->rowCount() > 0) { ?>
	<div class="gallery">
		<h4>All Images</h4>
		<?php foreach ($images as $image) { ?>
		   <img src="uploads/<?=$image['img_name']?>">
		<?php } ?>
	</div>
	<?php } ?>
<!----------------------------------------Form END------------------------------------------>






<?php @include 'footer.php';  ?>
















 <!-- custom js link -->
 
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>



 <!-- custom js file link -->
<script src="js/script.js"></script>


</body>
</html>