(function($){

    /**
     * initializeBlockFaq
     *
     * Adds custom JavaScript to the block HTML.
     *
     * @date    15/4/19
     * @since   1.0.0
     *
     * @param   object $block The block jQuery element.
     * @param   object attributes The block attributes (only available when editing).
     * @return  void
     */
    var initializeBlockFaq = function( $block ) {
        console.log($block)
        $block[0].addEventListener('click', function(e) {
            const faqHeader = e.target.closest('.item-faq__header');
            if(faqHeader) {
                const faq = faqHeader.closest('.item-faq');
                const faqBody = faq.querySelector('.item-faq__body');
                faq.classList.toggle('active');
                $(faqBody).slideToggle(300);
            }
        });
    }

    /**
     * initializeBlockNews
     *
     * Adds custom JavaScript to the block HTML.
     *
     * @date    15/4/19
     * @since   1.0.0
     *
     * @param   object $block The block jQuery element.
     * @param   object attributes The block attributes (only available when editing).
     * @return  void
     */
     var initializeBlockNews = function( $block ) {
        const el = $block[0].querySelector('.slider-news')
        const swiperNews = new Swiper(el, {
            speed: 500,
            grabCursor: true,
            slidesPerView: 2,
            spaceBetween: 30
        });
    }

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=faq', initializeBlockFaq );
        window.acf.addAction( 'render_block_preview/type=news', initializeBlockNews );
    }

})(jQuery);