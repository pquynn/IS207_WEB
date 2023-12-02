const page_name = $('.section_heading').text();
const table = document.querySelector('.admin-table table');
// add new



// edit



// delete
document.addEventListener('DOMContentLoaded', function() {
const deleteButtons = document.querySelectorAll('.btn-delete');

// Add a click event listener to each delete button
deleteButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        if (confirm('Xác nhận xóa ' + page_name + ' ?')) {
            // Get the parent row of the clicked delete button
            const row = this.closest('tr'); 

            // Remove the parent row from the table
            row.remove(); // TODO: check điều kiện tự server xem có xóa được ko
        } else {
        
        }
        
    });
  });
});
    
// pagination??

// search bar??


// export file
// Converting HTML table to EXCEL File

const export_btn = document.querySelector('.btn-export');

const toExcel = function (table, includeImages) {
    const t_heads = table.querySelectorAll('th');
    const tbody_rows = table.querySelectorAll('tr');

    const headings = [...t_heads].slice(0, -1).map(head => {
        let actual_head = head.textContent.trim().split(' ');
        return actual_head.join(' ');
    });

    const table_data = [...tbody_rows].map(row => {
        const cells = row.querySelectorAll('td');
        const data_without_img = [...cells].slice(0, -1).map(cell => cell.textContent.trim());
        return data_without_img;
    });

    if (includeImages) {
        // TODO:Include logic to handle exporting images if needed
    }

    const data = [headings, ...table_data];
    return data;
}

export_btn.addEventListener('click', () => {
    const data = toExcel(table, true);
    const worksheet = XLSX.utils.aoa_to_sheet(data);
    const workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, worksheet, 'Sheet1');
    var file_name = page_name + '.xlsx';
    XLSX.writeFile(workbook, file_name);
});



