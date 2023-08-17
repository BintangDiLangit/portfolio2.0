jQuery(document).ready(function($) {


$('#social-navigation ul li.search-menu a').click(function(event) {
    event.preventDefault();
    $(this).toggleClass('search-active');
    $('#social-navigation #search').fadeToggle();
    $('#social-navigation .search-field').focus();
});

$('#workart_featured_slider_section').slick({
        responsive: [
            {
                breakpoint: 1024,
                    settings: {
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 567,
                    settings: {
                    slidesToShow: 1,
                    arrows: false
                }
            }
        ]
    });
  


/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});