$(document).ready(function () {

   var profession_id =document.getElementById("profession_id").value;

        //var dataString = id;
        $.ajax({
            type: "GET",
            url: "/admin/get_pq/" + profession_id,
            data: profession_id,
            cache: false,
            success: function (html) {
                $("#professional_qualifications").html(html);
            }
        });

});

$(document).ready(function () {
    $("#professional_qualifications").change(function () {

        var professional_qualification_id =document.getElementById("professional_qualifications").value;

        //var dataString = id;
        $.ajax
        ({
            type: "GET",
            url: "/admin/get_ai/" + professional_qualification_id,
            data: professional_qualification_id,
            cache: false,
            success: function (html) {
                $("#accredited_institutions").html(html);
            }
        });
    });

});

function myFunction() {

   var  x = document.getElementById("qualification_category").value;
    if (x == 1) {
        document.getElementById("pq_div").style.display = 'block';
        document.getElementById("accredited_institution_div").style.display = 'block';

        document.getElementById("pq_name_div").style.display = 'none';
        document.getElementById("institution_div").style.display = 'none';

    }
    else

    if (x == 2) {
        document.getElementById("pq_name_div").style.display = 'block';
        document.getElementById("institution_div").style.display = 'block';

        document.getElementById("pq_div").style.display = 'none';
        document.getElementById("accredited_institution_div").style.display = 'none';

    }  else {
        document.getElementById("pq_div").style.display = 'none';
        document.getElementById("pq_name_div").style.display = 'none';
        document.getElementById("accredited_institution_div").style.display = 'none';
        document.getElementById("institution_div").style.display = 'none';

    }
}
