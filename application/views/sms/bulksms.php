
<div class="container">

  <div class="content">

    <div class="content-container">
 <div>
        <h2 class="content-header-title">Bulk SMS</h2>
        
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

          <div class="portlet">
			
			
			
            <div class="portlet-header">

              <h3>
                <i class="fa fa-tasks"></i>
                Send Bulk Message through File upload.
              </h3>

            </div> <!-- /.portlet-header -->

            <div class="portlet-content">
			<form action="<?php echo site_url('bulksms/sendbulksms')?>" method="post" enctype="multipart/form-data" name="myform" id="validate-basic" data-validate="parsley" class="form parsley-form">  
			 <div class="row">
			<div class="col-sm-4">
			<div class="pull-left"> <label>Choose File To Upload</label></div>
			</div>
			<div class="col-sm-8">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="input-group">
                  <div class="form-control">
                      <i class="fa fa-file fileupload-exists"></i> <span class="fileupload-preview"></span>
                  </div>
                  <div class="input-group-btn">
                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                    <span class="btn btn-default btn-file">
                      <span class="fileupload-new">Select file</span>
                      <span class="fileupload-exists">Change</span>
                      <input type="file" name="userfile" data-required="true" />
                    </span> 
                  </div>
                </div>
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
			  <select id="template" name="template" class="form-control" data-required="true">
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
              <textarea class="form-control" id="count-textarea2" name="message" rows="3" data-required="true" data-minlength="5"></textarea>
			  
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
                  Please enter “Name”,“Mobile number” to be sent in the Excel sheet.
                </li>
				 <li>
                  <i class="icon-li fa fa-info-circle"></i>
                  You will need to make sure that the columns are in the following order: “Name”,“Mobile number”.
                </li>
                <li>
                  <i class="icon-li fa fa-info-circle"></i>
                  Mobile Number should be preceeded by the Country Code.
                </li>
				 <li>
                  <i class="icon-li fa fa-info-circle"></i>
                 CSV file fields should be separatedby comma(,).No other symbol allowed.
                </li>
                <li>
                  <i class="icon-li fa fa-info-circle"></i>
                 Upload Excel sheet (.xlsx OR .csv) file.
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