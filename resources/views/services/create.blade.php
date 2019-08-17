<section class="content-header">
    <h1>
        Service
        <small></small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><i class="fa fa-first-order"></i> Service</li>
        <li class="active"><i class="fa fa-plus"></i> Create New</a></li>
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
          {{Form::open(array('url' => 'services/create-new', 'class' => 'form-horizontal'))}}

          <div class="form-group">
              <div class="col-sm-2 control-label">
                <label class="">Code</label>
              </div>
              <div class="col-sm-6">
                <input type="text" value="AUTO" class="form-control" readonly>
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
                    <input type="text" class="form-control datepicker pull-right" name="date_services" id="date" data-date-format='yyyy-mm-dd' value="{{date('Y-m-d')}}" autocomplete="off">
                    </div>
                </div>
            </div>
            
            <div class="form-group">
              <div class="col-sm-2 control-label">
                  <label class="">Description</label>
              </div>
                  <div class="col-sm-6">
                      <textarea name="description" rows="3"  class="form-control" required></textarea>
                  </div>
            </div>

            <div class="form-group">
              <div class="col-sm-2 control-label">
                  <label class="">Grand Total</label>
              </div>
                  <div class="col-sm-6">
                      <textarea name="grandtotal" id="grandtotal" value="0" rows="1"  class="form-control" required></textarea>
                  </div>
            </div>

            <div class="form-group">
              <div class="col-sm-2 control-label">
                  <label class="">Payment</label>
              </div>  
              <div class="col-sm-4">
                     <input name="payment" id="payments" rows="1"  value="0" onchange="change();" class="form-control" required>
                  </div>
              </div>
          
            <div class="form-group">
                <div class="col-sm-2 control-label">
                    <label class="">Change</label>
                </div>
                <div class="col-sm-4">
                       <textarea name="change" rows="1" value="0"  class="form-control" required></textarea>
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
                    <tr>
                        <td style="border: 1px solid #d2d6de !important; text-align:center ">
                          <label>1</label>
                        </td>
                        <td  style="border: 1px solid #d2d6de !important; ">
                          <small><strong>Sparepart</strong></small>
                            <select class="form-control select1" id="idspareparts[]" name="idspareparts_1" onchange="passing_price(1,this.value);">
                              <option>--select sparepart--</option>
                              @php
                                  $param = [];
                              @endphp
                              @foreach ($spareparts as $spar)
                              @php
                                  $param[$spar->idspareparts] = $spar->price;
                              @endphp
                               <option value="{{$spar->idspareparts}}">{{$spar->namespareparts}}</option> 
                              @endforeach
                            </select>
                        </td>
                        <td  style="border: 1px solid #d2d6de !important; ">
                          <small><strong>Quantity</strong></small>
                          <input type="number" name="unit[]" onkeyup="count_value(1)" value="0" class="form-control"  id="unit_1">
                        </td>
                        <td  style="border: 1px solid #d2d6de !important; ">
                          <small><strong>Price</strong></small>
                          <input type="number" name="price[]" class="form-control"  id="price_1" onkeyup="count_value(1)" value="0" readonly>
                        </td>
                      </td>
                      <td  style="border: 1px solid #d2d6de !important; ">
                        <small><strong>Total</strong></small>
                        <input type="number" name="totalharga[]" class="form-control"  id="totalharga_1" value="0" onkeyup="total(1)">
                      </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
        
        <div class="form-group">
            <label class="col-sm-1 control-label"></label>
              <div class="col-sm-8">
                   <input type="submit" value="Save" class="btn btn-success" >
              </div>
        </div>

              {{Form::close()}}
      </div>  
    </div>  
    <input type="hidden" id="appendindex" value="2">     
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
               +'<select class="form-control select1" onchange="passing_price('+ais+',this.value)" id="idspareparts[]" name="idspareparts_'+ais+'"> <option>--select spareparts--</option>'+idspareparts+
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
               +'<input class="form-control" name="totalharga[]" id="totalharga_'+ais+'" onkeyup="grandtotal('+ais+') ">'
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

      setTimeout(function(){
        for (var i = 1; i < grandtotal; i++) {
          var totalharga = $('#totalharga_'+i).val();
          if (typeof total !== 'undefined') {
            count_all += parseInt(totalharga);
          }
          $('#grandtotal').val(count_all);
        }
      },500);
      change();
}

function change(){
  var payment = $('#payments').val();
  var grandtotal = $('#grandtotal').val();
  setTimeout(function(){
    var change = parseInt(payments) - parseInt(grandtotal);
    if (change > 0){
      $('#change_'+id).val(change); 
    } 
  }, 500);
}


</script>