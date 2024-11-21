


const initSearchScript = () => {

    console.log('loaders')

    
    /*------------------------------------*\
        VARIABLES
    \*------------------------------------*/

    // ELEMENTS
    const page = qs('main')
    const modal = qs('#modal')
    const modal_inner = qs('#modal-inner')
    const mainGrid = qs('#mainGrid')
    const searchform = qs('.search-form')
    const searchformValue = qs('.search-form input[name="s"]');

    let loader_triggers, filter_trigger;

    // UTILS
    let offset = 0;
    let step = 30;

    // DATAS
    const data = new FormData();
    const ajaxurl = ajax_datas.ajaxUrl;
    data.set('nonce', ajax_datas.nonce);
    data.set('step', step);
    data.set('offset', offset);



    /*------------------------------------*\
        UTILS FUNCS
    \*------------------------------------*/
    
    // MODAL
    ///////////
    const queryModalTriggers = cb => {
        loader_triggers = qsa('.js-load-modal');
        cb();
    } 
    const addListenerToModalTriggers = () => {
        if ( loader_triggers ) {
            loader_triggers.forEach( el => {
                el.addEventListener('click', event => {
                    load_one_post(event, el);
                })
            })
        }
    }
    const initModalTriggers = () => {
        setTimeout( () => {
            queryModalTriggers( addListenerToModalTriggers )
        }, 1000)
    }


    // FILTERS
    ///////////
    const queryFilterTriggers = async () => {
        filter_trigger = qsa('.js-filter-content')
    }   
    const addListenerToFilterTriggers = () => {
        if ( filter_trigger ) {
            filter_trigger.forEach( el => {
                el.addEventListener('click', event => {
                    cl( qs('.active') ).remove('active');
                    load_filtered_posts(event, el)
                    cl(el).add('active');
                })
            })
        }
    }
    const initFilterTriggers = () => {
        queryFilterTriggers()
            .then( () => {
                addListenerToFilterTriggers()
            })
    }

    // SEARCH
    ///////////
    const initSearchSubmit = () => {
        searchform.addEventListener('submit', event => {
            event.preventDefault();
            load_filtered_posts(event)
        })
    }


    // NOT USED YET
    ///////////
    const displayFoundPosts = async () => {
        setTimeout( () => {
            const nbr = qs('#foundPosts') ? qs('#foundPosts').getAttribute('data-posts') : 0;
            found_posts_label.innerHTML = nbr;

            const rest = nbr > 0 ? nbr - offset - step : 0;
            sec_rest_to_go.innerHTML = rest;

            if( rest <= 0 ) sec_search_more.classList.add('is-hidden');

        }, 500)
    }


    /*------------------------------------*\
      LOADING POSTS IN ARCHIVES CONTAINER
    \*------------------------------------*/

    const fetchAndDisplayDatas = async ( append = false ) => {
        console.log('fetchAndDisplayDatas', data)

        data.set('action', 'filter_content');

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

            if( append ) {
                setTimeout( () => {
                    mainGrid.insertAdjacentHTML('beforeend', body.data); 
                }, 400)
            } else {
                setTimeout( () => {
                    mainGrid.innerHTML = body.data; 
                }, 400)
            }
        });

    }



    /*------------------------------------*\
      LOADING ONE POST CONTENT IN MODAL
    \*------------------------------------*/

    const fetchAndDisplayPostContent = async ( el ) => {
        console.log('fetchAndDisplayPostContent')

        // DATAS
        data.set('action', 'load_popin');
        data.set('postslug', el.getAttribute('data-slug'));
        data.set('type', el.getAttribute('data-type'));
                
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

        pageLoadingStart()

        fetchAndDisplayDatas().then( () => {
            pageLoadingEnd()
        });
    }



    /*------------------------------------*\
        LOADING FUNCS
    \*------------------------------------*/


    // NOT USED YET
    const load_more_contents = async (event) => {
        event.preventDefault();
        offset += step;

        data.set('offset', offset);

        fetchAndDisplayDatas( true ).then( () => {
            // displayFoundPosts()
            pageLoadingEnd();
        });
    }


    // USED FOR ARCHIVES & VIDEO FILTERS
    const load_filtered_posts = async (event, el = undefined) => {
        event.preventDefault();

        pageLoadingStart()
        
        const activeFilter = qs('.js-filter-content.active');
        
        if( searchform ) {
            data.set('search', searchformValue.value );
            data.set('term', '');

            if( data.get('posttype') !== 'all' )

            if( !el ) {
                data.set('posttype', 'all');
            }
        }
        else {
            data.set('search', '' );
        }

        if( el ) {
            data.set('posttype', el.getAttribute('data-posttype'));
            if (el.hasAttribute('data-tax')) data.set('tax', el.getAttribute('data-tax'));
            if (el.hasAttribute('data-term')) data.set('term', el.getAttribute('data-term'));
        }

        data.set('offset', offset);



        fetchAndDisplayDatas().then( () => {
            pageLoadingEnd();
            initModalTriggers();
        });
    }

    
    // USED TO DISPLAY MODAL WITH CONTENT (EDITION, VIDEO)
    const load_one_post = async (event, el) => {
        event.preventDefault();
        pageLoadingStart()

        fetchAndDisplayPostContent( el )
            .then( () => {

                pageLoadingEnd()

                if(cl(modal).contains('open') ) {
                    closeModal()
                    setTimeout( () => {
                        openModal();
                    }, 700)
                }
                else {
                    openModal();
                }
            });
    }


    
    /*------------------------------------*\
        TRIGGERS
    \*------------------------------------*/

    initModalTriggers()
    initFilterTriggers();
    if(searchform) initSearchSubmit();

}


document.addEventListener('DOMContentLoaded', initSearchScript());


