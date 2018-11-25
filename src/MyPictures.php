<?php 
include 'helpers/validation.php';
include 'shared/db.php';


include 'shared/header.php';
?>
<style>
  .scrolling-wrapper {
  /* overflow-x: ; */
    overflow-y: scroll;
    white-space: nowrap;
    max-height: 350px;
    padding: 1em;
    border-radius: 10px;
    /* margin: -5px; */
  }

  .horitonal-scroll-wrapper {
    max-width: 100%;
    overflow-x: scroll;
  }
</style>

<div class="section hero is-fullheight">
  <div class="container">
    <div class="column is-6 is-offset-2 has-text-left">
    <h1 class="title is-1 has-text-centered"> <b> USER's  </b> Pictures</h1>
    <hr>
  </div>  <!-- COLUMN -->


    <div class="columns is-2">
      <div class="column is-8">
      <img src="https://via.placeholder.com/800x500.png/09f/fff" alt="">
      <br>
      <br>
      <div class="tile is-parent horizonal-scroll-wrapper">
        <div class="tile is-child">
            <img src="https://via.placeholder.com/100x100.png/09f/fff" alt="">
        </div>

        <div class="tile is-child">
            <img src="https://via.placeholder.com/100x100.png/09f/fff" alt="">
        </div>

        <div class="tile is-child">
            <img src="https://via.placeholder.com/100x100.png/09f/fff" alt="">
        </div>

        <div class="tile is-child">
            <img src="https://via.placeholder.com/100x100.png/09f/fff" alt="">
        </div>

        <div class="tile is-child">
            <img src="https://via.placeholder.com/100x100.png/09f/fff" alt="">
        </div>
        
      
      </div>
      </div>
      <div class="column ">
      <div class="">
      <h2 class="title is-5"> Description:</h2>
        <p class="">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea eos corrupti tenetur porro optio quos eveniet impedit, consectetur magnam repudiandae, error ullam soluta accusantium doloremque aliquam saepe temporibus, provident ipsa?
        </p>
        <hr>
      </div>

    <h2 class="title is-5"> Comments:</h2>
    <div class="scrolling-wrapper has-background-light">
        
            <div class="box "> 
            <a href=""> User <small>  <em> (11/11/1984 )  </em>  </small> </a>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
            </div> 

            <div class="box "> 
            <a href=""> User <small>  <em> (11/11/1984 )  </em>  </small> </a>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
            </div> 

            <div class="box "> 
            <a href=""> User <small>  <em> (11/11/1984 )  </em>  </small> </a>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
            </div> 

            <div class="box "> 
            <a href=""> User <small>  <em> (11/11/1984 )  </em>  </small> </a>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
            </div>   
            
                     
    </div>

    <br>

    <div class="field">
        <textarea class="textarea" placeholder="leave a comment"></textarea>
        </div>
        <div class="control has-text-right">
          <input
            class="button is-success"
            type="submit" value="Add comment" name="unfriend" >        
        </div>
      </div>
  </div>    <!-- CONTAINER -->
</div>      <!-- HERO -->
<?php include 'shared/footer.php'; ?>