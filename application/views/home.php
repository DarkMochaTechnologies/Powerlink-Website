
    <div class ="carousel-custom">
        <div>
          <img src ="<?=base_url()?>application/public/img/main/carousel-1.jpg" class="c-images"/>
        </div>
        <div><img src ="<?=base_url()?>application/public/img/main/carousel-2.jpg" class="c-images"/> </div>
         <div><img src ="<?=base_url()?>application/public/img/main/carousel-3.jpg" class="c-images"/> </div>

    </div>
    <div class = "container" id="height-adjust">
      <div class = "row">
        <div class = "home-header">Recent Activities</div>
      </div>
          <div class="row home-item">
            <div class = "col-xs-5">
              <a href = "#">
                <img src ="<?=base_url()?>application/public/img/main/carousel-1.jpg" class="ra-images"/>
              </a>
            </div>
            <div class = "col-xs-1"></div>
            <div class = "col-xs-5">
              <a href = "#">
                <img src ="<?=base_url()?>application/public/img/main/carousel-2.jpg" class="ra-images"/>
              </a>
            </div>
          </div>
          <div class="row home-item">
            <div class = "col-xs-5">
              <a href = "#">
                <img src ="<?=base_url()?>application/public/img/main/carousel-3.jpg" class="ra-images"/>
              </a>
            </div>
            <div class = "col-xs-1"></div>
            <div class = "col-xs-5">
              <a href = "#">
                <img src ="<?=base_url()?>application/public/img/main/carousel-1.jpg" class="ra-images"/>
              </a>
            </div>
          </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.carousel-custom').slick({
              dots: true,
              infinite: true,
              speed: 1,
              fade: true,
              slide: 'div',
              cssEase: 'linear'
            });
        });
    </script>
        