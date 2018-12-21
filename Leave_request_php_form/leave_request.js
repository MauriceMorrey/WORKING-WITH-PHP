// window.onload = function what(){


$(document).ready(function () {

    // initialize the validator
    $("#leave_request_form").validator();


    // when the form is submitted
    $("#leave_request_form").on("submit", function (e) {

        // if the validator does not prevent form submit
        if (!e.isDefaultPrevented()) {
            var url = "access_data.php";

            // POST values in the background the the script URL
            $.ajax({
                type: "POST",
                url: url,
                data: $(this).serialize(),
                success: function (data)
                {
                    // data = JSON object that contact.php returns

                    // we recieve the type of the message: success x danger and apply it to the 
                    var messageAlert = "alert-" + data.type;
                    var messageText = data.message;

                    // let"s compose Bootstrap alert box HTML
                    var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';                    
                    
                    // If we have messageAlert and messageText
                    if (messageAlert && messageText) {
                        // inject the alert to .messages div in our form
                        $("#leave_request_form").find(".messages").html(alertBox);
                        // empty the form
                        $("#leave_request_form")[0].reset();
                    }
                }
            });
            return false;
        }
    })
});
// }

// # Time duration functionality
// window.onload = function what(){

// # Using Date Ranger Picker to set predefined date ranges. Not Quite working as expected(only doing 80%of what it should be doing); so I went ahead and used the traditional date input type in the html as well. 
$(function() {

    var start = moment().subtract(29, "days");
    var end = moment();

    function cb(start, end) {
        $("#leaveDuration span").html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
    }

    $("#leaveDuration").daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           "Today": [moment(), moment()],
        //    "Yesterday": [moment().subtract(1, "days"), moment().subtract(1, "days")],
        //    "Last 7 Days": [moment().subtract(6, "days"), moment()],
        //    "Last 30 Days": [moment().subtract(29, "days"), moment()],
        //   "This Month": [moment().startOf("month"), moment().endOf("month")],
        //   "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
        }
    }, cb);

    cb(start, end);

});
// }

// #USING VANILLA JAVASCRIPT TO POPULATE DROPDOWN MENU

//window.onload is assigned to the what function which is does the same job as document.ready in jquery.
window.onload = function what(){

    //get the select element
    let dropdown = document.getElementById("form_store_location");

    //clear all options in the element
    dropdown.length = 0;
    // console.log("dropdown " + dropdown);
    // var arr = [];
    // dropdown.length = arr.length;
    
    //add/append default option
    let defaultOption = document.createElement("option");
    defaultOption.text = "Choose your store";
    
    dropdown.add(defaultOption);

    //set placeholder item
    dropdown.selectedIndex = 0;
    
    // define API url(source of the JSON data)
    const url = "https://hogsaltapi.com/hog_stores";
    
    //initialize request
    const request = new XMLHttpRequest();
    request.open("GET", url, true);
    
    request.onload = function() {
      if (request.status === 200) {
          
        //parse received data
        const data = JSON.parse(request.responseText);
        // console.log("data is " + data);
        // console.log("responseText is " + request.responseText);

        //create option element for each entry found
        let option;
        for (let i = 0; i < data.length; i++) {
          option = document.createElement("option");
          option.text = data[i].name;
        // console.log("data is " + data[i].name);      
          option.value = data[i].city;

          // add option element to the select list
          dropdown.add(option);
        }
       } else {
        // Reached server, but returned an error
        console.log("Error running this stuff");
      }   
    }
    
    request.onerror = function() {
      console.error("An error occurred fetching the JSON from " + url);
    };
    
    //send the remote request
    request.send();
    }
    