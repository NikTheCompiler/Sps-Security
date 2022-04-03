<?php
include_once('connect.php');

$TestID = $_POST['TestID'];
$dept = $_POST['dept'];
$arr = array(4);
$i=0;
$sql="SELECT * FROM Questions  ";
$ques = sqlsrv_query($conn,$sql);

while ($row = sqlsrv_fetch_array($ques,SQLSRV_FETCH_ASSOC)) {
    $arr[$i]=$row["QID"];
    
    $i=$i+1;
}

$rand_keys = array_rand($arr, 3);
 $Ans = array(4);
 $i=0;
 ?>
<?php
while($i<3){
  
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
    </p>
    <div class="form-check mb-2">
      <input class="form-check-input" type="radio" name="exampleForm" value=1 id="c1" name="c1" />
      <label class="form-check-label" for="radioExample1" >
      <?php echo $c1?>
      </label>
    </div>
    <div class="form-check mb-2">
      <input class="form-check-input" type="radio" name="exampleForm" value=2 id="c2" name="c2" />
      <label class="form-check-label" for="radioExample2">
      <?php echo $c2?>
      </label>
    </div>
    <div class="form-check mb-2"<?php if($c3==null){ echo "hidden";} ?> >
      <input class="form-check-input" type="radio" name="exampleForm" value=3 id="c3" name="c3" />
      <label class="form-check-label" for="radioExample3">
      <?php echo $c3?>
      </label>
    </div>
    <div class="form-check mb-2" <?php if($c4==null){ echo "hidden";} ?>>
      <input class="form-check-input" type="radio" name="exampleForm" value=4 id="c4" name="c4" />
      <label class="form-check-label" for="radioExample3">
      <?php echo $c4?>
      </label>
    </div>
  </form>
  

    <?php
    if(isset($_POST['c1'])){
      $Ans[$i] = document.getElementById("c1").value;
    } else if(isset($_POST['c2']))
      {
        $Ans[$i] = document.getElementById("c2").value;
      } else if(isset($_POST['c3']))
      {
        $Ans[$i] = document.getElementById("c3").value;
      } else if (isset($_POST['c4']))
      {
        $Ans[$i] = document.getElementById("c4").value;
      }
    $i=$i+1;    
    }
      


?>
<center><button type="button" class="btn btn-primary" onclick="submitAnswers()">Submit Answers</button><center>
<input hidden type="text"  name= "deptv" id= "testid" class="form-control" value="<?php echo $TestID ?>">

<script>
  function submitAnswers()
  {
    var TestID =document.getElementById("testid").value;
    var userAns;
    var qid;
    var grade = 0;
    $i = 0;
    while ($i < 3){
      userAns = $Ans[$i];
      qid = $arr[$i];
      $.post("../php/userAnswers.php", {
      userAns: userAns,
      qid:  qid,
      TestID: TestID
      }).done(function(data) {

      if (data == 1){
        grade += 1;
        }
      })
    }
    updateGrade().done(function(data){
      if (data == 1){
          Swal.fire({
            icon: 'success',
            title: 'You have submited your answers!',
            text: 'Your grade is '+ grade '/' + $i-1
            })
            .then((result) => {
              location.reload();  
            })
          }
      })
    function updateGrade()
    {
      $.post("../php/updateGrade.php",{
        TestID: TestID,
        grade: grade
      })
    }
  }
  
</script>



