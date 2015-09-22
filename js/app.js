function processData(data) {
    var deleteLink = '<a href="#">X</a>';
    var tableInput = data.map(function appendDeleteLink(group) {
        var groupProperties = [];
        for(var prop in group) {
            if( group.hasOwnProperty(prop)) {
                groupProperties.push(group[prop]);
            }
        }
        groupProperties.push(deleteLink);
        return groupProperties;
    });
    
    
    return tableInput;
}

function renderData(data) {
    var table = $('#table')[0];
    if ( $.fn.dataTable.isDataTable( table ) ) {
        $(table).DataTable().destroy();
        $(table).html();
    }
    $('#table').dataTable( {
        "data": data,
        "columns": [
            { "title": "Order", "class": "group-order" },
            { "title": "Id", "class": "group-id" },
            { "title": "Name (PL)", "class": "group-name-pl" },
            { "title": "Name (EN", "class": "group-name-en"},
            { "title": "Members count", "class": "group-members-count" },
            { "title": "Active", "class": "group-is-active" },
            { "title": "Delete", "class": "group-delete" },
            
        ]
    } );  
   
}

function fetchData() {
    $.ajax({
        url: "list.php",
        method: "get",
        success: function(data) {
            console.log(data);
            console.log(typeof data);
            var processedData = processData(data);
            renderData(processedData);
        },
        fail: function(err) {
            console.log(err);
        }
    });
}

var viewModel = {
    data: []
}

$("document").ready(function init(argument) {
    viewModel.data = fetchData();
})