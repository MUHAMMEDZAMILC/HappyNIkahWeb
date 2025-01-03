<!DOCTYPE html>
<html>
<?php include('include/user_header.php'); ?>



        <div class="container">
            <div class="row">
            <div class="col-md-3 col-lg-3">
       

          
                    
                    
            <?php 
            $notifications = $this->General_Model->get_notifications($this->session->userdata('user_id'));
            $datas="";
            foreach($notifications->result() as $vals){
            
            $datas.='<div class="item p-3"  id="noti_'.$vals->nid.'">
            <div class="row gx-2 justify-content-between align-items-center">
                <h3 style="margin-top:150px;margin-left: 480px;">
                <center>Notifications</center></h3>
                
            <div class="col-auto proLstBox">';
            
            if(empty($vals->photo))//photo empty
            { 
            if($vals->gender== 1)
            { 
            
            $datas.='<img src="'.base_url('/assets/photo_storage/male.jpeg').'" alt="profile image" class="profile-image" style="height: 50%;
                     width: 100%;margin-top: 55px;">';
            
            }
            
            else if($vals->gender== 2)
            { 
            $datas.='<img src="'.base_url('/assets/photo_storage/female.jpeg').'" alt="profile image" class="profile-image" style="height: 50%;
                    width: 100%;margin-top: 55px;">';
            
            }
            } 
            else
            {//photo not empty 
            
            $photo_status = $this->General_Model->check_photoStatus($vals->photo);//check if approved or not
            
            if($photo_status->status != 0 && $photo_status->status != 1)
            {//if approved
            
            $sender_id = $this->session->userdata('user_id');
            $receiver_id = $vals->rid;
            $photo_privacy = $this->General_Model->photoprivacy($sender_id,$receiver_id);//check if protected
            
            if($photo_privacy !=1)
            {// if public
            
            $datas.='<img src="https://happynikah.azurewebsites.net/api/Files/photo_storage/?filePath=' . $vals->photo . '"  alt="profile image" class="profile-image" style="height: 50%;
                      width: 100%;margin-top: 157px;">';
            
            
            }
            else
            {//private
            $sender_id = $this->session->userdata('user_id');
            $receiver_id = $vals->rid;
            $photo_requeststatus = $this->General_Model->check_photo_requested($sender_id,$receiver_id);//check if protected
            if($photo_requeststatus==0)//not requested for photo
            {
            
            $file_pointer = 'assets/photo_storage_blur/'.$vals->photo;
            if(file_exists($file_pointer)){
            
            
            $datas.='<img src="https://happynikah.azurewebsites.net/api/Files/photo_storage/?filePath=' . $vals->photo . '"  alt="profile image" class="profile-image" style="height: 50%;
                      width: 100%;margin-top: 157px;">';
            
            }
            else{
            if($vals->gender== 1){ 
            
            $datas.='<img src="'.base_url().'/assets/photo_storage/male.jpeg" alt="profile image" class="profile-image" style="height: 50%;
                      width: 100%;margin-top: 157px;">';
            }
            else if($vals->gender== 2){
            $datas.='<img src="'.base_url().'/assets/photo_storage/female.jpeg" alt="profile image" class="profile-image" style="height: 50%;
                    width: 100%;margin-top: 157px;">';
            
            }}
            
            }
            else//requested for photo
            {
            $photo_requeststatus = $this->General_Model->photo_requeststatus($sender_id,$receiver_id);//check for status of the request
            if($photo_requeststatus==1)
            {
            
            
            $datas.='<img src="https://happynikah.azurewebsites.net/api/Files/photo_storage/?filePath=' . $vals->photo . '"  alt="profile image" class="profile-image" style="height: 50%;
            width: 100%;margin-top: 157px;">';
            
            
            }
            else
            {
                
            $file_pointer = 'assets/photo_storage_blur/'.$vals->photo;
            if(file_exists($file_pointer)){
            
            $datas.='<img src="https://happynikah.azurewebsites.net/api/Files/photo_storage/?filePath=' . $vals->photo . '"  alt="profile image" class="profile-image" style="height: 50%;width: 100%;margin-top: 157px;">';
            
            }
            else{
            if($vals->gender== 1){ 
            
            $datas.='<img src="'.base_url().'/assets/photo_storage/male.jpeg" alt="profile image" class="profile-image">';
            
            }
            else if($vals->gender== 2){ 
            
            $datas.='<img src="'.base_url().'/assets/photo_storage/female.jpeg" alt="profile image" class="profile-image">';
            
            }
            }
            }
            }
            
            }//end of private
            
            }//end of approved
            else//not approved
            {//
            
            if($vals->gender== 1){ 
            
            $datas.='<img src="'.base_url().'/assets/photo_storage/male.jpeg" alt="profile image" class="profile-image" style="height: 50%;width: 100%;margin-top: 157px;">';
            
            }
            else if($vals->gender== 2){
            
            $datas.='<img src="'.base_url().'/assets/photo_storage/female.jpeg" alt="profile image" class="profile-image" style="height: 50%;width: 100%;margin-top: 157px;">';
            
            }
            }//end of not approved
            }//end of photo not empty
            
            
            $datas.='</div>';
            $datas.='<div class="col">';
            $datas.='<div class="info">';
            
            $datas.='<div class="desc" style="width: 400px;">';
            $datas.=$vals->name."&nbsp;";
            if($vals->notification_type=="1")
            $datas.= "Expresed Interest on your Profile";
            elseif($vals->notification_type=="2")
            {
            $datas.="Accepted your Request";
            }elseif($vals->notification_type=="3")
            {
            $datas.= "Rejected your Request";
            }elseif($vals->notification_type=="4")
            {
            $datas.= "requested your photo";
            }elseif($vals->notification_type=="5")
            {
            $datas.= "Accepted Your PhotoRequest";
            }elseif($vals->notification_type=="6")
            {
            $datas.= "rejected your photorequest";
            }
            $now = time(); // or your date as well
            $your_date = strtotime($vals->date);
            $datediff = $now - $your_date;
            
            $days= round($datediff / (60 * 60 * 24));
            if($days==0)
            {
            // $time_in_12_hour_format  = date("g:i a", strtotime(date('H:i', strtotime($vals->date))));
            // $days=$time_in_12_hour_format;
            $days="Today";
            }
            elseif($days==1)
            {
            $days="Yesterday";
            }
            elseif($days<7 && $days>1)
            {
            $days=date('l', strtotime($vals->date));
            }
            else
            {
            $days=abs($days)."days ago."; 
            }
            
            $datas.=' </div>';
            $datas.='<div class="meta">'.$days.'</div>';
            $datas.='<div class="meta" style="padding-top: 16px;padding-right:2px;">';
            if($vals->notification_type==4)
            {
            $requeststatus = $this->General_Model->requeststatus($vals->sender_id,$vals->receiver_id);
            $sts=$requeststatus->row();
            
            
            $datas.='<div id="requestaccept_'.$vals->sender_id.'">';
            $datas.='<svg  xmlns="http://www.w3.org/2000/svg"'.($sts->status==1 || $sts->status==2)?'style="display:none;"':'style="color:green;"'.' width="24" height="24" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16" onclick="accept_photorequest('.$vals->sender_id.')">';
            $datas.='<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
            </svg>';
            $datas.='<svg '.($sts->status==1 || $sts->status==2)?'style="display:none;"':'style="color:red;"'.'xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16" onclick="reject_photorequest('.$vals->sender_id.')">';
            $datas.='<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
            </svg>
            </div>';
            $datas.='<svg id="requestrejected_'.$vals->sender_id.'"'.($sts->status==0 || $sts->status==1)?'style="display:none;"':'style="color:red;"'.'xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">';
            $datas.='<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />';
            $datas.='<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
            </svg>';
            $datas.='<svg id="requestaccepted_'.$vals->sender_id.'"  xmlns="http://www.w3.org/2000/svg"'.($sts->status==0 || $sts->status==2)?'style="display:none;"':'style="color:green;"'.' width="24" height="24" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16" onclick="accept_photorequest('.$vals->sender_id.')">';
            $datas.='<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />';
            $datas.='<path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
            </svg>';
            if($sts->status==2 || $sts->status==1) {
            $datas.=' <a href="#" aria-label="Delete" onclick="delete_notification('.$vals->nid.')" >
            <i class="fa fa-trash fa-lg" aria-hidden="true" title="Delete"></i>
            </a>';
            }
            
            }
            else
            {
            
            $datas.='<a href="#" aria-label="Delete" onclick="delete_notification('.$vals->nid.')" >
            <i class="fa fa-trash fa-lg" aria-hidden="true" title="Delete"></i>
            </a>';
            
            }
            
            $datas.='     </div>';
            $datas.=' </div>';
            $datas.=' </div>';
            $datas.='</div>';
            $datas.='</div>';
            }
            echo $datas;
            ?>
                    <!-- profile listing -->
              </div>
  </div>
    </div>
    
    
    <style>
    #footer
    {
    background-color: #ffebf0;
    padding: 330px 0 20px;
    }
    </style>
    
    <?php include('include/footer.php'); ?>
</body>
</html>