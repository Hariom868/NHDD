<?php
session_start();// it basically starts the session so that previous data can be used
include_once('pdo1.php'); // it uses pdo1 file so that it's function can be utilised
$username=($_SESSION['name']);
  ?>

<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../CSS/add.css?v=<?php echo time(); ?>">
      <link rel="stylesheet" href="../CSS/expense_report.css?v=<?php echo time(); ?>">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
      <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <title>NHDD | View Expenses </title>
      <header>
        <div class="logo__name">
        <img class="nhdd_logo" src="../Images/NHDD_logo.png" alt="NHDD logo">
            <button class="message"><a href="dashboard.php"><i style="font-size:34px;color:white" class="fa">&#xf0a8;</i></a></button>
            <button class="message"><a href="index.php"> <i class="fa fa-home" style="font-size:34px;color:white"></i></a></button>
        </div></div>
    </header>
  </head>
  <body>
      <section id="add__expense">
      <div class = "user__panel">
        <img class="user__img" src ="../Images/bg.jpg" alt="bg image">
        <h1 class="user__name"><?php echo $_SESSION['name'] ?></h1>
        <hr>
        <button onclick="ExpenseDropdown()"class="panel__item first__item"><i class="fas fa-dollar-sign adjust__size"></i>Expenses</button>
        <div id="dropdown" class="expense__content">
            <a href="add_expenses.php">Add expenses</a>
            <a href="view_expense_categorywise.php">Manage expenses</a>
        </div>
        <button onclick="ExpenseReportDropdown()" class="panel__item first__item call__drop"><i class="fa fa-file-text adjust__size"></i></i>Expense Report</button>
        <div id="dropdown_er" class="expense_report__content">
            <a href="daywise_exp_view.php">Daywise expenses</a>
        </div>
        <button  class="panel__item first__item"><i class="fa fa-save  adjust__size"></i> <a href="add_receipt.php">Save Receipts</a></h1></button>
        <button onclick="viewingExp()" id="viewDis"  class="panel__item first__item"><i class="fa fa-eye adjust__size"></i> <a href="#">View Receipts</a></h1></button>
        <div id="dropdown_vr" class="vr_content">
            <a href="date_reciept.php">View datewise</a>
            <a href="view_receipt.php">View All</a>
        </div>
        <button class="panel__item first__item"><i class="fa fa-angle-double-up adjust__size"></i> <a href="Update.php">Update Profile</a></h1></button>
        </div>
          <div class ="user__inputarea">
           <h1 class="input__head">EXPENSE REPORT</h1>
           <hr />
           <table class="expense__report__table">
            <thead>
            <tr>
              <th>S.NO.</th>
              <th>Expense Item</th>
              <th>Expense Cost</th>
              <th>Expense Date</th>
            </tr>
            </thead>

              <?php
             $ending = ($_POST['lastdate']);
              $type = ($_POST['datesheet']);
              $dataviewing=new Database_Connection();// it make a new class
                $sql = $dataviewing->dataviewing($type,$ending,$username);// it basically call the dataviewing function of the pdo1 file
                $count=1;
		            $totalcost=0;
                while ($row=mysqli_fetch_array($sql)) {// it continue till the last row is fetched (mysqli_fetch_array)

                    ?>
                                  <tbody>
                                    <tr>
                                      <td><?php echo $count;?></td>

                                      <td><?php  echo $row['name'];?></td>
                                      <td><?php  echo $row['cost'];?></td>
                                      <td><?php  echo $row['date'];?></td>

                                    </tr>
                                    <?php
			              $totalcost=$totalcost+$row['cost'];
                    $count=$count+1;
                    }?>

                                  </tbody>
                                </table>
<br><br>
<h3 class="total">Total Cost = <?php echo $totalcost ?></h3>
                              </div>
</div>
      </section>
      <script src="../Script/add_expense.js?v=<?php echo time(); ?>"></script>
  </body>
    </html>
