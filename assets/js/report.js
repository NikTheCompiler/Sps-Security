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



download.addEventListener("click", function() {
 

  window.open("../php/printChart.php" );

}, false);


function exportUserExcel(row)
{
  var id = row.cells[1].innerHTML;
  var name = row.cells[2].innerHTML;
  var surname = row.cells[3].innerHTML;
  window.open("../php/loaduserexceltable.php?id="+ id + "&name=" + name + "&surname=" + surname);
}