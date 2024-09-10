
$(document).ready(function() {
    $('#btn-print-this').click(function() {
        $('#license_content').printThis({
            printDelay: 300,
            importCSS: true,
            importStyle: true,
            loadCSS: [
                "../../css/licenseformat.css",
                "../../css/dash1.css"
            ]
        });
    });
});
