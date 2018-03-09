<div id="body">
    <div class="header">
        <div class="contact">
            <h1><?=$lang['contact_page_name']?></h1>
            <h2><?=$lang['contact_short_message']?></h2>
            <form id='contact_us'>
                <input 
                    type="text" 
                    name="name" 
                    class="contact-input" 
                    placeholder="<?=$lang['contact_placeholder_name']?>" 
                > 
                <input 
                    type="text"  
                    name="email" 
                    class="contact-input" 
                    placeholder="<?=$lang['contact_placeholder_email']?>" 
                > 
                <input 
                    type="text" 
                    name="subject" 
                    class="contact-input" 
                    placeholder="<?=$lang['contact_placeholder_subject']?>"
                >
                <textarea 
                    name="message" 
                    class="contact-input" 
                    cols="50" 
                    rows="7"
                    placeholder="<?=$lang['contact_placeholder_message']?>"
                ></textarea>
                <input type="submit" value="<?=$lang['contact_button_send']?>" id="submit">
            </form>
            <div id="alert-mesage"></div>
            <script>
                $('form#contact_us').submit(function()
                {
                    var form_data = $(this).serialize();
                    
                    $.ajax(
                    {
                        url: '<?=site_url('ajax/contact_submit/contact_us')?>',
                        type: 'POST',
                        data: form_data,
                        success: function(message)
                        {
                            if (message == 'YES')
                            {
                                alert('<?=$lang['contact_message_email_success']?>');
                                $('#alert-mesage').html('');
                                $('.contact-input').val('');
                            }
                            else if (message == 'NO')
                            {
                                alert('<?=$lang['contact_message_email_failure']?>');
                                $('#alert-mesage').html('');
                                $('.contact-input').val('');
                            }
                            else
                            {
                                $('#alert-mesage').html('<div class="alert alert-danger">' + message + '</div>');
                            }
                        },
                        error: function()
                        {
                            alert('ERROR');
                        }
                    }
                    );
                    
                    return false;
                });
            </script>
        </div>
    </div>
</div>
