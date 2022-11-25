<fieldset>

<!-----------------------------Education----------------------------------------------->


<div class="goals education" data-goal="education"> <br>
    <h2 align="center" style="padding-bottom:1%; padding-top:1%;"> Education Detail</h2>

    <div class="row">
        <div class="col-md-6 col-sm-4" id="imgchild">
            <div style="display:block;">
                <img src="images\11boybaby.png" alt="" style="border-radius:22px;width:95%;">
            </div>
        </div><br><br>



        <div class="col-md-6 col-sm-8">
            <div class="form-group row">
                <label class="alllabel"> Name of Your Child</label>
                <input type="text" style="width:70%;" class="form-control allinput input-selector calculatehouse borderhigh name childname two-btn " name="childname" id="name" placeholder="Name">
            </div><br>

            <div class="form-group row">
                <label class="alllabel">Current age of Child</label>
                <input type="number" style="width:70%;" class="form-control allinput input-selector calculatehouse borderhigh currentagechild" name="age" id="age" value="1" required>
            </div><br>

            <div class="form-group row">
                <label class="alllabel">Age at which child go to Higher Education</label>
                <input type="number" style="width:70%;" class="form-control allinput input-selector calculatehouse borderhigh futureagechild" name="futureages" id="futureage" value="18" required>
            </div><br>
            <input type="button" value="Add Child" class="btn btn-primary" onclick="secondedu()"><br>
        </div>

        <div class="col-6 col-sm-4">
            <div class="" style="display:none" id="second">
                <div class="" style="display: block;">
                    <div class="form-group row">
                        <label class="alllabel"> Name of Your second Child</label>
                        <input type="text" style="width:100%;" class="form-control allinput calculatehouse borderhigh" name="secondchildname" id="sname" onchange="seducation()" placeholder="Name">
                    </div><br>

                    <div class="form-group row">
                        <label class="alllabel">Current age of Child</label>
                        <input type="number" style="width:100%;" class="form-control allinput calculatehouse borderhigh" name="secondchildage" id="sage" onchange="seducation()" value="1">
                    </div><br>

                    <div class="form-group row">
                        <label class="alllabel">Age at which child go to Higher Education</label>
                        <input type="number" style="width:100%;" class="form-control allinput calculatehouse borderhigh" name="secondfutureage" id="sfutureage" onchange="seducation()" value="18">
                    </div><br>

                </div>
            </div>
        </div>
    </div>
</div>
<!-----------------------------House----------------------------------------------->

<div class="goals house" data-goal="house"><br>

    <h2 align="center" style="padding-bottom:1%; padding-top:1%"> House Detail</h2>
    <div class="form-group" style="text-align:center;">
        <div class="row">
            <div style="width:100%" class="" id="choosecity" style="display: flex;justify-content: space-around;">
                <div class="row">
                    <div class="col-6 col-md-3">
                        <label class="mylable-goal  " data-filed='2'>

                            <img class="myimg funimg " src="images\chennai.png" />

                            <p align="center" class="allimg">
                                <input type="radio" name="city" class="input-selector two-btn" onclick="selecthouse(this.value)" value="chennai"> CHENNAI
                            </p>
                        </label>
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="mylable-goal " data-filed='2'>

                            <img class="myimg funimg " src="images\delhi.png" />

                            <p align="center" class="allimg">
                                <input type="radio" name="city" class="input-selector two-btn" onclick="selecthouse(this.value)" value="delhi"> DELHI
                            </p>
                        </label>
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="mylable-goal " data-filed='2'>

                            <img class="myimg funimg " src="images\hydrabaad.png" />

                            <p align="center" class="allimg">
                                <input type="radio" name="city" class="input-selector two-btn" onclick="selecthouse(this.value)" value="hydrabad"> HYDRABAD
                            </p>
                        </label>
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="mylable-goal mr-5 " data-filed='2'>

                            <img class="myimg funimg " src="images\pune.png" />

                            <p align="center" class="allimg">
                                <input type="radio" name="city" class="input-selector two-btn" onclick="selecthouse(this.value)" value="pune"> PUNE
                            </p>
                        </label>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-6 col-md-3">
                        <label class="mylable-goal " data-filed='2'>

                            <img class="myimg funimg " src="images\bangalore.png" />

                            <p align="center" class="allimg">
                                <input type="radio" name="city" class="input-selector two-btn" onclick="selecthouse(this.value)" value="bagalore"> BANGALORE
                            </p>
                        </label>
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="mylable-goal " data-filed='2'>

                            <img class="myimg funimg " src="images\mumbai.png" />

                            <p align="center" class="allimg">
                                <input type="radio" name="city" class="input-selector two-btn" onclick="selecthouse(this.value)" value="mumbai"> MUMBAI
                            </p>
                        </label>
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="mylable-goal " data-filed='2'>

                            <img class="myimg funimg " src="images\shreenagar.png" />

                            <p align="center" class="allimg">
                                <input type="radio" name="city" class="input-selector two-btn" onclick="selecthouse(this.value)" value="shreenagar"> SHREENAGAR
                            </p>
                        </label>
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="mylable-goal " data-filed='2'>

                            <img class="myimg funimg " src="images\othercity.png" onclick="houseother()" />

                            <p align="center" class="allimg">
                                <input type="radio" name="city" class="input-selector two-btn" onclick="selecthouse(this.value)" value="othercity"> Other City
                            </p>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-6">

            </div>
            <div class="col-4 col-sm-8" style="display: none;" id="houseother">
                <div class="form-group row" style="display: block;">
                    <label for="city" class="col-12">In which City you Want a House </label><br>
                    <input class="col-12 mt-1 p-1" style="width:60%;border-radius:8px;" type="text" name="pincode" id="pincode" placeholder="Enter Pin Code">
                    <input class="col-12 mt-1 p-1 input-selector" style="width:60%;border-radius:8px;" type="text" name="city" id="city" placeholder="City" readonly><br><br>
                    <!-- <input class="col-md-4 col-12 mt-1 p-1" style="width:28%;border-radius:10px;" type="text" name="state" id="state" placeholder="State" readonly> -->
                </div>
            </div>
        </div>

    </div>


</div>

<!-----------------------------Retirement----------------------------------------------->

<div class="goals retirement" data-goal="retirement">
    <h2 align="center" style="padding-bottom:1%; padding-top:1%"> Retirement Detail</h2>
    <div class="row">

        <div class="col-12">
            <div class="form-group row">
                <label class="alllabel"> Current Age</label>
                <input type="number" style="width:40%;border:1px solid black;" class="form-control allinput mb-2 input-selector calculatehouse borderhigh " name="currentage" id="presentret" oninput="retirementcal()" placeholder="Present Age"><br>
            </div><br>
            <div class="form-group row">
                <label class="alllabel"> Retirement Age</label>
                <input type="number" style="width:40%;border:1px solid black;" class="form-control allinput mb-2 input-selector calculatehouse borderhigh" name="retirementage" id="retireret" oninput="retirementcal(),IsEmpty()" placeholder="Retirement Age"><br>
            </div><br>
            <div class="form-group row">
                <label class="alllabel"> Life of Expectency</label>
                <input type="number" style="width:40%;border:1px solid black;" class="form-control allinput mb-3 input-selector calculatehouse borderhigh two-btn" name="lifeexp" id="lifeexp" oninput="retirementcal()" placeholder="Life Expectency">
            </div>
        </div>
    </div>
</div>

<!-----------------------------Merriage----------------------------------------------->

<div class="goals marriage" data-goal="marriage">
    <h2 align="center" style="padding-bottom:1%;padding-top:1%;"> Marriage Detail</h2>

    <div class="row">
        <div class="col-md-6">
            <img src="images\marriage.jpg" alt="" style="width:100%;border-radius:22px;">
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="form-group row">
                <label class="alllabel"> Name of Your Child</label>
                <input type="text" style="width:40%;" class="form-control allinput mb-2 input-selector calculatehouse borderhigh two-btn" name="childname" id="namemar" onchange="marriageone()" placeholder="Name">
            </div>
            <div class="form-group row">
                <label class="alllabel">Current age of Child</label>
                <input type="text" style="width:40%;" class="form-control allinput mb-2 input-selector calculatehouse borderhigh" name="currentagechild" onchange="marriageone()" id="agemar" value="1">
            </div>

            <div class="form-group row">
                <label class="alllabel">Age at which child Get's Married</label>
                <input type="text" style="width:40%;" class="form-control allinput mb-2 input-selector calculatehouse borderhigh" name="futureage" onchange="marriageone()" id="futureagemar" value="25">
            </div>
            <input type="button" value="Add Child for marriage" class="btn btn-primary" onclick="secondmar()"><br>
            <br>
        </div>
        <div class="col-6 col-sm-4">
            <div class="" style="display:none" id="secondchildmar">
                <div class="" style="display: block;">
                    <div class="form-group row">
                        <label class="alllabel"> Name of Your second Child</label>
                        <input type="text" style="width:100%;" class="form-control allinput calculatehouse borderhigh" name="secondchildname" id="sname" onchange="seducation()" placeholder="Name">
                    </div><br>

                    <div class="form-group row">
                        <label class="alllabel">Current age of Child</label>
                        <input type="number" style="width:100%;" class="form-control allinput calculatehouse borderhigh" name="secondchildage" id="sage" onchange="seducation()" value="1">
                    </div><br>

                    <div class="form-group row">
                        <label class="alllabel">Age at which child go to Higher Education</label>
                        <input type="number" style="width:100%;" class="form-control allinput calculatehouse borderhigh" name="secondfutureage" id="sfutureage" onchange="seducation()" value="18">
                    </div><br>

                </div>
            </div>
        </div>
    </div>
</div>
<!-----------------------------car----------------------------------------------->

<div class="goals car" data-goal="car">
    <h2 align="center" style="padding-bottom:1%; padding-top:1%;"> Car Detail</h2>
    <div class="row">

        <div class="col-md-6 col-sm-8">
            <div class="form-group col-sm-12">
                <label style="margin-left:-12px;" class="alllabel"> Name of the Car you Wish</label>
                <input type="text" style="width:80%;" class="form-control allinput mb-2 input-selector calculatehouse borderhigh two-btn" name="carname" id="namecar" placeholder="Name">
            </div><br>
            <div class="form-group row d-none">
                <label class="alllabel">This is Your current year</label>
                <input type="number" style="width:80%;" class="form-control allinput mb-2 input-selector calculatehouse borderhigh" name="currentyear" id="currentageyear" onchange="carone()" value="0" readonly>
            </div>
            <div class="form-group col-sm-12">
                <label style="margin-left:-12px;" class="alllabel">After how many year's you want to purchase your Dream Car</label>
                <input type="number" style="width:80%;" class="form-control input-selector allinput mb-2 calculatehouse borderhigh" name="futureyear" id="futureyearcar" onchange="carone()" oninput="IsEmpty()" value="" required>
            </div>
        </div>
        <div class="col-md-6 col-sm-4">
            <img src="./images/carimage.png" style="width:100%;border-radius:22px; " alt="">
        </div>
    </div>
</div>
<!-----------------------------vacation----------------------------------------------->

<div class="goals vacation" data-goal="vacation">
    <h2 align="center" style="padding-bottom:1%; padding-top:1%;"> Vacation Detail</h2>

    <div class="row">
        <div class="col-md-6 col-sm-8">
            <div class="form-group row">
                <label class="alllabel">Enter your Name</label>
                <input type="text" style="width:80%;" class="form-control allinput mb-2 input-selector calculatehouse borderhigh two-btn" name="username" id="vname" placeholder="Name">
            </div>
            <div class="form-group row mt-3 d-none"><br>
                <label class="alllabel">This is your Current year </label>
                <input type="text" style="width:80%;" class="form-control allinput mb-2 input-selector calculatehouse borderhigh" id="vcurrentyear" value="0" onchange="vacationone()" placeholder="year" readonly>
            </div>
            <div class="form-group row mt-3"><br>
                <label class="alllabel">After how much time you wish for your Vacation</label>
                <input type="text" style="width:80%;" class="form-control allinput mb-2 input-selector calculatehouse borderhigh" name="futureyear" id="vfutureyear" oninput="IsEmpty(),vacationone()" placeholder="year">
            </div>
        </div>
        <div class="col-md-6 col-sm-4">
            <img src="./images/vacimg.png" style="width:100%;border-radius:22px;" alt="">
        </div>
    </div>
</div>
<!-----------------------------Tax Saving ----------------------------------------------->
<!-- <div class="goals taxsaving" data-goal="tax-saving">
    <h2 align="center" style="padding-bottom:1%; padding-top:1%"> Tax-Saving Detail</h2>
    <div class="row">

        <div class="col-12">
            <div class="form-group row">
                <label> Name of Your Child</label>
                <input type="text" style="width:40%;" class="form-control input-selector calculatehouse borderhigh" id="nametax" placeholder="Name">
            </div>
        </div>
    </div>
</div> -->
<!-----------------------------others----------------------------------------------->
<div class="goals others" data-goal="others">
    <h2 align="center" style="padding-bottom:1%; padding-top:1%"> Other Detail</h2>
    <div class="row">

        <div class="col-7">
            <div class="form-group row">
                <label class="alllabel"> Name of Your Goal</label>
                <input type="text" style="width:70%;" class="form-control allinput input-selector calculatehouse borderhigh two-btn" name="goalname" oninput="namebtn()" id="nameother" placeholder="Name">
            </div>
            <div class="form-group row">
                <label class="alllabel">At What time you want to achieve this Goal</label>
                <input type="number" style="width:70%;" class="form-control allinput input-selector calculatehouse borderhigh" name="futureage" oninput="othergoalcal()" id="futureval" placeholder="How many year ?">
            </div>
            <div class="form-group row">
                <label class="alllabel">Current Cost of Goal</label>
                <input type="text" style="width:70%;" class="form-control allinput input-selector calculatehouse borderhigh" name="currentcost" oninput="othergoalcal()" id="currentvalue" placeholder="Current cost">
            </div>
            <div class="form-group row">
                <label class="alllabel">Expected rate of Inflation</label>
                <input type="text" style="width:70%;" class="form-control allinput input-selector calculatehouse borderhigh" name="inflation" oninput="othergoalcal()" id="inflaother" placeholder="Inflation rate" value="7">
            </div>
            <div class="form-group row d-none">
                <label class="alllabel">Current Year</label>
                <input type="text" style="width:70%;" class="form-control allinput calculatehouse borderhigh" oninput="othergoalcal()" id="currentother" value="0" placeholder="Inflation rate">
            </div>

        </div>
        <div class="col-5" style="border:1px solid gray;border-radius:20px;background-color:white; color:black;margin-bottom: 80px;margin-top: 31px;"><br>
            <input type="text" style="width:80%;margin-left:20px;" class="form-control input-selector d-none" name="ansinputs" oninput="othergoalcal()" id="set6other" readonly>
            <p style="font-size: 19px;font-weight: 500;font-family: auto;margin-top: -2%;margin-left: 15px;">To achieve this goal <span id="p-other" style="color: green;font-weight: 700;font-size: 21px;"> </span> you will need sum of rupees
                <span id="set0other" style="color: red;font-weight: 700;font-size: 22px;"></span> after <span id="set11other" style="color: green;font-weight: 700;font-size: 21px;"></span>
                years when the expected rate of inflation is <span id="other-infla" style="color: green;font-weight: 700;font-size: 21px;"></span>% p.a
            </p>
            <input type="text" style="width:80%;margin-left:20px;" class="form-control input-selector d-none" name="sipvalue" id="anssipother" oninput="othergoalcal()">
        </div>
    </div>
</div>

<br><br><br>
<div style="text-align:center" class="mt-2">
    <input type="button" name="previous" class="previous btn btn-secondary" value="Previous" />
    <input type="button" name="next" onclick="namebtn(),gotolog()" class="next btn btn-primary" value="Next" id="btn-2" disabled />
</div>
</fieldset>