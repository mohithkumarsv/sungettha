<?php include 'header.php'; ?>

<style>
	.box{
		color: #fff;
		padding: 20px;
		display: none;
		margin-top: 20px;
	}
	.h3, h3 {
		font-size: 19px;
	}
	img.prjectimages {
		width: 320px;
		height: 233px;
	}
</style>
<style>
	img.galleryimage {
		width: 100%;
		height: 350px;
		padding: 10px;
	}
span.error {
    color: red;
}
.m-t{
    margin-top: 45px;
}
</style>

<section class="padT100 padB100">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-12 col-sm-12 ">
				<h1>What Are You Looking For?</h1>
			</div>
		</div>
		<div class="clearfix"></div> <hr>
		<ul class="nav nav-pills">
			<li class="active"><a data-toggle="pill" href="#Electric">Electric vehicle charging</a></li>
			<li><a data-toggle="pill" href="#Solar">Solar</a></li>
			<li><a data-toggle="pill" href="#Heat">Heat pump</a></li>
		</ul>
		<div class="tab-content">
			<div id="Electric" class="tab-pane fade in active">
			   
							
	 <form id="ElectricFrom">
					<br><br>
					<div class="row">
						<div class="col-md-12 col-xs-12 col-sm-12">
							<div class="form-group">
								<select id="electricvehicle"  name="electricvehicle">
									<option value="Select_option" >Select option</option>
								<option value="Publiccharging" >Public charging</option>
									<option value="Communitycharging" >Community charging</option>
								</select>
							</div>
							<div id="Public_charging">
								<div class="row">
									<div class="col-md-6 col-xs-12 col-sm-6">
										<div class="form-group">
											<label for="email">First Name:</label>
											<input type="text" class="form-control" id="electricvehicleFirstName" name="electricvehicleFirstName"  placeholder="Enter First Name"  required/>
										</div>
										<div class="form-group">
											<label for="pwd">Telephone:</label>
											<input type="text" class="form-control" id="electricvehicleTelephone"  name="electricvehicleTelephone" placeholder="Enter Telephone" required/>
										</div> 

										<div class="form-group">
											<label for="pwd">Address:</label>
											<textarea type="text" class="form-control" id="electricvehicleAddress" name="electricvehicleAddress"  rows="5" placeholder="Enter Address" required></textarea>
										</div>
									</div>
									<div class="col-md-6 col-xs-12 col-sm-6">
										<div class="form-group">
											<label for="email">Last Name:</label>
											<input type="text" class="form-control" id="electricvehicleLastName"  name="electricvehicleLastName" placeholder="Enter Last Name" required/>
										</div>
											<div class="form-group">
											<label for="pwd">Email:</label>
											<input type="Email" class="form-control" id="electricvehicleEmail" name="electricvehicleEmail" placeholder="Enter Email"   required/>
										</div>
										<div class="form-group">
											<label for="pwd">City:</label>
											<input type="text" class="form-control" id="electricvehicleCity" name="electricvehicleCity" placeholder="Enter Email"   required/>
										</div>
										<div class="form-group">
											<label for="pwd">Company :</label>
											<input type="text" class="form-control" id="electricvehiclecompany" name="electricvehiclecompany" placeholder="Enter Post Code"  required/>
											
										</div>
										<a  class="btn btn-success btn-lg " onclick="return publicharging();">Submit</a>

			
									</div>
								</div>
							</div>
							<!--Community_charging  -->
							<div id="Community_charging"  class="d-none">
								<div class="row">
									<div class="col-md-6 col-xs-12 col-sm-6">
										<div class="form-group">
											<label for="email">First Name:</label>
											<input type="text" class="form-control" id="communitychargingFirstName" placeholder="Enter First Name" name="communitychargingFirstName" required />
										</div>
										<div class="form-group">
											<label for="pwd">Telephone:</label>
											<input type="text" class="form-control" id="communitychargingTelephone" placeholder="Enter Telephone" name="communitychargingTelephone" required />
										</div> 
										<div class="form-group">
											<select id="Community_chargings" name="Community_chargings">
												<option value="Select_option">Select option</option>
												<option value="Schoolinstitute" >School/college/institute</option>
												<option value="Apartment">Apartment</option>
												<option value="Gatedcommunity">Gated community </option>
												<option value="Corporatecompany">Corporate/company</option>
												<option value="Shoppingcomplex">Shopping complex</option>
												<option value="Parkinglot">Parking lot</option>
												<option value="CSR">CSR </option>
											</select>
										</div>
										
									</div>
									<div class="col-md-6 col-xs-12 col-sm-6">
										<div class="form-group">
											<label for="email">Last Name:</label>
											<input type="text" class="form-control" id="communitychargingsLastName" placeholder="Enter Last Name" name="communitychargingsLastName" required />
										</div>
										<div class="form-group">
											<label for="pwd">Email:</label>
											<input type="Email" class="form-control" id="communitychargingsEmail" placeholder="Enter Email" name="communitychargingsEmail" required />
										</div>

									</div>
								</div>
							
						
							<!-- School_institute -->
							 <div id="School_institute" class="d-none">
								<div class="row">
									<div class="form-group">
										<div class="form-group">
											<label for="email">Number of 4 wheelers/number of 2 wheelers</label>
											<input type="text" class="form-control" id="communitychargingsnoof2wheelers" placeholder="Enter Number of 4 wheelers/number of 2 wheelers " name="communitychargingsnoof2wheelers" required />
										</div>
									</div>
								</div>
							</div>
							<!--Apartment  -->
							 <div id="Apartment" class="d-none">
								<div class="row">
									<div class="col-md-6 col-xs-12 col-sm-6">
										<div class="form-group">
											<label for="email">Number of flats:</label>
											<input type="number" class="form-control" id="communitychargingsnoflasta" placeholder="Enter Number of flats " name="communitychargingsnoflasta" required />
										</div>
										<div class="form-group">
											<label for="pwd">Charger requirement by self-use/ community use :</label>
											<input type="text" class="form-control" id="communitychargingscommunityuse" placeholder="Enter Charger requirement by self-use" name="communitychargingscommunityuse" required />
										</div> 

										<div class="form-group">
											<label for="pwd">If self-use 2 Wheeler/4 Wheeler:</label>
											<input type="number" class="form-control" id="communitychargings4wheelers" placeholder="Enter If self-use 2 Wheeler" name="communitychargings4wheelers" required />
										</div>
									</div>
									<div class="col-md-6 col-xs-12 col-sm-6">
										<div class="form-group">
											<label for="email">Charger type Fast charger / normal charger  :</label>
											<input type="text" class="form-control" id="communitychargingsnormalcharger" placeholder="Enter Charger type Fast charger / normal charger  " name="communitychargingsnormalcharger" required />
										</div>
										<div class="form-group">
											<label for="pwd">Number of 4 wheelers/number of two wheelers:</label>
											<input type="number" class="form-control" id="communitychargingsapartmentno4wheelers" placeholder="Enter Number of 4 wheelers/number of two wheelers" name="communitychargingsapartmentno4wheelers" required />
										</div>
										
									</div>
								</div>
							</div> 
							<!-- Gated_community -->
						 <div id="Gated_community" class="d-none">
								<div class="row">
									<div class="col-md-6 col-xs-12 col-sm-6">
										<div class="form-group">
											<label for="email">Charger requirement by self-use/ community use :</label>
											<input type="number" class="form-control" id="gatedcommunityuse" placeholder="Enter Charger requirement by self-use/ community use " name="gatedcommunityuse" required />
										</div>
										<div class="form-group">
											<label for="pwd">If self-use 2 Wheeler/4 Wheeler:</label>
											<input type="number" class="form-control" id="gatedcommunityno4wheelers" placeholder="Enter If self-use 2 Wheeler/4 Wheeler" name="gatedcommunityno4wheelers" required />
										</div> 

										
									</div>
									<div class="col-md-6 col-xs-12 col-sm-6">
										<div class="form-group">
											<label for="email">Charger type Fast charger / normal charger  :</label>
											<input type="number" class="form-control" id="domenticLastName" placeholder="Enter Charger type Fast charger / normal charger  " name="domenticLastName" required />
										</div>
										
									</div>
								</div>
							</div>
							<!--CSR  -->
							 <div id="CSR" class="d-none">
								
								<div class="form-group">
									<label for="email">CSR NAME with complete details CSR:</label>
									<input type="text" class="form-control" id="CSRname" placeholder="Enter CSR NAME" name="CSRname" required />
								</div>
								
							</div> 
							<!--Corporate/company  -->
						<div id="Corporate_company" class="d-none">
								
								<div class="form-group">
									<label for="email">Number of chargers required:</label>
									<input type="number" class="form-control" id="corporatecompanynoofchargers" placeholder="Enter Number of chargers" name="corporatecompanynoofchargers" required />
								</div>
								<div class="form-group">
									<label for="email">Fast charger / normal charger  :</label>
									<input type="text" class="form-control" id="corporatecompanyfastcharger" placeholder="Enter Fast charger " name="corporatecompanyfastcharger" required />
								</div>
								
								<div class="form-group">
									<label for="email">Max Number of 4 wheelers/number of two wheelers :</label>
													<input type="text" class="form-control" id="corporatecompanynofofourwheelrs" placeholder="Enter Max Number of 4 wheelers " name="corporatecompanynofofourwheelrs" required />
							
								</div>
								
							</div>
							<!--Shopping_complex -->
							 <div id="Shopping_complex" class="d-none">
								
								<div class="form-group">
									<label for="email">Number of chargers required:</label>
									<input type="number" class="form-control" id="shoppingcomplexnoofchargers" placeholder="Enter Number of chargers" name="shoppingcomplexnoofchargers" required />
								</div>
								<div class="form-group">
									<label for="email">Fast charger / normal charger  :</label>
									<input type="text" class="form-control" id="shoppingcomplexnormalchargers" placeholder="Enter Fast charger " name="shoppingcomplexnormalchargers" required />
								</div>
								
								<div class="form-group">
									<label for="email">Max Number of 4 wheelers/number of two wheelers :</label>
									<input type="number" class="form-control" id="shoppingcomplexnoofwheelers" placeholder="Enter Max Number of 4 wheelers" name="shoppingcomplexnoofwheelers" required />
								</div>
								
							</div> 
							<!--Parking_lot -->
							 <div id="Parking_lot" class="d-none">
								
								<div class="form-group">
									<label for="email">Number of chargers required:</label>
									<input type="number" class="form-control" id="parkinglotnofocharges" placeholder="Enter Number of chargers" name="parkinglotnofocharges" required//>
								</div>
								<div class="form-group">
									<label for="email">Fast charger / normal charger  :</label>
									<input type="text" class="form-control" id="parkinglotfastcharger" placeholder="Enter Fast charger " name="parkinglotfastcharger" required />
								</div>
								
								<div class="form-group">
									<label for="email">Max Number of 4 wheelers/number of two wheelers :</label>
									<input type="number" class="form-control" id="parkinglotmaxnoofwheerlser" placeholder="Enter Max Number of 4 wheelers" name="parkinglotmaxnoofwheerlser" required />
								</div>
							</div>
								<a  class="btn btn-success btn-lg " onclick="return Communitycharging();">Submit</a>
	</div> 




						</div>
					</div>
					
						</form>
						</div>
					
					
	


<div id="Heat" class="tab-pane fade">
	    <div id="heatpupme" class="m-t">
	             <form  action="#" method="Post" name="" id="HeatPump">
								       <div class="row">
						     	  <div class=" col-md-6 col-xs-12 col-sm-6">
                            
	                                <div class="form-group">
	                                  <label for="email">First Name:</label>
	                                  <input type="text" class="form-control" id="HeatFirstName" placeholder="Enter First Name" name="HeatFirstName" >
	                                </div>
	                                <div class="form-group">
	                                  <label for="pwd">Email:</label>
	                                  <input type="Email" class="form-control" id="HeatEmail" placeholder="Enter Email" name="HeatEmail" >
	                                </div>
	                                <div class="form-group">
	                                  <label for="pwd">Telephone:</label>
	                                  <input type="text" class="form-control" id="HeatTelephone" placeholder="Enter Telephone" name="HeatTelephone" >
	                                </div>
	                                  <div class="form-group">
	                                  <label for="pwd">Company :</label>
	                                  <input type="text" class="form-control" id="HeatCompany " placeholder="Enter Company" name="HeatCompany " >
	                                </div>
	                                </div>
	                                 <div class= "col-md-6 col-xs-12 col-sm-6">
	                                      <div class="form-group">
	                                  <label for="pwd">Last name :</label>
	                                 <input type="text" class="form-control" id="HeatLastname" placeholder="Enter password" name="HeatLastname" >
	                                </div>
	                              
	                                <div class="form-group">
	                                  <label for="pwd">Address  :</label>
	                                  <textarea type="text" class="form-control" id="HeatAddress" rows="5" placeholder="Enter Address" name="HeatAddress" required></textarea>
	                             
	                                </div>
	                                <div class="form-group">
	                                  <label for="pwd">Hot water required for day (LPD) in liters  :</label>
	                                  <input type="number" class="form-control" id="Heatwater" placeholder="Enter Hot water required for day (LPD) in liters " name="Heatwater" >
	                                </div>
	                                <div class="form-group">
	                                  <label for="pwd">Project Description :</label>
	                                   <textarea type="text" class="form-control" id="HeatDescription" rows="5" placeholder="Enter Address" name="HeatDescription" required></textarea>
	                                
	                                </div>
	                                    </div>
	                                <a   onclick="return sendheat();" class="btn btn-success btn-lg pull-right">Submite</a>
	         
	                              </div>

                            	
                          	  	</form>
	                </div>
        	</div>
	<div id="Solar" class="tab-pane fade">
		 <ul class="nav nav-pills m-t">
					   
					    <li class="active"><a data-toggle="pill" href="#Domentic">Domentic</a></li>
					    <li><a data-toggle="pill" href="#Business">Business</a></li>
					    <li ><a data-toggle="pill" href="#Power">Power Plants</a></li>
					    <!-- <li ><a data-toggle="pill" href="#payment-pay">Payment </a></li>-->
					    <!--<li><a data-toggle="pill" href="#vendor-registr">Vendor Registration</a></li>-->
					  </ul>
					  
					  <div class="tab-content">
						    <div id="Domentic" class="tab-pane fade in active">
						    	 <form id="DomesticForm" action="#" method="Post">
						    	<br><br>
						     <div class="row">
						     	  <div class="col-md-6 col-xs-12 col-sm-6">
                            
	                                <div class="form-group">
	                                  <label for="email">First Name:</label>
	                                  <input type="text" class="form-control" id="DomenticFirstName" placeholder="Enter First Name" name="DomenticFirstName" required>
	                                </div>
	                                <div class="form-group">
	                                  <label for="pwd">Telephone:</label>
	                                  <input type="text" class="form-control" id="DomenticTelephone" placeholder="Enter Telephone" name="DomenticTelephone" required>
	                                </div> 
	                                 <h4>Take the first step toward a clean energy futur</h4>
			                           <br>
			                                <div class="form-group">
			                                  <label for="pwd">Address:</label>
			                                    <textarea type="text" class="form-control" id="DomenticAddress" rows="5" placeholder="Enter Address" name="DomenticAddress" required></textarea>
			                               
                                
                            			</div>
                            		</div>
                            	 <div class="col-md-6 col-xs-12 col-sm-6">
	                                <div class="form-group">
	                                  <label for="email">Last Name:</label>
	                                  <input type="test" class="form-control" id="DomenticLastName" placeholder="Enter Last Name" name="DomenticLastName" required>
	                                </div>
	                                <div class="form-group">
	                                  <label for="pwd">Email:</label>
	                                  <input type="Email" class="form-control" id="DomenticEmail" placeholder="Enter Email" name="DomenticEmail" required>
	                                </div>
	                                  <div class="form-group">
                                  <label for="pwd">City:</label>
                                    <input type="text" class="form-control" id="DomenticCity" placeholder="Enter City" name="DomenticCity" required>
                                </div>
                                 <div class="form-group">
                                  <label for="pwd">Post Code:</label>
                                    <input type="number" class="form-control" id="DomenticCode" placeholder="Enter Post Code" name="DomenticCode" required>
                                </div>
                          	  </div>
						     </div>
						      <div class="row">
		                        <a  onclick="return sendDomentic();" class="btn btn-success btn-lg pull-right">Submit</a>
		                              
		                       </div>
		              <!--          <div class="alert alert-success success"> <strong>Success!</strong> 
								</div> -->
		                       </form>
						    </div>
						     <div id="Business" class="tab-pane fade">
							      	<br><br>
							      	 <form id="BusinessForm" action="#" method="Post">
						     <div class="row">
						     	  <div class="col-md-6 col-xs-12 col-sm-6">
                            
	                                <div class="form-group">
	                                  <label for="email">First Name:</label>
	                                  <input type="text" class="form-control" id="BusinessFirstName" placeholder="Enter First Name" name="BusinessFirstName" required>
	                                </div>
	                                <div class="form-group">
	                                  <label for="pwd">Telephone:</label>
	                                  <input type="text" class="form-control" id="BusinessTelephone" placeholder="Enter Telephone" name="BusinessTelephone" required>
	                                </div>
	                                 <h4>Take Control of your Energy Future: for your Business</h4>
			                           <br>
					                     <div class="form-group">
		                                  <label for="pwd">Company:</label>
		                                    <input type="text" class="form-control" id="BusinessCompany" placeholder="Enter Company" name="BusinessCompany" required>
		                                </div>
		                                 <div class="form-group">
		                                  <label for="pwd">Project Description:</label>
		                                    <textarea type="text" class="form-control" id="BusinessDescription" rows="5" placeholder="Enter Project Description" name="BusinessDescription" required></textarea>
		                                </div>
		                                 <div class="form-group">
		                                  <label for="pwd">City:</label>
		                                    <input type="text" class="form-control" id="BusinessCity" placeholder="Enter City" name="BusinessCity" required>
		                                </div>
					                               
                                
                            			</div>
                            		
                            	 <div class="col-md-6 col-xs-12 col-sm-6">
	                                <div class="form-group">
	                                  <label for="email">Last Name:</label>
	                                  <input type="test" class="form-control" id="BusinessLastName" placeholder="Enter Last Name" name="BusinessLastName" required>
	                                </div>
	                                <div class="form-group">
	                                  <label for="pwd">Email:</label>
	                                  <input type="Email" class="form-control" id="BusinessEmail" placeholder="Enter Email" name="BusinessEmail" required>
	                                </div>
	                                 <div class="form-group">
	                                  <label for="pwd">Size:</label>
	                                    <input type="text" class="form-control" id="BusinessSize" placeholder="Size of Project (m² or kW/MW) (Optional) " name="BusinessSize" required>
	                                </div>
		                               <div class="form-group">
		                                  <label for="pwd">Address:</label>
		                                    <textarea type="text" class="form-control" id="BusinessAddress" rows="5" placeholder="Enter Address" name="BusinessAddress" required></textarea>
		                                </div>
		                                
		                                 <div class="form-group">
		                                  <label for="pwd">Post Code:</label>
		                                    <input type="number" class="form-control" id="BusinessPostCode" placeholder="Enter Post Code" name="BusinessPostCode" required>
		                                </div>
                          	  		</div>
                          	  		 <div class="row">
		                        <a  onclick="return sendBusiness();" class="btn btn-success btn-lg pull-right">Submit</a>
		                              
		                       </div>
		                   <!--     <div class="alert alert-success success2"> <strong>Success!</strong> 
								</div> -->
                          	  		</div>
                          	  		 </form>
						     </div>
							      <div id="Power" class="tab-pane fade">
								     <br><br>
								      <form id="PowerForm" action="#" method="Post">
								       <div class="row">
						     	  <div class="col-md-6 col-xs-12 col-sm-6">
                            
	                                <div class="form-group">
	                                  <label for="email">First Name:</label>
	                                  <input type="text" class="form-control" id="PowerFirstName" placeholder="Enter First Name" name="PowerFirstName" required>
	                                </div>
	                                <div class="form-group">
	                                  <label for="pwd">Telephone:</label>
	                                  <input type="text" class="form-control" id="PowerTelephone" placeholder="Enter Telephone" name="PowerTelephone" required>
	                                </div>
	                                   <h4>Solar Power Plants: Partner with SunPower</h4>
			                           <br>
					                     <div class="form-group">
		                                  <label for="pwd">Company:</label>
		                                    <input type="text" class="form-control" id="PowerCompany" placeholder="Enter Company" name="PowerCompany" required>
		                                </div>
		                                 <div class="form-group">
		                                  <label for="pwd">Project Description:</label>
		                                    <textarea type="text" class="form-control" id="PowerDescription" rows="5" placeholder="Enter Project Description" name="PowerDescription" required></textarea>
		                                </div>
		                                 <div class="form-group">
		                                  <label for="pwd">City:</label>
		                                    <input type="text" class="form-control" id="PowerCity" placeholder="Enter City" name="PowerCity" required>
		                                </div>
					                               
                                
                            			</div>
                            		
                            	 <div class="col-md-6 col-xs-12 col-sm-6">
	                                <div class="form-group">
	                                  <label for="email">Last Name:</label>
	                                  <input type="test" class="form-control" id="PowerLastName" placeholder="Enter Last Name" name="PowerLastName" required>
	                                </div>
	                                <div class="form-group">
	                                  <label for="pwd">Email:</label>
	                                  <input type="Email" class="form-control" id="PowerEmail" placeholder="Enter Email" name="PowerEmail" required>
	                                </div>
	                                 <div class="form-group">
	                                  <label for="pwd">Size:</label>
	                                    <input type="text" class="form-control" id="PowerSize" placeholder="Size of Project (m² or kW/MW) (Optional) " name="PowerSize" required>
	                                </div>
		                               <div class="form-group">
		                                  <label for="pwd">Address:</label>
		                                    <textarea type="text" class="form-control" id="PowerAddress" rows="5" placeholder="Enter Address" name="PowerAddress" required></textarea>
		                                </div>
		                                
		                                 <div class="form-group">
		                                  <label for="pwd">Post Code:</label>
		                                    <input type="number" class="form-control" id="PowerPostCode" placeholder="Enter Post Code" name="PowerPostCode" required>
		                                </div>
                          	  		</div>

                          	  		</div>
                          	  		<div class="row">
		                        <button type="button" onClick="return sendPower();" class="btn btn-success btn-lg pull-right">Submit</button>
		                              
		                       </div>
		                       <!-- <div class="alert alert-success success1"> <strong>Success!</strong> 
								</div> -->
                          	  		
                          	  	</form>
                          	  	</div>


							


								    </div> 
	</div>      
</div>
</div>
<!--</form>-->

</section>

<?php include 'footer.php'; ?>

<script>

	function publicharging()       
		{
		    
		
		
		
				//electric id 
	            var Electricvehicless =  $("#electricvehicle").val(); 
			    var ElectricvehicleFirstNames=$("#electricvehicleFirstName").val();
				var ElectricvehicleTelephones=$("#electricvehicleTelephone").val();
				var ElectricvehicleAddresss=$("#electricvehicleAddress").val();
				var ElectricvehicleLastNames=$("#electricvehicleLastName").val();
				var ElectricvehicleEmails=$("#electricvehicleEmail").val();
				var ElectricvehicleCitys=$("#electricvehicleCity").val();
				var Electricvehiclecompanys=$("#electricvehiclecompany").val();
				
                	if( Electricvehicless == null ||  Electricvehicless == ""){
				$('#electricvehicle').after('<span class="error">Enter Select options</span>');
				return false;
				}
				else 	if( ElectricvehicleFirstNames == null ||  ElectricvehicleFirstNames == ""){
				$('#electricvehicleFirstName').after('<span class="error">Enter Your Name</span>');
				return false;
				}
					else 	if( ElectricvehicleTelephones == null ||  ElectricvehicleTelephones == ""){
				$('#electricvehicleTelephone').after('<span class="error">Enter Mobile</span>');
				return false;
				}
					else 	if( ElectricvehicleAddresss == null ||  ElectricvehicleAddresss == ""){
				$('#electricvehicleAddress').after('<span class="error">Enter Your address</span>');
				return false;
				}	else 	if( ElectricvehicleLastNames == null ||  ElectricvehicleLastNames == ""){
				$('#electricvehicleLastName').after('<span class="error">Enter Your Last Name</span>');
				return false;
				}
					else 	if( ElectricvehicleEmails == null ||  ElectricvehicleEmails == ""){
				$('#electricvehicleEmail').after('<span class="error">Enter Your Emails</span>');
				return false;
				}
					else 	if( ElectricvehicleCitys == null ||  ElectricvehicleCitys == ""){
				$('#electricvehicleCity').after('<span class="error">Enter Your Citys</span>');
				return false;
				}
					else 	if( Electricvehiclecompanys == null ||  Electricvehiclecompanys == ""){
				$('#electricvehiclecompany').after('<span class="error">Enter Your Company</span>');
				return false;
				}
				
			    var postData ='&ElectricvehicleFirstNames='+ElectricvehicleFirstNames+'&ElectricvehicleTelephones='+ElectricvehicleTelephones+
      			'&ElectricvehicleAddresss='+ElectricvehicleAddresss+'&ElectricvehicleLastNames='+ElectricvehicleLastNames+
      			'&ElectricvehicleEmails='+ElectricvehicleEmails+'&ElectricvehicleCitys='+ElectricvehicleCitys+'&Electricvehiclecompanys='+Electricvehiclecompanys+'&Electricvehicless='+Electricvehicless;

		  $.ajax({
		    type: "POST",
		    url: "publicharging1.php",
		    data : postData, 
		    success: function(data){
		    alert('your message has been sent we will get back to you soon!!!');
		       //$('.sucess1').fadeIn(1000);
		        $("#ElectricFrom")[0].reset();
		    }
	 	
 

		});
			  return false;
      	}
      	
      function Communitycharging(){
//CommunitychargingFirstName id sucess1
                  var Electricvehicles =document.getElementById("electricvehicle").value;
				  var communitychargingFirstNames =document.getElementById("communitychargingFirstName").value; 
				   var communitychargingTelephones =document.getElementById("communitychargingTelephone").value; 
				    var Community_chargingss = document.getElementById("Community_chargings").value; 
				     var communitychargingsLastNames =document.getElementById("communitychargingsLastName").value; 
				      var communitychargingsEmails = document.getElementById("communitychargingsEmail").value; 

				      // School/college/institute
				       var communitychargingsnoof2wheelerss = document.getElementById("communitychargingsnoof2wheelers").value; 

				       // Apartment
				        var communitychargingsnoflastas = document.getElementById("communitychargingsnoflasta").value; 
				        var communitychargingscommunityuses =document.getElementById("communitychargingscommunityuse").value; 
				        var communitychargings4wheelerss = document.getElementById("communitychargings4wheelers").value; 
						var communitychargingsnormalchargers = document.getElementById("communitychargingsnormalcharger").value; 
				        var communitychargingsapartmentno4wheelerss = document.getElementById("communitychargingsapartmentno4wheelers").value; 

				        // Gated_community
							var gatedcommunityuses = document.getElementById("gatedcommunityuse").value; 
							var gatedcommunityno4wheelerss = document.getElementById("gatedcommunityno4wheelers").value; 
							var domenticLastNames = document.getElementById("domenticLastName").value; 

						//CSR
							var CSRnames =document.getElementById("CSRname").value; 


						//Corporate/company
							var corporatecompanynoofchargerss = document.getElementById("corporatecompanynoofchargers").value; 
							var corporatecompanyfastchargers = document.getElementById("corporatecompanyfastcharger").value; 
							var corporatecompanynofofourwheelrss = document.getElementById("corporatecompanynofofourwheelrs").value; 
                            
						//Shopping_complex

							var shoppingcomplexnoofchargerss =  document.getElementById("shoppingcomplexnoofchargers").value; 
							var shoppingcomplexnormalchargerss =  document.getElementById("shoppingcomplexnormalchargers").value; 
							var shoppingcomplexnoofwheelerss =  document.getElementById("shoppingcomplexnoofwheelers").value; 
                            
						//Parking_lot

							var parkinglotnofochargess =  document.getElementById("parkinglotnofocharges").value; 
							var parkinglotfastchargers =  document.getElementById("parkinglotfastcharger").value; 
							var parkinglotmaxnoofwheerlsers = document.getElementById("parkinglotmaxnoofwheerlser").value; 
                            
				var postDatas =
				'&Electricvehicles='+Electricvehicles
      			+'&communitychargingFirstNames='+communitychargingFirstNames
				+'&communitychargingTelephones='+communitychargingTelephones
				+'&Community_chargingss='+Community_chargingss
				+'&communitychargingsLastNames='+communitychargingsLastNames
				+'&communitychargingsEmails='+communitychargingsEmails
				+'&communitychargingsnoof2wheelerss='+communitychargingsnoof2wheelerss
				+'&communitychargingsnoflastas='+communitychargingsnoflastas
				+'&communitychargingscommunityuses='+communitychargingscommunityuses
      			+'&communitychargings4wheelerss='+communitychargings4wheelerss
      			+'&communitychargingsnormalchargers='+communitychargingsnormalchargers
      			+'&communitychargingsapartmentno4wheelerss='+communitychargingsapartmentno4wheelerss
      			+'&gatedcommunityuses='+gatedcommunityuses
      			+'&gatedcommunityno4wheelerss='+gatedcommunityno4wheelerss
      			+'&domenticLastNames='+domenticLastNames
      			+'&CSRnames='+CSRnames
      			+'&corporatecompanynoofchargerss='+corporatecompanynoofchargerss
      			+'&corporatecompanyfastchargers='+corporatecompanyfastchargers
      			+'&corporatecompanynofofourwheelrss='+corporatecompanynofofourwheelrss
      			+'&shoppingcomplexnoofchargerss='+shoppingcomplexnoofchargerss
      			+'&shoppingcomplexnormalchargerss='+shoppingcomplexnormalchargerss
      			+'&shoppingcomplexnoofwheelerss='+shoppingcomplexnoofwheelerss
      			+'&parkinglotnofochargess='+parkinglotnofochargess
      			+'&parkinglotfastchargers='+parkinglotfastchargers
      			+'&parkinglotmaxnoofwheerlsers='+parkinglotmaxnoofwheerlsers;


		  $.ajax({
		    type: "POST",
		    url: "communitycharging1.php",
		    	
			 data : postDatas, 
		    success: function(data){
		      alert('your message has been sent we will get back to you soon!!!');
		        $('.success').fadeIn(1000);
		         $("#ElectricFrom")[0].reset();
		    }
		    

		});
return false;


      }
      	
      	
      	
      	
	$(document).ready(function(){
		$('#electricvehicle').on('change', function() {
			if ( this.value == 'Publiccharging')

			{
				$("#Community_charging").hide();
				$("#Public_charging").show();
			}
			else  if ( this.value == 'Communitycharging')
			{
				$("#Community_charging").show();
				$("#Public_charging").hide();
				
				$('#Community_chargings').on('change', function() {
					if ( this.value == 'Schoolinstitute')

					{
						
						$("#School_institute").show();
						$("#Apartment").hide();
						$("#Gated_community").hide();
						$("#CSR").hide();
						$("#Corporate_company").hide();
						$("#Shopping_complex").hide();
						$("#Parking_lot").hide();
						
					}
					else  if ( this.value == 'Apartment')
					{
						$("#School_institute").hide();
						$("#Apartment").show();
						$("#Gated_community").hide();
						$("#CSR").hide();
						$("#Corporate_company").hide();
						$("#Shopping_complex").hide();
						$("#Parking_lot").hide();
					}
					else  if ( this.value == 'Gatedcommunity')
					{
						$("#School_institute").hide();
						$("#Apartment").hide();
						$("#Gated_community").show();
						$("#CSR").hide();
						$("#Corporate_company").hide();
						$("#Shopping_complex").hide();
						$("#Parking_lot").hide();
					}
					else  if ( this.value == 'Corporatecompany')
					{
						$("#School_institute").hide();
						$("#Apartment").hide();
						$("#Gated_community").hide();
						$("#CSR").hide();
						$("#Corporate_company").show();
						$("#Shopping_complex").hide();
						$("#Parking_lot").hide();
						
					}
					else  if ( this.value == 'Shoppingcomplex')
					{
						$("#School_institute").hide();
						$("#Apartment").hide();
						$("#Gated_community").hide();
						$("#CSR").hide();
						$("#Corporate_company").hide();
						$("#Shopping_complex").show();
						$("#Parking_lot").hide();
						
					}
					else  if ( this.value == 'Parkinglot')
					{
						$("#School_institute").hide();
						$("#Apartment").hide();
						$("#Gated_community").hide();
						$("#CSR").hide();
						$("#Corporate_company").hide();
						$("#Shopping_complex").hide();
						$("#Parking_lot").show();
						
					}
					else  if ( this.value == 'CSR')
					{
						$("#School_institute").hide();
						$("#Apartment").hide();
						$("#CSR").show();
						$("#Gated_community").hide();
						$("#Corporate_company").hide();
						$("#Shopping_complex").hide();
						$("#Parking_lot").hide();
					}
					
					else  
					{
						$("#School_institute").hide();
						$("#Apartment").hide();
						$("#CSR").hide();
						$("#Gated_community").hide();
						$("#Corporate_company").hide();
						$("#Shopping_complex").hide();
						$("#Parking_lot").hide();
						
					}
				});
			}
			else  
			{
				$("#Public_charging").hide();
				$("#Select_option").hide();
			
			}
		});
	});


function sendDomentic()       
		{
			
		//	alert("test")
			var  Domenticname=document.getElementById("DomenticFirstName").value; 
				var  Domenticmobile=document.getElementById("DomenticTelephone").value; 
				var  Domenticaddress=document.getElementById("DomenticAddress").value; 
				var  Domenticlastname=document.getElementById("DomenticLastName").value; 
				var  Domenticemail=document.getElementById("DomenticEmail").value; 
				var  Domenticcity=document.getElementById("DomenticCity").value; 
				var  Domenticcode=document.getElementById("DomenticCode").value; 
      			var  Domenticdata ='&Domenticname='+Domenticname+'&Domenticmobile='+Domenticmobile+'&Domenticaddress='+Domenticaddress+'&Domenticlastname='+Domenticlastname+'&Domenticemail='+Domenticemail+'&Domenticcity='+Domenticcity+'&Domenticcode='+Domenticcode;

		  $.ajax({
		    type: "POST",
		    url: "domentic1.php",
		    data: $("#DomesticForm").serialize(),
		    success: function(){
		      alert('your message has been sent we will get back to you soon!!!');
		        $('.success').fadeIn(1000);  $("#DomesticForm")[0].reset();
		    }
		    

		});return false;
       	}
       	function sendBusiness()       
		{
			
		//	alert("test");
			 var  BusinessFirstName=document.getElementById("BusinessFirstName").value; 
			 var  BusinessTelephone=document.getElementById("BusinessTelephone").value; 
			var  BusinessCompany=document.getElementById("BusinessCompany").value; 
			 var  BusinessDescription=document.getElementById("BusinessDescription").value; 
			 var  BusinessCity=document.getElementById("BusinessCity").value; 
		 var  BusinessLastName=document.getElementById("BusinessLastName").value; 
			 var  BusinessEmail=document.getElementById("BusinessEmail").value; 
			 	 var  BusinessSize=document.getElementById("BusinessSize").value; 
			 	 	 var  BusinessAddress=document.getElementById("BusinessAddress").value; 
			 	 	 	 var  BusinessPostCode=document.getElementById("BusinessPostCode").value; 
	var  Domenticdata ='&BusinessFirstName='+BusinessFirstName+'&BusinessTelephone='+BusinessTelephone+'&BusinessCompany='+BusinessCompany+'&BusinessDescription='+BusinessDescription
	+'&BusinessCity='+BusinessCity+'&BusinessLastName='+BusinessLastName+'&BusinessEmail='+BusinessEmail+'&BusinessSize='+BusinessSize+'&BusinessAddress='+BusinessAddress+'&BusinessPostCode='+BusinessPostCode;

		  $.ajax({
		    type: "POST",
		    url: "business1.php",
		    data: $("#BusinessForm").serialize(),
		    success: function(){
		      alert('your message has been sent we will get back to you soon!!!');
		        $('.success2').fadeIn(1000);    $("#BusinessForm")[0].reset();
		    }
		    

		});return false;
       	}
       		function sendPower()       
		{
			

		//	alert("test");
				 var  PowerFirstName=document.getElementById("PowerFirstName").value; 
				 var  PowerTelephone=document.getElementById("PowerTelephone").value; 
				 var  PowerAddress=document.getElementById("PowerAddress").value; 
				 var  PowerDescription=document.getElementById("PowerDescription").value; 
				 var  PowerEmail=document.getElementById("PowerEmail").value; 
				 var  PowerCompany=document.getElementById("PowerCompany").value; 
				 var  PowerLastName=document.getElementById("PowerLastName").value; 
				 	 var  PowerCity=document.getElementById("PowerCity").value; 
				 	 	 var  PowerPostCode=document.getElementById("PowerPostCode").value; 
				 	 	  var  PowerSize=document.getElementById("PowerSize").value; 
				 	 	 	
                	var  Domenticdata ='&PowerFirstName='+PowerFirstName+'&PowerTelephone='+PowerTelephone+'&PowerAddress='+PowerAddress+'&PowerDescription='+PowerDescription
                	+'&PowerEmail='+PowerEmail+'&PowerCompany='+PowerCompany+'&PowerLastName='+PowerLastName+'&PowerCity='+PowerCity+'&PowerPostCode='+PowerPostCode+'&PowerSize='+PowerSize;

		  $.ajax({
		    type: "POST",
		    url: "power1.php",
		    data: $("#PowerForm").serialize(),
		    success: function(){
		      alert('your message has been sent we will get back to you soon!!!');
		        $('success1').fadeIn(1000);
		         $("#PowerForm")[0].reset();
		    }
		    

		});return false;
		
	
       	}
       	
  
 
      	function sendheat(){

       
var  HeatFirstName=document.getElementById("HeatFirstName").value; 
				 var  HeatLastname=document.getElementById("HeatLastname").value; 
				 var  HeatTelephone=document.getElementById("HeatTelephone").value; 
				 var  HeatAddress=document.getElementById("HeatAddress").value; 
				 var  HeatEmail=document.getElementById("HeatEmail").value; 
				 var  Heatwater=document.getElementById("Heatwater").value; 
				 var  HeatDescription=document.getElementById("HeatDescription").value; 
			
				 	 	 	
                	var  heatdata ='&HeatFirstName='+HeatFirstName+'&HeatLastname='+HeatLastname+'&HeatTelephone='+HeatTelephone+'&HeatAddress='+HeatAddress
                	+'&HeatEmail='+HeatEmail+'&Heatwater='+Heatwater+'&HeatDescription='+HeatDescription;

      		 $.ajax({
		    type: "POST",
		   url: "heatpump1.php",
		    data: $("#HeatPump").serialize(),
		   
		    success: function(){
		      alert('your message has been sent we will get back to you soon!!!');
		        $('#sucess').fadeIn(1000);
		        $("#HeatPump")[0].reset();
		    }
		  

		});return false;
		

      	}


      	
	
</script>