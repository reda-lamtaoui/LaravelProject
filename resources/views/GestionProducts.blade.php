@extends('layouts.homeAdmin')

@section('content')
@include('layouts.asideAdmin')
<div class="box box-info">

<div class="panel panel-default">
<div class="pannel-heading" class="contenue">
<h3 style="padding-left: 20px">  Products Information</h3>
</div>
<div class="panel-body">
<div class="form-group">
<input type="text" name="search" id="search" class="form-control" placeholder="Search"></input>
</div>
<div style=" overflow-y:auto;">
<table class="table table-bordered table-hover">
<thead>
 <tr>
   <th>Designation</th>
   <th>Description</th>
   <th>Prix</th>
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
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h2 class="modal-title" id="exampleModalLabel"></h2>
                </div>
                <form method="Post" action="/updateProduct">
                  {{ csrf_field() }}
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <img class="img-responsive" id="img_prod" data-zoom-image="img_prod" size="220px" style="width: 200px ;height: 200px">
                        </div>
 
                        <div class="col-md-6">
                         
                            <div class="caption price">
                                <p id="description" style="text-indent: 50px;
  text-align: left;padding-bottom: 20px;
  letter-spacing: 3px;"></p>
                                
                                <table>
                                  <thead>
                                    <tr>
                                      <th><div id="Quantite"></div></th>
                                      <th><div id="price"></div></th>
                                    </tr>
                                  </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="hid"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info pull-right">Modifier</button>
                    </div>
                     
                </div>
                </form>
            </div>
        </div>
        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="col-md-6">
                            <img class="img-responsive" id="img_prod" data-zoom-image="img_prod" size="220px" style="width: 200px ;height: 200px">
                        </div>
      <form method="Post" action="/modifier_produit">
                  {{ csrf_field() }}
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Prix :</label>
            <input type="text" class="form-control" id="price">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Description :</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
      </form>
    </div>
  </div>
</div> -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript">
            $(document).ready(function () {
                $(document).on('click', '.open', function () {
                    console.log($(this).data('img'));
                    $('#exampleModalLabel').html($(this).data('designation'));
                    $('#img_prod').attr("src",'uploads/'+$(this).data('img'));
                    $('#hid').html('<input type="hidden" name="id" value="'+$(this).data('id')+'">');
                    $('#description').html('<textarea class="form-control" name="description" rows="9" cols="30">'+$(this).data('desc')+'</textarea>');
                    $('#price').html('Prix : <input type="text" style="width:160px;" name="prix" value="'+$(this).data('prix')+'">');
                });
            });
        </script>
 <!-- /.box-body -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
$value=$('#search').val();
$.ajax({
 type: 'get',
 url: '{{URL::to('searchProduit')}}',
 data:{'search':$value},
 success:function(data){
   $('tbody').html(data);
   
 }
});
$('#search').on('keyup',function() {
$value=$(this).val();
$.ajax({
 type: 'get',
 url: '{{URL::to('searchProduit')}}',
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
