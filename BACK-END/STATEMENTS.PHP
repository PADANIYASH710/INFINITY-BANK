<?php 
$count = "";
$temp = 0;
$error1 = "";
$account_number = "";

if(isset($_POST['s1'])){
    $account_number = $_POST['account_number'];
    $con = mysqli_connect("localhost","root","","infinity_bank");
    $q = "select *from statements where account_number = {$account_number} ORDER BY id DESC;";
    $result1 = mysqli_query($con, $q);
    $result2 = mysqli_query($con, $q);

    if(mysqli_num_rows($result1)==0){
        $error1 = "<p style='color: #e97063;'>❌ No transactions found for this account number.</p>";
    }
    else {
        $temp = 1;

        echo "
            <div class ='exit'>
                    <button onclick='generatePDF()' style='margin-left:15px;'>GENERATE PDF</button>
            </div>
            <div class='contain' id='pdfContent'>";

        while ($row = mysqli_fetch_assoc($result1)) {
            $account_number = $row['account_number'];
            $amount = $row['amount'];
            $type = $row['type'];
            $date = $row['date'];
            $time = $row['time'];
            $name = $row['name'];
            $sender = $row['from_no'];
            
    echo "
        <div class='record'>
            <div class='text1'>
                <h3>".$type."</h3><br>
                <h4>".$date."</h4>
                <h4>".$time."</h4>
            </div>
            <div class='text2' style='margin-right:30%;'>
                <p style='font-size: 25px;'><b>".$account_number."<b></p><br>
                <h3>".$name."</h3>  
            </div>
            <div class='text3' style='width:180px;'>";
                if($type=='Withdraw'){
                        echo "<p style='font-size: 30px;color:rgb(252, 103, 103);'>₹ -".$amount."</p><br>
                              From : ".$sender;
                }
                else {
                    echo "<p style='font-size: 30px;color:rgb(66, 237, 143);'>₹ +".$amount."</p><br>
                           From : ".$sender;
               }
                    echo "</div>
                </div>";

        }
        echo "</div>";

        /*    Layout of PDF */
        echo"
            <div id='pdf'>
                <table border='1' cellspacing='0' width='90%' cellpadding='10%' style='margin:500px 80px 0px;'>
                    <tr>
                        <td style='color:black;'>Account Number</td>
                        <td style='color:black;'>Type </td>
                        <td style='color:black;'>Date</td>
                        <td style='color:black;'>Time</td>
                        <td style='color:black;'>Name</td>
                        <td style='color:black;'>From Account</td>
                        <td style='color:black;'>Amount</td>
                    </tr>
        ";
        while ($row = mysqli_fetch_assoc($result2)) {
            echo"
                <tr> 
                    <td style='color:black;'>".$row['account_number']."</td>
                    <td style='color:black;'>".$row['type']."</td>
                    <td style='color:black;'>".$row['date']."</td>
                    <td style='color:black;'>".$row['time']."</td>
                    <td style='color:black;'>".$row['name']."</td>
                    <td style='color:black;'>".$row['from_no']."</td>
                    <td style='color:black;'>".$row['amount']."</td>
                </tr>
            ";    
        }
        echo"</table>
        </div>";
    }
}
?> 
<!-- JS Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
        async function generatePDF() {
            const { jsPDF } = window.jspdf;
            const element = document.getElementById("pdf");

            if (!element) {
                alert("PDF Content not found!");
                return;
            }

            // High quality canvas capture
            const canvas = await html2canvas(element, {
                scale: 3,
                useCORS: true,
                scrollY: -window.scrollY
            });

            const imgData = canvas.toDataURL("image/png");

            // A4 size in mm
            const pdf = new jsPDF("p", "mm", "a4");

            const pdfWidth = 210;   // A4 width
            const pdfHeight = 297;  // A4 height

            const imgWidth = pdfWidth;
            const imgHeight = (canvas.height * imgWidth) / canvas.width;

            let heightLeft = imgHeight;
            let position = 0;

            // Add first page
            pdf.addImage(imgData, "PNG", 0, position, imgWidth, imgHeight);
            heightLeft -= pdfHeight;

            // If content is bigger than one page
            while (heightLeft > 0) {
                position = heightLeft - imgHeight;
                pdf.addPage();
                pdf.addImage(imgData, "PNG", 0, position, imgWidth, imgHeight);
                heightLeft -= pdfHeight;
            }

            pdf.save("STATEMENTS.pdf");
        }
</script>