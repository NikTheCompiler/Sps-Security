
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
    Swal.fire(
      'Name is required!',
      '',
      'error'
    );
  }
  else if(surname==""){
    Swal.fire(
      'Surname is required!',
      '',
      'error'
    );
  }
  else if(position==""){
    Swal.fire(
      'Position is required!',
      '',
      'error'
    );
  }
  else if(username==""||username.length<5){
    Swal.fire(
      'Username is required and must be at least 5 characters long!',
      '',
      'error'
    );
  }
  else if(email!="" && (atSymbol < 1||dot <= atSymbol + 2||dot === email.length - 1)){
    Swal.fire(
      'Wrong email format!',
      '',
      'error'
    );
  }
  else if(dept==""){
    Swal.fire(
      'Department is required!',
      '',
      'error'
    );
  }
  else if(type==""){
    Swal.fire(
      'Type is required!',
      '',
      'error'
    );
  }
  else if(policecert==""){
    Swal.fire(
      'Police Certificate is required!',
      '',
      'error'
    );
  }
  else if(dept==6 && type==0){
    Swal.fire(
      'You can not add employee in this department!',
      '',
      'error'
    );
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
        Swal.fire(
          'Failed!',
          '',
          'error'
        );
      }
      else if(data == 2){
        Swal.fire(
          'Username is already used!',
          '',
          'error'
        );
      }
      else if(data == 3){
        Swal.fire(
          'Username and email are already used!',
          '',
          'error'
        );

      }
      else if(data == 4){
        Swal.fire(
          'This email is already used!',
          '',
          'error'
        );
      }
      else if (data !=2) {
        Swal.fire({
          icon: 'success',
          title: 'User added successfully!',
          text: 'Password is: ' + data ,
          confirmButtonText: 'Copy Password',
          showCancelButton: true,

        }).then((result) => {
          data=data.replace('"','');
          data=data.replace('"','');
          data=data.trim();

          if (result.isConfirmed) {
            navigator.clipboard.writeText(data);
          }
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
    Swal.fire(
      'Name is required!',
      '',
      'error'
    );
  }
  else if(surname==""){
    Swal.fire(
      'Surname is required!',
      '',
      'error'
    );
  }
  else if(position==""){
    Swal.fire(
      'Position is required!',
      '',
      'error'
    );
  }
  else if(username==""||username.length<5){
    Swal.fire(
      'Username is required and must be at least 5 characters long!',
      '',
      'error'
    );
  }
  else if(email!="" && (atSymbol < 1||dot <= atSymbol + 2||dot === email.length - 1)){
    Swal.fire(
      'Wrong email format!',
      '',
      'error'
    );
  }
  else if(dept==""){
    Swal.fire(
      'Department is required!',
      '',
      'error'
    );
  }
  else if(type==""){
    Swal.fire(
      'Type is required!',
      '',
      'error'
    );
  }
  else if(policecert==""){
    Swal.fire(
      'Police Certificate is required!',
      '',
      'error'
    );
  }
  else if(dept==6 && type==0){
    Swal.fire(
      'You can not add employee in this department!',
      '',
      'error'
    );
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
        Swal.fire(
          'Failed!',
          '',
          'error'
        );
      }
      else if(data == 4){
        Swal.fire(
          'This email is already used!',
          '',
          'error'
        );
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
    Swal.fire(
      'Name is required!',
      '',
      'error'
    );
  }
  else if(surname==""){
    Swal.fire(
      'Surname is required!',
      '',
      'error'
    );
  }
  else if(email!="" && (atSymbol < 1||dot === email.length - 1)){
    Swal.fire(
      'Wrong email format!',
      '',
      'error'
    );

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
        Swal.fire(
          'Failed!',
          '',
          'error'
        );
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
            Swal.fire(
              'Failed!',
              '',
              'error'
            );
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
                Swal.fire({
                  icon: 'success',
                  title: 'Generated!',
                  text: 'New generated password: ' + data ,
                  confirmButtonText: 'Copy Password',
                  showCancelButton: true,
        
                }).then((result) => {
                  data=data.replace('"','');
                  data=data.replace('"','');
                  data=data.trim();
        
                  if (result.isConfirmed) {
                    navigator.clipboard.writeText(data);
                  }
                  location.reload();
                    
                  
                })


              }else if(data==0) {
                Swal.fire(
                  'Failed!',
                  '',
                  'error'
                );
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
        Swal.fire(
          'Current password is required!',
          '',
          'error'
        );
      }
      else if(newpass==""){
        Swal.fire(
          'New password is required!',
          '',
          'error'
        );
      }
      else if(newpass!=confirmpass){
        Swal.fire(
          'New password and confirm password do not match!',
          '',
          'error'
        );
      }
      else if (newpass.length<5){
        Swal.fire(
          'New password must be at least 5 characters!',
          '',
          'error'
        );
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
            Swal.fire(
              'Wrong current password!',
              '',
              'error'
            );
            
          }
          else{
            Swal.fire(
              'Something went wrong!',
              '',
              'error'
            );
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
      var correctanswer = document.getElementById("correctanswer").value;
      var dept2 = document.getElementById("dept2").value;
      var category = document.getElementById("category2").value;



      if(question == ""){
        Swal.fire(
          'Question is required!',
          '',
          'error'
        );
        
      }
      else if(choice1 == ""){
        Swal.fire(
          'Choice 1 is required!',
          '',
          'error'
        );
        
      }
      else if(choice2 == ""){
        Swal.fire(
          'Choice 2 is required!',
          '',
          'error'
        );
      }
      else if(correctanswer == ""){
        Swal.fire(
          'Correct Answer is required!',
          '',
          'error'
        );
      }
      else if((choice3 == "") && (correctanswer == 3)){
        Swal.fire(
          'Choice 3 is required!',
          '',
          'error'
        );
      }
      else if((choice4 == "") && (correctanswer == 4)){
        Swal.fire(
          'Choice 4 is required!',
          '',
          'error'
        );
      }
      else if(dept2 == ""){
        Swal.fire(
          'Question Department is required!',
          '',
          'error'
        );
      }
      else if(category == ""){
        Swal.fire(
          'Question Category is required!',
          '',
          'error'
        );
      }

      else {
        $.post("../php/addQuestion.php", {
            question: question,
            choice1: choice1,
            choice2: choice2,
            choice3: choice3,
            choice4: choice4,
            correctanswer: correctanswer,
            dept2: dept2,
            category: category

          }) .done(function(data) {
            if (data == 0){
              Swal.fire(
                'Failed!',
                '',
                'error'
              );
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
            else if(data == 2) {
              Swal.fire(
                'Question already exists!',
                '',
                'error'
              );
            }
          });
      }
    }

    function editQuestion()
    {
      var id = $("#id2")[0].value;
      var question = $("#question2")[0].value;
      var choice1 = $("#choice12")[0].value;
      var choice2 = $("#choice22")[0].value;
      var choice3 = $("#choice32")[0].value;
      var choice4 = $("#choice42")[0].value;
      var correctanswer = $("#correctans")[0].value;
      var dept2 = $("#dept3")[0].value;
      var category = $("#category3")[0].value;


      if(question == ""){
        Swal.fire(
          'Question is required!',
          '',
          'error'
        );
        
      }
      else if(choice1 == ""){
        Swal.fire(
          'Choice 1 is required!',
          '',
          'error'
        );
        
      }
      else if(choice2 == ""){
        Swal.fire(
          'Choice 2 is required!',
          '',
          'error'
        );
      }
      else if(correctanswer == ""){
        Swal.fire(
          'Correct Answer is required!',
          '',
          'error'
        );
      }
      else if((choice3 == "") && (correctanswer == 3)){
        Swal.fire(
          'Choice 3 is required!',
          '',
          'error'
        );
      }
      else if((choice4 == "") && (correctanswer == 4)){
        Swal.fire(
          'Choice 4 is required!',
          '',
          'error'
        );
      }
      else if(dept2 == ""){
        Swal.fire(
          'Question Department is required!',
          '',
          'error'
        );
      }
      else if(category == ""){
        Swal.fire(
          'Question Category is required!',
          '',
          'error'
        );
      }
      
      else{
      $.post("../php/editQuestion.php", {
          id: id,
          question: question,
          choice1: choice1,
          choice2: choice2,
          choice3: choice3,
          choice4: choice4,
          correctanswer: correctanswer,
          dept2: dept2,
          category: category

        })
        .done(function(data) {
          if (data == 1) {
            Swal.fire({
              icon: 'success',
              title: 'Question updated successfully!',
            }).then((result) => {
              location.reload();
            })

          } else if (data == 0){
            Swal.fire(
              'Failed!',
              '',
              'error'
            );
          }
          else if(data == 2) {
            Swal.fire(
              'Question already exists!',
              '',
              'error'
            );
          }
        });
      }
    }

    function deleteQuestion(row) {
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
            $.post("../php/deleteQuestion.php", {
                id: id,
              })
              .done(function(data) {
                if (data == 1) {
                  Swal.fire(
                    'Deleted!',
                    'The Question has been deleted.',
                    'success'
                  );
                  row.parentNode.removeChild(row);

                }else if(data==0) {
                  Swal.fire(
                    'Failed!',
                    '',
                    'error'
                  );
                }
              });
          }
        });
      }

      function deleteCategory(row) {
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
              $.post("../php/deleteCategory.php", {
                  id: id,
                })
                .done(function(data) {
                  if (data == 1) {
                    Swal.fire(
                      'Deleted!',
                      'The Category has been deleted.',
                      'success'
                    );
                    row.parentNode.removeChild(row);

                  }else if(data==0) {
                    Swal.fire(
                    'Failed!',
                    '',
                    'error'
                  );
                  }
                });
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

function modalGetDataQuestion(row)
{
  var id = row.cells[1].innerHTML;
  var ques = row.cells[2].innerHTML;
  var c1 = row.cells[3].innerHTML;
  var c2 = row.cells[4].innerHTML;
  var c3 = row.cells[5].innerHTML;
  var c4 = row.cells[6].innerHTML;
  var ca = row.cells[7].innerHTML;
  var dept = row.cells[9].innerHTML;
  var category = row.cells[11].innerHTML;


  document.getElementById("id2").value=id;
  document.getElementById("question2").value=ques;
  document.getElementById("choice12").value=c1;
  document.getElementById("choice22").value=c2;
  document.getElementById("choice32").value=c3;
  document.getElementById("choice42").value=c4;
  document.getElementById("correctans").value=ca;
  document.getElementById("dept3").value=dept;
  document.getElementById("category3").value=category;
}

function addCategory()
    {
      var Cname = document.getElementById("Cname").value;
      var deptCat = document.getElementById("deptCat").value;
     

      if(Cname == ""){
        Swal.fire(
          'Name is required!',
          '',
          'error'
        );
      }
      else if(deptCat == "0"){
        Swal.fire(
          'Department is required!',
          '',
          'error'
        );
      }

      else {
        $.post("../php/addCategory.php", {
            Cname: Cname,
            deptCat: deptCat
          }) .done(function(data) {

            if (data == 0){
              Swal.fire(
                'Failed!',
                '',
                'error'
              );
            }
            else if (data == 1) {
              Swal.fire({
                icon: 'success',
                title: 'Category added successfully!',
                })
                .then((result) => {
                location.reload();
              })

            }
            else if(data == 2) {
              Swal.fire(
                'Category already exists!',
                '',
                'error'
              );
            }
          });
      }
    }
function modalGetDataCategory(row)
    {
      var CID = row.cells[1].innerHTML;
      var Cname = row.cells[2].innerHTML;
      var Dept = row.cells[3].innerHTML;
     

    
    
      document.getElementById("CIDEdit").value=CID;
      document.getElementById("CnameEdit").value=Cname;
      document.getElementById("deptCatEdit").value=Dept;

    }
function editCategory()
    {
      var CID = $("#CIDEdit")[0].value;
      var Cname = $("#CnameEdit")[0].value;
      var deptCatEdit = $("#deptCatEdit")[0].value;



      if(Cname==""){
        Swal.fire(
          'Name is required!',
          '',
          'error'
        );
      }
      else if(deptCatEdit==""){
        Swal.fire(
          'Department is required!',
          '',
          'error'
        );
      }

      
      else{
      $.post("../php/editCategory.php", {
          CID: CID,
          Cname: Cname,
          deptCatEdit: deptCatEdit
        })
        .done(function(data) {
          if (data == 1) {
            Swal.fire({
              icon: 'success',
              title: 'Category updated successfully!',
            }).then((result) => {
              location.reload();
            })

          } else if (data == 0){
            Swal.fire(
              'Failed!',
              '',
              'error'
            );
          }
          else if(data == 2) {
            Swal.fire(
              'Category already exists!',
              '',
              'error'
            );
          }
        });
      }
    }

    function Backup(){
      $.post("../php/backup.php", {
        
    }).done(function(data){
      if (data == 1 )
      {
        Swal.fire(
                'Successful backup!',
                '',
                'success'
              );
      }
      else if(data!=1){
        Swal.fire(
                'Failed!',
                '',
                'error'
              );
      }
    });
    }

  function Restore(){
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
          $.post("../php/restore.php", {
        
          }).done(function(data){
            console.log(data);
          if (data == 1 )
          {
            Swal.fire(
                    'Successful Restore!',
                    '',
                    'success'
                  );
          }
          else if(data==0){
            Swal.fire(
                    'Failed!',
                    '',
                    'error'
                  );
          }
        });
      }
    });
  }

  function changeScale()
    {
      var bad = $("#bad")[0].value;
      var okay = $("#okay")[0].value;
      var good = $("#good")[0].value;
      var vgood = $("#vgood")[0].value;
      bad = parseInt(bad);
      okay = parseInt(okay);
      good = parseInt(good);
      vgood = parseInt(vgood);
      if(bad == ""){
        Swal.fire(
          'Bad scale is required!',
          '',
          'error'
        );
        
      }
      else if(okay == ""){
        Swal.fire(
          'Okay scale is required!',
          '',
          'error'
        );
        
      }
      else if(good == ""){
        Swal.fire(
          'Good scale is required!',
          '',
          'error'
        );
      }
      else if(vgood == ""){
        Swal.fire(
          'Very Good scale is required!',
          '',
          'error'
        );
      }
      else if(bad < 1|| bad>100){
        Swal.fire(
          'The number can not be below 1 and above 100',
          '',
          'error'
        );
        
      }
      else if(okay < 1|| okay>100){
        Swal.fire(
          'The number can not be below 1 and above 100',
          '',
          'error'
        );
        
      }
      else if(good < 1|| good>100){
        Swal.fire(
          'The number can not be below 1 and above 100',
          '',
          'error'
        );
      }
      else if(vgood < 1|| vgood>100){
        Swal.fire(
          'The number can not be below 1 and above 100',
          '',
          'error'
        );
      }
      else if(bad >= okay || bad >= good || bad > vgood ){
        Swal.fire(
          'Wrong Numbering!',
          '',
          'error'
        );
        
      }
      else if(okay >= good || okay >= vgood|| okay <= bad){
        Swal.fire(
          'Wrong Numbering!',
          '',
          'error'
        );
        
      }
      else if(good >= vgood || good <= bad || good <= okay){
        Swal.fire(
          'Wrong Numbering!',
          '',
          'error'
        );
      }
      else if(vgood <= bad|| vgood <= okay || vgood <= good){
        Swal.fire(
          'Wrong Numbering!',
          '',
          'error'
        );
      }
      
      else{
      $.post("../php/changeScale.php", {
          bad: bad,
          okay: okay,
          good: good,
          vgood: vgood

        })
        .done(function(data) {
          if (data == 1) {
            Swal.fire({
              icon: 'success',
              title: 'Scale updated successfully!',
            }).then((result) => {
              location.reload();
            })

          } else if (data == 0){
            Swal.fire(
              'Failed!',
              '',
              'error'
            );
          }
         
        });
      }
    }

