document.addEventListener('DOMContentLoaded', function() {

    const swiperCarousel = document.querySelectorAll('.swiper.carousel');
    
    swiperCarousel.forEach((slider) => {
        let swiperCarousel = new Swiper(slider, {
            pagination: {
                el: slider.querySelector('.swiper-pagination'),
                type: 'bullets',
                clickable: true,
            },
            navigation: {
                nextEl: slider.querySelector('.swiper-button.next'),
                prevEl: slider.querySelector('.swiper-button.prev'),
                enabled: true,
            },
            breakpoints: {
                // when window width is >= 320px
                320: {
                  slidesPerView: 1.2,
                  slidesPerGroup: 1,
                  spaceBetween: 30
                },
                800: {
                  slidesPerView: 3,
                  slidesPerGroup: 2,
                  spaceBetween: 30
                },
                1400: {
                    slidesPerView: 4,
                    slidesPerGroup: 3,
                    spaceBetween: 30
                }
            }
        });
    });
    



    const swiperContentSplit = document.querySelectorAll('.swiper.content-split');

    swiperContentSplit.forEach((slider) => {
        let swiperCarousel = new Swiper(slider, {
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
            breakpoints: {
                // when window width is >= 320px
                320: {
                  slidesPerView: 1.2,
                  spaceBetween: 20
                },
                // when window width is >= 640px
                800: {
                    slidesPerView: 1,
                    spaceBetween: 56,
                }
            }
        });
    });

    

    const swiperCarouselHorizontal = document.querySelectorAll('.swiper.carousel-horizontal');
    const breakpoint = window.matchMedia('(min-width:920px)');

    swiperCarouselHorizontal.forEach((slider) => {
        const isDesktop = breakpoint.matches;


        let swiperCarousel = new Swiper(slider, {
            slidesPerView: isDesktop ? 1 : 1.5,
            spaceBetween: isDesktop ? 200 : 20,
            speed: 800,
            mousewheel: isDesktop ? {
                invert: false,
                releaseOnEdges: true,
                thresholdDelta: 5,
                thresholdTime: 500,
            } : false,
            navigation: {
                nextEl: slider.querySelector('.swiper-button.next'),
                prevEl: slider.querySelector('.swiper-button.prev'),
                enabled: true,
            },
            pagination: {
                el: slider.querySelector('.swiper-pagination'),
                type: 'bullets',
                clickable: true,
            },
            scrollbar: isDesktop ? {
                el: slider.querySelector('.swiper-scrollbar'),
                draggable: true,
                hide: false,
                snapOnRelease: true,
            } : false
        });

        qsa('.js-slide-trigger').forEach( el => {
            el.addEventListener('click', (event) => {
                console.log('js-slide-trigger', el)
                const index = el.getAttribute('data-slide');
                swiperCarousel.slideTo(index, 600)
            });
        });

        // Update mousewheel behavior on breakpoint change
        const breakpointChecker = function() {
            if (breakpoint.matches) {
                swiperCarousel.params.mousewheel = {
                    invert: false,
                    releaseOnEdges: true,
                    thresholdDelta: 5,
                    thresholdTime: 500,
                };
            } else {
                swiperCarousel.params.mousewheel = false;
            }
            swiperCarousel.update();
        };

        breakpoint.addEventListener('change', breakpointChecker);

    });


    


    /*------------------------------------*\
        SLIDER FOR INSTA FEED
    \*------------------------------------*/

        const sb_instagram = document.querySelector('#sb_instagram');
        const sbi_images = document.querySelector('#sbi_images');

        if(sb_instagram) {
            console.log(sbi_images);

                let sbi_carousel = new Swiper(sbi_images, {
                    spaceBetween: 30,
                    navigation: {
                        nextEl: sb_instagram.querySelector('.swiper-button.next'),
                        prevEl: sb_instagram.querySelector('.swiper-button.prev'),
                    },
                    breakpoints: {
                        320: {
                            slidesPerView: 1.2,
                            slidesPerGroup: 1,
                            spaceBetween: 30
                        },
                        600: {
                            slidesPerView: 2.2,
                            slidesPerGroup: 2,
                            spaceBetween: 30
                        },
                        1000: {
                            slidesPerView: 4.5,
                            slidesPerGroup: 3,
                            spaceBetween: 30
                        }
                    }
                });

                console.log(sbi_carousel);
        }




});