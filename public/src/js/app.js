$(document).ready(function () {
    $("#addNewWord").click(function () {
        var row = '<tr>' +
            '<td><input type="text" class="form-control" name="keys[]" maxlength="20" placeholder="Key"></td>' +
            '<td><input type="text" class="form-control" name="values[]" maxlength="50" placeholder="Value"></td>' +
            '<td><button type="button" class="delete btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></td>' +
            '</tr>';

        $("#vocabulary").append(row);
    });

    $('body').on('click', '.delete', function (e) {
        $(this).parent().parent().remove();
    });
});