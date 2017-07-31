<div id="body">
    <div class="header">
        <div class="contact">
            <h1>Contact</h1>
            <h2>DO NOT HESITATE TO CONTACT US</h2>
            <form id="contact_us">
                <input 
                    type="text" 
                    name="name" 
                    value="" 
                    placeholder="Name" 
                > 
                <input 
                    type="text" 
                    name="email" 
                    value="" 
                    placeholder="Email Address" 
                > 
                <input 
                    type="text" 
                    name="subject" 
                    value="" 
                    placeholder="Subject"
                >
                <textarea 
                    name="message" 
                    cols="50" 
                    rows="7"
                    placeholder="Message"
                ></textarea>
                <input type="button" value="Send" id="submit">
                <!--<input id="submit" name="submit" type="button" value="Send" />-->
            </form>
            <div id="alert-mesage"></div>
            <script>
                $('#submit').click(function(){  
                    var form_data = {
                        name:    $('#name').val(),
                        email:   $('#email').val(),
                        subject: $('#subject').val(),
                        message: $('#message').val()
                    };
                    $.ajax({
                        url: '<?php echo site_url('submit'); ?>',
                        type: 'POST',
                        data: form_data,
                        success: function(message){
                            if (message == 'YES'){
                                alert('YES');
                            }
                            else if (message == 'NO'){
                                alert('NO');
                            }else{
                                //alert(msg);
                                $('#alert-mesage').html('<div class="alert alert-danger">' + message + '</div>');
                            }
                        },
                        error: function(){
                          alert('ERROR');
                        }
                    });
                    return false;
                });
            </script>
        </div>
    </div>
</div>