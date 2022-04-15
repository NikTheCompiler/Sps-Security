function getReportData(row)
{
  var name=row.cells[2].innerHTML;
  var date=row.cells[4].innerHTML;
  var id = row.cells[1].innerHTML;
  var testID = row.cells[5].innerHTML;

  document.getElementById('name5').value=name;
  document.getElementById('date5').value=date;

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