// admin_services.js

$(document).ready(function () {
  // Show Create Service Modal
  $("#createServiceModal").on("show.bs.modal", function (e) {
    // Clear any existing form data
    $("#createServiceForm")[0].reset();
  });

  // Show Edit Service Modal
  $("#editServiceModal").on("show.bs.modal", function (e) {
    // Get the ID of the service to edit
    var serviceId = $(e.relatedTarget).data("service-id");

    // Load service data using AJAX and populate the modal form
    // This is a placeholder, replace it with your actual AJAX call
    // $.ajax({
    //     url: 'get_service_details.php',
    //     method: 'GET',
    //     data: { id: serviceId },
    //     success: function (response) {
    //         // Populate the form with service details
    //         // Example: $('#editServiceName').val(response.name);
    //     },
    //     error: function (error) {
    //         console.error('Error fetching service details:', error);
    //     }
    // });
  });

  // Show Delete Service Modal
  $("#deleteServiceModal").on("show.bs.modal", function (e) {
    // Get the ID of the service to delete
    var serviceId = $(e.relatedTarget).data("service-id");

    // Optionally, display the service name or other information in the modal for confirmation

    // Handle the delete button click event
    $("#confirmDeleteService").on("click", function () {
      // Make an AJAX request to delete the service by ID
      // This is a placeholder, replace it with your actual AJAX call
      // $.ajax({ url: 'delete_service.php', method: 'POST', data: { id: serviceId } });

      // Close the modal after deleting the service
      $("#deleteServiceModal").modal("hide");
    });
  });

  // Handle the form submission for creating/editing services
  $("#createServiceForm, #editServiceForm").submit(function (e) {
    e.preventDefault();
    // Extract form data and make an AJAX request to create/edit the service
    // This is a placeholder, replace it with your actual AJAX call
    // $.ajax({ url: 'create_edit_service.php', method: 'POST', data: $(this).serialize() });
    // Close the modal after submitting the form
    $("#createServiceModal, #editServiceModal").modal("hide");
  });
});
