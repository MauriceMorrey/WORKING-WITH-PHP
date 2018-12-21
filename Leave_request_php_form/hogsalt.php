<!-- ASSUMPTIONS
## Role based access control has been set up to show time-off table records only to the managers.
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Hogsalt Leave Request Form</title>
    <link rel="shortcut icon" href="" />
    <!--gets rid of favicon error -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js" integrity="sha256-dHf/YjH1A4tewEsKUSmNnV05DDbfGN3g7NMq86xgGh8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <link href="custom.css" rel="stylesheet" type="text/css" />
    <script src="leave_request.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-lg-offset-2">
          <h1 class="text-center">HOGSALT LEAVE REQUEST FORM</h1>
          <p class="lead"> Please fill out the form below to request time off. Only validreasons shall be considered. Acceptance of leave is at the discretion of your manager.</p>

          <form id="leave_request_form" method="post" action="leave_request.php" role="form" >

            <div class="messages"></div>

            <div class="controls">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <span class="error">*</span>
                    <label for="form_firstname">Firstname </label>
                    <input id="form_firstname" type="text" name="firstname" class="form-control" placeholder="Please enter your firstname " required="required"  data-error="Firstname is required."/>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <span class="error">*</span>
                    <label for="form_lastname">Lastname </label>
                    <input id="form_lastname" type="text" name="lastname" class="form-control" placeholder="Please enter your lastname " required="required" data-error="Lastname is required."/>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <span class="error">*</span>
                    <label for="form_email">Email </label>
                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email " required="required" data-error="Valid email is required." />
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <span class="error">*</span>
                    <label for="form_store_location">Employee store location</label>
                    <select id="form_store_location" name="store_location" class="form-control" required="required" data-error="Please specify your store location."></select>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
              <div class="row" id="dates">
                <div class="col-md-6">
                  <div class="form-group">
                    <span class="error">*</span>
                    <label for="form_leave_start">Leave start date </label>
                    <input id="form_leave_start" type="date" name="leave_start" class="form-control" placeholder="Please enter your leave start date " required="required" data-error="Leave start date is required."/>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <span class="error">*</span>
                    <label for="form_leave_end">Leave end date </label>
                    <input id="form_leave_end" type="date" name="leave_end" class="form-control" placeholder="Please enter your leave end date " required="required" data-error="Leave end date is required."/>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>

                <div class="col-md-12">
                  <span class="error">*</span>
                  <label for="form_leaveDuration">Leave duration </label>
                  <div class="form-group">
                    <div id="leaveDuration" name="leave_duration" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%" required="required" data-error="Leave duration is required.">
                      <i class="fa fa-calendar"></i>&nbsp; <span></span>
                      <i class="fa fa-caret-down"></i>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <span class="error">*</span>
                    <label for="form_reason"> Reason for requesting time off:</label>
                    <textarea id="form_reason" name="reason" class="form-control" placeholder="Enter reason for requesting time off here.." rows="4" required="required" data-error="Reason for requesting time off is required." ></textarea>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-12">
                  <input type="submit" class="btn btn-primary btn-lg btn-send btn-block" value="Submit Leave Request"/>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <p class="text-muted"><strong class="error">*</strong> Indicates required fields.</p>
                </div>
              </div>

              <!-- This would only be available to be viewed by the manager assuming RBAC-role based access control is set up. -->
              <div class="row">
                <div class="col-md-12">
                  <h3 class="text-center"> Record of employees requesting time off.</h3>
                  <?php require 'table.php';?>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
