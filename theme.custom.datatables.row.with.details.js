
(function ($) {

	'use strict';

	var datatableInit = function () {
		var $table = $('#datatable-details');

		// format function for row details
		var fnFormatDetails = function (datatable, tr) {
			var data = datatable.fnGetData(tr);
			return [
				'<table class="table mb-none">',
				'<tr class="b-top-none">',
				'<td><label class="mb-none">ID Cliente:</label></td>',
				'<td>' + data[1] + ' ' + data[4] + '</td>',
				'</tr>',
				'<tr>',
				'<td><label class="mb-none">Link to source:</label></td>',
				'<td>Could provide a link here</td>',
				'</tr>',
				'<tr>',
				'<td><label class="mb-none">Extra info:</label></td>',
				'<td>And any further details here (images etc)</td>',
				'</tr>',
				'</div>'
			].join('');
		};

		// insert the expand/collapse column
		var th = document.createElement('th');
		var td = document.createElement('td');
		td.innerHTML = '';
		td.className = "text-center";

		// initialize
		var datatable = $table.dataTable({
			aoColumnDefs: [{
				bSortable: false,
				aTargets: [0]
			}],
			aaSorting: [
				[0, 'desc']
			]
		});

		// add a listener
		$table.on('click', 'i[data-toggle]', function () {
			var $this = $(this),
				tr = $(this).closest('tr').get(0);

			if (datatable.fnIsOpen(tr)) {
				$this.removeClass('fa-minus-square-o').addClass('fa-plus-square-o');
				datatable.fnClose(tr);
			} else {
				$this.removeClass('fa-plus-square-o').addClass('fa-minus-square-o');
				datatable.fnOpen(tr, fnFormatDetails(datatable, tr), 'details');
			}
		});
	};

	$(function () {
		datatableInit();
	});

}).apply(this, [jQuery]);