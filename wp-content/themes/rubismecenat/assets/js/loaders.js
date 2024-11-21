


const initSearchScript = () => {

    console.log('loaders')

    
    /*------------------------------------*\
        VARIABLES
    \*------------------------------------*/

    // ELEMENTS
    const page = qs('main')
    const modal = qs('#modal')
    const modal_inner = qs('#modal-inner')

    // UTILS
    let offset = 0;
    let step = 20;
    let format = '';

    // DATAS
    const data = new FormData();
    const ajaxurl = ajax_datas.ajaxUrl;
    data.set('nonce', ajax_datas.nonce);
    data.set('step', step);
    data.set('offset', offset);
    data.set('format', format);



    /*------------------------------------*\
        UTILS FUNCS
    \*------------------------------------*/
    

    // NOT USED YET
    const displayFoundPosts = async () => {
        setTimeout( () => {
            const nbr = qs('#foundPosts') ? qs('#foundPosts').getAttribute('data-posts') : 0;
            found_posts_label.innerHTML = nbr;

            const rest = nbr > 0 ? nbr - offset - step : 0;
            sec_rest_to_go.innerHTML = rest;

            if( rest <= 0 ) sec_search_more.classList.add('is-hidden');

        }, 500)
    }

     // NOT USED YET
    const fetchAndDisplayDatas = async ( append = false ) => {
        console.log('fetchAndDisplayDatas')

        fetch(ajaxurl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Cache-Control': 'no-cache',
            },
            body: new URLSearchParams(data),
        })
        .then(response => response.json())
        .then(body => {
        
            if (!body.success) {
                return;
            }
        
            if( append ) {
                modal.insertAdjacentHTML('beforeend', body.data); 
            }else {
                modal.innerHTML = body.data; 
            }
        });

    }






    /*------------------------------------*\
      LOADING ONE POST CONTENT IN MODAL
    \*------------------------------------*/

    const fetchAndDisplayPostContent = async ( el ) => {
        console.log('fetchAndDisplayPostContent')

        // DATAS
        data.set('type', el.getAttribute('data-type'));
        data.set('action', 'load_popin');
        data.set('postslug', el.getAttribute('data-slug'));
                
        fetch(ajaxurl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Cache-Control': 'no-cache',
            },
            body: new URLSearchParams(data),
        })
        .then(response => response.json())
        .then(body => {
            if (!body.success) return;
            modal_inner.innerHTML = body.data;        
        });
    }

    // NOT USED YET
    const resetDisplay = async () => {
        data.set('offset', 0);
        data.set('keyword', '');

        cl(page).add('loading')

        fetchAndDisplayDatas().then( () => {
            page.classList.remove('loading')
        });
    }



    /*------------------------------------*\
        LOADING FUNCS
    \*------------------------------------*/

    // NOT USED YET
    const load_contents = async (event) => {
        event.preventDefault();
        cl(page).add('loading')
        
        data.set('action', 'load_popin');
        data.set('offset', offset);

        fetchAndDisplayDatas().then( () => {
            //displayFoundPosts();
            cl(page).remove('loading')
        });
    }

    // NOT USED YET
    const load_more_contents = async (event) => {
        event.preventDefault();
        offset += step;

        data.set('offset', offset);

        fetchAndDisplayDatas( true ).then( () => {
            // displayFoundPosts()
            cl(page).remove('loading')
        });
    }


    // USED FOR EDITION ARCHIVES
    const load_one_post = async (event, el) => {
        event.preventDefault();
        cl(page).add('loading')

        fetchAndDisplayPostContent( el )
            .then( () => {
                cl(page).remove('loading');
                if(cl(modal).contains('open') ) {
                    closeModal()
                    setTimeout( () => {
                        cl(modal).add('open');
                    }, 700)
                }
                else {
                    cl(modal).add('open');
                }
            });
    }


    
    /*------------------------------------*\
        TRIGGERS
    \*------------------------------------*/

    const loader_trigger = qsa('.js-load-modal')

    if ( loader_trigger ) {
        loader_trigger.forEach( el => {
            el.addEventListener('click', event => {
                load_one_post(event, el)
            })
        })
    }



}


document.addEventListener('DOMContentLoaded', initSearchScript());


