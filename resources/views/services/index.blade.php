<section class="content-header">
    <h1>Service</h1>
    <ol class="breadcrumb">
      <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><i class="fa fa-cubes" aria-hidden="true"></i> Service</li>
    </ol>
</section>
  
  <!-- Main content -->
  <section class="content">
  
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Index</h3>
        <div class="box-tools pull-right">
          <a href="{{url('services/create-new')}}" class="btn btn-box-tool" title="Create New"><i class="fa fa-plus"></i> Create New</a>
        </div>
      </div>
      <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Code</th>
            <th>Date Service</th>
            <th>Description</th>
            <th>Progress By</th>
            <th>Done By</th>
            <th>Status</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>    
    </div> 
  </section>