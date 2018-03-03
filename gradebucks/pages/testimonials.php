 <div id="comments">
    <?php
    $all_testimonials   = $fn->find_testimonials(); 
     $model   = ' <ul>';

     foreach ($all_testimonials as $key => $trdata){ 
    $model.='<li>
            <article>
              <header>
                <figure class="avatar"><img src="images/avatar.png" alt=""></figure>
                <address>
                By <a href="#">'.$trdata['createdby'].'</a>
                </address>
                <time datetime="'.$trdata['createdon'].'">'.$fn->format_datetime($trdata['createdon']).'</time>
              </header>
              <div class="comcont">
                <p>" '.$trdata['testimony'].'"</p>              
                </div>
            </article>
            <button>Archive</button>
          </li>';


      }
      $model.='</ul>';
      echo $model;
?>

</div>