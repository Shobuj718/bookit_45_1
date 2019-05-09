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


var screenDate;



(function ($) {
    
    
	"use strict";
	
	
	getCalendar = function (target_div, year, month) {
	    alert('calendar');
		$.ajax({
			type: 'get',
			url: 'https://app.miyn.net/api/get-calendar?key=' + key,
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
	getAndUpdateAvailableTimeView = function (clickedDate) {

		var availableTimesHTML = '';
		var dateToShow;
		if (selectedDates.length > 0 && selectedDates[selectedDates.length - 1].length > 0) {
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
		
	}

	updateAvailableTime = function (startTime, endTime, addHour, addMinute, clickedDate='') {
		
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



		getAndUpdateAvailableTimeView(clickedDate);

	}

	updateCalendarSettings = function () {
		$.ajax({
			type: 'get',
			url: 'https://app.miyn.net/api/get-calendar-settings?key=' + key
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


        // getAndUpdateAvailableTimeView();
		updateCalendarSettings();

		selectedDates.push(moment(new Date()).format("MM/DD/YYYY"));
		
		
		// ======================================================= On date Array Change =======================================================
		/*
		
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
		
		*/

		


        // ======================================================= Time event =======================================================

        /*
        
        $(document).on('change', '#miyn-client-widget input[name="select-time[]"]', function () {
            
            // console.log(screenDate, selectedDates, selectedTimes);
            
            
            
            if ($(this).prop("checked") === true) {

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
            		return true;
            
            	} else {
            	    
            		this.checked = false;
                    alert("You cannot select more than 3 timeslots.");
                    console.log("UnCheckedBox", totalElementSize(), dataCenter.hasOwnProperty(screenDate));
            		console.log(dataCenter);
            		return false;
            
            	}	
            
            } else {
            
            	dataCenter[screenDate].pop($(this).val());
            	totalElementSize();
            	console.log("CheckedBox", totalElementSize(), dataCenter.hasOwnProperty(screenDate));
        		console.log(dataCenter);
            	return true;
            
            }


			getAndUpdateAvailableTimeView();
			
			console.log(dataCenter);

		});
        
        
        */
		

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
						url: 'https://app.miyn.net/api/categories?key=' + key,
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
					}).fail(function (data) {

					});
					
					$(document).on('click', '#miyn-client-widget .appointment-item>a', function () {
                        var slug = $(this).attr('data-id');
                        infoCenter['service_slug'] = slug;
                        console.log(slug);
            		});
				}

				if (aLink === "#staff-box") {
					$.ajax({
						url: 'https://app.miyn.net/api/staffs?key=' + key,
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
                        
                        var epochTime = $(this).data('date');
                        var formattedDate = moment(epochTime).format('MM/DD/YYYY');
                        // console.log("clickddddddddddddd", formattedDate);
                        var selectID = $(this)[0];
                        getAndUpdateAvailableTimeView(formattedDate);
                        console.log(formattedDate);
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

		$(document).on('click', "#book-service", function() {

		    infoCenter['subject'] = $('#subject').val();
		    infoCenter['message'] = $('#message').val();
		    infoCenter['first_name'] = $('#fname').val();
		    infoCenter['last_name'] = $('#lname').val();
		    infoCenter['email'] = $('#email').val();
		    
		    var newObj = Object.assign(dataCenter, infoCenter);

		    $.ajax({
		        method: 'post',
		        url: 'https://app.miyn.net/api/save-booking-info?key=' + key,
		        data: newObj
		    }).done(function(data) {
		        console.log(data);
		    }).fail(function(error) {
		        console.log(error);
		    });
		});

	});

}(jQuery));
