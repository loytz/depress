let currentPage = 1;
let selectedOptions = [];
let depressionLevel = 'Low Level'
var totalLevel = 0;
var submitnow = true;
var newly_inserted_assessment_id = 0;
const items = document.querySelectorAll('.item');

// Create a new Date object
var currentDate = new Date();

// Get various components of the current date
var year = currentDate.getFullYear();
var month = currentDate.getMonth() + 1; // Months are zero-based, so add 1
var day = currentDate.getDate();
var hours = currentDate.getHours();
var minutes = currentDate.getMinutes();
var seconds = currentDate.getSeconds();

// Update the content of the div with the id "year"
document.getElementById("footer-year").innerHTML = year;

// Array of month names
var monthNames = [
  "January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];

// Convert numeric month to word
var monthWord = monthNames[month - 1]; // Subtract 1 because array is zero-based

function showPage(pageNumber) {
  $(".radio-error-msg").addClass("d-none");
    items.forEach((item, index) => {
        if (index + 1 === pageNumber) {
          item.classList.remove('hidden');
        } else {
            item.classList.add('hidden');
        }
    });
}

function nextPage() {
  let hasLRN = true;
  let lrnId = $("#lrn_input");
  let strand = $("#strand_input");
  let yearLevel = $("#year_level_input");
  let invalidIrnMsgId = $("#invalid_lrn_msg");
  let invalidStrandMsgId = $("#invalid_strand_msg");
  let invalidYearLevelMsgId = $("#invalid_year_level_msg");

  if (lrnId.val().length < 12) 
  {
    invalidIrnMsgId.removeClass("d-none");
    hasLRN = false;
  }

  if (strand.val().length < 1) 
  {
    invalidStrandMsgId.removeClass("d-none");
    hasLRN = false;
  }

  if (yearLevel.val().length < 1) 
  {
    invalidYearLevelMsgId.removeClass("d-none");
    hasLRN = false;
  }

  if(hasLRN)
  {
    invalidIrnMsgId.addClass("d-none");
    invalidStrandMsgId.addClass("d-none");
    invalidYearLevelMsgId.addClass("d-none");

    if (currentPage <= 21) {
      let radiobutton = currentPage - 1;
      let hasChecked = true
      if(radiobutton != 0)
      {
        if (!$("input[name='radio"+radiobutton+"']:checked").length > 0) {
          // Remove d-none class from p tag with class radio-error-msg
          $(".radio-error-msg").removeClass("d-none");
          hasChecked = false;
          submitnow = false;
        }
        else
        {
          recordSelectedOption (radiobutton);
        }
      }

      if(hasChecked)
      { 
        currentPage++; 

        if(currentPage > 21)
        {
          calculateAssessment();
        }
        
        submitnow = true;
        showPage(currentPage); 
        
      }
    }
  }

}

function previousPage() {
    if (currentPage > 1) {
        currentPage--;

        if (selectedOptions.length > 0) {
          selectedOptions.pop(); // Removes the last element from the array
        } 
        showPage(currentPage);
        $("#SummaryContent").slideUp();
    }
}

function recordSelectedOption (radiobutton)
{
  if (selectedOptions.length < 20)
  {
    let optionValue = $("input[name='radio"+radiobutton+"']:checked").val();
    let integerOptionValue = parseInt(optionValue, 10);
    selectedOptions.push(integerOptionValue);
    console.log(selectedOptions);
    console.log(`Question: ${radiobutton} - Selected: ${optionValue}`);
  }
}

function calculateAssessment ()
{
    console.log(selectedOptions);
    // Calculate the sum of ratings
    const sum = selectedOptions.reduce((acc, selectedOptions) => acc + selectedOptions, 0);

    // Calculate the mean
    const mean = sum / selectedOptions.length;

    totalLevel = mean;

    // Output the mean
    console.log('Mean Rating:', mean);

    // Use the update method to modify the series options
    const chart = Highcharts.charts[0];
    if (chart && !chart.renderer.forExport) {
        const point = chart.series[0].points[0],
            inc = mean;

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
        point.update(mean);
        }, 500);

        CalculateSummary(selectedOptions.length);
        countTotalSelectedOptions(selectedOptions)
    }
}

function CalculateSummary(ArrLength) {
  let SumNo = 1;
  for (let i=0; i < ArrLength; i++)
  {
    let SummaryOfSelectedOption = 'Strongly Disagree';

    if(selectedOptions[i] == 2)
    {
      SummaryOfSelectedOption = 'Disagree'
    }
    else if(selectedOptions[i] == 3)
    {
      SummaryOfSelectedOption = 'Neutral'
    }
    else if(selectedOptions[i] == 4)
    {
      SummaryOfSelectedOption = 'Agree'
    }
    else if(selectedOptions[i] == 5)
    {
      SummaryOfSelectedOption = 'Strongly Agree'
    }

    $(`#summary-${SumNo}`).text(SummaryOfSelectedOption);
    console.log(`Summary: ${SumNo} = ${SummaryOfSelectedOption}`);
    SumNo++;

    $("#SummaryContent").slideDown();
  }

}

function validateInput() {
let inputField = document.getElementById('lrn_input');
let inputFieldYearLevel = document.getElementById('year_level_input');

let inputValue = inputField.value;
let inputFieldYearLevelValue = inputFieldYearLevel.value;

// Remove non-numeric characters
let numericValue = inputValue.replace(/\D/g, '');
let inputFieldYearLevelValueNumericValue = inputFieldYearLevelValue.replace(/\D/g, '');

// Limit to 12 digits
numericValue = numericValue.substring(0, 12);
inputFieldYearLevelValueNumericValue = inputFieldYearLevelValueNumericValue.substring(0, 12);

// Update the input field
inputField.value = numericValue;
inputFieldYearLevel.value = inputFieldYearLevelValueNumericValue;
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

function changeAnswers()
{
  previousPage()

  $("#reSub").removeClass("d-none");
  $("#newSub").addClass("d-none");
}

function reSubmit()
{
  nextPage()

  if(submitnow)
    {
      let lrnId = $("#lrn_input").val();
      let strand = $("#strand_input").val();
      let yearLevel = $("#year_level_input").val();

      $.post("assessment-controller.php",
      {
        postSelectedOptions: selectedOptions, // Convert array to JSON string,
        postTotalLevel: totalLevel,
        postLrn: lrnId,
        postStrand: strand,
        postYearLevel: yearLevel,
        postAssemenTd: newly_inserted_assessment_id,
        updateSub:true
      },
      function(data, status){
        //console.log(JSON.parse(data));
        
        if(data != "Error update.")
        {
          console.log(data);
        }

      });
    }
}

function newSubmit()
{
  nextPage()

  if(submitnow)
  {
    let lrnId = $("#lrn_input").val();
    let strand = $("#strand_input").val();
    let yearLevel = $("#year_level_input").val();

    console.log("Post LRN: "+lrnId);

    $.post("assessment-controller.php",
		{
			postSelectedOptions: selectedOptions, // Convert array to JSON string,
      postTotalLevel: totalLevel,
      postLrn: lrnId,
      postStrand: strand,
      postYearLevel: yearLevel,
      newSub:true
		},
		function(data, status){
      //console.log(JSON.parse(data));
      
      if(data != "Error insertion.")
      {
        console.log(data);
        newly_inserted_assessment_id = parseInt(data);
      }

	  });
  }
}

function printSummary()
{
 
  var props = {
    outputType: jsPDFInvoiceTemplate.OutputType.Save,
    returnJsPDFDocObject: true,
    fileName: "Assessment Summary "+ year + '-' + month + '-' + day,
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
          address: "LRN: " + $('#lrn_input').val() ,
          phone: `${$('#strand_input').val()} - ${$('#year_level_input').val()}`,
          email_1: `${totalLevel} ${depressionLevel}`,
          website:  monthWord + ' ' + day + ', ' + year,
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
            $(`#t-${index+1}`).text(),
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

// Function to check screen width and display alert
function checkScreenWidth() {
  // Check if the screen width is 455px or below
  if (window.innerWidth <= 550) {
    // Display an alert
    $(".navbar-brand").addClass("d-none")
    $(".summaryImg").addClass("d-none")
  }
  else
  {
    $('.navbar-brand').removeClass("d-none")
    $('.summaryImg').removeClass("d-none")
  }
}
// Initial check on page load
checkScreenWidth();
// Attach the function to the window.onresize event
window.onresize = checkScreenWidth;

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

