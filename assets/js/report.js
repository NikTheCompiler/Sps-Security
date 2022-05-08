function getReportData(row)
{
  
  var date=row.cells[4].innerHTML;
  var id = row.cells[1].innerHTML;
  var testID = row.cells[5].innerHTML;

  
  document.getElementById("date").innerHTML=date;

  $.post("../php/reportModal.php", {
    id: id,
    testID: testID
  }).done(function(data){
    
    if (data != 1 )
    {
      $('#Report').html(data);
    }
  });


  
}

function getPrintReportData(row)
{
  
  var date=row.cells[4].innerHTML;
  var id = row.cells[1].innerHTML;
  var testID = row.cells[5].innerHTML;

  
  document.getElementById("date").innerHTML=date;

  window.open("../php/printReport.php?id="+ id + "&testid=" + testID);

  
}

function getUserPrintReportData(row)
{

  var id = row.cells[1].innerHTML;
 
  $.post("../php/checkforuserreport.php", {
    id: id,
  }).done(function(data){
    if (data == 0 )
    {
      Swal.fire(
        'No tests for this User',
        '',
        'error'
      );
    }
    else if(data == 1)
    {
      window.open("../php/printReportUser.php?id="+ id );
    }
  });

}

var canvas = document.getElementById('barChart');
var context = canvas.getContext('2d');


download.addEventListener("click", function() {
  // only jpeg is supported by jsPDF
  var imgData = canvas.toDataURL("image/png", 1.0);
  data.append('image',imgData);
  // var pdf = new jsPDF();

  window.open("../php/printReportUser.php?" );

  // pdf.addImage(imgData, 'png', 0, 0);
  // pdf.save("download.pdf");
}, false);

