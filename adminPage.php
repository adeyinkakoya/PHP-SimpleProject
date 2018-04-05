<html>
    <head><title>Admin Page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="top-nav">
            <div id="header-div"><a id="header-link" href="adminPage.php">Admin Page</a></div>
            <a id="logout-link" href="main.php"><div id="logout-btn"><span>Log Out</span></div></a>
        </div>
        <div id="padding-div"></div>
        <div class="main_div">
            <div id="table-container">
                <table cellspacing="0" cellpadding="0" id="admin-table" align="center">
                <?php
                    include_once("connection.php");
                    $rowcount = 0;
                    if(isset($_GET['select']) && isset($_GET['querytext'])){
                        $query = $_GET['querytext'];
                        $result = mysqli_query($connection, $query);
                        $row = mysqli_fetch_assoc($result);
                        echo "<tr>";
                        if(array_key_exists("ID", $row)){
                            echo "<th>ID</th>";
                        }
                        if(array_key_exists("Username", $row)){
                            echo "<th>Username</th>";
                        }
                        if(array_key_exists("Password", $row)){
                            echo "<th>Password</th>";
                        }
                        if(array_key_exists("First Name", $row)){
                            echo "<th>First Name</th>";
                        }
                        if(array_key_exists("Last Name", $row)){
                            echo "<th>Last Name</th>";
                        }
                        if(array_key_exists("isAdmin", $row)){
                            echo "<th>isAdmin</th>";
                        }
                        mysqli_data_seek($result, 0);
                        echo "</tr>";
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            if(array_key_exists("ID", $row)){
                                echo "<td>".$row['ID']."</td>";
                            }
                            if(array_key_exists("Username", $row)){
                                echo "<td>".$row['Username']."</td>";
                            }
                            if(array_key_exists("Password", $row)){
                                echo "<td>".$row['Password']."</td>";
                            }
                            if(array_key_exists("First Name", $row)){
                                echo "<td>".$row['First Name']."</td>";
                            }
                            if(array_key_exists("Last Name", $row)){
                                echo "<td>".$row['Last Name']."</td>";
                            }
                            if(array_key_exists("isAdmin", $row)){
                                echo "<td>".$row['isAdmin']."</td>";
                            }
                            echo "</tr>";
                        }
                        $rowcount = mysqli_num_rows($result);
                    }
                    else if (isset($_GET['fail']) && isset($_GET['select'])){}
                    else {
                        $query = "SELECT * FROM users";
                        $result = mysqli_query($connection, $query);
                        echo "<tr><th>ID</th><th>Username</th><th>Password</th><th>First Name</th><th>Last Name</th><th>isAdmin</th></tr>";
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr><td>".$row['ID']."</td><td>".$row['Username']."</td><td>".$row['Password']."</td><td>".$row['First Name']."</td><td>".$row['Last Name']."</td><td>".$row['isAdmin']."</td></tr>";
                        }
                        $rowcount = mysqli_num_rows($result);
                    }
                ?>
            </table>
            </div>
            
            <div id="message-div">            
            <?php
                if(isset($_GET['fail']) && isset($_GET['select'])){
                    echo "<span id='fail-message'>Invalid select query!</span> ";
                }
                else if(isset($_GET['fail'])){
                    echo "<span id='fail-message'>Query failed to execute!</span> ";
                }
                else if(isset($_GET['select']) || isset($_GET['query'])){
                    echo "<span id='pass-message'>Query executed!</span> ";
                }
                
                echo "<span id='message-span'>Showing ".$rowcount." rows</span>";
            ?>
            </div>
            
            <div id="tab-group">
                <button id="defaultOpen" class="tablinks" onclick="openSection(event, 'selectTab')">Select</button><button class="tablinks middleTab" onclick="openSection(event, 'insertTab')" style="border-right: 1px solid #414141; border-left: 1px solid #414141;">Insert</button><button class="tablinks middleTab" onclick="openSection(event, 'updateTab')" style="border-right: 1px solid #414141;">Update</button><button id="lastTab" class="tablinks" onclick="openSection(event, 'deleteTab')">Delete</button>
            </div>
            <form id="admin-form" method="post" action="postAdminAction.php">
                <textarea id="query-text"></textarea>
                <div><input type="submit" value="Run Query"></div>
            </form>
        </div>
        <script type="text/javascript">
        
            function openSection(evt, secName) {
            // Declare all variables
            var i, tablinks;
            var queryText = document.getElementById("query-text");

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            if(secName === "selectTab") {
                queryText.value = "SELECT * FROM `users`";
                queryText.setAttribute("name", "selectQuery");
            }
            else if (secName === "insertTab") {
                queryText.value = "INSERT INTO `users` (`ID`, `Username`, `Password`, `First Name`, `Last Name`, `isAdmin`) VALUES (NULL, '', '', '', '', '0')";
                queryText.setAttribute("name", "query");
            }
            else if (secName === "updateTab") {
                queryText.value = "UPDATE `users` SET  WHERE";
                queryText.setAttribute("name", "query");
            }
            else {
                queryText.value = "DELETE FROM `users` WHERE ";
                queryText.setAttribute("name", "query");
            }
            
            evt.currentTarget.className += " active";
        }
            
        document.getElementById("defaultOpen").click();
        
        </script>
    </body>
</html>