<?php	
	include "dbh.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<!--css-->
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css">
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick-theme.css"> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
		
		<!--scripts-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		 <script src="https://www.google.com/recaptcha/api.js" async defer></script>
		<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js"></script>

</head>
<body>
<h1 style="text-align: center;">Dummy Website </h1>
<br>
<div>
    <div class="container-fluid">
    <!-- load all images in the database and order them from newest to oldest -->
        <div>
            <div class="row" id="result">
                <?php
                    $sql="SELECT * FROM dummy_website ORDER BY id DESC";
                    $result=$conn->query($sql);
                    while($row=$result->fetch_assoc())
                    {
                ?>
                        <div class="col-md-2" style="margin-bottom: 2rem;">
                            <div class="card-deck">
                                <div class="card card-sizing">
                                    <div class="card-sizing">
                                        <img src="<?= $row['image']; ?>" class="card-img-top img-sizing">
                                        <p>
										Title: <?= $row['title']; ?><br>
										Filter: <?= $row['filter']; ?> <br>
										Date: <?= $row['date']; ?> <br>
										Description: <?= $row['description']; ?> 
										</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                ?>
            </div>	
        </div>
    </div>
<div>

<script type="text/javascript">	
	//do this when the document finished loading
	$(document).ready(function() 
	{ 
		$(".product_check").click(function() //do this when one of the filter buttons is clicked
		{	
			//get the information from the button that is clicked and send this information to filter.php where it will be used to filter the data
			var action = 'data';
			var com_type = get_filter_text('com_type');
			
			//use ajax to send the information to filter.php
			$.ajax({
				url:'filter.php',
				method:'POST',
				data:{action:action,com_type:com_type},
				success:function(response)
				{
					$("#result").html(response);	
				}
			});
		});
		
		//get the data from the clicked button and return it 
		function get_filter_text(text_id)
		{
			var filterData = [];
			$('#'+text_id+':checked').each(function()
			{
				filterData.push($(this).val());
			});
			return filterData;
		}
		
		//change the background color of the button when it is active/clicked or not, this is possible thanks the invisible checkbox
		$('.product_label').click(function()
		{
			var input = $(this).children('input');
			if(input.is(":checked"))
			{
				$(input).parent().css('background', 'rgb(140, 41, 255)');
			}
			else
			{
				$(input).parent().css('background', 'rgb(0, 204, 255)');
			}
		});
	});
</script>
</body>
</html>