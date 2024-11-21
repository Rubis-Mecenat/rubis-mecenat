


const initSearchScript = () => {

    console.log('loaders')

    
    /*------------------------------------*\
        VARIABLES
    \*------------------------------------*/

    // ELEMENTS
    const page = document.querySelector('main')
    const modal = document.querySelector('#modal')

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
    
    const displayFoundPosts = async () => {
        setTimeout( () => {
            const nbr = document.querySelector('#foundPosts') ? document.querySelector('#foundPosts').getAttribute('data-posts') : 0;
            found_posts_label.innerHTML = nbr;

            const rest = nbr > 0 ? nbr - offset - step : 0;
            sec_rest_to_go.innerHTML = rest;

            if( rest <= 0 ) sec_search_more.classList.add('is-hidden');

        }, 500)
    }

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
                    if (!body.success) {
                        return;
                    }
                    modal.classList.add('open');
                    modal.innerHTML = body.data;
        
                });
    }

    const resetDisplay = async () => {
        data.set('offset', 0);
        data.set('keyword', '');

        page.classList.add('loading')

        fetchAndDisplayDatas().then( () => {
            page.classList.remove('loading')
        });
    }



    /*------------------------------------*\
        LOADING FUNCS
    \*------------------------------------*/

    const load_contents = async (event) => {
        event.preventDefault();
        page.classList.add('loading')
        
        data.set('action', 'load_popin');
        data.set('offset', offset);

        fetchAndDisplayDatas().then( () => {
            //displayFoundPosts();
            page.classList.remove('loading')
        });
    }

    const load_more_contents = async (event) => {
        event.preventDefault();
        offset += step;

        data.set('offset', offset);

        fetchAndDisplayDatas( true ).then( () => {
            // displayFoundPosts()
            page.classList.remove('loading')
        });
    }

    const load_one_post = async (event, el) => {
        event.preventDefault();

        page.classList.add('loading')

        fetchAndDisplayPostContent( el ).then( () => {
            page.classList.remove('loading')
        });
    }


    
    /*------------------------------------*\
        TRIGGERS
    \*------------------------------------*/

    const loader_trigger = document.querySelectorAll('.js-load-modal')

    if ( loader_trigger ) {
        loader_trigger.forEach( el => {
            el.addEventListener('click', event => {
                load_one_post(event, el)
            })
        })
    }



}


document.addEventListener('DOMContentLoaded', initSearchScript());


