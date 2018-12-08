<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice</title>
    
  </head>
  <body id="HTMLtoPDF">
  <style>
      .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}



h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
    </style>
  <a href="#" onclick="HTMLtoPDF()">Download PDF</a>
    <header class="clearfix">
     <?php 
     $date = null;
     $debit = null;
     $TotalDebit = 0;
     $TotalCredit = 0;
     foreach ($list_item as $fees) {
        $date = $fees['date'];
        $debit = $fees['debit'];
        $TotalDebit += $fees['debit'];
        $TotalCredit += $fees['credit'];
       
     }

      ?>
      <h1>INVOICE</h1>
      <div id="company" class="clearfix">
        <div>Company Name</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      <div id="project">
        <div><span>Name</span> <?php echo $student_info['std_full_name']; ?></div>
        <div><span>Mobile</span> <?php echo $student_info['std_mobile']; ?></div>
        
        <div><span>EMAIL</span> <?php echo $student_info['std_email']; ?>
        <div><span>DATE</span><?php echo $date ?></div>
        
      </div>

    </header>
    <main>

      <table>
        <thead>
          <tr>
            <th class="service">Courses</th>
            <th class="desc">DESCRIPTION</th>
            
            <th>Amount</th>
           
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service"><?php echo $student_info['std_course']; ?></td>
            <td class="desc">   </td>
            <td class="unit"><?php echo $fees['debit']; ?></td>
            
          </tr>
         
          
          
          <tr>
            <td colspan="2">Balance</td>
            <td class="total">&#x20B9;<?php echo $TotalCredit - $TotalDebit ?></td>
          </tr>
          <tr>
            <td colspan="2">TAX </td>
            <td class="total"></td>
          </tr>
          <tr>
            <td colspan="2" class="grand total">GRAND TOTAL</td>
            <td class="grand total"><?php echo $fees['debit']; ?></td>
          </tr>
        </tbody>
      </table>
      
     
    </main>
    <footer>
      
    </footer>
  </body>
</html>
<script src="<?php echo base_url('assets/jspdf/jspdf.js'); ?>"></script> 
<script src="<?php echo base_url('assets/jspdf/jquery-2.1.3.js'); ?>"></script>
<script src="<?php echo base_url('assets/jspdf/pdfFromHTML.js'); ?>"></script>
 