$(document).ready(function() {
	$('#subcategory_table').dataTable({
		"ajax": {
			"url": baseUrl + '/handlers/SubcategoriaHandler.php',
			"dataSrc": ""
		},
		"columns": [
			{"data": "id"},
			{"data": "name"}
		]
	});
});