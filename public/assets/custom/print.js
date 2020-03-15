jQuery(document).ready(function () {
    $('button#print_btn').click(function () {
        var records = [];
        // var content = '';
        $('tbody input:checked').each(function (i) {
            var record_elem = $(this).closest('tr');
            var record = [];
            Object.entries($(record_elem).children()).map(elem => { record.push($(elem[1]).text().trim()) });
            records.push(record);

            deliveries = "";
            record_elem.find('td.hidden').each(function (j) {
                deliveries += $(this).text().trim() + "\t";
            });

            // content += '<div class="container">' +
            //     '<div class="row">' +
            //     '<div class="col-md-8 col-md-offset-2" style="text-align:center; font-size:100px;">' +
            //     '<p>' + record_elem.find('td:eq(1)').text().trim() + '</p>' +
            //     '</div>' +
            //     '</div>' +
            //     '<div class="row">' +
            //     '<div class="col-md-6" style= "; height:100px; ">' +
            //     '<h1>' + record_elem.find('td:eq(6)').text().trim() + '</h1>' +
            //     '</div>' +
            //     '<div class="col-md-6" >' +
            //     '<label>' + 'Product Description' + '</label>' + '\n' +
            //     '<h2>' + record_elem.find('td:eq(7)').text().trim() + '</h2>' +
            //     '</div>' +
            //     '</div>' +
            //     '<div class="row">' +
            //     '<div class="col-md-6" style= " height:170px;">' +
            //     '<div class="row">' +
            //     '<div class="col-md-4">' +
            //     '<h1 style="font-weight:bold;">' + 'Location :' + '</h1>' +
            //     '</div>' +
            //     '<div class="col-md-8">' +
            //     '<h1>' + record_elem.find('td:eq(11)').text().trim() + '</h1>' +
            //     '<div id="barcode' + i + '" style="margin-right:0px!important;" ></div>' +
            //     '</div>' +
            //     '</div>' +
            //     '</div>' +
            //     '<div class="col-md-6" >' +
            //     '<div class="row">' +
            //     '<div class="col-md-6">' +
            //     '<h2 style="font-weight:bold;">Salesperson : </h2>' +
            //     '</div>' +
            //     '<div class="col-md-6">' +
            //     '<h2>' + record_elem.find('td:eq(8)').text().trim() + '</h2>' +
            //     '</div>' +
            //     '</div>' +
            //     '<div class="row">' +
            //     '<div class="col-md-6">' +
            //     '<h2 style="font-weight:bold;">Shipped Via : </h2>' +
            //     '</div>' +
            //     '<div class="col-md-6">' +
            //     '<h2>' + record_elem.find('td:eq(13)').text().trim() + '</h2>' +
            //     '</div>' +
            //     '</div>' +
            //     '<div class="row">' +
            //     '<div class="col-md-6">' +
            //     '<h2 style="font-weight:bold;">Vendor : </h2>' +
            //     '</div>' +
            //     '<div class="col-md-6">' +
            //     '<h2>' + record_elem.find('td:eq(12)').text().trim() + '</h2>' +
            //     '</div>' +
            //     '</div>' +
            //     '</div>' +
            //     '</div>' +
            //     '<div class="row">' +
            //     '<h2 style="font-weight:bold; text-align:center;">Amount of Order : ' +
            //     record_elem.find('td:eq(14)').text().trim() + record_elem.find('td:eq(15)').text().trim() + '</h2>' +
            //     '</div>' +
            //     '<div class="row">' +
            //     '<div class="col-md-6 rest_data">' +
            //     '</div>' +
            //     '<div class="col-md-6">' +
            //     '</div>' +
            //     '</div>' +
            //     '</div>';
        });

        $('body').html('');
        records.forEach((arr, i) => {
            $('body').append(
                '<div class="container">' +
                '<div class="row">' +
                '<div class="col-md-8 col-md-offset-2" style="text-align:center; font-size:100px;">' +
                '<p>' + arr[1] + '</p>' +
                '</div>' +
                '</div>' +
                '<div class="row">' +
                '<div class="col-md-6" style= "; height:100px; ">' +
                '<h1>' + arr[6] + '</h1>' +
                '</div>' +
                '<div class="col-md-6" >' +
                '<label>' + 'Product Description' + '</label>' + '\n' +
                '<h2>' + arr[7] + '</h2>' +
                '</div>' +
                '</div>' +
                '<div class="row">' +
                '<div class="col-md-6" style= " height:170px;">' +
                '<div class="row">' +
                '<div class="col-md-4">' +
                '<h1 style="font-weight:bold;">' + 'Location :' + '</h1>' +
                '</div>' +
                '<div class="col-md-8">' +
                '<h1>' + arr[11] + '</h1>' +
                '<div id="barcode' + i + '" style="margin-right:0px!important;" ></div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-md-6" >' +
                '<div class="row">' +
                '<div class="col-md-6">' +
                '<h2 style="font-weight:bold;">Salesperson : </h2>' +
                '</div>' +
                '<div class="col-md-6">' +
                '<h2>' + arr[8] + '</h2>' +
                '</div>' +
                '</div>' +
                '<div class="row">' +
                '<div class="col-md-6">' +
                '<h2 style="font-weight:bold;">Shipped Via : </h2>' +
                '</div>' +
                '<div class="col-md-6">' +
                '<h2>' + arr[13] + '</h2>' +
                '</div>' +
                '</div>' +
                '<div class="row">' +
                '<div class="col-md-6">' +
                '<h2 style="font-weight:bold;">Vendor : </h2>' +
                '</div>' +
                '<div class="col-md-6">' +
                '<h2>' + arr[12] + '</h2>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="row">' +
                '<h2 style="font-weight:bold; text-align:center;">Amount of Order : ' +
                arr[14] + arr[15] + '</h2>' +
                '</div>' +
                '<div class="row rest_data_' + i + '">' +
                '</div>' +
                '</div>'
            );
            arr.forEach((elem, j) => {
                if (j == 11) {
                    $(`#barcode${i}`).barcode(elem, "code39");
                }
                var rest = "";
                if (j == 20) {
                    var rest_item = document.createElement('div');
                    $(rest_item).addClass("col-xs-6");
                    $(rest_item).css("display", "flex");
                    $(rest_item).css("justify-content", "flex-end");
                    var contain_item = document.createElement('span');
                    rest += "Complete Received(Date): " + arr[20] + "<br/>" +
                        "Complete Received(QTY): " + arr[21];
                    $(contain_item).append(rest);
                    $(contain_item).css("width", "260px");
                    $(rest_item).append(contain_item);
                    $(`.rest_data_${i}`).append(rest_item);

                }
                var rest = "";
                if (j > 26 && j < arr.length - 3) {
                    if (j % 2 != 0) {
                        var rest_item = document.createElement('div');
                        var align = ((j - 26 - 1) / 2 + 1) % 2 != 0 ? "flex-start" : "flex-end";
                        $(rest_item).addClass("col-xs-6");
                        $(rest_item).css("display", "flex");
                        $(rest_item).css("justify-content", align);
                        var contain_item = document.createElement('span');
                        rest += "Partial Received" + ((j - 26 - 1) / 2 + 1) + "(Date): " + elem + "<br/>" +
                            "Partial Received" + ((j - 26 - 1) / 2 + 1) + "(QTY): " + elem + arr[15];
                        $(contain_item).append(rest);
                        $(contain_item).css("width", "260px");
                        $(rest_item).append(contain_item);
                        $(`.rest_data_${i}`).append(rest_item);
                    }
                }
            })
        })
        // Let's print!!
        setTimeout(function() {
            window.print();
            // Reload from Cache!
            window.location.reload();
        }, 1000);        
    });
});
