<fieldset>

    <!-----------------------------Education----------------------------------------------->


    <div class="goals education" data-goal="education">

        <h2 align="center" style="padding-bottom:1%; padding-top:1%">What is your dream for <span id="set5"></span> to pursue ?</h2>
        <div class="form-group" style="margin-left: 17%;">
            <div style="width:100%" class="" id="carrerselect">

                <label class="mylable-goal " data-filed='3'>

                    <img class="myimg funimg " id="doc-btn" src="images\DOCTOR.png" />
                    <p align="center" class="allimg">
                        <input type="radio" name="carrer" class="input-selector" onclick="selectCarrer(this.value)" value="doctor"> Doctor
                    </p>
                </label>


                <label class="mylable-goal " data-filed='3'>

                    <img class="myimg funimg " id="eng-btn" src="images\engeenering.png" />
                    <p align="center" class="allimg">
                        <input type="radio" name="carrer" class="input-selector" onclick="selectCarrer(this.value)" value="enginer"> Engineering
                    </p>
                </label>

                <label class="mylable " data-filed='3'>

                    <img class="myimg funimg " src="images\ARCHITECH.png" />
                    <p align="center" class="allimg">
                        <input type="radio" name="carrer" class="input-selector" onclick="selectCarrer(this.value)" value="arcitect"> Architect
                    </p>
                </label>

                <label class="mylable " data-filed='3'>

                    <img class="myimg funimg" src="images\MBA.png" />
                    <p align="center" class="allimg">
                        <input type="radio" name="carrer" class="input-selector" onclick="selectCarrer(this.value)" value="mba"> MBA
                    </p>
                </label>

                <label class="mylable" data-filed='3'>

                    <img class="myimg funimg" src="images\OTHER.png" />
                    <p align="center" class="allimg">
                        <input type="radio" name="carrer" class="input-selector three-btn" onclick="selectCarrer(this.value)" value="other"> Other
                    </p>
                </label>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12" style="display:none;" id="allfun">
                        <div style="display: block;">
                            <div class="col-6 ml-0 colleges" style="margin-top:20px;display: none;" id="doctor">
                                <div class="dropdown" style="display: block;margin-left:-11px;" id="mbbss">
                                    <label for="college" class="labs" name="college" style="font-weight: 500;font-size: large;" id="carrername"> Top MBBS College's Name</label>
                                    <select name="college" class="form-control three-btns input-selector" id="MBBSCOLLEGE" style="width: 70%;border:1px solid black;">
                                        <option value="">Select College Name's </option>
                                        <option value="manipal" id="manipal" data-fee="8900000">Kasturba medical college (Manipal)</option>
                                        <option value="noida" id="noida" data-fee="6875000">School Of Medical Science & Research (SMSR) Noida</option>
                                        <option value="bangalore" id="bangalore" data-fee="2500000">St. John’s Medical College Bangalore</option>
                                        <option value="boston" id="boston" data-fee="11000000">Harvard medical school, Boston, Massachusetts</option>
                                        <option value="kingdom" id="kingdom" data-fee="23000000">University of Oxford , United Kingdom</option>
                                        <option value="other" id="mbbsother">OTHER</option>
                                    </select>
                                    <div class="d-none box" id="othereduone">
                                        <label class="alllabel">Add College Name</label><br>
                                        <input type="text" class="form-control input-selector allinput" name="carrer" style="width:70%" placeholder="Add name">
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 colleges" style="margin-top:20px;display: none;" id="enginer">
                                <div class="dropdown" style="display: block;margin-left:-11px;">
                                    <label for="college" class="labs" style="font-weight: 500;font-size: large;" id="engcarrer">Top Engineering College's Name</label>
                                    <select name="college" class="form-control three-btns input-selector" id="ENGCOLLEGE" style="width: 70%;border:1px solid black;">
                                        <option value="">Select College Name's </option>
                                        <option value="madras" id="madras" data-fee="850000">Indian Institute of Technology, Madras</option>
                                        <option value="mba" id="kanpur" data-fee="1000000">Indian Institute of Technology, Kanpur</option>
                                        <option value="architect" id="pilani" data-fee="2000000">BITS Pilani</option>
                                        <option value="engineer" id="cambridge" data-fee="23200000">Massachusetts Institute of technology,Cambridge USA</option>
                                        <option value="us" id="stanford" data-fee="17200000">Stanford university, US</option>
                                        <option value="other" id="engother">OTHER</option>
                                    </select>
                                    <div class="d-none box" id="otheredutwo">
                                        <label class="alllabel">Add College Name</label><br>
                                        <input type="text" class="form-control input-selector allinput" name="carrer" style="width:70%" placeholder="Add name">
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 colleges" style="margin-top:20px;display: none;" id="arcitect">
                                <div class="dropdown" style="display: block;margin-left:-11px;">
                                    <label for="college" class="labs" style="font-weight: 500;font-size: large;" id="arccarrer">Top Architect College's Name</label>
                                    <select name="college" class="form-control three-btns input-selector" id="ARCHITECTCOLLEGE" style="width: 70%;border:1px solid black;">
                                        <option value="">Select College Name's </option>
                                        <option value="mumbai" id="mumbai" data-fee="1100000">Amity university Mumbai</option>
                                        <option value="mba" id="iit" data-fee="1000000">IIT Roorkee</option>
                                        <option value="architect" id="maniuni" data-fee="1945000">Manipal university</option>
                                        <option value="engineer" id="nit" data-fee="800000">NIT, Trichy </option>
                                        <option value="mit" id="massachusetts" data-fee="1630000000">Massachusetts Institute of Technology (MIT),Cambridge USA</option>
                                        <option value="other" id="archiother">OTHER</option>
                                    </select>
                                    <div class="d-none box" id="othereduthree">
                                        <label class="alllabel">Add College Name</label><br>
                                        <input type="text" class="form-control input-selector allinput" name="carrer" style="width:70%" placeholder="Add name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 colleges" style="margin-top:20px;display: none;" id="mba">
                                <div class="dropdown" style="display: block;margin-left:-11px;">
                                    <label for="college" class="labs" style="font-weight: 500;font-size: large;" id="mbacarrer"> Top MBA College's Name</label>
                                    <select name="college" class="form-control three-btns input-selector" id="MBACOLLEGE" style="width: 70%;border:1px solid black;">
                                        <option value="">Select College Name's </option>
                                        <option value="bangalore" id="iim" data-fee="2400000">IIM Bangalore</option>
                                        <option value="mba" id="pune" data-fee="2500000">Symbiosis Institute of Business Management, Pune</option>
                                        <option value="architect" id="monjee" data-fee="2500000">NMIMS (Narsee Monjee)</option>
                                        <option value="engineer" id="harvad" data-fee="11000000">Harvard Business School, USA</option>
                                        <option value="lbs" id="london" data-fee="13000000">London Business School</option>
                                        <option value="other" id="mbaother">OTHER</option>

                                    </select>
                                    <div class="d-none box" id="otheredufour">
                                        <label class="alllabel">Add College Name</label><br>
                                        <input type="text" class="form-control input-selector allinput" name="carrer" style="width:70%" placeholder="Add name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 colleges" style="margin-top:20px;display: none;margin-left: -13px;" id="other">
                                <div class="form-group" style="display: block;">
                                    <label style="font-weight: 500;font-size: large;">Your Choice of College</label>
                                    <input type="text" style="width:73%;border:1px solid black" name="carrer" class="form-control input-selector calculatehouse borderhigh s1" placeholder="Type College Name">
                                    <label style="font-weight: 500;font-size: large;">Course Name</label><br>
                                    <input type="text" style="width:73%;border:1px solid black" class="form-control input-selector calculatehouse borderhigh s1" placeholder="Add Course Name">
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-7 col-md-7 col-sm-10">
                                    <div class="form-group row ml-3">
                                        <label style="font-weight: 500;font-size: large;">Current cost of Higher Education(approx.)</label>
                                        <input type="text" style="width:60%;border:1px solid black;" class="form-control input-selector calculatehouse borderhigh s1" name="currentcost" id="current" oninput="educationone()" value="0">
                                    </div>
                                    <div class="form-group row ml-3">
                                        <label style="font-weight: 500;font-size: large;">Expected Rate of Inflation</label>
                                        <input type="text" style="width:60%;border:1px solid black;" class="form-control input-selector calculatehouse borderhigh" name="inflation" id="infla" oninput="educationone()" value="7">
                                    </div><br>

                                </div>

                                <div class="col-5 col-md-5 col-sm-12" style="border:1px solid gray;border-radius:20px;background-color:white;bottom:45px; color:black;position:relative;"><br>
                                    <input type="text" style="width:80%;margin-left:20px;" class="form-control input-selector borderhigh d-none" name="ansinputs" id="set6" readonly><br>
                                    <p style="font-size: 19px;font-weight: 500;font-family: auto;margin-left: 15px;margin-top:-8px;">Provide your children the best education and as per your inputs, you will
                                        need a sum of <span id="set0" style="color: red;font-weight: 700;font-size: 22px;"></span> after
                                        <span id="set11" style="color: green;font-weight: 700;font-size: 21px;"></span> years when the expected rate of inflation is
                                        <span id="edu-infla" style="color: green;font-weight: 700;font-size: 21px;"></span>% p.a.
                                    </p>
                                    <input type="text" style="width:80%;margin-left:20px;" class="form-control input-selector borderhigh d-none" name="sipvalue" id="nish" readonly><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        <div class="container" id="secondedu" style="display:none">
            <div class="" style="display: block;">

                <h2 align="center" style="padding-bottom:1%; padding-top:1%">What is your dream for <span id="set9"></span> to pursue ?</h2>
                <div class="form-group" style="margin-left: 14%;">
                    <div style="width:100%" class="">
                        <label class="mylable alllabel" data-filed='3'>

                            <img class="myimg funimg allimg" src="images\DOCTOR.png" />

                            <p align="center">
                                <input type="radio" name="carrertwo" style="font-weight: 700;font-size: 17px;" class="input-selector" onclick="select2Carrer(this.value)" value="doctor"> Doctor
                            </p>
                        </label>

                        <label class="mylable alllabel" data-filed='3'>

                            <img class="myimg funimg allimg" src="images\engeenering.png" />

                            <p align="center">
                                <input type="radio" name="carrertwo" style="font-weight: 700;font-size: 17px;" class="input-selector" onclick="select2Carrer(this.value)" value="enginer"> Engineering
                            </p>
                        </label>

                        <label class="mylable alllabel" data-filed='3'>

                            <img class="myimg funimg allimg" src="images\ARCHITECH.png" />

                            <p align="center">
                                <input type="radio" name="carrertwo" style="font-weight: 700;font-size: 17px;" class="input-selector" onclick="select2Carrer(this.value)" value="architect"> Architect
                            </p>
                        </label>

                        <label class="mylable alllabel" data-filed='3'>

                            <img class="myimg funimg allimg" src="images/MBA.png" />

                            <p align="center">
                                <input type="radio" name="carrertwo" style="font-weight: 700;font-size: 17px;" class="input-selector" onclick="select2Carrer(this.value)" value="mba"> MBA
                            </p>
                        </label>

                        <label class="mylable alllabel" data-filed='3'>

                            <img class="myimg funimg allimg" src="images\OTHER.png" />

                            <p align="center">
                                <input type="radio" name="carrertwo" style="font-weight: 700;font-size: 17px;" class="input-selector" onclick="select2Carrer(this.value)" value="other"> Other
                            </p>
                        </label>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12" style="display:none;" id="sallfun">
                        <div style="display: block;">
                            <div class="col-6 collegfortwo" style="margin-top:20px;display: none;" id="sdoctor">
                                <div class="dropdown" style="display: block;margin-left:-11px;margin-bottom:-16px;" id="mbbss">
                                    <label for="college" class="labels" style="font-weight: 500;font-size: large;"> Top MBBS College's Name</label>
                                    <select name="college" class="form-control input-selector allinput" id="sMBBSCOLLEGE" style="width: 70%;">
                                        <option value="" class="allinput">Select College Name's </option>
                                        <option value="manipal" id="manipal" data-fee="8900000">Kasturba medical college (Manipal)</option>
                                        <option value="noida" id="noida" data-fee="6875000">School Of Medical Science & Research (SMSR) Noida</option>
                                        <option value="bangalore" id="bangalore" data-fee="2500000">St. John’s Medical College Bangalore</option>
                                        <option value="boston" id="boston" data-fee="11000000">Harvard medical school, Boston, Massachusetts</option>
                                        <option value="kingdom" id="kingdom" data-fee="23000000">University of Oxford , United Kingdom</option>
                                        <option value="twoothers" id="smbbsother">OTHER</option>
                                    </select>
                                    <div class="d-none boxes" id="sothereduone">
                                        <label>Add College Name</label><br>
                                        <input type="text" class="form-control input-selector" style="width:60%" placeholder="add name">
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="col-6 collegfortwo" style="margin-top:20px;display: none;" id="senginer">
                                <div class="dropdown" style="display: block;margin-bottom:-44px;margin-left:-11px;margin-top:30px;">
                                    <label for="college" class="labels" style="font-weight: 500;font-size: large;">Top Engineering College's Name</label>
                                    <select name="college" class="form-control input-selector allinput" id="sENGCOLLEGE" style="width: 70%;">
                                        <option value="">Select College Name's </option>
                                        <option value="madras" id="madras" data-fee="850000">Indian Institute of Technology, Madras</option>
                                        <option value="kanpur" id="kanpur" data-fee="1000000">Indian Institute of Technology, Kanpur</option>
                                        <option value="pilani" id="pilani" data-fee="2000000">BITS Pilani</option>
                                        <option value="mit" id="cambridge" data-fee="23200000">Massachusetts Institute of technology,Cambridge USA</option>
                                        <option value="us" id="stanford" data-fee="17200000">Stanford university, US</option>
                                        <option value="twoothers" id="sengother">OTHER</option>
                                    </select><br>
                                    <div class="d-none boxes" id="sotheredutwo">

                                        <label>Add College Name</label><br>
                                        <input type="text" class="form-control input-selector" style="width:60%" placeholder="add name">


                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="col-6 collegfortwo" style="margin-top:20px;display: none;" id="sarchitect">
                                <div class="dropdown" style="display: block;margin-left:-11px;margin-bottom:-44px;">
                                    <label for="college" class="labels" style="font-weight: 500;font-size: large;">Top Architect College's Name</label>
                                    <select name="college" class="form-control input-selector allinput" id="sARCHITECTCOLLEGE" style="width: 70%;">
                                        <option value="">Select College Name's </option>
                                        <option value="mumbai" id="mumbai" data-fee="1100000">Amity university Mumbai</option>
                                        <option value="iit" id="iit" data-fee="1000000">IIT Roorkee</option>
                                        <option value="mainpal" id="manipal" data-fee="1945000">Manipal university</option>
                                        <option value="nit" id="nit" data-fee="800000">NIT, Trichy </option>
                                        <option value="mit" id="massachusetts" data-fee="1630000000">Massachusetts Institute of Technology (MIT),Cambridge USA</option>
                                        <option value="twoothers" id="sarchiother">OTHER</option>
                                    </select><br>
                                    <div class="d-none boxes" id="sothereduthree">
                                        <label>Add College Name</label><br>
                                        <input type="text" class="form-control input-selector" style="width:60%" placeholder="add name">
                                        <!-- <label>Insert Course Name</label><br> -->
                                        <!-- <input type="text" class="form-control input-selector" style="width:60%" placeholder="course name"> -->
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="col-6 collegfortwo" style="margin-top:20px;display: none;" id="smba">
                                <div class="dropdown" style="display: block;margin-bottom:-44px;margin-left:-11px;">
                                    <label for="college" class="labels" style="font-weight: 500;font-size: large;"> Top MBA College's Name</label>
                                    <select name="college" class="form-control input-selector allinput" id="sMBACOLLEGE" style="width:70%;">
                                        <option value="">Select College Name's </option>
                                        <option value="bangalore" id="iim" data-fee="2400000">IIM Bangalore</option>
                                        <option value="pune" id="pune" data-fee="2500000">Symbiosis Institute of Business Management, Pune</option>
                                        <option value="nmims" id="monjee" data-fee="2500000">NMIMS (Narsee Monjee)</option>
                                        <option value="usa" id="harvad" data-fee="11000000">Harvard Business School, USA</option>
                                        <option value="london" id="london" data-fee="13000000">London Business School</option>
                                        <option value="twoothers" id="smbaother">OTHER</option>

                                    </select><br>
                                    <div class="d-none boxes" id="sotheredufour">
                                        <label>Add College Name</label><br>
                                        <input type="text" class="form-control input-selector" style="width:60%" placeholder="add name">
                                    </div>

                                </div>
                                <br>
                            </div>
                            <div class="col-6 collegfortwo" style="margin-top:20px;display: none;" id="sother">
                                <div class="form-group" style="display: block;margin-left:-11px;">
                                    <label style="font-weight: 500;font-size: large;">Your Choice of College</label>
                                    <input type="text" style="width:70%;border:1px solid black" class="form-control input-selector calculatehouse borderhigh s1" placeholder="Type College Name">
                                    <label style="font-weight: 500;font-size: large;margin-left:11px;">Course Name</label><br>
                                    <input type="text" style="width:70%;border:1px solid black;margin-left:-2px;" class="form-control input-selector calculatehouse borderhigh s1" placeholder="Add Course Name">
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-7">

                                    <div class="form-group row">
                                        <label class="alllabel">Current cost of Higher Education(approx.)</label>
                                        <input type="text" style="width:60%;" class="form-control allinput input-selector calculatehouse borderhigh s1" name="secondcurrentcost" id="scurrent" oninput="seducation()" value="0">
                                        <!-- <label id="demo"></label> -->
                                    </div>
                                    <div class="form-group row">
                                        <label class="alllabel">Expected Rate of Inflation</label>
                                        <input type="text" style="width:60%;" class="form-control allinput input-selector calculatehouse borderhigh" name="secondinflation" id="sinfla" oninput="seducation()" value="7">
                                    </div>

                                </div>
                                <div class="col-5">
                                    <div class="form-group row">
                                        <label class="alllabel">Future Cost of Higher Education</label>
                                        <input type="text" style="width:80%;" class="form-control allinput input-selector borderhigh" name="secondchildfuturevalue" id="set1" readonly>
                                        <input type="text" style="width:80%;" class="form-control allinput input-selector borderhigh" name="secondchildSIP" id="sipsecond" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-----------------------------House----------------------------------------------->


    <div class="goals house" data-goal="house"><br>
        <h2 align="center" style="padding-bottom:1%; padding-top:1%"> House Detail</h2>
        <div class="row">
            <div class="col-sm-10 col-md-7">

                <div class="form-group ">
                    <label for="lName" style="font-weight:600;" class="col-12 alllabel">Current Cost of House in City (approx.)</label><br>
                    <input type="text" style="width:60%;" class="form-control mb-3 allinput input-selector calculatehouse borderhigh p-1 mb-2 three-btns" name="currentcost" id="currentcost" onchange="housecal()" value="0">
                </div>

                <div class="form-group ">
                    <label for="lName" style="font-weight:600;" class="alllabel">In What Time you want to own your House(In Years)</label><br>
                    <input type="text" style="width:60%;" class="form-control mb-3 allinput input-selector calculatehouse borderhigh p-1 mb-2" name="futureage" id="timehorizon" onchange="housecal()" oninput="IsEmpty()" placeholder="Enter Year">
                </div>
                <div class="form-group ">
                    <label for="lName" style="font-weight:600;" class="alllabel">Expected Inflation rate in Properties</label>
                    <input type="text" style="width:60%;" class="form-control mb-3 allinput input-selector calculatehouse borderhigh p-1 mb-2" name="inflation" id="inflation" onchange="housecal()" value="7">
                </div>
            </div>

            <div class="col-sm-4 col-md-5">
                <img src="images\HOUSING.png" style="border-radius:20px;width:100%;" alt="">

            </div>
            <div class="col-md-4 col-sm-8" style="border:1px solid gray;border-radius:20px;background-color:white; color:black;"><br>
                <input type="text" style="width:80%;margin-left:20px;" class="form-control input-selector p-1 d-none" name="ansinputs" id="futurevalue" readonly><br>
                <p style="font-size: 19px;font-weight: 500;font-family: auto;margin-left: 15px;margin-top:-21px;">To own your dream home, as per your inputs, you will need a sum of <span id="set8" style="color: red;font-weight: 700;font-size: 22px;"></span> after
                    <span id="house-year" style="color: green;font-weight: 700;font-size: 21px;"></span> years when the expected rate of inflation is <span id="house-infla" style="color: green;font-weight: 700;font-size: 21px;"></span> % p.a.
                </p>
                <input type="text" style="width:80%;margin-left:20px;" class="form-control input-selector p-1 d-none" name="sipvalue" value="" id="set8house" readonly><br>
            </div>
        </div>

    </div>


    <!-----------------------------Retirement----------------------------------------------->


    <div class="goals retirement" data-goal="retirement">

        <h2 align="center" style="padding-bottom:1%; padding-top:1%"> Retirement Detail</h2>
        <div class="row">
            <div class="col-md-6 col-sm-8">

                <div class="form-group row">
                    <label class="alllabel">Current Monthly Expenses</label>
                    <input type="text" style="width:80%;" class="form-control allinput mb-2 input-selector calculatehouse borderhigh s1 three-btns" name="monthlyexp" oninput="retirementcal()" id="monthlyret" placeholder="0">
                </div>
                <div class="form-group row">
                    <label class="alllabel">Inflation after Retirement</label>
                    <input type="text" style="width:80%;" class="form-control allinput mb-2 input-selector calculatehouse borderhigh" name="inflation" oninput="retirementcal(),IsEmpty()" id="inflaret" value="7">
                </div>
                <div class="form-group row">
                    <label class="alllabel">Rate of Return after Retirement</label>
                    <input type="text" style="width:80%;" class="form-control allinput input-selector calculatehouse borderhigh" name="rateretire" oninput="retirementcal()" id="retrate" value="12">
                </div><br><br>
            </div><br><br>
            <div class="col-md-4 col-sm-6" style="border:1px solid gray;border-radius:20px;background-color:white; color:black;position:relative;"><br>

                <input type="text" style="width:80%;margin-left:20px;" class="form-control input-selector p-1 d-none" name="ansinputs" id="setretire" oninput="retirementcal()" readonly><br>
                <p style="font-size: 19px;font-weight: 500;margin-left: 15px;margin-top:-26px;">Retirement is not the end of the road. It is the beginning of new
                    inning. as per your inputs, you will need a sum of <span id="set6ans" style="color: red;font-weight: 700;font-size: 22px;"></span> after <span id="set6year" style="color:green;font-weight: 700;font-size: 22px;"></span>
                    years when the expected rate of inflation is <span id="ret-infla" style="color: green;font-weight: 700;font-size: 21px;"></span> % p.a.
                    <input type="text" style="width:80%;margin-left:20px;" class="form-control input-selector p-1 d-none" name="sipvalue" id="demoretire" readonly><br>

                    <!-- <input type="text" style="width:80%;margin-left:20px;" class="form-control input-selector p-1 " name="futureage" id="set6year" readonly><br>  -->
                </p>

            </div>

        </div>

    </div>

    <!-----------------------------Merriage----------------------------------------------->
    <div class="goals marriage" data-goal="marriage">
        <h2 align="center" style="padding-bottom:1%; padding-top:1%">What Kind of Marriage You Want ?</h2>

        <div style="width:100%;display:flex;justify-content: space-around;" class="" id="marriagetype">
            <div class="row">
                <div class="col-6 col-md-3">

                    <label class="mylable" data-filed='3'>
                        <img class="myimg funimg" src="images/normal.png" />
                        <p align="center" class="allimg">
                            <input type="radio" class="nexter input-selector three-btn" name="mariage" onclick="selectMarriage(this.value)" value="Normal"> Normal Marriage
                        </p>
                    </label>

                </div>
                <div class="col-6 col-md-3">

                    <label class="mylable" data-filed='3'>
                        <img class="myimg funimg" src="images/rich.png" />
                        <p align="center" class="allimg">
                            <input type="radio" class="nexter input-selector three-btn" name="mariage" onclick="selectMarriage(this.value)" value="Rich"> Rich Marriage
                        </p>
                    </label>

                </div>
                <div class="col-6 col-md-3">

                    <label class="mylable" data-filed='3'>
                        <img class="myimg funimg" src="images/luxury.png" />
                        <p align="center" class="allimg"> <input type="radio" class="nexter input-selector three-btn" name="mariage" onclick="selectMarriage(this.value)" value="Luxury"> Luxury Marriage</p>
                    </label>

                </div>
                <div class="col-6 col-md-3">

                    <label class="mylable" data-filed='3'>
                        <img class="myimg funimg" src="images/destination marriege.png" />
                        <p align="center" class="allimg"> <input type="radio" class="nexter input-selector three-btn" name="mariage" onclick="selectMarriage(this.value)" value="Destination"> Destination Marriage</p>
                    </label>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <div class="row">
                    <div class="col-12" style="display:none;" id="marriageplace">
                        <div style="display: block;">
                            <div class="col-6 Marriagetypeone" style="margin-top:20px;display: none;" id="normal">
                                <div class="dropdown" style="display: block;">
                                    <ul id="menu">
                                        <li class="parent"><a href="#">Choose Place's for Normal marriage </a>
                                            <ul class="child">
                                                <li class="parent marriage-place input-selector" name="tier1" value="tier1" data-fees="3000000">
                                                    <a href="#" id="normal1">Tier 1<span class="expand">»</span></a>
                                                </li>
                                                <li class="parent marriage-place input-selector" name="tier2" value="tier2" data-fees="2000000">
                                                    <a href="#" id="normal2">Tier 2<span class="expand">»</span></a>
                                                </li>
                                                <li class="parent marriage-place input-selector" name="tier3" value="tier3" data-fees="1000000">
                                                    <a href="#" id="normal3">Tier 3<span class="expand">»</span></a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul><br><br><br>
                                </div>
                            </div>

                            <div class="col-6 Marriagetypeone" style="margin-top:20px;display: none;" id="Rich">
                                <div class="dropdown" style="display: block;">
                                    <ul id="menu">
                                        <li class="parent"><a href="#">Choose Place's for Rich marriage </a>
                                            <ul class="child">
                                                <li class="parent rich-tier input-selector" name="tier1" value="tier1" data-fees="5000000">
                                                    <a href="#">Tier 1<span class="expand">»</span></a>
                                                </li>
                                                <li class="parent rich-tier input-selector" name="tier2" value="tier2" data-fees="3000000">
                                                    <a href="#">Tier 2<span class="expand">»</span></a>
                                                </li>
                                                <li class="parent rich-tier input-selector" name="tier3" value="tier3" data-fees="2000000">
                                                    <a href="#">Tier 3<span class="expand">»</span></a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul><br><br><br>
                                </div>
                            </div>

                            <div class="col-6 Marriagetypeone" style="margin-top:20px;display: none;" id="Luxury">
                                <div class="dropdown" style="display: block;">
                                    <ul id="menu">
                                        <li class="parent"><a href="#">Choose Place's for Luxury marriage </a>
                                            <ul class="child">
                                                <li class="parent luxury-tier input-selector" name="tier1" value="tier1" data-fees="10000000">
                                                    <a href="#">Tier 1<span class="expand">»</span></a>
                                                </li>
                                                <li class="parent luxury-tier input-selector" name="tier2" value="tier2" data-fees="7000000">
                                                    <a href="#">Tier 2<span class="expand">»</span></a>
                                                </li>
                                                <li class="parent luxury-tier input-selector" name="tier3" value="tier3" data-fees="4000000">
                                                    <a href="#">Tier 3<span class="expand">»</span></a>
                                                </li>

                                            </ul>
                                        </li>
                                    </ul><br><br><br>
                                </div>
                            </div>

                            <div class="col-6 Marriagetypeone" style="margin-top:20px;display: none;" id="Destination">
                                <div class="dropdown" style="display: block;">
                                    <ul id="menu">
                                        <li class="parent"><a href="#">Choose Place's for Destination marriage </a>
                                            <ul class="child">
                                                <li class="parent"><a href="#">India<span class="expand">»</span></a>
                                                    <ul class="child col-5 ">
                                                        <li class="andaman input-selector" name="india" value="andaman" data-fees="5000000"><a href="#" nowrap>Andaman Nikobar </a></li>
                                                        <li class="andaman input-selector" name="india" value="pondicherry" data-fees="4000000"><a href="#" nowrap>Pondicherry</a></li>
                                                        <li class="andaman input-selector" name="india" value="jaipur" data-fees="6000000"><a href="#" nowrap>Jaipur, Udaipur</a></li>
                                                        <li class="andaman input-selector" name="india" value="amritsar" data-fees="6000000"><a href="#" nowrap>Jaisalmer, Amritsar</a></li>
                                                        <li class="andaman input-selector" name="india" value="goa" data-fees="5000000"><a href="#" nowrap>Mumbai, Goa </a></li>
                                                        <li class="andaman input-selector" name="india" value="ooty" data-fees="7000000"><a href="#" nowrap>Ooty</a></li>
                                                        <li class="andaman input-selector" name="india" value="agra" data-fees="7500000"><a href="#" nowrap>Agra </a></li>
                                                    </ul>
                                                </li>
                                                <li class="parent"><a href="#">Out of India<span class="expand">»</span></a>
                                                    <ul class="child col-5">
                                                        <li class="andaman input-selector" name="outofindia" value="US" data-fees="10000000"><a href="#" nowrap>US</a></li>
                                                        <li class="andaman input-selector" name="outofindia" value="Europe" data-fees="20000000"><a href="#" nowrap>Europe</a></li>
                                                        <li class="andaman input-selector" name="outofindia" value="austalia" data-fees="15000000"><a href="#" nowrap>Australia</a></li>
                                                    </ul>
                                                </li>

                                            </ul>
                                        </li>
                                    </ul><br><br><br>
                                </div>
                            </div>

                            <div class="col-6 Marriagetypeone" style="border:1px solid gray;border-radius:20px;background-color:white; color:black;position:relative;bottom:-15px;"><br>

                                <input type="text" style="width:80%;margin-left:20px;" class="form-control input-selector p-1 d-none" name="ansinputs" id="set2" readonly><br>
                                <p style="font-size: 19px;margin-left: 15px;margin-top:-6%;font-weight: 500;font-family: auto;">To enjoy your dream wedding you need to plan wisely & and as per your inputs, you
                                    will need a sum of <span id="set12" style="color: red;font-weight: 700;font-size: 22px;"></span> after <span id="mar-year" style="color: green;font-weight: 700;font-size: 21px;"></span> years when the expected rate of
                                    inflation is <span id="mar-infla" style="color: green;font-weight: 700;font-size: 21px;"></span>% p.a. LETTER </p>
                                <!-- inflation is <span id="pooja" style="color: green;font-weight: 700;font-size: 21px;"></span>% p.a. LETTER -->
                                <input type="text" style="width:80%;margin-left:20px;" class="form-control input-selector borderhigh d-none" name="sipvalue" id="pooja" readonly><br>

                            </div>


                            <div class="row">

                                <div class="form-group row">
                                    <labe class="alllabel">Current cost of Marriage(approx.)</label>
                                        <input type="text" style="width:82%;" class="form-control allinput mb-2 input-selector calculatehouse s1" name="currentcost" id="currentcostly" oninput="marriageone()" value="1">
                                </div>
                                <div class="form-group row">
                                    <labe class="alllabel">Expected Rate of Inflation</label>
                                        <input type="text" style="width:82%;" class="form-control allinput mb-2 input-selector calculatehouse s1" name="inflation" id="expinfla" oninput="marriageone()" value="7">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container" id="second-mar" style="display:none">
            <div class="" style="display: block;">

                <div class="row">
                    <div class="col-6 col-md-3">

                        <label class="mylable" data-filed='3'>

                            <img class="myimg funimg" src="images/normal.png" onclick="nrmlmar()" />

                            <p align="center" class="allimg"> <input type="radio" class="nexter input-selector three-btn" name="mariage" value="normal"> Normal Marriage</p>
                        </label>
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="mylable" data-filed='3'>

                            <img class="myimg funimg" src="images/rich.png" onclick="richmar()" />

                            <p align="center" class="allimg"> <input type="radio" class="nexter input-selector three-btn" name="mariage" value="rich"> Rich Marriage</p>
                        </label>
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="mylable" data-filed='3'>

                            <img class="myimg funimg" src="images/luxury.png" onclick="luxmar()" />

                            <p align="center" class="allimg"> <input type="radio" class="nexter input-selector three-btn" name="mariage" value="Luxury"> Luxury Marriage</p>
                        </label>
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="mylable" data-filed='3'>

                            <img class="myimg funimg" src="images/destination marriege.png" onclick="destmar()" />


                            <p align="center" class="allimg"> <input type="radio" class="nexter input-selector three-btn" name="mariage" value="destination"> Destination Marriage</p>
                        </label>

                    </div>
                </div>


                <h3>Marriage second child</h3>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6" id="dive-mar">
                                <div style="display: block;">
                                    <div class="form-group row">
                                        <labe class="alllabel">Current cost of Marriage(approx.)</label>
                                            <input type="text" style="width:82%;" class="form-control allinput mb-2 input-selector calculatehouse s1" name="currentcost-mar" id="secondMarcurrent" oninput="secondmarriage()" value="1">
                                    </div>
                                    <div class="form-group row">
                                        <labe class="alllabel">Expected Rate of Inflation</label>
                                            <input type="text" style="width:82%;" class="form-control allinput mb-2 input-selector calculatehouse s1" name="inflation-mar" id="secondMarinfla" oninput="secondmarriage()" value="7">
                                    </div>

                                </div>
                            </div>

                            <div class="col-6" style="margin-top:20px;display: none;" id="nrmlmar">
                                <div class="dropdown" style="display: block;">
                                    <ul id="menu">
                                        <li class="parent"><a href="#">Choose Place's for Normal marriage </a>
                                            <ul class="child">
                                                <li class="parent marriage-place input-selector" name="tier1" value="tier1" data-fees="3000000">
                                                    <a href="#" id="normal1">Tier 1<span class="expand">»</span></a>
                                                </li>
                                                <li class="parent marriage-place input-selector" name="tier2" value="tier2" data-fees="2000000">
                                                    <a href="#" id="normal2">Tier 2<span class="expand">»</span></a>
                                                </li>
                                                <li class="parent marriage-place input-selector" name="tier3" value="tier3" data-fees="1000000">
                                                    <a href="#" id="normal3">Tier 3<span class="expand">»</span></a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul><br><br><br>
                                </div>
                            </div>

                            <div class="col-6" style="margin-top:20px;display: none;" id="richmar">
                                <div class="dropdown" style="display: block;">
                                    <ul id="menu">
                                        <li class="parent"><a href="#">Choose Place's for Rich marriage </a>
                                            <ul class="child">
                                                <li class="parent rich-tier input-selector" name="tier1" value="tier1" data-fees="5000000">
                                                    <a href="#">Tier 1<span class="expand">»</span></a>
                                                </li>
                                                <li class="parent rich-tier input-selector" name="tier2" value="tier2" data-fees="3000000">
                                                    <a href="#">Tier 2<span class="expand">»</span></a>
                                                </li>
                                                <li class="parent rich-tier input-selector" name="tier3" value="tier3" data-fees="2000000">
                                                    <a href="#">Tier 3<span class="expand">»</span></a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul><br><br><br>
                                </div>
                            </div>

                            <div class="col-6" style="margin-top:20px;display: none;" id="luxmar">
                                <div class="dropdown" style="display: block;">
                                    <ul id="menu">
                                        <li class="parent"><a href="#">Choose Place's for Luxury marriage </a>
                                            <ul class="child">
                                                <li class="parent luxury-tier input-selector" name="tier1" value="tier1" data-fees="10000000">
                                                    <a href="#">Tier 1<span class="expand">»</span></a>
                                                </li>
                                                <li class="parent luxury-tier input-selector" name="tier2" value="tier2" data-fees="7000000">
                                                    <a href="#">Tier 2<span class="expand">»</span></a>
                                                </li>
                                                <li class="parent luxury-tier input-selector" name="tier3" value="tier3" data-fees="4000000">
                                                    <a href="#">Tier 3<span class="expand">»</span></a>
                                                </li>

                                            </ul>
                                        </li>
                                    </ul><br><br><br>
                                </div>
                            </div>

                            <div class="col-6" style="margin-top:20px;display: none;" id="destmar">
                                <div class="dropdown" style="display: block;">
                                    <ul id="menu">
                                        <li class="parent"><a href="#">Choose Place's for Destination marriage </a>
                                            <ul class="child">
                                                <li class="parent"><a href="#">India<span class="expand">»</span></a>
                                                    <ul class="child col-5 ">
                                                        <li class="andaman input-selector" name="india" value="andaman" data-fees="5000000"><a href="#" nowrap>Andaman Nikobar </a></li>
                                                        <li class="andaman input-selector" name="india" value="pondicherry" data-fees="4000000"><a href="#" nowrap>Pondicherry</a></li>
                                                        <li class="andaman input-selector" name="india" value="jaipur" data-fees="6000000"><a href="#" nowrap>Jaipur, Udaipur</a></li>
                                                        <li class="andaman input-selector" name="india" value="amritsar" data-fees="6000000"><a href="#" nowrap>Jaisalmer, Amritsar</a></li>
                                                        <li class="andaman input-selector" name="india" value="goa" data-fees="5000000"><a href="#" nowrap>Mumbai, Goa </a></li>
                                                        <li class="andaman input-selector" name="india" value="ooty" data-fees="7000000"><a href="#" nowrap>Ooty</a></li>
                                                        <li class="andaman input-selector" name="india" value="agra" data-fees="7500000"><a href="#" nowrap>Agra </a></li>
                                                    </ul>
                                                </li>
                                                <li class="parent"><a href="#">Out of India<span class="expand">»</span></a>
                                                    <ul class="child col-5">
                                                        <li class="andaman input-selector" name="outofindia" value="US" data-fees="10000000"><a href="#" nowrap>US</a></li>
                                                        <li class="andaman input-selector" name="outofindia" value="Europe" data-fees="20000000"><a href="#" nowrap>Europe</a></li>
                                                        <li class="andaman input-selector" name="outofindia" value="austalia" data-fees="15000000"><a href="#" nowrap>Australia</a></li>
                                                    </ul>
                                                </li>

                                            </ul>
                                        </li>
                                    </ul><br><br><br>
                                </div>
                            </div>
                        </div>
                        <div class="col-6" style="border:1px solid gray;border-radius:20px;background-color:white; color:black;position:relative;bottom:-15px;"><br>
                            <input type="text" style="width:80%;margin-left:20px;" class="form-control input-selector p-1" name="ansinputsMar" id="fvsecond-mar" readonly><br>
                            <input type="text" style="width:80%;margin-left:20px;" class="form-control input-selector borderhigh d-none" name="sipvalueMar" id="sipsecong-mar" readonly><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-----------------------------car----------------------------------------------->
    <div class="goals car" data-goal="car">
        <h2 align="center" style="padding-bottom:1%; padding-top:1%">Calculate your saving for your Dream Car !!</h2>
        <div class="row">
            <div class="col-6">
                <div class="form-group row">
                    <label class="alllabel">Current cost of Car(approx.)</label>
                    <input type="text" style="width:80%;" class="form-control allinput mb-2 input-selector calculatehouse borderhigh s1 three-btns" name="current" oninput="carone(),IsEmpty()" id="currentcar" value="1">
                </div>
                <div class="form-group row">
                    <label class="alllabel">Expected Rate of Inflation</label>
                    <input type="text" style="width:80%;" class="form-control allinput mb-2 input-selector calculatehouse borderhigh" name="inflacar" id="inflacar" oninput="carone()" value="7">
                </div>
            </div>
            <div class="col-5">
                <div class="form-group row" style="border:1px solid gray;border-radius:20px;background-color:white; color:black;position:relative;">
                    <!-- <label for="lName" style="font-weight:700">This is Your Future Value</label><br> -->
                    <input type="text" style="width:80%;margin-left:20px;" class="form-control input-selector p-1 d-none" name="ansinputs" oninput="carone()" id="set6car" readonly><br><br>
                    <p style="font-size: 20px;margin-top: -8%;font-family: auto;font-weight: 500;margin-left: 4px;">Buying a car is possible only if you plan wisely as per your inputs, you will need a sum of
                        <span id="car6" style="color: red;font-weight: 700;font-size: 22px;"></span> after <span id="caryear" style="color: green;font-weight: 700;font-size: 21px;"></span> years when the expected rate of inflation is
                        <span id="car-infla" style="color: green;font-weight: 700;font-size: 21px;"></span> % p.a
                        <input type="text" style="width:80%;margin-left:20px;" class="form-control input-selector d-none" name="sipvalue" id="democar" readonly><br><br>

                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-----------------------------vacation----------------------------------------------->

    <div class="goals vacation" data-goal="vacation"><br>
        <h3 align="center" style="padding-bottom:1%; padding-top:1%">Select City for your Vacation</h3>
        <div class="">
            <div id="vaccity" class="row">
                <div class="col-12" style="display:contents;text-align:center;">
                    <!-- <div class="col-6 col-md-4 col-sm-3"> -->
                    <label class="col-6 col-md-4 col-sm-3 mylable-goal vacacity three-btn" data-filed='3'>

                        <img class="myimg funimg " src="images\01_DUBAI.png" />

                        <p align="center" class="allimg">
                            <input type="radio" name="vacationplace" class="btn btn-success vacradio input-selector" id="vacone" detaset="500000" value="DUBAI">
                        </p>
                    </label>
                    <!-- </div> -->
                    <!-- <div class="col-6 col-md-4 col-sm-3"> -->
                    <label class="mylable-goal vacacity three-btn col-6 col-md-4 col-sm-3" data-filed='3'>

                        <img class="myimg funimg " src="images\02_PARIS.png" />

                        <p align="center" class="allimg">
                            <input type="radio" name="vacationplace" class="btn btn-success vacradio input-selector" id="vactwo" detaset="800000" value="PARIS">
                        </p>
                    </label>
                    <!-- </div> -->
                    <!-- <div class="col-6 col-md-4 col-sm-3"> -->
                    <label class="mylable-goal vacacity three-btn col-6 col-md-4 col-sm-3" data-filed='3'>

                        <img class="myimg funimg " src="images\03_ITALY.png" />

                        <p align="center" class="allimg">
                            <input type="radio" name="vacationplace" class="btn btn-success vacradio input-selector" id="vacthree" detaset="500000" value="ITALY">
                        </p>
                    </label>
                    <!-- </div> -->
                    <!-- <div class="col-6 col-md-4 col-sm-3"> -->
                    <label class="mylable-goal vacacity three-btn col-6 col-md-4 col-sm-3" data-filed='3'>

                        <img class="myimg funimg " src="images\04_HONG KONG.png" />

                        <p align="center" class="allimg">
                            <input type="radio" name="vacationplace" class="btn btn-success vacradio input-selector" id="vacfour" detaset="600000" value="HONG KONG">
                        </p>
                    </label>
                    <!-- </div> -->
                    <!-- <div class="col-6 col-md-4 col-sm-3"> -->
                    <label class="mylable-goal vacacity three-btn col-6 col-md-4 col-sm-3" data-filed='3'>

                        <img class="myimg funimg " src="images\05_SINGAPORE.png" />

                        <p align="center" class="allimg">
                            <input type="radio" name="vacationplace" class="btn btn-success vacradio input-selector" id="vacfive" detaset="500000" value="SINGAPORE">
                        </p>
                    </label>
                    <!-- </div> -->
                    <!-- <div class=""> -->
                    <label class="mylable-goal vacacity three-btn col-6 col-md-4 col-sm-3" data-filed='3'>

                        <img class="myimg funimg " src="images\06_ANDAMAN.png" />

                        <p align="center" class="allimg">
                            <input type="radio" name="vacationplace" class="btn btn-success vacradio input-selector" id="vacsix" detaset="500000" value="ANDAMAN"><br><br>
                        </p>
                    </label>
                    <!-- </div> -->
                </div>
                <!-- <div class="col-6 col-md-4 col-sm-6">
                    <label for="vacone" class="vacacity three-btn">Dubai</label>
                    <input type="radio" name="vacationplace" class="btn btn-success vacradio input-selector" id="vacone" detaset="500000" value="DUBAI">
                </div>
                <div class="col-6 col-md-4 col-sm-6">
                    <label for="vactwo" class="vacacity three-btn">Paris</label>
                    <input type="radio" name="vacationplace" class="btn btn-success vacradio input-selector" id="vactwo" detaset="800000" value="PARIS">
                </div> 
                <div class="col-6 col-md-4 col-sm-6">
                    <label for="vacthree" class="vacacity three-btn">Italy</label>
                    <input type="radio" name="vacationplace" class="btn btn-success vacradio input-selector" id="vacthree" detaset="500000" value="ITALY">
                </div><br><br><br>
                <div class="col-6 col-md-4 col-sm-6">
                    <label for="vacfour" class="vacacity three-btn">Hong Kong</label>
                    <input type="radio" name="vacationplace" class="btn btn-success vacradio input-selector" id="vacfour" detaset="600000" value="HONG KONG">
                </div>
                <div class="col-6 col-md-4 col-sm-6">
                    <label for="vacfive" class="vacacity three-btn">Singapore</label>
                    <input type="radio" name="vacationplace" class="btn btn-success vacradio input-selector" id="vacfive" detaset="500000" value="SINGAPORE">
                </div>
                <div class="col-6 col-md-4 col-sm-6">
                    <label for="vacsix" class="vacacity three-btn">Andaman</label>
                    <input type="radio" name="vacationplace" class="btn btn-success vacradio input-selector" id="vacsix" detaset="500000" value="ANDAMAN"><br><br>
                </div>-->
            </div>
        </div>
        <div class="row">

            <div class="row d-none" id="vaccalculation">
                <div class="col-7">
                    <div class="form-group row">
                        <label class="alllabel">Current cost of Higher Education(approx.)</label>
                        <input type="text" style="width:80%;" class="form-control allinput mb-2 input-selector calculatehouse s1" name="current" id="currentvac" oninput="vacationone()" onchange="vacationone()" value="1">
                    </div>
                    <div class="form-group row">
                        <label class="alllabel">Expected Rate of Inflation</label>
                        <input type="text" style="width:80%;" class="form-control allinput mb-2 input-selector calculatehouse " name="infla" id="inflavac" oninput="vacationone()" value="7">
                    </div>
                </div>

                <div class="col-5" style="border:1px solid gray;border-radius:20px;background-color:white; color:black;margin-top:1px;"><br>
                    <!-- <label for="lName">This is Your Future Value</label><br> -->
                    <input type="text" style="width:80%;margin-left:20px;" class="form-control input-selector d-none" name="ansinputs" oninput="vacationone()" id="set6vac" readonly>
                    <p style="font-size: 19px;font-weight: 500;font-family: auto;margin-top: -2%;margin-left: 15px;">Sometimes a vacation is all you need and to plan your
                        VACATION as per your inputs, you will need a sum of <span id="setvaca" style="color: red;font-weight: 700;font-size: 22px;"></span> after
                        <span id="vacyear" style="color: green;font-weight: 700;font-size: 21px;"></span> years when the expected rate of inflation is <span id="vac-infla" style="color: green;font-weight: 700;font-size: 21px;"></span> % p.a.
                    </p>
                    <input type="text" style="width:80%;margin-left:20px;" class="form-control input-selector d-none" name="sipvalue" id="anssipvac" oninput="vacationone()">
                </div>

            </div>
            <!-- </div>
            </div> -->
        </div>






    </div>
    <!-----------------------------Tax Saving ----------------------------------------------->
    <!-- <div class="goals taxsaving" data-goal="tax-saving">
        <div class="row">
            <div class="col-4">
                <div>
                    <div class="form-group row">
                        <label>Current cost of Higher Education(approx.)</label>
                        <input type="text" style="width:80%;" class="form-control input-selector calculatehouse borderhigh s1 three-btn" name="currentret" id="currenttax" value="0">
                    </div>
                    <div class="form-group row">
                        <label>Expected Rate of Inflation</label>
                        <input type="text" style="width:80%;" class="form-control input-selector calculatehouse borderhigh" name="inflatax" id="inflatax" value="7">
                    </div>
                    <div class="form-group row">
                        <label>Future Cost of Higher Education</label>
                        <input type="text" style="width:80%;" class="form-control input-selector borderhigh" name="calculateret" id="set6tax" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-----------------------------others----------------------------------------------->
    <div class="goals others" data-goal="others">
        <!-- <div class="goals others bady" data-goal="others">
            <br>
            <div class="containers" id="containers">
                <div class="form-containers sign-up-containers">
                    <div class="sameform">
                        <h1 class="htag">Log in</h1>
                        <span class="spans">or use your account</span>
                        <input type="email" class="inputss input-selector" placeholder="Email" />
                        <input type="password" class="inputss input-selector" placeholder="Password" />
                        <a href="#">Forgot your password?</a><br>
                        <button type="button" class="bottonss ">Log In</button>
                    </div>
                </div>
                <div class="form-containers log-in-containers">
                    <div class="sameform">
                        <h1 class="htag">Create Account</h1>
                        <span class="spans">or use your email for registration</span><br>
                        <input type="text" class="inputss input-selector" placeholder="Name" name="username" id="other-name" required="" />
                        <input type="email" class="inputss input-selector" placeholder="Email" name="email" id="other-email" required="" />
                        <input type="numer" class="inputss input-selector" placeholder="Contact" name="mobile" pattern="[0-9]{10}" min-length="10" id="other-mob" required="" />
                        <input type="password" class="inputss input-selector" placeholder="Password" name="passwords" id="other-pass" required="" /><br>
                        <button type="button" class="bottonss btnidprfl next betten " name="next" value="next" id="fourother" onclick="validate(),meeting()" disabled>Sign Up</button>
                    </div>
                </div>
                <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-left">
                            <h1 class="htag1">Hello, There!</h1>
                            <p class="ptag">Don't have an account? Sign Up Free</p>
                            <button type="button" class="ghost bottonss" id="logIns">Sign Up</button>
                        </div>
                        <div class="overlay-panel overlay-right">
                            <h1 class="htag1">Welcome Back!</h1>
                            <p class="ptag">Already have an account? Log In</p>
                            <button type="button" class="ghost bottonss" id="signUps">Log In</button>
                        </div>
                    </div>
                </div>
            </div>

        </div> -->

    </div>
    <?PHP
    if (isset($_SESSION["goaluser"])) {
    ?>
        <div style="text-align:center" class="mt-5">
            <input type="button" name="previous" class="previous btn btn-secondary" value="Previous" />
            <input type="button" name="next" class="next btn btn-primary btnidprfl" id="buttons" value="Next" disabled />
        </div>
    <?php
    } else {
    ?>
        <div style="text-align:center" class="mt-5">
            <input type="button" name="previous" class="previous btn btn-secondary" value="Previous" />
            <input type="button" name="next" class="next btn btn-primary" id="buttons" value="Next" disabled />
        </div>
    <?php
    }

    ?>
</fieldset>