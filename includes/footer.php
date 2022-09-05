
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                dots:false,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
            });
            // $('.slider').mouseenter(function(){
            //     $('.owl-carousel .owl-nav .owl-prev,.owl-carousel .owl-nav .owl-next').removeClass('slideOut');
            //     $('.owl-carousel .owl-nav .owl-prev,.owl-carousel .owl-nav .owl-next').addClass('slideIn');
            // });
            // $('.slider').mouseleave(function(){
            //     $('.owl-carousel .owl-nav .owl-prev,.owl-carousel .owl-nav .owl-next').removeClass('slideIn');
            //     $('.owl-carousel .owl-nav .owl-prev,.owl-carousel .owl-nav .owl-next').addClass('slideOut');
            // });

            // Content-editable work start
            // $('.grid-boxes').on('mouseleave', '.item', function(e){
            //     e.preventDefault();
            //     let ID = $(this).children('a').data('id');
            //     let text = $(this).find('h3').text();
            //     // alert(text);
            //     $.ajax({
            //         url: 'update.php',
            //         type: 'post',
            //         data: {id:ID,text:text},
            //         success:function(result){
            //             alert(result);
            //         }
            //     });
            // });
            // Content-editable work Ends


            // Content-editable work start
            $('.grid-boxes').on('focusout', '.item a h3', function(e){
                e.preventDefault();
                let ID = $(this).data('id');
                let text = $(this).text();
                // alert(text);
                $.ajax({
                    url: 'update.php',
                    type: 'post',
                    data: {id:ID,text:text},
                    success:function(result){
                        // alert(result);
                        $('.txt-center').text(result);
                        $('.item a h3').prop('contenteditable',false);
                        $('header a').focus();
                        setTimeout(() => {
                            $('.msg').text('');
                            $('.item a h3').prop('contenteditable',true);
                        }, 2500);
                    }
                });
            });
            // Content-editable work Ends

            // Delete Box Start
            $('.grid-boxes').on('click','.item .close',function(){
                let del = $(this).siblings().find('h3').data('id');
                
                $.ajax({
                    url: 'delete.php',
                    type: 'post',
                    data: {del:del},
                    success:function(res){
                        $('.msg').text(res);
                        $('.msg').addClass('del');
                        setTimeout(() => {
                            $('.msg').text('');
                            $('.msg').removeClass('del');
                        }, 1500);
                        setTimeout(() => {
                            // $('.grid-boxes').load();
                                location.reload(); 
                                // $(".grid-boxes").load(location.href + " .grid-boxes");
                            }, 1650);
                    } 
                });
            });
            // Delete Box Ends

            // Add User Start
            $('#myForm').on('submit',function(e){
                e.preventDefault();
                
                let data = $(this).serialize();
                // console.log(data);
                $.ajax({
                    url: 'insert.php',
                    type: 'post',
                    data: data,
                    success: function(res){
                        $('.msg').text(res);
                        setTimeout(() => {
                            window.location.href="index.php";
                        }, 1500);
                    }
                })
            });
            // Add User Ends

        });
    </script>