<?php
    include('header.html');
    $row='';
    $id=0;
    if(isset($_REQUEST['id'])){
        $row=null;
        $id = $_REQUEST['id'];
        include('dbConnection.php');
        $sql ="SELECT st.*, sc.maths, sc.eng, sc.bio, sc.social, sc.science FROM student AS st JOIN score AS sc WHERE st.id=sc.student_id AND st.id=" . $id;
        
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }
    }
?>
        <div class="container-fluid bg-light p-0" style="margin-left: 100px;">
            <form action="SaveDetails.php" method="post" enctype="multipart/form-data">
                <div class="row gx-0 d-none d-lg-flex">
                    <h1>Student</h1>
                </div>

                 <div class="row gx-0 d-none d-lg-flex">
                    <div class="col-12 col-lg-2"><b>Name</b></div>
                    <div class="col-12 col-lg-10">
                        <?php
                        if(isset($row['name'])){
                            ?>
                            <input type="hidden" name="studentId" value="<?php echo($id); ?>">
                            <input type="text" name="studentName" value="<?php echo($row['name']); ?>">
                            <?php
                        }else{
                            ?>
                            <input type="text" name="studentName">
                            <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="row gx-0 d-none d-lg-flex">
                    <div class="col-12 col-lg-2"><b>Passport</b></div>
                    <div class="col-12 col-lg-10">
                        <?php
                        if(isset($row['photo'])){
                            ?>
                            <img src="<?php echo($row['photo']); ?>" width="50" height="auto">
                            <br>
                            <input type="file" name="photo" value="<?php echo($row['photo']); ?>">
                            <?php
                        }else{
                            ?>
                            <input type="file" name="photo"></div>
                            <?php
                        }
                        ?>
                </div>

                <div class="row gx-0 d-none d-lg-flex">
                    <div class="col-12 col-lg-2"><b>Date of birth</b></div>
                    <div class="col-12 col-lg-10"><input type="date" name="dob"></div>
                </div>

                <div class="row gx-0 d-none d-lg-flex">
                    <div class="col-12 col-lg-2"><b>class</b></div>
                      <div class="col-12 col-lg-10">
                      <select name="class">
                          <option value=""></option>
                          <?php
                            if(isset($row['class'])){
                                if ($row['class'] == 'JSS1') {
                                    ?>
                                    <option value="JSS1" selected>JSS1</option>
                                    <?php
                                }else{
                                    ?>
                                    <option value="JSS1">JSS1</option>
                                    <?php
                                }
                                if ($row['class'] == 'JSS2') {
                                    ?>
                                    <option value="JSS2" selected>JSS2</option>
                                    <?php
                                }else{
                                    ?>
                                    <option value="JSS2">JSS2</option>
                                    <?php
                                }
                                if ($row['class'] == 'JSS3') {
                                    ?><option value="JSS3" selected>JSS3</option>
                                    <?php
                                }else{
                                    ?>
                                    <option value="JSS3">JSS3</option>
                                    <?php
                                }
                               
                            }else{
                                ?>
                                <option value="JSS1">JSS1</option>
                                <option value="JSS2">JSS2</option>
                                <option value="JSS3">JSS3</option>
                                <?php
                            }
                            ?>
                          
                          
                      </select>
                    </div>
                </div>

                <div class="row gx-0 d-none d-lg-flex">
                    <div class="col-12 col-lg-2"><b>Maths</b></div>
                    <div class="col-12 col-lg-10">
                         <?php
                        if(isset($row['name'])){
                            ?>
                            <input size="5" type="number" name="maths" value="<?php echo($row['maths']); ?>">
                            <?php
                        }else{
                            ?>
                            <input size="5" type="number" name="maths">
                            <?php
                        }
                        ?>

                    </div>
                </div>

                <div class="row gx-0 d-none d-lg-flex">
                    <div class="col-12 col-lg-2"><b>English</b></div>
                    <div class="col-12 col-lg-10">
                       <?php
                        if(isset($row['eng'])){
                            ?>
                            <input size="3" type="number" name="eng" value="<?php echo($row['eng']); ?>">
                            <?php
                        }else{
                            ?>
                            <input size="3" type="number" name="eng">
                            <?php
                        }
                        ?> 

                    </div>
                </div>

                <div class="row gx-0 d-none d-lg-flex">
                    <div class="col-12 col-lg-2"><b>Biology</b></div>
                    <div class="col-12 col-lg-10">
                        <?php
                        if(isset($row['name'])){
                            ?>
                            <input size="3" type="number" name="bio" value="<?php echo($row['bio']); ?>">
                            <?php
                        }else{
                            ?>
                            <input size="3" type="number" name="bio">
                            <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="row gx-0 d-none d-lg-flex">
                    <div class="col-12 col-lg-2"><b>Integrated Science</b></div>
                    <div class="col-12 col-lg-10">
                        <?php
                        if(isset($row['science'])){
                            ?>
                            <input size="3" type="number" name="science" value="<?php echo($row['science']); ?>">
                            <?php
                        }else{
                            ?>
                            <input size="3" type="number" name="science">
                            <?php
                        }
                        ?>  
                    </div>
                </div>

                <div class="row gx-0 d-none d-lg-flex">
                    <div class="col-12 col-lg-2"><b>Social Studies</b></div>
                    <div class="col-12 col-lg-10">
                        <?php
                        if(isset($row['social'])){
                            ?>
                            <input size="3" type="number" name="social" value="<?php echo($row['social']); ?>">
                            <?php
                        }else{
                            ?>
                            <input size="3" type="number" name="social">
                            <?php
                        }
                        ?>  
                    </div>
                </div>

                <div class="row gx-0 d-none d-lg-flex">
                    <div class="col-12 col-lg-2"></div>
                    <div class="col-12 col-lg-10">
                        <input type="submit" value="Save">
                        <input type="reset" value="Cancel">
                    </div>
                </div>
            </form>
        </div>
 
 <?php
include('footer.html')
?>