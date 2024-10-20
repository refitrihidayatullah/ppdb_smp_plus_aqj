

    <!-- resources/views/npsnForm.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter NPSN</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Enter School NPSN</h1>

    <!-- Form to enter NPSN -->
    <form id="npsnForm">
        @csrf
        <label for="npsn">NPSN:</label>
        <input type="text" id="npsn" name="npsn" placeholder="Enter NPSN (8 digits)" required>
        <button type="submit">Get School Data</button>
    </form>

    <!-- Div to display error messages -->
    <div id="error" style="color: red;"></div>

    <!-- Div to display school data -->
    <div id="schoolData" style="margin-top: 20px;"></div>

    <script>
        // Handle form submission with jQuery AJAX
        $('#npsnForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            var npsn = $('#npsn').val(); // Get the NPSN input value
            var token = $('input[name="_token"]').val(); // Get the CSRF token

            // Clear previous error or data
            $('#error').text('');
            $('#schoolData').html('');

            // Perform AJAX request
            $.ajax({
                url: "{{ route('test-school/get-school-data') }}",
                type: 'POST',
                data: {
                    _token: token,
                    npsn: npsn
                },
                success: function(response) {
                    if (response.status === 'success') {
                        // Display the school data
                        var school = response.school;
                        var html = '<h2>School Information</h2>' +
                                   '<p><strong>School Name:</strong> ' + school.sekolah + '</p>' +
                                   '<p><strong>Province:</strong> ' + school.propinsi + '</p>' +
                                   '<p><strong>City:</strong> ' + school.kabupaten_kota + '</p>' +
                                   '<p><strong>Subdistrict:</strong> ' + school.kecamatan + '</p>' +
                                   '<p><strong>Address:</strong> ' + school.alamat_jalan + '</p>' +
                                   '<p><strong>Latitude:</strong> ' + school.lintang + '</p>' +
                                   '<p><strong>Longitude:</strong> ' + school.bujur + '</p>';
                        $('#schoolData').html(html);
                    } else {
                        // Display error message
                        $('#error').text(response.message);
                    }
                },
                error: function(xhr) {
                    // Display error message in case of request failure
                    $('#error').text('An error occurred. Please try again.');
                }
            });
        });
    </script>
</body>
</html>
