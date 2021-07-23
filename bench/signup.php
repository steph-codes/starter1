<?php
include('nav.php');
require('user.php');
$obj=new user;
$allstates=$obj->get_state();

//echo '<pre>';
//print_r($allstates);
//echo '</pre>'
?>

  
<!-- Content section -->
  <section class="py-5">
    <div class="container">
      <h3>Sign Up Form</h3>
      
      <?php if(isset($_GET['msg'])){
          echo '<div class="alert alert-danger">' .$_GET['msg'] . '</div>';
      }?>

      
      <form action='insert_reg.php' method='post'>
          <div class='form-group row'>

          <label class='col-md-3'> Business name </label>
          <div class='col-md-9'>
          <input type='text' name='bizname' class='form-control'><br>
</div>

          <label class='col-md-3'> Email </label>
          <div class='col-md-9'>
          <input type='text' name='email' class='form-control'>
</div>

          <br>
          <label class='col-md-3'> Password </label>
          <div class='col-md-9'>
          <input type='password' name='pwd' class='form-control'>
</div>

          <br>
          <label class='col-md-3'> State </label>
          <div class='col-md-9'>
          <select name='bizstate' class='form-control'>
          <?php
          foreach($allstates as $s){
            $statename=$s['state_name'];
            $stateid=$s['state_id'];
            echo "<option value='$stateid'> $statename</option>";
          }
            ?>  
          </select>
</div>
             <div class='container'>
              <div class='row'>
                <div class='col-md-12'> Specializations</div>
          
          <div class='form-group row'>
                    <label class='col-md-3'>Agriculture
          <input type='checkbox' name="sector[]" value='1'>
          </label>

                      <label class='col-md-3'> Fashion
          <input type='checkbox' name="sector[]" value='2'>
          </label>

                      <label class='col-md-3'>Construction
          <input type='checkbox' name="sector[]" value='3'>
          </label>

                      <label class='col-md-3'> Banking/finance
          <input type='checkbox' name="sector[]" value='4'>
          </label>
        </div>
      </div>

</div>


          <button class='btn btn-primary'> Register</button>
          <button class='btn btn-warning' onclick="document.location.href='index.php'"> Cancel</button>
</div>
      </form>
      </div>

</section>
<?php
include('footer.php')
?>
       


