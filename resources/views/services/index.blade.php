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
            <th>No</th>
            <th>Code</th>
            <th>Date Service</th>
            <th>Description</th>
            <th>Payment</th>
            <th>Change</th>
            <th>Grand Total</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach ($service as $number => $service)
            <tr>
                <td>{{$number+1}}</td>
                <td>{{$service->code}}</td>
                <td>{{date('d M Y', strtotime($service->date_services))}}</td>
                <td>{{$service->description}}</td>
                <td>{{$service->payments}}</td>
                <td>{{$service->changes}}</td>
                <td>{{$service->grandtotal}}</td>
                <td>
                    <center>
                        <a href="{{url('/services/update/'.$service->idservices)}}"><i class="fa fa-pencil-square-o"></i></a>
                    </center>
                </td>
            </tr>    
            @endforeach
          </tbody>
        </table>
      </div>    
    </div> 
  </section>