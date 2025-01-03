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
             
            <h4 style="color:#ff5b85;margin-top:60" >Contact Us</h4>
            HIBA HANNAN<br/>
            SERVICE MANAGER<br/>
            MOB: 8089201114<br/>
            <hr>
         
             
             
             
                 <img src="<?php echo base_url();?>../assets/photo_storage/<?php echo $photo;?>" class="w-100px rounded-3"  style="margin-top:120px;"  width ="140px" height="160px" alt="happy nikah profile" />
              <!--<?php echo $r_id;?>-->
           
              
        <style>
  hr + br {
    content: "\A";
    white-space: pre;
  }
  hr::after {
    content: '\A';
    white-space: pre;
  }
</style>      
            
          <br/>
              <!--  <b><?php echo $name;?></b><br/>-->
                
                
          
         
              <!--<b><?php echo $happynikah_id;?></b><br/>-->
              
              <!--<b><?php echo $phone;?></b><br/>-->
              <!--<b><?php echo $add;?></b><br/>-->
              <!--<b><?php echo $gender;?></b>-->
              
            
           
        <!--// $this->db->select('r.*,ed.edu_id,ed.education as edn,p.profession_id,p.profession_name,c.cid,-->
        <!--// c.caste as castename,h.height_id,h.height as hname,w.weight_id,w.weight as wname,f.user_id,f.familytype,f.financial_status,d.district,-->
        <!--// f.fathers_occupation,f.mothers_occupation,f.hometype,f.fatherdetails,f.motherdetails,f.total_members,f.brothers_married,f.sisters_married')-->
        <!--// ->from('tbl_registration as r')-->
        <!--// ->join('tbl_education as ed','ed.edu_id=r.education')-->
        <!--// ->join('tbl_profession  as p','p.profession_id=r.occupation')-->
        <!--// ->join('tbl_caste   as c','c.cid=r.caste')-->
        <!--//  ->join('tbl_district   as d','d.district_id=r.native_district')-->
        <!--// ->join('tbl_height  as h','h.height_id=r.height')-->
        <!--// ->join('tbl_weight  as w','w.weight_id=r.weight')-->
        <!--// ->join('tbl_familyprofile  as f','f.user_id=r.id')-->
        <!--// ->where('r.happynikah_id',$happynikah_id)-->
        <!--// ->where('r.phone',$phone)-->
        <!--// ->get()->result_array();?>-->
        
        
        <?php  $dataothers= $this->db->select('r.*, ed.edu_id, ed.education as edn, p.profession_id, p.profession_name, c.cid, c.caste as castename, 
        h.height_id, h.height as hname, w.weight_id, w.weight as wname, f.user_id, f.familytype, f.financial_status, d.district, f.fathers_occupation, f.mothers_occupation,
        f.hometype, f.fatherdetails, f.motherdetails, f.total_members, f.brothers_married, f.sisters_married')
        ->from('tbl_registration as r')
        ->join('tbl_education as ed', 'ed.edu_id = r.education', 'left')
        ->join('tbl_profession as p', 'p.profession_id = r.occupation', 'left')
        ->join('tbl_caste as c', 'c.cid = r.caste', 'left')
        ->join('tbl_district as d', 'd.district_id = r.native_district', 'left')
        ->join('tbl_height as h', 'h.height_id = r.height', 'left')
        ->join('tbl_weight as w', 'w.weight_id = r.weight', 'left')
        ->join('tbl_familyprofile as f', 'f.user_id = r.id', 'left')
        ->where('r.happynikah_id', $happynikah_id)
        ->where('r.phone', $phone)
        ->get()->result_array();
        ?>
        
        <?php foreach($dataothers as $others)
        {?>
        
              
              
              <u style="font-size:0px;"><h3 style="color:#45b6fe;">Basic Information</h3></u>

Name:<?php echo $name;?>     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br/> <br/> 

Age:<?php echo $age;?>
  
  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  

Gender:<?php echo $gender;?>
  
  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   
Height: <?php echo $others['hname'];?>         
        
  
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   
Weight: <?php echo $others['wname'];?>  <br/> <br/> 
    
    
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   
Maritial Status: <?php echo $marital_status;?>   <br/> <br/>       
        
  
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   
Physical Status: <?php echo $physical_status;?>   
    
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   
Complextion: <?php echo $color;?>  <br/> <br/>  
  
  
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   
Native District and Place: <?php echo $others['district'];?>    
    &nbsp;,      
      <?php echo $native_place;?>   <br/> <br/>  
    
         <u><h3 style="color:#45b6fe;">Religious Attribute</h3></u>
    
        
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   
Religion: <?php echo "Muslim";?>         
        
  
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   
Sub Caste:  <?php echo $others['castename'];?><br/> <br/>   
    
     <u><h3 style="color:#45b6fe;">Education and Occupation</h3></u>
    
        
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   
Education: <?php echo $others['edn'];?>         
        
  
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    
Occupation:  <?php echo $others['profession_name'];?> <br/> <br/>  
    
    
      <u style="text-decoration: underline double;"><h3 style="color:#45b6fe;">Family Details</h3></u>
    
        
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   
Family Type: <?php echo $others['familytype'];?>         
        
  
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;      
Financial Status: <?php echo $others['financial_status'];?> <br/> <br/>  


 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   
Father Details: <?php echo $others['fatherdetails'];?>,&nbsp; <?php echo ($others['fathers_occupation']);?>         
        
  
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   
Mother Details: <?php echo $others['motherdetails'];?>,&nbsp;<?php echo ($others['mothers_occupation']);?>   <br/> <br/> 


 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   
Home Type: <?php echo $others['hometype'];?>         
        
  
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;       
Total  Members: <?php echo $others['total_members'];?> <br/> <br/> 


 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   
No of Brother's Married: <?php echo $others['brothers_married'];?>         
        
  
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   
No of Sister's Married: <?php echo $others['sisters_married'];?> <br/> <br/> 



             </div>
            </div>
           </div>
              
              
              
              
              
              
			<?php }?>
			<?php }?>	
		



			

 
 
        

			
			
			
			
			
			