<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Job Application</title>
</head>
<body>
    <div>
        <h1>Phone numbers</h1>

        <!-- Fill this select with countries -->
        <select name="country" id="country">
            <option id="-1" value="-1">Select country</option>
            <?php 
                foreach($_SESSION["countryList"] as $country){
                    echo "<option id='".$country['id']."' value=''>".$country["name"]."</option>";
                }
            ?>
        </select>

        <select name="validNumber" id="validNumber">
            <option value="ALL">All phone numbers</option>
            <option value="OK">Valid phone numbers</option>
            <option value="NOK">Invalid phone numbers</option>
        </select>
    </div>
    <div>
        <table id="table" border="1">
            <thead>
                <tr>
                    <td>Country</td>
                    <td>State</td>
                    <td>Country code</td>
                    <td>Phone num.</td>
                </tr>
            </thead>
            <tbody>
            <?php 
            foreach ($_SESSION["costumers"] as $costumer){
                echo '<tr>';
                echo '    <td> '.$costumer["Country"].' </td>';
                echo '    <td> '.$costumer["State"].' </td>';
                echo '    <td> '.$costumer["Country Code"].'</td>';
                echo '    <td> '.$costumer["Phone num."].'</td>';
                echo '</tr>';
            } ?>
            <tbody>
        </table>
    </div>
    
    <!-- IMPORT DATATABLES JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready( function () {
            /* Using Datatable */
            var myTable = $('#table').DataTable({
                "order": [
                    [ 0, "asc"],
                    [ 1, "desc" ]
                ],
                "search": {
                    "regex": true
                }
            } );
            
            /* If select country has been changed */
            $("#country").on('change', function(e) {
                var searchThis = $("#country option:selected").text();
                if ($('select[name=country]').val() == -1){
                    searchThis = "";
                }
                
                myTable.column(0).search(searchThis);
                myTable.draw();
            });

            /* If select validNumber has been changed */
            $("#validNumber").on('change', function(e) {
                var searchThis = $('select[name=validNumber]').val();
                if (searchThis == "ALL"){
                    searchThis = "";
                    myTable.column(1).search("");
                }else {
                    myTable.column(1).search("^" + searchThis + "$", true, true, false)
                }
                myTable.draw();
            });

        } );
    </script>
</body>
</html>