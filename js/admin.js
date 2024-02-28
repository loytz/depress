let currentPage = 1;
var fetchSummaryChoice = [];
var depressionLevel = 'Low Level';
var fetchAssessmentDate;
var fetchLrn;
var fetchStrand;
var fetchYearLevel;
var fetchDepressionScore;
var date_range_from = "";
var date_range_to = "";
var query_btn = "unclicked";
var currentYear = new Date().getFullYear();
$('.item-22').removeClass('hidden');
$('#change_answer').addClass('d-none');
$('#finish_assessment').addClass('d-none');

var toastMixin = Swal.mixin({
	toast: true,
	icon: 'success',
	title: 'General Title',
	animation: false,
	position: 'top-right',
	showConfirmButton: false,
	timer: 3000,
	timerProgressBar: true,
	didOpen: (toast) => {
	  toast.addEventListener('mouseenter', Swal.stopTimer)
	  toast.addEventListener('mouseleave', Swal.resumeTimer)
   }
 });

// Update the content of the div with the id "year"
document.getElementById("footer-year").innerHTML = currentYear;

// Function to check screen width and display alert
function checkScreenWidth() 
{

  // Check if the screen width is 455px or below
  if (window.innerWidth <= 714) {
    // Display an alert
    $(".navbar-brand").addClass("d-none")
  }
  else
  {
    $(".navbar-brand").removeClass("d-none")
  }

  if (window.innerWidth <= 980) {
    $(".summaryImg").addClass("d-none")
  }
  else
  {
    $('.summaryImg').removeClass("d-none")
  }
}
// Initial check on page load
checkScreenWidth();
// Attach the function to the window.onresize event
window.onresize = checkScreenWidth;
 
function logout()
{
  let logout;
  $.post("login-form/login-controller.php",
  {
    postLogout: 'logout',
  },
  function(data, status){
    if(data == true)
      {
        window.location.href = 'login-form/login.php';
      }
  });
}

//show data tables
function load_data_tables(){
  var ajax_url = "assessment-list-data.php";

  if ( ! $.fn.DataTable.isDataTable( '#assessment_table' ) ) { // check if data table is already exist

  table = $('#assessment_table').DataTable({

    // "processing": true,
    "deferRender": true,
    "serverSide": true,
    "ajax": {
        url: ajax_url,
        data: {
          date_range_from:date_range_from,
          date_range_to:date_range_to,
          query_btn:query_btn,
        },
        "dataSrc": function ( json ) {
          //Make your callback here.
         console.log(json.data)
          return json.data;
      }      
      
    },
    order: [[0,'asc']],
    
    responsive: true,
    fixedHeader: true,
    dom: 'Bfrtip',
    buttons: [
      {
        extend: 'excel',
        text: 'Export Excel',
        className: 'btn rounded-3',
        exportOptions: {
            columns: 'th:not(:last-child)'
        }
      },
      {
        extend: 'print',
        text: 'Print Table',
        className: 'btn rounded-3',
  
        title: 'Advance Mental Health Care',
  
        messageTop: `Learner Assessment Table`,
            //className: 'fa fa-print'
          //className: 'fa fa-print',
          
  
          exportOptions: {
          modifier: {
              page: 'current'
          },
            //columns: [0, 1] //r.broj kolone koja se stampa u PDF
            columns: [0,1,2,3,4,5],
            // optional space between columns
            columnGap: 1
          },
  
          customize: function ( doc ) {
            $(doc.document.body).find('h1').css('font-size', '15pt');
            $(doc.document.body).find('h1').css('text-align', 'center'); 
            $(doc.document.body).find('table').addClass("table-bordered")
            $(doc.document.body).find('table').css('font-size', '15pt');
            $(doc.document.body).find('table').css('width', '100%');
            $(doc.document.body).css('text-align', 'center')
          }
      },
      {
        text: 'Date Filter',
        className: 'btn rounded-3',
        action: function (e, dt, button, config) {
          $("#filter_table").modal("toggle");
        }
      }
    ],
    "lengthMenu": [[10, 50, 100, 500, 1000], [10, 50, 100, 500, 1000]],

    //disable the sorting of colomn
    "columnDefs": [ {
      "targets": 6,
      "orderable": false
      } ],

      "language": {
        "info": "Showing _START_ to _END_ of _TOTAL_ entries",
        "infoFiltered":""
      },

    "columns": [
      null,
      null,
      null,
      null,
      null,
      null,
      {
        "targets": 6,
        "render": function ( data, type, row, meta ) {
          return `<a onclick = 'getSum(this.id)' class='btn btn-outline-success summary-btn' style="margin-left: -15px;" id='${data}' role='button' data-bs-toggle="modal" data-bs-target="#chartModal"> Check Summary</a>`
        },
        
      }
    ],
  });
  
  }
};

load_data_tables()
//show data tables end

function getSum(a)
{ 
  $.post("assessment-controller.php",
  {
    postAssessmentId: a,
  },
  function(data, status){
    showSummary(JSON.parse(data))
  });
}

function showSummary(a)
{
  fetchAssessmentDate = a[0].assessment_date;
  fetchDepressionScore = parseFloat(a[0].depression_score);
  fetchLrn = a[0].lrn;
  fetchStrand = a[0].strand;
  fetchSummaryChoice = JSON.parse(a[0].summary_choice);
  fetchYearLevel = a[0].year_level;

  calculateAssessment (fetchDepressionScore);
  $("#SummaryContent").css("display", "");
  $(".summaryImg").removeClass("d-none");
  CalculateSummary(fetchSummaryChoice);
  countTotalSelectedOptions(fetchSummaryChoice);
  $(".modal-title").text(`LRN: ${fetchLrn}`);

  if (window.innerWidth <= 980) {
    $(".summaryImg").addClass("d-none")
  }
  else
  {
    $('.summaryImg').removeClass("d-none")
  }
}

function calculateAssessment (fetchDepressionScore)
{
   // Use the update method to modify the series options
    const chart = Highcharts.charts[0];
    if (chart && !chart.renderer.forExport) {
        const point = chart.series[0].points[0],
            inc = fetchDepressionScore;

            $('.highcharts-description').text("The individual displays signs of emotional well-being and does not exhibit any indications of depression.");
            $('#main-recommendation').text("Normal")
            if(inc > 1.99)
            {
              depressionLevel = 'Moderate Level';
              $('#main-recommendation').text("Needs counseling and therapy.")
              $('.highcharts-description').text("Recommends seeking counseling and therapeutic intervention to address and navigate personal challenges and emotional well-being.");
            }

            if(inc > 3.99)
            {
              depressionLevel = 'High Level';
              $('#main-recommendation').text("Needs professional help such as medication and therapy.")
              $('.highcharts-description').text("Requires the assistance of qualified professionals, including prescribed medication and psychological therapy, to effectively address and manage the underlying issues affecting mental health. Seeking comprehensive treatment from medical and mental health experts is recommended for optimal support and recovery.");
            }

        //const chartFormat = chart.series[0].userOptions.dataLabels.format,
        const chartFormatLevel = '{y} '+depressionLevel;
        const tooltipFormat = ' ' + depressionLevel;

        chart.series[0].update({
          tooltip: {
            valueSuffix: tooltipFormat
          },
          dataLabels: {
              format: chartFormatLevel
          }
        });

        $("#container").removeClass("d-none");

        // Introduce a delay of 2 seconds (2000 milliseconds) before calling calculateAssessment
        setTimeout(function() {
        point.update(inc);
        }, 500);
    }
}

function CalculateSummary(ArrLength) {
  let SumNo = 1;
  
  for (let i=0; i < ArrLength.length; i++)
  {
    let SummaryOfSelectedOption = 'Strongly Disagree';

    if(ArrLength[i] == 2)
    {
      SummaryOfSelectedOption = 'Disagree'
    }
    else if(ArrLength[i] == 3)
    {
      SummaryOfSelectedOption = 'Neutral'
    }
    else if(ArrLength[i] == 4)
    {
      SummaryOfSelectedOption = 'Agree'
    }
    else if(ArrLength[i] == 5)
    {
      SummaryOfSelectedOption = 'Strongly Agree'
    }

    $(`#summary-${SumNo}`).text(SummaryOfSelectedOption);
    console.log(`Summary: ${SumNo} = ${SummaryOfSelectedOption}`);
    SumNo++;

    $("#SummaryContent").slideDown();
  }

}

function countTotalSelectedOptions(array)
{
  var counts = {};

  $.each(array, function(index, value) {
      if (counts[value] === undefined) {
          counts[value] = 1;
      } else {
          counts[value]++;
      }
  });

  // Display the counts
  $.each(counts, function(key, value) {
      console.log(key + ": " + value);

      if(key == 1)
      {
        $("#total_s_disagree").text(`${value} Total`);
      }

      if(key == 2)
      {
        $("#total_disagree").text(`${value} Total`);
      }

      if(key == 3)
      {
        $("#total_neutral").text(`${value} Total`);
      }

      if(key == 4)
      {
        $("#total_Agree").text(`${value} Total`);
      }

      if(key == 5)
      {
        $("#total_s_Agree").text(`${value} Total`);
      }
  });
}

function printSummary()
{
  const dateString = fetchAssessmentDate.replace(/^(\d{4})-0(\d)-(\d{2})$/, "$1-$2-$3");
  const date = new
  
  Date(dateString);

  const options = {
    month: "long",
    day: "numeric",
    year: "numeric",
  };

  const formattedDate = new
  Intl.DateTimeFormat("en-US", options).format(date);
 
  var props = {
    outputType: jsPDFInvoiceTemplate.OutputType.Save,
    returnJsPDFDocObject: true,
    fileName: "Assessment Summary "+ fetchAssessmentDate.replace(/^(\d{4})-0(\d)-(\d{2})$/, "$1-$2-$3"),
    orientationLandscape: false,
    compress: true,
    logo: {
        src: "assets/images/logo.png",
        type: 'PNG', //optional, when src= data:uri (nodejs case)
        width: 26.66, //aspect ratio = width/height
        height: 26.66,
        margin: {
            top: 0, //negative or positive num, from the current position
            left: 0 //negative or positive num, from the current position
        }
    },
    business: {
          address: "LRN: " + fetchLrn,
          phone: `${fetchStrand} - ${fetchYearLevel}`,
          email_1: `${fetchDepressionScore} ${depressionLevel}`,
          website:  formattedDate,
    },
    invoice: {
        headerBorder: false,
        tableBodyBorder: false,
        header: [
          { 
            title: "Assessment Questions",
            style: {
              width: 130
            } 
          }, 
          { 
            title: "Selected Options",
            style: {
              width: 50
            } 
          }
        ],
        table: Array.from(Array(20), (item, index)=>(
          [
            index+1 + ". " + $(`#t-sum-${index+1}`).text(),
            $(`#summary-${index+1}`).text(),
        ])),
        invDescLabel: $('#main-recommendation').text() + '\n',
        invDesc: $(".highcharts-description").text(),
    },
    footer: {
        text: "Advance Mental Health Care",
    },
    pageEnable: true,
    pageLabel: "Page ",
  };

  //or in browser
  var pdfObject = jsPDFInvoiceTemplate.default(props); //returns number of pages created
}

//filter date range
$("#date_range_btn").click(function()
{
  var from_input = $("#range_from").val()
  var to_input = $("#range_to").val()
  var d_from = new Date(from_input)
  var d_to = new  Date(to_input)
  var validator = true

  if(d_from > d_to)
  {
    $("#range_to").addClass("is-invalid");
    $("#range_to").val("");
    validator =false
  }

  if(validator === true)
  {
        date_range_from = from_input;
        date_range_to = to_input;
        query_btn = "clicked";

        console.log(`${date_range_from} - ${date_range_to}`);

        table.destroy()

        load_data_tables()
        $("#filter_table").modal("toggle");
        
       /* 
        var result_tittle = "Filtered results for: "
        var results =  [];
        let a = 0

        if(date_range_from != "")
        {
          let dateStr = date_range_from;
          let dateObj = new Date(dateStr);
          let readableDate = dateObj.toLocaleDateString('en-US', {month: 'long', day: 'numeric', year: 'numeric'});
          results[a]  = "  Min Date: "+readableDate+""
          a+=1
        }
        if(date_range_to != "")
        {
          let dateStr = date_range_to;
          let dateObj = new Date(dateStr);
          let readableDate = dateObj.toLocaleDateString('en-US', {month: 'long', day: 'numeric', year: 'numeric'});
          results[a] = "  Max Date: "+readableDate+""
          a+=1
        }

        if (results.length > 0) 
        {
          $("#search_result").html("<a><span class='me-2 fw-semibold' >"+result_tittle+"</span><span>"+results+"</span></a>")
          $("#search_result").removeClass("d-none")
        }
        else
        {
          $("#search_result").html("")
          $("#search_result").addClass("d-none")
        }*/
  }

})
//filter date range end

// Function to generate a random alphanumeric code
function generateRandomCode(length) {
  const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  let code = '';
  for (let i = 0; i < length; i++) {
    const randomIndex = Math.floor(Math.random() * characters.length);
    code += characters.charAt(randomIndex);
  }
  return code;
  }

function change_email()
{
  $("#settings-modal-title").text("Change Email");

  $("#change-email-form").removeClass("d-none");
  $("#change-password-form").addClass("d-none");
  $("#change-adminDtails-form").addClass("d-none");

  // Check if the modal is not already toggled
  if (!$("#change-profile-modal").hasClass("show")) {
      $("#change-profile-modal").modal("toggle");
  }
}

function change_email_password_verification()
{
  let adminPassword = $("#newEmailEnterPass");
  let adminNewEmail = $("#newEmail");
  let verifyNow = true;
  // Regular expression for email validation
	var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

	// Check if the entered email matches the pattern
	if (emailRegex.test(adminNewEmail.val()) == false) {
		adminNewEmail.addClass("is-invalid");
		verifyNow = false;
	}

  if(adminPassword.val().length < 1)
  {
    adminPassword.addClass("is-invalid");
		verifyNow = false;
  }

  if(verifyNow)
  {
    adminNewEmail.removeClass("is-invalid");
    adminPassword.removeClass("is-invalid");
    $("#send_otp_email_loading").removeClass("d-none");
    $("#newEmail-verify-password").addClass("d-none");
    verifyPassword(adminPassword.val(), 'change email');
  }
}

function return_change_email()
{
  $("#newEmail-verify-password").removeClass("d-none");
  $("#newEmailBody").removeClass("d-none");
  $("#newEmailEnterPassBody").removeClass("d-none");

  $("#change_email_now_btn").addClass("d-none");
  $("#newEmailVerifyBody").addClass("d-none");
}

function emailVerify()
{
  let email_code = generateRandomCode(6);
  $.post("admin-controller.php",
		{
			new_admin_email: $("#newEmail").val(),
      email_verification_code: email_code
		},
		function(data, status){

      $("#send_otp_email_loading").addClass("d-none");

      if(data == "Email code has been sent.")
      {
         toastMixin.fire({
					animation: true,
					title: data,
					icon: 'success'
					});

          $("#newEmailBody").addClass("d-none");
          $("#newEmailEnterPassBody").addClass("d-none");

          $("#change_email_now_btn").removeClass("d-none");
          $("#newEmailVerifyBody").removeClass("d-none");
      }
      else
      {
        toastMixin.fire({
					animation: true,
					title: data,
					icon: 'error'
					});

          $("#newEmail-verify-password").removeClass("d-none");
          console.log(data)
      }

		});

    $("#change_email_now").click(function() {
        let inputCode = $("#newEmailVerify");
        let verifyNow = true;

        if (inputCode.val().length < 1) {
            inputCode.addClass("is-invalid");
            verifyNow = false;
        }

        if(email_code != inputCode.val())
        {
           verifyNow = false;
           toastMixin.fire({
            animation: true,
            title: 'Email verification code dot not match.',
            icon: 'error'
            });
        }

        if (verifyNow) {
          console.log(`${email_code} == input code: ${inputCode.val()}`);
          change_email_now()
        }
    });

}

function change_email_now()
{
  $.post("admin-controller.php",
		{
			new_admin_email: $("#newEmail").val(),
      admin_password: $("#newEmailEnterPass").val(),
      change_email_now: true
		},
		function(data, status){

      if(data == "Email change successful.")
      {
         toastMixin.fire({
					animation: true,
					title: data,
					icon: 'success'
					});

          setTimeout(function() {
						location.reload();
					}, 3000);
      }
      else
      {
        toastMixin.fire({
					animation: true,
					title: data,
					icon: 'error'
					});
      }

		});
}

function change_password()
{
  $("#settings-modal-title").text("Change Password");

  $("#change-email-form").addClass("d-none");
  $("#change-password-form").removeClass("d-none");
  $("#change-adminDtails-form").addClass("d-none");

  // Check if the modal is not already toggled
  if (!$("#change-profile-modal").hasClass("show")) {
      $("#change-profile-modal").modal("toggle");
  }
}

function change_password_verification()
{
  let adminPassword = $("#newPassEnterOldPass");
  let verifyNow = true;

  if(adminPassword.val().length < 1)
  {
    adminPassword.addClass("is-invalid");
		verifyNow = false;
  }

  if(verifyNow)
  {
    adminPassword.removeClass("is-invalid");
    verifyPassword(adminPassword.val(), 'change password');
  }
}

function change_password_now()
{
  let old_password = $("#newPassEnterOldPass").val();
  let new_password = $("#newPassEnterNewPass");
  let repeat_newPassword = $("#newPassReEnterNewPass");
  let changePass = true;

  if(new_password.val().length < 1)
  {
    new_password.addClass("is-invalid");
    changePass = false;
  }

  if(repeat_newPassword.val().length < 1)
  {
    repeat_newPassword.addClass("is-invalid");
    $("#newPassReEnterNewPass_feedback").text("Invalid Repeat-password!")
    changePass = false;
  }

  if(new_password.val() != repeat_newPassword.val())
  {
    repeat_newPassword.addClass("is-invalid");
    $("#newPassReEnterNewPass_feedback").text("Password and Repeat-password do not match!")
    changePass = false;
  }

  if(changePass)
  {
      $.post("admin-controller.php",
      {
        old_password: old_password,
        new_password: new_password.val(),
        change_password_now: true
      },
      function(data, status){

        if(data == "Password change successful.")
        {
          toastMixin.fire({
            animation: true,
            title: data,
            icon: 'success'
            });

            setTimeout(function() {
              location.reload();
            }, 3000);
        }
        else
        {
          toastMixin.fire({
            animation: true,
            title: data,
            icon: 'error'
            });
        }

      });
  }
}

function change_adminDetails()
{
  $("#settings-modal-title").text("Change Admin Details");

  $("#change-email-form").addClass("d-none");
  $("#change-password-form").addClass("d-none");
  $("#change-adminDtails-form").removeClass("d-none");

  // Check if the modal is not already toggled
  if (!$("#change-profile-modal").hasClass("show")) {
      $("#change-profile-modal").modal("toggle");
  }
}

function change_adminDetails_verification()
{
  let adminPassword = $("#newDetailsEnterOldPass");
  let verifyNow = true;

  if(adminPassword.val().length < 1)
  {
    adminPassword.addClass("is-invalid");
		verifyNow = false;
  }

  if(verifyNow)
  {
    adminPassword.removeClass("is-invalid");
    verifyPassword(adminPassword.val(), 'change adminDetails');
  }
}

function change_adminDetails_now()
{
  let admin_password = $("#newDetailsEnterOldPass").val();
  let fname = $("#fname");
  let mname = $("#mname");
  let lname = $("#lname");
  let occupation = $("#occupation");
  let changeDetails = true;

  if(fname.val().length < 1)
  {
    fname.addClass("is-invalid");
    changeDetails = false;
  }

  if(mname.val().length < 1)
  {
    mname.addClass("is-invalid");
    changeDetails = false;
  }

  if(lname.val().length < 1)
  {
    lname.addClass("is-invalid");
    changeDetails = false;
  }

  if(occupation.val().length < 1)
  {
    occupation.addClass("is-invalid");
    changeDetails = false;
  }

  if(changeDetails)
  {
      $.post("admin-controller.php",
      {
        admin_password: admin_password,
        fname: fname.val(),
        mname: mname.val(),
        lname: lname.val(),
        occupation: occupation.val(),
        change_adminDetails_now: true
      },
      function(data, status){

        if(data == "Admin details change successful.")
        {
          toastMixin.fire({
            animation: true,
            title: data,
            icon: 'success'
            });

            setTimeout(function() {
              location.reload();
            }, 3000);
        }
        else
        {
          toastMixin.fire({
            animation: true,
            title: data,
            icon: 'error'
            });
        }

      });
  }
}

function verifyPassword(password, event)
{
  $.post("admin-controller.php",
		{
			verifyPassword: password,
		},
		function(data, status){

			let isUserVerified;

			if(data == 'Password verified.')
			{
        if(event != 'change email')
        toastMixin.fire({
					animation: true,
					title: data,
					icon: 'success'
				});

        isUserVerified = true;
			}
			else
			{
				toastMixin.fire({
					animation: true,
					title: data,
					icon: 'error'
					});

          isUserVerified = false;
          $("#send_otp_email_loading").addClass("d-none");
          $("#newEmail-verify-password").removeClass("d-none");
			}

      if(event == 'change email' && isUserVerified)
      {
        toastMixin.fire({
          animation: true,
          title: 'Password verified. Proceeding to send a code to your new email.',
          icon: 'success'
        });
        emailVerify();
      }

      if(event == 'change password' && isUserVerified)
      {
        $(".changePassNotVerified").addClass("d-none");
        $(".changePassVerified").removeClass("d-none");
      }

      if(event == 'change adminDetails' && isUserVerified)
      {
        $(".changeAdminDtailsNotVerified").addClass("d-none");
        $(".changeAdminDtailsVerified").removeClass("d-none");
      }

		});
}



//Chart Calculations
Highcharts.chart('container', {

  chart: {
      type: 'gauge',
      plotBackgroundColor: null,
      plotBackgroundImage: null,
      plotBorderWidth: 0,
      plotShadow: false,
      height: '80%'
  },

  title: {
      text: 'Depression Level'
  },

  pane: {
      startAngle: -90,
      endAngle: 89.9,
      background: null,
      center: ['50%', '75%'],
      size: '110%'
  },

  // the value axis
  yAxis: {
      min: 1,
      max: 5,
      tickPixelInterval: 72,
      tickPosition: 'inside',
      tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
      tickLength: 20,
      tickWidth: 2,
      minorTickInterval: null,
      labels: {
          distance: 20,
          style: {
              fontSize: '14px'
          }
      },
      lineWidth: 0,
      plotBands: [{
          from: 0,
          to: 2,
          color: '#55BF3B', // green
          thickness: 20
      }, {
          from: 2,
          to: 3,
          color: '#DDDF0D', // yellow
          thickness: 20
      }, {
          from: 3,
          to: 4,
          color: '#FF4500', // orange
          thickness: 20
      }, {
        from: 4,
        to: 5,
        color: '#EC0D00', // red
        thickness: 20
    }]
  },

  series: [{
      name: 'Depression Level',
      data: [1],
      tooltip: {
          valueSuffix: ' ' + depressionLevel
      },
      dataLabels: {
          format: '{y} ' + depressionLevel,
          borderWidth: 0,
          color: (
              Highcharts.defaultOptions.title &&
              Highcharts.defaultOptions.title.style &&
              Highcharts.defaultOptions.title.style.color
          ) || '#333333',
          style: {
              fontSize: '16px'
          }
      },
      dial: {
          radius: '80%',
          backgroundColor: 'gray',
          baseWidth: 12,
          baseLength: '0%',
          rearLength: '0%'
      },
      pivot: {
          backgroundColor: 'gray',
          radius: 6
      }

  }]

});
 