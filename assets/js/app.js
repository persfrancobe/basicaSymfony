

/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
const $ = require('jquery');
require('../css/bootstrap.css');
require('../css/font-awesome.min.css');
require('../css/icomoon-social.css');
require('../css/main.css');
require('../css/custom.css');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
$(document).ready(()=>{
    var url=$('#paginAjax').attr('data-url')
    var offset=10
    $('#paginAjax').click((event)=>{
        event.preventDefault();

        $.ajax({
            url:url,
            method: 'POST',
            data:{offset:offset},
            success:(serverResponse)=>{
                let slct=$('#paginAjax')
                let nmb=parseInt(slct.data('nmb'))

                if (offset>=nmb){
                    slct.remove()
                }
                $('#inj-place').append(serverResponse)
                offset+=5
                //document.location.replace($('#paginAjax').attr('data-url'))
            },
            error:()=>{
                console.log('problem with ajax pagination')
            }
        })
    })


})
