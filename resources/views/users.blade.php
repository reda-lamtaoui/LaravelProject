@extends('layouts.home')

@section('content')
@include('layouts.asideAdmin')
<div class="box box-info">

<div class="panel panel-default">
<div class="pannel-heading" class="contenue">
<h3 style="padding-left: 20px">  Users Information</h3>
</div>
<div class="panel-body">
<div class="form-group">
<input type="text" name="search" id="search" class="form-control" placeholder="Search"></input>
</div>
<div style=" overflow-y:auto;">
<table class="table table-bordered table-hover">
<thead>
 <tr>
   <th>name</th>
   <th>email</th>
   <th>created_at</th>
   <th></th>
 </tr>
</thead>

<tbody>

 

</tbody>

</table>
</div>
</div>
</div>
   <!-- /.table-responsive -->
 </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src='jquery-1.8.3.min.js'></script>
<script src='jquery.elevatezoom.js'></script>
 <!-- /.box-body -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
$value=$('#search').val();
$.ajax({
 type: 'get',
 url: '{{URL::to('searchUser')}}',
 data:{'search':$value},
 success:function(data){
   $('tbody').html(data);
   
 }
});
$('#search').on('keyup',function() {
$value=$(this).val();
$.ajax({
 type: 'get',
 url: '{{URL::to('searchUser')}}',
 data:{'search':$value},
 success:function(data){
   $('tbody').html(data);
 }
});
});
$('#detail').on('click',function() {
$value=$(this).val();
$.ajax({
 type: 'get',
 url: '{{URL::to('details')}}',
 data:{'search':$value},
 success:function(data){
   $('tbody').html(data);
 }
});
});
});
</script>

@endsection
