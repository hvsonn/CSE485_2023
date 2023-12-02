<?php
//B1. ket noi DB Server
try{
    $conn = new PDO("mysql:host=localhost;dbname=project02", "root", "abc");
    //B2. thuc thi truy van
    $sql = "SELECT * FROM users";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    //B3. xu ly truy van
    $users_count = $stmt->rowCount();
}catch(PDOException $e){
    echo $e->getMessage();
}
?>
<?php
include "layout/header.php";
?>
    <!--    Start main -->
    <main class="bg-warning mt-2" style="height:300px">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="width:100%;">
                        <div class="card-body">
                            <h5 class="card-title">USERS</h5>
                            <p class="card-text">
                                <?= $users_count; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width:100%;">
                        <div class="card-body">
                            <h5 class="card-title">USERS</h5>
                            <p class="card-text">123</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width:100%;">
                        <div class="card-body">
                            <h5 class="card-title">USERS</h5>
                            <p class="card-text">123</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <!--    End main -->
<?php
include "layout/footer.php";
?>