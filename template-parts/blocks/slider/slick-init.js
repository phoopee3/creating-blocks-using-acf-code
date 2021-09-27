jQuery( '.slider-gallery' ).slick({
    dots: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    adaptiveHeight: true,
});

jQuery( '.slider-gallery' ).slickLightbox( {
    src: 'src',
    itemSelector: 'li a img'
} );