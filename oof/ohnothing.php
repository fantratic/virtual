<?php
/*
                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
                    $mail->isSMTP();                                            // Set mailer to use SMTP
                    $mail->Host       = 'mail.cock.li';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'giansupport@cock.li';                     // SMTP username
                    $mail->Password   = 'gian1234';                               // SMTP password
                    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                    $mail->Port       = 465;                                    // TCP port to connect to

                    //Recipients
                    $mail->setFrom('giansupport@cock.li', "Gian's Verifier");
                    $mail->addAddress("$email");     // Add a recipient

                    // Attachments


                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Verify your account!';
                    $mail->Body    = "Please click on the link below to verify your email:<br><br>

                    <a href='http://gianexploits.tk/confirm.php?email=$email&token=$token'>Click Here</a>";

                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                */