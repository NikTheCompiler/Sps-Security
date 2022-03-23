
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
  
  var atSymbol = email.indexOf("@");
  var dot = email.indexOf(".");
  
  
  if(name==""){
    alert('Name is required!')
  }
  else if(surname==""){
    alert('Surname is required!')
  }
  else if(position==""){
    alert('Position is required!')
  }
  else if(username==""||username.length<5){
    alert('Username is required and must be at least 5 characters long!')
  }
  else if(email!="" && (atSymbol < 1||dot <= atSymbol + 2||dot === email.length - 1)){
    alert('Wrong email format!')
  }
  else if(dept==""){
    alert('Department is required!')
  }
  else if(type==""){
    alert('Type is required!')
  }
  else if(policecert==""){
    alert('Police Certificate is required!')
  }
  

  else{
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
       
      if (data == 0){
        alert("Failed");
      }
      else if(data == 2){
        alert("Username is already used!");
      }
      else if(data == 3){
        alert("Username and email are already used!");
      }
      else if(data == 4){
        alert("This email is already used!");
      }
      else if (data !=2) {
        Swal.fire({
          icon: 'success',
          title: 'User added successfully!',
          text: 'Password is: ' + data ,
          
        }).then((result) => {
          location.reload();             
        })

      }
    });
  }
  
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
  
  var atSymbol = email.indexOf("@");
  var dot = email.indexOf(".");

  if(name==""){
    alert('Name is required!')
  }
  else if(surname==""){
    alert('Surname is required!')
  }
  else if(position==""){
    alert('Position is required!')
  }
  else if(username==""||username.length<5){
    alert('Username is required and must be at least 5 characters long!')
  }
  else if(email!="" && (atSymbol < 1||dot <= atSymbol + 2||dot === email.length - 1)){
    alert('Wrong email format!')
  }
  else if(dept==""){
    alert('Department is required!')
  }
  else if(type==""){
    alert('Type is required!')
  }
  else if(policecert==""){
    alert('Police Certificate is required!')
  }
  else{
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
}

function editProfile(){
  var id = $("#id2")[0].value;
  var name = $("#name2")[0].value;
  var surname = $("#surname2")[0].value;
  var email=$("#email2")[0].value;

  var atSymbol = email.indexOf("@");
  var dot = email.indexOf(".");

  if(name==""){
    alert('Name is required!')
  }
  else if(surname==""){
    alert('Surname is required!')
  }
  else if(email!="" && (atSymbol < 1||dot <= atSymbol + 2||dot === email.length - 1)){
    alert('Wrong email format!')
  }
  else{
  $.post("../php/editProfile.php", {
    id: id,
    name: name,
    surname: surname,
    email: email,
    
    })
    .done(function(data) {
      if (data == 1) {
        Swal.fire({
          icon: 'success',
          title: 'Profile updated successfully!',
        }).then((result) => {
          location.reload();             
        })

      } else if (data == 0){
        alert("Failed!");
      }
      
    });
  }
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
      if (pass==""){
        alert("Current password is required!")
      }
      else if(newpass==""){
        alert("New password is required")
      }
      else if(newpass!=confirmpass){
        alert("New password and confirm password don't match!")
      }
      else{
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
            alert("Wrong current password!");
          }
          else{
            alert("Something went wrong!")
          }
          
        });
      }
    }

    function addQuestion()
    {
      var question = document.getElementById("question").value;
      var choice1 = document.getElementById("choice1").value;
      var choice2 = document.getElementById("choice2").value;
      var choice3 = document.getElementById("choice3").value;
      var choice4 = document.getElementById("choice4").value;
      var correctanswer1 = document.getElementById("correctanswer1").value;
      var correctanswer2 = document.getElementById("correctanswer2").value;
      var correctanswer3 = document.getElementById("correctanswer3").value;
      var correctanswer4 = document.getElementById("correctanswer4").value;
      var dept2 = document.getElementById("dept2").value;
      var category = document.getElementById("category").value;
      
      
      //var atSymbol = email.indexOf("@");
      //var dot = email.indexOf(".");
      
      
      if(question == ""){
        alert('Question is required!')
      }
      else if(choice1 == ""){
        alert('Choice 1 is required!')
      }
      else if(choice2 == ""){
        alert('Choice 2 is required!')
      }
      /*else if(choice3==""){
        alert('Choice 3 is required!')
      }*/
      /*else if(choice4==""){
        alert('Choice 4 is required!')
      }*/
      else if((correctanswer1 == "") && (correctanswer2 == "") && (correctanswer3 == "") && (correctanswer4 == "")){
        alert('Correct answer is required!')
      }
      else if(dept2 == ""){
        alert('Question Department is required!')
      }
      else if(category == ""){
        alert('Question Category is required!')
      }
      else {
        $.post("../php/addQuestion.php", {
            question: question,
            choice1: choice1,
            choice2: choice2,
            choice3: choice3,
            choice4: choice4,
            correctanswer1: correctanswer1,
            correctanswer2: correctanswer2,
            correctanswer3: correctanswer3,
            correctanswer4: correctanswer4,
            dept2: dept2,
            category: category
            
          }) .done(function(data) {
             
            if (data == 0){
              alert("Failed");
            }
            else if (data == 1) {
              Swal.fire({
                icon: 'success',
                title: 'Question added successfully!',
                })
                .then((result) => {
                location.reload();             
              })
      
            }
          });
      }
    }
 
function modalGetData(row)
{
  var id = row.cells[1].innerHTML;
  var name = row.cells[2].innerHTML;
  var surname = row.cells[3].innerHTML;
  var username = row.cells[4].innerHTML;
  var dept = row.cells[5].innerHTML;
  var position = row.cells[7].innerHTML;
  var type = row.cells[9].innerHTML;
  var email = row.cells[10].innerHTML;
  var policecert = row.cells[11].innerHTML;
  
  
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
