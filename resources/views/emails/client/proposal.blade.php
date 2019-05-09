<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>'.$subject.'</title>
		<script type="text/javascript" src="https://addevent.com/libs/atc/1.6.1/atc.min.js" async defer></script>
		<style type="text/css">	
			img{
				margin: 0;
				border: none;
			}
			a{
				font-family: Arial, Helvetica, sans-serif;
				font-weight: normal;
				color: #555555;
				font-size: 13px;
				text-decoration: none !important;
				line-height: 1.5;
			}
			body{
				font-family: Arial, Helvetica, sans-serif;
				font-size: 13px;
				color: #555555;
				line-height: 1.5;
			}
			p{
				font-family: Arial, Helvetica, sans-serif;
				font-weight: normal;
				color:#555555;
				font-size: 13px;
				margin: 0 0 10px;
				line-height: 1.3;
			}
			.email-body{
				background-color: #ffffff;
				width: 100%;
				padding: 20px;
			}
			.email-container{
				width: 630px;
				margin: 0 auto;
				background-color: #f7f7f7;
			}
			.header{
				font-family: Arial, Helvetica, sans-serif;
				background-color: #f7f7f7;
			}
			.header h4{
				font-family: Arial, Helvetica, sans-serif;
				font-size: 16px;
				font-weight: 600;
				margin: 0;
				color: #333333;
			}
			.client-image{
				font-family: Arial, Helvetica, sans-serif;
				font-size: 12px;
			}
			.client-image span {
				color: #333333;
				vertical-align: middle;
				display: inline-block;
			}
			.client-image img{
				display: inline-block;
				vertical-align: middle;
			}
			@media only screen and (max-width: 480px){
				table[class=booking-area] p{
					margin: 0 0 15px !important;
				}
			}	
		</style>
	</head>
	<body style="margin:0 auto;" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
		<div class="email-body">
			<div class="email-container">
				<table align="center" class="header" width="630" bgcolor="#f7f7f7" border="0" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;">
					<tbody>
						<tr>
							<td colspan="3" height="20"></td>
						</tr>
						<tr>
							<!-- <td colspan="3" style="display: none;opacity: 0; visibility: hidden;">'.substr($content, 0, 20).'</td> -->
						</tr>
						<tr>
							<td width="20"></td>
							<td valign="middle" style="vertical-align: middle;">
								<table width="100%" border="0" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;">
									<tbody>
										<tr>
											<td colspan="3" class="client-image" align="center" valign="middle" style="vertical-align: middle;text-align: center;">
											<!-- if(!empty($avatar)){ -->
											<!-- <div style="width: 150px;font-size: 20px;color: #ffffff;margin:0 auto;"><img src="'.$avatar.'" alt="'.$firstname.' '.$lastname.'" style="width: 100%;"></div> -->
											<!-- } else { -->
												<!-- $fulName = substr($firstname, 0, 1).substr($lastname, 0, 1); -->
											<div style="width: 70px;height: 70px;font-size: 20px;color: #ffffff;line-height: 70px;margin:0 auto;border-radius: 50px;background-color: #4675d9;">{{ substr($booking->first_name, 0, 1)." ".substr($booking->last_name, 0, 1) }}</div>        
											<!-- } -->
											</td>
										</tr>
									</tbody>
								</table>
							</td>
							<td width="20"></td>
						</tr>
						<tr>
							<td colspan="3" height="20"></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="email-container">
				<table align="center" class="email-content" bgcolor="#f7f7f7" width="630" border="0" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;background-color: #f7f7f7;">
					<tbody>
						<tr>
							<td width="20"></td>
							<td align="left" valign="top" style="text-align: left;vertical-align: top;">
							<table align="left" bgcolor="#ffffff" width="100%" border="0" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;background-color: #ffffff;text-align: left;">
								<tbody>
									<tr>
									<td colspan="3" height="20"></td>
									</tr>
									<tr>
										<td width="20"></td>
										<td valign="top" style="vertical-align: top;">
											<div style="line-height: 2;">Dear {{ $staff->display_name }}, </div>
											<div>A new appointment request has been submitted by {{ $booking->first_name." ".$booking->last_name }}.</div>
											<div>New Appointment Request</div>
											<div>{{ $service->name }}</div>
											<div>Proposed Times</div>

											@foreach($dateAndTimes as $key=>$value)
											    <div>
											        {{  \Carbon\Carbon::parse($key)->format('D, M d') }} at
											        @foreach($value as $time)
											            <div>{{ $time }}</div>
											        @endforeach
											    </div>
											    <!--<div>{{$key}}</div>-->
											@endforeach
											<div>More details</div>
                            				<div>
                            				    Duration: 
                            				    @if($service->duration_hours == 0)
                            				        {{$service->duration_minutes }} minutes
                            				    @else
                            				        @if($service->duration_hours == 1)
                            				            {{$service->duration_hours}} hour and {{$service->duration_minutes }} minutes
                            				        @else
                            				            {{$service->duration_hours}} hours and {{$service->duration_minutes }} minutes
                            				        @endif
                            				    @endif
                            				</div>
                            				<div>
                            				    Category: {{$category->name}}
                            				</div>
											<div style="line-height: 2;">
											    Notes: {{ $booking->message }}
											</div>
											<div>
											    <a href="#">Accept</a>
											    <a href="#">Decline</a>
											    <a href="#">Reply / View Online</a>
											</div>
											<div>
											    Full details on {{ $booking->first_name." ".$booking->last_name }}
											</div>
											<div>Email: {{$booking->email}}</div>
											<div>Source: Website</div>
											<div>Source URL: <a href="{{$contactInfo->website_url}}"></a>{{$contactInfo->website_url}}</div>
										</td>
										<td width="20"></td>
									</tr>
									<tr>
										<td colspan="3" height="40"></td>
									</tr>
									<tr>
										<td colspan="3" height="20"></td>
									</tr>
								</tbody>
							</table>
							</td>
							<td width="20"></td>
						</tr>
					</tbody>
				</table>
				
				
			</div>
			<div class="email-container">
				<table align="center" class="footer" width="630" bgcolor="#f7f7f7" border="0" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;">
					<tbody>
						<tr>
							<td colspan="3" height="35"></td>
						</tr>
						<tr>
							<td width="20"></td>
							<td valign="top" align="center" style="vertical-align: top;text-align: center;">
							<div style="text-align: center;font-size: 10px;line-height: 2;">Please do not reply to this email. </div>
						</td>
							<td width="20"></td>
						</tr>
						<tr>
							<td colspan="3" height="35"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>	
	</body>
</html>