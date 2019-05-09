<v-dialog v-model="serviceModal">
    <v-btn slot="activator"  flat class="save_btn">
        <v-icon left>add</v-icon>
        Add Service
    </v-btn>

    <v-card class="service_modal">
        <v-card-title class="headline grey lighten-2" primary-title>
            Add Service
        </v-card-title>

        <v-card-text>
            <v-card>
                <v-card-title>
                    <h4>Service Info</h4>
                </v-card-title>
                <v-card-text>
                    <v-layout row wrap>
                        <v-flex md6>
                            <v-text-field v-model="newService.name" label="Service Name"></v-text-field>
                            <v-text-field v-model="newService.fee" label="Fee"></v-text-field>
                            <v-textarea v-model="newService.description" label="Service Description"></v-textarea>
                            <v-select v-model="newService.category_id" label="Category" :items="categories" item-text="name" item-value="id"></v-select>
                            <v-checkbox v-model="newService.show_on_booking_form" label="Show on online booking form"></v-checkbox>
                        </v-flex>
                        <v-flex md-6>
                            <div style="padding: 20px;">
                                <file-pond style="width: 100%; height: 100%;" ref="pond" auto-upload="false" accepted-file-types="image/jpeg, image/png"></file-pond>
                            </div>
                        </v-flex>
                    </v-layout>
                </v-card-text>
            </v-card>

            <v-card>
                <v-card-title>
                    <h4>Service Duration</h4>
                </v-card-title>
                <v-card-text>
                    <v-layout row wrap>
                        <v-flex xs6 sm3 md3>
                            <v-text-field
                                label="Hours"
                                v-model="newService.duration.hours"
                            ></v-text-field>
                        </v-flex>
                        <v-flex xs6 sm3 md3>
                            <v-text-field
                                label="Minutes"
                                v-model="newService.duration.minutes"
                            ></v-text-field>
                        </v-flex>
                    </v-layout>
                </v-card-text>
            </v-card>

            <v-card>
                <v-card-title>
                    <h4>Service Location</h4>
                </v-card-title>
                <v-card-text>
                    <v-btn-toggle v-model="locationSelection" flat class="group-btn">
                        <v-btn flat>
                            <v-icon>home</v-icon>
                            <span>Face to Face</span>
                        </v-btn>
                        <v-btn flat>
                            <v-icon>phone</v-icon>
                            <span>Over The Phone</span>
                        </v-btn>
                        <v-btn flat>
                            <v-icon>public</v-icon>
                            <span>Online</span>
                        </v-btn>
                    </v-btn-toggle>
                    <v-radio-group v-if="locationSelection == 0" v-model="faceToFace">
                        <v-radio value="business" label="You will set the location"></v-radio>
                        <v-radio value="client" label="Client will set the location"></v-radio>
                    </v-radio-group>
                    <v-radio-group v-if="locationSelection == 1" v-model="phoneCall">
                        <v-radio value="business" label="You will call the client"></v-radio>
                        <v-radio value="client" label="Client will call you"></v-radio>
                    </v-radio-group>
                    <v-radio-group v-if="locationSelection == 2" v-model="online">
                        <v-radio value="business" label="Skype"></v-radio>
                        <v-radio value="client" label="Other"></v-radio>
                    </v-radio-group>

                    {{-- ====================== Address ===================== --}}
                    <v-text-field 
                    label="Address" 
                    v-if=" locationSelection == 0 && faceToFace == 'business' " 
                    v-model="businessAddress"
                    >
                    </v-text-field>
                    <v-text-field 
                    label="Address" 
                    v-if=" locationSelection == 1 && phoneCall == 'business' " 
                    v-model="businessPhoneNumber"
                    >
                    </v-text-field>
                    <v-text-field 
                    label="Address" 
                    v-if=" locationSelection == 2 && online == 'client' " 
                    v-model="othersOnlineMethod"
                    >
                    </v-text-field>
                </v-card-text>
            </v-card>
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="primary" flat @click="serviceModal = false">
            Cancel
        </v-btn>

        <v-btn color="primary" flat @click="saveService">
            Save
        </v-btn>
        </v-card-actions>
    </v-card>
</v-dialog>