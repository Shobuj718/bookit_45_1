var key = '1234567';

var getCalendar;
var totalElementSize;
var updateAvailableTime;
var getAndUpdateAvailableTimeView;
var updateCalendarSettings;
var nowDate = new Date();
var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);

var business_hour_end;
var business_hour_start;
var increment_hour;
var increment_minute;
var week_start;
var weekly_off = [];

var availableTimes = [];
var infoCenter = {
	'service_slug': '',
	'staff_slug': '',
	'subject': '',
	'message': '',
	'first_name': '',
	'last_name': '',
	'email': ''
};
var dataCenter = {};
var selectedDates = [];
var selectedTimes = [];
var lastSelectionDate = null;

var screenDate;

(function ($) {
    
	"use strict";
	
	getCalendar = function (target_div, year, month) {
	    alert('calendar');
		$.ajax({
			type: 'get',
			url: 'http://127.0.0.1:8000/api/get-calendar?key=' + key,
			data: 'year=' + year + '&month=' + month,
			success: function (html) {
				$('#' + target_div).html(html);
			}
		});
	}

    totalElementSize = function() {
        var len = 0;
        for (var prop in dataCenter) {
            len = len + dataCenter[prop].length;
        }
        
        return len;
    }
	getAndUpdateAvailableTimeView = function () {
        var lastTimeSlotDate = dataCenter
		var availableTimesHTML = '';
		var dateToShow;

		if (selectedDates.length > 0/* && selectedDates[selectedDates.length - 1].length > 0*/) {
		    screenDate = selectedDates[selectedDates.length - 1]
// 			dateToShow = 'Availability for ' + moment(selectedDates[selectedDates.length - 1]).format("dddd, MMM DD, YYYY") + '';
            dateToShow = 'Availability for ' + moment(screenDate).format("dddd, MMM DD, YYYY") + '';
		} else {
			dateToShow = 'No date has been selected';
		}

		for (var i = 0; i < availableTimes.length; i++) {
			availableTimesHTML += '<div class="form-check">';
			if (dataCenter.hasOwnProperty(screenDate)) {
				if (dataCenter[screenDate].includes(availableTimes[i])) {
					availableTimesHTML += '<input class="form-check-input" type="checkbox" value="' + availableTimes[i] + '" name="select-time[]" checked>';
				} else {
					availableTimesHTML += '<input class="form-check-input" type="checkbox" value="' + availableTimes[i] + '" name="select-time[]">';
				}

			} else {
				availableTimesHTML += '<input class="form-check-input" type="checkbox" value="' + availableTimes[i] + '" name="select-time[]">';
			} 

			availableTimesHTML += '<label class="form-check-label" for="select-time">';
			availableTimesHTML += availableTimes[i];
			availableTimesHTML += '</label>';
			availableTimesHTML += '</div>';

		}


		$("#available-times").html(availableTimesHTML);
		$("#screen-date").html(dateToShow);
		
		screenDate = selectedDates[selectedDates.length - 1];

// 		console.log("++++++++++++++++++++++++++++++++++++++++++++++++++");
// 		console.log("Data: ", dataCenter);
// 		console.log("Selected Times: ", selectedTimes);
// 		console.log("selected Dates: ", selectedDates);
// 		console.log("Screen Date: ", screenDate);
		// console.log("++++++++++++++++++++++++++++++++++++++++++++++++++");
		// console.log("");
		// console.log("***********************");
		// console.log(availableTimesHTML);
		// console.log("***********************");
	}

	updateAvailableTime = function (startTime, endTime, addHour, addMinute) {
		
		console.log("inside updateAvailableTime() ");
		// ------------------------------ Current time -------------------------------------
		var currentAvailableTimeInFormate = startTime;
		var x = moment(currentAvailableTimeInFormate, "hh:mm A").format("HH:mm:ss").split(":");
		var currentAvailableTimeInInteger = parseInt(x.slice(0, x.length - 1).join(''));

		// ------------------------------ End Time -----------------------------------------
		var y = moment(endTime, "hh::mm A").format("HH:mm:ss").split(":");
		var endTimeInInteger = parseInt(y.slice(0, y.length - 1).join(''));

		while (currentAvailableTimeInInteger < endTimeInInteger) {

			currentAvailableTimeInFormate = moment(currentAvailableTimeInFormate, "hh:mm A").add(addHour, 'hours').add(addMinute, 'minutes').format("hh:mm A");
			x = moment(currentAvailableTimeInFormate, "hh:mm A").format("HH:mm:ss").split(":");
			currentAvailableTimeInInteger = parseInt(x.slice(0, x.length - 1).join(''));
			availableTimes.push(currentAvailableTimeInFormate);
		
		}


		var lastElementToArray = moment(availableTimes[availableTimes.length - 1], "hh:mm A").format("HH:mm:ss").split(":");
		var lastElementInInteger = parseInt(lastElementToArray.slice(0, lastElementToArray.length - 1).join(''));


		if (lastElementInInteger > endTimeInInteger) {
			availableTimes = availableTimes.slice(0, availableTimes.length - 1);
		}



		getAndUpdateAvailableTimeView();

	}

	updateCalendarSettings = function () {
		$.ajax({
			type: 'get',
			url: 'http://127.0.0.1:8000/api/get-calendar-settings?key=' + key
		}).done(function (data) {

			business_hour_end = data.business_hour_end;
			business_hour_start = data.business_hour_start;
			increment_hour = data.increment_hour;
			increment_minute = data.increment_minute;
			week_start = data.week_start;
			weekly_off = data.weekly_off;

			updateAvailableTime(business_hour_start, business_hour_end, increment_hour, increment_minute);
			console.log("ajax called");
		}).fail(function (error) {
			console.log(error);
		});
	}




	$(document).ready(function ($) {
        console.log('Just Loaded....');

        getAndUpdateAvailableTimeView();
		updateCalendarSettings();

		// selectedDates.push(moment(new Date()).format("MM/DD/YYYY"));
		
		
		// ======================================================= On date Array Change =======================================================
		
		
		$("#selected-date-array").on('change', function () {
			getAndUpdateAvailableTimeView();
			var dates = $(".dateArray").val();
			selectedDates = dates.split(",");
			getAndUpdateAvailableTimeView();
    		
			console.log(screenDate);
			
			if (dataCenter.hasOwnProperty(screenDate) && dataCenter[screenDate].length !== 0) {
				// $("#selected-date-array").trigger("change");
				var datesInObj = [];

				for (var i = 0; i < screenDate.length; i++) {
					var a = screenDate.split("/");
					var b = parseInt(a[1]);
					datesInObj.push(b);
				// 	console.log(a, b);
				}

				var disabledChange = weekly_off.concat(datesInObj);
				// console.log(datesInObj);

				$('#calendar_div').datepicker({
					multidate: true,
					useCurrent: true,
					startDate: today,
					toggleActive: false,
					daysOfWeekDisabled: disabledChange
				});
				// $("#calendar_div").datepicker('update', new Date());
				$('.dateArray').datepicker({
					multidate: true,
				// 	useCurrent: true,
					startDate: today,
					format: 'dd/mm/yyyy',
					daysOfWeekDisabled: disabledChange
				});
			}
			
			getAndUpdateAvailableTimeView();
		});
		
        // ======================================================= Time event =======================================================

        $(document).on('change', '#miyn-client-widget input[name="select-time[]"]', function () {
            
            // console.log(screenDate, selectedDates, selectedTimes);
            var returnValue = true;
            
            
            if ($(this).prop("checked") === true) {
                if (selectedDates.length < 1) return false;
                
            	if (totalElementSize() < 3) {
            		if (!dataCenter.hasOwnProperty(screenDate)) {
            			dataCenter[screenDate] = [$(this).val()];
            		} else {
            		    
            		    if(dataCenter[screenDate].includes($(this).val())) {
            		        dataCenter[screenDate].pop($(this).val());
            		    } else {
            		        dataCenter[screenDate].push($(this).val());    
            		    }
            			
            		}
            		
            		console.log("UnCheckedBox", totalElementSize(), dataCenter.hasOwnProperty(screenDate));
            		console.log(dataCenter);
            
            	} else {
            	    
            		this.checked = false;
                    alert("You cannot select more than 3 timeslots.");
                    console.log("UnCheckedBox", totalElementSize(), dataCenter.hasOwnProperty(screenDate));
            		console.log(dataCenter);
            		returnValue = false
            
            	}	
            
            } else {
                if (Object.keys(dataCenter).length > 0){
                    dataCenter[screenDate].pop($(this).val());
                }
            	totalElementSize();
            	console.log("CheckedBox", totalElementSize(), dataCenter.hasOwnProperty(screenDate));
        		console.log(dataCenter);    
            }
			getAndUpdateAvailableTimeView();
			return returnValue;

		});
        
		$(document).on('click', '#miyn-client-widget a', function (e) {
			e.preventDefault();
			var that = this;
			var aLink = $(this).attr('href');
			if (aLink.startsWith('#')) {
				var backID = $(this).attr('data-pre');
				var popID = aLink.replace('#', '');

				if (popID == 'close') {
					$('#miyn-client-widget .popup-box, .button-content').removeClass('is-open');
				} else if ($(this).hasClass('back-button')) {
					var serText = $('#miyn-client-widget .' + popID + ' .service-text').text();
					$('#miyn-client-widget .' + popID + ' .selected-service').text(serText);
					$('#miyn-client-widget .popup-box').removeClass('is-open');
					$('#miyn-client-widget .popup-box.' + popID).addClass('is-open');
				} else {
					var dataId = $(this).attr('data-id');
					var dataTitle = $(this).attr('data-title');
					if (dataTitle !== '') {
						$('#miyn-client-widget .' + popID + ' .back-button').attr('href', '#' + backID);
						$('#miyn-client-widget .selected-service').text(dataTitle);
						$('#miyn-client-widget .' + popID + ' .service-text').text(dataTitle);
					}
					$('#miyn-client-widget .popup-box, .button-content').removeClass('is-open');
					$('#miyn-client-widget .' + popID).addClass('is-open');
				}

				if (aLink === "#appointment-box") {
					$.ajax({
						url: 'http://127.0.0.1:8000/api/categories?key=' + key,
						method: "get"
					}).done(function (data) {
						console.log(data);
						var servicesHtml = '';

						for (var i = 0; i < data.categories.length; i++) {
							servicesHtml += '<h6>' + data.categories[i].name + '</h6>';
							servicesHtml += '<ul>';
							for (var j = 0; j < data.categories[i].services.length; j++) {
								servicesHtml += '<li class="appointment-item">';
								servicesHtml += '<input type="hidden" class="category-id" value="' + data.categories[i].id + '">';
								servicesHtml += '<input type="hidden" class="bussiness-id" value="' + data.categories[i].business_id + '">';
								servicesHtml += '    <a data-pre="appointment-box" data-id="' + data.categories[i].services[j].slug + '" data-title="' + data.categories[i].services[j].name + '" href="#staff-box">';
								servicesHtml += '        <div class="icon"><i class="far fa-user"></i></div>';
								servicesHtml += '        <div class="list-title">';
								servicesHtml += '<input type="hidden" class="service-id" value="' + data.categories[i].services[j].id + '">';
								servicesHtml += '            <p><strong>' + data.categories[i].services[j].name + '</strong>' + data.categories[i].services[j].description + '</p>';
								servicesHtml += '        </div>';
								servicesHtml += '        <div class="list-time">';
								servicesHtml += '            <i class="far fa-clock"></i>';
								servicesHtml += '            <span class="ng-binding">' + (parseInt(data.categories[i].services[j].duration_hours) ? data.categories[i].services[j].duration_hours + 'hours, ' : '') + (parseInt(data.categories[i].services[j].duration_minutes) ? data.categories[i].services[j].duration_minutes + 'minutes' : '') + '</span>';
								servicesHtml += '        </div>';
								servicesHtml += '    </a>';
								servicesHtml += '</li>';
							}
							servicesHtml += '</ul>';

							$('#miyn-client-widget > div.appointment-box.popup-box.is-open > div > div.appointment-items.services').html(servicesHtml);
						}
					}).fail(function (data) {});
					
					$(document).on('click', '#miyn-client-widget .appointment-item>a', function () {
                        var slug = $(this).attr('data-id');
                        infoCenter['service_slug'] = slug;
                        console.log(slug);
            		});
				}

				if (aLink === "#staff-box") {
					$.ajax({
						url: 'http://127.0.0.1:8000/api/staffs?key=' + key,
						method: "get"
					}).done(function (data) {
						console.log(data);
						var staffListHtml = '';
						for (var i = 0; i < data.staffs.length; i++) {
							staffListHtml += '<li>';
							staffListHtml += '<a data-pre="staff-box" data-id="' + data.staffs[i].slug + '" data-title="' + data.staffs[i].display_name + '" href="#calendar-box">';
							staffListHtml += '    <div class="icon profile-pic"><img src="' + data.staffs[i].avatar + '" alt="' + data.staffs[i].display_name + '"></div>';
							staffListHtml += '    <div class="list-title">';
							staffListHtml += '        <p><strong>' + data.staffs[i].display_name + '</strong> ' + data.staffs[i].professional_title + '</p>';
							staffListHtml += '    </div>';
							staffListHtml += '</a>';
							staffListHtml += '</li>';
						}

						$('#miyn-client-widget .staff-list').html(staffListHtml);

					}).fail(function (response) {
						console.log(response);
					});
				}

				if (aLink === '#calendar-box') {
					$('#calendar_div').datepicker({
						multidate: true,
				// 		useCurrent: true,
				        toggleActive: false,
						startDate: today,
						daysOfWeekDisabled: weekly_off
					});
				// 	$("#calendar_div").datepicker('update', new Date());
					$('.dateArray').datepicker({
						multidate: true,
				// 		useCurrent: true,
						toggleActive: false,
						startDate: today,
						format: 'dd/mm/yyyy',
						daysOfWeekDisabled: weekly_off
					});
				// 	$(".dateArray").datepicker('update', new Date());
					
					
                    $("#miyn-client-widget #calendar_div .datepicker .datepicker-days table").on('click', 'td.day', function () {
                        var disabledEle = $(this).hasClass('disabled');
                        var epochTime = $(this).data('date');
                        var formattedDate = moment(epochTime).format('MM/DD/YYYY');
                        var selectID = $(this)[0];
                        
                        getAndUpdateAvailableTimeView();
                        
                        // MODIFIED - 2019-02-07
                        var arrSelectedTimeSlots = dataCenter[formattedDate];
						$('#available-times').find('.form-check-input').prop('checked', false);
						
						if(arrSelectedTimeSlots) {
						    if ( ( selectedDates.includes(formattedDate) && (!dataCenter.hasOwnProperty(formattedDate) || dataCenter[formattedDate].length === 0 ) )
						        || (!selectedDates.includes(formattedDate) && totalElementSize() < 3) ){
						        
    						    for ( var i = 0; i < arrSelectedTimeSlots.length; i++){
        							$('#available-times .form-check').find('[value="' + arrSelectedTimeSlots[i] + '"]').prop('checked', true);
        						}    
                            }
						}
						
						if (( !dataCenter[screenDate] || dataCenter[screenDate].length < 1 ) && screenDate !== formattedDate ) {
                            var index = selectedDates.indexOf(screenDate);
                            if ( index >= 0 ) selectedDates.splice(index, 1);
                            let arrDates = Object.keys(dataCenter), arrRealDates = [];
                            for(let ii = 0; ii < arrDates.length; ii++) {
                                if (dataCenter[arrDates[ii]] && dataCenter[arrDates[ii]].length > 0) continue;
                                arrDates.splice(ii, 1);
                                ii--;
                            }
                            if (!arrDates.includes(formattedDate)) arrDates.push(formattedDate);
                            $("#calendar_div").datepicker('clearDates');
                            for (let jj = 0; jj < arrDates.length; jj++){
                                arrRealDates.push(new Date(arrDates[jj]));
                            }
                            console.log(arrRealDates, '-=--=', selectedDates);
                            $("#calendar_div").datepicker('setDates', arrRealDates);
                        }
						
						if (screenDate !== formattedDate && dataCenter[formattedDate] && dataCenter[formattedDate].length > 0){
						    var lastindex = selectedDates.indexOf(formattedDate);
						    selectedDates.splice(lastindex, 1);
						    selectedDates.push(formattedDate)
                            screenDate = formattedDate;
                            getAndUpdateAvailableTimeView();
                            return false;
                        }
                        
						var returnFalse = false;
                        
                        
                        screenDate = formattedDate;
                        getAndUpdateAvailableTimeView();
                        screenDate = formattedDate;
                        lastSelectionDate = this.getAttribute('data-date');
                        if(selectedDates.includes(formattedDate)) {
                            var index = selectedDates.indexOf(formattedDate);
                            selectedDates.splice(index, 1)
                            getAndUpdateAvailableTimeView();
                            if(!dataCenter.hasOwnProperty(formattedDate) || dataCenter[formattedDate].length === 0 ) {
                                return true;
                            } else {
                                delete dataCenter[formattedDate];
                                // screenDate = formattedDate;
                                // getAndUpdateAvailableTimeView();
                                if (returnFalse) return false
                                return true;
                            }
                        } else {
                            if(totalElementSize() < 3) {
                            	// MODIFIED - 2019-02-07
                            	if (!disabledEle) selectedDates.push(formattedDate);
                                console.log('is there??????????', selectedDates)
                                getAndUpdateAvailableTimeView();
                                return true;
                            } else {
                                delete dataCenter[formattedDate];
                                var index = selectedDates.indexOf(formattedDate);
                                selectedDates.splice(index, 1)
                                // selectedDates[formattedDate] = [];
                                alert("You cannot select more than 3 timeslots.");
                                return false;
                            }
                            // return true;
                        }
                        
                        // return true;
                    });
				}

				return false;

			} else {
				return true;
			}
		});

		$(document).on('click', '#miyn-client-widget .staff-list li a', function () {
			var dataId = $(this).attr('data-id');
			var dataTitle = $(this).attr('data-title');
			var serText = $('#miyn-client-widget .staff-box .service-text').text();
			var avatar = $('#userAvatar').val();
			$('#calender_section_bot ul li').removeClass('selected');
            infoCenter['staff_slug'] = dataId;
			$('#miyn-client-widget .selected-service').text(serText);
			// 	$('#miyn-client-widget .selected-service').append(' <i>with</i> <img src="https://c15117557.ssl.cf2.rackcdn.com/avatar/image/418771/thumb_6gfcod4yoblt1lbd3fxo59jhrt1ylet9.png"> <i><b>'+dataTitle+'</b></i>');
			$('#miyn-client-widget .selected-service').append(' <i>with</i> <img src="' + avatar + '"> <i><b>' + dataTitle + '</b></i>');
			console.log(infoCenter);
			$('#miyn-client-widget .popup-box').removeClass('is-open');
			$('#miyn-client-widget .calendar-box').addClass('is-open');
			console.log('Calendar Page is being shown now.')
			dataCenter = {};
            selectedDates = [];
            selectedTimes = [];
            lastSelectionDate = null;
            screenDate = undefined;
			return false;
		});

		$(document).on('click', '#miyn-client-widget #calender_section_bot ul li', function () {
			var selDate = $(this).attr('date');
			var newDate = moment(selDate, 'YYYY-MM-DD').format('dddd, MMM DD, YYYY');
			$('#miyn-client-widget #calender_section_bot ul li').removeClass('selected');
			if (selDate !== '') {
				if ($(this).hasClass('date_cell')) {
					$('#miyn-client-widget .time-schedule-box .cal-nav').text('Availability for ' + newDate);
					$(this).addClass('selected');
				}
			}
			return false;
		});
		
		$(document).on('click', '#console-data' ,function() {
		    infoCenter['subject'] = $('#subject').val();
		    infoCenter['message'] = $('#message').val();
		    infoCenter['first_name'] = $('#fname').val();
		    infoCenter['last_name'] = $('#lname').val();
		    infoCenter['email'] = $('#email').val();
		    var newObj = Object.assign(dataCenter, infoCenter);
		    console.log(newObj);
		});

	   

		$(document).on('click', "#book-service", function(e) {
			
			e.preventDefault();

			infoCenter['subject'] = $('#subject').val();
		    infoCenter['message'] = $('#message').val();
		    infoCenter['first_name'] = $('#fname').val();
		    infoCenter['last_name'] = $('#lname').val();
		    infoCenter['email'] = $('#email').val();
		    var newObj = Object.assign(dataCenter, infoCenter);
		    console.log(newObj);

		    var subject = infoCenter['subject'];
		    var message = infoCenter['message'];
		    var fname = infoCenter['first_name'];
		    var lname = infoCenter['last_name'];
		    var email = infoCenter['email'];

		    console.log(subject);
		    console.log(message);
		    console.log(fname);
		    console.log(lname);
		    console.log(email);

		    if (!subject || !message || !fname || !lname || !email) {
            	var servicesHtml = '';
            	servicesHtml += '<h3 style="color:red;text-align:center;padding-top:50px;padding-bottom:50px;">Error: All field are required !!!</h3>';
            	servicesHtml += '<p style="color:#000;text-align:center;">Please fill all the field</p>';
            	servicesHtml += '<a style="margin-left:30px;margin-right:20px" class="btn btn-primary" data-box="send-information" href="#send-information">Back</a>';
            	
            	$('#miyn-client-widget > div.send-information23.popup-box.is-open > div > div.appointment-items23.services23').html(servicesHtml);

            }
            else{
            	$.ajax({
			        method: 'post',
			        url: 'http://127.0.0.1:8000/api/save-booking-info?key=' + key,
			        data: newObj
			    }).done(function(data) {
			        console.log(data);
			        console.log(data.status);
			        console.log(data.status);
			        console.log(data.booking.staff_phone);
			        console.log(data.booking.service_id);
			        console.log(data.booking.staff_name);
			        //console.log(data.booking.requested_date["05/09/2019"][0]);
			     
			        for (var k in data.booking.requested_date) {
			            var value = data.booking.requested_date[k];
			            console.log(data.booking.requested_date[k]);
			            console.log(data.booking.requested_date[k][0]);
			            console.log(k, value);
			            console.log(k);

			           console.log(new Date(k).toDateString());

			        }


			        var servicesHtml = '';	

			        servicesHtml += '<div class="appointment-box-heading">';		        
			        servicesHtml += '<h3>Your booking request was sent</h3>';		        
			        servicesHtml += '<p>You will receive an email once if ' + data.booking.staff_name + ' confirms your booking</p>';		        
			        servicesHtml += '</div>';		        
			        
	                servicesHtml += '<div style="margin-left:30px;margin-right:20px">';       
	                servicesHtml += '<div>';    
	                servicesHtml += "<h6>Thank\'s for your booking, Looking forward to meeting you!</h6>";
	                servicesHtml += '<br>';
					servicesHtml += '<h6>Service Name: ' + data.booking.service_name + '</h6>';
					servicesHtml += '<h6>Your Meeting with: ' + data.booking.staff_name + '</h6>';
					servicesHtml += '</div>';

					for (var k2 in data.booking.requested_date) {
						//servicesHtml += '<h6>Date : ' + new Date(k).toDateString() + ' at ' + data.booking.requested_date[k2][0] + ', ' + data.booking.requested_date[k2][1] + ', and ' + data.booking.requested_date[k2][2] +  '</h6>';
						
						if(data.booking.requested_date[k2][0] && data.booking.requested_date[k2][1] && data.booking.requested_date[k2][2]){
							servicesHtml += '<h6>Date : ' + new Date(k).toDateString() + ' at ' + data.booking.requested_date[k2][0] + ', ' + data.booking.requested_date[k2][1] + ', and ' + data.booking.requested_date[k2][2] +  '</h6>';
						}
						else if(data.booking.requested_date[k2][0] && data.booking.requested_date[k2][1]){
							servicesHtml += '<h6>Date : ' + new Date(k).toDateString() + ' at ' + data.booking.requested_date[k2][0] + ', ' + data.booking.requested_date[k2][1] +  '</h6>';
						}
						else{
							servicesHtml += '<h6>Date : ' + new Date(k).toDateString().split(' ').slice(1).join(' ') + ' at ' + data.booking.requested_date[k2][0]  + '</h6>';
						}

					}

					servicesHtml += '<h6>Phone: ' + data.booking.staff_phone + '</h6>';

					servicesHtml += '<br>';
					servicesHtml += '<h3>Manage Booking</h3>';
					servicesHtml += "<p>Need to reschedule or cancel your booking? Click 'Manage Booking'.To check additional services, Click book another.You can also view and change your booking from the confirmation email in your inbox</p><br><br>";
					servicesHtml += '<div class="information-fields">';
					servicesHtml += '<a style="background-color:green" class="btn btn-primary" data-box="send-information" href="#appointment-box">Book Another</a>';
					servicesHtml += '<a style="margin-left:5px;" class="btn btn-info" target="_blank" onclick="window.location.href = \'http://127.0.0.1:8000/login\';">Manage Booking</a>';
					servicesHtml += '<p style="text-align:center;margin:60px 0px 20px 0px;">Online Scheduling by <a style="cursor:pointor;color:blue;" onclick="window.location.href = \'http://127.0.0.1:8000/\';">Miyn</a></p>';
					servicesHtml += '</div>';
					servicesHtml += '</div>';

					
					$('#miyn-client-widget > div.send-information23.popup-box.is-open > div > div.appointment-items23.services23').html(servicesHtml);
	

			    }).fail(function(error) {
			        console.log(error);
			    });
            }

            /*if (subject && message && fname && lname && email) {


			    $.ajax({
			        method: 'post',
			        url: 'http://127.0.0.1:8000/api/save-booking-info?key=' + key,
			        data: newObj
			    }).done(function(data) {
			        console.log(data);
			        console.log(data.status);
			        console.log(data.status);
			        console.log(data.booking.staff_phone);
			        console.log(data.booking.service_id);
			        console.log(data.booking.staff_name);
			        //console.log(data.booking.requested_date["05/09/2019"][0]);
			     
			        for (var k in data.booking.requested_date) {
			            var value = data.booking.requested_date[k];
			            console.log(data.booking.requested_date[k]);
			            console.log(data.booking.requested_date[k][0]);
			            console.log(k, value);
			            console.log(k);

			           console.log(new Date(k).toDateString());

			        }


			        var servicesHtml = '';	

			        servicesHtml += '<div class="appointment-box-heading">';		        
			        servicesHtml += '<h3>Your booking request was sent</h3>';		        
			        servicesHtml += '<p>You will receive an email once if ' + data.booking.staff_name + ' confirms your booking</p>';		        
			        servicesHtml += '</div>';		        
			        
	                servicesHtml += '<div style="margin-left:30px;margin-right:20px">';       
	                servicesHtml += '<div>';    
	                servicesHtml += "<h6>Thank\'s for your booking, Looking forward to meeting you!</h6>";
	                servicesHtml += '<br>';
					servicesHtml += '<h6>Service Name: ' + data.booking.service_name + '</h6>';
					servicesHtml += '<h6>Your Meeting with: ' + data.booking.staff_name + '</h6>';
					servicesHtml += '</div>';

					for (var k2 in data.booking.requested_date) {
						//servicesHtml += '<h6>Date : ' + new Date(k).toDateString() + ' at ' + data.booking.requested_date[k2][0] + ', ' + data.booking.requested_date[k2][1] + ', and ' + data.booking.requested_date[k2][2] +  '</h6>';
						
						if(data.booking.requested_date[k2][0] && data.booking.requested_date[k2][1] && data.booking.requested_date[k2][2]){
							servicesHtml += '<h6>Date : ' + new Date(k).toDateString() + ' at ' + data.booking.requested_date[k2][0] + ', ' + data.booking.requested_date[k2][1] + ', and ' + data.booking.requested_date[k2][2] +  '</h6>';
						}
						else if(data.booking.requested_date[k2][0] && data.booking.requested_date[k2][1]){
							servicesHtml += '<h6>Date : ' + new Date(k).toDateString() + ' at ' + data.booking.requested_date[k2][0] + ', ' + data.booking.requested_date[k2][1] +  '</h6>';
						}
						else{
							servicesHtml += '<h6>Date : ' + new Date(k).toDateString().split(' ').slice(1).join(' ') + ' at ' + data.booking.requested_date[k2][0]  + '</h6>';
						}

					}

					servicesHtml += '<h6>Phone: ' + data.booking.staff_phone + '</h6>';

					servicesHtml += '<br>';
					servicesHtml += '<h3>Manage Booking</h3>';
					servicesHtml += "<p>Need to reschedule or cancel your booking? Click 'Manage Booking'.To check additional services, Click book another.You can also view and change your booking from the confirmation email in your inbox</p><br><br>";
					servicesHtml += '<div class="information-fields">';
					servicesHtml += '<a style="background-color:green" class="btn btn-primary" data-box="send-information" href="#appointment-box">Book Another</a>';
					servicesHtml += '<a style="margin-left:5px;" class="btn btn-info" target="_blank" onclick="window.location.href = \'http://127.0.0.1:8000/login\';">Manage Booking</a>';
					servicesHtml += '<p style="text-align:center;margin:60px 0px 20px 0px;">Online Scheduling by <a style="cursor:pointor;color:blue;" onclick="window.location.href = \'http://127.0.0.1:8000/\';">Miyn</a></p>';
					servicesHtml += '</div>';
					servicesHtml += '</div>';

					
					$('#miyn-client-widget > div.send-information2.popup-box.is-open > div > div.appointment-items2.services2').html(servicesHtml);
						

			    }).fail(function(error) {
			        console.log(error);
			    });
			
		     }else{
		     	var servicesHtml = '';
            	servicesHtml += '<h3 style="color:red;text-align:center;padding-top:50px;padding-bottom:50px;">Error: All field are required !!!</h3>';
            	servicesHtml += '<a style=";text-align:center;" class="continue-button" data-box="send-information" href="#send-information">Back</a>';            	
            	$('#miyn-client-widget > div.send-information23.popup-box.is-open > div > div.appointment-items23.services23').html(servicesHtml);

		     }*/
		});

	});

}(jQuery));