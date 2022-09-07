<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            autoplay:true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });

        // Content-editable work start
        $('.grid-boxes').on('focusout', '.item a h3', function(e) {
            e.preventDefault();
            let ID = $(this).data('id');
            let text = $(this).text();
            // alert(text);
            $.ajax({
                url: 'update.php',
                type: 'post',
                data: {
                    id: ID,
                    text: text
                },
                success: function(result) {
                    // alert(result);
                    $('.txt-center').text(result);
                    $('.item a h3').prop('contenteditable', false);
                    $('header a').focus();
                    setTimeout(() => {
                        $('.msg').text('');
                        $('.item a h3').prop('contenteditable', true);
                    }, 2500);
                }
            });
        });
        // Content-editable work Ends

        // Delete Box Start
        $('.grid-boxes').on('click', '.item .close', function() {
            let del = $(this).siblings().find('h3').data('id');

            $.ajax({
                url: 'delete.php',
                type: 'post',
                data: {
                    del: del
                },
                success: function(res) {
                    $('.msg').text(res);
                    $('.msg').addClass('del');
                    setTimeout(() => {
                        $('.msg').text('');
                        $('.msg').removeClass('del');
                    }, 1500);
                    setTimeout(() => {
                        location.reload();
                        // $(".grid-boxes").load(location.href + " .grid-boxes");
                    }, 1650);
                }
            });
        });
        // Delete Box Ends

        // Add Box-Content Start
        $(':file').on('change', function(){
            let file = this.files[0];
            if(file.size > 300000){
                console.log(file.size);
                $(this).val('');
                $('.msg').text('File size must be lower than 300kb').css('color','green');
                setTimeout(() => {
                    $('.msg').text('');
                    $('.msg').removeAttr('style');
                }, 1800);
            }else{
                console.log(file, ' ~ ',file.size);
            }
        });

        $('#myForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: 'insert.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#myForm').css("opacity", ".5");
                },
                success: function(response) {
                    $('.msg').text(response);
                    $('#myForm').css("opacity", "");
                    setTimeout(() => {
                        // window.location.href = 'index.php';
                    }, 1500);
                }
            });


        });
        // Add Box-Content Ends

    });
</script>