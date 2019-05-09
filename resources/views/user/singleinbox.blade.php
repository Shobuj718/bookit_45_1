@extends('layouts.user.dashboard')
@section('content')
<v-layout row wrap>
    <v-flex md12 mb20>
        <v-card>
            <v-card-title class="padding26 page_title">
                <h4 class="title">Conversation</h4>
            </v-card-title>
        </v-card>
    </v-flex>
    <v-flex d-flex md9>
        <v-layout row wrap>
         <v-flex d-flex md12>   
            <template>
              <div class="chat-box">
                <v-container id="scroll-target" style="max-height: 388px" class="scroll-y">
                  <v-layout row wrap chat-box-title>
                    <v-flex d-flex md6>
                        <v-card-title class="small-headline">Introductory Phone Call</v-card-title>
                    </v-flex>    
                    <v-flex d-flex md6 align-right>
                        <template>
                          <v-layout row justify-end>
                            <v-dialog v-model="dialog" persistent max-width="672">
                              <v-btn slot="activator" flat><v-icon>trending_up</v-icon>Website</v-btn>
                              <v-card class="website-dialog">
                                <v-card-title class="headline">Source details</v-card-title>
                                <v-card-title class="small-title">Source</v-card-title>
                                <v-card-text>Website</v-card-text>
                                <v-card-title class="small-title">Channel</v-card-title>
                                <v-card-text>Client Portal Widget</v-card-text>
                                <v-card-title class="small-title">Referring URL</v-card-title>
                                <v-card-text><a href="#" target="_blank">http://staff.netmow.com</a></v-card-text>
                                <v-card-actions>
                                  <v-spacer></v-spacer>
                                  <v-btn color="primary darken-1" flat @click="dialog = false">DONE</v-btn>
                                </v-card-actions>
                              </v-card>
                            </v-dialog>
                          </v-layout>
                        </template>
                    </v-flex>  
                  </v-layout>
                <div class="chat-lists">  
                  <v-layout row wrap>
                    <v-flex d-flex md1 align-end> 
                        <v-list-tile-avatar>
                                        <img src="https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png">
                        </v-list-tile-avatar>
                    </v-flex> 
                    <v-flex d-flex md6>
                        <template>
                            <div  class="chat-card card-left">
                                <v-card-title class="appoin-title">New appointment request</v-card-title>
                                <v-card-text class="appoin-text">
                                    Hi,</br>
                                    Lets have some conversation.</br>
                                    Zim
                                </v-card-text>
                                <v-card-text class="appoin-date">
                                    <v-card-title class="appoin-date-title"><v-icon>date_range</v-icon>In-office appointment</v-card-title>
                                    <v-layout row wrap>
                                        <v-flex d-flex md2>
                                           <v-card-title class="radio-title">When</v-card-title> 
                                        </v-flex> 
                                        <v-flex d-flex md10>
                                            <v-radio-group v-model="radios" :mandatory="false" class="appoinment-radio">
                                              <v-radio label="Thu, January 17, 11:00am – 12:00pm" value="radio-1"></v-radio>
                                              <v-radio label="Thu, January 17, 12:00pm – 1:00pm" value="radio-2"></v-radio>
                                              <v-radio label="Wed, January 30, 4:00pm – 5:00pm" value="radio-3"></v-radio>
                                            </v-radio-group> 
                                        </v-flex> 
                                    </v-layout>
                                    <v-layout row wrap location-area>
                                        <v-flex d-flex md2>
                                           <v-card-title class="radio-title">Where</v-card-title> 
                                        </v-flex> 
                                        <v-flex d-flex md10>
                                            <a herf="#">Khulna, Bangladesh</a> 
                                        </v-flex> 
                                    </v-layout>
                                    <v-layout row wrap accept-edit-area>
                                        <v-flex d-flex md8>
                                           <v-btn flat>ACCEPT</v-btn>
                                           <v-btn flat>EDIT</v-btn>
                                        </v-flex> 
                                        <v-flex md4 text-lg-right>
                                          <v-menu>
                                            <v-btn slot="activator" dark icon>
                                              <v-icon>more_vert</v-icon>
                                            </v-btn>
                                
                                            <v-list class="menu-links">
                                            <template>
                                            <form>
                                              <v-layout row justify-center>
                                                <v-dialog v-model="dialog2" persistent max-width="672" >
                                                  <div class="modal-btn" slot="activator">Decline</div>
                                                  <v-card class="website-dialog">
                                                    <v-card-title class="headline">Decline Appointment</v-card-title>
                                                    <v-card-text>
                                                        <v-textarea name="input-7-1" label="Message" value="" hint="Hint text"></v-textarea>
                                                    </v-card-text>
                                                    <v-card-actions>
                                                      <v-spacer></v-spacer>
                                                      <v-btn color="primary darken-1" flat @click="dialog2 = false">DONE</v-btn>
                                                      <v-btn color="primary darken-1" flat @click="dialog2 = false">Decline Appointment</v-btn>
                                                    </v-card-actions>
                                                  </v-card>
                                                </v-dialog>
                                              </v-layout>
                                              </form>
                                            </template>
                                            </v-list>
                                            <v-list class="menu-links">
                                            <template>
                                              <v-layout row justify-center>
                                                <v-dialog v-model="dialog3" persistent max-width="672">
                                                  <div class="modal-btn" slot="activator">Reschedule</div>
                                                  <v-card class="website-dialog">
                                                    <form>
                                                    <v-card-title class="headline">Propose a new time for the appointment</v-card-title>
                                                    <v-card-text>
                                                        <v-layout row>
                                                           <v-flex d-flex md6>
                                                                <v-menu ref="menu" :close-on-content-click="false" v-model="menu" :nudge-right="40" :return-value.sync="date" lazy transition="scale-transition" offset-y full-width min-width="290px">
                                                                    <v-text-field slot="activator" v-model="date" label="Start Date" prepend-icon="event" readonly></v-text-field>
                                                                    <v-date-picker v-model="date" no-title scrollable>
                                                                      <v-spacer></v-spacer>
                                                                      <v-btn flat color="primary" @click="menu = false">Cancel</v-btn>
                                                                      <v-btn flat color="primary" @click="$refs.menu.save(date)">OK</v-btn>
                                                                    </v-date-picker>
                                                                  </v-menu>
                                                            </v-flex>
                                                            <v-flex d-flex md6>
                                                              <v-menu ref="menu2" :close-on-content-click="false" v-model="menu2" :nudge-right="40" :return-value.sync="date" lazy transition="scale-transition" offset-y full-width min-width="290px">
                                                                <v-text-field slot="activator" v-model="date" label="End Date" prepend-icon="event" readonly></v-text-field>
                                                                <v-date-picker v-model="date" no-title scrollable>
                                                                  <v-spacer></v-spacer>
                                                                  <v-btn flat color="primary" @click="menu2 = false">Cancel</v-btn>
                                                                  <v-btn flat color="primary" @click="$refs.menu2.save(date)">OK</v-btn>
                                                                </v-date-picker>
                                                              </v-menu>
                                                            </v-flex>
                                                        </v-layout>
                                                        <v-layout row>
                                                           <v-flex d-flex md6>
                                                                <v-menu ref="time1" :close-on-content-click="false" v-model="time1" :nudge-right="40" :return-value.sync="time" lazy transition="scale-transition" offset-y full-width max-width="290px" min-width="290px">
                                                                    <v-text-field slot="activator" v-model="time" label="Start Time" prepend-icon="access_time" readonly></v-text-field>
                                                                    <v-time-picker v-if="time1" v-model="time" full-width @change="$refs.time1.save(time)"></v-time-picker>
                                                                </v-menu>
                                                            </v-flex>
                                                            <v-flex d-flex md6>
                                                                <v-menu ref="time2" :close-on-content-click="false" v-model="time2" :nudge-right="40" :return-value.sync="time_end" lazy transition="scale-transition" offset-y full-width max-width="290px" min-width="290px">
                                                                    <v-text-field slot="activator" v-model="time_end" label="End Time" prepend-icon="access_time" readonly></v-text-field>
                                                                    <v-time-picker v-if="time2" v-model="time_end" full-width @change="$refs.time2.save(time_end)"></v-time-picker>
                                                                </v-menu>
                                                            </v-flex>
                                                        </v-layout>
                                                        </v-card-text>
                                                        <v-card-text>
                                                            <v-textarea name="reschedule_text" label="Message" value="" hint="Hint text"></v-textarea>
                                                        </v-card-text>
                                                        <v-card-text class="confirmation-check">
                                                            <v-checkbox v-model="client_confirmation_checkbox" label="Request client confirmation"></v-checkbox>
                                                        </v-card-text>
                                                    <v-card-actions>
                                                      <v-spacer></v-spacer>
                                                      <v-btn color="primary darken-1" flat @click="dialog3 = false">DONE</v-btn>
                                                      <v-btn color="primary darken-1" flat @click="dialog3 = false">Submit</v-btn>
                                                    </v-card-actions>
                                                    </form>
                                                  </v-card>
                                                </v-dialog>
                                              </v-layout>
                                            </template>
                                            </v-list>
                                            <v-list class="menu-links">
                                            <template>
                                              <v-layout row justify-center>
                                                <v-dialog v-model="dialog4" persistent max-width="273">
                                                  <div class="modal-btn" slot="activator">Mark as completed</div>
                                                  <v-card class="website-dialog">
                                                    <v-card-title class="headline">Confirm</v-card-title>
                                                    <v-card-text>This will mark the appointment as completed and proceed to follow-up, do you want to continue?</v-card-text>
                                                    <v-card-actions>
                                                      <v-spacer></v-spacer>
                                                      <v-btn color="primary darken-1" flat @click="dialog4 = false">Cancel</v-btn>
                                                      <v-btn color="primary darken-1" flat @click="dialog4 = false">Ok</v-btn>
                                                    </v-card-actions>
                                                  </v-card>
                                                </v-dialog>
                                              </v-layout>
                                            </template>
                                            </v-list>
                                          </v-menu>
                                        </v-flex> 
                                    </v-layout>
                                </v-card-text>    
                            </div>
                        </template>
                    </v-flex> 
                  </v-layout>


                  <v-layout row wrap>
                    <v-flex d-flex md6 offset-md5 float-right>
                        <template>
                            <div  class="chat-card card-right">
                                <v-card-text class="appoin-text">
                                    Hello Zim How Are You?
                                </v-card-text>
                                <v-card-text class="msg-icons">
                                    <v-icon>markunread</v-icon>Sent
                                    <span><v-icon>done</v-icon>Delivered</span>
                                    <v-icon>phonelink_off</v-icon>Unread
                                    <span class="date">Jan 16, 12:45 pm</span>
                                </v-card-text>
                            </div>
                        </template>
                    </v-flex> 
                    <v-flex d-flex md1 align-end> 
                        <v-list-tile-avatar>
                            <img src="https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png">
                        </v-list-tile-avatar>
                    </v-flex> 
                  </v-layout>
                 </div>

                </v-container>
              </div>
            </template>

        </v-flex>   
            
        <v-flex d-flex md12>
            <template>
              <v-form>
                <v-container>
                  <v-layout row wrap >
                    <v-flex xs1>
                    <v-menu slot="append-outer" style="top: -12px" offset-y>
                      <v-btn slot="activator" class="icon-button">
                        <v-icon>add</v-icon>
                      </v-btn>
                      <v-card>
                        <v-list class="menu-links">
                            <template>
                              <v-layout row justify-center>
                                <v-dialog v-model="dialog5" persistent max-width="672">
                                  <div class="modal-btn" slot="activator"><v-icon>date_range</v-icon>Appointment</div>
                                      <v-card class="website-dialog">
                                        <form>
                                        <v-card-title class="headline">New Appointment<v-icon>date_range</v-icon></v-card-title>
                                        <v-layout row>
                                            <v-flex d-flex md1>
                                                <v-card-text>
                                                    <v-list-tile-avatar>
                                                        <img src="https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png">
                                                    </v-list-tile-avatar>
                                                </v-card-text>
                                            </v-flex>
                                            <v-flex md11 avatar-details>
                                                <v-card-title class="avater-title">Farhat Shahir</v-card-title>
                                                <v-card-title class="avater-email">cybertronix.4406@gmail.com</v-card-title>
                                                
                                            </v-flex>
                                        </v-layout>
                                        <v-card-text>
                                            <v-select :items="appointment_service" label="Please select a service"></v-select>
                                        </v-card-text>
                                        <v-card-text>
                                            <v-layout row>
                                               <v-flex d-flex md6>
                                                    <v-menu ref="astartdate" :close-on-content-click="false" v-model="astartdate" :nudge-right="40" :return-value.sync="date" lazy transition="scale-transition" offset-y full-width min-width="290px">
                                                        <v-text-field slot="activator" v-model="date" label="Start Date" prepend-icon="event" readonly></v-text-field>
                                                        <v-date-picker v-model="date" no-title scrollable>
                                                          <v-spacer></v-spacer>
                                                          <v-btn flat color="primary" @click="astartdate = false">Cancel</v-btn>
                                                          <v-btn flat color="primary" @click="$refs.astartdate.save(date)">OK</v-btn>
                                                        </v-date-picker>
                                                      </v-menu>
                                                </v-flex>
                                                <v-flex d-flex md6>
                                                  <v-menu ref="aenddate" :close-on-content-click="false" v-model="aenddate" :nudge-right="40" :return-value.sync="date" lazy transition="scale-transition" offset-y full-width min-width="290px">
                                                    <v-text-field slot="activator" v-model="date" label="End Date" prepend-icon="event" readonly></v-text-field>
                                                    <v-date-picker v-model="date" no-title scrollable>
                                                      <v-spacer></v-spacer>
                                                      <v-btn flat color="primary" @click="aenddate = false">Cancel</v-btn>
                                                      <v-btn flat color="primary" @click="$refs.aenddate.save(date)">OK</v-btn>
                                                    </v-date-picker>
                                                  </v-menu>
                                                </v-flex>
                                            </v-layout>
                                            <v-layout row>
                                               <v-flex d-flex md6>
                                                    <v-menu ref="astarttime1" :close-on-content-click="false" v-model="astarttime1" :nudge-right="40" :return-value.sync="app_time" lazy transition="scale-transition" offset-y full-width max-width="290px" min-width="290px">
                                                        <v-text-field slot="activator" v-model="app_time" label="Start Time" prepend-icon="access_time" readonly></v-text-field>
                                                        <v-time-picker v-if="astarttime1" v-model="app_time" full-width @change="$refs.astarttime1.save(app_time)"></v-time-picker>
                                                    </v-menu>
                                                </v-flex>
                                                <v-flex d-flex md6>
                                                    <v-menu ref="aendtime2" :close-on-content-click="false" v-model="aendtime2" :nudge-right="40" :return-value.sync="ap_time_end" lazy transition="scale-transition" offset-y full-width max-width="290px" min-width="290px">
                                                        <v-text-field slot="activator" v-model="ap_time_end" label="End Time" prepend-icon="access_time" readonly></v-text-field>
                                                        <v-time-picker v-if="aendtime2" v-model="ap_time_end" full-width @change="$refs.aendtime2.save(ap_time_end)"></v-time-picker>
                                                    </v-menu>
                                                </v-flex>
                                            </v-layout>
                                            </v-card-text>
                                            <v-card-text class="new_appointment_fields">
                                                <v-checkbox v-model="appoinments_repeats" label="Repeats..."></v-checkbox>
                                                <v-text-field label="Message"></v-text-field>
                                                <v-checkbox v-model="client_confirmation_checkbox" label="Request client confirmation"></v-checkbox>
                                            </v-card-text>
                                        <v-card-actions>
                                          <v-spacer></v-spacer>
                                          <v-btn color="primary darken-1" flat @click="dialog5 = false">Cancel</v-btn>
                                          <v-btn color="primary darken-1" flat @click="dialog5 = false">Send</v-btn>
                                        </v-card-actions>
                                        </form>
                                      </v-card>
                                </v-dialog>
                              </v-layout>
                            </template>
                        </v-list>                        
                        <v-list class="menu-links">
                            <template>
                              <v-layout row justify-center>
                                <v-dialog v-model="dialog6" persistent max-width="672">
                                  <div class="modal-btn" slot="activator"><v-icon>monetization_on</v-icon>Invoice</div>
                                  <v-card class="website-dialog">
                                        <form>
                                        <v-card-title class="headline">Invoice<v-icon>monetization_on</v-icon></v-card-title>
                                        <v-layout row>
                                            <v-flex d-flex md1>
                                                <v-card-text>
                                                    <v-list-tile-avatar>
                                                        <img src="https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png">
                                                    </v-list-tile-avatar>
                                                </v-card-text>
                                            </v-flex>
                                            <v-flex md11 avatar-details>
                                                <v-card-title class="avater-title">Farhat Shahir</v-card-title>
                                                <v-card-title class="avater-email">cybertronix.4406@gmail.com</v-card-title>
                                                
                                            </v-flex>
                                        </v-layout>
                                        <v-card-text class="business_info">
                                            <v-textarea name="input-7-1" label="Additional email recipients. Use semicolon (;) to separate." rows="1" value="" hint="Hint text"></v-textarea>
                                            <v-card-title class="form-title">Billing address & Business Info</v-card-title>
                                            <v-card-title class="small-title">WebDevs</v-card-title>
                                            <v-textarea name="input-7-1" label="Billing address & Business Info" rows="1" value="" hint="Hint text"></v-textarea>
                                            <v-checkbox class="checkbox" v-model="client_confirmation_checkbox" label="Request client confirmation"></v-checkbox>
                                            
                                        </v-card-text>
                                        <v-card-text class="invoice_details">
                                            <v-layout row>
                                               <v-flex xs12 sm6 md6>
                                                   <v-text-field label="Invoice Label"></v-text-field>
                                                   <v-text-field label="Invoice Number"></v-text-field>
                                                    <v-menu ref="issuedate" :close-on-content-click="false" v-model="issuedate" :nudge-right="40" :return-value.sync="date" lazy transition="scale-transition" offset-y full-width min-width="290px">
                                                        <v-text-field slot="activator" v-model="date" label="Issue Date" prepend-icon="event" readonly></v-text-field>
                                                        <v-date-picker v-model="date" no-title scrollable>
                                                          <v-spacer></v-spacer>
                                                          <v-btn flat color="primary" @click="issuedate = false">Cancel</v-btn>
                                                          <v-btn flat color="primary" @click="$refs.issuedate.save(date)">OK</v-btn>
                                                        </v-date-picker>
                                                      </v-menu>
                                                </v-flex>
                                                <v-flex xs12 sm6 md6>
                                                 <v-text-field label="Currency"></v-text-field>
                                                   <v-text-field label="Purchase Order (Optional)"></v-text-field>
                                                  <v-menu ref="duedate" :close-on-content-click="false" v-model="duedate" :nudge-right="40" :return-value.sync="date" lazy transition="scale-transition" offset-y full-width min-width="290px">
                                                    <v-text-field slot="activator" v-model="date" label="Due Date" prepend-icon="event" readonly></v-text-field>
                                                    <v-date-picker v-model="date" no-title scrollable>
                                                      <v-spacer></v-spacer>
                                                      <v-btn flat color="primary" @click="duedate = false">Cancel</v-btn>
                                                      <v-btn flat color="primary" @click="$refs.duedate.save(date)">OK</v-btn>
                                                    </v-date-picker>
                                                  </v-menu>
                                                </v-flex>
                                            </v-layout>
                                            </v-card-text>
                                            <v-card-text class="form-terms form-items">
                                                <v-card-title class="headline">Items</v-card-title>
                                                <v-layout row>
                                                    <v-flex xs12 sm6 md6>
                                                        <v-select :items="invoice_check" label="Please select an item"></v-select>
                                                    </v-flex>
                                                    <v-flex xs12 sm3 md3>
                                                        <v-text-field label="Quantity"></v-text-field>
                                                    </v-flex>
                                                    <v-flex xs12 sm3 md3>
                                                        <v-btn color="primary darken-1">Add</v-btn>
                                                    </v-flex>
                                                </v-layout>
                                                
                                            </v-card-text>
                                            <v-card-text class="form-terms">
                                                <v-card-title class="headline">Terms & notes</v-card-title>
                                                <v-text-field label="Note to client"></v-text-field>
                                                <v-card-title class="small-title">Terms & notes</v-card-title>
                                                <p>Payment of invoices due on due date specified, or may be subject to late payment fees or interest charges.</p>
                                                <v-checkbox checkbox v-model="allow_client_pay" label="Allow client to pay online"></v-checkbox>
                                                <span class="no-payment">No payment method was defined. <a href="#">Click here</a> to add one.</span>
                                            </v-card-text>
                                        <v-card-actions>
                                          <v-spacer></v-spacer>
                                          <v-btn color="primary darken-1" flat @click="dialog6 = false">Cancel</v-btn>
                                          <v-btn color="primary darken-1" flat @click="dialog6 = false">Save Draft</v-btn>
                                          <v-btn color="primary darken-1" flat @click="dialog6 = false">Send</v-btn>
                                        </v-card-actions>
                                        </form>
                                      </v-card>
                                </v-dialog>
                              </v-layout>
                            </template>
                        </v-list>                        
                        <v-list class="menu-links">
                            <template>
                              <v-layout row justify-center>
                                <v-dialog v-model="dialog7" persistent max-width="672">
                                  <div class="modal-btn" slot="activator"><v-icon>insert_drive_file</v-icon>Document</div>
                                  <v-card class="website-dialog">
                                        <form>
                                        <v-card-title class="headline">Add Document<v-icon>insert_drive_file</v-icon></v-card-title>
                                        <v-layout row>
                                            <v-flex d-flex md1>
                                                <v-card-text>
                                                    <v-list-tile-avatar>
                                                        <img src="https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png">
                                                    </v-list-tile-avatar>
                                                </v-card-text>
                                            </v-flex>
                                            <v-flex md11 avatar-details>
                                                <v-card-title class="avater-title">Farhat Shahir</v-card-title>
                                                <v-card-title class="avater-email">cybertronix.4406@gmail.com</v-card-title>
                                                
                                            </v-flex>
                                        </v-layout>
                                        
                                        <v-card-text>
                                            <v-layout row class="doc_btn">
                                               <v-flex d-flex md6>
                                                   <v-btn flat>From 'My Documents'</v-btn>
                                                </v-flex>
                                                <v-flex d-flex md6>
                                                   <file-pond style="" ref="upload_new_doc" auto-upload="false" accepted-file-types="image/jpeg, image/png" label-idle="UPLOAD NEW..."></file-pond>
                                                </v-flex>
                                            </v-layout>
                                            </v-card-text>
                                            <v-card-text class="documents-fields">
                                            <v-select :items="choose_document" label="Choose Document"></v-select>
                                            <v-card-title class="small-title">Share Options</v-card-title>
                                                <v-radio-group v-model="row" row>
                                                  <v-radio label="Available to client" value="client"></v-radio>
                                                  <v-radio label="For internal use only" value="use-only"></v-radio>
                                                </v-radio-group>
                                                <v-text-field label="Add message to client"></v-text-field>
                                                <v-checkbox class="checkbox" v-model="send_email_client" label="Send your client an email with a link to the shared document"></v-checkbox>
                                            </v-card-text>
                                        <v-card-actions>
                                          <v-spacer></v-spacer>
                                          <v-btn color="primary darken-1" flat @click="dialog7 = false">Cancel</v-btn>
                                          <v-btn color="primary darken-1" flat @click="dialog7 = false">Add</v-btn>
                                        </v-card-actions>
                                        </form>
                                      </v-card>
                                </v-dialog>
                              </v-layout>
                            </template>
                        </v-list>
                      </v-card>
                        </v-menu>
                    </v-flex>
                    <v-flex xs10>
                        <v-text-field v-model="message" outline clearable label="Message" type="text" class="msg-box"></v-text-field>
                    </v-flex>
                    <v-flex xs1>
                        <v-btn small class="icon-button send-btn"><v-icon>send</v-icon>Send</v-btn>
                    </v-flex>
            
                  </v-layout>
                </v-container>
              </v-form>
            </template>
        </v-flex>        
            
            


            
            
        </v-layout>
    </v-flex>
</v-layout>
@endsection

@section('scripts')
<link rel="stylesheet" href="https://unpkg.com/filepond/dist/filepond.min.css">
<link rel="stylesheet" href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css">

<script src="https://unpkg.com/filepond-plugin-image-preview"></script>
<script src="https://unpkg.com/filepond"></script>
<script src="https://unpkg.com/vue-filepond"></script>
<script>

    var app = new Vue({
        el: "#app",
        data: () => ({
            drawer: null,
            user: null,
            currentItem: 'tab-inbox',
            dialog: false,
            dialog1: false,
            dialog2: false,
            dialog3: false,
            dialog4: false,
            dialog5: false,
            dialog6: false,
            dialog7: false,
            radios: 'radio-1',
            message: 'Hey!',
            loading: false,
            date: new Date().toISOString().substr(0, 10),
            menu: false,
            modal: false,
            menu2: false,
            aenddate: false,
            issuedate: false,
            duedate: false,
            astartdate: false,
            time: '11:15',
            time1: false,
            time_end: '11:15',
            app_time: '11:15',
            ap_time_end: '11:15',
            time2: false,
            astarttime1: false,
            aendtime2: false,
            client_confirmation_checkbox: false,
            appointment_service: ['Foo', 'Bar', 'Fizz', 'Buzz'],
            choose_document: ['Foo', 'Bar', 'Fizz', 'Buzz'],
        }),
        
        components: {
            FilePond: vueFilePond.default(FilePondPluginImagePreview)
        },
        
        methods: {
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
            }
        },
        mounted: function () {
            let currentUrlHolder = document.querySelector('a[href="'+window.location.href+'"]');
            if(currentUrlHolder) currentUrlHolder.classList.add('cyan--text');
            document.getElementById('preloader').style.display = 'none';
            document.getElementById('app').style.display = 'block';
            this.getUser();
        },
        
        




    });
</script>
@endsection