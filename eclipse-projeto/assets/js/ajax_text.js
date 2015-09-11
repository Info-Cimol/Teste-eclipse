var base_url='http://localhost/teste/'
	function ajaxTest(){
                if($('[name="search"]').val()==""){
                    $('#results').html("");
                }else{            
                    $('#results').html("");
                    $.ajax({
                            url: base_url+"site/getSearch",
                            dataType: 'json',
                            data: 'search='+$('[name="search"]').val(),
                            type: "post",
                            success: function(data){
                                    $.each(data,function(index, element){
                                        $('#results').append($('<div>', {
                                                        text: element.title
                                        }))                      
                                })
                            }
                    })
            }
}
