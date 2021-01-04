<div id="body">
    <div class="header">
        <div class="contact">
            <h1>Contact</h1>
            <h2>Do not hesitate to contact us</h2>
            <form id='contact_us'>
                <input 
                    type="text" 
                    name="name" 
                    class="contact-input" 
                    placeholder="Name" 
                > 
                <input 
                    type="text"  
                    name="email" 
                    class="contact-input" 
                    placeholder="E-mail Address" 
                > 
                <input 
                    type="text" 
                    name="subject" 
                    class="contact-input" 
                    placeholder="Subject"
                >
                <textarea 
                    name="message" 
                    class="contact-input" 
                    cols="50" 
                    rows="7"
                    placeholder="Message"
                ></textarea>
                <input type="submit" value="Send" id="submit">
            </form>
            <div id="alert-mesage"></div>
            <script>
                $('form#contact_us').submit(function() {
                    var form_data = $(this).serialize();
                    $.ajax({
                        url: '<?=site_url('ajax/Contact_Submit/contact_us')?>',
                        type: 'POST',
                        data: form_data,
                        success: function(message) {
                            if (message === 'YES') {
                                alert('E-mail has been sent.');
                                $('#alert-mesage').html('');
                                $('.contact-input').val('');
                            } else if (message === 'NO') {
                                alert('E-mail is not sent.');
                                $('#alert-mesage').html('');
                                $('.contact-input').val('');
                            } else {
                                $('#alert-mesage').html('<div class="alert alert-danger">' + message + '</div>');
                            }
                        },
                        error: function() {
                            alert('ERROR');
                        }
                    });
                    return false;
                });
            </script>
        </div>
    </div>
</div>
