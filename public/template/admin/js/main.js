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
    form.append('thumb', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: app_vars.base_url+'/admin/upload/services',
        success: function (results) {
            console.log(results)
            if (results.error == false) {
                $('#image_show').html('<a href="' + app_vars.base_url + results.url + '" target="_blank">' + '<img src="' + app_vars.base_url + results.url + '" width = "100px"></a>')

                $('#thumb').val(results.url);
            }
            else {
                alert('Error file upload');
            }


        }
    });
});
