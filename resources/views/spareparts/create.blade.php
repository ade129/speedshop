<section class="content-header">
    <h1>
        Sparepart
        <small>Master</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Home</a>
        <li class="active"><i class="fa fa-database"></i>Master</a>
        <li><a href="{{url('/categories')}}"><i class="fa fa-cubes"></i>Sparepart</a>
        <li class="active"><i class="fa fa-plus"></i>Create New</a>
    </ol>
  </section>
  
  {{-- main content --}}
  <section>
  
    {{-- default box --}}
    <section class="content">
    <div class="box">
      <div class="box-header with-border"> 
        <h4 class="box-tittle">Create New</h4>
        </div>
        <div class="box-body">
          {{Form::open(array('url' => 'spareparts/create-new', 'class' => 'form-horizontal'))}}
          <div class="form-group">
            <label class="col-sm-2 control-label">Categories</label>
            <div class="col-sm-8">
                <select class="form-control" id="sel1" name="idcategories">
                    <option value="">--select categories--</option>
                    @foreach ($categories as $ade)
                    <option value="{{$ade->idcategories}}">{{$ade->name}}</option> 
                    @endforeach
                    </select>
            </div>                  
          </div>

          <div class="form-group">
              <label class="col-sm-2 control-label">Name Sparepart</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="Name Sparepart" name="namespareparts" required>
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-2 control-label">Code Sparepart</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="Code Sparepart" name="codespareparts" required>
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-2 control-label">Brand</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="Brand" name="brand" required>
              </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Image Sparepart</label>
            <div class="col-sm-8">
              <input type="file" class="form-control" placeholder="Image" name="image" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Harga</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="Harga" name="price" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Harga Dasar</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="Harga Dasar" name="actcost" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Keuntungan</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="Keuntungan" name="forecast" required>
            </div>
          </div>

          <div class="form-group">
              <label class="col-sm-2 control-label">Unit</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="Unit" name="unit" required>
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
  
        
        