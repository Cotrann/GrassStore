$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url)
{
    if(confirm('If deleted, it cannot be recovered. Are you sure?')) {
        $.ajax({
            type : 'DELETE',
            datatype : 'JSON',
            data : {id},
            url : url,
            success: function (result) {
                if (result.error === false) {
                    alert(result.message);
                    location.reload();
                }
                else {
                    alert('Error, please try again');
                }
            }
        })
    }
}



/* Upload*/
$('#upload').change(function (){
    const form = new FormData();
    $.each($(this)[0].files, (i, item) => {
        form.append('thumbs[]', item);
    })
    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: app_vars.base_url+'/admin/upload/services',
        success: function (results) {
            //console.log(results)
            if (results.error == false) {
                ///$('#image_show').empty();
                $.each(results.url, (i, item) => {
                    $("#image_show").append(`
                        <div class="box" data-url="${item.trim()}">
                            <button type="button" class="delete" onclick="deleteImage(this)">
                                <span>&times;</span>
                            </button>
                            <div class="image">
                                <img src="${app_vars.base_url + item.trim()}" />
                            </div>
                        </div>
                    `);
                    //$('#image_show').append('<a href="' + app_vars.base_url + results.url + '" target="_blank">' + '<img src="' + app_vars.base_url + item + '" width = "100px"></a>')
                })
                var url = '';
                $.each($(".box"), (i, item) => {
                    url += $(item).data('url')+"\n";
                })
                $('#thumb').val(url);
                $('#thumb').val(url);
            }
            else {
                alert('Error file upload');
            }
        }
    });
});
function deleteImage(el) {
    $(el).parent().remove();
    var url = '';
    $.each($(".box"), (i, item) => {
        if($(item).data('url') != '')
            url += $(item).data('url')+"\n";
    })
    //console.log(url)
    $('#thumb').val(url);
}
