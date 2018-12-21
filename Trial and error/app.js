// var date = new Date();
// date.setDate(date.getDate());

// $('#dates input').datepicker({
//   format: "dd/mm/yyyy",
//   orientation: "auto",
//   startDate: date,
//   clearBtn: true
// });
// $(".datepicker").datepicker({
//     showOn: 'button',
//     dateFormat: "yy-mm-dd",
//     changeMonth: true,
    
//      minDate: new Date,
     
//     changeYear: true,
//     autoclose: false
// });

$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#leaveDuration span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#leaveDuration').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
        //    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        //    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        //    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        //   'This Month': [moment().startOf('month'), moment().endOf('month')],
        //   'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});
// # USING JQUERY
// let dropdown = $('#form_store_location');

// dropdown.empty();

// dropdown.append('<option selected="true" disabled>Choose your Store</option>');
// dropdown.prop('selectedIndex', 0);

// const url = 'https://hogsaltapi.com/hog_stores';

// // Populate dropdown with list of stores
// $.getJSON(url, function (data, objName) {
//     console.log("This is your data:", data[0]);
//     // let JSONObject = Object.keys(data);
//     // console.log("This is your Json object"+ JSONObject);
//     // #JSON.parse() does not allow trailing commas; this helps us get rid of them.
//     let JSONObject = JSON.parse(JSON.stringify(data));
//     // console.log("This is your Json object"+ JSONObject);
//     // let result = '';
//     //     for (var i in data) {
//     //       // data.hasOwnProperty() is used to filter out properties from the object's prototype chain
//     //       if (data.hasOwnProperty(i)) {
//     //         result += objName + '.' + i + ' = ' + data[i] + '\n';
//     //         console.log("Your result is" + result);
//     //       }
//     //     }
    
//   $.each(data, function (key, entry) {
//       console.log("This is your entry:" + entry);
//       let JSONObject_2 = JSON.parse(JSON.stringify(entry));
//     //   console.log("This is your Json object 2 "+ JSONObject_2);
//     //  let result_2 = '';
//     //  for (var i in entry) {
//         //  console.log("entry first index is " + Object.values(entry));
//         //  console.log("entry first index is " + Object.keys(entry));
//          Object.entries(entry).forEach(entry => {
//             let key = entry[0];
//             console.log("key is " + key);
//             let value = entry[1];
//             console.log("value is " + value);
//             //use key and value here
//           });
//         //  console.log("fun with entries " + entry_1);
//         //  Object.entries(entry).forEach(([key, value]) => console.log(`${key}: ${value}`));
//         //  console.log("entry second index is " + Object.entries(entry));
//         // entry.hasOwnProperty() is used to filter out properties from the object's prototype chain
//         // if (entry.hasOwnProperty(i)) {
//             // let result_3 = entry[i];
//         //    console.log("result_3 is "  + result_3);
//         //   result_2 += entry + '.' + i + ' = ' + entry[i] + '\n';
//         //  console.log("Your result_2 is" + result_2);
//          dropdown.append($('<option></option>').attr('value', entry.value.city).text(entry.key.name));
//         // }
//     //   }
   
//   })
// });

// #USING VANILLA JAVASCRIPT
window.onload = function what(){
let dropdown = document.getElementById('form_store_location');
dropdown.length = 0;
// console.log("dropdown " + dropdown);
// var arr = [];
// dropdown.length = arr.length;


let defaultOption = document.createElement('option');
defaultOption.text = 'Choose your store';

dropdown.add(defaultOption);
dropdown.selectedIndex = 0;

const url = 'https://hogsaltapi.com/hog_stores';

const request = new XMLHttpRequest();
request.open('GET', url, true);

request.onload = function() {
  if (request.status === 200) {
    const data = JSON.parse(request.responseText);
    // console.log("data is " + data);
    // console.log("responseText is " + request.responseText);
    let option;
    for (let i = 0; i < data.length; i++) {
      option = document.createElement('option');
      option.text = data[i].name;
    // console.log("data is " + data[i].name);      
      option.value = data[i].city;
      dropdown.add(option);
    }
   } else {
    // Reached the server, but it returned an error
    console.log("Error running this stuff");
  }   
}

request.onerror = function() {
  console.error('An error occurred fetching the JSON from ' + url);
};

request.send();
}

//#USING FETCH
// let dropdown = document.getElementById('form_store_location');
// dropdown.length = 0;

// let defaultOption = document.createElement('option');
// defaultOption.text = 'Choose your store';

// dropdown.add(defaultOption);
// dropdown.selectedIndex = 0;

// const url = 'https://hogsaltapi.com/hog_stores';

// fetch(url)  
//   .then(  
//     function(response) {  
//       if (response.status !== 200) {  
//         console.warn('Looks like there was a problem. Status Code: ' + 
//           response.status);  
//         return;  
//       }

//       // Examine the text in the response  
//       response.json().then(function(data) {  
//         let option;
    
//     	for (let i = 0; i < data.length; i++) {
//           option = document.createElement('option');
//       	  option.text = data[i].name;
//       	  option.value = data[i].city;
//       	  dropdown.add(option);
//     	}    
//       });  
//     }  
//   )  
//   .catch(function(err) {  
//     console.error('Fetch Error -', err);  
//   });