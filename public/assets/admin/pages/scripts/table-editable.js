var TableEditable = function () {

    var handleTable = function () {

        function restoreRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);

            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                oTable.fnUpdate(aData[i], nRow, i, false);
            }

            oTable.fnDraw();
        }

        function format(state) {
            if (!state.id) return state.text; // optgroup
            return  state.text;
        }

        function editRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
            var default_sel
            var locations_length = window.locations.length;
            var locations = [];
            var locations_id = [];
            for (i = 0; i < locations_length; i++) {
                locations.push(window.locations[i].location_name);
                locations_id.push(window.locations[i].id);
            }
            var option_location = '';
            for (i = 0; i < locations_length; i++) {
                if(locations[i] == aData[2]){
                    option_location1 = '<option value="' + locations_id[i] + '" selected>' + locations[i] + '</option>';
                }else{
                    option_location1 = '<option value="' + locations_id[i] + '">' + locations[i] + '</option>';
                }
                option_location += option_location1;
            }
            jqTds[0].innerHTML = '<input type="date" class="form-control input-small" value="' + aData[0] + '">';
            jqTds[1].innerHTML = '<input type="number" class="form-control input-small" value="' + aData[1] + '" min="1">';
            jqTds[2].innerHTML = '<select name="" id="select2_sample4" class="form-control select2" value="' + default_sel + '">' +
                option_location +
                '</select>';
            jqTds[3].innerHTML = '<textarea class="form-control input-large" value="">' + aData[3] + '</textarea>';
            jqTds[4].innerHTML = '<a class="edit" href="">Save</a>';
            jqTds[5].innerHTML = '<a class="cancel" href="">Cancel</a>';

            $("#select2_sample4").select2({
                placeholder: "Select a Country",
                allowClear: true,
                formatResult: format,
                formatSelection: format,
                escapeMarkup: function (m) {
                    return m;
                }
            });
        }

        function saveRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            var jqSelect = $('select',nRow);
            var jqTextarea = $('textarea',nRow);
            // console.log(JSON.stringify(jqInputs));

            // console.log(JSON.stringify(jqSelect[0].value));
            var locations_length = window.locations.length;
            for (i = 0; i < locations_length; i++){
                if(window.locations[i].id == jqSelect[0].value){
                    str = window.locations[i].location_name;
                    // console.log(JSON.stringify(window.locations[i].location_name));
                }
            }
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            oTable.fnUpdate(str, nRow, 2, false);
            oTable.fnUpdate(jqTextarea[0].value, nRow, 3, false);
            oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 4, false);
            oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 5, false);
            oTable.fnDraw();
        }

        function cancelEditRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
            oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
            oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 4, false);
            oTable.fnDraw();
        }

        var table = $('#sample_editable_1');

        var oTable = table.dataTable({

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},

            // set the initial value
            "pageLength": 10,

            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            }],
            "order": [
                [0, "asc"]
            ] // set first column as a default sort by asc
        });

        var tableWrapper = $("#sample_editable_1_wrapper");

        tableWrapper.find(".dataTables_length select").select2({
            showSearchInput: false //hide search box with special css class
        }); // initialize select2 dropdown

        var nEditing = null;
        var nNew = false;

        $('#sample_editable_1_new').click(function (e) {
            e.preventDefault();

            if (nNew && nEditing) {
                if (confirm("Previose row not saved. Do you want to save it ?")) {
                    saveRow(oTable, nEditing); // save
                    $(nEditing).find("td:first").html("Untitled");
                    $(nEditing).find("td:nth-chid(1)").html("Untitled");
                    $(nEditing).find("td:nth-chid(2)").html("Untitled");
                    $(nEditing).find("td:nth-chid(3)").html("Untitled");

                    nEditing = null;
                    nNew = false;

                } else {
                    oTable.fnDeleteRow(nEditing); // cancel
                    nEditing = null;
                    nNew = false;

                    return;
                }
            }

            var aiNew = oTable.fnAddData(['', '', '', '', '', '']);
            var nRow = oTable.fnGetNodes(aiNew[0]);
            editRow(oTable, nRow);
            nEditing = nRow;
            nNew = true;
        });

        table.on('click', '.delete', function (e) {
            e.preventDefault();

            if (confirm("Are you sure to delete this row ?") == false) {
                return;
            }

            console.log($(this).parents('tr').find('td:nth-child(1)').attr('val'));
            $.post(
                'delete',
                {
                    _token : $('input#page_token').val(),
                   id :  $(this).parents('tr').find('td:nth-child(1)').attr('val'),
                },
                function(result){
                    console.log(result);
                }
            );
            var nRow = $(this).parents('tr')[0];
            oTable.fnDeleteRow(nRow);
        });

        table.on('click', '.cancel', function (e) {
            e.preventDefault();
            if (nNew) {
                oTable.fnDeleteRow(nEditing);
                nEditing = null;
                nNew = false;
            } else {
                restoreRow(oTable, nEditing);
                nEditing = null;
            }
        });

        table.on('click', '.edit', function (e) {
            e.preventDefault();

            /* Get the row as a parent of the link that was clicked on */
            var nRow = $(this).parents('tr')[0];

            if (nEditing !== null && nEditing != nRow) {
                /* Currently editing - but not this row - restore the old before continuing to edit mode */
                restoreRow(oTable, nEditing);
                editRow(oTable, nRow);
                nEditing = nRow;
            } else if (nEditing == nRow && this.innerHTML == "Save") {
                /* Editing this row and want to save it */
                var save_type ='';
                if($(this).parents('tr').find('td:nth-child(1)').attr('val') == undefined){
                    save_type = 'add';
                }
                else{
                    save_type = 'edit';
                }
                $.post(
                    'edit',
                    {   
                        _token : $('input#page_token').val(),
                        item_location_id : $('input#item_id').val(),
                        type : save_type,
                        id: $(this).parents('tr').find('td:nth-child(1)').attr('val'),
                        date : $(this).parents('tr').find('td:nth-child(1)').find('input').val(),
                        qty : $(this).parents('tr').find('td:nth-child(2)').find('input').val(),
                        locations_id : $(this).parents('tr').find('td:nth-child(3)').find('select').val(),
                        note : $(this).parents('tr').find('td:nth-child(4)').find('textarea').val(),

                    },
                    function (result) {
                        saveRow(oTable, nEditing);
                        nEditing = null;
                    }
                );
            } else {
                /* No edit in progress - let's start one */
                editRow(oTable, nRow);
                nEditing = nRow;
            }
        });
    }

    return {

        //main function to initiate the module
        init: function () {
            handleTable();
        }

    };

}();