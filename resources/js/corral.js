
$(document).ready(function(){
    $('#corrals_select').change(function(){
        var corral_id = $(this).val().split('//')[0];
        var avg = $(this).val().split('//')[1];
        if(corral_id !== 'none'){
            $.ajax({
                url: $('#corrals_select').data('url') + corral_id
            }).done(function (response){
                var tbody = $('#tbody');
                tbody.empty();
                $('#avg').text(avg);
                response.forEach(function(animal){
                    tbody.append('<tr><td>' + animal.age + '</td><td>' + (animal.dangerous ? "Yes" : "no")  + '</td><td>' + animal.corral_id + '</td></tr>')
                });
            });
        }
    })
});