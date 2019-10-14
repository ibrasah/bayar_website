@extends('layouts.master')
@section('style')
<style type="text/css">
.desabled {
	pointer-events: none;
}
</style>
@endsection

@section('content')
<html>
        <section class="content-header">
            <div class="col-md-12">
                <h1>
                  Data Tables
                  <small>advanced tables</small>
                </h1>
                <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li><a href="#">Tables</a></li>
                  <li class="active">Data tables</li>
                </ol>
            </div>
        </section>
        <section class="content">
            <div class="row">       
                <div class="col-md-4">
                    <div class="card card-default">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-10">
                                    <strong>Add User</strong>
                                </div>
                            </div>
                        </div>
        
                        <div class="card-body">
                            <form id="addSiswa" class="" method="POST" action="">
                                <div class="form-group">
                                    <label for="Nama" class="col-md-12 col-form-label">First Name</label>
                                    <div class="col-md-12">
                                        <input id="Nama" type="text" class="form-control" name="Nama" value="" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Status" class="col-md-12 col-form-label">Last Name</label>
        
                                    <div class="col-md-12">
                                        <input id="Status" type="text" class="form-control" name="Status" value="" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12" style="margin-top:10px;">
                                        <button type="button" class="btn btn-primary btn-block desabled" id="submitUser">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="col-md-8">
                        <div class="card card-default">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-10">
                                        <strong>All Users Listing</strong>
                                    </div>
                                </div>
                            </div>
            
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th width="180" class="text-center">Action</th>
                                    </tr>
                                    <div class="box-body">
                                        <tbody id="tbody">
                                            
                                        </tbody>	
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>

    
    <!-- Delete Model -->
    <form action="" method="POST" class="users-remove-record-model">
        <div id="remove-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" style="width:55%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="custom-width-modalLabel">Delete Record</h4>
                        <button type="button" class="close remove-data-from-delete-form" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <h4>You Want You Sure Delete This Record?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light deleteMatchRecord">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <!-- Update Model -->
    <form action="" method="POST" class="users-update-record-model form-horizontal">
        <div id="update-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" style="width:55%;">
                <div class="modal-content" style="overflow: hidden;">
                    <div class="modal-header">
                        <h4 class="modal-title" id="custom-width-modalLabel">Update Record</h4>
                        <button type="button" class="close update-data-from-delete-form" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body" id="updateBody">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect update-data-from-delete-form" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success waves-effect waves-light updateUserRecord">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</html>

@endsection
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
        <script>
        // Initialize Firebase
        var firebaseConfig =    
            apiKey: "AIzaSyDWenV1kmkCEK8g0lwxEg1EV95Q5dVXRlk",
            authDomain: "bayars-53bb2.firebaseapp.com",
            databaseURL: "https://bayars-53bb2.firebaseio.com",
            projectId: "bayars-53bb2",
            storageBucket: "bayars-53bb2.appspot.com",
            messagingSenderId: "366526935281",
            appId: "1:366526935281:web:df465b12fd88fcf2c8b950"
            };
            
        // Initialize Firebase
            firebase.initializeApp(firebaseConfig);
            var database = firebase.database();
            var lastIndex = 0;

// Get Data
firebase.database().ref('Akunku/').on('value', function(snapshot) {
    var value = snapshot.val();
    var htmls = [];
    $.each(value, function(index, value){
    	if(value) {
    		htmls.push('<tr>\
        		<td>'+ value.Nama +'</td>\
        		<td>'+ value.Status +'</td>\
        		<td><a data-toggle="modal" data-target="#update-modal" class="btn btn-outline-success updateData" data-id="'+index+'">Update</a>\
        		<a data-toggle="modal" data-target="#remove-modal" class="btn btn-outline-danger removeData" data-id="'+index+'">Delete</a></td>\
        	</tr>');
    	}    	
    	lastIndex = index;
    });
    $('#tbody').html(htmls);
    $("#submitUser").removeClass('desabled');
});

// Add Data
$('#submitUser').on('click', function(){
	var values = $("#addSiswa").serializeArray();
	var Nama = values[0].value;
	var Status = values[1].value;
	var userID = lastIndex+1;
    firebase.database().ref('users/' + userID).set({
        Nama: Nama,
        Status: Status
    });

// Reassign lastID value
    lastIndex = userID;
	$("#addSiswa input").val("");
});

// Update Data
var updateID = 0;
$('body').on('click', '.updateData', function() {
	updateID = $(this).attr('data-id');
	firebase.database().ref('users/' + updateID).on('value', function(snapshot) {
		var values = snapshot.val();
		var updateData = '<div class="form-group">\
		        <label for="Nama" class="col-md-12 col-form-label">First Name</label>\
		        <div class="col-md-12">\
		            <input id="Nama" type="text" class="form-control" name="Nama" value="'+values.Nama+'" required autofocus>\
		        </div>\
		    </div>\
		    <div class="form-group">\
		        <label for="Status" class="col-md-12 col-form-label">Last Name</label>\
		        <div class="col-md-12">\
		            <input id="Status" type="text" class="form-control" name="Status" value="'+values.Status+'" required autofocus>\
		        </div>\
		    </div>';

		    $('#updateBody').html(updateData);
	});
});

$('.updateUserRecord').on('click', function() {
	var values = $(".users-update-record-model").serializeArray();
	var postData = {
	    Nama : values[0].value,
	    Status : values[1].value,
    };
    
	var updates = {};
	updates['/users/' + updateID] = postData;
	firebase.database().ref().update(updates);
	$("#update-modal").modal('hide');
});

//  Remove Data
$("body").on('click', '.removeData', function() {
	var id = $(this).attr('data-id');
	$('body').find('.users-remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
});
$('.deleteMatchRecord').on('click', function(){
	var values = $(".users-remove-record-model").serializeArray();
	var id = values[0].value;
	firebase.database().ref('users/' + id).remove();
    $('body').find('.users-remove-record-model').find( "input" ).remove();
	$("#remove-modal").modal('hide');
});
$('.remove-data-from-delete-form').click(function() {
	$('body').find('.users-remove-record-model').find( "input" ).remove();
});
</script>