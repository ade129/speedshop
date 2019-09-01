<section class="content-header">
    <h1>
        Service
        <small></small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><i class="fa fa-first-order"></i> Service</li>
        <li class="active"><i class="fa fa-plus"></i> Update</a></li>
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
          {{Form::open(array('url' => 'services/update/'.$service->idservices, 'class' => 'form-horizontal'))}}

          <div class="form-group">
              <div class="col-sm-2 control-label">
                <label class="">Code</label>
              </div>
              <div class="col-sm-6">
                <input type="text" value="{{$service->code}}" class="form-control" readonly>
              </div>
            </div>          

            <div class="form-group">
                <div class="col-sm-2 control-label">
                    <label class="">Date Service</label>
                </div>
                <div class="col-sm-6">
                    <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                    <input type="text" class="form-control datepicker pull-right" name="date_services" id="date" data-date-format='yyyy-mm-dd' value="{{$service->date_services}}" autocomplete="off">
                    </div>
                </div>
            </div>
            
            <div class="form-group">
              <div class="col-sm-2 control-label">
                  <label class="">Description</label>
              </div>
                  <div class="col-sm-6">
                      <textarea name="description" rows="1"  class="form-control" required>{{$service->description}}</textarea>
                  </div>
            </div>

            <div class="form-group">
              <div class="col-sm-2 control-label">
                  <label class="">Grand Total</label>
              </div>
                  <div class="col-sm-6">
                      <input type="number" name="grandtotal" id="grandtotal" value="{{$service->grandtotal}}" class="form-control" required>
                  </div>
            </div>

            <div class="form-group">
              <div class="col-sm-2 control-label">
                  <label class="">Payment</label>
              </div>  
              <div class="col-sm-4">
                     <input type="number" name="payment" id="payments" value="{{$service->payments}}"  class="form-control" required>
                  </div>
              </div>
          
            <div class="form-group">
                <div class="col-sm-2 control-label">
                    <label class="">Change</label>
                </div>
                <div class="col-sm-4">
                       <input type="number" name="change" id="changes" value="{{$service->changes}}"  onkeyup="change()" class="form-control" required>
                </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-1 control-label"></label>
              <div class="col-sm-7">
                 <a class="pull-right btn btn-primary btn-xs" id="addRow"> <i class="fa fa-plus"></i> Add</a>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-7 col-sm-offset-1">
                <div class="table-responsive">
                  <table class="table table-bordered " style="border: 2px solid #d2d6de !important;" id="table">
                    <tbody>
                    @foreach ($service->services_details as $index => $sc)
                    <tr>
                        <td style="border: 1px solid #d2d6de !important; text-align:center ">
                          <label>{{$index+1}}</label>
                          <input type="hidden" name="idservicesdetails[]" id="idservicesdetails_{{$index+1}}" value="{{$sc->idservicesdetails}}">
                        </td>
                        <td  style="border: 1px solid #d2d6de !important; ">
                          <small><strong>Sparepart</strong></small>
                        <select class="form-control select1" name="idspareparts[]" id="idspareparts_{{$index+1}}" onchange="passing_price({{$index+1}},this.value);">
                              <option>--select sparepart--</option>
                              @php
                                  $param = [];
                              @endphp
                              @foreach ($spareparts as $spar)
                              @php
                                  $param[$spar->idspareparts] = $spar->price;
                              @endphp
                               <option value="{{$spar->idspareparts}}">@if ($spar->idspareparts == $sc->idspareparts)
                                    selected
                                  @endif>{{$spar->namespareparts}}</option> 
                              @endforeach
                            </select>
                        </td>
                        <td  style="border: 1px solid #d2d6de !important; ">
                          <small><strong>Quantity</strong></small>
                          <input type="number" name="unit[]" onkeyup="count_value(1)" value="{{$service->unit}}" class="form-control"  id="unit_{{$index+1}}">
                        </td>
                        <td  style="border: 1px solid #d2d6de !important; ">
                          <small><strong>Price</strong></small>
                        <input type="number" name="price[]" class="form-control"  id="price_{{$index+1}}" onkeyup="count_value(1)" value="{{$service->spareparts->price}}" readonly>
                        </td>
                      </td>
                      <td  style="border: 1px solid #d2d6de !important; ">
                        <small><strong>Total</strong></small>
                        <input type="number" name="totalharga[]" class="form-control"  id="totalharga_{{$index+1}}" value="{{$service->totalharga}}" onkeyup="total(1)">
                      </td>
                      </tr>
                    </tbody>
                    @endforeach
                  </table>
                </div>
              </div>
          </div>
        
        <div class="form-group">
            <label class="col-sm-1 control-label"></label>
              <div class="col-sm-8">
                   <input type="button" value="Count" class="btn btn-primary" onclick="count()">
                   <input type="submit" value="Save" class="btn btn-success" id="btn_save" disabled>
              </div>
        </div>

              {{Form::close()}}
      </div>  
    </div>  
    <input type="hidden" id="appendindex" value="{{$service->services_details->count()+1}}">     
    </section>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
var sparepart = {!!json_encode($param)!!};

//looping nama spareparts  
var idspareparts = '';
@foreach ($spareparts as $spar)
idspareparts += "<option value='{{$spar->idspareparts}}'>{{$spar->namespareparts}}</option>";
@endforeach

//create table service
$('#addRow').on('click',function(){
  var ais = $('#appendindex').val();
  $('#appendindex').val(parseInt(ais)+1);
  
  $('#table').append('<tr>'
    +'<td style="border: 1px solid #d2d6de !important; text-align:center ">'
        +'<label>'+ais+'</label><br>'
        +'<a class="btn btn-xs del"><i class="fa fa=trash" aria-hidden="true"></i></a>'
          +'</td style="border: 1px solid #d2d6de !important; ">'
          +'<td style="border: 1px solid #d2d6de !important; ">'
               +'<small><strong>Spareparts</strong></small>'
               +'<select class="form-control select1" onchange="passing_price('+ais+',this.value)" name="idspareparts[]" id="idspareparts_'+ais+'"> <option>--select spareparts--</option>'+idspareparts+
               + '</select>'
          +'</td>'
          +'<td style="border: 1px solid #d2d6de !important; ">'
               +'<small><strong>Quantity</strong></small>'
               +'<input type="number" name="unit[]" class="form-control"  id="unit_'+ais+'" onkeyup="count_value('+ais+')">'
          +'</td>'
          +'<td style="border: 1px solid #d2d6de !important; ">'
              +'<small><strong>Price</strong></small>'
          +'<input class="form-control" name="price[]" id="price_'+ais+'"onkeyup="">'
          +'</td>'
          +'<td style="border: 1px solid #d2d6de !important; ">'
               +'<small><strong>Grand Total</strong></small>'
               +'<input type="number" name="totalharga[]" id="totalharga_'+ais+'" onkeyup="total('+ais+') ">'
          +'</td>'
          +'</tr>'  
          
  );

});  

function passing_price(id,val){
      $('#price_'+id).val(sparepart[val]);
      count_value(id);
      total();
      change();
}

function count_value(id){
  var qty = $('#unit_'+id).val() || 0;
  var price = $('#price_'+id).val() || 0;
  setTimeout(function(){
    var total = parseInt(qty) * parseInt(price);
    if(total > 0){
      $('#totalharga_'+id).val(total);
      } else {
      $('#totalharga_'+id).val(0);
      }
    }, 500);
    total();
    change();
}

function total(){
      var count_all = 0;
      var grandtotal = $('#appendindex').val();
      var payment = $('#payments').val();

      setTimeout(function(){
        for (var i = 1; i < grandtotal; i++) {
          var totalharga = $('#totalharga_'+i).val();
          if (typeof total !== 'undefined') {
            count_all += parseInt(totalharga);
          }
          $('#grandtotal').val(count_all);
          change();

        }
      },500);

}

function change(){
  var payment = $('#payments').val();
  var grandtotal = $('#grandtotal').val();
  
  setTimeout(function(){
  
    var change = parseInt(payment) - parseInt(grandtotal);
    $('#change').val(change); 
    }, 500);
}

function count(){
  change();

  $('#btn_save').prop('disabled',false);

}

</script>