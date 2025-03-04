jQuery(document).ready(function ($) {
    $('#downloadthis').bind('click',function() {
        var content = $('content');

        // Get the domain URL (protocol + domain)
        var domainUrl = window.location.origin;

        // Access the theme path from drupalSettings
        var themePath = drupalSettings.kym.themePath;

        // Clone the content to avoid messing up the original page
        var printWindow = window.open('', '', 'height=600,width=800');

        var html = '<html><head>';
        html += '<title>Print</title>';
        html += '<link rel="stylesheet" type="text/css" href="'+ domainUrl +'/'+ themePath +'/css/style.css">';
        html += '<style>body {font-family: Arial, sans-serif; margin: 20px;}';
        html += 'header, footer, .no-print { display: none; }</style>'; // Hide header and footer during print
        html += '</head><body>';
        html += content.html(); // Add the content to print
        html += '</body></html>';

        $(printWindow.document.body).html(html);
        printWindow.print();
    });
});
