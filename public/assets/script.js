const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

// searchBtn.addEventListener("click" , () =>{
//     sidebar.classList.remove("close");
// })

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";
        
    }
});
$(document).ready(function () {
    $('#table').DataTable();
});

$(document).ready(function () {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
  });

//   USE SWEET ALERT TO CONFIRM DELETE ACTION 
function deleteMe(event)
{

   event.preventDefault();
     var urlTo = event.currentTarget.getAttribute('href');
     console.log(urlTo);
     Swal.fire({
       
         title: "Are You Sure You want to Remove The Item?",
         title: "This action can not be reversed!!",
         icon:'warning',
         showDenyButton: true,
         showCancelButton: false,
         confirmButtonText: `Yes`,
         denyButtonText: `No`,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         animation : "slide-from-top",
       }).then((result) => {
         if (result.isConfirmed) {
    
         window.location.href= urlTo;            }
   });
}

 
//   USE SWEET ALERT TO SUBMIT FORM INSTEAD OF BUTTON DIRECTLY 
  $('.finalpost').click(function (e){
    e.preventDefault();
    let form = $(this).parents('form');

    // var form =  $(this).closest("form");
    // var name = $(this).data("name");
   
    Swal.fire({
        title: 'Do you want to save the changes?',
        icon:'warning',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Save',
        denyButtonText: `Don't save`,
    })
    .then((result) => {
        if (result.isConfirmed) {
            form.submit();
      }
    });
});

// USE SWEET ALERT TO CONFIRM LOGOUT ACTION 
function logoutNow(event){
    event.preventDefault();
        Swal.fire({
        title: 'logout!',
        text: 'Do you want to logout?',
        icon:'warning',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'yes',
        denyButtonText: `No`,
    })
    .then((result) => {
        if (result.isConfirmed) {
            document.getElementById('logout-form').submit();
      }
    });
    
}
// USE SWEET ALERT TO SUBMIT FORM 
function addStaff(event){
    event.preventDefault();
        Swal.fire({
        title: 'Do you want to Add Staff?',
        text: 'You can edit This Later',
        icon:'warning',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Yes',
        denyButtonText: `No`,
    })
    .then((result) => {
        if (result.isConfirmed) {
            document.getElementById('staff-form').submit();
      }
    });
    
}

// USE INITIALIZE DATATABLE 
$(document).ready(function()
{
  $("#dataTable").DataTable();

});





function getMyLocation() {
       if (navigator.geolocation) {
           navigator.geolocation.getCurrentPosition(
               // Success function
               showPosition, 
               // Error function
               showError, 
               // Options. See MDN for details.
               {
               enableHighAccuracy: true,
               timeout: 5000,
               maximumAge: 0
               });
       } else { 
           alert("Geolocation is not supported by this browser.");
       }
   }

   function showPosition(position) {
       var latlon = position.coords.latitude + "," + position.coords.longitude;
       Swal.fire({
               title: "Thank you! Your Current Location is: "+latlon,
               icon:'success',
               showDenyButton: false,
               showCancelButton: false
       });
   }
   function showError(error) {
       switch(error.code) {
           case error.PERMISSION_DENIED:
           Swal.fire({
               title: "Please! Allow System To Get Your Location Before Making An attendence",
               icon:'warning',
               showDenyButton: true,
               showCancelButton: false,
               confirmButtonText: `Yes`,
               denyButtonText: `No`,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
           }).then((result) => {
               if(result.isConfirmed){
                   
               }else{
                       getMyLocation();
               }
           });
           break;
           case error.POSITION_UNAVAILABLE:
           alert("Location information is unavailable.");
               break;
           case error.TIMEOUT:
            Swal.fire({
                title: "The request to get user location timed out.",
                icon:'warning',
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: `Ok`,
                denyButtonText: `No`,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
            }); 
               break;
           case error.UNKNOWN_ERROR:
           alert("An unknown error occurred.")
               break;
       }
   }

   function success(pos) {
    const crd = pos.coords;
  
    console.log('Your current position is:');
    console.log(`Latitude : ${crd.latitude}`);
    console.log(`Longitude: ${crd.longitude}`);
    console.log(`More or less ${crd.accuracy} meters.`);
  }
  
  function error(err) {
    console.warn(`ERROR(${err.code}): ${err.message}`);
  }
  
  navigator.geolocation.getCurrentPosition(success, error, options);

// GEOLOCATION VENUE COORDINATES
p1='-6.214064', '35.809591';
p2='-6.214064, 35.809714';
p3='-6.213941', '35.809713';
p4='-6.213939', '35.809580';
utawala = '-6.216389,35.809175';
topleft='-6.213749, 35.809565';
// -6.2156005090869115,35.80922622003544uta

// audi -6.180587,35.747513
// -6.1805165,35.74754025

// audii-6.180601228310502,35.74754963013699

// block 5
-6.7963,39.2847
// NJE BLOCK 5 
-6.7963 , 39.2847




  if(lox > minlat && lox <maxlat)
    {
    if(lox.long >minlong && lox.long< maxlong)
    {
    // LOCATED AT VENUE HUSIKA... LRB 104;
    }
    }
    
    function MakeAttendance(event, minlat){
        event.preventDefault();
            Swal.fire({
            title: 'Do you want to take attendance? ' ,
            text: 'You can edit This Later',
            icon:'warning',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
        })
        .then((result) => {
            if (result.isConfirmed) {
                accessMyLocation(minlat);
            // document.getElementById('form-attendence-add').submit();      

          }
        });        
    }

    function accessMyLocation(minlat) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                // Success function
                checkPosition, 
                // Error function
                showError, 
                // Options. See MDN for details.
                {
                enableHighAccuracy: true,
                timeout: 5000,
                maximumAge: 0
                });
        } else { 
            alert("Geolocation is not supported by this browser.");
        }
    }

    function checkPosition(position) 
    {
        var currlatitude =Number(position.coords.latitude);
        var currlongitude =Number(position.coords.longitude);
        
        var minlat= document.getElementById('form-attendence-add').min_lat.value;
        var maxlat= Number(document.getElementById('form-attendence-add').max_lat.value);
        var minlong= Number(document.getElementById('form-attendence-add').min_long.value);
        var maxlong= Number(document.getElementById('form-attendence-add').max_long.value);
     
        if(minlat < currlatitude && maxlat > currlatitude  )
        {
            if(minlong < currlongitude && maxlong > currlongitude  )
            {
                Swal.fire(
                {
                title: 'You are At Venue : ',
                text: 'Confirm make attendence',
                icon:'warning',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Yes',
                denyButtonText: `No`,
                }
                )
                .then((result) => {
                    if (result.isConfirmed) {
                    document.getElementById('form-attendence-add').submit();      
                }
                }); 
            }
            else
            {
                Swal.fire({
                    title: "Dear Student You can Not Take attendance as you are not in The requested Venue",
                text: 'min:  ' + minlong +' cur: ' +currlongitude+' max: ' +maxlong,
                    icon:'warning',
                    showDenyButton: false,
                    showCancelButton: false,
                    confirmButtonText: `Ok`,
                    denyButtonText: `No`,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                }); 
            }
        }
        else
        {
            Swal.fire({
                title: "Dear Student You can Not Take attendance as you are not in The requested Venue",
            text: 'min:  ' + minlat +' cur: ' +currlatitude+' max: ' +maxlat,
                icon:'warning',
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: `Ok`,
                denyButtonText: `No`,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
            }); 
        }
    }

    function checkError(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
            Swal.fire({
                title: "Please! Allow System To Get Your Location Before Making An attendence",
                icon:'warning',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: `Yes`,
                denyButtonText: `No`,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
            }).then((result) => {
                if(result.isConfirmed){
                    
                }else{
                    accessMyLocation();
                }
            });
            break;
            case error.POSITION_UNAVAILABLE:
            alert("Location information is unavailable.");
                break;
            case error.TIMEOUT:
             Swal.fire({
                 title: "The request to get user location timed out.",
                 icon:'warning',
                 showDenyButton: false,
                 showCancelButton: false,
                 confirmButtonText: `Ok`,
                 denyButtonText: `No`,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
             }); 
                break;
            case error.UNKNOWN_ERROR:
            alert("An unknown error occurred.")
                break;
        }
    }
 


    // QR CODE SCANNER

//     function onScanSuccess(decodedText, decodedResult) {
//         // handle the scanned code as you like, for example:
//         console.log(`Code matched = ${decodedText}`, decodedResult);
//       }
      
//       function onScanFailure(error) {
//         // handle scan failure, usually better to ignore and keep scanning.
//         // for example:
//         console.warn(`Code scan error = ${error}`);
//       }
      
//       let html5QrcodeScanner = new Html5QrcodeScanner(
//         "reader",
//         { fps: 10, qrbox: {width: 250, height: 250} },
//         /* verbose= */ false);
//       html5QrcodeScanner.render(onScanSuccess, onScanFailure);

//       const html5QrCode = new Html5Qrcode(/* element id */ "reader");
// // File based scanning
// const fileinput = document.getElementById('qr-input-file');
// fileinput.addEventListener('change', e => {
//   if (e.target.files.length == 0) {
//     // No file selected, ignore 
//     return;
//   }

//   const imageFile = e.target.files[0];
//   // Scan QR Code
//   html5QrCode.scanFile(imageFile, true)
//   .then(decodedText => {
//     // success, use decodedText
//     console.log(decodedText);
//   })
//   .catch(err => {
//     // failure, handle it.
//     console.log(`Error scanning file. Reason: ${err}`)
//   });
// });


// function onScanSuccess(decodedText, decodedResult) {
//     console.log(`Code scanned = ${decodedText}`, decodedResult);
// }
// var html5QrcodeScanner = new Html5QrcodeScanner(
//  "qr-reader", { fps: 10, qrbox: 250 });
// html5QrcodeScanner.render(onScanSuccess);

function onScanSuccess(qrCodeMessage) { /** decoded message */ }
var html5QrcodeScanner = new Html5QrcodeScanner(
    "qr-reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess);

