<title>Flipkart Price Drop Alert</title>
<script type="text/javascript" src="./jquery.min.js"></script>
<script>
$(document).ready(function() {
    // process the form
    $('#but0').live('click',function(event) {
                function loading_show(){
                        $('#loading').html("<img src='http://www.ajaxload.info/images/exemples/25.gif' width='24' height='24' style=''/>").fadeIn('fast');
                }
                function loading_hide(){
                    $('#loading').fadeOut('fast');
                }
        loading_show();
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'form.php', // the url where we want to POST
            data        : $('form').serialize(), // our data object
            success: function(reply) { // on success..i
                        loading_hide();
//			$('#userf').fadeOut('slow');
                        $('#suck').html(reply) // update the DIV
                                }
        });
                        return false;
        });
});
</script>
<div id="userf">
<form>
Product Url: &nbsp<input type="text" name="url">
&nbsp Your email:&nbsp<input type="email" name="email_user">
&nbsp Price you need:&nbsp<input type="number" name="alarm">
<input id="but0" type="submit" value="Submit">
</form>
</div>
<div id="loading"></div>
<div id="suck"><div>
