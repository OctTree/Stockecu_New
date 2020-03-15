// $('button#search_btn').click(function(){
//     var str = $('input#search_text').val();
//     // console.log(str);
//     $.post(
//         'home/search',
//         {
//             _token: $('#page_token').val(), 
//             field_name : $('select.input-medium option:selected').attr('val'),
//             text :  $('input#search_text').val(),
//         },
//         function(result){
//             var num = 1;
//             var str = '';
//             if(result == ''){
//                 alert('No result');
//             }
//             else{
//                 $('tbody#editable').empty();
//                 console.log(result);
//                 for(var i=0; i<result.length; i++){
//                     console.log(result[i]);
//                 str += '<tr data-token="{{ csrf_token() }}">'+
//                             '<td val="' + result[i].id  +'">'+
//                                 num+                        
//                             '</td>'+
//                             '<td>'+
//                                 result[i].po_sub_no +
//                             '</td>'+
//                             '<td>'+
//                                 result[i].po_sub_id +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].posubitemline +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].WarehouseLocation +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].ModifiedOn +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].JobDescription +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].Vendor +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].ShippedVia +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].AmountonOrder +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].UnitofMeasure +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].Salesperson +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].Reference +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].Buyer +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].JobNumber +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].ProductDescription +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].EstDeliveryDate +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].WarehouseNotes +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].ShiptoWarehouse +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].JobName +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].CompleteReceived_Date +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].CompleteReceived_QTY +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].PartialReceived1_Date +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].PartialReceived1_QTY +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].PartialReceived2_Date +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].PartialReceived2_QTY +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].PartialReceived3_Date +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].PartialReceived3_QTY +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].EmailAddress +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].ProjectManager +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].ProjectManagerEmail +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].SSMA_TimeStamp +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].PartialReceived4_Date +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].PartialReceived4_QTY +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].PartialReceived5_Date +
//                             '</td>'+
//                             '<td>'+
//                                     result[i].PartialReceived5_QTY +
//                             '</td>'+
//                             '<td class="fixed-side" >'+
//                                 '<a class="edit" href="javascript:;">'+
//                                 'Edit </a>'+
//                             '</td>'+
//                         '</tr>';
//                         num++;
//                 }
//                 $('tbody#editable').append(str);
//                 str2 = result.length > 20 ? result.length : 20;
//                 str1 = 'Showing 1 to ' + str2 + ' of ' + result.length;
//                 $('#view_amount').text(str1);

//             }
//         }
//     );
// })


// $('button#print_btn').click(function(){
//     var index = [];
//     var content = '<div id="printableArea">';
//     $('#sample_editable_1 thead').after(function () {
//             var i = 0;
//             $('th', this).each(function () {
//                     index[i] = this.innerHTML;
//                     i++;
//             });
//     });
//     $('#sample_editable_1 tbody').after(function () {
//             $('tr', this).each(function() {
//                     var record = [];
//                     var i = 0;
//                     $('td', this).each(function () {
//                             record[index[i]] = this.innerHTML;
//                             i++;
//                     });
//                     //Here we go to print individual records!
//                     content += '<table>' +
//                     '<tr><td style="text-align:center"><h1>' + record[index[2]] + '</h1></td></tr>' +
//                     '<tr><td><h5>' + record[index[6]] + '</h5></td><td><h3>' +
//                     record[index[7]] + '</h3></td></tr>' +
//                     '</table>';
//             });
//             content += '</div>';
//     });
//     console.log(content);
//     //Let's print!!
//     document.body.innerHTML = content;
//     window.print();
//     //Reload from Cache!
//     window.location.reload();
// })



jQuery(document).ready(function(){

    $('#add_location').click(function(){
        var location = $(this).parents().find('input#location_add_text').val();
        if(!location){
            alert('Please Enter New Location');
        }
        else{
            $.post(
                '/locations/add',
                {
                    _token : $('input#page_token').val(),
                    location_name : location, 
                },
                function(result){
                    if(result){
                        alert('successful saved!');
                        // location.reload();
                        console.log(result.id);
                        var str = '<tr>' + 
                                        '<td>' + result.id + '</td>'+
                                        '<td id="'+ result.id +'">'+ result.location_name + '</td>'+
                                        '<td>' +
                                            '<button class="btn btn-primary" id="delete_location_btn">Delete</button>' +
                                            '<button class="btn btn-primary edit_btn" data-toggle="modal" data-target="#editmodal" val="' + result.id +'">Edit</button>'+
                                        '</td>'+
                                    '</tr>';
                        $('tbody').append(str);
                    }
                }
            )

        }
    });

    $('.edit_btn').click(function(){
       var edit_text = $(this).parent().prev().text();
       var edit_id = $(this).attr('val');   
       $('input#location_edit_text').val(edit_text);
       $('input#location_edit_text').attr('val',edit_id);

    });
    
    $('button#edit_location_btn').click(function(){
        id = $(this).parents().find('input#location_edit_text').attr('val');
        location_name = $(this).parents().find('input#location_edit_text').val();
        if(!location_name){
            alert('Please Enter New Location');
        }
        else{
            $.post(
                'locations/edit',
                {
                    _token : $('input#page_token').val(),
                    id : id,
                    location_name : location_name, 
                },
                function(result){
                    if(result){
                        alert('Sucessful Saved!');
                       $('tbody tr td[id='+result[0].id +']').text(location_name);
                    
                    }
                }
            )

        }
    });

    $('button#delete_location_btn').click(function(){
        id = $(this).parent().prev().prev().text();
        $.post(
            'locations/delete',
            {
                _token : $('input#page_token').val(),
                id : id,
            },
            function(result){
                if(result){
                    alert('Sucessful Saved!');
                   $('tbody tr td[id='+ id +']').parent().empty();
                }
            }
        )

    });

});
