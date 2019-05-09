@extends('layouts.user.dashboard')
@section('content')
<v-layout row wrap>
    <v-flex md6>
        <v-textarea label="Copy this code on your website"></v-textarea>
        <template>
            <v-expansion-panel>
                <v-expansion-panel-content value="true">
                    <div slot="header">
                        <span class="subheading">Portal Actions</span>
                    </div>
                    <v-card>
                        <v-card-text>
                            <v-radio-group v-model="action_type" row>
                                <v-radio value="floating" label="Floating Actions"></v-radio>
                                <v-radio value="inline" label="Inline Actions"></v-radio>
                            </v-radio-group>
                            <v-divider></v-divider>
                            <span class="subheading" style="line-height: 4em;">Set Text For Actions</span>
                            <v-text-field label="Schedule" append-icon="event" v-model="schedule"></v-text-field>
                        
                            <v-text-field label="Leave Details" append-icon="email" v-model="details"></v-text-field>
                        
                            <v-text-field label="Content" append-icon="book" v-model="content"></v-text-field>
                        
                            <v-text-field label="Youtube" append-icon="play_circle_outline" v-model="youtube"></v-text-field>
                        
                            <v-text-field label="Call" append-icon="phone" v-model="call_us"></v-text-field>
                        
                            <v-text-field label="Make Payment" append-icon="credit_card" v-model="make_payment"></v-text-field>
                        
                            <v-text-field label="Map" append-icon="location_on" v-model="map"></v-text-field>
                        </v-card-text>
                        <v-card-actions>
                            <v-btn color="cyan" dark @click="saveWebsiteWidgetProps">Save</v-btn>
                        </v-card-actions>
                    </v-card>
                    
                </v-expansion-panel-content>
                <v-expansion-panel-content>
                    <div slot="header">
                        <span class="subheading">Portal Invite</span>
                    </div>
                    <v-card>
                        <v-card-text>
                            <span style="line-height: 4em;"><a href="{{url('/profile/edit')}}">Edit Profile</a></span>
                            <v-text-field label="Label Text" append-icon="short_text" v-model="invitation_label"></v-text-field>
                            <v-text-field label="Title" append-icon="short_text" v-model="invitation_title"></v-text-field>
                            Text
                            <tiny-mce id="portal-text" :toolbar="'undo redo styleselect bold italic link image'" v-model="invitation_text"></tiny-mce>
                        </v-card-text>
                        <v-card-actions>
                            <v-btn color="cyan" dark @click="saveWebsiteWidgetProps">Save</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-expansion-panel-content>
                <v-expansion-panel-content>
                    <div slot="header">
                        <span class="subheading">Portal Settings</span>
                    </div>
                    <v-card>
                        <v-card-text>
                            <v-layout row wrap>
                                <v-flex> <span class="custom-label">Desktop View</span></v-flex>
                                <v-flex>
                                    <v-checkbox v-model="desktop_view" label="Show On Desktop"></v-checkbox>
                                    <v-checkbox v-model="auto_desktop_view" label="Automatically Show After"></v-checkbox>
                                    <ul style="margin: 0; padding: 0;">
                                        <li style="margin: 0; padding: 0; display: inline-block;"><v-text-field solo v-model="auto_desktop_view_after" style="width: 75px;"></v-text-field></li>
                                        <li style="margin: 0; padding: 0; display: inline-block;"> <span class="custom-label">seconds</span></li>
                                    </ul>
                                </v-flex>
                            </v-layout>
                            <v-layout row wrap>
                                <v-flex> <span class="custom-label">Mobile View</span></v-flex>
                                <v-flex>
                                    <v-checkbox v-model="mobile_view" label="Show On Mobile"></v-checkbox>
                                    <v-checkbox v-model="auto_mobile_view" label="Automatically Show After"></v-checkbox>
                                    <ul style="margin: 0; padding: 0;">
                                        <li style="margin: 0; padding: 0; display: inline-block;"><v-text-field solo v-model="auto_mobile_view_after" style="width: 75px;"></v-text-field></li>
                                        <li style="margin: 0; padding: 0; display: inline-block;"> <span class="custom-label">seconds</span></li>
                                    </ul>
                                </v-flex>
                            </v-layout>
                        </v-card-text>
                        <v-card-actions>
                            <v-btn color="cyan" dark @click="saveWebsiteWidgetProps">Save</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-expansion-panel-content>
            </v-expansion-panel>
        </template>
    </v-flex>
    <v-flex md6>

    </v-flex>
</v-layout>

@endsection

@section('scripts')
<script>
var app = new Vue({
    el: "#app",
    data: () => ({
        drawer: null,
        user: null,
        action_type: "floating",
        schedule: "Schedule a Free Intro Meeting",
        details: "Drop us a line",
        content: "Customer Testimonials",
        youtube: "How to build a successful brand",
        call_us: "Call us",
        make_payment: "Make a payment",
        map: "Get direction",
        invitation_label: "Contact Us",
        invitation_title: "Schedule a Free Intro Meeting",
        invitation_text: "",
        desktop_view: true,
        auto_desktop_view: true,
        auto_desktop_view_after: "10",
        mobile_view: true,
        auto_mobile_view: true,
        auto_mobile_view_after: "10",
        
        // embadedJs2: "var getCalendar,updateAvailableTime,getAndUpdateAvailableTimeView,updateCalendarSettings,business_hour_end,business_hour_start,increment_hour,increment_minute,week_start,screenDate,key="1234567",nowDate=new Date,today=new Date(nowDate.getFullYear(),nowDate.getMonth(),nowDate.getDate(),0,0,0,0),weekly_off=[],availableTimes=[],dataCenter={category_id:null,business_id:null,service_id:null,staff_name:"",subject:"",message:"",first_name:"",last_name:"",email:""},selectedDates=[],selectedTimes=[];!function(e){"use strict";getCalendar=function(t,a,i){e.ajax({type:"get",url:"/api/get-calendar?key="+key,data:"year="+a+"&month="+i,success:function(a){e("#"+t).html(a)}})},getAndUpdateAvailableTimeView=function(){var t,a="";t=selectedDates.length>0&&selectedDates[selectedDates.length-1].length>0?"Availability for "+moment(selectedDates[selectedDates.length-1]).format("dddd, MMM DD, YYYY"):"No date has been selected";for(var i=0;i<availableTimes.length;i++)a+='<div class="form-check">',dataCenter.hasOwnProperty(screenDate)&&dataCenter[screenDate].includes(availableTimes[i])?a+='<input class="form-check-input" type="checkbox" value="'+availableTimes[i]+'" name="select-time[]" checked>':a+='<input class="form-check-input" type="checkbox" value="'+availableTimes[i]+'" name="select-time[]">',a+='<label class="form-check-label" for="select-time">',a+=availableTimes[i],a+="</label>",a+="</div>";e("#available-times").html(a),e("#screen-date").html(t),screenDate=selectedDates[selectedDates.length-1],console.log("++++++++++++++++++++++++++++++++++++++++++++++++++"),console.log("Data: ",dataCenter),console.log("Selected Times: ",selectedTimes),console.log("selected Dates: ",selectedDates),console.log("Screen Date: ",screenDate)},updateAvailableTime=function(e,t,a,i){console.log("inside updateAvailableTime() ");for(var s=e,n=moment(s,"hh:mm A").format("HH:mm:ss").split(":"),l=parseInt(n.slice(0,n.length-1).join("")),c=moment(t,"hh::mm A").format("HH:mm:ss").split(":"),r=parseInt(c.slice(0,c.length-1).join(""));l<r;)s=moment(s,"hh:mm A").add(a,"hours").add(i,"minutes").format("hh:mm A"),n=moment(s,"hh:mm A").format("HH:mm:ss").split(":"),l=parseInt(n.slice(0,n.length-1).join("")),availableTimes.push(s);var d=moment(availableTimes[availableTimes.length-1],"hh:mm A").format("HH:mm:ss").split(":");parseInt(d.slice(0,d.length-1).join(""))>r&&(availableTimes=availableTimes.slice(0,availableTimes.length-1)),getAndUpdateAvailableTimeView()},updateCalendarSettings=function(){e.ajax({type:"get",url:"/api/get-calendar-settings?key="+key}).done(function(e){business_hour_end=e.business_hour_end,business_hour_start=e.business_hour_start,increment_hour=e.increment_hour,increment_minute=e.increment_minute,week_start=e.week_start,weekly_off=e.weekly_off,updateAvailableTime(business_hour_start,business_hour_end,increment_hour,increment_minute),console.log("ajax called")}).fail(function(e){console.log(e)})},e(document).ready(function(e){updateCalendarSettings(),e(document).on("click","#miyn-client-widget #calendar_div .datepicker .datepicker-days table td.day",function(){console.log("*********************",e(this).val(),"*********************")}),e("div #miyn-client-widget #calendar_div .datepicker .datepicker-days table td.day").click(function(){console.log("*********************",e(this).val(),"*********************")}),selectedDates.push(moment(new Date).format("MM/DD/YYYY")),e("#selected-date-array").on("change",function(){var t=e(".dateArray").val();if(selectedDates=t.split(","),getAndUpdateAvailableTimeView(),console.log(screenDate),dataCenter.hasOwnProperty(screenDate)&&0!==dataCenter[screenDate].length){for(var a=[],i=0;i<screenDate.length;i++){var s=screenDate.split("/"),n=parseInt(s[1]);a.push(n),console.log(s,n)}var l=weekly_off.concat(a);console.log(a),e("#calendar_div").datepicker({multidate:!0,useCurrent:!0,startDate:today,daysOfWeekDisabled:l}),e("#calendar_div").datepicker("update",new Date),e(".dateArray").datepicker({multidate:!0,useCurrent:!0,startDate:today,format:"dd/mm/yyyy",daysOfWeekDisabled:l})}}),e(document).on("change",'#miyn-client-widget input[name="select-time[]"]',function(){if(e('#miyn-client-widget input[name="select-time[]"]:checked').length>3)this.checked=!1,alert("You cannot select more than 3 timeslots.");else if(selectedTimes.includes(e(this).val())){var t=selectedTimes.indexOf(e(this).val());t>-1&&selectedTimes.splice(t,1)}else selectedTimes.push(e(this).val());if(dataCenter.hasOwnProperty(screenDate)){if(dataCenter[screenDate].includes(e(this).val())){var a=dataCenter[screenDate].indexOf(e(this).val());a>-1&&dataCenter[screenDate].splice(a,1)}else dataCenter[screenDate].push(e(this).val());dataCenter[screenDate].length>3&&dataCenter[screenDate].pop(3)}else dataCenter[screenDate]=[e(this).val()],dataCenter[screenDate].length>3&&dataCenter[screenDate].pop(3);getAndUpdateAvailableTimeView()}),e(document).on("click","#miyn-client-widget .appointment-item>a",function(){console.log(e("#selected_service").val(e(this).data("id")))}),e(document).on("click","#miyn-client-widget a",function(t){t.preventDefault();var a=e(this).attr("href");if(a.startsWith("#")){var i=e(this).attr("data-pre"),s=a.replace("#","");if("close"==s)e("#miyn-client-widget .popup-box, .button-content").removeClass("is-open");else if(e(this).hasClass("back-button")){var n=e("#miyn-client-widget ."+s+" .service-text").text();e("#miyn-client-widget ."+s+" .selected-service").text(n),e("#miyn-client-widget .popup-box").removeClass("is-open"),e("#miyn-client-widget .popup-box."+s).addClass("is-open")}else{e(this).attr("data-id");var l=e(this).attr("data-title");""!==l&&(e("#miyn-client-widget ."+s+" .back-button").attr("href","#"+i),e("#miyn-client-widget .selected-service").text(l),e("#miyn-client-widget ."+s+" .service-text").text(l)),e("#miyn-client-widget .popup-box, .button-content").removeClass("is-open"),e("#miyn-client-widget ."+s).addClass("is-open")}return"#appointment-box"===a&&e.ajax({url:"/api/categories?key="+key,method:"get"}).done(function(t){console.log(t);for(var a="",i=0;i<t.categories.length;i++){a+="<h6>"+t.categories[i].name+"</h6>",a+="<ul>";for(var s=0;s<t.categories[i].services.length;s++)a+='<li class="appointment-item">',a+='<input type="hidden" class="category-id" value="'+t.categories[i].id+'">',a+='<input type="hidden" class="bussiness-id" value="'+t.categories[i].business_id+'">',a+='    <a data-pre="appointment-box" data-id="'+t.categories[i].services[s].slug+'" data-title="'+t.categories[i].services[s].name+'" href="#staff-box">',a+='        <div class="icon"><i class="far fa-user"></i></div>',a+='        <div class="list-title">',a+='<input type="hidden" class="service-id" value="'+t.categories[i].services[s].id+'">',a+="            <p><strong>"+t.categories[i].services[s].name+"</strong>"+t.categories[i].services[s].description+"</p>",a+="        </div>",a+='        <div class="list-time">',a+='            <i class="far fa-clock"></i>',a+='            <span class="ng-binding">'+(parseInt(t.categories[i].services[s].duration_hours)?t.categories[i].services[s].duration_hours+"hours, ":"")+(parseInt(t.categories[i].services[s].duration_minutes)?t.categories[i].services[s].duration_minutes+"minutes":"")+"</span>",a+="        </div>",a+="    </a>",a+="</li>";a+="</ul>",e("#miyn-client-widget > div.appointment-box.popup-box.is-open > div > div.appointment-items.services").html(a)}}).fail(function(e){}),"#staff-box"===a&&e.ajax({url:"/api/staffs?key="+key,method:"get"}).done(function(t){console.log(t);for(var a="",i=0;i<t.staffs.length;i++)a+="<li>",a+='<a data-pre="staff-box" data-id="'+t.staffs[i].slug+'" data-title="'+t.staffs[i].display_name+'" href="#calendar-box">',a+='    <div class="icon profile-pic"><img src="'+t.staffs[i].avatar+'" alt="'+t.staffs[i].display_name+'"></div>',a+='    <div class="list-title">',a+="        <p><strong>"+t.staffs[i].display_name+"</strong> "+t.staffs[i].professional_title+"</p>",a+="    </div>",a+="</a>",a+="</li>";e("#miyn-client-widget .staff-list").html(a)}).fail(function(e){console.log(e)}),"#calendar-box"===a&&(e("#calendar_div").datepicker({multidate:!0,useCurrent:!0,startDate:today,daysOfWeekDisabled:weekly_off}),e("#calendar_div").datepicker("update",new Date),e(".dateArray").datepicker({multidate:!0,useCurrent:!0,startDate:today,format:"dd/mm/yyyy",daysOfWeekDisabled:weekly_off}),e(".dateArray").datepicker("update",new Date)),!1}return!0}),e(document).on("click","#miyn-client-widget .staff-list li a",function(){e(this).attr("data-id");var t=e(this).attr("data-title"),a=e("#miyn-client-widget .staff-box .service-text").text(),i=e("#userAvatar").val();return e("#calender_section_bot ul li").removeClass("selected"),e("#miyn-client-widget .selected-service").text(a),e("#miyn-client-widget .selected-service").append(' <i>with</i> <img src="'+i+'"> <i><b>'+t+"</b></i>"),console.log(t),e("#miyn-client-widget .popup-box").removeClass("is-open"),e("#miyn-client-widget .calendar-box").addClass("is-open"),!1}),e(document).on("click","#miyn-client-widget #calender_section_bot ul li",function(){var t=e(this).attr("date"),a=moment(t,"YYYY-MM-DD").format("dddd, MMM DD, YYYY");return e("#miyn-client-widget #calender_section_bot ul li").removeClass("selected"),""!==t&&e(this).hasClass("date_cell")&&(e("#miyn-client-widget .time-schedule-box .cal-nav").text("Availability for "+a),e(this).addClass("selected")),!1})})}(jQuery);"

    }),
    methods:{
        logout: function(){
            axios({
                method: "post",
                url: "/logout"
            }).then(function(response){
                if(response.data.logged_out){
                    window.location = response.data.redirect_url
                }
            }).catch(function(){

            }).then(function(){

            });
        },
        getUser: function(){
            let that = this;
            axios({
                method: "get",
                url: "/api/user"
            }).then(function(response){
                that.user = response.data;
            });
        },
        
        makeEmbadedCode: function() {
            let secret_key = '';
            axios({
                method: "get",
                url: "/get-secret-key",
            }).then(function(response) {
                console.log("SECRET KEY", response.data);
            }).catch(function(error) {
                console.log(error);
            });
        },
        setWebsiteWidgetProps: function(){
            let that = this;
            axios({
                method: "get",
                url: '/api/website-widget/get-properties'
            }).then(function(response){
                console.log(response.data);
                /*
                that.action_type             = response.data.action_type ? response.data.action_type : "floating";
                that.schedule                = response.data.schedule ? response.data.schedule : "Schedule a Free Intro Meeting";
                that.details                 = response.data.details ? response.data.details : "Drop us a line";
                that.content                 = response.data.content ? response.data.content : "Customer Testimonials";
                that.youtube                 = response.data.youtube ? response.data.youtube : "How to build a successful brand";
                that.call_us                 = response.data.call_us ? response.data.call_us : "Call us";
                that.make_payment            = response.data.make_payment ? response.data.make_payment : "Make a payment";
                that.map                     = response.data.map ? response.data.map : "Get direction";
                that.invitation_label        = response.data.invitation_label ? response.data.invitation_label : "Contact Us";
                that.invitation_title        = response.data.invitation_title ? response.data.invitation_title : "Schedule a Free Intro Meeting";
                that.invitation_text         = response.data.invitation_text ? response.data.invitation_text : "";
                that.desktop_view            = response.data.desktop_view ? response.data.desktop_view : true;
                that.auto_desktop_view       = response.data.auto_desktop_view ? response.data.auto_desktop_view : true;
                that.auto_desktop_view_after = response.data.auto_desktop_view_after ? response.data.auto_desktop_view_after : 10;
                that.mobile_view             = response.data.mobile_view ? response.data.mobile_view : true;  
                that.auto_mobile_view        = response.data.auto_mobile_view ? response.data.auto_mobile_view : true;
                that.auto_mobile_view_after  = response.data.auto_mobile_view_after ? response.data.auto_mobile_view_after : 10;
                */
                that.action_type             = response.data.websiteWidget.action_type;
                that.schedule                = response.data.websiteWidget.schedule;
                that.details                 = response.data.websiteWidget.details;
                that.content                 = response.data.websiteWidget.content;
                that.youtube                 = response.data.websiteWidget.youtube;
                that.call_us                 = response.data.websiteWidget.call_us;
                that.make_payment            = response.data.websiteWidget.make_payment;
                that.map                     = response.data.websiteWidget.map;
                that.invitation_label        = response.data.websiteWidget.invitation_label;
                that.invitation_title        = response.data.websiteWidget.invitation_title;
                that.invitation_text         = response.data.websiteWidget.invitation_text;
                that.desktop_view            = response.data.websiteWidget.desktop_view;
                that.auto_desktop_view       = response.data.websiteWidget.auto_desktop_view;
                that.auto_desktop_view_after = response.data.websiteWidget.auto_desktop_view_after;
                that.mobile_view             = response.data.websiteWidget.mobile_view;  
                that.auto_mobile_view        = response.data.websiteWidget.auto_mobile_view ;
                that.auto_mobile_view_after  = response.data.websiteWidget.auto_mobile_view_after;
                
            }).catch(function(errors){
                console.log(errors);
            });
        },
        saveWebsiteWidgetProps: function() {
            let that = this;
            let webWidgetData = new FormData;

            webWidgetData.append('action_type', this.action_type);
            webWidgetData.append('schedule', this.schedule);
            webWidgetData.append('details', this.details);
            webWidgetData.append('content', this.content);
            webWidgetData.append('youtube', this.youtube);
            webWidgetData.append('call_us', this.call_us);
            webWidgetData.append('make_payment', this.make_payment);
            webWidgetData.append('map', this.map);
            webWidgetData.append('invitation_label', this.invitation_label);
            webWidgetData.append('invitation_title', this.invitation_title);
            webWidgetData.append('invitation_text', this.invitation_text);
            webWidgetData.append('desktop_view', this.desktop_view);
            webWidgetData.append('auto_desktop_view', this.auto_desktop_view);
            webWidgetData.append('auto_desktop_view_after', this.auto_desktop_view_after);
            webWidgetData.append('mobile_view', this.mobile_view);
            webWidgetData.append('auto_mobile_view', this.auto_mobile_view);
            webWidgetData.append('auto_mobile_view_after', this.auto_mobile_view_after);

            axios({
                method: "post",
                url: '/api/website-widget/save',
                data: webWidgetData
            }).then(function(response){
                console.log(response);
                console.log(response.data);
                that.action_type             = response.data.websiteWidget.action_type;
                that.schedule                = response.data.websiteWidget.schedule;
                that.details                 = response.data.websiteWidget.details;
                that.content                 = response.data.websiteWidget.content;
                that.youtube                 = response.data.websiteWidget.youtube;
                that.call_us                 = response.data.websiteWidget.call_us;
                that.make_payment            = response.data.websiteWidget.make_payment;
                that.map                     = response.data.websiteWidget.map;
                that.invitation_label        = response.data.websiteWidget.invitation_label;
                that.invitation_title        = response.data.websiteWidget.invitation_title;
                that.invitation_text         = response.data.websiteWidget.invitation_text;
                that.desktop_view            = response.data.websiteWidget.desktop_view;
                that.auto_desktop_view       = response.data.websiteWidget.auto_desktop_view;
                that.auto_desktop_view_after = response.data.websiteWidget.auto_desktop_view_after;
                that.mobile_view             = response.data.websiteWidget.mobile_view;  
                that.auto_mobile_view        = response.data.websiteWidget.auto_mobile_view ;
                that.auto_mobile_view_after  = response.data.websiteWidget.auto_mobile_view_after;
            }).catch(function(errors){
                console.log(errors);
            });
        }
    },
    mounted: function () {
        let currentUrlHolder = document.querySelector('a[href="'+window.location.href+'"]');
        if(currentUrlHolder) currentUrlHolder.classList.add('cyan--text');
        document.getElementById('preloader').style.display = 'none';
        document.getElementById('app').style.display = 'block';
        this.getUser();
        this.setWebsiteWidgetProps();
        this.makeEmbadedCode();
    }
});
</script>
@endsection