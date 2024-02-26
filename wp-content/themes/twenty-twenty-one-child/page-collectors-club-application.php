<?php
/*
Template Name: Collector Club Application
*/
?>

<?php 

if(isset($_POST['submitted'])){
	$response = apply_filters('submit_club_member_registration_form', $_POST);
}

if(isset($_GET['return_url']) && !empty($_GET['return_url']))
{
	$return_url = urldecode($_GET['return_url']);
	$return_url_data = explode('/',$return_url);
	$wallet_address = $return_url_data[6];
	$artwork_id = $return_url_data[4]; 
	// var_dump(explode('/',$return_url));
}
get_header(); 
?>

	<div id="container" style="margin-top:0;">
		<div id="content">
			<?php the_post() ?>
			<div id="post-<?php the_ID() ?>" class="post">
				<div class="entry-content">
				<h1><?php the_title() ?></h1>
				
				<?php if(isset($response) && empty($_GET['return_url'])){ ?>
					<?php if($response['status'] == true) { ?>
						<?php // header("Location: ".$_POST['return_url'] ); ?>
						<h3>Member verification</h3>
						<p>
							Thanks, <strong><?=$_POST['first_name']?>,</strong> We will verify your account in 24 hour. you will be notify through your email address. 
						</p>
						<div class="row>
							<div class="col-6">
							
							</div>
							<div class="col-6">
							
							</div>
						</div>
					<?php } else if($response['status'] == false) { ?>
						<p class="error"><?php echo $response['message']; ?><p>
					<?php }else{ ?>
						<p class="error">Sorry, something went wrong! Please try again later.<p>
					<?php } ?>
				<?php }else{ ?>
							
				<form id="affiliateForm" method="post" enctype="multipart/form-data" >						
						<div class="tab">
							<div class="txt">I have read and accept</div>
							<div class="checkgroup">
								<input type="checkbox" id="check1" name="check1" required/> 
								<label class="forcheck" for="check1">The club articles,</label>
							</div>
							<div class="checkgroup">
								<input type="checkbox" id="check2" name="check2" required/>
								<label class="forcheck" for="check2">The respectful communications policy, and</label>
							</div>
							<div class="checkgroup">
								<input type="checkbox" id="check3" name="check3" required/>
								<label class="forcheck" for="check3">The privacy policy,</label>		
							</div>
							<div class="txt">I understand there are neither sign-up nor membership fees, and I hereby wish to apply for membership in <a href="#">Friends of Dodo</a> <a href="#">High Art by Humans</a> <a href="#">Collectors Club</a></div>								
							
							<div style="text-align:right; margin-top:20px;">						  
								<button type="button" class="next">Next</button>
							</div>

						</div>
						<!-- Tab 1 -->
						<div class="tab"><h5>About you</h5>
						  <p>
							<input type="hidden" name="artwork_id" id="artwork_id" value="<?php if(isset($artwork_id))  echo $artwork_id;?>" />
							<input type="hidden" name="wallet_address" id="wallet_address" value="<?php if(isset($wallet_address))  echo $wallet_address;?>" />
							<input type="hidden" name="return_url" id="return_url" value="<?php if(isset($return_url))  echo $return_url;?>" /> 
							<label>First Name</label>
							<input type="text" name="first_name" placeholder="First Name"  class="required" value="<?php if(isset($_POST['first_name']))  echo $_POST['first_name'];?>" required />
							<?php if($first_name_Error != '') { ?>
								<span class="error"><?=$first_name_Error;?></span>
							<?php } ?>
						  </p>
						  <p>
							<label>Last Name</label>
							<input type="text" name="last_name" placeholder="Last Name"  class="required" value="<?php if(isset($_POST['last_name']))  echo $_POST['last_name'];?>" required/>
							<?php if($last_name_Error != '') { ?>
								<span class="error"><?=$last_name_Error;?></span>
							<?php } ?>
						  </p>
						  <p>
							<label>Your pronouns</label>
							<input type="text" name="pronouns" placeholder="Your pronouns"  class="required" value="<?php if(isset($_POST['pronouns']))  echo $_POST['pronouns'];?>" required/>
							<?php if($pronouns_Error != '') { ?>
								<span class="error"><?=$pronouns_Error;?></span>
							<?php } ?>
						  </p>
						  <p>
							<label>Your Email Address</label>
							<input type="email" name="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required"  required />
							<?php if($email_Error != '') { ?>
								<span class="error"><?=$email_Error;?></span>
							<?php } ?>
						  </p>
						  
						  
						  <div style="text-align:right; margin-top:20px;">
							<button type="button" class="previous">Previous</button>						  
							<button type="button" class="next">Next</button>
						  </div>
						  
						</div>
						
						<!-- Tab 2 -->
						<div class="tab"><h5>Please upload proof of ID.</h5>
						  <p><label>Accepted png, jpg and PDF format only</label><input type="file" name="id_proof_image" value="" required></p>
						  
						  
						    <div class="accordion-container">							 
							  <div class="set">
								<a href="javascript:;"> Why is this required? </a>
								<div class="content">
								  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
								</div>
							  </div>
							  <div class="set">
								<a href="javascript:;"> What is a proof of ID? </a>
								<div class="content">
								  <p> Aliquam cursus vitae nulla non rhoncus. Nunc condimentum erat nec dictum tempus. Suspendisse aliquam erat hendrerit vehicula vestibulum.</p>
								</div>
							  </div>
							  
							  <div class="set">
								<a href="javascript:;"> What are you doing with my data?</a>
								<div class="content">
								  <p> Aliquam cursus vitae nulla non rhoncus. Nunc condimentum erat nec dictum tempus. Suspendisse aliquam erat hendrerit vehicula vestibulum.</p>
								</div>
							  </div>
							</div>
						  
						  
						  <div style="text-align:right; margin-top:20px;">						  
							<button type="button" class="previous">Previous</button>
							<button type="button" class="next">Next</button>
						  </div>
						  
						</div> 

						<!-- Tab 3 -->
						<div class="tab"><h5>Please upload proof of address</h5>
						  <p><label>Accepted png, jpg and PDF format only</label><input type="file" name="address_proof_image" value="" required></p>
						  
						  <div class="accordion-container">							 
							  <div class="set">
								<a href="javascript:;"> Why is this required? </a>
								<div class="content">
								  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
								</div>
							  </div>
							  <div class="set">
								<a href="javascript:;"> What is a proof of address? </a>
								<div class="content">
								  <p> Aliquam cursus vitae nulla non rhoncus. Nunc condimentum erat nec dictum tempus. Suspendisse aliquam erat hendrerit vehicula vestibulum.</p>
								</div>
							  </div>
							  
							  <div class="set">
								<a href="javascript:;"> What are you doing with my data?</a>
								<div class="content">
								  <p> Aliquam cursus vitae nulla non rhoncus. Nunc condimentum erat nec dictum tempus. Suspendisse aliquam erat hendrerit vehicula vestibulum.</p>
								</div>
							  </div>
							</div>
						  						  
						  <div style="text-align:right;  margin-top:20px;">						  
							<button type="button" class="previous">Previous</button>
							<button type="submit" class="next">Submit</button>
						  </div>						
						  <input type="hidden" name="submitted" id="submitted" value="true" />
						</div>
						</form>
						
				<?php } ?>
				
				</div><!-- .entry-content ->
			</div><!-- .post-->
		</div><!-- #content -->
	</div><!-- #container -->
	<script>
		
$(document).ready(function(){
	var current = 1,current_step,next_step,steps;
	steps = $(".tab").length;
	$(".next").click(function(){
		if($("#affiliateForm").valid())
	   {          
		current_step = $(this).parents('.tab');
		next_step = $(this).parents('.tab').next();
		next_step.show();
		current_step.hide();
		setProgressBar(++current);		
	   }
	});
	$(".previous").click(function(){
		current_step = $(this).parents('.tab');
		next_step = $(this).parents('.tab').prev();
		next_step.show();
		current_step.hide();
		setProgressBar(--current);
	});
	setProgressBar(current);
	// Change progress bar action
	function setProgressBar(curStep){
		var percent = parseFloat(100 / steps) * curStep;
		percent = percent.toFixed();
		$(".progress-bar")
			.css("width",percent+"%")
			.html(percent+"%");		
	}	   
	  
});


$(document).ready(function () {
	$(".next").click(function() {
		
    $('#affiliateForm').validate({
      rules: {
        name: {
          required: true
        },
        email: {
          required: true,
          email: true
        }
      },
      messages: {
        first_name: 'Please enter First Name.',
		last_name: 'Please enter Last Name.',
		pronouns: 'Please enter Pronouns.',
        email: {
          required: 'Please enter Email Address.',
          email: 'Please enter a valid Email Address.',
        }
      },
      submitHandler: function (form) {
        form.submit();
      }
    });
	
	$("html, body").animate({
            scrollTop: 0
        }, 1000);
	
	});
	
  });
  
  
  $(document).ready(function() {
  $(".set > a").on("click", function() {
    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      $(this)
        .siblings(".content")
        .slideUp(200);
      $(".set > a i")
        .removeClass("fa-minus")
        .addClass("fa-plus");
    } else {
      $(".set > a i")
        .removeClass("fa-minus")
        .addClass("fa-plus");
      $(this)
        .find("i")
        .removeClass("fa-plus")
        .addClass("fa-minus");
      $(".set > a").removeClass("active");
      $(this).addClass("active");
      $(".content").slideUp(200);
      $(this)
        .siblings(".content")
        .slideDown(200);
    }
  });
});
  
	</script>
	
<?php get_footer() ?>