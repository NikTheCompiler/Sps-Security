
function addUser()
{
  var name = document.getElementById("name1").value;
  var surname = document.getElementById("surname1").value;
  var email = document.getElementById("email1").value;
  var dept = document.getElementById("dept1").value;
  var type = document.getElementById("type1").value;
  var username = document.getElementById("username1").value;
  var policecert = document.getElementById("policecert1").value;
  var position = document.getElementById("position1").value;
  
  var nameErr = emailErr = mobileErr = countryErr = genderErr = true;
    
  // Validate name
  if(name == "") {
      printError("nameErr", "Please enter your name");
  } else {
      var regex = /^[a-zA-Z\s]+$/;                
      if(regex.test(name) === false) {
          printError("nameErr", "Please enter a valid name");
      } else {
          printError("nameErr", "");
          nameErr = false;
      }
  }
  
  $.post("../php/addUser.php", {
      name: name,
      surname: surname,
      username: username,
      dept: dept,
      position: position,
      type: type,
      email: email,
      policecert: policecert
      
    })
    .done(function(data) {
      if (data != 1) {
        Swal.fire({
          icon: 'success',
          title: 'User added successfully!  Password is: ' + data ,
        }).then((result) => {
          location.reload();             
        })

      } else if (data == 0){
        alert("Failed");
        
      }
    });
}

function editUser()
{
  var id = $("#id")[0].value;
  var name = $("#name")[0].value;
  var surname = $("#surname")[0].value;
  var username = $("#username")[0].value;
  var dept = $("#dept")[0].value;
  var position = $("#position")[0].value;
  var type = $("#type")[0].value;
  var email=$("#email")[0].value;
  var policecert=$("#policecert")[0].value;
  
  $.post("../php/editUser.php", {
      id: id,
      name: name,
      surname: surname,
      username: username,
      dept: dept,
      position: position,
      type: type,
      email: email,
      policecert: policecert
      
    })
    .done(function(data) {
      if (data == 1) {
        Swal.fire({
          icon: 'success',
          title: 'User updated successfully!',
        }).then((result) => {
          location.reload();             
        })

      } else if (data == 0){
        alert("Failed!");
      }
    });
}

function deleteUser(row) {
var id = row.cells[1].innerHTML;
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    reverseButtons: true,
    cancelButtonColor: '#d33',
    confirmButtonText: 'Confirm'
  }).then((result) => {
    if (result.isConfirmed) {
      $.post("../php/deleteUser.php", {
          id: id,
        })
        .done(function(data) {
          if (data == 1) {
            Swal.fire(
              'Deleted!',
              'The user has been deleted.',
              'success'
            );
            row.parentNode.removeChild(row);
          
          }else if(data==0) {
            alert(data);
          }
        });
    }
  });
}

  function generatePass(row) {
    var id = row.cells[1].innerHTML;
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        reverseButtons: true,
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirm'
      }).then((result) => {
        if (result.isConfirmed) {
          $.post("../php/generatepass.php", {
              id: id,
            })
            .done(function(data) {
              if (data != 1) {
                Swal.fire(
                  'Generated!',
                  'New generated password: '+ data,
                  'success'
                );
                
              
              }else if(data==0) {
                alert(data);
              }
            });
        }
      });
    }

    function changePass()
    {
      var pass = document.getElementById("pass").value;
      var newpass = document.getElementById("newpass").value;
      var confirmpass = document.getElementById("confirmpass").value;
      

      $.post("../php/passwordchange.php", {
          pass: pass,
          newpass: newpass,
          confirmpass: confirmpass,

        })
        .done(function(data) {
          if (data == 1) {
            Swal.fire({
              icon: 'success',
              title: 'Password changed successfully!',
            }).then((result) => {
              location.reload();
            })

          } else if (data == 0){
            alert("Failed");
            
          }
        });
    }
 
function modalGetData(row)
{
  var id = row.cells[1].innerHTML;
  var name = row.cells[2].innerHTML;
  var surname = row.cells[3].innerHTML;
  var username = row.cells[4].innerHTML;
  var dept = row.cells[5].innerHTML;
  var position = row.cells[6].innerHTML;
  var type = row.cells[7].innerHTML;
  var email = row.cells[8].innerHTML;
  var policecert = row.cells[9].innerHTML;
  
  
  document.getElementById("id").value=id;
  document.getElementById("name").value=name;
  document.getElementById("surname").value=surname;
  document.getElementById("username").value=username;
  document.getElementById("dept").value=dept;
  document.getElementById("position").value=position;
  document.getElementById("type").value=type;
  document.getElementById("email").value=email;
  document.getElementById("policecert").value=policecert;
}
