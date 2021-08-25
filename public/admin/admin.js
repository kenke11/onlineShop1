$(document).ready(function () {
    $(".nav-treeview .nav-link, .nav-link").each(function () {
        var location2 = window.location.protocol + '//' + window.location.host + window.location.pathname;
        var link = this.href;
        if(link == location2){
            $(this).addClass('active');
            $(this).parent().parent().parent().addClass('menu-is-opening menu-open');

        }
    });

    $('.delete-btn').click(function () {
        var res = confirm('ნამდვილად გსურთ ამ ოპერაციის შესრულება?');
        if(!res){
            return false;
        }
    });
})

tinymce.init({
    selector: '.editor',
    plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    toolbar_mode: 'floating',
    relative_urls : false,
    file_picker_callback : elFinderBrowser
});

function elFinderBrowser (callback, value, meta) {
    tinymce.activeEditor.windowManager.openUrl({
        title: 'File Manager',
        url: '/elfinder/tinymce5',
        /**
         * On message will be triggered by the child window
         *
         * @param dialogApi
         * @param details
         * @see https://www.tiny.cloud/docs/ui-components/urldialog/#configurationoptions
         */
        onMessage: function (dialogApi, details) {
            if (details.mceAction === 'fileSelected') {
                const file = details.data.file;

                // Make file info
                const info = file.name;

                // Provide file and text for the link dialog
                if (meta.filetype === 'file') {
                    callback(file.url, {text: info, title: info});
                }

                // Provide image and alt text for the image dialog
                if (meta.filetype === 'image') {
                    callback(file.url, {alt: info});
                }

                // Provide alternative source and posted for the media dialog
                if (meta.filetype === 'media') {
                    callback(file.url);
                }

                dialogApi.close();
            }
        }
    });
}

$("#cat_id").change(function() {
    var getStartVal = $(this).val();
    // console.log(getStartVal);
    sessionStorage.removeItem('cat_id');
    sessionStorage.setItem('cat_id', getStartVal);

    console.log(sessionStorage.getItem('cat_id'))


});

let sale_input = document.querySelector('#sale_price');
$('#sale').change(function () {

    if (this.checked){
        sale_input.style.display = 'block'
    }

})

$('#not-sale').change(function () {

    if (this.checked){
        sale_input.value = ' '
        sale_input.style.display = 'none'
    }

})


// $('.next-btn').on('click', function (e) {
//
//
//
//     $(this).parents('.media-body_1').removeClass('show');
//
//     var curent = $('#chan_c').text();
//     $('#chan_c').text(parseInt(curent) + 1);
//
//
//
//     if ($(this).parents('.media-body_1').next('.media-body_1').length != 0) {
//
//
//
//         $(this).parents('.media-body_1').next('.media-body_1').addClass('show');
//
//
//
//
//     }else{
//
//
//
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });
//
//
//
//         var data = $('#test_form').serialize();
//
//
//
//         $.ajax({
//             type: 'POST',
//             url: APP_URL + "/result",
//             dataType: 'html',
//             data: data,
//
//
//
//
//             success:function(response){
//
//                 if (response) {
//
//
//
//                     $('.q_count').hide();
//                     $('.result').html(response);
//
//                 }else{
//                     alert('დაფიქსირდა შეცდომა გთხოვთ სცადოთ მოგვიანებით !');
//                 }
//
//
//
//
//             }
//
//
//
//         });
//         $('.result').removeClass('hide');
//     }
//
//
// });

// owl carousel
