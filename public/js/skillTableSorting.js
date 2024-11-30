$(document).ready(function() {
    // Sorting functionality
    $('#skillsTable thead th').on('click', function() {
        var columnIndex = $(this).index();  // Get column index
        var rows = $('#skillsTable tbody tr').get();  // Get table rows

        // Toggle the sorting direction (ascending/descending)
        var isAscending = $(this).hasClass('asc');
        $('#skillsTable thead th').removeClass('asc desc');  // Remove previous sorting class
        $(this).addClass(isAscending ? 'desc' : 'asc');  // Toggle sort direction class

        // Sort rows
        rows.sort(function(a, b) {
            var A = $(a).children('td').eq(columnIndex);
            var B = $(b).children('td').eq(columnIndex);

            // Check if the column is "skill_id" (assuming it's the first column)
            if (columnIndex === 0) {  // skill_id column
                var idA = parseInt(A.text().trim(), 10);  // Parse as integer
                var idB = parseInt(B.text().trim(), 10);  // Parse as integer

                return isAscending ? idA - idB : idB - idA;
            } else if (columnIndex === 2) { // Column containing ratings (assuming 3rd column is ratings)
                var ratingA = parseFloat(A.attr('data-rating'));
                var ratingB = parseFloat(B.attr('data-rating'));

                // Compare numeric values for sorting
                return isAscending ? ratingA - ratingB : ratingB - ratingA;
            } else {
                // For other columns, fall back to string comparison
                var textA = A.text().toLowerCase();
                var textB = B.text().toLowerCase();
                return isAscending ? textA.localeCompare(textB) : textB.localeCompare(textA);
            }
        });

        // Append sorted rows back to the table body
        $.each(rows, function(index, row) {
            $('#skillsTable tbody').append(row);
        });
    });
});
