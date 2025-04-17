(function($) {
    $(document).ready(function() {
        //dropdown
        $('a#print').hover(
            function() {
              $(this).find('.dropdown-menu').stop(true, true).slideDown(200);  // Show with a slide-down effect
            },
            function() {
              $(this).find('.dropdown-menu').stop(true, true).slideUp(200);  // Hide with a slide-up effect
            }
        );

        //print to png
        $('#download_png').click(function() {
            // Capture the page title to use as the filename
            var pageTitle = document.title.trim();
            pageTitle = sanitizeFilename(pageTitle);

            var content = $('main');
            var clonedContent = content.clone();

            // Remove the style attribute from the div with class "content-body"
            clonedContent.find('.content-body').removeAttr('style');

            // const content = $('main').prop('outerHTML');

            // Clone all stylesheets (inline and linked)
            const styles = Array.from(document.styleSheets).map(sheet => {
                try {
                    if (sheet.href) {
                        return `<link rel="stylesheet" href="${sheet.href}">`;
                    } else {
                        let rules = "";
                        for (let rule of sheet.cssRules) {
                            rules += rule.cssText;
                        }
                        return `<style>${rules}</style>`;
                    }
                } catch (e) {
                    // Skip cross-origin stylesheets
                    return '';
                }
            }).join("");

            var printarea = getPageContent(clonedContent[0], styles);

            // Create a new window
            var newWindow = window.open('', '', 'width=1200,height=600');
            newWindow.document.write(printarea);

            // Wait for the content to be loaded into the new window
            newWindow.document.close();

            // Once the new window content is ready, generate PDF
            newWindow.onload = function() {
                // Use html2canvas to capture the content of the page
                html2canvas(newWindow.document.body).then(function(canvas) {
                    filename = pageTitle +'_'+ getYmd() +'.png'; // Set the filename as the page title
                    downloadImage(canvas, filename, 'png');

                    //newWindow.close();
                });

            };
        });

        //print to jpg
        $('#download_jpg').click(function() {
            // Capture the page title to use as the filename
            var pageTitle = document.title.trim();
            pageTitle = sanitizeFilename(pageTitle);

            var content = $('main');
            var clonedContent = content.clone();

            // Remove the style attribute from the div with class "content-body"
            clonedContent.find('.content-body').removeAttr('style');

            // const content = $('main').prop('outerHTML');

            // Clone all stylesheets (inline and linked)
            const styles = Array.from(document.styleSheets).map(sheet => {
                try {
                    if (sheet.href) {
                        return `<link rel="stylesheet" href="${sheet.href}">`;
                    } else {
                        let rules = "";
                        for (let rule of sheet.cssRules) {
                            rules += rule.cssText;
                        }
                        return `<style>${rules}</style>`;
                    }
                } catch (e) {
                    // Skip cross-origin stylesheets
                    return '';
                }
            }).join("");

            var printarea = getPageContent(clonedContent[0], styles);

            // Create a new window
            var newWindow = window.open('', '', 'width=1200,height=600');
            newWindow.document.write(printarea);

            // Wait for the content to be loaded into the new window
            newWindow.document.close();

            // Once the new window content is ready, generate PDF
            newWindow.onload = function() {
                // Use html2canvas to capture the content of the page
                html2canvas(newWindow.document.body, {
                    //scale: 3, //window.devicePixelRatio, // Use scale factor to increase the resolution (for less compression)
                    //logging: true,
                    //useCORS: true,
                    //allowTaint: true,
                    //removeContainer: true,
                    backgroundColor: '#ffffff', // Transparent background (optional)
                }).then(function(canvas) {
                    filename = pageTitle +'_'+ getYmd() +'.jpg'; // Set the filename as the page title
                    downloadImage(canvas, filename, 'jpg');

                    //newWindow.close();
                });

            };
        });

    });

}
)(jQuery);

function downloadImage(canvas, filename, type) {
    const link = document.createElement('a');
    link.download = filename;
    link.href = canvas.toDataURL('image/' + type, 1.0);
    link.click();
}

function sanitizeFilename(filename) {
    return filename.replace(/[\/:*?"<>|]/g, '_');
}

function getPageContent(content, styles = null) {
    // Get the domain URL (protocol + domain)
    var domainUrl = window.location.origin;

    // Access the theme path from drupalSettings
    var themePath = drupalSettings.kym.themePath;

    var html = '<html><head>';
    html += '<title>Print</title>';
    //html += '<link rel="stylesheet" type="text/css" href="'+ domainUrl +'/'+ themePath +'/css/style.css">';
    html += '<style>body {font-family: Arial, sans-serif; margin: 20px;}';
    html += 'header, footer, .no-print { display: none !important; } div:not(.no-print) .hide { display: block !important; }</style>'; // Hide header and footer during print
    if (styles) {
        html += styles;
    }
    html += '</head><body>';
    html += content.outerHTML; // Add the content to print
    html += '</body></html>';

    return html;
}

function getYmd() {
    const d = new Date();

    var date = d.getDate();
    var month = d.getMonth() + 1;
    var year = d.getFullYear();

    return year +'-'+ month +'-'+ date;
}
