$(document).ready(function () {
    var ll = 0;
    $(".questions").click(function (e) {
        var row = $(this);
        var data = {
            questionId: $(this).find(".id").html()
        };
        $.ajax({
            type: "POST",
            url: 'loadAnswers.php',
            data: data,
            success: function (response) {
                // var src = '<div class="form-group"><label for="sel1">Select Answer:</label><select class="form-control">';
                var select = $("<select class="+ll+"></select>");
                ll++;
                response = JSON.parse(response);
                $.each(response, function (index, value) {
                    // src += '<option value="' + value.id + '">' + value.answer + '</option>';
                    var opt = $("<option></option");
                    opt.val(value.id);
                    opt.html(value.answer);
                    select.append(opt);
                    select.val(opt.val());
                });
                row.find(".answerBox").html(select);
            }
        });
    });
    $("#submit-btn").click(function(e) {
        var table = $(".table tbody");
        var dataArray = [];

        table.find('tr').each(function (i, el) {
            if( i > 0){
                var $tds = $(this).find('td'),
                    questionId = $tds.eq(0).text(),
                    answerId = $tds.eq(2).find(':selected').val();
                dataArray.push({questionId: questionId, answerId: answerId});
            }
           

        });
        var data = {
            data: dataArray
        };
        $.ajax({
            type: "POST",
            url: 'checkAnswers.php',
            data: data,
            success: function (response) {
                // var src = '<div class="form-group"><label for="sel1">Select Answer:</label><select class="form-control">';
                alert("Your Correct Answers Are "+response);
            }
        });
        
    });
});