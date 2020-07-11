function getContacts() {
	axios.get('/contact')
		.then(function (response) {

			if (response.status == 200) {
				$('#mainDiv').removeClass('d-none');
				$('#loading').addClass('d-none');
				$('#contactTable').DataTable().destroy();
				$('#contact').empty();
				var jsonData = response.data;
				$.each(jsonData, function (i, item) {
					$('<tr>').html(
						"<td>" + jsonData[i].contact_name + "</td>" +
						"<td>" + jsonData[i].contact_mobile + "</td>" +
						"<td>" + jsonData[i].contact_email + "</td>" +
						"<td>" + jsonData[i].contact_msg + "</td>" +

						"<td><a  class='delete' data-id=" + jsonData[i].id + " ><i class='fas fa-trash-alt'></i></a> </td>"

					).appendTo('#contact')
				});


				$('.delete').click(function () {
					var id = $(this).data('id');

					$('#deleteModal').modal('show');
					$('#Did').html(id);
				})


				$('#contactTable').DataTable();
				$('.dataTables_length').addClass('bs-select');


            } 
            
            else {

				$('#wrongDiv').removeClass('d-none');
				$('#loading').addClass('d-none');


			}

		})
		.catch(function (error) {

			$('#wrongDiv').removeClass('d-none');
			$('#loading').addClass('d-none');

		});


}