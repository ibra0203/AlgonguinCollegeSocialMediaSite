<?php 
include 'helpers/validation.php';



include 'shared/header.php';
?>

<div class="section hero is-fullheight">
  <div class="container">
  <h1 class="title is-1 has-text-centered">Course Selection</h1>
  <hr>
  <h3 class="subtitle is-6"> 
    Welcome <b> NAME  </b> not you? change user <a href="">here</a>
   </h3>

   <h3 class="subtitle "> 
    You have registered for  <b> HOURS  </b> for the selected semester
   </h3>

   <h3 class="subtitle is-6"> 
    You can register for  <b> NUMBER  </b> more hours of course(s) this semester
   </h3>

   <h2 class="subtitle is-6"> 
    Please note the courses you have registered for displayed to the list
   </h2>
  <hr>
  
      <div class="column is-5 is-offset-3 has-text-left">

      <form action="<?php echo $_SERVER['PHP_SELF']?>"
             method="POST" 
             class="inputForm"
             >
      
            
      </form>
      </div> 
    </div>

</div>

<?php 
include 'shared/footer.php';
?>