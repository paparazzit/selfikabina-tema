<?php 

// function wpse27856_set_content_type(){

//     return "text/html";

// }

// add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );

 



add_action('wp_ajax_subForm_action', 'subForm_process');

add_action('wp_ajax_nopriv_subForm_action', 'subForm_process');



function subForm_process(){

    $phone = sanitize_text_field($_POST['phone']);

    $tel = sanitize_text_field($_POST['tel']);

    $email = sanitize_email($_POST['email']);

    $name = sanitize_text_field( $_POST['name'] );

    $event = sanitize_text_field( $_POST['event'] );

    $mesto = sanitize_text_field( $_POST['mesto'] );

    $date = sanitize_text_field( $_POST['date'] );

    $msg = sanitize_textarea_field( $_POST['msg'] );

    if(isset($_POST['paket'])){

        $paket = sanitize_textarea_field( $_POST['paket'] );

    }

    $nonce = $_POST['nsub-nonce'] ;

     $adminEmail = 'rezervacije@selfikabina.com'; // get_options('admin_email')

    // $adminEmail =  get_options('admin_email');



    // EMAIL HEADERS

    $headers[] = 'Content-Type: text/html; charset=UTF-8';

    $headers[] = 'From:' . $adminEmail ;

    $headers[]='Reply-to:' . $email;

    // $headers[] = 'BCC: neki email';

    $send_to = $adminEmail;

    // SUBJECT

    $subject = 'Upit za Selfi Kabinu: ' . $name ;



    // MESSAGE



    $message = '';

    $message .= '<h3>Upit za Selfi Kabinu:</h3></br>';

    $message .= '<p>ime: '.$name.'</p> </br>';

    $message .= '<p>datum:'.$date.'</p> </br>';

    $message .= '<p>mesto:'.$mesto.'</p> </br>';

    $message .= '<p>tel:'.$tel.'</p> </br>';

    $message .= '<p>dogadjaj:'.$event . '</p> </br>';

    if(isset($paket)){

        $message .= '<p>paket:'.$paket . '</p> </br>';  

    }

    $message .= '<p>Poruka:</p> </br> <p>'.$msg.'</p>' ;









    if(!wp_verify_nonce( $nonce, 'sub-action' ) || $phone){

      

            return wp_send_json_error( "Ups... something went wrong! Try again latter");

               

           }else{

          

            try{

                if(wp_mail($send_to, $subject, $message, $headers)){

                    wp_send_json_success('EMAIL SENT');

                }else{

                    wp_send_json_error('EMAIL NOT SENT');

                }

            }catch(Exception $e){

                wp_send_json_error($e->getMessage());



            }

           

          

           }

    // echo json_encode($message);

 

}







?>