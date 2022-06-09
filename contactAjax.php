<?php
            $error['nameErr']=$error['emailErr']=$error['message']=$msg="";
            $submission['name']=$submission['email']=$submission['number']=$submission['message']="";

                if(empty($_POST["txt_name"]))
                {
                    $error['nameErr'] = "Name is required";
                    $msg="Name is required";
                }
                else
                {
                    $submission['name']=test_input($_POST["txt_name"]);
                }
                if(empty($_POST["txt_email"]))
                {
                    $error['emailErr'] = "Email is required";
                    $msg="Email is required";
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
                    $msg="Message cannot be empty";
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

                $name=($submission['name']);
                $email=addslashes($submission['email']);
                $tel_no=addslashes($submission['number']);
                $message=addslashes($submission['message']);
                $date_posted=strftime("%Y-%m-%d");
                $message_read='0';
                $Result=$stmt->execute();
                $conn==null;
            }
            else
            {
                echo "<span>".$msg."</span>";
            }
            
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }

?>