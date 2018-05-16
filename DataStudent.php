<!DOCTYPE html>
<?php
require 'vendor/autoload.php';
require_once('HeaderLayout.php');
?>

<body>
<br />
<!--
    Add button & delete button, to be put in top right since only one item will be affected at a time
-->

<div class="btn-group pull-right">
    <button type="button" class="btn btn-primary" data-toggle = "tooltip" data-placement = "top" title = "Add Entry to Table">
        <a data-toggle = "modal" data-target = "#AddModal" style = color:white>Add</a>
    </button>
    <button type="button" class="btn btn-primary" data-toggle = "tooltip" data-placement = "top" title = "Remove Entry from Table">
        <a data-toggle = "modal" data-target = "#RemoveModal" style = color:white onclick = "delete();">Remove</a>
    </button>
</div>

<!--
    Update button -- JQuery search: https://www.w3schools.com/howto/howto_js_filter_dropdown.asp
-->

<div class="dropdown pull-right">
    <button class="dropbtn" onclick="myFunction()" type="button" data-placement = "top" title = "Update Entry in Table">Update
        <span class="caret"></span></button>
    <div id = "myDropdown" class = "dropdown-content">
        <input id="myInput" type="text" placeholder="Search.." onkeyup="filterFunction()">
        <a href="#" data-toggle = "modal" data-target = "#UpdateStudentNameModal">Student Name</a>
        <a href="#" data-toggle = "modal" data-target = "#UpdateStudentImageModal">Student Image</a>
        <a href="#" data-toggle = "modal" data-target = "#UpdateClassTitleModal">Class Title</a>
        <a href="#" data-toggle = "modal" data-target = "#UpdateBookTitleModal">Book Title</a>
        <a href="#" data-toggle = "modal" data-target = "#UpdateBookImageModal">Book Image</a>
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
<h2><center><u>Student Data</u></center></h2>

<hr width = 75%>

<p position = relative top = "200px" align = 'center'>Using the buttons provided, select a function to perform on the data displayed below. Note: Any changes you make to the data below will also be carried over to the master table on the Home Page.</p>

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
                <form method = "get" action = "DataStudent.php">
                    <h2>Name</h2><br>
                    <input type = "text" placeholder = "Student Name" name = "StudentName" required><br>
                    <h2>ID</h2><br>
                    <input type = "text" placeholder = "ID" name = "id" required><br>
                    <h2>Class</h2><br>
                    <input type = "text" placeholder = "Class Title" name = "ClassTitle"><br>
                    <h2>Book</h2><br>
                    <input type = "text" placeholder = "Book Title" name = "BookTitle"><br>
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
                <form method = "get" action = "DataStudent.php">
                    <h2>Name</h2><br>
                    <input type = "text" placeholder = "Student Name" name = "StudentName" required><br>
                    <h2>ID</h2><br>
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
                <form method = "get" action = "DataStudent.php">
                    <h2>ID</h2><br>
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

    https://www.plupload.com/examples/core use the page source of this to create overlapped input with button to instigate upload
-->

<div class="modal" tabindex="-1" role="dialog" id = "UpdateStudentImageModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Student</h5>
            </div>
            <div class="modal-body">
                <form method = "get" action = "DataStudent.php">
                    <h2>ID</h2><br>
                    <input type = "text" placeholder = "ID" name = "id" required><br>
                    <h2>Student Image</h2><br>

                    <div id="container">
                        <a id="pickfiles" href="javascript:;">[Select files]</a>
                        <a id="uploadfiles" href="javascript:;">[Upload files]</a>
                        <div style = "position: relative; top: 0; width: 75px; height: 16px; overflow: hidden; z-index: 0;" id = "html5_container">
                            <input style = "opacity: 0; position: absolute; top: 0; width: 100%; height: 100%" id = "html5_in" type = "file" multiple accept = ".jpg, .gif, .png">
                        </div>
                    </div>

                    <br />
                    <pre id="console"></pre>
                    <br>
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
    Update Student Image Script
-->

<script type="text/javascript">
    // Custom example logic

    var uploader = new plupload.Uploader({
        runtimes : 'html5,flash,silverlight,html4',

        browse_button : 'pickfiles', // you can pass in id...
        container: document.getElementById('container'), // ... or DOM Element itself

        url : "/examples/upload",

        filters : {
            max_file_size : '10mb',
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

    uploader.init();

</script>

<!--
    Update Class Title Modal
-->

<div class="modal" tabindex="-1" role="dialog" id = "UpdateClassTitleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Student</h5>
            </div>
            <div class="modal-body">
                <form method = "get" action = "DataStudent.php">
                    <h2>ID</h2><br>
                    <input type = "text" placeholder = "ID" name = "id" required><br>
                    <h2>Class Title</h2><br>
                    <input type = "text" placeholder = "Class Title" name = "ClassTitle" required><br>
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
    Update Book Title Modal
-->

<div class="modal" tabindex="-1" role="dialog" id = "UpdateBookTitleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Student</h5>
            </div>
            <div class="modal-body">
                <form method = "get" action = "DataStudent.php">
                    <h2>ID</h2><br>
                    <input type = "text" placeholder = "ID" name = "id" required><br>
                    <h2>Book Title</h2><br>
                    <input type = "text" placeholder = "Book Title" name = "BookTitle" required><br>
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
    Update Book Image Modal
-->

<div class="modal" tabindex="-1" role="dialog" id = "UpdateBookImageModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Student</h5>
            </div>
            <div class="modal-body">
                <form method = "get" action = "DataStudent.php">
                    <h2>ID</h2><br>
                    <input type = "text" placeholder = "ID" name = "id" required><br>
                    <h2>Book Image</h2><br>

                    <div id="filelist"></div>
                    <br />

                    <div id="container">
                        <a id="browse" href="javascript:;">[Browse...]</a>
                        <a id="start-upload" href="javascript:;">[Start Upload]</a>
                    </div>

                    <br />
                    <pre id="console"></pre>
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
   Update Book Image Script
-->

<script type = "text/javascript">
    // Custom example logic

    var uploader = new plupload.Uploader({
        runtimes : 'html5,flash,silverlight,html4',

        browse_button : 'browse', // you can pass in id...
        container: document.getElementById('UpdateBookImageModal'), // ... or DOM Element itself

        url : "/examples/upload",

        filters : {
            max_file_size : '10mb',
            mime_types: [
                {title : "Image files", extensions : "jpg,gif,png"}]
        },

        // Flash settings
        flash_swf_url : '/plupload/js/Moxie.swf',

        // Silverlight settings
        silverlight_xap_url : '/plupload/js/Moxie.xap',

        init: {
            PostInit: function() {
                document.getElementById('filelist').innerHTML = '';

                document.getElementById('start-upload').onclick = function() {
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

    uploader.init();
</script>

<div id = 'example'>
    <div id = 'grid'></div>
    <script>

    </script>
</div>


<?php

$continue = include 'LoginCheck.php';

/*
 * ATTEMPT TO HANDLE KENDO UI INJECTION, DATA SOURCE FAILURE
echo "<br />";
echo "<br />";
echo "<br />";
echo getcwd();
echo "<br />";
echo "<br />";
echo "<br />";

include 'C:\wamp64\www\SchoolSystem\kendoui\lib\Data\DataSource.php';

$dataSource = new \kendoui\lib\Data\DataSource();
*/


if($continue == true) {

    $i = 0;
    $results = array();
    $reportData = array();


    /****************************************************************
     *  GET TOTAL DATA
     ****************************************************************/

    $servername = "10.99.100.54";
    $username = "sa";
    $password = "capcom5^";
    $dbname = "ryan_intern";

    $q = "
        SELECT
            s.ID,
            s.StudentName,
            s.ClassTitle,
            s.BookTitle
        FROM
            SavviorSchool s
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


    /****************************************************************
     *  ASSIGNMENT 6 - KENDOUI GRID COMPATIBILITY
     ****************************************************************/
    $dataSource = new \Kendo\Data\DataSource();
    $dataSource->data($data);

    $nameColumn = new \Kendo\UI\GridColumn();
    $nameColumn->field('studentName');

    $studImageColumn = new \Kendo\UI\GridColumn();
    $studImageColumn->field('studentImage');

    $classColumn = new \Kendo\UI\GridColumn();
    $classColumn->field('classTitle');

    $bookColumn = new \Kendo\UI\GridColumn();
    $bookColumn->field('bookTitle');

    $bookImageColumn = new \Kendo\UI\GridColumn();
    $bookImageColumn->field('bookImage');

    $grid = new \Kendo\UI\Grid('grid');
    $grid->addColumn($nameColumn, $studImageColumn, $classColumn, $bookColumn, $bookImageColumn)->dataSource($dataSource);

    echo $grid->render();


    /****************************************************************
     *  ASSIGNMENT 6 - SORTABLE BOOK & CLASS LISTS
     ****************************************************************/

    $sortable = new \Kendo\UI\Sortable('#sortable-basic');
    $sortable->hint(new \Kendo\JavaScriptFunction('hint'))->placeholder(new \Kendo\JavaScriptFunction('placeholder'));

    echo $sortable->render();


    /****************************************************************
     *  ADD NEW STUDENT TO THE DATABASE
     ****************************************************************/
    if (isset($_GET['submit'])) {

        $id = $_GET['id'];
        $studName = $_GET['StudentName'];
        $class = $_GET['ClassTitle'];
        $book = $_GET['BookTitle'];

        $username = "sa";
        $password = "capcom5^";

        $changeData[] = $id;

        $sql = "INSERT INTO SavviorSchool(ID, StudentName, ClassTitle, BookTitle) VALUES ('$id', '$studName', '$class', '$book')";

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);

        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataStudent.php?reload=1">';
        }
    }


    /****************************************************************
     * REMOVE ALL VALUES ASSOCIATED WITH A GIVEN ID TO BE REMOVED
     ****************************************************************/

    if (isset($_GET['submit1'])) {

        $name = $_GET['StudentName'];
        $id = $_GET['id'];

        $username = "sa";
        $password = "capcom5^";

        /*Delete all data in the table row if specified by the Bootstrap Modal input*/
        $changeData[] = $id;

        $sql = "DELETE FROM SavviorSchool WHERE ID = '$id' AND StudentName = '$name'";

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);

        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataStudent.php?reload=1">';
        }
    }



    /****************************************************************
     * EDIT DESIGNATED STUDENT VALUES
     ****************************************************************/

    if (isset($_GET['submit2'])) {

        $q = ("SELECT
                   t.StudentName,
                   t.ClassTitle,
                   t.BookTitle,
                   t.ID
               FROM
                   SavviorSchool as t
        ");


        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $data = $dbh->query($q, PDO::FETCH_ASSOC);


        if ($_GET['StudentName']) {
            $name = $_GET['StudentName'];
        }else{
            foreach($data as $user){
                if($data['id'] == $_GET['ID']){
                    $name = $data['id']['StudentName'];
                }
            }
        }

        if ($_GET['id']) {
            $id = $_GET['id'];
        } else {
            $id = null;
        }

        if ($_GET['ClassTitle']) {
            $class = $_GET['ClassTitle'];
        }else{
            foreach($data as $user){
                if($data['id'] == 'ID'){
                    $name = $data['id']['ClassTitle'];
                }
            }
        }

        if ($_GET['BookTitle']) {
            $book = $_GET['BookTitle'];
        }else {
            foreach ($data as $user) {
                if ($data['id'] == 'ID') {
                    $name = $data['id']['BookTitle'];
                }
            }
        }

        $username = "sa";
        $password = "capcom5^";

        $changeData[] = $id;
        $sql = ("UPDATE SavviorSchool 
                    SET StudentName = '$name', ClassTitle = '$class', BookTitle = '$book' 
                    WHERE ID = '$id'");

        $dbh = new PDO('mysql:host=10.99.100.54;dbname=ryan_intern', $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec($sql);

        #Refresh page one time after executing
        if (!isset($_GET['reload'])) {
            echo '<meta http-equiv = Refresh content = "0;url=http://testproject.test/DataStudent.php?reload=1">';
        }    }


    /****************************************************************
     *  OUTPUT DYNAMIC TABLE DISPLAY
     ****************************************************************/


    echo "<table align = 'center' width = '70%'><tr>";

    echo "<td width = '15%'><u>ID</u></td>";
    echo "<td width = '15%'><u>Student Name</u></td>";
    echo "<td width = '20%'><u>Student Image</u></td>";
    echo "<td width = '15%'><u>Class Title</u></td>";
    echo "<td width = '15%'><u>Book Title</u></td>";
    echo "<td width = '20%'><u>Book Image</u></td>";
    echo "</tr><tr>";

    $j = 0;

    foreach ($results as $val) {
        $j = $j + 1;
        $key = $val['ID'];
        echo "<td>" . $val['ID'] . "</td>";
        if (!array_key_exists($key, $reportData)) {
            $returnData[$key] = array(
                'StudentName' => $val['StudentName'],
                'ClassTitle' => $val['ClassTitle'],
                'BookTitle' => $val['BookTitle']
            );
        }

        $picName = $returnData[$key]['StudentName'];
        $bookName = $returnData[$key]['BookTitle'];

        echo "<td>" . $returnData[$key]['StudentName'] . "</td>";
        echo "<td>" . "<img src = 'StudentPhotos\student" . $j . ".jpg' />" . "</td>";
        echo "<td>" . $returnData[$key]['ClassTitle'] . "</td>";
        echo "<td>" . $returnData[$key]['BookTitle'] . "</td>";
        echo "<td>" . "<img src = 'BookPhotos\book" . $j . ".jpg' />" . "</td>";
        echo "</tr><tr>";

        $j += 1;
    }
    echo "</tr></table>";


    /*******************************************************
     * Create Class Lists, Ensure 1 Book Per Class
     *******************************************************/
    $classes = array();
    $books = array();

    foreach ($returnData as $entry) {
        $classes[] = $entry['ClassTitle'];
        $books[] = $entry['BookTitle'];
    }

    ksort($classes);
    ksort($books);

    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";

    $classBookTie = array();
    $i = 0;
    foreach ($classes AS $class) {
        $key = $class;
        if (!array_key_exists($key, $classBookTie)) {
            $classBookTie[$key] = array(
                'BookTitle' => $books[$i],
            );
        }
        $i = $i + 1;
    }

    foreach ($returnData as $result) {
        $key = $result['ClassTitle'];
        if (!array_key_exists($key, $classBookTie)) {
            if ($classBookTie['BookTitle'] != $result['BookTitle']) {
                $result['BookTitle'] = $classBookTie['BookTitle'];
            }
        }
    }

    /**********************************************************************************************
     * Assignment 3
     *
     * https://www.youtube.com/watch?v=tAcx8N0VcgY  -- MySQL to MSSQL tutorial
     * https://docs.microsoft.com/en-us/sql/ssma/mysql/converting-mysql-databases-mysqltosql?view=sql-server-2017
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

</body>
</html>