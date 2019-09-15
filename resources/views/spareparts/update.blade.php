<section class="content-header">
    <h1>
        Sparepart
        <small>Master</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Home</a>
        <li class="active"><i class="fa fa-database"></i>Master</a>
        <li><a href="{{url('/spareparts')}}"><i class="fa fa-cubes"></i>Sparepart</a>
        <li class="active"><i class="fa fa-plus"></i>Update</a>
    </ol>
  </section>
  
  {{-- main content --}}
  <section>
  
    {{-- default box --}}
    <section class="content">
    <div class="box">
      <div class="box-header with-border"> 
        <h4 class="box-tittle">Update</h4>
        </div>
        <div class="box-body">
          {{ Form::open(array('url' => 'spareparts/update/'.$spareparts->idspareparts, 'class' => 'form-horizontal')) }}
          <div class="form-group">
            <label class="col-sm-2 control-label">Categories</label>
            <div class="col-sm-8">
                <select class="form-control" id="sel1" name="idcategories">
                    <option value="">--select categories--</option>
                    @foreach ($categories as $ade)
                    <option value="{{$ade->idcategories}}" @if ($ade->idcategories == $spareparts->idcategories)
                        selected
                        @endif>{{$ade->name}}</option> 
                    @endforeach
                    </select>
            </div>                  
          </div>

          <div class="form-group">
              <label class="col-sm-2 control-label">Name Sparepart</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" value="{{$spareparts->namespareparts}}" name="namespareparts" required>
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-2 control-label">Code Sparepart</label>
              <div class="col-sm-8">
                <input type="number" class="form-control" value="{{$spareparts->codespareparts}}" name="codespareparts" required>
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-2 control-label">Brand</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" value="{{$spareparts->brand}}" name="brand" required>
              </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Image Sparepart</label>
            <div class="col-sm-6">
              {{-- <input type="file" class="form-control" placeholder="Image" name="images" required> --}}
              <img class="img-rounded zoom" src="{{env('CDN_URL')}}/spare_image/{{$spareparts->images}}" width="50">
              {{-- <small class="text-danger">size image max height:1000, width:1000 pixel</small> --}}
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#change-image">change</button>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Harga Jual</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" value="{{$spareparts->price}}" name="price" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Harga Dasar</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" value="{{$spareparts->actcost}}" name="actcost" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Keuntungan</label>
            <div class="col-sm-8">
            <input type="number" class="form-control" value="{{$spareparts->forecast}}" name="forecast" required>
            </div>
          </div>

          <div class="form-group">
              <label class="col-sm-2 control-label">Unit</label>
              <div class="col-sm-8">
                <input type="number" class="form-control" value="{{$spareparts->unit}}" name="unit" required>
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-2 control-label">Status</label>
          <div class="col-sm-10">
            <div class="checkbox">
              <label>
              <input type="checkbox" name="active" checked> Active
              </label>
            </div>
          </div>
          <br><br>

          <div class="form-group">
              <label class="col-sm-2 control-label"></label>
              <div class="col-sm-7">
                <a href="{{url('spareparts')}}" class="btn btn-warning pull-right">Back</a>
                <input type="submit" value="Save" class="btn btn-primary">
              </div>
          </div>
          
          {{Form::close()}}
      </div>  
    </div>        
            
    </section>
  </section>
  
    
<div id="change-image" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Image</h4>
        </div>
        <div class="modal-body">
            {{ Form::open(array('url' => 'spareparts/change-image/'.$spareparts->idspareparts, 'class' => 'form-horizontal','files' => 'true')) }}
              <div class="row">
                <div class="col-sm-10">
                  <small>Upload Image</small>
                  <input type="file" class="form-control" placeholder="Image" name="images" required>  
                </div>
              </div>
           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          {{-- <a href="{{url('spareparts')}}" class="btn btn-warning pull-right">Back</a> --}}
          <input type="submit" value="Save" class="btn btn-success">
          {{Form::close()}}
        </div>
      </div>
  
    </div>
  </div>