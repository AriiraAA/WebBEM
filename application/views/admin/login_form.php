<style type="text/css">
	/**
 * parallax.css
 * @Author Original @msurguy -> http://bootsnipp.com/snippets/featured/parallax-login-form
 * @Reworked By @kaptenn_com 
 * @package PARALLAX LOGIN.
 */
    
    body {
        background-color: #444;
        background: url(http://s18.postimg.org/l7yq0ir3t/pick8_1.jpg);
        
    }
    .form-signin input[type="text"] {
        margin-bottom: 5px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }
    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
    .form-signin .form-control {
        position: relative;
        font-size: 16px;
        font-family: 'Open Sans', Arial, Helvetica, sans-serif;
        height: auto;
        padding: 10px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    .vertical-offset-100 {
        padding-top: 100px;
    }
    .img-responsive {
    display: block;
    max-width: 100%;
    height: auto;
    margin: auto;
    }
    .panel {
    margin-bottom: 20px;
    background-color: rgba(255, 255, 255, 0.75);
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }
</style>
<!-- 
 * parallax_login.html
 * @Author original @msurguy (tw) -> http://bootsnipp.com/snippets/featured/parallax-login-form
 * @Tested on FF && CH
 * @Reworked by @kaptenn_com (tw)
 * @package PARALLAX LOGIN.
-->
<script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">                                
                    <div class="row-fluid user-row">
                        <img src="http://s11.postimg.org/7kzgji28v/logo_sm_2_mr_1.png" class="img-responsive" alt="Conxole Admin"/>
                    </div>
                </div>
                <div class="panel-body">
                    <?= form_open('login/admin') ?>
                        <fieldset>
                            <label class="panel-login">
                                <div class="login_result"></div>
                            </label>
                            <input class="form-control" placeholder="Username" name="username" id="username" type="text">
                            <input class="form-control" placeholder="Password" name="password" id="password" type="password">
                            <br></br>
                            <input class="btn btn-lg btn-success btn-block" type="submit" name="login" id="login" value="Login »">
                        </fieldset>
                    <?= form_close() ?>
                    <?php  
                        $msg = $this->session->flashdata('msg');
                        if (isset($msg)) {
                            echo $msg;
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	/**
 * parallax.js
 * @Author original @msurguy (tw) -> http://bootsnipp.com/snippets/featured/parallax-login-form
 * @Tested on FF && CH
 * @Reworked by @kaptenn_com (tw)
 * @package PARALLAX LOGIN.
 */

$(document).ready(function() {
    $(document).mousemove(function(event) {
        TweenLite.to($("body"), 
        .5, {
            css: {
                backgroundPosition: "" + parseInt(event.pageX / 8) + "px " + parseInt(event.pageY / '12') + "px, " + parseInt(event.pageX / '15') + "px " + parseInt(event.pageY / '15') + "px, " + parseInt(event.pageX / '30') + "px " + parseInt(event.pageY / '30') + "px",
            	"background-position": parseInt(event.pageX / 8) + "px " + parseInt(event.pageY / 12) + "px, " + parseInt(event.pageX / 15) + "px " + parseInt(event.pageY / 15) + "px, " + parseInt(event.pageX / 30) + "px " + parseInt(event.pageY / 30) + "px"
            }
        });
    });
});

</script>