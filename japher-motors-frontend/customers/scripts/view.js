$(document).ready(function () {
    var searchCustomerInput = document.getElementById("searchCustomerInput");
    searchCustomerInput.addEventListener("keyup", function (event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.searchCustomer.submit();
        }
    });

    $(".deleteBtn").click(function () {
        var customerId = $(this).parents("div").attr("id");
        if (confirm('Are you sure want to delete this customer?')) {
            $.ajax({
                url: '../customers/view.php',
                type: 'GET',
                data: { deletedCustomerId: customerId },
                error: function () {
                    alert('Something is wrong');
                },
                success: function (data) {
                    location.reload();
                }
            });
        }
    });
});