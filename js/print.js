(function ($) {
    $(document).ready(function () {

        //print
        $('#download_pdf').bind('click',function() {
            var content = $('content');

            // Get the domain URL (protocol + domain)
            var domainUrl = window.location.origin;

            // Access the theme path from drupalSettings
            var themePath = drupalSettings.kym.themePath;

            var content = $('main');
            var clonedContent = content.clone();

            // Remove the style attribute from the div with class "content-body"
            clonedContent.find('.content-body').removeAttr('style');

            var printarea = getPageContent(clonedContent[0]);

            // Create a new window
            var newWindow = window.open('', '', 'width=800,height=600');
            newWindow.document.write(printarea);

            // Hide header and footer in the new window
            // newWindow.querySelectorAll('.no-print').forEach(function (el) {
            //     el.style.display = 'none';
            // });

            // Wait for the content to be loaded into the new window
            newWindow.document.close();

            newWindow.print();
        });

        //dropdown
        $('.dropdown-container').hover(
            function() {
              $(this).find('.dropdown-menu').stop(true, true).slideDown(200);  // Show with a slide-down effect
            },
            function() {
              $(this).find('.dropdown-menu').stop(true, true).slideUp(200);  // Hide with a slide-up effect
            }
        );

        //print to pdf
        $('#download_pdf1').click(function () {
            // Capture the page title to use as the filename
            var pageTitle = document.title.trim();
            pageTitle = sanitizeFilename(pageTitle);

            var content = $('main');
            var printarea = getPageContent(content[0]);

            // Create a new window
            var newWindow = window.open('', '', 'width=800,height=600');
            newWindow.document.write(printarea);

            // Wait for the content to be loaded into the new window
            newWindow.document.close();

            // Once the new window content is ready, generate PDF
            newWindow.onload = function() {
                const { jsPDF } = window.jspdf;
                const doc = new jsPDF();

                // Capture the content of the new window
                doc.html(newWindow.document.body, {
                    callback: function (doc) {
                        // Save the PDF with the page title as filename
                        doc.save(pageTitle + '.pdf');

                        // Close the window after the PDF is saved
                        //newWindow.close();
                    },
                    //margin: [10, 10, 10, 10], // Margin for the PDF content
                    x: 10, // Start x position
                    y: 10, // Start y position
                    width: 250, // Set content width
                });

            };
        });

        $('#download_pdf2').click(function () {
            // Capture the page title to use as the filename
            var pageTitle = document.title.trim();
            pageTitle = sanitizeFilename(pageTitle);

            // Hide the header and footer before generating the PDF
            $('header').hide();
            $('footer').hide();

            // Create the PDF using jsPDF
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            // Grab the content you want to convert to PDF
            let pageContent = document.body.innerHTML;

            // Sanitize content with DOMPurify
            pageContent = DOMPurify.sanitize(pageContent);

            // Remove all <img> tags (to avoid base64-related issues)
            pageContent = pageContent.replace(/<img[^>]*>/g, '');

            // Add content to the PDF (you can adjust this part based on your needs)
            doc.html(pageContent, {
                callback: function (doc) {
                    // Save the PDF with the page title as the filename
                    doc.save(pageTitle + '.pdf');
                    
                    // Restore the header and footer visibility
                    $('.header').show();
                    $('.footer').show();
                },
                x: 10,
                y: 10
            });

        });

        //print to png
        $('#download_png').click(function () {
            // Hide the header and footer
            //$('header, footer').hide();

            // Capture the page title to use as the filename
            var pageTitle = document.title.trim();
            pageTitle = sanitizeFilename(pageTitle);

            var content = $('main');
            var clonedContent = content.clone();

            // Remove the style attribute from the div with class "content-body"
            clonedContent.find('.content-body').removeAttr('style');

            var printarea = getPageContent(clonedContent[0]);

            // Create a new window
            var newWindow = window.open('', '', 'width=800,height=600');
            newWindow.document.write(printarea);

            // Hide header and footer in the new window
            // newWindow.querySelectorAll('.no-print').forEach(function (el) {
            //     el.style.display = 'none';
            // });

            // Wait for the content to be loaded into the new window
            newWindow.document.close();

            // Once the new window content is ready, generate PDF
            newWindow.onload = function() {
                // Use html2canvas to capture the content of the page
                html2canvas(newWindow.document.body, {
                    scale: 3, //window.devicePixelRatio, // Use scale factor to increase the resolution (for less compression)
                    logging: true,
                    useCORS: true,
                    allowTaint: true,
                    removeContainer: true,
                    backgroundColor: '#ffffff', // Transparent background (optional)
                }).then(function (canvas) {
                    canvas.getContext("2d", { willReadFrequently: true })

                    // Convert the canvas to an image
                    var img = canvas.toDataURL('image/png');

                    // Create a temporary link element to trigger the download
                    var link = document.createElement('a');
                    link.href = img;
                    link.download = pageTitle + '.png'; // Set the filename as the page title
                    link.click(); // Trigger the download

                    // Show the header and footer back
                    //$('header, footer').show();

                    newWindow.close();
                });

            };
        });

        //print to jpg
        $('#download_jpg').click(function () {
            // Hide the header and footer
            //$('header, footer').hide();

            // Capture the page title to use as the filename
            var pageTitle = document.title.trim();
            pageTitle = sanitizeFilename(pageTitle);

            var content = $('main');
            var printarea = getPageContent(content[0]);

            // Create a new window
            var newWindow = window.open('', '', 'width=800,height=600');
            newWindow.document.write(printarea);

            // Hide header and footer in the new window
            // newWindow.querySelectorAll('.no-print').forEach(function (el) {
            //     el.style.display = 'none';
            // });

            // Wait for the content to be loaded into the new window
            newWindow.document.close();

            // Once the new window content is ready, generate PDF
            newWindow.onload = function() {
                // Use html2canvas to capture the content of the page
                html2canvas(newWindow.document.body).then(function (canvas) {
                    canvas.getContext("2d", { willReadFrequently: true })

                    // Convert the canvas to a JPG image (you can adjust the quality if needed)
                    var img = canvas.toDataURL('image/jpeg', 0.92); // 0.92 is the quality setting for JPEG (range: 0-1)

                    // Create a temporary link element to trigger the download
                    var link = document.createElement('a');
                    link.href = img;
                    link.download = pageTitle + '.jpg'; // Set the filename as the page title
                    link.click(); // Trigger the download

                    // Show the header and footer back
                    //$('header, footer').show();

                    newWindow.close();
                });

            };
        });

    });

}) (jQuery);

function sanitizeFilename(filename) {
    return filename.replace(/[\/:*?"<>|]/g, '_');
}

function getPageContent(content) {
    // Get the domain URL (protocol + domain)
    var domainUrl = window.location.origin;

    // Access the theme path from drupalSettings
    var themePath = drupalSettings.kym.themePath;

    var html = '<html><head>';
    html += '<title>Print</title>';
    html += '<link rel="stylesheet" type="text/css" href="'+ domainUrl +'/'+ themePath +'/css/style.css">';
    html += '<style>body {font-family: Arial, sans-serif; margin: 20px;}';
    html += 'header, footer, .no-print { display: none; }</style>'; // Hide header and footer during print
    html += '</head><body>';
    html += content.outerHTML; // Add the content to print
    html += '</body></html>';

    return html;
}