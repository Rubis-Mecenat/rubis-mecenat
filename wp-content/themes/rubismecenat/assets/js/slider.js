document.addEventListener('DOMContentLoaded', function() {

    const swiperCarousel = document.querySelectorAll('.swiper.carousel');
    
    swiperCarousel.forEach((slider) => {
        let swiperCarousel = new Swiper(slider, {
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
            breakpoints: {
                // when window width is >= 320px
                320: {
                  slidesPerView: 1.2,
                  spaceBetween: 20
                },
                // when window width is >= 640px
                800: {
                  slidesPerView: 2.5,
                  spaceBetween: 30
                },
                1400: {
                    slidesPerView: 3.5,
                    spaceBetween: 30
                  }
              }
        });
    });


    const swiperContentSplit = document.querySelectorAll('.swiper.content-split');

    swiperContentSplit.forEach((slider) => {
        let swiperCarousel = new Swiper(slider, {
            slidesPerView: 1,
            spaceBetween: 56,
            speed: 600,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            on: {
                click() {
                    swiperCarousel.slideTo(this.clickedIndex);    
                },
            },
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
            scrollbar: {
                el: slider.querySelector('.swiper-scrollbar'),
                draggable: true,
                hide: false,
                snapOnRelease: true,
            }
        });

        qsa('.js-slide-trigger').forEach( el => {
            el.addEventListener('click', (event) => {
                console.log('js-slide-trigger', el)
                const index = el.getAttribute('data-slide');
                swiperCarousel.slideTo(index, 600)
            })
        })

    });


    


});
