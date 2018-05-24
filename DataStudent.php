<!DOCTYPE html>
<?php
require 'vendor/autoload.php';
require_once('HeaderLayout.php');
?>

<body>
<br />


<!--Data Manipulation Button Group-->
<div class="btn-toolbar">
    <div class = 'btn-group-justified'>

        <!--Add button-->
        <button type="button" class="btn btn-primary" data-toggle = "tooltip" data-placement = "top" style = "width: 100px;" title = "Add Entry to Table">
            <a data-toggle = "modal" data-target = "#AddModal" style = color:white>Add</a>
        </button>

        <!--Remove button-->
        <button type="button" class="btn btn-primary" data-toggle = "tooltip" data-placement = "top" style = "width: 100px;" title = "Remove Entry from Table">
            <a data-toggle = "modal" data-target = "#RemoveModal" style = color:white>Remove</a>
        </button>

        <!--Update button-->
        <button class="btn btn-primary dropdown-toggle" onclick="myFunction()" type="button" data-placement = "top" style = "width: 100px;" title = "Update Entry in Table">Update
            <span class="caret"></span></button>
        <div id = "myDropdown" class = "dropdown-content" style = "left: 55%;">
            <input id="myInput" type="text" placeholder="Search.." onkeyup="filterFunction()">
            <a href="#" data-toggle = "modal" data-target = "#UpdateStudentNameModal">Student Name</a>
            <a href="#" data-toggle = "modal" data-target = "#UpdateStudentImageModal">Student Image</a>
        </div>

    </div>
</div>



<script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    function filterFunction() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        div = document.getElementById("myDropdown");
        a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }

</script>

<br/>
<h2 style = "font-size: 2vw;"><center><u>Student Data</u></center></h2>

<hr width = 75%>

<p position = relative top = "200px" align = 'center'>Using the buttons provided, select a function to perform on the data displayed below. Note: Any changes you make to the data below will also be carried over to the master table on the Home Page.</p>
<br />
<br />

<!--Kendo Headers-->
<div id="grid"></div>
<script>
    $("#grid").kendoGrid({
        columns: [{
            template: ""
        }, "Student ID", "Student Name", "Student Image", "Class Title", "Book Title"],
        dataBound: function() {
            var grid = this;
            grid.tbody.find("tr td:first-child").each(function(index, elem){
                $(elem).text("Row header " + (index + 1));
        });
        }
    });
</script>

<!--
    Add Modal
-->

<div class="modal" tabindex="-1" role="dialog" id = "AddModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id = "modalLabel">Add Student</h5>
            </div>
            <div class="modal-body">
                <form id = "AddModal" method = "get" action = "DataStudent.php">
                    <h2>Student Name</h2><br>
                    <input type = "text" placeholder = "Student Name" name = "StudentName" required><br>
                    <h2>Student ID</h2><br>
                    <input type = "text" placeholder = "Student ID" name = "StudID" required><br>
                    <h2>Class Name</h2><br>
                    <input type = "text" placeholder = "Class Title" name = "ClassTitle"><br>
                    <h2>Class ID</h2><br>
                    <input type = "text" placeholder = "Class ID" name = "ClassID"><br>
                    <input type = "submit" value = "Submit" name = "submit">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!--
    Remove Modal
-->

<div class="modal" tabindex="-1" role="dialog" id = "RemoveModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Remove Student</h5>
            </div>
            <div class="modal-body">
                <form method = "get" action = "DataStudent.php" id = "RemoveModal">
                    <h2>Student Name</h2><br>
                    <input type = "text" placeholder = "Student Name" name = "StudentName" required><br>
                    <h2>Student ID</h2><br>
                    <input type = "text" placeholder = "ID" name = "id" required><br>
                    <input href = "DataStudent.php" type = "submit" value = "Submit" name = "submit1">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--
    Update Student Name Modal
-->

<div class="modal" tabindex="-1" role="dialog" id = "UpdateStudentNameModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Student</h5>
            </div>
            <div class="modal-body">
                <form method = "get" action = "DataStudent.php" id = "UpdateStudentNameModal">
                    <h2>Student ID</h2><br>
                    <input type = "text" placeholder = "ID" name = "id" required><br>
                    <h2>Student Name</h2><br>
                    <input type = "text" placeholder = "Student Name" name = "StudentName" required><br>
                    <input type = "submit" value = "Submit" name = "submit2">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--
    Update Student Image Modal
-->

<div class="modal" tabindex="-1" role="dialog" id = "UpdateStudentImageModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Student</h5>
            </div>
            <div class="modal-body" style = "position: relative;">
                <form method = "get" action = "DataStudent.php" id = "UpdateStudentImageModal">
                    <h2>Student ID</h2><br>
                    <input type = "text" placeholder = "ID" name = "id" style = "position: relative" required><br>

                    <h2>Student Image</h2><br>
                    <div id="filelist">Please Select Images to Upload and Send.</div>
                    <div id="container" style="position: relative;">
                        <a id="pickfiles" href="javascript:;" style="position: relative; z-index: 1;">[Select files]</a>
                        <a id="uploadfiles" href="javascript:;">[Upload files]</a>
                        <div id="html5_1cdnooc7soq715hq1eof7km4ii4_container" class="moxie-shim moxie-shim-html5" style="position: absolute; top: 2px; left: 0; width: 75px; height: 16px; overflow: hidden; z-index: 0;">
                            <input name = "StudentImage" id="html5_1cdnooc7soq715hq1eof7km4ii4" type="file" style="font-size: 999px; opacity: 0; position: absolute; top: 0; left: 0; width: 100%; height: 100%;" multiple="" accept=".jpg,.gif,.png,.zip">
                        </div>
                    </div>

                    <br />
                    <pre id="console"></pre>
                    <br>
                    <input type = "submit" value = "Submit" name = "submit3">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--
    Update Student Image Script
-->

<script type="text/javascript">

    // Custom example logic
    var uploader = new plupload.Uploader({
        runtimes : 'html5,flash,silverlight,html4',
        browse_button : 'pickfiles', // you can pass in id...
        container: document.getElementById('container'), // ... or DOM Element itself
        url : "DataStudent.php",
        filters : {
            max_file_size : '20kb',
            mime_types: [
                {title : "Image files", extensions : "jpg,gif,png"},
                {title : "Zip files", extensions : "zip"}
            ]
        },
        // Flash settings
        flash_swf_url : '/plupload/js/Moxie.swf',
        // Silverlight settings
        silverlight_xap_url : '/plupload/js/Moxie.xap',
        init: {
            PostInit: function() {
                document.getElementById('filelist').innerHTML = '';
                document.getElementById('uploadfiles').onclick = function() {
                    uploader.start();
                    return false;
                };
            },
            FilesAdded: function(up, files) {
                plupload.each(files, function(file) {
                    document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                });
            },
            UploadProgress: function(up, file) {
                document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
            },
            Error: function(up, err) {
                document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
            }
        }
    });
</script>

<!--Kendo hint and placeholder functions-->
<script>
    function hint(element) {
        return element.clone().addClass("hint");
    }

    function placeholder(element) {
        return element.clone().addClass("placeholder").text("drop here");
    }
</script>

<!--Kendo sortable script-->
<div id="example">
    <div class="demo-section k-content wide">
        <div id="singleSort"></div>
    </div>

    <div class="demo-section k-content wide">
        <div id="multipleSort"></div>
    </div>

    <script>
        $(document).ready(function () {
            $("#singleSort").kendoGrid({
                dataSource: {
                    data: orders,
                    pageSize: 6
                },
                sortable: {
                    mode: "single",
                    allowUnsort: false
                },
                pageable: {
                    buttonCount: 5
                },
                scrollable: false,
                columns: [
                    {
                        field: "ShipCountry",
                        title: "Ship Country",
                        sortable: {
                            initialDirection: "desc"
                        },
                        width: 300
                    },
                    {
                        field: "Freight",
                        width: 300
                    },
                    {
                        field: "OrderDate",
                        title: "Order Date",
                        format: "{0:dd/MM/yyyy}"
                    }
                ]
            });

            $("#multipleSort").kendoGrid({
                dataSource: {
                    data: orders,
                    pageSize: 6
                },
                sortable: {
                    mode: "multiple",
                    allowUnsort: true,
                    showIndexes: true
                },
                pageable: {
                    buttonCount: 5
                },
                scrollable: false,
                columns: [
                    {
                        field: "ShipCountry",
                        title: "Ship Country",
                        width: 300
                    },
                    {
                        field: "Freight",
                        width: 300
                    },
                    {
                        field: "OrderDate",
                        title: "Order Date",
                        format: "{0:d}"
                    }
                ]
            });
        });
    </script>
</div>

<script>
    $("#grid").kendoGrid({
        columns: [ {
            field: "name",
            headerTemplate: kendo.template('# if (true) { # <input type="checkbox" id="check-all" /><label for="check-all">Check All</label> # } else { # this will never be displayed # } #')
        }],
    });
</script>


<?php

$continue = include 'LoginCheck.php';

if($continue == true) {

    $i = 0;
    $results = array();
    $reportData = array();


    /****************************************************************
     *  GET TOTAL DATA - MySQL
     ****************************************************************/

    $servername = "10.99.100.54";
    $username = "sa";
    $password = "capcom5^";
    $dbname = "ryan_intern";

    $q = "
        SELECT
            StudentTable.StudentID,
            StudentTable.StudentName,
            StudentTable.StudentImage,
            ClassesTable.ClassName,
            BookTable.BookName,
            BookTable.BookImage
        FROM
            StudentTable
        LEFT JOIN
            StudClass
        ON
            StudentTable.StudentID=StudClass.StudentID
        LEFT JOIN
            ClassesTable
        ON 
            ClassesTable.ClassID=StudClass.ClassID
        LEFT JOIN
            BookTable
        ON  
            ClassesTable.BookID=BookTable.BookID
        LEFT JOIN
            ClassroomTable
        ON 
            ClassesTable.ClassroomID=ClassroomTable.ClassroomID
        ORDER BY
            StudentTable.StudentID;
        ";

    $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
    $data = $dbh->query($q, PDO::FETCH_ASSOC);

    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    foreach ($data as $entry) {
        $results [] = $entry;
    }

    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "<br />";
    var_dump($results);

    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "<br />";

    //Filter data to avoid repeat student data
    $studentIDList = array();
    $outputData = array();

    foreach($results as $val) {
        $key = $val['StudentID'];
        if (!array_key_exists($key, $studentIDList)) {
            $returnData[$key] = array(
                'StudentID' => $key,
                'StudentName' => $val['StudentName'],
                'StudentImage' => '\StudentPhotos\\' . $val['StudentName'] . '.jpg',
                'ClassTitle' => $val['ClassName'],
                'BookTitle' => $val['BookName'],
                'BookImage' => '\BookPhotos\\' . $val['BookName'] . '.jpg'
            );
        }
    }

    //Generate Output Data for Kendo Grid Display
    $usedNames = array();
    $usedID = array();
    $usedImage = array();

    foreach($results as $val){

        $skipName = $val['StudentName'];
        $skipID = $val['StudentID'];
        $skipImage = $val['StudentImage'];

        if(in_array($skipName, $usedNames)){
            $output['StudentName'] = null;
        }else{
            $output['StudentName'] = $val['StudentName'];
            $usedNames[] = $output['StudentName'];
        }

        if(in_array($skipID, $usedID)){
            $output['StudentID'] = null;
        }else{
            $output['StudentID'] = $val['StudentID'];
            $usedID[] = $output['StudentID'];
        }

        if(in_array($skipImage, $usedImage)){
            $output['StudentImage'] = null;
        }else{
            $output['StudentImage'] = $val['StudentImage'];
            $usedImage[] = $output['StudentImage'];
        }

        $output['ClassName'] = $val['ClassName'];
        $output['BookName'] = $val['BookName'];

        $outputData[] = $output;
    }

    var_dump($outputData);


    /****************************************************************
     *  GET TOTAL DATA - MSSQL
     ****************************************************************

    $mspassword = "capcom5^";
    $msdbname = "ryan_intern";

    $dsn = 'mysql:dbname=ryan_intern;host=10.99.100.38';
    $user='ryan_intern';
    $password='password';

    try{
        $dbh = new PDO($dsn, $user, $password);
    }catch(PDOException $e){
        echo 'Connection failed: ' . $e->getMessage();
    }


    /****************************************************************
     *  ASSIGNMENT 6 - KENDOUI GRID COMPATIBILITY
     ****************************************************************/

    $dataSource = new \Kendo\Data\DataSource();
    $dataSource->data($outputData);

    $idColumn = new \Kendo\UI\GridColumn();
    $idColumn->field('StudentID');

    $nameColumn = new \Kendo\UI\GridColumn();
    $nameColumn->field('StudentName');

    $studImageColumn = new \Kendo\UI\GridColumn();
    $studImageColumn->field('StudentImage');

    $classColumn = new \Kendo\UI\GridColumn();
    $classColumn->field('ClassName');

    $bookColumn = new \Kendo\UI\GridColumn();
    $bookColumn->field('BookName');

    $grid = new \Kendo\UI\Grid('grid');
    $grid->addColumn($idColumn, $nameColumn, $studImageColumn, $classColumn, $bookColumn)->dataSource($dataSource);

    echo $grid->render();


    /****************************************************************
     *  ASSIGNMENT 6 - SORTABLE BOOK & CLASS LISTS
     ****************************************************************/

    $sortable = new \Kendo\UI\Sortable('grid');
    $sortable->hint(new \Kendo\JavaScriptFunction('hint'))->placeholder(new \Kendo\JavaScriptFunction('placeholder'));

    echo $sortable->render();


    /****************************************************************
     *  ADD NEW STUDENT TO THE DATABASE -- MySQL
     ****************************************************************/
    if (isset($_GET['submit'])) {

        $StudID = $_GET['StudID'];
        $studName = $_GET['StudentName'];
        $ClassID = $_GET['ClassID'];
        $class = $_GET['ClassTitle'];

        $username = "sa";
        $password = "capcom5^";

        $sql = "INSERT INTO StudentTable(StudentID, StudentName) VALUES ('$StudID', '$studName');";

        $sqlb = "INSERT INTO StudClass(StudentID, ClassID) VALUES ('$StudID', '$ClassID');";

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);
        $dbh->exec($sqlb);

        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataStudent.php?reload=1">';
        }
    }

    /****************************************************************
     *  ADD NEW STUDENT TO THE DATABASE -- MSSQL
     ****************************************************************

    if(isset($_GET['submit'])){

        $msid = $_GET['id'];
        $msstudName = $_GET['StudentName'];
        $msclass = $_GET['ClassTitle'];
        $msbook = $_GET['BookTitle'];

        $msservername = "10.99.100.38";
        $msusername = "sa";
        $mspassword = "capcom5^";
        $msdbname = "ryan_intern";

        $changeData[] = $id;

        $dbc = new PDO('mysql:dbname=ryan_intern;host=10.99.100.38', $msusername, $mspassword);
        $dbc->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);

        $sql = "INSERT INTO SavviorSchool(ID, StudentName, ClassTitle, BookTitle) VALUES ('$msid', '$msstudName', '$msclass', '$msbook')";

        mssql_close($dbc);


        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataStudent.php?reload=1">';
        }

    }


    /****************************************************************
     * REMOVE ALL VALUES ASSOCIATED WITH A GIVEN ID --MySQL
     ****************************************************************/

    if (isset($_GET['submit1'])) {

        $name = $_GET['StudentName'];
        $id = $_GET['id'];

        $username = "sa";
        $password = "capcom5^";

        /*Delete all data in the table row if specified by the Bootstrap Modal input*/

        $sql = "DELETE FROM StudentTable WHERE StudentID = '$id' AND StudentName = '$name'";

        $sqlc = "DELETE FROM StudClass WHERE StudentID = '$id'";

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);
        $dbh->exec($sqlc);

        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataStudent.php?reload=1">';
        }
    }


    /****************************************************************
     * REMOVE ALL VALUES ASSOCIATED WITH A GIVEN ID -- MSSQL
     ****************************************************************

    if(isset($_GET['submit1'])){

        $msid = $_GET['id'];
        $msstudName = $_GET['StudentName'];

        $msservername = "10.99.100.38";
        $msusername = "sa";
        $mspassword = "capcom5^";
        $msdbname = "ryan_intern";

        $changeData[] = $id;

        $dbc = mssql_connect($msservername, $msusername, $mspassword, $msdbname) or die('Error connecting to the SQL Server database.');

        $sql = "DELETE FROM SavviorSchool WHERE ID = '$id' AND StudentName = '$name'";
        $result = mssql_query($dbc, $sql) or die('Error querying MSSQL database');

        mssql_close($dbc);


        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataStudent.php?reload=1">';
        }
    }



    /****************************************************************
     * EDIT STUDENT NAME
     ****************************************************************/

    if (isset($_GET['submit2'])) {

        $name = $_GET['StudentName'];
        $StudID = $_GET['id'];

        $username = "sa";
        $password = "capcom5^";

        //student query
        $sql = ("UPDATE StudentTable 
                    SET StudentName = '$name'
                    WHERE StudentID = '$StudID'");

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);

        #Refresh page one time after executing
        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataStudent.php?reload=1">';
        }
    }


    /****************************************************************
     * EDIT DESIGNATED STUDENT IMAGE
     ****************************************************************/

    if (isset($_GET['submit3'])) {

        $image = $_GET['StudentImage'];
        $StudID = $_GET['id'];

        $username = "sa";
        $password = "capcom5^";

        //student query
        $sql = ("UPDATE StudentTable 
                    SET StudentImage = '$image'
                    WHERE StudentID = '$StudID'");

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);

        #Refresh page one time after executing
        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataStudent.php?reload=1">';
        }
    }

    /****************************************************************
     * EDIT DESIGNATED STUDENT VALUES
     ****************************************************************

    if(isset($_GET['submit2'])){

    $msid = $_GET['id'];
    $msstudName = $_GET['StudentName'];

    $msservername = "10.99.100.38";
    $msusername = "sa";
    $mspassword = "capcom5^";
    $msdbname = "ryan_intern";

    $changeData[] = $id;


    $name = $_GET['StudentName'];
    $id = $_GET['id'];
    $class = $_GET['ClassTitle'];
    $book = $_GET['BookTitle'];

    $dbc = mssql_connect($msservername, $msusername, $mspassword, $msdbname) or die('Error connecting to the SQL Server database.');

    $sql = ("UPDATE SavviorSchool
              SET StudentName = '$name', ClassTitle = '$class', BookTitle = '$book'
              WHERE ID = '$id'");

    $result = mssql_query($dbc, $sql) or die('Error querying MSSQL database');

     mssql_close($dbc);



        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataStudent.php?reload=1">';
        }
    }


    /****************************************************************
     *  OUTPUT DYNAMIC TABLE DISPLAY
     ****************************************************************


    echo "<table align = 'center' width = '70%'><tr>";

    echo "<td width = '15%'><u>StudentID</u></td>";
    echo "<td width = '15%'><u>Student Name</u></td>";
    echo "<td width = '20%'><u>Student Image</u></td>";
    echo "<td width = '15%'><u>Class Title</u></td>";
    echo "<td width = '15%'><u>Book Title</u></td>";
    echo "</tr><tr>";

    $j = 0;
    $studentNameList = array();

    foreach ($results as $val) {
        $j = $j + 1;
        $key = $val['StudentID'];
        if (!array_key_exists($key, $reportData)) {
            $returnData[$key] = array(
                'StudentName' => $val['StudentName'],
                'StudentImage' => '\StudentPhotos\\' . $val['StudentName'] . '.jpg',
                'ClassTitle' => $val['ClassName'],
                'BookTitle' => $val['BookName'],
                'BookImage' =>  '\BookPhotos\\' . $val['BookName'] . '.jpg'
            );
        }

        if(!in_array($val['StudentName'], $studentNameList) && $val['StudentName'] != null){
            echo "<td>" . $key . "</td>";
            echo "<td>" . $returnData[$key]['StudentName'] . "</td>";
            echo "<td>" . $returnData[$key]['StudentImage'] .  "</td>"; //"<img style = 'width: 100%; height: auto;' src = $returnData[$key]['StudentImage'] />" . "</td>";
            $studentNameList[] = $val['StudentName'];
        }else{
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
        }
        echo "<td>" . $returnData[$key]['ClassTitle'] . "</td>";
        echo "<td>" . $returnData[$key]['BookTitle'] . "</td>";
        echo "</tr><tr>";

        $j += 1;
    }
    echo "</tr></table>";


    /**********************************************************************************************
     * Assignment 1 & 2
     * CREATE TABLES FOR CLASSES, STUDENTS, BOOKS, AND CLASSROOMS
     * CONNECT CLASS AND STUDENT WITH JOIN TABLE, CONNECT 1 TO 1 CLASSES AND BOOKS, CLASSES AND CLASSROOMS
     *
     * Assignment 3
     *
     * https://www.youtube.com/watch?v=tAcx8N0VcgY  -- MySQL to MSSQL tutorial
     * https://docs.microsoft.com/en-us/sql/ssma/mysql/converting-mysql-databases-mysqltosql?view=sql-server-2017
     * http://php.net/manual/en/function.sqlsrv-execute.php
     *
     * Assignment 4
     *
     * https://www.w3schools.com/jquery/jquery_ajax_get_post.asp -- $.ajax and $.post methods
     * https://jquery-form.github.io/form/
     *
     * Assignment 5
     *
     * https://www.w3schools.com/howto/howto_js_filter_dropdown.asp
     *
     * Assignment 6
     *
     * http://docs.telerik.com/kendo-ui/php/widgets/grid/overview
     * http://docs.telerik.com/kendo-ui/php/widgets/sortable/overview
     *
     * Assignment 7
     *
     * https://www.formget.com/login-form-in-php/     sessions example
     * https://www.johnmorrisonline.com/build-php-login-form-using-sessions/
     *
     * Assignment 8
     *
     * http://php.net/manual/en/function.fputcsv.php -- export student and class data to text files
     * https://stackoverflow.com/questions/15501463/creating-csv-file-with-php
     *
     * Assignment 9
     *
     * https://stackoverflow.com/questions/15699301/export-mysql-data-to-excel-in-php
     * https://phpspreadsheet.readthedocs.io/en/develop/topics/accessing-cells/
     *
     * Assignment 10
     *
     * http://www.plupload.com/
     *
     * Assignment 11
     *
     * https://getbootstrap.com/docs/4.0/components/carousel/
     * https://codepen.io/grbav/pen/qNZjPy
     * https://owlcarousel2.github.io/OwlCarousel2/demos/responsive.html
     * https://github.com/OwlCarousel2/OwlCarousel2/blob/develop/docs/demos/test.html
     *
     * Assignment 12
     *
     * https://www.w3schools.com/html/html_responsive.asp
     **********************************************************************************************/

}else{
    header('Location: http://testproject.test/LoginPage.php');
}
?>

<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />

</body>
</html>