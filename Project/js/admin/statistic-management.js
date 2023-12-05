$(document).ready(function () {
    // Fetch data on page load
    fetchData();

    // Function to fetch order counts from the server
    function fetchData() {
        $.ajax({
            url: '../../php/controller/admin/statistic-controller.php', // Replace with the actual PHP file name
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                updateDisplay(data);
            },
            error: function () {
                console.error('Failed to fetch order counts from the server.');
            }
        });
    }

    // Function to update the display with order counts
    function updateDisplay(counts) {
        $('.pending-box .number-display').text(counts['Đang chuẩn bị hàng'] || 0);
        $('.delivering-box .number-display').text(counts['Đang giao hàng'] || 0);
        $('.canceling-box .number-display').text(counts['Đã hủy'] || 0);
    }
});
