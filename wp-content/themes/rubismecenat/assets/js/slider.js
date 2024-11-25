document.addEventListener('DOMContentLoaded', function() {

    const swiperCarousel = document.querySelectorAll('.swiper.carousel');
    
    swiperCarousel.forEach((slider) => {
        let swiperCarousel = new Swiper(slider, {
            slidesPerView: 2.5,
            spaceBetween: 30,
            // pagination: {
            //     el: slider.querySelector('.swiper-pagination'),
            //     type: 'custom',
            //     renderCustom: function (swiper, current, total) {
            //         const formatNumber = (number) => number.toLocaleString('fr-FR', { minimumIntegerDigits: 2, useGrouping: false });
            //         return formatNumber(current) + ' - ' + formatNumber(total); 
            //     }
            // },
            navigation: {
                nextEl: slider.querySelector('.swiper-button.next'),
                prevEl: slider.querySelector('.swiper-button.prev'),
                enabled: true,
            },
        });
    });


    const swiperContentSplit = document.querySelectorAll('.swiper.content-split');

    swiperContentSplit.forEach((slider) => {
        let swiperCarousel = new Swiper(slider, {
            slidesPerView: 1.25,
            spaceBetween: 56,
        });
    });


    const swiperCarouselHorizontal = document.querySelectorAll('.swiper.carousel-horizontal');

    swiperCarouselHorizontal.forEach((slider) => {
        let swiperCarousel = new Swiper(slider, {
            slidesPerView: 1,
            spaceBetween: 200,
            speed: 800,
            mousewheel: {
                invert: false,
                releaseOnEdges: true,
                thresholdDelta: 5,
                thresholdTime: 500,
            },
            navigation: {
                nextEl: slider.querySelector('.swiper-button.next'),
                prevEl: slider.querySelector('.swiper-button.prev'),
                enabled: true,
            },
        });
    });

    


});
