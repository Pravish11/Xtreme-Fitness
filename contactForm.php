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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("form").on("submit",function(){
                    //alert($("#name").val());
                    /*alert($("#email").val());
                    alert($("#number").val());
                    alert($("#message").val());*/
                    $.ajax({
                        url:"contactAjax.php",
                        method:"POST",
                        data:{txt_name:$("#name").val(),
                            txt_email:$("#email").val(),
                            txt_telephone:$("#number").val(),
                            txt_message:$("#message").val()
                        },
                        success:function()
                        {
                            $("#messageStatus").text("Message sent!");
                            $("#name").val("");
                            $("#email").val("");
                            $("#number").val("");
                            $("#message").val("");
                        },
                        error:function(html)
                        {
                            $(".msg").html(html);
                        }
                    });
                    return false;
                });
            });
        </script>
    </head>
    <body>
        <h2 style="font-family:sans-serif;">WRITE US</h2>
        <p style="color: #545454;">Jot us a note and we'll get back to you as quickly as possible.</p>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <p style="font-family:sans-serif;text-align:left; font-size:70%;"><b>YOUR NAME:<span class="error">*</span></b></p>
                <input type="text" name="txt_name" size="50"  placeholder="YOUR NAME" required id="name">
                <span class="error msg"><?php echo $error['nameErr'];?></span>
                <br/><br/>
                <p style="font-family:sans-serif;text-align:left; font-size:70%;"><b>EMAIL ADDRESS:<span class="error">*</span></b></p>
                <input type="email" name="txt_email" size="50" placeholder="EMAIL ADDRESS"required id="email">
                <span class="error msg"><?php echo $error['emailErr'];?></span>
                <br/><br/>
                <p style="font-family:sans-serif;text-align:left; font-size:70%;"><b>PHONE NUMBER (OPTIONAL):</b></p>
                <input type="tel" name="txt_telephone" minlength="7" maxlength="8" pattern="[5]*[0-9]{7}" placeholder="PHONE NUMBER" id="number"/>
                <br/><br/>
                <p style="font-family:sans-serif;text-align:left; font-size:70%;"><b>YOUR MESSAGE:<span class="error">*</span></b></p>
                <textarea rows="10" cols="40" name="txt_message" placeholder="YOUR MESSAGE" required id="message"></textarea>
                <span class="error msg"><?php echo $error['messageErr']; ?></span>
                <br/><br/>
                <div class="container">
                    <input type="submit" value="SEND MESSAGE" class="button" style="cursor: pointer;"/>
                </div><br><br>
                <span id="messageStatus" style="color:green;font-weight:bolder"></span>     
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