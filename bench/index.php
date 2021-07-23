<?php
include('nav.php');
include('user.php');

$obj= new user;
$coy= $obj->get_companies();

// echo '<pre>';
// print_r($coy);
// echo '<pre>';
?>

  <!-- Header - set the background image for the header in the line below -->
  <header class="py-5 bg-image-full" style="background-image: url('images/surface.jpg');height:260px;">
   <div class="container" style='margin-top:20px'>
      
          <form action="#" method="post">
            
            <div class="form-group row my-2">
     
     <div class="col-md-7">
                <input class="form-control form-control-lg" name="search" id="idsearch" type="text" placeholder="Type a business name or company to begin your search">
                 
            </div>
 <div class="col-md-2">
              <select name="location" class="form-control">
                <option value="">Select Location</option>
                 <option value="1">Lagos </option>
              </select>
            </div>
             <div class="col-md-3">
                <button class="btn btn-lg btn-block btn-warning">Search</button>
            </div>
             
  </div>


          
    

          </form>
       
   </div>
  </header>

  <!-- Content section -->
  <section class="py-5">
    <div class="container">
      <h1>The Number 1 Business Directory in Nigeria</h1>
      <p class="lead">Enjoy many free benefits; Update your business details and more</p>
      <p>Let the right businesses find you with our Request for Quotation, Let the right businesses find you with our Request for QuotationLet the right businesses find you with our Request for Quotation</p>
    </div>
  </section>

  <!-- Image element - set the background image for the header in the line below -->
  <div class="bg-image-full" style="background-image: url('images/biz.jpg');background-attachment: fixed;">
    <!-- Put anything you want here! There is just a spacer below for demo purposes! -->
    <div style="height: 140px; background-color: rgba(0,0,102,0.7);color:white;">
      <h2 style='text-align:center; line-height: 140px;'>Sign Up Now</h2>
    </div>
  </div>

  <!-- Content section -->
  <section class="py-5">
    <div class="container">
      <h1>Featured Companies</h1>
      <p class="lead">View a list of our verified companies</p>
       

       <div class="row">
        <?php
        foreach($coy as $k=>$val){
        ?>
         
       <div class="col-md-3 featured">
  <img src="images/<?php echo $val['bus_logo'];?>" class="card-img-top logoimg" alt="">
  <div class="card-body">
    <h3> <?php echo $val['bus_name'];?></h3>
    <p class="card-text"><?php if($description==''){echo 'not updated';}else{
      echo $description;}?><code><?php echo $val['state_name'];?></code></p>
  </div>
</div>
<?php
}
?>


       </div>
    </div>
  </section>

 <?php
 include('footer.php');
 ?>
</body>

</html>
