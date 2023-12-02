var tbl_id, tbl_login, tbl_name, tbl_phone, tbl_birthday, tbl_gender,
tbl_address, tbl_dayadd;


$(document).ready(function () {
    var namePage = $('.section_heading').text();

    // Fetch data using AJAX
    // Initialize the page to 1
    var currentPage = 1;
    fetchData(currentPage);

    // when btn-add button is clicked
    $('.btn-add').click(function (event){
        $('h1.modal-title').text('Thêm mới ' + namePage);
        $('.btn-confirm').text('Thêm mới');

        // Clear the data and reset the form validation in the modal
        var modal = document.getElementById('add-new');
        modal.querySelector('form').reset(); // Reset the form

        Array.from(modal.querySelectorAll('.was-validated')).forEach((element) => {
            element.classList.remove('was-validated'); // Clear Bootstrap form validation classes
        });
    })


    // when submit #modal-form
    $('#modal-form').submit(function (event) { 
        event.preventDefault();
    

        var form = $(this);
        var btn_name = $('#modal-form .btn-confirm').text();
        // Create a temp_customer object
        var temp_employee = {
            username: $('#employee-username').val(),
            name: $('#employee-name').val(),
            phone: $('#employee-phone').val(),
            date_of_birth: $('#employee-date-of-birth').val(),
            gender: $('#employee-gender').val(),
            address: $('#employee-address').val(),
            role: $('#employee-role').val()
        };
    
        if(btn_name.localeCompare("Thêm mới") == 0){
            //insert 
            Array.from(form).forEach(form_element => {
            
                if (form_element.checkValidity() === false) {
                    //TODO: PHẢI CHECK ĐỂ HIỆN LỖI TỪNG CÁI THOI
                    //TODO: CHECK LẠI FORM-VALIDATION
                    event.stopPropagation();
                    $('.invalid-feedback.username').html('Yêu cầu nhập tên đăng nhập!');
                    $('.invalid-feedback.name').html('Yêu cầu nhập tên nhân viên!');
                    $('.invalid-feedback.phone').html('Yêu cầu nhập số điện thoại!');
                    $('.invalid-feedback.role').html('Yêu cầu chọn vai trò!');

                    var isValid = /^0[0-9]{9}$/.test(temp_employee.phone);
                    if(!isValid)
                    {
                        $('#employee-name').addClass('is-invalid');
                        $('.invalid-feedback.phone').html('Điện thoại phải có 10 số và bắt đầu = 0!');
                    }
                } else 
                {
                    insertcustomer(temp_customer);
                }
                
                form.addClass('was-validated');
            })
        }
        else{
            //update
            Array.from(form).forEach(form_element => {
            
                if (form_element.checkValidity() === false) {
                    event.stopPropagation();
                    $('.invalid-feedback.username').text('Yêu cầu nhập tên đăng nhập!');
                    $('.invalid-feedback.name').text('Yêu cầu nhập tên nhân viên!');
                    $('.invalid-feedback.phone').text('Yêu cầu nhập số điện thoại!');
                    $('.invalid-feedback.role').text('Yêu cầu chọn vai trò!');
                } 
                else 
                    updatecustomer(temp_customer);
        
                form.addClass('was-validated');
            })
        }

        
    });

    //delete
    //TODO: nên check điều kiên xóa ở csdl nữa
    // Event listener for the "Delete" button
    $('.admin-table').on('click', '.btn-delete', function (e) {
        e.preventDefault();

        // Show a confirmation dialog
        if (confirm('Xác nhận xóa ' + namePage + ' ?')) {
            // Get the customer_id from the first column of the row
            tbl_id = $(this).closest('tr').find('td:first').text();
            tbl_login = $(this).closest('tr').find('td:eq(1)').text();
            // User confirmed, proceed with deletion
            deletecustomer(tbl_id, tbl_login);

            $(this).closest('tr').remove();
        }
    });


    // Event listener for the "Edit" button
    $('.admin-table').on('click', '.btn-edit',function (e) {
        e.preventDefault();

        // Get the closest row to the clicked button
        var closest_row = $(this).closest('tr');
        // Get the datas from the row
        tbl_customer_id = closest_row.find('td:first').text();
        tbl_customer_name = closest_row.find('td:eq(1)').text();

        // Remove the is-invalid class in form-controls
        var modal = document.getElementById('add-new');
        Array.from(modal.querySelectorAll('.is-invalid')).forEach((element) => {
            element.classList.remove('is-invalid'); // Clear Bootstrap form validation classes
        });
        
        $('#customer-name').val(tbl_customer_name);
        // Populate the modal form with the fetched customer_name
        $('h1.modal-title').text('Thông tin ' + namePage);
        $('.btn-confirm').text('Thay đổi');

        

        // Fetch the current customer_name for the selected customer_id
        // $.ajax({
        //     url: 'get_customer.php',
        //     type: 'POST',
        //     data: { customer_id: customer_id },
        //     dataType: 'json',
        //     success: function (response) {
        //         // Populate the modal form with the fetched customer_name
        //         $('#customer-name').val(response.customer_name);

        //         // Show the modal
        //         $('#add-new').modal('show');
        //     },
        //     error: function () {
        //         console.error('Failed to fetch customer data.');
        //     }
        // });

    });

    // Event listener for the "Search" button
    $('#search').on('keyup', function () {
        var searchTerm = $('#search').val();

        // Fetch data based on the search term
        if(searchTerm.localeCompare('') != 0)
            fetchSearchData(searchTerm, 1);
        else
            fetchData(1);
    });

})

//function to fetch data in database to table
function fetchData(page){
    $.ajax({
        url: '../../php/controller/admin/customer-controller.php?action=fetch', //TODO: nhớ sửa lại nếu đổi thành post
        type: 'GET',
        data: { page: page },
        dataType: 'json',
        success: function (response) {
            var data = response.data;
            var totalPages = response.totalPages;
            
            // Populate the table with fetched data
            var table_body = $('.admin-table table tbody');
            table_body.empty(); 

            data.forEach(function (row) {
                table_body.append(`
                    <tr>
                        <td> ${row.USER_ID} </td>
                        <td> ${row.USER_LOGIN} </td>
                        <td> ${row.USER_TELEPHONE} </td>
                        <td> ${row.USER_NAME} </td>
                        <td> ${row.BIRTHDAY} </td>
                        <td> ${row.GENDER} </td>
                        <td style="max-width: 130px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"> ${row.ADDRESSS} </td>
                        <td> ${row.DAY_ADD} </td>
                        <td class="action">
                            <a href="#" class="btn-edit" data-bs-toggle="modal" data-bs-target="#add-new"><i class="fa-solid fa-pen"></i></a>
                            <a href="#" class="btn-delete"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                `);
            });

            updatePagination(page, totalPages);
        },
        error: function () {
            console.error('Failed to fetch data from the server.');
        }
    });
}

//function to update pagination and fetch the data based on the current page
function updatePagination(currentPage, totalPages) {

    // Clear existing pagination links
    $('.pagination').empty();
  
    // Add "Previous" link
    $('.pagination').append(`<a href="#" data-page="${currentPage - 1}">&laquo;</a>`);
  
    // Add numbered links
    for (var i = 1; i <= totalPages; i++) {
        var activeClass = (i === currentPage) ? 'active' : '';
        $('.pagination').append(`<a class="${activeClass}" href="#" data-page="${i}">${i}</a>`);
    }
  
    // Add "Next" link
    $('.pagination').append(`<a href="#" data-page="${currentPage + 1}">&raquo;</a>`);
  
    // Use event delegation for click events on pagination links
    $('.pagination').on('click', 'a', function(event) {
        event.preventDefault();
        var clickedPage = parseInt($(this).data('page'));
    
        if (!isNaN(clickedPage)) {
            fetchData(clickedPage);
        }
    });
  }


// Function to insert customer into the database
function insertcustomer(customer) {
    $.ajax({
        url: '../../php/controller/admin/customer-controller.php?action=insert',
        type: 'GET',
        data: { customer: customer },
        dataType: 'json',
        success: function (result) {
        if (result === true) {
            //TODO: THÔNG BÁO THÊM THÀNH CÔNG
            // customer inserted successfully, close the modal and perform any other necessary actions
            $('#add-new').modal('hide');

            var current_page = parseInt($('.pagination a.active').data('page'));
            fetchData(current_page); //TODO: lúc reload thì hiện trang của sp đc thêm hay reload trang hiện tại thoi?
        } 
        else {
            // customer name exists, show an error message
            $('#customer-name').addClass('is-invalid');//TODO: border-color of form-control is not change into red
            $('.invalid-feedback').html( 'Nhân viên đã có trong hệ thống!');
            // $('#modal-form').addClass('was-validated');
        }
        },
        error: function () {
            console.error('Failed to insert customer.');
        }
    });
}

// function to update a customer
function updatecustomer(customer){
    // check if the new customer name is the old customer name
    if(customerName.localeCompare(tbl_customer_name) != 0){ //TODO: có nên so sánh các giá trị
        // Check if the customer name already exists
        $.ajax({
            url: '../../php/controller/admin/customer-controller.php?action=update',
            type: 'GET',
            data: { customer: customer},
            dataType: 'json',
            success: function (result) {
                if (result == true) {
                    //TODO: THÔNG BÁO cập nhật THÀNH CÔNG
                    // customer inserted successfully, close the modal and perform any other necessary actions
                    $('#add-new').modal('hide');
        
                    var current_page = parseInt($('.pagination a.active').data('page'));
                    fetchData(current_page); //TODO: lúc reload thì hiện trang của sp đc thêm hay reload trang hiện tại thoi?
                } 
                else {
                    // customer name exists, show an error message
                    $('#customer-name').addClass('is-invalid');//TODO: border-color of form-control is not change into red
                    $('.invalid-feedback').html( 'Nhân viên đã có trong hệ thống!');
                    $('#modal-form').addClass('was-validated');
                }
                },
                error: function () {
                    console.error('Failed to insert customer.');
                }
        });
    }
    else{
        //TODO: THÔNG BÁO cập nhật THÀNH CÔNG
        // customer inserted successfully, close the modal and perform any other necessary actions
        // Clear the data and reset the form validation in the modal
        $('#add-new').modal('hide');
    }
}

// Function to delete customer by customer_id
function deletecustomer(customerId, customerLogin) {
    $.ajax({
        url: '../../php/controller/admin/customer-controller.php?action=delete',
        type: 'GET',
        data: { customer_id: customerId, customer_login: customerLogin },
        success: function () {
            //TODO: hiện thông báo xóa thành công
        },
        error: function () {
            console.error('Failed to delete customer.');
        }
    });
}


// Function to fetch data based on search term (customer name)
function fetchSearchData(searchTerm, page) {
    $.ajax({
        url: '../../php/controller/admin/customer-controller.php?action=search',
        type: 'GET',
        data: { searchTerm: searchTerm, page: page },
        dataType: 'json',
        success: function (response) {
            var data = response.data;
            var totalPages = response.totalPages;

            var table_body = $('.admin-table table tbody');
            table_body.empty();

            data.forEach(function (row) {
                table_body.append(`
                    <tr>
                        <td> ${row.USER_ID} </td>
                        <td> ${row.USER_LOGIN} </td>
                        <td> ${row.USER_TELEPHONE} </td>
                        <td> ${row.USER_NAME} </td>
                        <td> ${row.BIRTHDAY} </td>
                        <td> ${row.GENDER} </td>
                        <td style="max-width: 130px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"> ${row.ADDRESSS} </td>
                        <td> ${row.DAY_ADD} </td>
                        <td class="action">
                            <a href="#" class="btn-edit" data-bs-toggle="modal" data-bs-target="#add-new"><i class="fa-solid fa-pen"></i></a>
                            <a href="#" class="btn-delete"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                `);
            });

            updatePagination(page, totalPages);
        },
        error: function () {
            console.error('Failed to fetch data from the server.');
        }
    });
}




// // Function to fetch roles from the server
// function fetchRoles() {
//     $.ajax({
//         url: '../../php/controller/admin/customer-controller.php?action=fetch-roles',
//         type: 'GET',
//         dataType: 'json',
//         success: function (data) {
//             var selectElement = $('#customer-role');
//             selectElement.empty();
//             selectElement.append(`<option value="" disabled selected hidden>Chọn vai trò</option>`);

//             data.forEach(function (row) {
//                 selectElement.append(
//                     `<option value="${row.role_id}">${row.role_name}</option>`
//             );});
//         },
//         error: function () {
//             console.error('Failed to fetch roles from the server.');
//         }
//     });
// }

// // Handle "Save Changes" button click
// // $('#saveChanges').on('click', function () {
// //     var selectedRoleId = $('#customer-role').val();
// //     if (selectedRoleId) {
// //         console.log('Selected Role ID:', selectedRoleId);
// //         // Add your logic here to handle the selected role ID
// //     } else {
// //         console.log('Please select a role.');
// //     }
// // });



