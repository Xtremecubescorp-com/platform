

function in_load_search(element_focus, is_in_parent, shortcut, is_add_mode) {


    //Loads the blog search bar only once for the add blog inputs
    if($(element_focus).hasClass('search-bar-loaded')){
        //Already loaded:
        return false;
    }


    //Not yet loaded, continue with loading it:
    $(element_focus).addClass('search-bar-loaded').on('autocomplete:selected', function (event, suggestion, dataset) {

        if(is_add_mode=='link_blog'){
            in_link_or_create($(this).attr('blog-id'), is_in_parent, suggestion.alg_obj_id);
        } else {
            //Go to blog:
            window.location = '/blog/' + suggestion.alg_obj_id;
            return true;
        }

    }).autocomplete({hint: false, minLength: 1, keyboardShortcuts: [shortcut]}, [{

        source: function (q, cb) {

            if($(element_focus).val().charAt(0)=='#'){
                cb([]);
                return;
            } else {
                algolia_index.search(q, {

                    filters: ' alg_obj_is_in=1 AND ( _tags:is_featured ' + ( js_pl_id > 0 ? 'OR _tags:alg_author_' + js_pl_id : '' ) + ' ) ',
                    hitsPerPage:( is_add_mode=='link_blog' ? 7 : 10 ),

                }, function (error, content) {
                    if (error) {
                        cb([]);
                        return;
                    }
                    cb(content.hits, content);
                });
            }

        },
        displayKey: function (suggestion) {
            return ""
        },
        templates: {
            suggestion: function (suggestion) {
                return echo_js_suggestion(suggestion);
            },
            header: function (data) {
                if (is_add_mode=='link_blog' && !($(element_focus).val().charAt(0)=='#') && !data.isEmpty) {
                    return '<a href="javascript:in_link_or_create(' + parseInt($(element_focus).attr('blog-id')) + ','+is_in_parent+',0)" class="suggestion"><span class="icon-block-sm"><i class="fas fa-plus-circle blog add-plus"></i></span><b>' + data.query + '</b></a>';
                } else if(is_add_mode=='link_my_blog'){
                    return '<a href="javascript:blog_create()" class="suggestion"><span class="icon-block-sm"><i class="fas fa-plus-circle blog add-plus"></i></span><b>' + data.query + '</b></a>';
                }
            },
            empty: function (data) {
                if(is_add_mode=='link_blog'){
                    if($(element_focus).val().charAt(0)=='#'){
                        return '<a href="javascript:in_link_or_create(' + parseInt($(element_focus).attr('blog-id')) + ','+is_in_parent+',0)" class="suggestion"><span class="icon-block-sm"><i class="fas fa-link"></i></span>Link to <b>' + data.query + '</b></a>';
                    } else {
                        return '<a href="javascript:in_link_or_create(' + parseInt($(element_focus).attr('blog-id')) + ','+is_in_parent+',0)" class="suggestion"><span class="icon-block-sm"><i class="fas fa-plus-circle blog add-plus"></i></span><b>' + data.query + '</b></a>';
                    }
                }
            },
        }
    }]).keypress(function (e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if ((code == 13) || (e.ctrlKey && code == 13)) {
            if(is_add_mode=='link_blog') {
                return in_link_or_create($(this).attr('blog-id'), is_in_parent, 0);
            } else if(is_add_mode=='link_my_blog') {
                return blog_create();
            }
            e.preventDefault();
        }
    });

}
