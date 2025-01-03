<div class="paynow">




<p class="border-paynow"></p>
<div class="bottomdiv">
 
<div class="btm-paynowbtn"><button onclick="razorpaySubmit(this);">Pay 1</button></div> 
</div>
</div>

<style type="text/css">
   .smallimages-paynow{
     width: 20px !important;
     float: left;
     margin-left: 3px !important;

   }

  .paynow{
    width: 100%;
    margin-bottom: 13px;
    /* box-shadow: 0 0 8px 0 #807f7f6e; */
    padding: 4px 0px;
    padding-top: 24px;
    margin-bottom: 30px;
    padding-bottom: 0;
    float: left;

  }
  .paynow-img{
    width: 40%;
    float: left;
    overflow: hidden;
    height: 117px;
  }

  .paynow-img img{
    width: 78%;
    border-radius: 3px;
    float: left;
    margin-left: 8px;

  }
  .paynowtext{
    padding: 4px 6px;
    float: right;
    width: 60%;
  }
  .paynowtext-head{
    font-size: 17px !important;
    color: #333230;
    margin-bottom: 4px;
    font-weight: bold;
  }
  .paynowtext-subhead{
    font-size: 13px !important;
    color: #777373;
    width: 93%;
    margin-bottom: 0px;
  }
  .bottomdiv{
    
    width: 100%;
    float: left;
    padding-top: 10px;
  }
  .btm-paynowtext{
    float: left;
    width: 67%;
  }
  .btm-paynowbtn button{
    background: #df2d2d;
    color: white;
    border: 0;
    width: 33%;
    border-radius: 4px;
    padding: 8px;
  }
  .btm-paynowtext-main{
    font-size: 14px !important;
    margin-bottom: 0px;
    color: #4d4b45;
  }
  .btm-paynowtext-sub{
    color: #989494;
  }
  .border-paynow{
    float: left;
    border-bottom: 1px solid #e0e0e0;
    width: 91%;
    margin-left: 4%;
    margin-bottom: 0;
    padding-top: 6px;
}
 .btm-order-amount{
 	font-size: 17px !important;
 	color: #48494a;
 	font-weight: bold;
 	padding-top: 5px;
 	margin-bottom: 0;
 }
 #subproduct{
 	float: left;
    width: 10%;
 }
</style>




<?php
$payable = 1;
$currency = 'INR';
$productinfo = 'Product';
$txnid = time();
$surl = $surl;
$furl = $furl;        
$key_id = 'rzp_live_3hGWIPrCU25LLK';
$currency_code = 'INR'; 

$total = $payable* 100;
 
$merchant_order_id = 'gdrtdrtrt';
$card_holder_name = 'Jram';
$phone = '9400121578';
$return_url = base_url().'home/paymentcallbackafterorder_razrpy';
 
 
?>
 
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
 
<input type="hidden" name="planamount" id="planamount">
<script>

  function payrazor(amount,planid){
      
    //   var amount = 1;
      
      var amountnew = (+amount) * 100;
      
      
      
      $('#planamount').val(amountnew);
      
        var razorpay_options = {
    key: "<?php echo $key_id; ?>",
    amount: amountnew,
    description: "Payment-After-Order # <?php echo $merchant_order_id; ?>",
    netbanking: true,
    currency: "INR",
    callback_url: '<?php echo site_url("home/paymentcallbackafterorder_razrpy?planid="); ?>'+planid,
    redirect: true,
    prefill: {
      name:"<?php echo $card_holder_name; ?>",
       
      contact: "<?php echo $phone; ?>"
    },
    notes: {
      soolegal_order_id: "<?php echo $merchant_order_id; ?>",
    },
    handler: function (transaction) {   
         document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
        document.getElementById('razorpay-form').submit();
    },
    "modal": {
        "ondismiss": function(){
           // location.reload()
        }
    }
  };
    var razorpay_submit_btn, razorpay_instance;
    
        if(typeof Razorpay == 'undefined'){
      setTimeout(razorpaySubmit, 200);
      if(!razorpay_submit_btn && el){
        razorpay_submit_btn = el;
        el.disabled = true;
        el.value = 'Please wait...';  
      }
    } else {
      if(!razorpay_instance){
        razorpay_instance = new Razorpay(razorpay_options);
        if(razorpay_submit_btn){
          razorpay_submit_btn.disabled = false;
          razorpay_submit_btn.value = "Pay Now";
        }
      }
      razorpay_instance.open();
    }
     // razorpaySubmit(this);
      
  }
  
   

  var razorpay_submit_btn, razorpay_instance;

  function razorpaySubmit(el){
    if(typeof Razorpay == 'undefined'){
      setTimeout(razorpaySubmit, 200);
      if(!razorpay_submit_btn && el){
        razorpay_submit_btn = el;
        el.disabled = true;
        el.value = 'Please wait...';  
      }
    } else {
      if(!razorpay_instance){
        razorpay_instance = new Razorpay(razorpay_options);
        if(razorpay_submit_btn){
          razorpay_submit_btn.disabled = false;
          razorpay_submit_btn.value = "Pay Now";
        }
      }
      razorpay_instance.open();
    }
  }  
</script>