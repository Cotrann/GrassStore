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
