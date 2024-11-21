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

    const page = qs('#primary')
    const mainGrid = qs('#mainGrid')



    /*------------------------------------*\
        UTILS FUNCS #2
    \*------------------------------------*/
    const closeModal = () => {
        cl(modal).remove('open');
    }
    const openModal = () => {
        cl(modal).add('open');
    }

    const pageLoadingStart = () => {
        cl(mainGrid).add('loading');
    }
    const pageLoadingEnd = () => {
        setTimeout( () => {
            cl(mainGrid).remove('loading');
        }, 500)
    }


    document.addEventListener(
        "click",
        event => {
            if ( 
                event.target.closest('.close-modal-btn') || 
                ! event.target.closest(".js-load-modal") 
            )
            {
                closeModal()
            }
        },
        false
    )