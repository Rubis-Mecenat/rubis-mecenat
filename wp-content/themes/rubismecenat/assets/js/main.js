console.log('hello')



    /*------------------------------------*\
        UTILS FUNCS #1
    \*------------------------------------*/
    
    const cl = el => el.classList
    const qs = selector => document.querySelector(selector)
    const qsa = selector => document.querySelectorAll(selector)


    /*------------------------------------*\
        VARIABLES
    \*------------------------------------*/

    const body = document.body
    const page = qs('#primary')
    const mainGrid = qs('#mainGrid')
    const modal = qs('#modal')
    const modal_inner = qs('#modal-inner')


    /*------------------------------------*\
        UTILS FUNCS #2
    \*------------------------------------*/
    const closeModal = () => {
        cl(modal).remove('open');
        bodyUnfixed()
    }
    const openModal = () => {
        cl(modal).add('open');
        bodyFixed()
    }

    const pageLoadingStart = () => {
        if(mainGrid) cl(mainGrid).add('loading');
    }
    const pageLoadingEnd = () => {
        setTimeout( () => {
            if(mainGrid) cl(mainGrid).remove('loading');
        }, 500)
    }
    const bodyFixed = () => {
        if(body) cl(body).add('no-scroll');
    }
    const bodyUnfixed = () => {
        setTimeout( () => {
            if(body) cl(body).remove('no-scroll');
        }, 500)
    }


    document.addEventListener(
        "click",
        event => {
            if ( event.target.closest('.close') 
                || ( ! event.target.closest(".js-load-modal") 
                    && ! event.target.closest("#modal-inner") 
                )
            ) {
                closeModal()
            }
        },
        false
    )