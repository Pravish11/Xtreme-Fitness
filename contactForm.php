<html>
    <head>
        <style>
            .error {color: #FF0000;}
            .container { 
                height: 20px;
                position: relative;
            }
            .button {
                width: 250px;
      height: 40px;
      font-size: 20px;
      background-color: #0736a6;
      border: none;
      color: white;
      cursor: pointer;
      margin-left: 15%;
      border-radius: 25px;
      font-family: sans-serif;
      font-weight: bold;
      margin-bottom: 5%;
            }           
        </style>
    </head>
    <body>
        <?php
            $error['nameErr']=$error['emailErr']=$error['message']="";
            $submission['name']=$submission['email']=$submission['number']=$submission['message']="";
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                if(empty($_POST["txt_name"]))
                {
                    $error['nameErr'] = "Name is required";
                }
                else
                {
                    $submission['name']=test_input($_POST["txt_name"]);
                }
                if(empty($_POST["txt_email"]))
                {
                    $error['emailErr'] = "Email is required";
                }
                else
                {
                    $submission['email']=test_input($_POST["txt_email"]);
                }
                if(!empty($_POST["txt_telephone"]))
                {
                    $submission['number'] = $_POST["txt_telephone"];
                }
                if(empty($_POST["txt_message"]))
                {
                    $error['message'] = "Message cannot be empty";
                }
                else
                {
                    $submission['message']=test_input($_POST["txt_message"]);
                }
                if($error['nameErr']=="" && $error['emailErr']=="" && $error['message']=="")
            {
                require_once "includes/db_connect.php";
                $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $sql = 'CALL insertmessage(:name,:email,:tel_no,:message,:date_posted,:message_read)';
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':name',$name);
                $stmt->bindParam(':email',$email);
                $stmt->bindParam(':tel_no',$tel_no);
                $stmt->bindParam(':message',$message);
                $stmt->bindParam(':date_posted',$date_posted);
                $stmt->bindParam(':message_read',$message_read);

                $name=$conn->quote($submission['name']);
                $email=addslashes($submission['email']);
                $tel_no=addslashes($submission['number']);
                $message=addslashes($submission['message']);
                $date_posted=strftime("%Y-%m-%d");
                $message_read='0';
                $Result=$stmt->execute();
                if($Result)
                {
                    header("Refresh:0");
                    echo '<script>alert("Message sent")</script>';
                }
                else
                {
                    echo '<script>alert("Message NOT sent")</script>';
                }
                $conn==null;
            }
            }
            
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }
        ?>
        <h2 style="font-family:sans-serif;">WRITE US</h2>
        <p style="color: #545454;">Jot us a note and we'll get back to you as quickly as possible.</p>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <p style="font-family:sans-serif;text-align:left; font-size:70%;"><b>YOUR NAME:<span class="error">*</span></b></p>
                <input type="text" name="txt_name" size="50" value="<?php echo $submission['name']; ?>" pattern="[a-zA-Z'-'\s]*" placeholder="YOUR NAME" required>
                <?php echo $error['nameErr'];?>
                <br/><br/>
                <p style="font-family:sans-serif;text-align:left; font-size:70%;"><b>EMAIL ADDRESS:<span class="error">*</span></b></p>
                <input type="email" name="txt_email" size="50" value="<?php echo $submission['email']; ?>" placeholder="EMAIL ADDRESS"required>
                <?php echo $error['emailErr'];?>
                <br/><br/>
                <p style="font-family:sans-serif;text-align:left; font-size:70%;"><b>PHONE NUMBER (OPTIONAL):</b></p>
                <input type="tel" name="txt_telephone" minlength="7" maxlength="8" value="<?php echo $submission['number']; ?>" pattern="[5]*[0-9]{7}" placeholder="PHONE NUMBER"/>
                <br/><br/>
                <p style="font-family:sans-serif;text-align:left; font-size:70%;"><b>YOUR MESSAGE:<span class="error">*</span></b></p>
                <textarea rows="10" cols="40" name="txt_message" placeholder="YOUR MESSAGE" required></textarea>
                <?php echo $error['messageErr']; ?>
                <br/><br/>
                <div class="container">
                    <input type="submit" value="SEND MESSAGE" class="button" style="cursor: pointer;"/>
                </div>     
        </form>
        <?php
            /*if ($_SERVER["REQUEST_METHOD"] == "POST" && $error['name']=="" && $error['email']=="" && $error['message']=="")
            {
                echo "<h2>Your input:</h2>";
                echo "Name: ";
                echo $submission['name'];
                echo "<br>";
                echo "Email: ";
                echo $submission['email'];
                echo "<br>";
                echo "Phone number: ";
                echo $submission['number'];
                echo "<br>";
                echo "Message: ";
                echo $submission['message'];
                echo "<br>";
            }*/
        ?>
    </body>
</html>