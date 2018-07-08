<?php
function validate_email($email) {
    return (bool) filter_var($email, FILTER_VALIDATE_EMAIL);
}

function simple_mail ($to, $from, $subject, $message) {
    
    if (!validate_email($to))
        return false;
    if (!validate_email($from))
        return false;
    $subject = filter_var($subject, FILTER_SANITIZE_STRING);
    $message = filter_var($message, FILTER_SANITIZE_STRING);
    
    $message = wordwrap($message, 70, "\r\n");
    
    $headers = 'From: '.$from.'\r\n'.
        'Reply-To: '.$from;
    return mail($to, $subject, $message, $headers);
}

function simple_html_email($to, $from, $subject, $message) {
    if (!validate_email($to))
        return false;
    if (!validate_email($from))
        return false;
    $subject = filter_var($subject, FILTER_SANITIZE_STRING);
    
    $headers = array(
        'MIME-Version' => '1.0',
        'Content-Type' => 'text/html; charset=utf-8',
        'From' => $from,
        'Reply-To' => $from
    );
    
    return mail($to, $subject, $message, implode('\r\n',$headers));
}
?>