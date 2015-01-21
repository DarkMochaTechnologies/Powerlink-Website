
    <div class ="carousel-custom">
        <div><img src ="<?=base_url()?>application/public/img/main/admin_background.jpg" class="c-images"/> </div>
        <div><img src ="<?=base_url()?>application/public/img/main/bms_background.jpg" class="c-images"/> </div>
         <div><img src ="<?=base_url()?>application/public/img/main/admin_background2.jpg" class="c-images"/> </div>
         <ul class="slick-dots" style="display:block;">
           <li class><button type="button" data-role="none">1</button></li>
            <li class><button type="button" data-role="none">2</button></li>
             <li class><button type="button" data-role="none">3</button></li>
         </ul>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.carousel-custom').slick({
              dots: true,
              infinite: true,
              speed: 500,
              fade: true,
              slide: 'div',
              cssEase: 'linear'
            });
        });
    </script>
        