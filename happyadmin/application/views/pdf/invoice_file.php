	<?php
		  if(!empty($get_search_profiles)){
		   	?>
               <?php $r_id = $get_search_profiles->id;
               	$happynikah_id = $get_search_profiles->happynikah_id;
				$name = $get_search_profiles->name;
				$age = $get_search_profiles->age;
				$phone = $get_search_profiles->phone;
				$add= $get_search_profiles->address;
				$add= $get_search_profiles->age;
				$marital_status = $get_search_profiles->marital_status;
                $color = $get_search_profiles->color;
                $appearance = $get_search_profiles->appearance;
                $photo = $get_search_profiles->photo;
                $physical_status = $get_search_profiles->physical_status;
                $color = $get_search_profiles->color;
                $native_place = $get_search_profiles->native_place;
                 
				if($get_search_profiles->gender == '1')
				{
				$gender = "Male";
				}
				else
				{
				$gender = "Female";
				}
				?>
              
              <div class="container">
                  <div class="row">
                     <div class="col-lg-12">
               
            <!--   <b style="font-size:25px;color:#ff5b85;"><center>-->
                   
            <!--&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; HappyNikah</center></b><br/><br/>-->
            
                   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  
             <img src="<?php echo base_url();?>/assets/images/logoring.png" style="width:150px;height:150px;">
             
            <h2 style="color:#000;margin-top:60;font-size: 30px;" >INVOICE</h2>
           <br/>  <br/>  <br/>
            <hr>
         
             
             
         
           
              
        <style>
  hr + br {
    content: "\A";
    white-space: pre;
  }

  hr::after {
    content: '\A';
    white-space: pre;
  }
  table 
  {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}


td, th 
{
  border: 0.5px solid #000;
  text-align: left;
  padding: 5px;
}

.right-line 
{
    width: 100px;
    position: relative;
    float: right;
    /*border: none;
    border-right: 1px solid black;
    height: 1px;
    margin-right: auto;
    translate: 300px 0px 50px;*/
}

.horizontal-line {
    width: 100%;
    height: 1px;
    background-color: black;
}



</style>      
            
          <br/>
         


        <?php
                $this->db->select('tbl_registration.id,tbl_registration.happynikah_id,tbl_payement.*,tbl_plan.plan_name,tbl_plan.duration,tbl_plan.plan_id');
                $this->db->from('tbl_payement');
                $this->db->join('tbl_registration','tbl_registration.id = tbl_payement.user_id');
                $this->db->join('tbl_plan','tbl_plan.plan_id = tbl_payement.plan_id');
               $this->db->where('tbl_registration.happynikah_id', $happynikah_id);
                $this->db->where('tbl_registration.phone', $phone);
                $this->db->where('tbl_payement.user_id',$r_id);  
                $this->db->where('tbl_payement.status','1');   
                $query = $this->db->get()->result_array();?>
        
        <?php foreach($query as $others)
        {?>








            <h5 style="color:#000;" >INVOICE TO
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
TOTAL AMOUNT
            </h5>
 
            <b><?php echo $name;?>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
     <?php echo $others['final_amount'];?></b>

            <br/>
             <b><?php echo $happynikah_id;?></b>


            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
   No:<?php echo $others['user_id'];?>


             <br/>
            PH: <?php echo $phone;?>

      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
<?php
$currentDate = date('d/m/Y');?>
   Date: <?php echo $currentDate;?>


            <br/>
            <br/>
  <br/>
            <br/>
        
     
        
              
       <table>
  <tr>
    <th  style="background-color:#000;color:#fff;text-align: center;font-weight: bold;height:20px;width: 300px;">PLAN</th>
    <th  style="background-color:#000;color:#fff;text-align: center;font-weight: bold;height:20px;width: 200px;">AMOUNT</th>
    <th  style="background-color:#000;color:#fff;text-align: center;font-weight: bold;height:20px;width: 130px;">TOTAL</th>
  </tr>
  <tr>
    <td style="text-align: center;">
<br/><br/><br/>
      <b><?php echo $others['plan_name'];?><br/>

         <?php echo $others['duration'];?>&nbsp;&nbsp;DURATION<br/>

    <?php $total_contact=$others['contactbalance']+
    $others['addoncontact']-$others['leftcontact'];?>
    <?php echo $total_contact;?> CONTACTS &nbsp;&nbsp;&

    <?php $total_message=$others['messagebalance']+
       $others['addonmessage']-$others['leftmessage'];?>
       <?php echo $total_message;?> MESSAGE</b>
<br/><br/><br/>

    </td>
    <td style="text-align: center;"><br/><br/><br/>
     <?php
     $final_amount = $others['final_amount'];
     $calculated_amount = $final_amount * 18 / 100;
    ?>
    
      <?php $result_final_sub_amount = $final_amount-$calculated_amount;?>
      
      <?php echo $result_final_sub_amount;?>   
 
    
    <br/><br/><br/></td>
    <td style="text-align: center;"><br/><br/><br/><?php echo $others['final_amount'];?><br/><br/><br/></td>
    
  </tr>
  
<tr>
  <td colspan="1" style="border: none;"></td>  
  <td colspan="2" style="text-align: center;"><br/><br/>
    
    Sub-total :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
       <?php
     $final_amount = $others['final_amount'];
     $calculated_amount = $final_amount * 18 / 100;
    ?>
    
      <?php $result_final_sub_amount = $final_amount-$calculated_amount;?>
      
      <?php echo $result_final_sub_amount;?>
    
    <br/><br/><br/>
  </td>
</tr>


<tr>
  <td colspan="1" style="border: none;"></td>  
  <td colspan="2" style="text-align: center;"><br/><br/>
    
    GST(18%) :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
  
    
    <?php
    $final_amount = $others['final_amount'];
    $calculated_amount = $final_amount * 18 / 100;
    
    echo $calculated_amount;
    ?>
    
    <br/><br/><br/>
  </td>
</tr>



<tr>
  <td colspan="1" style="border: none;"></td>
  <td colspan="2" style="text-align: center;"><br/><br/>
   
    <b> Total :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php $result_final_amount = $result_final_sub_amount+$calculated_amount;?>
    <?php echo $result_final_amount;?></b><br/>
  </td>
</tr>
  
</table>

<label style="margin-top:30px;">Payment Method:</label><br/><br/><br/>
<b>CALICUT OFFICE</b><br>
<b>CASH</b><br/><br/><br/><br/><br/>

<!-- <hr class="right-line"> -->
<label style="float: right;">
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;SIGNATURE</label>
<br/><br/><br/><br/><div class="horizontal-line"></div>


<!-- <div class="border-top my-3"></div> -->

             </div>
            </div>
           </div>
                           
			<?php }?>
			<?php }?>	
		



			

 
 
        

			
			
			
			
			
			