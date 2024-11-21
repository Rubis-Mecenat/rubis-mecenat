console.log('hello')

    /*------------------------------------*\
        UTILS FUNCS
    \*------------------------------------*/
    
    const cl = el => el.classList
    const qs = selector => document.querySelector(selector)
    const qsa = selector => document.querySelectorAll(selector)

    const closeModal = () => {
        cl(modal).remove('open');
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