<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/bootstrap.min.css">
    <title>Investor KYC</title>
</head>
<style>
    body {
        background-color: #f9f9f9;
    }

    .head {
        text-align: center;
        padding: 10px 5px;
        color: #fff;
        background-color: #263787;
        font-size: 23px;
        font-weight: 500;
    }

    .top_row {
        background-color: #f9f9f9;
        border: 1px solid #c7c7c7;
        box-shadow: 0px 0px 9px 1px;
    }

    .que_col {
        color: sandybrown;
        font-weight: 600;
    }

    h4 {
        color: green;
    }

    .borbottom {
        border: 0;
        border-bottom: 1px solid gray;
    }
</style>

<body>
    <!-- <div class="container"> -->
    <div class="container mt-4">
        <div class="head mt-5">Investor Information</div>
        <div class="row top_row mt-3">
            <div class="col-md-12" style="position:relative;">
                <div class="form-group mt-4">
                    <label class="control-label que_col" for="name">Are you a resident of USA/Canada?</label> &nbsp;&nbsp;
                    <input type="radio" class="start_radio" value="yes_box" id="yes_id" name="radio1">&nbsp;<label for="yes_id" style="cursor:pointer;">Yes</label>
                    <input type="radio" class="start_radio" value="no_box" id="no_id" name="radio1" style="margin-left: 5%;">&nbsp;<label for="no_id" style="cursor:pointer;">No</label>
                </div><br>
                <div style="padding: 20px;" class="d-none yes_box">
                    <p style=" font-size: 17px;font-weight: 600;font-family: math;width: 90%; margin: auto;">The Regulatory framework does not allow USA/Canada residents to transact online in mutual funds. We hope that changes in regulations in the future would enable you to transact as well through Happynessfactory.</p>
                </div>
                <div class=" no_box">
                    <div class="form-group">
                        <label for="" class="que_col">Enter PAN </label>
                        <input type="text" class="borbottom " style="margin-left: 20px;">
                    </div><br>
                    <div class="form-group">
                        <h4>Personal Details</h4>
                        <label for="" class="que_col" style="padding:16px;">Name (as in PAN)</label><br>
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="">&nbsp;</label><br>
                                    <input type="text" class="borbottom w-100" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="">&nbsp;</label><br>
                                    <input type="text" class="borbottom w-100" placeholder="Middle Name">
                                </div>
                            </div>
                            <div class="col-12  col-md-3">
                                <div class="form-group">
                                    <label for="">&nbsp;</label><br>
                                    <input type="text" class="borbottom w-100" placeholder="Last Name">
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="que_col">Date of Birth</label><br>
                                    <input type="text" class="borbottom w-100" placeholder="Date">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="que_col">Gender</label><br>
                                    <!-- <input type="text" class="borbottom w-100" placeholder="Gender">
                                    <select name="" id="">
                                        <option value="">Female</option>
                                        <option value="">Male</option>
                                    </select> -->
                                    <input type="text" name="city" list="cityname">
                                    <datalist id="cityname">
                                        <option value="Boston">Boston</option>
                                        <option value="Cambridge">Cambride</option>
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-12  col-md-3">
                                <div class="form-group">
                                    <label for="" class="que_col">Marital Status</label><br>
                                    <input type="text" class="borbottom w-100" placeholder="Last Name">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="./assets/bootstrap.bundle.min.js"></script>
<script>
    $("#yes_id").click(function() {
        $('.yes_box').removeClass('d-none');
        $('.no_box').addClass('d-none');
    })
    $("#no_id").click(function() {
        $('.no_box').removeClass('d-none');
        $('.yes_box').addClass('d-none');
    })
</script>

</html>