$(document).ready(function() {
    $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });

    $('div.alert').not('.alert-important').delay(5000).slideUp(300);

    // hapus select dengan empty value dari url
    $("#form-pencarian").submit(function() {
        $("#id_kelas option[value='']").attr("disabled", "disabled");
        $("#jenis_kelamin option[value='']").attr("disabled", "disabled");
        // pastikan proses submit masih diteruskan
        return true;
    });
    $('.dropdown-item').click(function(event) {
        event.preventDefault();
        $('#logout-form').submit();
    });
    
});
// onclick="event.preventDefault(); document.getElementById('logout-form').submit();"