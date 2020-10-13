 @extends('layouts.main')
@section('pagetitle')
  Prediction-Dashboard
@endsection
@section('content')

<style type="text/css">
  /*.rail_detauls_tbl td, .rail_detauls_tbl th {
    white-space: break-spaces !important;
  }

.rail_detauls_tbl {
    white-space: nowrap;
    overflow-y: auto;
    max-height: 136px;
}
*/
.overlay {
    background: #ffffff;
    color: #666666;
    height: 100%;
    width: 100%;
    float: left;
    text-align: center;
    opacity: .80;
}
.spinner {
    margin: 0 auto;
    height: 64px;
    width: 64px;
    animation: rotate 0.8s infinite linear;
    border: 5px solid #aeaeae;
    border-right-color: transparent;
    border-radius: 50%;
}
@keyframes rotate {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

.col-form-label {
    font-size: 12px !important;
}

/*#rail_data_chart {
    margin-top: 20px;
    margin-bottom: 25px;
}*/
</style>
    <div class="container-fluid">

      <!--Start Dashboard Content-->

   <div class="row">
			<div class="col-lg-12">
			   
			   <div class="card">
			     <div class="card-body">
				    <form id="beneficiariesForm"  method="post" action="">

				    <div class="form-group row mb-0">

					  <label for="input-21" class="col-sm-1 col-form-label">States:</label>
					  <div class="col-sm-3">
						<select id="states" name ="states" class="custom-select custom-select-sm">
							<option value="">Select State</option>
				            @foreach ($states as $state)
				                <option value ="{{ $state->id }}">{{ $state->name }} </option>
				            @endforeach             
			            </select>
					  </div>

					  <label for="input-21" class="col-sm-1 col-form-label">Scheme:</label>
					  <div class="col-sm-3">
						<select id="scheme" name ="scheme" class="custom-select custom-select-sm">
							<option value="">Select Scheme</option>
				            @foreach ($schemes as $scheme)
				                <option value ="{{ $scheme->id }}">{{ $scheme->name }} </option>
				            @endforeach             
			            </select>
					  </div>

					  <div class="col-sm-2">
						<button type="submit" class="btn btn-primary btn-sm px-5" id="beneficiaries_submit">Search</button>
						<button type="button" id="beneficiaries_submit_loader" class="btn btn-primary btn-sm" style="display:none;">Please wait...</button>
			 
					  </div>

					</div>

					</form>
				 </div>
			 </div>


			</div>
		  </div>
	
		
	<!-- <div class="row">
     <div class="col-12 col-lg-12 col-xl-12">
	    <div class="card">
		 <div class="card-header">Regression Analysis</div>
		 <div class="card-body">
				<div class="row">
					<div class="col-12 col-lg-6 col-xl-6">
						<canvas id="regrassion_chart1"></canvas>
					</div>
					<div class="col-12 col-lg-6 col-xl-6">
						<canvas id="regrassion_chart2"></canvas>
					</div>
				</div>
		 </div>
		 
		 
		</div>
	 </div>

    </div> --><!--End Row-->
	<div class="row">
   <div class="col-12 col-lg-12">
     <div class="card">
       <!-- <div class="card-header border-0">Beneficiaries</div> -->
       	 
		 <div class="card-body" id ="beneficiaries_body">		 	
         	<div class="table-responsive">
		      <table class="table align-items-center table-flush text-center"  id="tbody">
		        <thead>
		          <tr>
		           <th>Sr.</th>
		           <th>Name</th>
		           <th>Gender</th>
		           <th>State</th>
		           <th>Scheme</th>
		           <th>Amount</th>
		        </tr>
		        </thead>
		        <tbody>
		          @foreach ($beneficiaries as $b)
				    <tr>
			            <td>{{ $loop->iteration }}</td>
			            <td>{{ $b->name }}</td>
			            <td>{{ $b->gender }}</td>
			            <td>{{ $b->state_name }}</td>
			            <td>{{ $b->scheme_name }}</td>
			            <td>{{ number_format($b->amount) }}</td>
			        </tr>
				  @endforeach  
				  
		        </tbody>
		        <tfooter>
		          <tr>
		           <th colspan="5" style="text-align: right;">Total</th>
		           <th>{{$total_amount_sum}}</th>
		        </tr>
		        </tfooter>
		      </table>
            </div>
        </div>
     </div>
   </div>
  </div>

<!-- 	<div class="row">
		<div class="col-12 col-lg-12 col-xl-12">
			<div class="card">
				<div class="card-header">Terminal-wise Import-Export Weekly Prediction(s)
					 <div class="col-sm-3 pull-right">
			                <div class="input-group commodity">
			                  <select class="custom-select  custom-select-sm" id="commodity" name ="commodity" >
			                    <option selected="">- Commodity -</option>
			                  </select>
			                </div>
			          </div>
				</div>
				<div class="card-body" id ="terminal_prediction_body">
					<div id="terminal_prediction_overlay" class ="overlay" style="display: none;">
					    <div class="spinner"></div>
					    <br/>
					    Loading...
					</div>
					<div class="imp_exp_pred_error"><p>Please run prediction to load chart</p></div>
				</div>
			</div>
		</div>

	</div> --><!--End Row-->

	
      <!--End Dashboard Content-->
<!--start overlay-->
	  <div class="overlay toggle-menu"></div>
	<!--end overlay-->
    </div>
    <!-- End container-fluid-->
    
@endsection

  @section('script')

    <script src="{{ asset('/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>

 
  <script>
  $().ready(function() {		

  		jQuery.validator.addMethod("emailonly",function(value,element)
			{return this.optional(element)||/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/i.test(value);},"Incorrect email format");
  		jQuery.validator.addMethod("lettersonly",function(value,element)
			{return this.optional(element)||/^[a-z ]+$/i.test(value);},"Letters and spaces only please");
		// validate signup form on keyup and submit

		$("#beneficiariesForm").validate({
			rules: {
				states: {
					required: false
				}
			},
			messages: {
				states: {
					required: "Please select state"
				}
			},
			submitHandler: function() {
				
				$("#beneficiaries_submit").hide();	
				$("#beneficiaries_submit_loader").show();

				var data = $("#beneficiariesForm").serialize();
				$.ajax({				
					type : 'POST',
					url  : "{{ url('/fetch-beneficiaries') }}",
					data : data,
					success : function(result){
	       				
					      	$('#tbody').html(result);
					      
						$("#beneficiaries_submit").show();	
						$("#beneficiaries_submit_loader").hide();
					}
				}); 
				return false;
				
				/////////////
			}
		});
	});

jQuery(document).ready(function(){
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   });
		
  </script>


  @endsection