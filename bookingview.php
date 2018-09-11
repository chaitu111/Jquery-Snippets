<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <!--[if IE]>
      <meta http-equiv="x-ua-compatible" content="IE=9" />
      <![endif]-->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Book Now</title>
      <meta name="description" content="One of the best laundry services in Hyderabad">
      <meta name="keywords" content="One of the best laundry services in Hyderabad">
      <meta name="author" content="">
      <!-- ==============================================
         Favicons
         =============================================== -->
      <link rel="icon" type="image/icon" href="<?php echo base_url() ?>assets/frontend/images/favicon.jpeg">
      <!-- ==============================================
         CSS VENDOR
         =============================================== -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/css/vendor/bootstrap.min.css" />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/css/vendor/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/css/vendor/simple-line-icons.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/css/vendor/owl.carousel.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/css/vendor/owl.theme.default.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/css/vendor/magnific-popup.css">
      <link href="https://fonts.googleapis.com/css?family=Corben" rel="stylesheet">
      <!-- ==============================================
         Custom Stylesheet
         =============================================== -->
      <link rel="stylesheet" type="text/css" href=" "/>
      <!--<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/css/animations.css" />-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/css/style.css" />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/frontend/css/menu.css" />
      <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/vendor/modernizr.min.js"></script>
      <style>
		.table-bordered .btn-blockqty input {
		width: 15% !important;
		}
	  </style>
   </head>
   <body>
      <?php include('menu.php') ?>
      <div class="section pad">
      <div class="container">
         <div class="row">
            <div class="col-sm-12 col-md-12">
               <h2 class="section-heading"> Piece Wise First Class Wash </h2>
            </div>
         </div>
      </div>
	  
	  
	  <?php 
	  echo '<pre>'; print_r($first_class_clothes); echo '</pre>'; 
	  //echo '<pre>'; print_r($_SESSION['cart']); echo '</pre>';
	  //echo $_SESSION['ct'];
	  ?>
	  
      <table class="table table-bordered">
         <thead>
            <tr>
               <td class="text-center">
                  Image
               </td>
               <td class="text-center">
                  Product Details
               </td>
               <td class="text-center">
                  Quantity
               </td>
               <td class="text-center">
                  Price
               </td>
               <td class="text-center">
                  Total
               </td>
               <td class="text-center">
                  Action
               </td>
            </tr>
         </thead>
         <tbody>
		    <?php
			foreach($first_class_clothes as $k => $v)
			{
			?>
				<?php	
				//echo  $_SESSION['cart'][$k]['quantity'].'====';
				
				if(isset($_SESSION['cart']))
				{
					$prdqty       = (isset($_SESSION['cart'][$k+1]) ? $_SESSION['cart'][$k+1]['quantity']:0);
					$single_price = (isset($_SESSION['cart'][$k+1]) ? $_SESSION['cart'][$k+1]['product_cost']:0);
					$total_price  = (isset($_SESSION['cart'][$k+1]) ? $_SESSION['cart'][$k+1]['total_cost']:0);
					$cart_total   = (isset($_SESSION['cart']['ct']) ? $_SESSION['cart']['ct']:0);
				}
				else
				{
					$prdqty      =  0;
					$cart_total  =  0;
					$total_price = $single_price * $prdqty;
				}
			?>	   
            <tr>
               <td class="text-center">
                  <img src="<?php echo base_url().'cloth_imgs/'.$v['photo'];?>" alt="Cloth Image" title="Cloth Image" class="img-responsive" width="50px" height="50px">
               </td>
               <td class="text-center">
                  <?=$v['cloth_name'];?>
               </td>
               <td class="text-center">
                  <div class="input-group btn-block btn-blockqty">
                     <input type="text" disabled name="quantity" value="<?=$prdqty?>" size="1" class="form-control " id="qty_<?=$v['id'];?>">
                     <button onclick="increase_by_one('qty_<?=$v['id'];?>','<?=$v['id'];?>');">+</button>
                     <button onclick="decrease_by_one('qty_<?=$v['id'];?>','<?=$v['id'];?>');">-</button>
                  </div>
               </td>
               <td class="text-center" id="single_price_<?=$v['id'];?>">
                  <?=$v['price'];?>             
               </td>
               <td class="text-center fprice" id="total_price_<?=$v['id'];?>">
                  <?=$total_price;?>       
               </td>
               <td class="text-center">
                 <button onclick="remove_item('<?=$v['id'];?>');">X</button>
               </td>
            </tr>
			<?php 
			} 
			?>
            </tr>
         </tbody>
         <tfoot>
            <tr>
               <td colspan="4" class="text-right">
                  <strong>Total Rs:</strong>
               </td>
               <th colspan="2" class="text-left" id="cart_total">
                  <?=$cart_total;?>			  
               </th>
            </tr>
         </tfoot>
      </table>
      <?php include('footer.php') ?>
      <!-- JS VENDOR --> 
      <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/vendor/jquery.min.js"></script> 
      <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/vendor/bootstrap.min.js"></script> 
      <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/vendor/owl.carousel.js"></script> 
      <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/vendor/jquery.superslides.js"></script> 
      <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/vendor/bootstrap-hover-dropdown.min.js"></script> 
      <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/vendor/jquery.magnific-popup.min.js"></script> 
      <!-- sendmail --> 
      <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/script.js"></script> 
      <script>
	  var hotbod = document.querySelector("body");
         function doStuff() {
             hotbod.className += " animate";
         
         }
         
         window.onload = function() {
             doStuff();
         };
      </script> 
      <script type="text/javascript">
         /*global $ */
         $(document).ready(function () {
         
            "use strict";
         
            $('.menu > ul > li:has( > ul)').addClass('menu-dropdown-icon');
            //Checks if li has sub (ul) and adds class for toggle icon - just an UI
         
         
            $('.menu > ul > li > ul:not(:has(ul))').addClass('normal-sub');
            //Checks if drodown menu's li elements have anothere level (ul), if not the dropdown is shown as regular dropdown, not a mega menu (thanks Luka Kladaric)
         
            $(".menu > ul").before("<a href=\"#\" class=\"menu-mobile\">Menu</a>");
         
            //Adds menu-mobile class (for mobile toggle menu) before the normal menu
            //Mobile menu is hidden if width is more then 959px, but normal menu is displayed
            //Normal menu is hidden if width is below 959px, and jquery adds mobile menu
            //Done this way so it can be used with wordpress without any trouble
         
            $(".menu > ul > li").hover(function (e) {
                if ($(window).width() > 943) {
                    $(this).children("ul").stop(true, false).fadeToggle(150);
                    e.preventDefault();
                }
            });
            //If width is more than 943px dropdowns are displayed on hover
         
            $(".menu > ul > li").click(function () {
                if ($(window).width() <= 943) {
                    $(this).children("ul").fadeToggle(150);
                }
            });
            //If width is less or equal to 943px dropdowns are displayed on click (thanks Aman Jain from stackoverflow)
         
            $(".menu-mobile").click(function (e) {
                $(".menu > ul").toggleClass('show-on-mobile');
                e.preventDefault();
            });
            //when clicked on mobile-menu, normal menu is shown as a list, classic rwd menu story (thanks mwl from stackoverflow)
         
         });
      </script>
      
		<script type="text/javascript">
		function increase_by_one(field,rowid) 
		{
			 nr                 = parseInt(document.getElementById(field).value);
			 var increment      = document.getElementById(field).value = nr + 1;
			 var single_price   = $('#single_price_'+rowid).html();
			 var quantity       = $('#qty_'+rowid).val();
			 var total          = single_price * quantity;
			 //alert(quantity);
			 //alert('hi');	 
			 var sum = 0;
					
			   $.ajax
			   ({
					type: "POST",
					data:
					{
					"rowid":rowid,
					"qty":increment,
					"action":"add_to_cart",	
					},
					url: "<?php echo base_url() ?>pcsbooking/cart",
					dataType: "json",
					beforeSend: function()
					{
						//alert('sending');
					},
					success: function(data)
					{
						console.log(data);
						$('#total_price_'+rowid).html(total);
						
						$(".fprice").each(function() 
						{
							var val =  $.trim($(this).text());
							if(val && val != "")
							{
								sum+= parseFloat(val);
							}
							$('#cart_total').html(sum.toFixed(0));
						});					
					},
					error: function(data)
					{
						alert("increment error");
					}
				});
		}
		</script>
	  
		<script type="text/javascript">
		function decrease_by_one(field,rowid) 
		{
			 nr                 = parseInt(document.getElementById(field).value);
			 var single_price   = $('#single_price_'+rowid).html();
			 var quantity       = ($('#qty_'+rowid).val())-1;
			 var total          = single_price * quantity;
			  var sum = 0;
			//alert(total);
			 
			if (nr > 0)
			{
			   var decrement =  document.getElementById(field).value = nr - 1;	
			}
			else if (nr == 0)
			{
				return false;
			}
			else
			{
				var decrement =  document.getElementById(field).value = nr + 1;
			}

			$.ajax
			({
				type: "POST",
				data:
				{
				"rowid":rowid,
				"qty":decrement,
				"action":"add_to_cart",	
				},
				url: "<?php echo base_url() ?>pcsbooking/cart",
				dataType: "json",
				beforeSend: function()
				{
					//alert('sending');
				},
				success: function(data)
				{
					console.log(data);
					$('#total_price_'+rowid).html(total);
					
					$(".fprice").each(function() 
					{
						var val =  $.trim($(this).text());
						if(val && val != "")
						{
							sum+= parseFloat(val);
						}
						$('#cart_total').html(sum.toFixed(0));
					});					
				},
				error: function(data)
				{
					alert("increment error");
				}
			});
		}
		</script>
		   
   
	   <script>
	   function remove_item(rowid) 
	   {
			 var single_price   = $('#single_price_'+rowid).html();
			 var quantity       = 0;
			 var total          = single_price * quantity;
			 var sum = 0;
			  
		   $.ajax
			({
				type: "POST",
				data:
				{
				"rowid":rowid,
				"action":"remove_cart_item",	
				},
				url: "<?php echo base_url() ?>pcsbooking/remove_cart_item",
				dataType: "json",
				beforeSend: function()
				{
					//alert('sending');
				},
				success: function(data)
				{
					console.log(data);
					$('#total_price_'+rowid).html(total);
					$('#qty_'+rowid).val(total);
					
					$(".fprice").each(function() 
					{
						var val =  $.trim($(this).text());
						if(val && val != "")
						{
							sum+= parseFloat(val);
						}
						$('#cart_total').html(sum.toFixed(0));
					});					
				},
				error: function(data)
				{
					alert("increment error");
				}
			});
	   }
	   </script>
   
   </body>
</html>
