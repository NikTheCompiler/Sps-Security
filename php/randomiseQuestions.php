<?php
session_start();
include_once('connect.php');

$TestID = $_POST['TestID'];
$dept = $_POST['dept'];
$i=0;
$sql="SELECT * FROM Questions WHERE Dept='".$dept."' OR Dept=6 ";
$ques = sqlsrv_query($conn,$sql);
$arr = array(0);

while ($row = sqlsrv_fetch_array($ques,SQLSRV_FETCH_ASSOC)) {
    $arr[$i]=$row["QID"];
    
    $i=$i+1;
}

 if(sizeof($arr)<20){
  $id = trim($TestID);

  $sqldel="DELETE FROM Tests WHERE TestID='".$id."'";
  $delt = sqlsrv_query($conn,$sqldel);
  
   echo 0;
   exit;
 }

$rand_keys = array_rand($arr, 20);
shuffle($rand_keys);
 $Ans = array(20);
 $i=0;
 $j=0;
 
 $TestID = trim($TestID);
 for($j=0;$j<20;$j++){
  $addUserAns = "INSERT INTO UserAns
  ( QID,
   TestID,
   UserAns
   )  
  VALUES   
  (?, ?, ?)";  
$params = array($arr[$rand_keys[$j]],$TestID,"");
$questionquery = sqlsrv_query($conn, $addUserAns, $params);

 }

 ?>
 
 <center>
<h1> Time Left:</h1>
</center>
<center>
<h2 id="ten-countdown" ></h2>
</center>
<?php
while($i<20){
  
?>

  <h4 class="fw-bold text-center mt-3"></h4>
  <form class=" bg-white px-4" action="" method="post">
    <p class="fw-bold">Question <?php echo $i+1?>.
    <?php
                  $qid = $arr[$rand_keys[$i]];
                  $sql = "SELECT * FROM Questions WHERE QID = '".$qid."'";
                  $result = sqlsrv_query($conn, $sql);
                  
                    while ($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC)) {
                      echo $row["Ques"];
                      $c1=$row["Choice1"];
                      $c2=$row["Choice2"];
                      $c3=$row["Choice3"];
                      $c4=$row["Choice4"];
                    }
    ?>
    <input hidden type="text"  name= "qid" id= "qid<?php echo $i+1?>>" class="form-control" value="<?php echo $qid ?>">
    <input hidden type="text"  name= "tid" id= "tid" class="form-control" value="<?php echo $TestID ?>">
    <input hidden type="text"  name= "uid" id= "uid" class="form-control" value="<?php echo $_SESSION["UserID"]?>">
    <form>
    <div class="form-check mb-2">
      <input class="form-check-input" type="radio" name="exampleForm" value=1 id="c1" name="c1" onclick="setAns(value,<?php echo $qid ?>)" />
      <label class="form-check-label" for="radioExample1" >
      <?php echo $c1?>
      </label>
    </div>
    <div class="form-check mb-2">
      <input class="form-check-input" type="radio" name="exampleForm" value=2 id="c2" name="c2" onclick="setAns(value,<?php echo $qid ?>)"/>
      <label class="form-check-label" for="radioExample2">
      <?php echo $c2?>
      </label>
    </div>
    <div class="form-check mb-2"<?php if($c3==null){ echo "hidden";} ?> >
      <input class="form-check-input" type="radio" name="exampleForm" value=3 id="c3" name="c3" onclick="setAns(value,<?php echo $qid ?>)"/>
      <label class="form-check-label" for="radioExample3">
      <?php echo $c3?>
      </label>
    </div>
    <div class="form-check mb-2" <?php if($c4==null){ echo "hidden";} ?>>
      <input class="form-check-input" type="radio" name="exampleForm" value=4 id="c4" name="c4" onclick="setAns(value,<?php echo $qid ?>)" />
      <label class="form-check-label" for="radioExample3">
      <?php echo $c4?>
      </label>
    </div>
  </form>

  <?php
    $i=$i+1;
    }
  ?>

<center><button type="button" class="btn btn-primary" onclick="submitAnswers()">Submit Answers</button><center>

<script>
function countdown( elementName, minutes, seconds )
{
    var element, endTime, hours, mins, msLeft, time;

    function twoDigits( n )
    {
        return (n <= 9 ? "0" + n : n);
    }

    function updateTimer()
    {
        msLeft = endTime - (+new Date);
        if ( msLeft < 1000 ) {
          submitAnswers2();
        } else {
            time = new Date( msLeft );
            hours = time.getUTCHours();
            mins = time.getUTCMinutes();
            element.innerHTML = (hours ? hours + ':' + twoDigits( mins ) : mins) + ':' + twoDigits( time.getUTCSeconds() );
            setTimeout( updateTimer, time.getUTCMilliseconds() + 500 );
        }
    }

    element = document.getElementById( elementName );
    endTime = (+new Date) + 1000 * (60*minutes + seconds) + 500;
    updateTimer();
}

countdown( "ten-countdown", 10, 0 );

</script>
<script>
function setAns(ans,id)
  {
    var qid = id;
    var tid = document.getElementById("tid").value;
    var grade = 0;
    var userAns=ans;
    $.post("../php/userAnswers.php", {
      userAns: userAns,
      qid: qid,
      tid: tid
      })

  }
</script>

<script>
  function submitAnswers()
  {
    var uid = document.getElementById("uid").value;
    var TestID =document.getElementById("tid").value;
    var grade = 69;
    Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert it!" ,
    icon: 'warning',
    showCancelButton: true,
    reverseButtons: true,
    cancelButtonColor: '#d33',
    confirmButtonText: 'Confirm'

    }).then((result) =>{
      if (result.isConfirmed) {
        $.post("../php/updateGrade.php", {
        uid:uid,
        TestID: TestID
        })
        .done(function(data) {
          grade=data;
          if (grade !=69){
            Swal.fire({
              icon: 'success',
              title: 'You have submitted your answers!',
              text: 'Your grade is '+ grade * 5 + '/100'
              })
              .then((result) => {
                location.reload();  
              })
            }
        })
      }
    });
  }
  
</script>
<script>
  function submitAnswers2()
  {
    var uid = document.getElementById("uid").value;
    var TestID =document.getElementById("tid").value;
    var grade = 69;
        $.post("../php/updateGrade.php", {
        uid:uid,
        TestID: TestID
        })
        .done(function(data) {
          grade=data;
          if (grade !=69){
            Swal.fire({
              icon: 'success',
              title: 'You have submitted your answers!',
              text: 'Your grade is '+ grade * 5 + '/100'
              })
              .then((result) => {
                location.reload();  
              })
            }
        })
  }
  
</script>





