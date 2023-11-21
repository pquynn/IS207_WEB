import { jsPDF } from "jsPDF";

// add new



// edit



// delete
document.addEventListener('DOMContentLoaded', function() {
const deleteButtons = document.querySelectorAll('.btn-delete');

// Add a click event listener to each delete button
deleteButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        if (confirm('Xác nhận xóa ' + $('.section_heading').text() + ' ?')) {
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
// document.getElementsByClassName('btn-export').addEventListener('click', function() {
//     // Create a new jsPDF instance
//     const doc = new jsPDF();

//     // Add the table content to the PDF
//     doc.autoTable({ html: '#category-table'});

//     // Save the PDF file
//     // doc.save('product_table.pdf');

//      // Save the PDF file with user-defined name and location
//      doc.saveAs({ content: 'table.pdf' });
//   });

// document.addEventListener('DOMContentLoaded', function() {
//     const exportButton = document.querySelector('.btn-export');
  
//     exportButton.addEventListener('click', function() {
//       const table = document.querySelector('.category-table');
  
//       if (table) {
//         const doc = new jsPDF();
//         doc.autoTable({ html: table });
  
//         // Save the PDF file with user-defined name and location
//         doc.saveAs({ content: 'admin_table.pdf'});
//       } else {
//         console.error('Table not found');
//       }
//     });
//   });
// Converting HTML table to EXCEL File

const excel_btn = document.querySelector('.btn-export');

const toExcel = function (table) {
    // Code For SIMPLE TABLE
    // const t_rows = table.querySelectorAll('tr');
    // return [...t_rows].map(row => {
    //     const cells = row.querySelectorAll('th, td');
    //     return [...cells].map(cell => cell.textContent.trim()).join('\t');
    // }).join('\n');

    const t_heads = table.querySelectorAll('th'),
        tbody_rows = table.querySelectorAll('tbody tr');

    const headings = [...t_heads].map(head => {
        let actual_head = head.textContent.trim().split(' ');
        return actual_head.splice(0, actual_head.length - 1).join(' ').toLowerCase();
    }).join('\t') + '\t' + 'image name';

    const table_data = [...tbody_rows].map(row => {
        const cells = row.querySelectorAll('td'),
            img = decodeURIComponent(row.querySelector('img').src),
            data_without_img = [...cells].map(cell => cell.textContent.trim()).join('\t');

        return data_without_img + '\t' + img;
    }).join('\n');

    return headings + '\n' + table_data;
}

excel_btn.onclick = () => {
    const excel = toExcel(customers_table);
    downloadFile(excel, 'excel');
}

const downloadFile = function (data, fileType, fileName = '') {
    const a = document.createElement('a');
    a.download = fileName;
    const mime_types = {
        'json': 'application/json',
        'csv': 'text/csv',
        'excel': 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    }
    a.href = `
        data:${mime_types[fileType]};charset=utf-8,${encodeURIComponent(data)}
    `;
    document.body.appendChild(a);
    a.click();
    a.remove();
}