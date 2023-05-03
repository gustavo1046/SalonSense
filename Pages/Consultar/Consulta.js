$('#filter').submit(function(e) {
    e.preventDefault(); // impedir o envio do formulário normalmente

    var data_filter = $("#data-filter").val();

    console.log(data_filter);
    // $.ajax({
    //     url: 'Consultar.php',
    //     type: 'POST',
    //     data: {data: data_filter},
    //     dataType: 'json'
    // }).done(function(result){
    //     console.log(result)
    // });
});