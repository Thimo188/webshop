  @extends ('layouts.sidemenu')

  @section('content')






    <div class="container mt-5">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                    <img src="https://www.svgimages.com/svg-image/s5/man-passportsize-silhouette-icon-256x256.png" alt="stack photo" class="img">
                      </div>
                        <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                          <div class="container" style="border-bottom:1px solid black">
                              <h3>{{ Auth::user()->name }}</h3>
                              </a>




                            </div>
                              <hr>
                            <ul class="container details">
                              <li><p><i class="fa fa-envelope"></i> {{ Auth::user()->email }}</p></li>
                              <li><p><span class="glyphicon glyphicon-new-window one" style="width:50px;"></span><a href="#">www.example.com</p></a>
                            </ul>
                        </div>
                    </div>
                  </div>
                </div>


                <div class="container mt-5">
                 <div class="row h-50 justify-content-center align-items-center">
                       <div class="card-deck">
                         <div class="col-xs-6 col-sm-4">
                          <div class="card h-100 bg-white border-white">
                             <div class="card-header">Orders</div>
                             <div class="card-body">
                               <a href="#" class="btn">My Orders</a>
                               <a href="#" class="btn">Order History</a>
                             </div>
                           </div>
                         </div>

                           <div class="card bg-white border-white">
                             <div class="card-header">Account Preferences</div>
                             <div class="card-body">
                               <a href="#" class="btn">Change Password</a>
                               <a href="#" class="btn">Privacy</a>
                              </div>
                           </div>
                          <div class="card bg-white border-white">
                            <div class="card-header">Wishlist</div>
                             <div class="card-body">
                               <a href="#" class="btn"></a>
                               <a href="#" class="btn"></a>
                           </div>
                           </div>
                         </div>
                       </div>
                     </div>




  @endsection
