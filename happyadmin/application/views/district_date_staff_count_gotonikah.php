<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>
<?php  
  
  $total_count1= $this->db->select('*')->from('tbl_registration')->where('home_district',1)
  ->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)->where('staff_id',$user_id)->where('goto_nikah',1)
  ->get()->num_rows();
  $total_count1_male= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',1)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('gender','1')->where('goto_nikah',1)->get()->num_rows();
  $total_count1_female= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',1)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('gender','2')->where('goto_nikah',1)->get()->num_rows();


  
  $total_count2= $this->db->select('*')->from('tbl_registration')->where('home_district',2)
  ->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)->where('staff_id',$user_id)->where('goto_nikah',1)
  ->get()->num_rows(); 
  $total_count2_male= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',2)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('goto_nikah',1)->where('gender','1')->get()->num_rows();
  $total_count2_female= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',2)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('goto_nikah',1)->where('gender','2')->get()->num_rows();
 

  $total_count3= $this->db->select('*')->from('tbl_registration')->where('home_district',3)
  ->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('goto_nikah',1)->where('staff_id',$user_id)->get()->num_rows(); 
  $total_count3_male= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',3)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('goto_nikah',1)->where('gender','1')->get()->num_rows();
  $total_count3_female= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',3)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('goto_nikah',1)->where('gender','2')->get()->num_rows();


  $total_count4= $this->db->select('*')->from('tbl_registration')->where('home_district',4)
  ->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)->where('staff_id',$user_id)->where('goto_nikah',1)->get()->num_rows(); 
  $total_count4_male= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',4)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('gender','1')->where('goto_nikah',1)->get()->num_rows();
  $total_count4_female= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',4)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('gender','2')->where('goto_nikah',1)->get()->num_rows();

  $total_count5= $this->db->select('*')->from('tbl_registration')->where('home_district',5)
  ->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)->where('staff_id',$user_id)->where('goto_nikah',1)->get()->num_rows(); 
  $total_count5_male= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',5)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('gender','1')->where('goto_nikah',1)->get()->num_rows();
  $total_count5_female= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',5)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('gender','2')->where('goto_nikah',1)->get()->num_rows();


  $total_count6= $this->db->select('*')->from('tbl_registration')->where('home_district',6)
  ->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)->where('staff_id',$user_id)
  ->where('goto_nikah',1)->get()->num_rows();
  $total_count6_male= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',6)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('gender','1')->where('goto_nikah',1)->get()->num_rows();
  $total_count6_female= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',6)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('gender','2')->where('goto_nikah',1)->get()->num_rows();


  $total_count7= $this->db->select('*')->from('tbl_registration')->where('home_district',7)
  ->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)->where('staff_id',$user_id)->where('goto_nikah',1)->get()->num_rows();
  $total_count7_male= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',7)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('gender','1')->where('goto_nikah',1)->get()->num_rows(); 
  $total_count7_female= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',7)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('gender','2')->where('goto_nikah',1)->get()->num_rows();


  $total_count8= $this->db->select('*')->from('tbl_registration')->where('home_district',8)
  ->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('goto_nikah',1)->get()->num_rows(); 
  $total_count8_male= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',8)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('gender','1')->where('goto_nikah',1)->get()->num_rows();
  $total_count8_female= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',8)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('gender','2')->where('goto_nikah',1)->get()->num_rows();


  $total_count9= $this->db->select('*')->from('tbl_registration')->where('home_district',9)
  ->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)->where('goto_nikah',1)->where('staff_id',$user_id)
  ->get()->num_rows();
  $total_count9_male= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',9)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('gender','1')->where('goto_nikah',1)->get()->num_rows();
  $total_count9_female= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',9)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('gender','2')->where('goto_nikah',1)->get()->num_rows();


  $total_count10= $this->db->select('*')->from('tbl_registration')->where('home_district',10)
  ->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)->where('staff_id',$user_id)->where('goto_nikah',1)->get()->num_rows(); 
  $total_count10_male= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',10)->where('reg_date >=',$from_date)
  ->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('gender','1')->where('goto_nikah',1)->get()->num_rows();
  $total_count10_female= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',10)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('gender','2')->where('goto_nikah',1)->get()->num_rows();

  $total_count11= $this->db->select('*')->from('tbl_registration')->where('home_district',11)
  ->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)->where('staff_id',$user_id)->where('goto_nikah',1)->get()->num_rows(); 
  $total_count11_male= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',11)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('gender','1')->where('goto_nikah',1)->get()->num_rows();
  $total_count11_female= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',11)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('gender','2')->where('goto_nikah',1)->get()->num_rows();


  $total_count12= $this->db->select('*')->from('tbl_registration')->where('home_district',12)
  ->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)->where('staff_id',$user_id)->where('goto_nikah',1)->get()->num_rows(); 
  $total_count12_male= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',12)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('gender','1')->where('goto_nikah',1)->get()->num_rows();
  $total_count12_female= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',12)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('gender','2')->where('goto_nikah',1)->get()->num_rows();

  $total_count13= $this->db->select('*')->from('tbl_registration')->where('home_district',13)
  ->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)->where('staff_id',$user_id)->where('goto_nikah',1)->get()->num_rows(); 
  $total_count13_male= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',13)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('gender','1')->where('goto_nikah',1)->get()->num_rows();
  $total_count13_female= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',13)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('gender','2')->where('goto_nikah',1)->get()->num_rows();

  $total_count14= $this->db->select('*')->from('tbl_registration')->where('home_district',14)
  ->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)->where('staff_id',$user_id)->where('goto_nikah',1)->get()->num_rows();
  $total_count14_male= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',14)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('gender','1')->where('goto_nikah',1)->get()->num_rows();
  $total_count14_female= $this->db->select('*')->from('tbl_registration')
  ->where('home_district',14)->where('reg_date >=',$from_date)->where('reg_date <=',$to_date)
  ->where('staff_id',$user_id)->where('gender','2')->where('goto_nikah',1)->get()->num_rows(); 
  ?>
 
 <div class="row">
  <div class="col-md-3">

    <p style="margin-left: 30px;margin-right: 30px;
      font-size: 16px;
      font-weight: 550;
      border-radius: 10px;
      background-color: lightblue;
      border: 2px solid navy;padding: 8px;">Alappuzha&nbsp;<?php echo $total_count1; ?>
       <br/>
       <label>Male&nbsp;<?php echo $total_count1_male;?></label> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <label>Female&nbsp;<?php echo $total_count1_female;?></label> 
      </p> 


    </div>
      <div class="col-md-3">
       <p style="margin-left: 30px;margin-right: 30px;
      font-size: 16px;
      font-weight: 550;
      border-radius: 10px;
      background-color: lightblue;
      border: 2px solid navy;padding: 8px;">Ernakulam&nbsp;<?php echo $total_count2; ?>
       <br/>
       <label>Male&nbsp;<?php echo $total_count2_male;?></label> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <label>Female&nbsp;<?php echo $total_count2_female;?></label> 
      </p> 
  </div>
       <div class="col-md-3">
      <p style="margin-left: 30px;margin-right: 30px;
      font-size: 16px;
      font-weight: 550;
      border-radius: 10px;
      background-color: lightblue;
      border: 2px solid navy;padding: 8px;">Idukki&nbsp;<?php echo $total_count3; ?>
          <br/>
       <label>Male&nbsp;<?php echo $total_count3_male;?></label> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <label>Female&nbsp;<?php echo $total_count3_female;?></label> 
      </p> 
       </div>
<div class="col-md-3">
      <p style="margin-left: 30px;margin-right: 30px;
      font-size: 16px;
      font-weight: 550;
      border-radius: 10px;
      background-color: lightblue;
      border: 2px solid navy;padding: 8px;">Kannur&nbsp;<?php echo $total_count4; ?>
        
            <br/>
       <label>Male&nbsp;<?php echo $total_count4_male;?></label> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <label>Female&nbsp;<?php echo $total_count4_female;?></label> 
      </p> 

     </div>
   </div>

      <div class="row">
  
     <div class="col-md-3">
      <p style="margin-left: 30px;margin-right: 30px;
      font-size: 16px;
      font-weight: 550;
      border-radius: 10px;
      background-color: lightblue;
      border: 2px solid navy;padding: 8px;">Kasaragod&nbsp;<?php echo $total_count5; ?>
        
            <br/>
       <label>Male&nbsp;<?php echo $total_count5_male;?></label> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <label>Female&nbsp;<?php echo $total_count5_female;?></label> 
      </p> 
      </div>
<div class="col-md-3">
      <p style="margin-left: 30px;margin-right: 30px;
      font-size: 16px;
      font-weight: 550;
      border-radius: 10px;
      background-color: lightblue;
      border: 2px solid navy;padding: 8px;">Kollam&nbsp;<?php echo $total_count6; ?>
        
            <br/>
       <label>Male&nbsp;<?php echo $total_count6_male;?></label> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <label>Female&nbsp;<?php echo $total_count6_female;?></label> 
      </p>

   </div>
   <div class="col-md-3">
      <p style="margin-left: 30px;margin-right: 30px;
      font-size: 16px;
      font-weight: 550;
      border-radius: 10px;
      background-color: lightblue;
      border: 2px solid navy;padding: 8px;">Kottayam&nbsp;<?php echo $total_count7; ?>
        
            <br/>
       <label>Male&nbsp;<?php echo $total_count7_male;?></label> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <label>Female&nbsp;<?php echo $total_count7_female;?></label> 

      </p>
</div>
  <div class="col-md-3">
      <p style="margin-left: 30px;margin-right: 30px;
      font-size: 16px;
      font-weight: 550;
      border-radius: 10px;
      background-color: lightblue;
      border: 2px solid navy;padding: 8px;">Kozhikode&nbsp;<?php echo $total_count8; ?>
        
            <br/>
       <label>Male&nbsp;<?php echo $total_count8_male;?></label> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <label>Female&nbsp;<?php echo $total_count8_female;?></label> 

      </p>

</div>
</div>
<div class="row">
  <div class="col-md-3">
      <p style="margin-left: 30px;margin-right: 30px;
      font-size: 16px;
      font-weight: 550;
      border-radius: 10px;
      background-color: lightblue;
      border: 2px solid navy;padding: 8px;">Malappuram&nbsp;<?php echo $total_count9; ?>
        

            <br/>
       <label>Male&nbsp;<?php echo $total_count9_male;?></label> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <label>Female&nbsp;<?php echo $total_count9_female;?></label> 

      </p>
    </div>
 <div class="col-md-3">
      <p style="margin-left: 30px;margin-right: 30px;
      font-size: 16px;
      font-weight: 550;
      border-radius: 10px;
      background-color: lightblue;
      border: 2px solid navy;padding: 8px;">Palakkad&nbsp;<?php echo $total_count10; ?>
            
            <br/>
       <label>Male&nbsp;<?php echo $total_count10_male;?></label> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <label>Female&nbsp;<?php echo $total_count10_female;?></label> 

      </p>
          </div>

 <div class="col-md-3">
      <p style="margin-left: 30px;margin-right: 30px;
      font-size: 16px;
      font-weight: 550;
      border-radius: 10px;
      background-color: lightblue;
      border: 2px solid navy;padding: 8px;">Pathanamthitta&nbsp;<?php echo $total_count11; ?>
            
            <br/>
       <label>Male&nbsp;<?php echo $total_count11_male;?></label> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <label>Female&nbsp;<?php echo $total_count11_female;?></label> 
      </p>
 </div>
  <div class="col-md-3">
      <p style="margin-left: 30px;margin-right: 30px;
      font-size: 16px;
      font-weight: 550;
      border-radius: 10px;
      background-color: lightblue;
      border: 2px solid navy;padding: 8px;">Thrissur&nbsp;<?php echo $total_count12; ?>
            
            <br/>
       <label>Male&nbsp;<?php echo $total_count12_male;?></label> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <label>Female&nbsp;<?php echo $total_count12_female;?></label> 
      </p> 
       </div>
     </div>
     <div class="row">
  <div class="col-md-3">

      <p style="margin-left: 30px;margin-right: 30px;
      font-size: 16px;
      font-weight: 550;
      border-radius: 10px;
      background-color: lightblue;
      border: 2px solid navy;padding: 8px;">Thiruvananthapuram&nbsp;<?php echo $total_count13; ?>
            
            <br/>
       <label>Male&nbsp;<?php echo $total_count13_male;?></label> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <label>Female&nbsp;<?php echo $total_count13_female;?></label> 

      </p>
</div>
  <div class="col-md-3">
      <p style="margin-left: 30px;margin-right: 30px;
      font-size: 16px;
      font-weight: 550;
      border-radius: 10px;
      background-color: lightblue;
      border: 2px solid navy;padding: 8px;">Wayanad&nbsp;<?php echo $total_count14; ?>
        

            <br/>
       <label>Male&nbsp;<?php echo $total_count14_male;?></label> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <label>Female&nbsp;<?php echo $total_count14_female;?></label> 

      </p>
      </div>
    </div>

<br/><br/>
                
            
                               
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" defer></script>

</body>
</html>
