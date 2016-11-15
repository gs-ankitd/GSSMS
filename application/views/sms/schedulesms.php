<div class="container">

  <div class="content">

    <div class="content-container">
 <div>
        <h2 class="content-header-title">Schedule SMS</h2>
        
</div>


      <div class="row">
        <div class="col-md-2">
		   <div class="portlet portlet-plain">
						<div class="portlet-header"> <h3>Welcome GS!</h3> </div>
								<div class="portlet-content">
                               Availablle Credits:
                                
                                <span id="ctl00_lblcredits" style="font-size:Medium;font-weight:bold;">165</span>&nbsp;Messages</div>
            </div>
		</div>
        <div class="col-md-8">
				<?php if($this->session->flashdata('success')){ ?>
       		 <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
        		 </div>
   			 <?php }else if($this->session->flashdata('error')){  ?>
        		 <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
        		 </div>
   			 <?php }?>
          <div class="portlet">

            <div class="portlet-header">

              <h3>
                <i class="fa fa-tasks"></i>
                Schedule SMS.
              </h3>

            </div> <!-- /.portlet-header -->

            <div class="portlet-content">
			<form action="<?php echo site_url('schedulesms/sendscheduledsms')?>" method="post" name="schedulesmsform" id="schedulesmsform">
			<div class="row">
									<div class="col-sm-4">
										<div class="pull-left">
											<label >Name</label>
										</div>
									</div>
									<div class="col-sm-8">
										<div class="form-group">
											<input type="hidden" id="action" name="action" value="singlesms" >
											<input type="text" id="name" name="name" class="form-control">
										</div>

									</div>
								</div>
			<div class="row">
			<div class="col-sm-4"> 
			<div class="pull-left"> <label>Recipient No</label></div>
			</div>
			<div class="col-sm-8">
              <div class="form-group">
                <input type="text" id="recipient_no" name="recipient_no" class="form-control">
              </div>   
			  
            </div> 
			</div>
			<div class="row-spacer" style="height:20px;"></div>
			 <div class="row">
			<div class="col-sm-4">
			<div class="pull-left"> <label>Select Template</label></div>
			</div> 
			<div class="col-sm-8">
              <div class="form-group">
			  <select id="template" name="template" class="form-control">
			   <option value="">Select Template</option>
			  </select>
			 </div>   
			</div> 
			</div>
			 <div class="row-spacer" style="height:20px;"></div> 
			<div class="row">
			<div class="col-sm-4">
			 <div class="pull-left"><label>Message</label></div>
			</div> 
			<div class="col-sm-8">
              <textarea class="form-control" id="count-textarea2" name="message" rows="3"></textarea>
			  
            </div>
			</div>
			 <div class="row-spacer" style="height:20px;"></div> 
			  <div class="row">
			<div class="col-sm-12">
			<div class="pull-left"> 
                Scheduled Date and Time</div>
			</div>
			</div>
			 <div class="row">
			 <div class="col-sm-4">
			 <div class="pull-left"> 
                <label >Select Date</label></div>
			 </div>
			<div class="col-sm-8">
				<input type="hidden" id="action" name="action" value="schedulesms" >
                <div id="dp-ex-2" class="input-group date">
                    <input class="form-control" type="text" name="date" >
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div>
            </div> 
			</div>
			<div class="row-spacer" style="height:20px;"></div> 
			 <div class="row">
			 <div class="col-sm-4">
			 <div class="pull-left"> 
                <label >Select Time</label></div>
			 </div>
			<div class="col-sm-8">
				<div class="input-group bootstrap-timepicker">
                    <input id="tp-ex-1" type="text" class="form-control" name="time">
                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                </div> 
            </div> 
			</div>
			 <div class="row-spacer" style="height:20px;"></div> 
			<div class="row">
			<div class="col-sm-4">
			</div>
			<div class="col-sm-8">
			
                  <button type="submit" class="btn btn-primary">Send</button>
            
            </div>
			</div> 
			 <div class="row-spacer" style="height:20px;"></div> 
			</form>
			<div class="progress" style="clear:both;display:none;">
				<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" >
				  <span class="sr-only">60% </span>Complete!
				</div>
			 </div>
			<div id="status" style="display:none;"></div> 
            </div> <!-- /.portlet-content -->

          </div> <!-- /.portlet -->
          </div> <!-- /.col -->
		<div class="col-md-2">
				 <div class="portlet portlet-plain">
						<div class="portlet-header"> <h3>Contact Information</h3> </div>
								<div class="portlet-content">
                               Email Us @ : info@gsteckno.com
                                </div>
                 </div>
		</div>


        <div class="col-md-12">

          <div class="portlet">

            <div class="portlet-header">

              <h3>
                <i class="fa fa-list-ul"></i>
               Guidelines
              </h3>

            </div> <!-- /.portlet-header -->

            <div class="portlet-content">

            <ul class="icons-list">
			     <li>
                  <i class="icon-li fa fa-info-circle"></i>
                  Please enter “Name”, “Recipient’s Mobile number” and “Text Message” to be sent.
                </li>
                <li>
                  <i class="icon-li fa fa-info-circle"></i>
                  Mobile Number should be preceeded by the Country Code.
                </li>
                
                <li>
                  <i class="icon-li fa fa-info-circle"></i>
                  Message should not be more than 150 characters.
                </li>
               
				
              </ul>
                  

            </div> <!-- /.portlet-content -->

          </div> <!-- /.portlet -->
		</div> <!-- /.col -->

      </div> <!-- /.row -->

    </div> <!-- /.content-container -->
      
  </div> <!-- /.content -->

</div> <!-- /.container -->