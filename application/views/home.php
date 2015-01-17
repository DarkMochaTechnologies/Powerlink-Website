
    <div class ="carousel-custom">
        <div><img src ="<?=base_url()?>application/public/img/main/admin_background.jpg"/> </div>
        <div><img src ="<?=base_url()?>application/public/img/main/bms_background.jpg"/> </div>
         <div><img src ="<?=base_url()?>application/public/img/main/admin_background2.jpg"/> </div>
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
        