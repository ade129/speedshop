<section class="content-header">
    <h1>Sparepart</h1>
    <ol class="breadcrumb">
      <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><i class="fa fa-inbox"></i>Sparepart</li>
    </ol>
</section>

<section class="content">

{{-- default box --}}
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Index</h3>
        <div class="box-tools pull-right">
            <a href="{{url('spareparts/create-new')}}" class="btn btn-box-tool" title="Create New"><i class="fa fa-plus"></i>Create New</a>
        </div>
    </div>
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name Sparepart</th>
                    <th>Categories</th>
                    <th>Code Sparepart</th>
                    <th>Image Sparepart</th>
                    <th>Brand</th>
                    <th>Harga Jual</th>{{--price, harga untuk costumer--}}
                    <th>Harga Dasar</th>{{--actual cost, harga dasar barang/modal--}}
                    <th>Keuntungan</th>{{--forecast, laba dari harga jual barang--}}
                    <th>Unit</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($spareparts as $spare)
                <tr>
                    <td>{{$spare->idspareparts}}</td>
                    <td>{{$spare->namespareparts}}</td>
                    <td>{{$spare->categories->name}}</td>
                    <td>{{$spare->codespareparts}}</td>
                    <td>  
                        @if (is_null($spare->images))
                            <label> - </label>
                          @else
                            <img class="img-rounded zoom" src="{{env('CDN_URL')}}/spare_image/{{$spare->images}}" width="50">
                          @endif
                    </td>
                    <td>{{$spare->brand}}</td>
                    <td>{{$spare->price}}</td>
                    <td>{{$spare->actcost}}</td>
                    <td>{{$spare->forecast}}</td>
                    <td>{{$spare->unit}}</td> 
                    <td>

                        <center>
                            @if ($spare->active)
                            <span class="label label-success">Active</span>
                            @else
                            <span class="label label-danger">Inactive</span>
                            @endif
                        </center>
                    </td>
                    <td>
                        <center>
                            <a href="{{url('/spareparts/update/'.$spare->idspareparts)}}"><i class="fa fa-pencil-square-o"></i></a>
                        </center>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    
        
</div>
</section>
