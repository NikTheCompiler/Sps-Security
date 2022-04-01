<?php
include_once('connect.php');

$dept = $_POST['dept'];
$arr = array(4);
$c1=array(4);
$c2=array(4);
$c3=array(4);
$c4=array(4);
$i=0;
$sql="SELECT * FROM Questions  ";
$ques = sqlsrv_query($conn,$sql);

while ($row = sqlsrv_fetch_array($ques,SQLSRV_FETCH_ASSOC)) {
    $arr[$i]=$row["QID"];
    
    $i=$i+1;
}

$rand_keys = array_rand($arr, 3);

 $i=0;
 ?>
<?php
while($i<3){
  
?>
    
  <h4 class="fw-bold text-center mt-3"></h4>
  <form class=" bg-white px-4" action="">
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
      <input class="form-check-input" type="radio" name="exampleForm" id="c1" />
      <label class="form-check-label" for="radioExample1" >
      <?php echo $c1?>
      </label>
    </div>
    <div class="form-check mb-2">
      <input class="form-check-input" type="radio" name="exampleForm" id="c2" />
      <label class="form-check-label" for="radioExample2">
      <?php echo $c2?>
      </label>
    </div>
    <div class="form-check mb-2"<?php if($c3==null){ echo "hidden";} ?> >
      <input class="form-check-input" type="radio" name="exampleForm" id="c3" />
      <label class="form-check-label" for="radioExample3">
      <?php echo $c3?>
      </label>
    </div>
    <div class="form-check mb-2" <?php if($c4==null){ echo "hidden";} ?>>
      <input class="form-check-input" type="radio" name="exampleForm" id="c4" />
      <label class="form-check-label" for="radioExample3">
      <?php echo $c4?>
      </label>
    </div>
  </form>
  

    <?php
    $i=$i+1;

}
?>
<center><button type="button" class="btn btn-primary"  >Sumbit Answers</button><center>




