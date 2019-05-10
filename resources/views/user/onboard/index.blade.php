<head>
    <title>MYIN Onboard</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">

        <!-- Modal -->
        <div class="modal fade" id="myModal1" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="border-bottom: 0px;">
                        <h4 class="modal-title text-center" id="myModalLabel">Your business profile</h4>
                        <p class="text-center">Hi Shobuj BD, Get Started by telling us about your business</p>
                        <br>
                    </div>

                    <div class="modal-body">
                        <p class="statusMsg"></p>
                        <form role="form">
                            <div class="row">
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user pull-right"></span></a>
                                    </div>
                                </div>                      
                                <div class="col-md-5">
                                    <div class="form-group">
                                        
                                        <select name="industry_id" id="industry_id" class="col-sm-10 form-control">
                                            <option selected value="1">industry1</option>
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
                                        <p class="error_phone_number"></p>
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
                                        <input type="text" name="address" id="address" required="" class="form-control" placeholder="Address">
                                        <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::user()->id }}">
                                        <p class="error_address"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">                           
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="radio">
                                            <label>
                                                <input type="checkbox" id="present_number_address" value="1"> Present my phone number & address to my clients</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>

                        </form>
                    </div>

                    <div class="modal-footer" style="border-top: 0px;text-align: center;">
                        <button type="button" class="btn btn-success submitBtn" onclick="submitContactForm()" id="modal1">I'm all set</button>
                       <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 2-->
        <div class="modal fade" id="myModal2" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="myModalLabel">Modal 2</h4>
                    </div>
                    
                    <p class="send_email_sms_reminders"></p> 

                    <div class="modal-body">
                        <form role="form">
                    <p class="statusMsg2"></p>
                    <p class="error_business3"></p>
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
                                  <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::user()->id }}">
                                </div>
                                
                            </div>
                                                          
                        </form>
                    </div>

                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-primary" id="modal2">Modal 2</button> -->
                        <button type="button" class="btn btn-success submitBtn2" onclick="submitContactForm2()" id="modal2">Done</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

         <!-- Modal 3-->
        <div class="modal fade" id="myModal3" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="myModalLabel">Message</h4>
                    </div>

                    <div class="modal-body">
                        <h2 class="text-center">Thank's Provide your information</h2>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php 
        if(1===1){
            echo '<script type="text/javascript">
            $(document).ready(function(){
                $("#myModal1").modal("show");
            });
        </script>';
        }
        else{
            echo "<script>window.location = '/dashboard/onboarding'</script>";
        }

    ?>
    

   <!--  <script type="text/javascript">
        //set button id on click to hide first modal
        $("#modal1").on("click", function() {
            $('#myModal1').modal('hide');
        });
        //trigger next modal
        $("#modal1").on("click", function() {
            $('#myModal2').modal('show');
        });

        //set button id on click to hide second modal
        $("#modal2").on("click", function(){
            $('#myModal2').modal('hide');
        });

        //trigger next modal
        $("#modal2").on("click", function(){
            $("#myModal3").modal('show');
        });
    </script> -->

    <script>
    function submitContactForm(){

        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        //var industry_id =  $( "#industry_id option:selected" ).text();
        //var industry_id = $('#industry_id:checked').val();
        //var industry_id = $('#industry_id:checked').val();
        
        var industry_id = $('#industry_id').val();
        var profession_id = $('#profession_id').val();
        var country_with_code = $('#country_with_code').val();
        var phone_number = $('#phone_number').val();
        var persons = $('#persons').val();
        var web_url = $('#web_url').val();
        var address = $('#address').val();
        var present_number_address = $('#present_number_address:checked').val();
        var user_id = $('#user_id').val();

        //alert(industry_id);

        if(phone_number.trim() == '' || isNaN(phone_number) ){
            //alert('Please enter your phone_number.');
            $('#phone_number').focus();
             $('.error_phone_number').html('<span style="color:red;">Please enter only number</p>');
            return false;

        }

        else if(web_url.trim() == '' ){
            //alert('Please enter your website url address.');
            $('#web_url').focus();
            $('.error_web_url').html('<span style="color:red;">Please enter your website url address</p>');
            return false;    
        }

        else if(address.trim() == '' ){
            //alert('Please enter your address.');
            $('#address').focus();
            $('.error_address').html('<span style="color:red;">Please enter address</p>');
            return false;

        }

        else{
            $.ajax({
                type:'POST',
                url:'{{url("/business")}}',
                data:{_token:CSRF_TOKEN, industry_id:industry_id, profession_id:profession_id, country_with_code:country_with_code, phone_number:phone_number, persons:persons, web_url:web_url, address:address, present_number_address:present_number_address, user_id:user_id},
                dataType:'json',
                success:function(data){
                    console.log(data.success);
                    console.log(data.message);
                    console.log(data.slug);
                    console.log(data.profession_id);
                    if(data.success == 'ok'){

                       /*$("#modal1").on("click", function() {
                           $("#myModal1").modal("hide");
                       });*/

                      /* jQuery(function(){
                          jQuery('#modal1').click();
                          $("#myModal1").modal("hide");
                       });*/

                       $("#modal1").trigger('click'); 
                       $("#myModal1").modal("hide");
                       //trigger next modal
                       $("#modal1").on("click", function() {
                           $('#myModal2').modal('show');
                       });


                    }else{
                        $('.statusMsg').html('<span style="color:red;">Some problem occurred, please try again.</span>');
                    }
                    $('.submitBtn').removeAttr("disabled");
                    $('.modal-body').css('opacity', '');
                }
            });
        }
    }
    </script>

    <script>
    function submitContactForm2(){

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        //var address2 = $('#address2').val();
        //var business = $("input[type='checkbox']").val();
        var manage_client_records = $('#manage_client_records:checked').val();
        var send_email_sms_promotions = $('#send_email_sms_promotions:checked').val();
        var send_email_sms_reminders = $('#send_email_sms_reminders:checked').val();
        var add_online_scheduling = $('#add_online_scheduling:checked').val();
        var invoices_estimates = $('#invoices_estimates:checked').val();
        var accept_payments = $('#accept_payments:checked').val();

        var user_id = $('#user_id').val();

        
        //alert(send_email_sms_reminders);

        if(!manage_client_records || !send_email_sms_promotions || !send_email_sms_reminders || !add_online_scheduling || !invoices_estimates || !accept_payments){
            alert('Please select at least one.');
            $('#send_email_sms_reminders').focus();
             $('.send_email_sms_reminders').html('<span style="color:red;">Please select at least one</p>');
            return false;

        }

        else{
            $.ajax({
                type:'POST',
                url:'{{url("/services")}}',
                data:{_token:CSRF_TOKEN, manage_client_records:manage_client_records, send_email_sms_promotions:send_email_sms_promotions, send_email_sms_reminders:send_email_sms_reminders, add_online_scheduling:add_online_scheduling, invoices_estimates:invoices_estimates, accept_payments:accept_payments, user_id:user_id},
                dataType:'json',
               
                success:function(data2){
                    console.log(data2.msg2);
                    console.log(data2.business3);
                    if(data2.success == 'ok2'){
                        window.location = '{{ url("/dashboard/onboarding") }}';
                       $("#modal2").on("click", function(){
                           $('#myModal2').modal('hide');
                       });

                       //trigger next modal
                       $("#modal2").on("click", function(){
                           $("#myModal3").modal('show');
                       });

                       $('.statusMsg2').html('<span style="color:green;">Thank you contact us.</span>');

                    }else{
                        $('.statusMsg2').html('<span style="color:red;">Please Select at least 1 business information.</span>');
                    }
                    $('.submitBtn2').removeAttr("disabled");
                    $('.modal-body').css('opacity', '');
                }
            });
        }
    }
    </script>

</body>

</html>