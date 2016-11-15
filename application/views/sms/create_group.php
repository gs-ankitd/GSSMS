<h2>Create Group</h2>
<form method="POST">
			<div class="row">
			<div class="col-sm-4">
			<div class="pull-left"> <label>Group Name</label></div>
			</div>
			<div class="col-sm-8">
              <div class="form-group">
                <input type="text" id="group_name" name="group_name" class="form-control">
				 <span class='false group_name_error'></span>
              </div>   
			</div> 
			</div>
			 <div class="row-spacer" style="height:20px;"></div>
			 <div class="row">
			<div class="col-sm-4">
			<div class="pull-left"> <label>Select Contacts</label></div>
			</div> 
			<div class="col-sm-8">
              <div class="form-group">
			  <select multiple="multiple" id="users" name="users[]" class="form-control">
			 
			  </select>
			 </div>   
			</div> 
			</div>
			 <div class="row-spacer" style="height:20px;"></div> 
			<div class="row">
			<div class="col-sm-4">
			</div>
			<div class="col-sm-8">
			
                  <button type="submit" class="btn btn-primary">Save</button>
            
            </div>
			</div> 
    <span class='success'></span>
</form>
 