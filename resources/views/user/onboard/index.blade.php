<head>
    <title>Onboard System</title>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>


<style>

    html, body{height: 100%; }
    body{font-size: 14px; line-height: 18px;}
    /****************************************/
    .help-inline-error{color:red;}
    .padding5 {
        padding: 5px;
    }
    .padding10 {
        padding: 10px;
    }
    .padding15 {
        padding: 15px;
    }
    .padding20 {
        padding: 20px;
    }
    .margin5 {
        margin: 5px;
    }
    .margin10 {
        margin: 10px;
    }
    .margin15 {
        margin: 15px;
    }
    .margin20 {
        margin: 20px;
    }

    .nlm {
        margin-left: 0 !important;
    }
    .nrm {
        margin-right: 0 !important;
    }
    .ntm {
        margin-top: 0 !important;
    }
    .nbm {
        margin-bottom: 0 !important;
    }
    .nlp {
        padding-left: 0 !important;
    }
    .nrp {
        padding-right: 0 !important;
    }
    .ntp {
        padding-top: 0 !important;
    }
    .nbp {
        padding-bottom: 0 !important;
    }
    .no-margin {
        margin: 0  !important;
    }
    .no-padding {
        padding: 0  !important;
    }
    .no-float {
        float: none !important;
    }
    /****************************************/
    .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
        /*padding-left: 0px;
        padding-right:0px;*/
    }

    .navbar-default {
        background-color: #1BA1E2;
        border-color: #1BA1E2;

    }
    .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
        background-color: #00AAFD;
    }
    .navbar-default .navbar-nav>li>a:hover,.navbar-default .navbar-nav>li>a:focus{color:#ffffff;background-color:#00AAFD}

    .navbar-default .navbar-collapse, .navbar-default .navbar-form {
        border-color:#1BA1E2;
    }
    .navbar-inverse {
        background-color: #000;
        border-color: #000;
    }
    .required{color: #F00;}
    .contact-form-container{padding: 25px}
    .contactform .form-group {margin: 0px;}
    .form-horizontal .control-label {text-align: left;width: 100%;}
    .panel-heading{cursor: pointer;}

    .mainbody{ padding-bottom: 50px; padding-top: 50px; min-height: 80%; overflow: hidden;}
    .mainbody .row{margin: 0px;}
    .page-header{margin-top: 0px;  border-bottom: 1px solid #1995DC; padding-bottom: 0px; }
    .page-header h1{margin-top: 0px; font-size: 24px;}



    .panel-body {width: 100%; margin: 0 auto;}
    .panel-body .col-lg-3{margin:25px; border: 1px solid #006bd6; padding: 10px; }
    .adjustdiv{ border: 1px solid #000; text-align:center; width:256px; margin:0 10px 10px 10px; padding-bottom: 10px; padding-top: 5px;  }
    .adjustdiv img{max-width: 200px; max-height: 200px;}
    .textContainer{width: 100%; padding-top: 10px; }
    .btn-social{padding-top: 5px;}
    .prdname{font-size: 14px; line-height: 22px; font-weight: bold;text-align: center; color: #FF7518;}
    .prdprice{color:#9954bb;}
    .error{color: #FF0000;}

    .footer{ margin:0; padding: 17px 0; border-radius: 0px; height: auto; }
    .copyright{ color: #fff; text-align: center; }
    .copyright a{ color: #fff; }


      ul#stepForm, ul#stepForm li {
        margin: 0;
        padding: 0;
      }
      ul#stepForm li {
        list-style: none outside none;
      } 
      label{margin-top: 10px;}
      .help-inline-error{color:red;}
</style>

</head>

<body>

    <div class="container">

        <button class="btn btn-default" data-toggle="modal" data-target="#loginModal">Login</button>

        <div class="modal fade" id="loginModal" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="container mainbody">
      
      <div class="clearfix"></div>

  <!-- <div class="panel panel-primary"> -->
  <div class="panel">
    
    <div class="panel-body">
      <form name="basicform" id="basicform" method="post" action="yourpage.html">
        
        <div id="sf1" class="frm">
          <fieldset>
            <div class="panel-heading">
                <h4 class="text-center">Your business profile</h4>
                <p class="text-center">Hi Shobuj BD, Get Started by telling us about your business</p>
                        <br>
            </div>
            <div class="row">
                <div class="col-md-1">
                    <div class="form-group">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user pull-right"></span></a>
                    </div>
                </div>                      
                <div class="col-md-5">
                    <div class="form-group">
                        
                        <select name="industry_id" id="industry_id" class="col-sm-10 form-control">
                            <option value="1">industry1</option>
                            <option value="2">industry2</option>
                            <option value="3">industry3</option>
                        </select>
                    </div>
                    <p class="error_industry"></p>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user pull-right"></span></a>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <select name="profession_id" id="profession_id" class="col-sm-10 form-control">
                            <option value="1">Profession1</option>
                            <option value="2">Profession2</option>
                            <option value="3">Profession3</option>
                        </select>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-md-1">
                    <div class="form-group">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user pull-right"></span></a>
                    </div>
                </div>                          
                <div class="col-md-5">
                    <div class="form-group">
                        <select name="country_with_code" id="country_with_code" class="col-sm-10 form-control">
                            <option value="country1 88">Country1</option>
                            <option value="country2 99">Country2</option>
                            <option value="country3 66">Country3</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="phone">
                        
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-md-1">
                    <div class="form-group">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user pull-right"></span></a>
                    </div>
                </div>                      
                <div class="col-md-5">
                    <div class="form-group">
                        <select name="persons" id="persons" class="col-sm-10 form-control">
                            <option value="1">1 Person</option>
                            <option value="2">2 Person</option>
                            <option value="3">3 Person</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="web_url" id="web_url" class="form-control" placeholder="Website URL">
                        <p class="error_web_url"></p>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-md-1">
                    <div class="form-group">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user pull-right"></span></a>
                    </div>
                </div>  
                <div class="col-sm-11">
                    <div class="form-group">
                        <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                        <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::user()->id }}">
                        <p class="error_address"></p>
                    </div>
                </div>
            </div>

            <div class="row">                           
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="radio">
                            <label>
                                <input type="checkbox" id="present_number_address" value="1"> Present my phone number & address to my clients</label>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="clearfix" style="height: 10px;clear: both;"></div>


            <div class="form-group" style="text-align: center;">
              <div class="col-lg-12" >
                <button class="btn btn-primary open1" type="button">I'M ALL SET <span class="fa fa-arrow-right"></span></button> 
              </div>
            </div>

          </fieldset>
        </div>

        <div id="sf2" class="frm" style="display: none;">
          <fieldset>
            <div class="panel-heading">
              <h4 class="text-center"> Select your business needs</h4>
                <p class="text-center">MIYN can help you with all these tasks, so feel free to to select more than one</p>
                    <br>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="thumbnail">

                        <div class="caption" style="text-align: right;">
                          <input type="checkbox" id="manage_client_records" value="1">
                        </div>

                        <a href="{{ asset('/images/download.jpg') }}" target="_blank">
                          <img src="{{ asset('/images/download.jpg') }}" alt="Lights" style="width:100%">
                        </a>
                        <p style="margin-top: 10px;">Manage clients record</p>
                        
                      </div>
                    </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <div class="caption" style="text-align: right;">
                          <input type="checkbox" id="send_email_sms_promotions" value="1">
                        </div>
                        <a href="{{ asset('/images/download.jpg') }}" target="_blank">
                          <img src="{{ asset('/images/download.jpg') }}" alt="Lights" style="width:100%">
                        </a>
                      <p style="margin-top: 10px;">Send Email & SMS Promotions</p>
                        
                      </div>
                    </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <div class="caption" style="text-align: right;">
                          <input type="checkbox" id="send_email_sms_reminders" value="1">
                        </div>
                        <a href="{{ asset('/images/download.jpg') }}" target="_blank">
                          <img src="{{ asset('/images/download.jpg') }}" alt="Lights" style="width:100%">
                        </a>
                        <p style="margin-top: 10px;">Send Email & Email Reminders</p>
                        
                         
                      </div>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-md-4">
                    <div class="thumbnail">
                        <div class="caption" style="text-align: right;">
                          <input type="checkbox" id="add_online_scheduling" value="1">
                        </div>
                        <a href="{{ asset('/images/download.jpg') }}" target="_blank">
                          <img src="{{ asset('/images/download.jpg') }}" alt="Lights" style="width:100%">
                        </a>
                        <p style="margin-top: 10px;">Add online scheduling</p>
                        
                      </div>
                    </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <div class="caption" style="text-align: right;">
                          <input type="checkbox" id="invoices_estimates" value="1">
                        </div>
                        <a href="{{ asset('/images/download.jpg') }}" target="_blank">
                          <img src="{{ asset('/images/download.jpg') }}" alt="Lights" style="width:100%">
                        </a>
                      <p style="margin-top: 10px;">Create invoices & estimates</p>
                        
                      </div>
                    </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <div class="caption" style="text-align: right;">
                          <input type="checkbox" id="accept_payments" value="1">
                        </div>
                        <a href="{{ asset('/images/download.jpg') }}" target="_blank">
                          <img src="{{ asset('/images/download.jpg') }}" alt="Lights" style="width:100%">
                        </a>
                      <p style="margin-top: 10px;">Accept Payments</p>
                        
                      </div>
                      
                    </div>                                
                </div>

            <div class="clearfix" style="height: 10px;clear: both;"></div>



            <div class="clearfix" style="height: 10px;clear: both;"></div>


            <div class="form-group" style="text-align: center;">
              <div class="col-lg-10">
                <!-- <button class="btn btn-warning back2" type="button"><span class="fa fa-arrow-left"></span> Back</button>  -->
                <button class="btn btn-primary open2" type="button">Done <span class="fa fa-arrow-right"></span></button>
              </div>
            </div>

          </fieldset>
        </div>

        <div id="sf3" class="frm" style="display: none;">
          <fieldset>
           <div class="panel-heading">
              <h4 class="text-center">You are ready for takeoff!</h4>
              <p class="text-center">Sit tight, we'll walk you through getting started</p>
            </div>

            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="form-group" style="text-align: center;">
              <div class="col-lg-12">
                <!-- <button class="btn btn-warning back3" type="button"><span class="fa fa-arrow-left"></span> Back</button>  -->
                <button class="btn btn-primary open3" type="button">GO </button> 
                <img src="spinner.gif" alt="" id="loader" style="display: none">
              </div>
            </div>

            <br>
            <br>

             <div class="panel-heading">
              <h4 class="text-center">Need a little extra hand-holding?</h4>
              <p class="text-center"><a href="http://127.0.0.1:8000/dashboard">Schedule a call</a> with an onboarding specialist to get a one-on-one walk through</p>
            </div>

          </fieldset>
        </div>
      </form>
    </div>
  </div>

     </div>
    </div>

</div>

<?php
    if(1===1){
        echo '<script type="text/javascript">
        $(document).ready(function(){
            $("#loginModal").modal("show");
        });
    </script>';
    }
    else{
        echo "<script>window.location = '/dashboard/onboarding'</script>";
    }
?>

<script type="text/javascript">
  
  jQuery().ready(function() {

    // validate form on keyup and submit
    var v = jQuery("#basicform").validate({
      rules: {
        phone_number: {
          required: true,
          number: true,
          minlength: 6,
          maxlength: 11
        },
        web_url: {
          required: true,
          url: true
        },

      },
      errorElement: "span",
      errorClass: "help-inline-error",
    });

    $(".open1").click(function() {
        
      if (v.form()) {

        $(".frm").hide("fast");
        $("#sf2").show("slow");
      }
    });

    $(".open2").click(function(e) {
        e.preventDefault();
        /*var ck_box = $('input[type="checkbox"]:checked').length;
        console.log(ck_box); 

        if(ck_box > 0){
          alert(ck_box);
          $(".frm").hide("fast");
            $("#sf3").show("slow");
        } 
        else{
            alert("hhhh");
            return false;
        }*/
      if (v.form()) {

        $(".frm").hide("fast");
        $("#sf3").show("slow");
      }
    });
    
    $(".open3").click(function() {

      if (v.form()) {

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        

        var industry_id = $('#industry_id').val();
        var profession_id = $('#profession_id').val();
        var country_with_code = $('#country_with_code').val();
        var phone_number = $('#phone_number').val();
        var persons = $('#persons').val();
        var web_url = $('#web_url').val();
        var address = $('#address').val();
        var present_number_address = $('#present_number_address:checked').val();
        var user_id = $('#user_id').val();

        var manage_client_records = $('#manage_client_records:checked').val();
        var send_email_sms_promotions = $('#send_email_sms_promotions:checked').val();
        var send_email_sms_reminders = $('#send_email_sms_reminders:checked').val();
        var add_online_scheduling = $('#add_online_scheduling:checked').val();
        var invoices_estimates = $('#invoices_estimates:checked').val();
        var accept_payments = $('#accept_payments:checked').val();

        alert(industry_id);

        //window.location = '/test2.php';
        $.ajax({
                type:'POST',
                url:'{{url("/business")}}',
                data:{_token:CSRF_TOKEN, industry_id:industry_id, profession_id:profession_id, country_with_code:country_with_code, phone_number:phone_number, persons:persons, web_url:web_url, address:address, present_number_address:present_number_address, user_id:user_id, manage_client_records:manage_client_records, send_email_sms_promotions:send_email_sms_promotions, send_email_sms_reminders:send_email_sms_reminders, add_online_scheduling:add_online_scheduling, invoices_estimates:invoices_estimates, accept_payments:accept_payments },
                dataType:'json',
                success:function(data){
                    console.log(data.success);
                    console.log(data.message);
                    console.log(data.slug);
                    console.log(data.profession_id);
                    if(data.success == 'ok2'){
                        window.location = 'http://localhost/multi_step_form/test3.php';
                    }else{
                        $('.statusMsg').html('<span style="color:red;">Some problem occurred, please try again.</span>');
                    }
                    $('.submitBtn').removeAttr("disabled");
                    $('.modal-body').css('opacity', '');
                }
            });
        }
    });
    
    $(".back2").click(function() {
      $(".frm").hide("fast");
      $("#sf1").show("slow");
    });

    $(".back3").click(function() {
      $(".frm").hide("fast");
      $("#sf2").show("slow");
    });

  });
</script>

   

</body>

</html>