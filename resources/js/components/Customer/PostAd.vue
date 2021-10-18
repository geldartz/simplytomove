<template>
        <section class="content-area-wrapper bg-white">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 post-ad">
                           <form-wizard v-show="forRent" @on-complete="onCompleteTenant" :title="null" :finishButtonText="'Submit'" :subtitle="null" shape="tab" color="#f6993f">
                                <tab-content title="About You" data-icon="desktop"  icon="bx bx-user-pin">
                                        <h2 class="tab-title m-0">{{ tabTitle }}</h2>
                                        <p class="text-muted text-center mb-4">simply2move, simple to use</p>
                                        <div class="form-row justify-content-center">
                                            <div class="form-group col-md-5">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">GENDER</label>
                                                <select v-model="form.gender" class="custom-select mr-sm-2" name="gender" v-on:change="ageSelect" :class="{ 'is-invalid': form.errors.has('gender') }">
                                                    <option selected disabled value="">I am / We are</option>
                                                    <option value="female">Female</option>
                                                    <option value="male">Male</option>
                                                    <option value="couple">Couple</option>
                                                    <option value="group">Group</option>
                                                    <div v-if="form.errors.has('username')" v-html="form.errors.get('gender')" />
                                                </select>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">PREFERRED LANGUAGE</label>
                                                <select v-model="form.langauge" class="custom-select mr-sm-2" name="" :class="{ 'is-invalid': form.errors.has('langauge') }">
                                                    <option selected value="english">English</option>
                                                    <option value="eomance">Romance</option>
                                                    <option value="germanic">Germanic</option>
                                                    <option value="dutch">Dutch</option>
                                                </select>
                                                <div v-if="form.errors.has('langauge')" v-html="form.errors.get('langauge')" />
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">AGE</label>
                                                <div class="d-flex">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text" for="inputGroupSelect01">Me</label>
                                                        </div>
                                                        <input v-model="form.ageone" type="text" class="form-control" name="ageone" :class="{ 'is-invalid': form.errors.has('ageone') }">

                                                    </div>
                                                    <span v-show="couple" class="spacer">-</span>
                                                    <div v-show="couple" class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text" for="inputGroupSelect01">My Partner</label>
                                                        </div>
                                                        <input  v-model="form.agetwo" type="text" class="form-control" placeholder="" aria-label="" :class="{ 'is-invalid': form.errors.has('agetwo') }">
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group col-md-5">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">NATIONALITY</label>
                                                <select v-model="form.nationality" class="custom-select mr-sm-2" name="nationality" :class="{ 'is-invalid': form.errors.has('nationality') }">
                                                    <option selected value="not-disclosed">Not Disclosed</option>
                                                    <option value="british">British</option>
                                                    <option value="american">American</option>
                                                    <option value="german">German</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">OCCUPATION</label>
                                                <select v-model="form.occupation" class="custom-select mr-sm-2" :class="{ 'is-invalid': form.errors.has('occupation') }">
                                                    <option selected value="not-disclosed">Not Disclosed</option>
                                                    <option value="professional">Professional</option>
                                                    <option value="self-employed">Self Employed</option>
                                                    <option value="student">Student</option>
                                                    <option value="retired">Retired</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">INTERESTS / HOBBY</label>
                                                <input v-model="form.hobby" type="text" name="hobby" class="form-control" placeholder="What makes you happy?" :class="{ 'is-invalid': form.errors.has('hobby') }">
                  
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">I / WE WOULD LIKE TO STAY</label>
                                                <div class="d-flex">
                                                    <select v-model="form.staymin" name="staymin" class="custom-select mr-sm-2 w-50" :class="{ 'is-invalid': form.errors.has('staymin') }">
                                                        <option selected value="no-min">No Min</option>
                                                        <option value="0">Less than a month</option>
                                                        <option value="1">1 month</option>
                                                        <option value="2">2 months</option>
                                                        <option value="3">3 months</option>
                                                        <option value="4">4 months</option>
                                                        <option value="5">5 months</option>
                                                        <option value="6">6 months</option>
                                                        <option value="7">7 months</option>
                                                        <option value="8">8 months</option>
                                                        <option value="9">9 months</option>
                                                        <option value="10">10 months</option>
                                                        <option value="11">11 months</option>
                                                        <option value="12">1 year</option>
                                                        <option value="13">More than 1 year</option>
                                                        <option value="14">1 years</option>
                                                        <option value="15">2 years</option>
                                                    </select>
                                                    <select v-model="form.staymax" name="staymax" class="custom-select w-50 mr-0" :class="{ 'is-invalid': form.errors.has('staymax') }">
                                                        <option selected value="no-max">No Max</option>
                                                        <option value="0">Less than a month</option>
                                                        <option value="1">1 month</option>
                                                        <option value="2">2 months</option>
                                                        <option value="3">3 months</option>
                                                        <option value="4">4 months</option>
                                                        <option value="5">5 months</option>
                                                        <option value="6">6 months</option>
                                                        <option value="7">7 months</option>
                                                        <option value="8">8 months</option>
                                                        <option value="9">9 months</option>
                                                        <option value="10">10 months</option>
                                                        <option value="11">11 months</option>
                                                        <option value="12">1 year</option>
                                                        <option value="13">More than 1 year</option>
                                                        <option value="14">1 years</option>
                                                        <option value="15">2 years</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">MOVING DATE</label>
                                                 <datepicker v-model="form.movingdate" name="movingdate" :class="{ 'is-invalid': form.errors.has('movingdate') }" placeholder="Select Date" ></datepicker>
                                            </div>
                                        </div>
                                </tab-content>
                                <tab-content title="New Property"   icon="bx bxs-building-house">
                                    <h2 class="tab-title m-0">{{ tabTitle }}</h2>
                                    <p class="text-muted text-center mb-4">simply2move, simple to use</p>
                                    <div class="row justify-content-center">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">PRICE RANGE</label>
                                                <div class="d-flex">
                                                    <select v-model="form.price_min" name="price_min" class="custom-select mr-sm-2" >
                                                        <option selected disabled value="">MIN Price</option>
                                                        <option value="100">100</option>
                                                        <option value="150">150</option>
                                                        <option value="200">200</option>
                                                        <option value="250">250</option>
                                                        <option value="300">300</option>
                                                        <option value="350">350</option>
                                                        <option value="400">400</option>
                                                        <option value="450">450</option>
                                                        <option value="500">500</option>
                                                        <option value="600">600</option>
                                                        <option value="700">700</option>
                                                        <option value="800">800</option>
                                                        <option value="900">900</option>
                                                        <option value="1000">1000</option>
                                                        <option value="1100">1,100</option>
                                                        <option value="1200">1,200</option>
                                                        <option value="1300">1,300</option>
                                                        <option value="1400">1,400</option>
                                                        <option value="1500">1,500</option>
                                                        <option value="1600">1,600</option>
                                                        <option value="1700">1,700</option>
                                                        <option value="1800">1,800</option>
                                                        <option value="1900">1,900</option>
                                                        <option value="2000">2,000</option>
                                                        <option value="2250">2,250</option>
                                                        <option value="2500">2,500</option>
                                                        <option value="2750">2,750</option>
                                                        <option value="3000">3,000</option>
                                                        <option value="3250">3,250</option>
                                                        <option value="3500">3,500</option>
                                                        <option value="3750">3,750</option>
                                                        <option value="4000">4,000</option>
                                                        <option value="4500">4,500</option>
                                                        <option value="5000">5,000</option>
                                                        <option value="5500">5,500</option>
                                                        <option value="6000">6,000</option>
                                                    </select>
                                                    <span class="spacer">-</span>
                                                    <select v-model="form.price_max" name="price_max" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                        <option selected disabled value="">MAX Price</option>
                                                        <option value="100">100</option>
                                                        <option value="150">150</option>
                                                        <option value="200">200</option>
                                                        <option value="250">250</option>
                                                        <option value="300">300</option>
                                                        <option value="350">350</option>
                                                        <option value="400">400</option>
                                                        <option value="450">450</option>
                                                        <option value="500">500</option>
                                                        <option value="600">600</option>
                                                        <option value="700">700</option>
                                                        <option value="800">800</option>
                                                        <option value="900">900</option>
                                                        <option value="1000">1000</option>
                                                        <option value="1100">1,100</option>
                                                        <option value="1200">1,200</option>
                                                        <option value="1300">1,300</option>
                                                        <option value="1400">1,400</option>
                                                        <option value="1500">1,500</option>
                                                        <option value="1600">1,600</option>
                                                        <option value="1700">1,700</option>
                                                        <option value="1800">1,800</option>
                                                        <option value="1900">1,900</option>
                                                        <option value="2000">2,000</option>
                                                        <option value="2250">2,250</option>
                                                        <option value="2500">2,500</option>
                                                        <option value="2750">2,750</option>
                                                        <option value="3000">3,000</option>
                                                        <option value="3250">3,250</option>
                                                        <option value="3500">3,500</option>
                                                        <option value="3750">3,750</option>
                                                        <option value="4000">4,000</option>
                                                        <option value="4500">4,500</option>
                                                        <option value="5000">5,000</option>
                                                        <option value="5500">5,500</option>
                                                        <option value="6000">6,000</option>
                                                    </select>
                                                    <select v-model="form.price_due" name="price_due" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                        <option value="permonth" selected>Per Month</option>
                                                        <option value="peryear">Per Year</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">DEPOSIT</label>
                                                <select v-model="form.deposit" name="deposit" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                    <option selected value="">Not Important</option>
                                                    <option value="max-one-week">Max 1 week rent</option>
                                                    <option value="max-two-week">Max 2 week rent</option>
                                                    <option value="max-three-week">Max 3 week rent</option>
                                                    <option value="max-four-week">Max 4 week rent</option>
                                                    <option value="max-five-week">Max 5 week rent</option>
                                                    <option value="max-six-week">Max 6 week rent</option>
                                                    <option value="max-seven-week">Max 7 week rent</option>
                                                    <option value="max-eight-week">Max 8 week rent</option>
                                                    <option value="max-nine-week">Max 9 week rent</option>
                                                    <option value="max-ten-week">Max 10 week rent</option>
                                                    <option value="max-eleven-week">Max 11 week rent</option>
                                                    <option value="max-one-year">1 year</option>
                                                    <option value="max-more-one-year">More that 1 year</option>
                                                    <option value="max-two-years">2 years</option>
                                                    <option value="max-more-two-years">More that 2 years</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">PROPERTY TYPE</label>
                                                <select v-model="form.property_type" name="property_type" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                    <option selected disabled value="">Select Type</option>
                                                    <option value="not-important">Not Important</option>
                                                    <option value="detached">Detached</option>
                                                    <option value="semi-detached">Semi-detached</option>
                                                    <option value="terraced">Terraced</option>
                                                    <option value="bungalow">Bungalow</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">BEDROOMS</label>
                                                <div class="d-flex">
                                                    <select v-model="form.bed_min" name="bed_min" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                        <option selected disabled value="">Min</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="10+">More than 10</option>
                                                    </select>
                                                    <span class="spacer">-</span>
                                                    <select v-model="form.bed_max" name="bed_max" class="custom-select mr-sm-2">
                                                        <option selected disabled value="">Max</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="10+">More than 10</option>
                                                    </select>
                                                </div>
                                                <p class="text-muted px11">How many bedroom house do you looking for?</p>
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">BATHROOMS</label>
                                                <div class="d-flex">
                                                    <select v-model="form.bath_min" name="bath_min"  class="custom-select mr-sm-2">
                                                        <option selected disabled value="">Min</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="10+">More than 10</option>
                                                    </select>
                                                    <span class="spacer">-</span>
                                                    <select v-model="form.bath_max" name="bath_max" class="custom-select mr-sm-2">
                                                        <option selected disabled value="">Max</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="10+">More than 10</option>
                                                    </select>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="form-check mr-sm-2">
                                                        <input v-model="form.bath_toilet" name="bath_toilet" class="form-check-input" type="checkbox" value="1">
                                                        <label class="form-check-label text-muted px11" for="flexCheckDefault">
                                                            Separate Toilet
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input v-model="form.bath_private" name="bath_max" class="form-check-input" type="checkbox" value="1">
                                                        <label class="form-check-label text-muted px11" for="flexCheckDefault">
                                                            Private Bathroom
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label class="mr-sm-2 px16" for="inlineFormCustomSelect">Where you want to live?</label>
                                                <div class="input-group mb-3">
                                                     <gmap-autocomplete class="form-control" @place_changed="initMarker"></gmap-autocomplete>
                                                    <button class="btn btn-outline-secondary" @click="addLocationMarker" type="button">Search</button>
                                                </div>
                                                <gmap-map
                                                    :zoom="11"    
                                                    :center="center"
                                                    style="width:100%;  height: 300px;"
                                                >
                                                <gmap-marker
                                                    :key="index"
                                                    :draggable="true"
                                                    v-for="(m, index) in locationMarkers"
                                                    :position="m.position"
                                                    :clickable="true"
                                                    @drag="updateCoordinates"
                                                    @click="center=m.position"
                                                ></gmap-marker>
                                                </gmap-map>
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">COORDINATES</label>
                                                <div class="d-flex">
                                                    <input v-model="form.latitude" type="text" name="latitude" class="form-control mr-2" placeholder="Latitude" >
                                                    <input v-model="form.longtitude" type="text" name="longtitude" class="form-control" placeholder="Longtitude" >
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">FURNISHING</label>
                                                <div class="row radio-buttons">
                                                    <div class="col-sm-3">
                                                        <input v-model="form.furnishing" type="checkbox" class="btn-check" name="furnishing" id="furnished" value="furnished">
                                                        <label class="btn btn-outline-secondary form-control mb-2" for="furnished">Furnished</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input v-model="form.furnishing" type="checkbox" class="btn-check" name="furnishing" id="part-furnished" value="part-furnished">
                                                        <label class="btn btn-outline-secondary form-control mb-2" for="part-furnished">Part - Furnished</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input v-model="form.furnishing" type="checkbox" class="btn-check" name="furnishing" id="un-furnished" value="un-furnished">
                                                        <label class="btn btn-outline-secondary form-control mb-2" for="un-furnished">Unfurnished</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">MISCELLANEOUS</label>
                                                <div class="row radio-buttons">
                                                    <div class="col-sm-3">
                                                        <input v-model="form.misc" type="checkbox" class="btn-check" name="miscellaneous" id="smoking-allowed" value="Smoking Allowed">
                                                        <label class="btn btn-outline-secondary form-control mb-2" for="smoking-allowed">Smoking Allowed</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input v-model="form.misc" type="checkbox" class="btn-check" name="miscellaneous" id="pet-allowed" value="Pet Allowed">
                                                        <label class="btn btn-outline-secondary form-control mb-2" for="pet-allowed">Pet Allowed</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">PROPERTY FEATURES</label>
                                                <div class="row radio-buttons">
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="balcony-terrace" value="Balcony / Terrace">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="balcony-terrace">Balcony / Terrace</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="swimming-pool" value="Swimming Pool">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="swimming-pool">Swimming Pool</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="security" value="Concierge / Security">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="security">Concierge / Security</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="aircon" value="Air Conditioning">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="aircon">Air Conditioning</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="dishwasher" value="Dishwasher">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="dishwasher">Dishwasher</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="alarm" value="Alarm System">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="alarm">Alarm System</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="wooden" value="Wooden Floors">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="wooden">Wooden Floors</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="garden" value="Garden">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="garden">Garden</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="carpark" value="Car Park / Garage">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="carpark">Car Park / Garage</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="oven" value="Oven">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="oven">Oven</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="bathtub" value="Bathtub">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="bathtub">Bathtub</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="ensuite" value="Ensuite Room">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="ensuite">Ensuite Room</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="gym" value="Gym">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="gym">Gym</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="refurbished" value="Newly Refurbished">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="refurbished">Newly Refurbished</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="quite" value="Quite Street">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="quite">Quite Street</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="patio" value="Patio">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="patio">Patio</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="glazed" value="Double Glazed Windows">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="glazed">Double Glazed Windows</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="disabled" value="Disabled Access">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="disabled">Disabled Access</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tab-content>
                                <tab-content title="Advert Details"   icon="bx bx-news">
                                    <h2 class="tab-title m-0">{{ tabTitle }}</h2>
                                        <p class="text-muted text-center mb-4">simply2move, simple to use</p>
                                    <div class="row px-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">AD TITLE</label>
                                                <p class="text-muted px11 mb-0">Please do not add your contact details to your AD title</p>
                                                <input v-model="form.ad_title" name="ad_title" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">AD DESCRIPTION</label>
                                                <p class="text-muted px11 mb-0">Please do not add your contact details to your AD description</p>
                                                <textarea v-model="form.ad_desc" name="ad_desc" type="text" class="form-control" rows="10" placeholder="To help improve your AD, Introduce yourself to the advertiser. Talk about what is your profession, what you like, why you will be a good tenant?"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">NAME</label>
                                            <div class="d-flex">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" style="height: min-content;" for="inputGroupSelect01">First Name</label>
                                                    </div>
                                                    <input v-model="form.ad_firstname" name="ad_firstname" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text"  for="inputGroupSelect01">Last Name</label>
                                                    </div>
                                                    <input v-model="form.ad_lastname" name="ad_lastname" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                                    <div class="form-check mr-sm-2 float-right">
                                                        <input v-model="form.ad_display" name="ad_display" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                        <label class="form-check-label text-muted px11" for="flexCheckDefault">
                                                            Display last name on your advert?
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">Email</label>
                                                <input v-model="form.ad_email" name="ad_email" type="email" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">PHONE</label>
                                                <input v-model="form.ad_phone" name="ad_phone" type="email" class="form-control">
                                                <div class="form-check mr-sm-2">
                                                    <input v-model="form.ad_hide_phone" name="ad_hide_phone" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label text-muted px11" for="flexCheckDefault">
                                                       Hide my phone number in my AD (We recommend to keep it visible, We only display for registered users)
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                         
                                </tab-content>
                                <tab-content title="Email Alerts"   icon="bx bx-mail-send">
                                    <h2 class="tab-title m-0">{{ tabTitle }}</h2>
                                        <p class="text-muted text-center mb-4">simply2move, simple to use</p>
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 border mb-3 py-5 px-3">
                                            <div class="row">
                                                <div class="col-sm-4 text-center my-auto">
                                                    <span class="border py-2 px-4">Daily Email Alerts</span>
                                                </div>
                                                <div class="col-sm-7 my-auto">
                                                    <span>Daily summary emails for new matching advert</span>
                                                </div>
                                                <div class="col-sm-1">
                                                    <input v-model="form.email_alerts" name="email_alerts" class="form-check-input" type="radio" value="regular">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-10 theme-border mb-3 py-5 px-3">
                                            <div class="row">
                                                <div class="col-sm-4 text-center my-auto">
                                                    <p class="mb-2 theme-color">Only for Premium Members</p>
                                                    <span class="border py-2 px-4 theme-bg">Instant Email Alerts</span>
                                                </div>
                                                <div class="col-sm-7 my-auto">
                                                    <p class="theme-color mb-2 text-center">What is Included?</p>
                                                    <ul class="p-0">
                                                        <li>Instant emails new matching advert as soon as they posted on Simply2move</li>
                                                        <li>Up to 
                                                            <select name="" id="">
                                                                <option value="50">50</option>
                                                                <option value="50">100</option>
                                                            </select> emails per day.
                                                        </li>
                                                        <li>We double it up! Free Instant email alert for the Basic users from all Premium Adverts</li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-1 my-auto">
                                                    <input v-model="form.email_alerts" name="email_alerts" class="form-check-input" type="radio" value="premium">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tab-content>
                                <tab-content title="Membership"   icon="bx bxs-award">
                                    <h2 class="tab-title m-0">{{ tabTitle }}</h2>
                                    <p class="text-muted text-center mb-4">simply2move, simple to use</p>
                                    <div class="row px-4">
                                        <div class="col-md-3 border p-4  select-membership bg-free">
                                            <h4 class="mb-5 text-center">Basic Membership</h4>
                                            <h4 class="price text-center">FREE</h4>
                                            <p class="advert text-center">1 advert in a Package</p>
                                            <details>
                                            <summary>
                                                <h6>More Details</h6>
                                            </summary>
                                            <div class="details-content">
                                               <ul class="p-0">
                                                   <li>Basic advert with one photo</li>
                                                   <li>Basic advert with one photo</li>
                                                   <li>Basic advert with one photo</li>
                                               </ul>
                                            </div>
                                            </details>
                                             <input type="radio" class="btn-check" name="membership" id="free" value="free">
                                             <label class="btn btn-outline-secondary form-control mb-2" for="free">Select</label>
                                        </div>
                                        <div v-for="item in memberships" :key="item.id" class="col-md-3 border py-4  select-membership bg-fee text-center">
                                            <h4 class="mb-0 text-center text-uppercase">{{item.age}} {{ item.period}}</h4>
                                            <span class="mb-5 text-center text-uppercase access">Access</span>
                                            <p class="only mt-1 mb-0">only</p>
                                            <h4 class="price text-center mt-2 mb-0">£{{item.amount}}</h4>
                                            <p class="just mt-0 mb-2">Just £{{item.amount/item.age | decimalNumber}} a day!</p>
                                            <p class="advert text-center">{{item.number_of_adverts}} {{item.number_of_adverts == '1' ? 'advert' : 'adverts'}} in a Package</p>
                                            <details>
                                            <summary>
                                                <h6>More Details</h6>
                                            </summary>
                                            <div class="details-content">
                                               <ul class="p-0">
                                                   <li v-for="dd in item.details" :key="dd.id">{{ dd.item}}</li>
                                               </ul>
                                            </div>
                                            </details>
                                             <input type="radio" class="btn-check" name="membership" :id="item.id" :value="item.id">
                                             <label class="btn btn-outline-secondary form-control mb-2" :for="item.id">Select</label>
                                        </div>
                                    </div>
                                </tab-content>
                            </form-wizard>
                            <form-wizard v-show="forProperty"  @on-complete="onCompleteProperty" :title="null" :finishButtonText="'Submit'" :subtitle="null" shape="tab" color="#f6993f">
                                <tab-content title="Main Information"   icon="fas fa-info-circle">
                                    <h2 class="tab-title m-0">{{ tabTitle }}</h2>
                                    <p class="text-muted text-center mb-4">simply2move, simple to use</p>
                                    <div class="row justify-content-center">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">I am a</label>
                                                <select v-model="landlordForm.typeOnwer" name="deposit" class="custom-select mr-sm-2" >
                                                    <option :title="'This is my own Property and I live here'" selected value="liveinlandlord">Live in Landlord</option>
                                                    <option :title="'This is my own Property and I don\'t live there'" value="liveoutlandlord">Live out Landlord</option>
                                                    <option :title="'I\'m/we advertising on a landlord\'s behalf'" value="letting">Letting Agent/Agency</option>
                                                    <option :title="'I would like to go and I need someone to replace me'" value="currenttenant">Current Tenant</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2">PRICE</label>
                                                <div class="d-flex">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <label for="inputGroupSelect01" class="input-group-text">£</label>
                                                        </div> 
                                                        <input v-model="landlordForm.price" type="text" name="price" class="form-control">
                                                    </div>
                                                    <select v-model="landlordForm.duration" name="duration" class="custom-select ml-sm-3">
                                                        <option value="permonth" selected>Per Month</option>
                                                        <option value="peryear">Per Year</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>FEES APPLY?</label>
                                                <label class="ml-106">DSS WELCOME?</label>
                                                <div class="d-flex fees-apply">
                                                    <input type="checkbox" v-model="landlordForm.dss" class="btn-check" name="furnishing" id="fees_apply" value="yes">
                                                    <label class="btn btn-outline-secondary form-control mb-2" for="fees_apply">YES</label>
                                                    <select v-model="landlordForm.dss_due" name="duration" class="custom-select ml-sm-3">
                                                        <option value="permonth" selected>Per Month</option>
                                                        <option value="peryear">Per Year</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">SECURITY DEPOSIT</label>
                                                <select v-model="landlordForm.deposit" name="deposit" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                    <option selected value="">No Deposit</option>
                                                    <option value="one-week">1 week rent</option>
                                                    <option value="two-week">2 week rent</option>
                                                    <option value="three-week">3 week rent</option>
                                                    <option value="four-week">1 month rent</option>
                                                    <option value="five-week"> 5 week rent</option>
                                                    <option value="six-week">6 week rent</option>
                                                    <option value="seven-week">7 week rent</option>
                                                    <option value="2 months">2 months rent</option>
                                                    <option value="nine-week">9 week rent</option>
                                                    <option value="ten-week">10 week rent</option>
                                                    <option value="eleven-week">11 week rent</option>
                                                    <option value="3 months">3 months</option>
                                                    <option value="4 months">4 months rent</option>
                                                    <option value="5 months">5 months rent</option>
                                                    <option value="6 months">6 months rent</option>
                                                    <option value="other">Other amount: <input type="text"></option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">AVAILABLE FROM</label>
                                                 <datepicker v-model="landlordForm.available_date" name="movingdate" :class="{ 'is-invalid': form.errors.has('movingdate') }" placeholder="Select Date" ></datepicker>
                                            </div>
                                            <div class="form-group ">
                                                <label class="mr-sm-2" for="minstay">MIN STAY</label>
                                                <label class="ml-135" for="maxstay">MAX STAY</label>
                                                <div class="d-flex">
                                                    <select v-model="landlordForm.staymin" name="staymin" id="minstay" class="custom-select mr-sm-2 w-50" :class="{ 'is-invalid': form.errors.has('staymin') }">
                                                        <option selected value="no-min">No Min</option>
                                                        <option value="0">Less than a month</option>
                                                        <option value="1">1 month</option>
                                                        <option value="2">2 months</option>
                                                        <option value="3">3 months</option>
                                                        <option value="4">4 months</option>
                                                        <option value="5">5 months</option>
                                                        <option value="6">6 months</option>
                                                        <option value="7">7 months</option>
                                                        <option value="8">8 months</option>
                                                        <option value="9">9 months</option>
                                                        <option value="10">10 months</option>
                                                        <option value="11">11 months</option>
                                                        <option value="12">1 year</option>
                                                        <option value="13">More than 1 year</option>
                                                        <option value="14">1 years</option>
                                                        <option value="15">2 years</option>
                                                    </select>
                                                    <select v-model="landlordForm.staymax" name="staymax" id="maxstay" class="custom-select w-50 mr-0" :class="{ 'is-invalid': form.errors.has('staymax') }">
                                                        <option selected value="no-max">No Max</option>
                                                        <option value="0">Less than a month</option>
                                                        <option value="1">1 month</option>
                                                        <option value="2">2 months</option>
                                                        <option value="3">3 months</option>
                                                        <option value="4">4 months</option>
                                                        <option value="5">5 months</option>
                                                        <option value="6">6 months</option>
                                                        <option value="7">7 months</option>
                                                        <option value="8">8 months</option>
                                                        <option value="9">9 months</option>
                                                        <option value="10">10 months</option>
                                                        <option value="11">11 months</option>
                                                        <option value="12">1 year</option>
                                                        <option value="13">More than 1 year</option>
                                                        <option value="14">1 years</option>
                                                        <option value="15">2 years</option>
                                                    </select>
                                                </div>
                                            </div>
                                 
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label class="mr-sm-2 px16" for="inlineFormCustomSelect">Where you want to live?</label>
                                                <div class="input-group mb-3">
                                                     <gmap-autocomplete class="form-control" @place_changed="initMarker"></gmap-autocomplete>
                                                    <button class="btn btn-outline-secondary" @click="addLocationMarker" type="button">Search</button>
                                                </div>
                                                <gmap-map
                                                    :zoom="11"    
                                                    :center="center"
                                                    style="width:100%;  height: 300px;"
                                                >
                                                <gmap-marker
                                                    :key="index"
                                                    :draggable="true"
                                                    v-for="(m, index) in locationMarkers"
                                                    :position="m.position"
                                                    :clickable="true"
                                                    @drag="updateCoordinates"
                                                    @click="center=m.position"
                                                ></gmap-marker>
                                                </gmap-map>
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">COORDINATES</label>
                                                <div class="d-flex">
                                                    <input v-model="landlordForm.latitude" type="text" name="latitude" class="form-control mr-2" placeholder="Latitude" >
                                                    <input v-model="landlordForm.longtitude" type="text" name="longtitude" class="form-control" placeholder="Longtitude" >
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </tab-content>
                                <tab-content title="About Your Property"   icon="fas fa-home">
                                    <h2 class="tab-title m-0">{{ tabTitle }}</h2>
                                    <p class="text-muted text-center mb-4">simply2move, simple to use</p>
                                    <div class="row justify-content-center">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">PROPERTY TYPE</label>
                                                <select v-model="landlordForm.property_type" name="property_type" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                    <option value="not-important">Not Important</option>
                                                    <option value="detached">Detached</option>
                                                    <option value="semi-detached">Semi-detached</option>
                                                    <option value="terraced">Terraced</option>
                                                    <option value="bungalow">Bungalow</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">MAXIMUM OCCUPANCY</label>
                                                <select v-model="landlordForm.occupancy" name="deposit" class="custom-select mr-sm-2 text-center" id="inlineFormCustomSelect">
                                                    <option selected value="1">1</option>
                                                    <option selected value="2">2</option>
                                                    <option selected value="3">3</option>
                                                    <option selected value="4">4</option>
                                                    <option selected value="5">5</option>
                                                    <option selected value="6">6</option>
                                                    <option selected value="7">7</option>
                                                    <option selected value="8">8</option>
                                                    <option selected value="9">9</option>
                                                    <option selected value="10">10</option>
                                                    <option selected value="11">11</option>
                                                    <option selected value="12">12</option>
                                                    <option selected value="13">13</option>
                                                    <option selected value="14">14</option>
                                                    <option selected value="15">15</option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">BEDROOMS</label>
                                                <select v-model="landlordForm.bedroom" name="deposit" class="custom-select mr-sm-2 text-center" id="inlineFormCustomSelect">
                                                    <option selected value="1">1</option>
                                                    <option selected value="2">2</option>
                                                    <option selected value="3">3</option>
                                                    <option selected value="4">4</option>
                                                    <option selected value="5">5</option>
                                                    <option selected value="6">6</option>
                                                    <option selected value="7">7</option>
                                                    <option selected value="8">8</option>
                                                    <option selected value="9">9</option>
                                                    <option selected value="10">10</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-0">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">BATHROOMS</label>
                                                <select v-model="landlordForm.bathroom" name="deposit" class="custom-select mr-sm-2 text-center" id="inlineFormCustomSelect">
                                                    <option selected value="1">1</option>
                                                    <option selected value="2">2</option>
                                                    <option selected value="3">3</option>
                                                    <option selected value="4">4</option>
                                                    <option selected value="5">5</option>
                                                    <option selected value="6">6</option>
                                                    <option selected value="7">7</option>
                                                    <option selected value="8">8</option>
                                                    <option selected value="9">9</option>
                                                    <option selected value="10">10</option>
                                                </select>
                                            </div>
                                            <div class="d-flex">
                                                    <div class="form-check mr-sm-2">
                                                        <input v-model="landlordForm.bath_toilet" name="bath_toilet" class="form-check-input" type="checkbox" value="1">
                                                        <label class="form-check-label text-muted px11" for="flexCheckDefault">
                                                            Separate Toilet
                                                        </label>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">FURNISHING</label>
                                                <div class="row radio-buttons">
                                                    <div class="col-sm-3">
                                                        <input v-model="landlordForm.furnishing" type="radio" class="btn-check" name="furnishing" id="land-furnished" value="furnished">
                                                        <label class="btn btn-outline-secondary form-control mb-2" for="land-furnished">Furnished</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input v-model="landlordForm.furnishing" type="radio" class="btn-check" name="furnishing" id="land-part-furnished" value="part-furnished">
                                                        <label class="btn btn-outline-secondary form-control mb-2" for="land-part-furnished">Part - Furnished</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input v-model="landlordForm.furnishing" type="radio" class="btn-check" name="furnishing" id="land-un-furnished" value="un-furnished">
                                                        <label class="btn btn-outline-secondary form-control mb-2" for="land-un-furnished">Unfurnished</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">UTILITIES INCLUDED IN RENT</label>
                                                <div class="row radio-buttons">
                                                    <div class="col-sm-3">
                                                        <input v-model="landlordForm.utilities" type="checkbox" class="btn-check" name="utilities" id="electric" value="Electric">
                                                        <label class="btn btn-outline-secondary form-control mb-2" for="electric">Electric</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input v-model="landlordForm.utilities" type="checkbox" class="btn-check" name="utilities" id="gas" value="gas">
                                                        <label class="btn btn-outline-secondary form-control mb-2" for="gas">Gas</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input v-model="landlordForm.utilities" type="checkbox" class="btn-check" name="utilities" id="counciltax" value="Council Tax">
                                                        <label class="btn btn-outline-secondary form-control mb-2" for="counciltax">Council Tax</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input v-model="landlordForm.utilities" type="checkbox" class="btn-check" name="utilities" id="water" value="Water">
                                                        <label class="btn btn-outline-secondary form-control mb-2" for="water">Water</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input v-model="landlordForm.utilities" type="checkbox" class="btn-check" name="utilities" id="internet" value="Internet">
                                                        <label class="btn btn-outline-secondary form-control mb-2" for="internet">Internet</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input v-model="landlordForm.utilities" type="checkbox" class="btn-check" name="utilities" id="tv" value="TV Licence/Cable TV">
                                                        <label class="btn btn-outline-secondary form-control mb-2" for="tv">TV Licence/Cable TV</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input v-model="landlordForm.utilities" type="checkbox" class="btn-check" name="utilities" id="all" value="All">
                                                        <label class="btn btn-outline-secondary form-control mb-2" for="all">All</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">MISCELLANEOUS</label>
                                                <div class="row radio-buttons">
                                                    <div class="col-sm-3">
                                                        <input v-model="landlordForm.misc" type="checkbox" class="btn-check" name="miscellaneous" id="land-smoking-allowed" value="Smoking Allowed">
                                                        <label class="btn btn-outline-secondary form-control mb-2" for="land-smoking-allowed">Smoking Allowed</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input v-model="landlordForm.misc" type="checkbox" class="btn-check" name="miscellaneous" id="land-pet-allowed" value="Pet Allowed">
                                                        <label class="btn btn-outline-secondary form-control mb-2" for="land-pet-allowed">Pet Allowed</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">PROPERTY FEATURES</label>
                                                <div class="row radio-buttons">
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="landlordForm.property_features" type="checkbox" class="btn-check" name="property-features" id="land-balcony-terrace" value="Balcony / Terrace">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="land-balcony-terrace">Balcony / Terrace</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="landlordForm.property_features" type="checkbox" class="btn-check" name="property-features" id="land-swimming-pool" value="Swimming Pool">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="land-swimming-pool">Swimming Pool</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="landlordForm.property_features" type="checkbox" class="btn-check" name="property-features" id="land-security" value="Concierge / Security">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="land-security">Concierge / Security</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="landlordForm.property_features" type="checkbox" class="btn-check" name="property-features" id="land-aircon" value="Air Conditioning">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="land-aircon">Air Conditioning</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="landlordForm.property_features" type="checkbox" class="btn-check" name="property-features" id="land-dishwasher" value="Dishwasher">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="land-dishwasher">Dishwasher</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="landlordForm.property_features" type="checkbox" class="btn-check" name="property-features" id="land-alarm" value="Alarm System">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="land-alarm">Alarm System</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="landlordForm.property_features" type="checkbox" class="btn-check" name="property-features" id="land-wooden" value="Wooden Floors">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="land-wooden">Wooden Floors</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="landlordForm.property_features" type="checkbox" class="btn-check" name="property-features" id="land-garden" value="Garden">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="land-garden">Garden</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="landlordForm.property_features" type="checkbox" class="btn-check" name="property-features" id="land-carpark" value="Car Park / Garage">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="land-carpark">Car Park / Garage</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="landlordForm.property_features" type="checkbox" class="btn-check" name="property-features" id="land-oven" value="Oven">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="land-oven">Oven</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="landlordForm.property_features" type="checkbox" class="btn-check" name="property-features" id="land-bathtub" value="Bathtub">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="land-bathtub">Bathtub</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="landlordForm.property_features" type="checkbox" class="btn-check" name="property-features" id="land-ensuite" value="Ensuite Room">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="land-ensuite">Ensuite Room</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="landlordForm.property_features" type="checkbox" class="btn-check" name="property-features" id="land-gym" value="Gym">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="land-gym">Gym</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="landlordForm.property_features" type="checkbox" class="btn-check" name="property-features" id="land-refurbished" value="Newly Refurbished">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="land-refurbished">Newly Refurbished</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="landlordForm.property_features" type="checkbox" class="btn-check" name="property-features" id="land-quite" value="Quite Street">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="land-quite">Quite Street</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="landlordForm.property_features" type="checkbox" class="btn-check" name="property-features" id="land-patio" value="Patio">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="land-patio">Patio</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="landlordForm.property_features" type="checkbox" class="btn-check" name="property-features" id="land-glazed" value="Double Glazed Windows">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="land-glazed">Double Glazed Windows</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="landlordForm.property_features" type="checkbox" class="btn-check" name="property-features" id="land-disabled" value="Disabled Access">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="land-disabled">Disabled Access</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tab-content>
                                <tab-content title="Property Media"   icon="fas fa-cloud-upload-alt">
                                    <h2 class="tab-title m-0">{{ tabTitle }}</h2>
                                    <p class="text-muted text-center mb-4">simply2move, simple to use</p>
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 mb-5">
                                            <label class="mr-sm-2">UPLOAD IMAGES</label>
                                            <UploadImages v-model="landlordForm.images" @changed="handleImages" :max="5" maxError="Max files exceed" fileError="images files only accepted" uploadMsg="Drag and drop images here"/>
                                        </div>
                                        <div class="col-md-10 mt-2">
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">VIDEO PRESENTATION</label>
                                                <input v-model="landlordForm.video_link" type="text" class="form-control" placeholder="Add link to your video">
                                            </div>
                                        </div>
                                    </div>
                                </tab-content>
                                <tab-content title="Advert Details"   icon="fab fa-adversal">
                                    <h2 class="tab-title m-0">{{ tabTitle }}</h2>
                                        <p class="text-muted text-center mb-4">simply2move, simple to use</p>
                                    <div class="row px-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">AD TITLE</label>
                                                <p class="text-muted px11 mb-0">Please do not add your contact details to your AD title</p>
                                                <input v-model="landlordForm.ad_title" name="ad_title" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">AD DESCRIPTION</label>
                                                <p class="text-muted px11 mb-0">Please do not add your contact details to your AD description</p>
                                                <textarea v-model="landlordForm.ad_desc" name="ad_desc" type="text" class="form-control" rows="10" placeholder="To help improve your AD, Introduce yourself to the advertiser. Talk about what is your profession, what you like, why you will be a good tenant?"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">NAME</label>
                                            <div class="d-flex">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" style="height: min-content;" for="inputGroupSelect01">First Name</label>
                                                    </div>
                                                    <input v-model="landlordForm.ad_firstname" name="ad_firstname" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text"  for="inputGroupSelect01">Last Name</label>
                                                    </div>
                                                    <input v-model="landlordForm.ad_lastname" name="ad_lastname" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                                    <div class="form-check mr-sm-2 float-right">
                                                        <input v-model="landlordForm.ad_display" name="ad_display" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                        <label class="form-check-label text-muted px11" for="flexCheckDefault">
                                                            Display last name on your advert?
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">Email</label>
                                                <input v-model="landlordForm.ad_email" name="ad_email" type="email" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">PHONE</label>
                                                <input v-model="form.ad_phone" name="ad_phone" type="email" class="form-control">
                                                <div class="form-check mr-sm-2">
                                                    <input v-model="landlordForm.ad_hide_phone" name="ad_hide_phone" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label text-muted px11" for="flexCheckDefault">
                                                       Hide my phone number in my AD (We recommend to keep it visible, We only display for registered users)
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                         
                                </tab-content>
                                <tab-content title="Email Alerts"   icon="fas fa-envelope-open-text">
                                    <h2 class="tab-title m-0">{{ tabTitle }}</h2>
                                        <p class="text-muted text-center mb-4">simply2move, simple to use</p>
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 border mb-3 py-5 px-3">
                                            <div class="row">
                                                <div class="col-sm-4 text-center my-auto">
                                                    <span class="border py-2 px-4">Daily Email Alerts</span>
                                                </div>
                                                <div class="col-sm-7 my-auto">
                                                    <span>Daily summary emails for new matching advert</span>
                                                </div>
                                                <div class="col-sm-1">
                                                    <input v-model="landlordForm.email_alerts" name="email_alerts" class="form-check-input" type="radio" value="regular">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-10 theme-border mb-3 py-5 px-3">
                                            <div class="row">
                                                <div class="col-sm-4 text-center my-auto">
                                                    <p class="mb-2 theme-color">Only for Premium Members</p>
                                                    <span class="border py-2 px-4 theme-bg">Instant Email Alerts</span>
                                                </div>
                                                <div class="col-sm-7 my-auto">
                                                    <p class="theme-color mb-2 text-center">What is Included?</p>
                                                    <ul class="p-0">
                                                        <li>Instant emails new matching advert as soon as they posted on Simply2move</li>
                                                        <li>Up to 
                                                            <select name="" id="">
                                                                <option value="50">50</option>
                                                                <option value="50">100</option>
                                                            </select> emails per day.
                                                        </li>
                                                        <li>We double it up! Free Instant email alert for the Basic users from all Premium Adverts</li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-1 my-auto">
                                                    <input v-model="landlordForm.email_alerts" name="email_alerts" class="form-check-input" type="radio" value="premium">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tab-content>
                                 <tab-content title="Membership"   icon="fas fa-award">
                                    <h2 class="tab-title m-0">{{ tabTitle }}</h2>
                                    <p class="text-muted text-center mb-4">simply2move, simple to use</p>
                                    <div class="row px-4">
                                        <div class="col-md-2 border p-4  select-membership bg-free">
                                            <h4 class="mb-5 text-center">Basic Membership</h4>
                                            <h4 class="price text-center">FREE</h4>
                                            <p class="advert text-center">1 advert in a Package</p>
                                            <details>
                                            <summary>
                                                <h6>More Details</h6>
                                            </summary>
                                            <div class="details-content">
                                               <ul class="p-0">
                                                   <li>Basic advert with one photo</li>
                                                   <li>Basic advert with one photo</li>
                                                   <li>Basic advert with one photo</li>
                                               </ul>
                                            </div>
                                            </details>
                                             <input type="radio" class="btn-check" name="membership" id="free" value="free">
                                             <label class="btn btn-outline-secondary form-control mb-2" for="free">Select</label>
                                        </div>
                                        <div v-for="item in memberships" :key="item.id" class="col-md-2 border py-4  select-membership bg-fee text-center">
                                            <h4 class="mb-0 text-center text-uppercase">{{item.age}} {{ item.period}}</h4>
                                            <span class="mb-5 text-center text-uppercase access">Access</span>
                                            <p class="only mt-1 mb-0">only</p>
                                            <h4 class="price text-center mt-2 mb-0">£{{item.amount}}</h4>
                                            <p class="just mt-0 mb-2">Just £{{item.amount/item.age | decimalNumber}} a day!</p>
                                            <p class="advert text-center">{{item.number_of_adverts}} {{item.number_of_adverts == '1' ? 'advert' : 'adverts'}} in a Package</p>
                                            <details>
                                            <summary>
                                                <h6>More Details</h6>
                                            </summary>
                                            <div class="details-content">
                                               <ul class="p-0">
                                                   <li v-for="dd in item.details" :key="dd.id">{{ dd.item}}</li>
                                               </ul>
                                            </div>
                                            </details>
                                             <input type="radio" class="btn-check" name="membership" :id="item.id" :value="item.id">
                                             <label class="btn btn-outline-secondary form-control mb-2" :for="item.id">Select</label>
                                        </div>
                                    </div>
                                </tab-content>
                            </form-wizard>
                            <form-wizard v-show="forShare" @on-complete="onComplete" :title="null" :finishButtonText="'Submit'" :subtitle="null" shape="tab" color="#f6993f">
                                <tab-content title="About You"  icon="fas fa-user-edit">
                                        <h2 class="tab-title m-0">{{ tabTitle }}</h2>
                                        <p class="text-muted text-center mb-4">simply2move, simple to use</p>
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">I am a</label>
                                                <select v-model="form.langauge" class="custom-select mr-sm-2" name="" :class="{ 'is-invalid': form.errors.has('langauge') }">
                                                    <option selected value="landlord">Landlord</option>
                                                    <option value="current-tenant">Current Tenant</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">GENDER</label>
                                                <select v-model="form.gender" class="custom-select mr-sm-2" name="gender" v-on:change="ageSelect" :class="{ 'is-invalid': form.errors.has('gender') }">
                                                    <option selected disabled>I am</option>
                                                    <option value="female">Female</option>
                                                    <option value="male">Male</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">LANGUAGE</label>
                                                <select v-model="form.langauge" class="custom-select mr-sm-2" name="" :class="{ 'is-invalid': form.errors.has('langauge') }">
                                                    <option selected value="english">English</option>
                                                    <option value="eomance">Romance</option>
                                                    <option value="germanic">Germanic</option>
                                                    <option value="dutch">Dutch</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">AGE</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01">Me</label>
                                                    </div>
                                                    <input v-model="form.ageone" type="text" class="form-control" name="ageone" :class="{ 'is-invalid': form.errors.has('ageone') }">
                                                </div>
                                                  
                                                
                                            </div>
                                             <div class="form-group col-md-5">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">NATIONALITY</label>
                                                <select v-model="form.nationality" class="custom-select mr-sm-2" name="nationality" :class="{ 'is-invalid': form.errors.has('nationality') }">
                                                    <option selected>Not Disclosed</option>
                                                    <option value="british">British</option>
                                                    <option value="american">American</option>
                                                    <option value="german">German</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">OCCUPATION</label>
                                                <select v-model="form.occupation" class="custom-select mr-sm-2" :class="{ 'is-invalid': form.errors.has('occupation') }">
                                                    <option selected value="not-disclosed">Not Disclosed</option>
                                                    <option value="professional">Professional</option>
                                                    <option value="self-employed">Self Employed</option>
                                                    <option value="student">Student</option>
                                                    <option value="retired">Retired</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">INTERESTS / HOBBY</label>
                                                <input v-model="form.hobby" type="text" name="hobby" class="form-control" placeholder="What makes you happy?" :class="{ 'is-invalid': form.errors.has('hobby') }">
                                            </div>
                                            <div class="form-group col-md-10">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">ABOUT ME</label>
                                                <textarea name="" id="" class="form-control"  rows="5"></textarea>
                                            </div>
                                        </div>
                                </tab-content>
                                <tab-content title="New Property"   icon="fas fa-home">
                                    <h2 class="tab-title m-0">{{ tabTitle }}</h2>
                                    <p class="text-muted text-center mb-4">simply2move, simple to use</p>
                                    <div class="row justify-content-center">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">PRICE RANGE</label>
                                                <div class="d-flex">
                                                    <select v-model="form.price_min" name="price_min" class="custom-select mr-sm-2" >
                                                        <option selected disabled>MIN Price</option>
                                                        <option value="100">100</option>
                                                        <option value="150">150</option>
                                                        <option value="200">200</option>
                                                        <option value="250">250</option>
                                                        <option value="300">300</option>
                                                        <option value="350">350</option>
                                                        <option value="400">400</option>
                                                        <option value="450">450</option>
                                                        <option value="500">500</option>
                                                        <option value="600">600</option>
                                                        <option value="700">700</option>
                                                        <option value="800">800</option>
                                                        <option value="900">900</option>
                                                        <option value="1000">1000</option>
                                                        <option value="1100">1,100</option>
                                                        <option value="1200">1,200</option>
                                                        <option value="1300">1,300</option>
                                                        <option value="1400">1,400</option>
                                                        <option value="1500">1,500</option>
                                                        <option value="1600">1,600</option>
                                                        <option value="1700">1,700</option>
                                                        <option value="1800">1,800</option>
                                                        <option value="1900">1,900</option>
                                                        <option value="2000">2,000</option>
                                                        <option value="2250">2,250</option>
                                                        <option value="2500">2,500</option>
                                                        <option value="2750">2,750</option>
                                                        <option value="3000">3,000</option>
                                                        <option value="3250">3,250</option>
                                                        <option value="3500">3,500</option>
                                                        <option value="3750">3,750</option>
                                                        <option value="4000">4,000</option>
                                                        <option value="4500">4,500</option>
                                                        <option value="5000">5,000</option>
                                                        <option value="5500">5,500</option>
                                                        <option value="6000">6,000</option>
                                                    </select>
                                                    <span class="spacer">-</span>
                                                    <select v-model="form.price_max" name="price_max" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                        <option selected disabled>MAX Price</option>
                                                        <option value="100">100</option>
                                                        <option value="150">150</option>
                                                        <option value="200">200</option>
                                                        <option value="250">250</option>
                                                        <option value="300">300</option>
                                                        <option value="350">350</option>
                                                        <option value="400">400</option>
                                                        <option value="450">450</option>
                                                        <option value="500">500</option>
                                                        <option value="600">600</option>
                                                        <option value="700">700</option>
                                                        <option value="800">800</option>
                                                        <option value="900">900</option>
                                                        <option value="1000">1000</option>
                                                        <option value="1100">1,100</option>
                                                        <option value="1200">1,200</option>
                                                        <option value="1300">1,300</option>
                                                        <option value="1400">1,400</option>
                                                        <option value="1500">1,500</option>
                                                        <option value="1600">1,600</option>
                                                        <option value="1700">1,700</option>
                                                        <option value="1800">1,800</option>
                                                        <option value="1900">1,900</option>
                                                        <option value="2000">2,000</option>
                                                        <option value="2250">2,250</option>
                                                        <option value="2500">2,500</option>
                                                        <option value="2750">2,750</option>
                                                        <option value="3000">3,000</option>
                                                        <option value="3250">3,250</option>
                                                        <option value="3500">3,500</option>
                                                        <option value="3750">3,750</option>
                                                        <option value="4000">4,000</option>
                                                        <option value="4500">4,500</option>
                                                        <option value="5000">5,000</option>
                                                        <option value="5500">5,500</option>
                                                        <option value="6000">6,000</option>
                                                    </select>
                                                    <select v-model="form.price_due" name="price_due" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                        <option value="permonth" selected>Per Month</option>
                                                        <option value="peryear">Per Year</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">DEPOSIT</label>
                                                <select v-model="form.deposit" name="deposit" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                    <option selected>Not Important</option>
                                                    <option value="max-one-week">Max 1 week rent</option>
                                                    <option value="max-two-week">Max 2 week rent</option>
                                                    <option value="max-three-week">Max 3 week rent</option>
                                                    <option value="max-four-week">Max 4 week rent</option>
                                                    <option value="max-five-week">Max 5 week rent</option>
                                                    <option value="max-six-week">Max 6 week rent</option>
                                                    <option value="max-seven-week">Max 7 week rent</option>
                                                    <option value="max-eight-week">Max 8 week rent</option>
                                                    <option value="max-nine-week">Max 9 week rent</option>
                                                    <option value="max-ten-week">Max 10 week rent</option>
                                                    <option value="max-eleven-week">Max 11 week rent</option>
                                                    <option value="max-one-year">1 year</option>
                                                    <option value="max-more-one-year">More that 1 year</option>
                                                    <option value="max-two-years">2 years</option>
                                                    <option value="max-more-two-years">More that 2 years</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">PROPERTY TYPE</label>
                                                <select v-model="form.property_type" name="property_type" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                    <option selected disabled>Select Type</option>
                                                    <option value="not-important">Not Important</option>
                                                    <option value="detached">Detached</option>
                                                    <option value="semi-detached">Semi-detached</option>
                                                    <option value="terraced">Terraced</option>
                                                    <option value="bungalow">Bungalow</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">BEDROOMS</label>
                                                <div class="d-flex">
                                                    <select v-model="form.bed_min" name="bed_min" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                        <option selected disabled>Min</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="10+">More than 10</option>
                                                    </select>
                                                    <span class="spacer">-</span>
                                                    <select v-model="form.bed_max" name="bed_max" class="custom-select mr-sm-2">
                                                        <option selected disabled>Max</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="10+">More than 10</option>
                                                    </select>
                                                </div>
                                                <p class="text-muted px11">How many bedroom house do you looking for?</p>
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">BATHROOMS</label>
                                                <div class="d-flex">
                                                    <select v-model="form.bath_min" name="bath_min"  class="custom-select mr-sm-2">
                                                        <option selected disabled>Min</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="10+">More than 10</option>
                                                    </select>
                                                    <span class="spacer">-</span>
                                                    <select v-model="form.bath_max" name="bath_max" class="custom-select mr-sm-2">
                                                        <option selected disabled>Max</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="10+">More than 10</option>
                                                    </select>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="form-check mr-sm-2">
                                                        <input v-model="form.bath_toilet" name="bath_toilet" class="form-check-input" type="checkbox" value="1">
                                                        <label class="form-check-label text-muted px11" for="flexCheckDefault">
                                                            Separate Toilet
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input v-model="form.bath_private" name="bath_max" class="form-check-input" type="checkbox" value="1">
                                                        <label class="form-check-label text-muted px11" for="flexCheckDefault">
                                                            Private Bathroom
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label class="mr-sm-2 px16" for="inlineFormCustomSelect">Where you want to live?</label>
                                                <div class="input-group mb-3">
                                                     <gmap-autocomplete class="form-control" @place_changed="initMarker"></gmap-autocomplete>
                                                    <button class="btn btn-outline-secondary" @click="addLocationMarker" type="button">Search</button>
                                                </div>
                                                <gmap-map
                                                    :zoom="11"    
                                                    :center="center"
                                                    style="width:100%;  height: 300px;"
                                                >
                                                <gmap-marker
                                                    :key="index"
                                                    :draggable="true"
                                                    v-for="(m, index) in locationMarkers"
                                                    :position="m.position"
                                                    :clickable="true"
                                                    @drag="updateCoordinates"
                                                    @click="center=m.position"
                                                ></gmap-marker>
                                                </gmap-map>
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">COORDINATES</label>
                                                <div class="d-flex">
                                                    <input v-model="form.latitude" type="text" name="latitude" class="form-control mr-2" placeholder="Latitude" >
                                                    <input v-model="form.longtitude" type="text" name="longtitude" class="form-control" placeholder="Longtitude" >
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">FURNISHING</label>
                                                <div class="row radio-buttons">
                                                    <div class="col-sm-3">
                                                        <input  type="radio" class="btn-check" name="furnishing" id="share-furnished" value="furnished">
                                                        <label class="btn btn-outline-secondary form-control mb-2" for="share-furnished">Furnished</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="radio" class="btn-check" name="furnishing" id="share-part-furnished" value="part-furnished">
                                                        <label class="btn btn-outline-secondary form-control mb-2" for="share-part-furnished">Part - Furnished</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input  type="radio" class="btn-check" name="furnishing" id="share-un-furnished" value="un-furnished">
                                                        <label class="btn btn-outline-secondary form-control mb-2" for="share-un-furnished">Unfurnished</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">MISCELLANEOUS</label>
                                                <div class="row radio-buttons">
                                                    <div class="col-sm-3">
                                                        <input type="checkbox" class="btn-check" name="miscellaneous" id="share-smoking-allowed" value="Smoking Allowed">
                                                        <label class="btn btn-outline-secondary form-control mb-2" for="share-smoking-allowed">Smoking Allowed</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="checkbox" class="btn-check" name="miscellaneous" id="share-pet-allowed" value="Pet Allowed">
                                                        <label class="btn btn-outline-secondary form-control mb-2" for="share-pet-allowed">Pet Allowed</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">PROPERTY FEATURES</label>
                                                <div class="row radio-buttons">
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="balcony-terrace" value="Balcony / Terrace">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="balcony-terrace">Balcony / Terrace</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="swimming-pool" value="Swimming Pool">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="swimming-pool">Swimming Pool</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="security" value="Concierge / Security">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="security">Concierge / Security</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="aircon" value="Air Conditioning">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="aircon">Air Conditioning</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="dishwasher" value="Dishwasher">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="dishwasher">Dishwasher</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="alarm" value="Alarm System">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="alarm">Alarm System</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="wooden" value="Wooden Floors">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="wooden">Wooden Floors</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="garden" value="Garden">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="garden">Garden</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="carpark" value="Car Park / Garage">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="carpark">Car Park / Garage</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="oven" value="Oven">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="oven">Oven</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="bathtub" value="Bathtub">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="bathtub">Bathtub</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="ensuite" value="Ensuite Room">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="ensuite">Ensuite Room</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="gym" value="Gym">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="gym">Gym</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="refurbished" value="Newly Refurbished">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="refurbished">Newly Refurbished</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="quite" value="Quite Street">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="quite">Quite Street</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="patio" value="Patio">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="patio">Patio</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="glazed" value="Double Glazed Windows">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="glazed">Double Glazed Windows</label>
                                                    </div>
                                                    <div class="col-sm-2 px-1">
                                                        <input v-model="form.property_features" type="checkbox" class="btn-check" name="property-features" id="disabled" value="Disabled Access">
                                                        <label class="btn btn-outline-secondary form-control mb-2 sm-pad" for="disabled">Disabled Access</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tab-content>
                                <tab-content title="Advert Details"   icon="fab fa-adversal">
                                    <h2 class="tab-title m-0">{{ tabTitle }}</h2>
                                        <p class="text-muted text-center mb-4">simply2move, simple to use</p>
                                    <div class="row px-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">AD TITLE</label>
                                                <p class="text-muted px11 mb-0">Please do not add your contact details to your AD title</p>
                                                <input v-model="form.ad_title" name="ad_title" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">AD DESCRIPTION</label>
                                                <p class="text-muted px11 mb-0">Please do not add your contact details to your AD description</p>
                                                <textarea v-model="form.ad_desc" name="ad_desc" type="text" class="form-control" rows="10" placeholder="To help improve your AD, Introduce yourself to the advertiser. Talk about what is your profession, what you like, why you will be a good tenant?"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">NAME</label>
                                            <div class="d-flex">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" style="height: min-content;" for="inputGroupSelect01">First Name</label>
                                                    </div>
                                                    <input v-model="form.ad_firstname" name="ad_firstname" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text"  for="inputGroupSelect01">Last Name</label>
                                                    </div>
                                                    <input v-model="form.ad_lastname" name="ad_lastname" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                                    <div class="form-check mr-sm-2 float-right">
                                                        <input v-model="form.ad_display" name="ad_display" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                        <label class="form-check-label text-muted px11" for="flexCheckDefault">
                                                            Display last name on your advert?
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">Email</label>
                                                <input v-model="form.ad_email" name="ad_email" type="email" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">PHONE</label>
                                                <input v-model="form.ad_phone" name="ad_phone" type="email" class="form-control">
                                                <div class="form-check mr-sm-2">
                                                    <input v-model="form.ad_hide_phone" name="ad_hide_phone" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label text-muted px11" for="flexCheckDefault">
                                                       Hide my phone number in my AD (We recommend to keep it visible, We only display for registered users)
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                         
                                </tab-content>
                                <tab-content title="Email Alerts"   icon="fas fa-envelope-open-text">
                                    <h2 class="tab-title m-0">{{ tabTitle }}</h2>
                                        <p class="text-muted text-center mb-4">simply2move, simple to use</p>
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 border mb-3 py-5 px-3">
                                            <div class="row">
                                                <div class="col-sm-4 text-center my-auto">
                                                    <span class="border py-2 px-4">Daily Email Alerts</span>
                                                </div>
                                                <div class="col-sm-7 my-auto">
                                                    <span>Daily summary emails for new matching advert</span>
                                                </div>
                                                <div class="col-sm-1">
                                                    <input v-model="form.email_alerts" name="email_alerts" class="form-check-input" type="radio" value="regular">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-10 theme-border mb-3 py-5 px-3">
                                            <div class="row">
                                                <div class="col-sm-4 text-center my-auto">
                                                    <p class="mb-2 theme-color">Only for Premium Members</p>
                                                    <span class="border py-2 px-4 theme-bg">Instant Email Alerts</span>
                                                </div>
                                                <div class="col-sm-7 my-auto">
                                                    <p class="theme-color mb-2 text-center">What is Included?</p>
                                                    <ul class="p-0">
                                                        <li>Instant emails new matching advert as soon as they posted on Simply2move</li>
                                                        <li>Up to 
                                                            <select name="" id="">
                                                                <option value="50">50</option>
                                                                <option value="50">100</option>
                                                            </select> emails per day.
                                                        </li>
                                                        <li>We double it up! Free Instant email alert for the Basic users from all Premium Adverts</li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-1 my-auto">
                                                    <input v-model="form.email_alerts" name="email_alerts" class="form-check-input" type="radio" value="premium">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tab-content>
                                <tab-content title="Membership"   icon="fas fa-award">
                                    <h2 class="tab-title m-0">{{ tabTitle }}</h2>
                                    <p class="text-muted text-center mb-4">simply2move, simple to use</p>
                                    <div class="row px-4">
                                        <div class="col-md-2 border p-4  select-membership bg-free">
                                            <h4 class="mb-5 text-center">Basic Membership</h4>
                                            <h4 class="price text-center">FREE</h4>
                                            <p class="advert text-center">1 advert in a Package</p>
                                            <details>
                                            <summary>
                                                <h6>More Details</h6>
                                            </summary>
                                            <div class="details-content">
                                               <ul class="p-0">
                                                   <li>Basic advert with one photo</li>
                                                   <li>Basic advert with one photo</li>
                                                   <li>Basic advert with one photo</li>
                                               </ul>
                                            </div>
                                            </details>
                                             <input type="radio" class="btn-check" name="membership" id="free" value="free">
                                             <label class="btn btn-outline-secondary form-control mb-2" for="free">Select</label>
                                        </div>
                                        <div v-for="item in memberships" :key="item.id" class="col-md-2 border py-4  select-membership bg-fee text-center">
                                            <h4 class="mb-0 text-center text-uppercase">{{item.age}} {{ item.period}}</h4>
                                            <span class="mb-5 text-center text-uppercase access">Access</span>
                                            <p class="only mt-1 mb-0">only</p>
                                            <h4 class="price text-center mt-2 mb-0">£{{item.amount}}</h4>
                                            <p class="just mt-0 mb-2">Just £{{item.amount/item.age | decimalNumber}} a day!</p>
                                            <p class="advert text-center">{{item.number_of_adverts}} {{item.number_of_adverts == '1' ? 'advert' : 'adverts'}} in a Package</p>
                                            <details>
                                            <summary>
                                                <h6>More Details</h6>
                                            </summary>
                                            <div class="details-content">
                                               <ul class="p-0">
                                                   <li v-for="dd in item.details" :key="dd.id">{{ dd.item}}</li>
                                               </ul>
                                            </div>
                                            </details>
                                             <input type="radio" class="btn-check" name="membership" :id="item.id" :value="item.id">
                                             <label class="btn btn-outline-secondary form-control mb-2" :for="item.id">Select</label>
                                        </div>
                                    </div>
                                </tab-content>
                            </form-wizard>
                    </div>
                </div>
            </div>
             <div class="modal fade" id="modal-prompt" aria-modal="true" role="dialog" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog modal-md card-info">
                    <div class="modal-content">
                            <div class="modal-body">
                                 <form-wizard @on-complete="onComplete" :title="null" :subtitle="null" :color="'#f6993f'">
                                    <tab-content title="Advert" icon="bx bxs-user-voice" :before-change="validateStat">
                                         <h2 class="prop-title">{{title}}</h2>
                                        <div class="row px-5">
                                           
                                            <input v-model="step1" type="radio" class="btn-check" name="step1" id="rent" value="rent">
                                            <label class="btn btn-outline-secondary form-control mb-2" for="rent">I would like to rent</label>

                                            <input v-model="step1" type="radio" class="btn-check" name="step1" id="property" value="property">
                                            <label class="btn btn-outline-secondary form-control mb-2" for="property">I have a property to rent</label><br>

                                            <input v-model="step1" type="radio" class="btn-check" name="step1" id="share" value="share">
                                            <label class="btn btn-outline-secondary form-control mb-2" for="share">I share my room</label><br>
                                        </div>
                                    </tab-content>
                                    <tab-content title="Property" icon="bx bx-building-house">
                                         <h2 class="prop-title">{{title}}</h2>
                                        <div v-if="rentShow" class="row px-5">
                                            <input v-model="step2" type="radio" class="btn-check" name="step1" id="like-room-rent" value="I would like to rent a Room">
                                            <label class="btn btn-outline-secondary form-control" for="like-room-rent">I would like to rent a Room</label>

                                            <input v-model="step2" type="radio" class="btn-check" name="step1" id="like-house-rent" value="I would like to rent a House">
                                            <label class="btn btn-outline-secondary form-control" for="like-house-rent">I would like to rent a House</label><br>

                                            <input v-model="step2" type="radio" class="btn-check" name="step1" id="like-flat-rent" value="I would like to rent a Flat">
                                            <label class="btn btn-outline-secondary form-control" for="like-flat-rent">I would like to rent a Flat</label><br>
                                        </div>

                                        <div v-if="propertyShow" class="row px-5">
                                            <input v-model="step2" type="radio" class="btn-check" name="step1" id="have-room-rent" value="I have a room to rent">
                                            <label class="btn btn-outline-secondary form-control" for="have-room-rent">I have a room to rent</label>

                                            <input v-model="step2" type="radio" class="btn-check" name="step1" id="have-house-rent" value="I have a house to rent">
                                            <label class="btn btn-outline-secondary form-control" for="have-house-rent">I have a house to rent</label><br>

                                            <input v-model="step2" type="radio" class="btn-check" name="step1" id="have-flat-rent" value="I have a flat to rent">
                                            <label class="btn btn-outline-secondary form-control" for="have-flat-rent">I have a flat to rent</label><br>
                                        </div>

                                        <div v-if="shareShow" class="row px-5">
                                            <input v-model="step2" type="radio" class="btn-check" name="step1" id="have-room-share" value="I have a room to share">
                                            <label class="btn btn-outline-secondary form-control" for="have-room-share">I have a room to share</label>

                                            <input v-model="step2" type="radio" class="btn-check" name="step1" id="have-room-let" value="I have a room to let">
                                            <label class="btn btn-outline-secondary form-control" for="have-room-let">I have a room to let</label><br>
                                        </div>
                                    </tab-content>
                                </form-wizard>
                            </div>
                    </div>
                </div>
            </div>
        </section>
         
</template>

<script>
import {FormWizard, TabContent} from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
import UploadImages from "vue-upload-drop-images"
import Datepicker from 'vuejs-datepicker';
    export default {

        components: {
        FormWizard,
        TabContent,
        Datepicker,
        UploadImages
        },
        data () {
            return{
                title:'What would you like to advertise?',
                step1:null,
                step2:null,
                couple:false,
                tabTitle:'',
                forRent:true,
                forProperty:false,
                forShare:false,
                propertyShow:false,
                forLandlord:true,
                authUser: window.user,
                rentShow:false,
                shareShow:false,
                longtitude:'',
                latitude:'',
                center: { 
                    lat: 39.7837304,
                    lng: -100.4458825
                },
                locationMarkers: [],
                locPlaces: [],
                memberships:{},
                existingPlace: null,
                form: new Form({
                    gender:'',
                    ageone:'',
                    agetwo:'',
                    occupation:'not-disclosed',
                    staymin:'no-min',
                    staymax:'no-max',
                    langauge:'english',
                    nationality:'not-disclosed',
                    hobby:'',
                    movingdate:'',

                    price_min:'',
                    price_max:'',
                    price_due:'permonth',
                    deposit:'',
                    property_type:'',
                    bed_min:'',
                    bed_max:'',
                    bath_min:'',
                    bath_max:'',
                    bath_toilet:'',
                    bath_private:'',
                    furnishing:[],
                    misc:[],
                    property_features:[],
                    latitude:'',
                    longtitude:'',

                    ad_title:'',
                    ad_desc:'',
                    ad_firstname:'',
                    ad_lastname:'',
                    ad_display:'',
                    ad_email:'',
                    ad_phone:'',
                    ad_hide_phone:'',
                    email_alerts:[],
                    membership:'1',
                }),
                landlordForm: new Form({
                    typeOnwer:'liveinlandlord',
                    price:'',
                    duration:'permonth',
                    dss:'',
                    dss_due:'permonth',
                    deposit:'',
                    available_date:'',
                    staymin:'',
                    staymax:'',
                    property_type:'not-important',
                    occupancy:'1',
                    bedroom:'1',
                    bathroom:'1',
                    latitude:'',
                    longtitude:'',
                    bath_toilet:'',
                    furnishing:[],
                    utilities:[],
                    property_features:[],
                    misc:[],
                    images:{},
                    video_link:'',

                    ad_title:'',
                    ad_desc:'',
                    ad_firstname:'',
                    ad_lastname:'',
                    ad_display:'',
                    ad_email:'',
                    ad_phone:'',
                    ad_hide_phone:'',
                    email_alerts:[],
                    membership:'1',
                }),
            }
        },
        methods:{
             isNumber: function(evt) {
              evt = (evt) ? evt : window.event;
              var charCode = (evt.which) ? evt.which : evt.keyCode;
              if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                evt.preventDefault();;
                 Toast.fire({
                        icon:'warning',
                        type: 'warning',
                        title: 'Number Only.'
                        })
              } else {
                return true;
              }
            },
            handleImages(files){
                this.landlordForm.images = files
                console.log(files)
            },
            ageSelect(){
               var gender = this.form.gender
               if(gender == "male" || gender == "female"){
                   this.couple = false
               }else{
                    this.couple = true
               }
            },
            validateStat(){
                this.rentShow = false
                this.propertyShow = false
                this.shareShow = false
                this.title ='What would you like to advertise?'
                 if(this.step1 == "rent"){
                     this.title = 'What would you like to rent?'
                     this.rentShow = true
                     axios.get('/api/get-membership/tenant')
                        .then((data) => {
                        this.memberships = data.data
                        })
                        .finally(() => {
                    
                        });
                 }else if(this.step1 == "property"){
                     this.title = 'What property would you like to rent?'
                     this.propertyShow = true

                 }else if(this.step1 == "share"){
                     this.title = 'You have a room to share?'
                     this.shareShow = true
                 }else{
                     Toast.fire({
                        icon: 'warning',
                        title: 'Please select an option.'
                        })
                     return false;
                 }
                 return true;
            },
             initMarker(loc) {
            this.existingPlace = loc;
            },
            onCompleteTenant(){
                this.$Progress.start();
                this.form.post('/api/tenant-add')
                .then(()=>{
                    this.form.reset();
                    Toast.fire({
                        icon: 'success',
                        title: 'Add Added'
                        })
                    this.$Progress.finish();
                })
                .catch(()=>{
                    this.$Progress.fail();
                })
            },
            addLocationMarker() {
            if (this.existingPlace) {
                const marker = {
                lat: this.existingPlace.geometry.location.lat(),
                lng: this.existingPlace.geometry.location.lng()
                };
                this.locationMarkers.push({ position: marker });
                this.locPlaces.push(this.existingPlace);
                this.center = marker;
                this.existingPlace = null;
            }
            },
            locateGeoLocation: function() {
            navigator.geolocation.getCurrentPosition(res => {
         
                this.center = {
                lat: res.coords.latitude,
                lng: res.coords.longitude
                };
               
            });
            },
            updateCoordinates(location) {
                this.form.longtitude =  location.latLng.lat()
                this.form.latitude = location.latLng.lng()
        },
            onComplete(){
               
               if(this.step1 == "rent"){
                   this.forRent = true
                   this.forShare = false
                   this.forProperty = false
                   this.tabTitle = this.step2
                   $('#modal-prompt').modal('hide'); 
               }else if(this.step1 == "property"){
                   this.forRent = false
                   this.forShare = false
                   this.forProperty = true
                   this.tabTitle = this.step2
                   $('#modal-prompt').modal('hide'); 
                }else{
                   this.forRent = false
                   this.forShare = true
                   this.forProperty = false
                   this.tabTitle = this.step2
                   $('#modal-prompt').modal('hide'); 
               }

                // var user_id = Object.values(this.authUser)[0]
                //  axios.post('/api/initial-post-ad', {
                //     user_id: user_id,
                //     step_one: this.step1,
                //     step_two: this.step2,
                // })
                // .then(function (response) {
                //   $('#modal-prompt').modal('hide'); 
                //   Toast.fire({
                //     icon: 'success',
                //     title: 'Thank you!'
                //     })
                // })
            },
            onCompleteProperty(){
                this.$Progress.start();
                this.landlordForm.post('/api/land-add')
                .then(()=>{
                    // this.landlordForm.reset();
                    Toast.fire({
                        icon: 'success',
                        title: 'Add Added'
                        })
                    this.$Progress.finish();
                })
                .catch(()=>{
                    this.$Progress.fail();
                })
            },
            // loadSettings(){
          
            // },
        },
        created() {
        //    this.loadSettings();
  
        },
        mounted() {
             $('#modal-prompt').modal('show');
              this.locateGeoLocation();
              
        }
    }
</script>
