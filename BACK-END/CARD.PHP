<?php
$name = "";$aadhaar = "";$pan = "";
    if($row = mysqli_fetch_assoc($result2))
    {
        $name = $row['first_name']." ".$row['father_name']." ".$row['surname'];
        $aadhaar = $row['aadhaar_no'];
        $pan = $row['pan_no'];
    }
?>
<!-- PDF Button -->
<div class="exit">
    <button onclick="generatePDF()" style="margin-left:15px;">GENERATE PDF</button>
</div>

<!-- Your PDF Content Div -->
<div id="pdfContent" style="padding:50px;background-color:#8159e7;display:flex;flex-direction:column;align-items:center;justify-content:center;">
    <div style="padding:60px 200px 10px;background-color:#fff;border-radius:18px;">
    <!-- Virtual Card -->
    <div class="card" style="width:395px;height:255px;border-radius:18px;padding:20px;color:#fff;box-shadow:0 10px 25px rgba(0,0,0,0.2);background: linear-gradient(135deg,#2b2b2b 0%,#1a1a1a 50%,#000000 100%);margin-bottom:50px;">
        <div class="logo" style="display:flex;align-items:center;gap:10px;font-weight:bold;font-size:18px;">
            <img src="image/logo_title_tab.png" alt="Infinity Bank" height="40px" width="40px">
            Infinity Bank
        </div>

        <div class="chip">
            <img src="image/chip.jpg" alt="chip" style="border:2px solid white;width:55px;height:40px;border-radius:6px;margin:25px 0px;">
        </div>

        <div class="number" style="letter-spacing:3px;font-size:18px;margin-bottom:10px;">
            7105 4546 8586 <?php echo $card_number; ?>
        </div>

        <div class="footer" style="display:flex;justify-content:space-between;align-items:center;font-size:14px;">
            <div><?php echo strtoupper($name); ?></div>
            <div>No Expire</div>
        </div>

        <div class="type" style="display:flex;flex-direction:row-reverse;font-weight:bold;font-size:14px;">DEBIT CARD</div>
        </div>
    </div>
<!-- Account Details -->
<div style="background-color:#8159e7; padding:5% 15% 5%; width:100%;">
    <table cellspacing="0px" style="width:100%;border:2px solid #fff;border-radius:6px;">
        <tr>
            <td style="border:2px solid #fff;padding:10px 20px;">Account Holder Name</td>
            <td style="border:2px solid #fff;padding:10px 20px;"><?php echo $name; ?></td>
        </tr>
        <tr>
            <td style="border:2px solid #fff;padding:10px 20px;">Aadhaar Card Number</td>
            <td style="border:2px solid #fff;padding:10px 20px;"><?php echo $aadhaar; ?></td>
        </tr>
        <tr>
            <td style="border:2px solid #fff;padding:10px 20px;">PAN Number</td>
            <td style="border:2px solid #fff;padding:10px 20px;"><?php echo $pan; ?></td>
        </tr>
        <tr>
            <td style="border:2px solid #fff;padding:10px 20px;">Debit Card NUMBER</td>
            <td style="border:2px solid #fff;padding:10px 20px;">7105 4546 7576 <?php echo $card_number; ?></td>
        </tr>
        <tr>
            <td style="border:2px solid #fff;padding:10px 20px;">Password</td>
            <td style="border:2px solid #fff;padding:10px 20px;"><?php echo $pin; ?></td>
        </tr>
    </table>
   </div>
</div>

<!-- JS Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
async function generatePDF() {
    const { jsPDF } = window.jspdf;
    const element = document.getElementById("pdfContent");

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

    pdf.save("VIRTUAL_CARD.pdf");
}
</script>