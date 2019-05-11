<head>
    <title>Onboard System</title>

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
                                        
                                        <select name="industry" id="industry" class="col-sm-10 form-control">
                                            <option value="industry1">industry1</option>
                                            <option value="industry2">industry2</option>
                                            <option value="industry3">industry3</option>
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
                                        <select name="profession" id="profession" class="col-sm-10 form-control">
                                            <option value="profession1">Profession1</option>
                                            <option value="profession2">Profession2</option>
                                            <option value="profession3">Profession3</option>
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
                                        <select name="country" id="country" class="col-sm-10 form-control">
                                            <option value="country1">Country1</option>
                                            <option value="country2">Country2</option>
                                            <option value="country3">Country3</option>
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
                                        <select name="person" id="person" class="col-sm-10 form-control">
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
                                        <p class="error_address"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">                           
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="radio">
                                            <label>
                                                <input type="checkbox" id="show_number_address" value="show_number_address"> Present my phone number & address to my clients</label>
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
                    <div class="modal-body">
                        <form role="form">
                    <p class="statusMsg2"></p>
                    <p class="error_business3"></p>
                            <div class="row">
                                <div class="col-md-4">
                                <div class="thumbnail">
                                    <a href="http://localhost/onboard/icon.png" target="_blank">
                                      <img src="http://localhost/onboard/icon.png" alt="Lights" style="width:100%">
                                    </a>
                                  <div class="caption">
                                    <input type="checkbox" id="business1" value="we">
                                  </div>
                                    
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="thumbnail">
                                    <a href="http://localhost/onboard/icon.png" target="_blank">
                                      <img src="http://localhost/onboard/icon.png" alt="Lights" style="width:100%">
                                    </a>
                                  <div class="caption">
                                    <input type="checkbox" id="business2" value="sd">
                                  </div>
                                    
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="thumbnail">
                                    <a href="http://localhost/onboard/icon.png" target="_blank">
                                      <img src="http://localhost/onboard/icon.png" alt="Lights" style="width:100%">
                                    </a>
                                  <div class="caption">
                                    <input type="checkbox" id="business3" value="business">
                                  </div>
                                    
                                  </div>
                                </div>  
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                <div class="thumbnail">
                                    <a href="http://localhost/onboard/icon.png" target="_blank">
                                      <img src="http://localhost/onboard/icon.png" alt="Lights" style="width:100%">
                                    </a>
                                  <div class="caption">
                                    <input type="checkbox" id="business4" value="we">
                                  </div>
                                    
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="thumbnail">
                                    <a href="http://localhost/onboard/icon.png" target="_blank">
                                      <img src="http://localhost/onboard/icon.png" alt="Lights" style="width:100%">
                                    </a>
                                  <div class="caption">
                                    <input type="checkbox" id="business5" value="sd">
                                  </div>
                                    
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="thumbnail">
                                    <a href="http://localhost/onboard/icon.png" target="_blank">
                                      <img src="http://localhost/onboard/icon.png" alt="Lights" style="width:100%">
                                    </a>
                                  <div class="caption">
                                    <input type="checkbox" id="business6" value="business">
                                  </div>
                                    
                                  </div>
                                </div>
                                <p class="error_business3"></p>  
                            </div>
                                                          
                        </form>
                    </div>

                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-primary" id="modal2">Modal 2</button> -->
                        <button type="button" class="btn btn-success submitBtn2" onclick="submitContactForm2()" id="modal2">I'm all set 2</button>
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
            echo "<script>window.location = '/multistep_form/'</script>";
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
        var industry = $('#industry').val();
        var profession = $('#profession').val();
        var country = $('#country').val();
        var phone_number = $('#phone_number').val();
        var person = $('#person').val();
        var web_url = $('#web_url').val();
        var address = $('#address').val();
        var show_number_address = $('#show_number_address:checked').val();
        //alert(address);

        if(phone_number.trim() == '' ){
            //alert('Please enter your phone_number.');
            $('#phone_number').focus();
             $('.error_phone_number').html('<span style="color:red;">Please enter your phone number</p>');
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
                data:{_token:CSRF_TOKEN, industry:industry},
                dataType:'json',
                success:function(data){
                    console.log(data.msg);
                    if(data.msg == 'ok'){

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
        var business3 = $('#business3:checked').val();
        
        //alert(business3);

        if(business3.trim() == '' ){
            //alert('Please enter your phone_number.');
            $('#business3').focus();
             $('.error_business3').html('<span style="color:red;">Please enter your business</p>');
            return false;

        }

        else{
            $.ajax({
                type:'POST',
                url:'{{url("/services")}}',
                data:{_token:CSRF_TOKEN, business3:business3},
                dataType:'json',
               
                success:function(data2){
                    console.log(data2.msg2);
                    if(data2.msg2 == 'ok2'){
                        window.location = '{{ url("/dashboard") }}';
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