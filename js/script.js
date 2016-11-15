$(document).ready(function() {
//////////////////////
$.getJSON("http://www.gsteckno.com/dev/sms/index.php/msg_templates/getmessage", function(return_data){
	$.each(return_data.templates, function(key,value){
		$('#template').append($("<option/>", { 
						value: this.id,
						text: this.template_name
					})); 
	});
});

//////////////////////
$.getJSON("http://www.gsteckno.com/dev/sms/index.php/groupsms/getgroups", function(return_data){
	$.each(return_data.contacts, function(key,value){
		$('#group').append($("<option/>", { 
						value: this.id,
						text: this.group_name
					})); 
	});
});

/////////////////////
$('#group').change(function(){
//var st=$('#student option:selected').text();
var st=$('#group').val();

if(st == ""){
	$('#recipients').show();
}else{

	$('#recipients').hide();
}
});

/////////////////////
 $('#template').change(function() {
            var template = $(this).val();
			if(template == ""){
				
				 $('#count-textarea2').val('');
			}else{

				$.ajax({
                url: 'http://www.gsteckno.com/dev/sms/index.php/msg_templates/changetemplate',
                type: 'POST',
                data: {template: template},
				dataType: 'json',
                success: function(result) {
                    $('#count-textarea2').val(result.template);
                }
            });
			}
            
        });
        
        
/*ADDRESS BOOK: STARTS*/
//$.noConflict();

var App = {
    render: function () {
        $('#addNewContact').click(function () {
            App.addNewContact();
        });
        $('#listContacts').click(function () {
            App.listContacts();
        });
		$('#createGroup').click(function () {
            App.createGroup();
        });
		$('#createTemplate').click(function () {
            App.createTemplate();
        });
      
        App.listContacts();
		App.listTemplates();
		App.listSendReports();
    },     
    
    addNewContact: function () {
        $('div.abPanel').load('addressbook/loadAddNewContactPage', function () {            
            $(this).find('form').submit(function() {
                var full_name = $('#full_name').val(), 
                    email = $('#email').val(), 
                    phone = $('#phone').val(), 
                    address = $('#address').val();
                    
                $.getJSON('addressbook/addNewContact', {
                    'full_name': full_name, 
                    'email': email, 
                    'phone': phone, 
                    'address': address
                }, function (data) {
                    $('span.false').html('');
                    if (data.success === true) { 
                        $('form').get(0).reset();
                    } else {
                        $.each(data.validationError, function () {
                            $('span.' + this.target).html(this.error);
                        });
                    }       
                    $('span.success').html(data.msg).removeClass('false').addClass(data.success.toString());
                });
              
                return false;
            });
        });
    },
    
    listContacts: function () {
        $('div.abPanel').load('addressbook/loadContactListPage', function () {
            App.loadGrid();
        });
    }, 
	listTemplates: function () {
        $('div.templates').load('list_templates.html', function () {
            App.loadtemplatesGrid();
        });
    }, 
	listSendReports: function () {
        $('div.sendReports').load('list_sendreports.html', function () {
            App.loadsendReports();
        });
    }, 
    
    createGroup: function () {
        $('div.abPanel').load('addressbook/loadCreateGroupPage', function (params) {   
		$.getJSON('addressbook/listContacts', params, function (data) {
			
            if (data.success === true) {
				
                $.each(data.contacts, function () {
					
					$('#users').append($("<option/>", { 
						value: this.id,
						text: this.full_name
					}));  
                });
             
										}           
        });    
            $(this).find('form').submit(function() {
                var group_name = $('#group_name').val(); 
                if( $('#users :selected').length > 0){
						//build an array of selected values
						var selectedusers = [];
						$('#users :selected').each(function(i, selected) {
							selectedusers[i] = $(selected).val(); 
						});
						
				}
                    
                $.getJSON('addressbook/addNewGroup', {
                    'users': selectedusers, 
                    'group_name': group_name
                }, function (data) {
                    $('span.false').html('');
                    if (data.success === true) { 
                        $('form').get(0).reset();
                    } else {
                        $.each(data.validationError, function () {
                            $('span.' + this.target).html(this.error);
                        });
                    }       
                    $('span.success').html(data.msg).removeClass('false').addClass(data.success.toString());
                });
              
                return false;
            });
        });
    },
	
	createTemplate: function () {
        $('div.templates').load('addNewTemplate.html', function () {            
            $(this).find('form').submit(function() {
                var template_name = $('#template_name').val(),  
                    template_msg = $('#template_message').val();
                    
                $.getJSON('addNewTemplate.php', {
                    'template_name': template_name, 
                    'template_msg': template_msg
                }, function (data) {
                    $('span.false').html('');
                    if (data.success === true) { 
                        $('form').get(0).reset();
                    } else {
                        $.each(data.validationError, function () {
                            $('span.' + this.target).html(this.error);
                        });
                    }       
                    $('span.success').html(data.msg).removeClass('false').addClass(data.success.toString());
                });
              
                return false;
            });
        });
    },

    
    loadGrid: function (params) {
        $.getJSON('addressbook/listContacts', params, function (data) {
            if (data.success === true) {
            	
                $('#contactsGrid tr:not(:first)').remove();
                $.each(data.contacts, function () {
                    $('#contactsGrid tr:last').after(
                        $('<tr/>')
                            .append($('<td/>').html(this.full_name))
                            .append($('<td/>').html(this.email))
                            .append($('<td/>').html(this.phone))
                            .append($('<td/>').html(this.address))
                            .append($('<td/>').html('<a id="editContact">Edit</a>'))
                            .append($('<td/>').html('<a id="deleteContact">Delete</a>'))
                            .attr('data-id', this.id)
                    );
                });
                
                $('#contactsGrid tr[data-id]').each(function () {
                    var id = $(this).attr('data-id');
                
                   
                   $(this).find('a#editContact').click(function () {
                        App.editContact(id);
                    });
                    
                   $(this).find('a#deleteContact').click(function () {
                       App.deleteContact(id);
                   });
                });
            }   

		     if (data.groups === true) {
		     
                $('#contactsgroupGrid tr:not(:first)').remove();
                $.each(data.contactsgroup, function () {
					
                    $('#contactsgroupGrid tr:last').after(
                        $('<tr/>')
                            .append($('<td/>').html(this.group_name))
                            .append($('<td/>').html(this.users))
                            .append($('<td/>').html('<a id="editGroup">Edit</a>'))
                            .append($('<td/>').html('<a  id="deleteGroup">Delete</a>'))
                            .attr('data-id', this.group_id)
                    );
                });
                
                $('#contactsgroupGrid tr[data-id]').each(function () {
                    var group_id = $(this).attr('data-id');
                   
                   $(this).find('a#editGroup').click(function () {
                        App.editGroup(group_id);
                    }); 
                   $(this).find('a#deleteGroup').click(function () {
                        App.deletegroup(group_id);
                    });
                });
            }   
        });         
    }, 
	
	 loadtemplatesGrid: function (params) {
        $.getJSON('listTemplates.php', params, function (data) {
            if (data.success === true) {
                $('#templatesGrid tr:not(:first)').remove();
                $.each(data.templates, function () {
                    $('#templatesGrid tr:last').after(
                        $('<tr/>')
                            .append($('<td/>').html(this.template_name))
                            .append($('<td/>').html(this.template_msg))
                            .append($('<td/>').html('<a>Delete</a>'))
                            .attr('data-id', this.id)
                    );
                });
                
                $('#templatesGrid tr[data-id]').each(function () {
                    var id = $(this).attr('data-id');
                    
                    $(this).find('a').click(function () {
                        App.deletetemplate(id);
                    });
                });
            }   
    });        
    }, 

		loadsendReports: function (params) {
        $.getJSON('listsendReports.php', params, function (data) {
            if (data.success === true) {
                $('#sendReportsGrid tr:not(:first)').remove();
                $.each(data.templates, function () {
                    $('#sendReportsGrid tr:last').after(
                        $('<tr/>')
                            .append($('<td/>').html(this.template_name))
                            .append($('<td/>').html(this.template_msg))
                            .append($('<td/>').html('<a>Delete</a>'))
                            .attr('data-id', this.id)
                    );
                });
                
            }   
    });        
    },
 editContact: function (id) {
      
       $.getJSON('addressbook/getContactById', { id: id }, function (data) {
                if (data.success === true) {
                	console.log(data)
         $('div.abPanel').load('addressbook/loadAddNewContactPage', function () {  
         	$('#full_name').val(data.contacts[0].full_name);
            $('#email').val(data.contacts[0].email);
            $('#phone').val(data.contacts[0].phone); 
           
                          
            $(this).find('form').submit(function() {
                var full_name = $('#full_name').val(), 
                    email = $('#email').val(), 
                    phone = $('#phone').val(), 
                    address = $('#address').val();
                    
                $.getJSON('addressbook/updateContact', {
                    'full_name': full_name, 
                    'email': email, 
                    'phone': phone, 
                    'address': address,
                    'id':id
                }, function (data) {
                    $('span.false').html('');
                    if (data.success === true) { 
                    	
                        $('form').get(0).reset();
                    } else {
                        $.each(data.validationError, function () {
                            $('span.' + this.target).html(this.error);
                        });
                    }      
                    console.log(data); 
                    $('span.success').html(data.msg).removeClass('false').addClass(data.success.toString());
                });
              
                //return false;
            });
        });
        }
        });
       
    },
    
    editGroup: function (id) {
      
       $.getJSON('addressbook/getGroupById', { id: id }, function (data) {
                if (data.success === true) {
                	console.log(data)
                	 $('div.abPanel').load('addressbook/loadCreateGroupPage', function (params) {  
                	 	$('#group_name').val(data.contactsgroup[0].group_name); 
		$.getJSON('addressbook/listContacts', params, function (res) {
			
            if (res.success === true) {
				
                $.each(res.contacts, function () {
					
					$('#users').append($("<option/>", { 
						value: this.id,
						text: this.full_name
					}));
					
					  
                });
                $.each(data.contactsgroup[0].user_ids.split(","), function(i,e){
    					$("#users option[value='" + e + "']").prop("selected", true);
				});
             
										}           
        });    
            $(this).find('form').submit(function() {
                var group_name = $('#group_name').val(); 
                if( $('#users :selected').length > 0){
						//build an array of selected values
						var selectedusers = [];
						$('#users :selected').each(function(i, selected) {
							selectedusers[i] = $(selected).val(); 
						});
						
				}
				//console.log(selectedusers);
                    
                $.getJSON('addressbook/updateGroup', {
                    'users': selectedusers, 
                    'group_name': group_name,
                     'id':id
                }, function (data) {
                    $('span.false').html('');
                    if (data.success === true) { 
                        $('form').get(0).reset();
                    } else {
                        $.each(data.validationError, function () {
                            $('span.' + this.target).html(this.error);
                        });
                    }       
                    $('span.success').html(data.msg).removeClass('false').addClass(data.success.toString());
                });
              
                return false;
            });
        });
        
        }
        });
       
    },
    
    deleteContact: function (id) {
        if (confirm('Are you sure to delete?')) {
            $.getJSON('addressbook/deleteContact', { id: id }, function (data) {
                if (data.success === true) {
                	
                    $('#contactsGrid tr[data-id="' + id + '"]').hide('slow');
                } else {
                    alert(data.msg);
                }
            });
        }
    },
	
	 deletegroup: function (id) {
        if (confirm('Are you sure to delete?')) {
            $.getJSON('addressbook/deleteGroup', { id: id }, function (data) {
                if (data.success === true) {
                	
                    $('#contactsgroupGrid tr[data-id="' + id + '"]').hide('slow');
                } else {
                    alert(data.msg);
                }
            });
        }
    }
};

$(function () {
    App.render();
});
/*ADDRESS BOOK: ENDS*/        

});
