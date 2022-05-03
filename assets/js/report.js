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

