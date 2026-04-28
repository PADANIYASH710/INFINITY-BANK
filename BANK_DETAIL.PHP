<!--	Front-end	 	-->
<?php include'meta.php'; ?>
<?php include'header.php'; ?>

<h2>BANK INFORMATION</h2>
        <div style="border:2px solid white;border-radius:8px;padding:20px 30px;margin:0px 0px 20px 50px;width:50%;line-height: 2;background-color:#6A11CB;">
				<p>IFSC CODE</p>
                <p style="font-size:35px;">INFIN0BOTADP</p>
		</div>

<style>
.record_box{
    border:2px solid white;
    border-radius:8px;
    padding:20px 100px;
    margin:0px 0px 20px 50px;
    width:92%;
    line-height: 2;
    background-color:#6A11CB;
}

table{
    border:1px solid white;
    width:100%;
}

td{
    border:2px solid white;
    padding:10px 20px;
}

#btn1,#btn2 {
    width:45%;
    height:30px;
    border:2px solid white;
    border-radius:5px;
}

#btn1:active,#btn2:active{
    transform:scale(0.99);
}

</style>

<br><br>
<div class="record_box">
            <h2 align="center">BANK EMPLOYEES</h2>
			<table cellspacing="0">
                    <tr style="background-color:#8159e7;">
                        <td style="width:15%">ID
                        <td style="width:40%">NAME
                        <td style="width:20%">PASSWORD
                        <td style="width:25%">   
                    </tr>

                    <?php    
                        $con = mysqli_connect("localhost","root","","infinity_bank");                     /*   fetch value    */ 
                        $q = "select *from registration order by id asc";
                        $result1 = mysqli_query($con, $q);

                     while ($row = mysqli_fetch_assoc($result1)) {?>
                    <tr>
                        <td><?php echo $row['id'];?>
                        <td><?php echo $row['username'];?>
                        <td><?php echo $row['password'];?>
                        <td><button id="btn1" style="background:#8159e7;">EDIT</button><button id="btn2" style="background:red;margin-left:10%;">DELETE</button> </td> 
                    </tr>
                    <?php }?>
            </table>
</div>