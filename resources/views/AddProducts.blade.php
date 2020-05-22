@extends('layouts.homeAdmin')

@section('content')
@include('layouts.asideAdmin')
<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <!-- Input addon -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add product</h3>
              <strong style="color:#FF0000";>Remplit tout les champs</strong>
                                        
                                
            </div>
            <form Action="{{ route('addprod') }}" method="Post" name="evale" 
              onsubmit="return tester(evale);" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="box-body">
              <div class="form-group">
                  <div class="input-group input-group-lg">
                <div class="input-group-btn">
                  <input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-warning dropdown-toggle">
                </div>
                <!-- /btn-group -->
              </div>
                </div>
                <div class="form-group">
                   <label>title</label>
                  <input type="text" name="libelle" class="form-control" placeholder="Enter ...">
                  
                </div>
              <div class="form-group">
<label>category</label>
                  <select class="form-control" name="type">
                  @foreach($categories as $categorie)
                  <option value="{{ $categorie->id}}">{{ $categorie->titre}}</option>
                   @endforeach

                  </select>
                 
                  <label></label>
                  <input type="text" name="prix" class="form-control" placeholder="00.00 $">
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" name="description" rows="5" cols="30"></textarea>
                </div>
                <div style="color:red;" id="message">
            </div>
            @error('champs')
            <strong>Remplit tout les champs</strong>
                                @enderror
              <div class="box-footer">
              @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                <button type="submit" class="btn btn-info pull-right">Add</button>
              </div>
            </form>
            <div id="message">
            </div>
              <!-- /input-group -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        
          <!-- /.box -->
          <!-- general form elements disabled -->
          
        <!--/.col (right) -->
      </div>
<script type="text/javascript">
function tester(eval){
  var champs="";
  var vide=false;
if(eval.fileToUpload.value==""){
  champs=champs+" image";
  vide=true;
}
if(eval.libelle.value==""){
  champs=champs+" Nom de produit";
  vide=true;
}
if(eval.type.value==""){
  champs=champs+" categorie";
  vide=true;
}
if(eval.prix.value==""){
  champs=champs+" prix";
  vide=true;
}
if(eval.Tva.value==""){
  champs=champs+" Tva";
  vide=true;
}
if(eval.quantite.value==""){
  champs=champs+" quantite";
  vide=true;
}
if(vide==true){
  document.getElementById("message").innerHTML ="remplir les champs :"+ champs;
  return false;
}
}
</script>

@endsection
