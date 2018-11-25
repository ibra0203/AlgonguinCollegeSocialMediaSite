<?php 
include 'helpers/validation.php';

## declares database as $db
include 'shared/db.php';



include 'shared/header.php';
?>

<div class="section hero is-fullheight">
  <div class="container">
    <div class="column is-7 is-offset-2 has-text-left">
    <h1 class="title is-1 has-text-centered">My Friends</h1>
      <?php  include 'shared/welcome.php' ;?>
      </div>  <!-- COLUMN -->

<div class="columns is-5">
    <div class="column has-background-grey-lighter">
    <h2 class="subtitle "> Friends:</h2> 
        
        <table class="table is-fullwidth">
            <thead>
              <tr>
                <th><i class="fa fa-user"></i>&nbsp;Name</th>
                <th><i class="far fa-images"></i>&nbsp;Shared Albums</th>
                <th><i class="fas fa-user-minus"></i>&nbsp;Unfriend</th>
              </tr>
            </thead>
            <tbody>
            <tr>
              <!-- POPULATE TABLE HERE -->
              <th> <a href="">Mike Jones</a> </th>
              <th> 3</th>
              <th> <input type="checkbox"></th></tr>
            </tbody>
        </table>   
        <div class="control has-text-right">
          <input
            class="button is-danger "
            type="submit" value="Unfriend Selected" name="unfriend" >        
        </div>
  </div>
      

      
  <div class="column has-background-light">
        <h2 class="subtitle "> Friends Requests:</h2> 
        <table class="table is-fullwidth">
            
            <thead>
              <tr>
                <th><i class="fa fa-user"></i>&nbsp;Name</th>
                <th><i class="fas fa-user-minus"></i>&nbsp;Accept or Deny</th>
              </tr>
            </thead>
            <tbody>
              <!-- POPULATE TABLE HERE -->
              <th> <a href="">Mike Jones</a> </th>
              <th> <input type="checkbox"></th></tr>
            </tbody>
        </table>
        <div class="control has-text-right">
          <input
            class="button is-success "
            type="submit" value="Accept Selected" name="accept" >
          <input
          class="button is-danger "
          type="submit" value="Deny Selected" name="deny" >          
        </div>
  </div>
</div>        
  

    
  </div>    <!-- CONTAINER -->
</div>      <!-- HERO -->



<!-- FOOTER -->
<?php include 'shared/footer.php'; ?>