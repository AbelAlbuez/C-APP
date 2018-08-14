<?php 
if(!isset($_SESSION)) { session_start(); }
if($_SESSION['info_user'][0]->tipo!=1)
{

  redirect(base_url());
}
plantilla::iniciar();?>
  <div class="content-wrapper">
   <h1>Panel Admin</h1>
<hr>
<div class="wrapable" >
<div class="row">
            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-cube text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Cantidad de usuarios</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">
												<?php echo count($usuarios) ?>
												</h3>
                      </div>
                    </div>
                    <img src="https://cdn4.iconfinder.com/data/icons/web-ui-color/128/Account-512.png" alt="" width="80px" height="70px">
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    
                    65% lower growth
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-receipt text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Cantidad de categorías</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">3455</h3>
                      </div>
                    </div>
                    <img src="https://cdn4.iconfinder.com/data/icons/ios-web-user-interface-multi-circle-flat-vol-2/512/Attribute_category_label_shop_price_price_tag_tag-128.png" alt="" width="80px" height="70px">
                  </div>
                  
                  <p class="text-muted mt-3 mb-0">
                   Product-wise sales
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-poll-box text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Cantidad de noticias</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">5693</h3>
                      </div>
                    </div>
                    <img src="https://cdn0.iconfinder.com/data/icons/citycons/150/Citycons_newspaper-512.png" alt="" width="80px" height="70px">
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    Weekly Sales
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-location text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Cantidad de eventos</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">246</h3>
                      </div>
                    </div>
                    <img src="https://cdn4.iconfinder.com/data/icons/evil-icons-user-interface/64/calendar-512.png" alt="" width="80px" height="70px">
                  </div>
                  <p class="text-muted mt-3 mb-0">
                   Product-wise sales
                  </p>
                </div>
              </div>
            </div>
          </div>


</div>

</div>




<style>
    h1{
      text-align: left;
      margin-left: 30px;
    }
    .row{
      margin-left: 10%;
      margin-right: 10%;
    }
    .wrapable {
		display: -webkit-flex;
		display: -ms-flexbox;
		display: flex;
		justify-content: center;
		flex-direction: row;
		flex-wrap: wrap;
		width: 100%;
		margin-bottom: 30px;
	}
.col-xl-5{
  margin-top: 30px;
}
    
  </style>
