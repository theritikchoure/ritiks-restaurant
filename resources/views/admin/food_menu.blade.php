<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.admin_dash_css');
  </head>
  <style>
     html {
  scroll-behavior: smooth;
}

{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* body {
  font-family: -apple-system, BlinkMacSystemFont, sans-serif;
  background: #121212; /* fallback for old browsers */
  /* overflow-x: hidden;

  height: 100%; */

  /* code to make all text unselectable */
  /* -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
} */ 

/* Disables selector ring */
body:not(.user-is-tabbing) button:focus,
body:not(.user-is-tabbing) input:focus,
body:not(.user-is-tabbing) select:focus,
body:not(.user-is-tabbing) textarea:focus {
  outline: none;
}

/* ########################################################## */

.column{
  float: left;
  width: 50%;
}

h1 {
  color: white;

  font-size: 35px;
  font-weight: 800;
}

.flex-container {
  width: 100vw;

  margin-top: 60px;

  display: flex;
  justify-content: center;
  align-items: center;
}

.content-container {
  width: 500px;
  height: 350px;
}

.form-container {
  display: flex;
  justify-content: center;
  align-items: center;

  width: 500px;
  height: 350px;

  margin-top: 5px;
  padding-top: 20px;

  border-radius: 12px;

  display: flex;
  justify-content: center;
  flex-direction: column;

  background: #1f1f1f;
  box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.199);
}

.subtitle {
  font-size: 13px;

  color: rgba(177, 177, 177, 0.3);
}

input {
  border: none;
  border-bottom: solid rgb(143, 143, 143) 1px;

  margin-bottom: 30px;

  background: none;
  color: rgba(255, 255, 255, 0.555);

  height: 35px;
  width: 100%;
}

.submit-btn {
  color:#00d25b;
  
  cursor: pointer;

  border-radius: 5px;

  background: transparent;
  border: 1px solid #00d25b;

  padding: 10px 30px;

  transition: all 1s;
}

.submit-btn:hover {
  color: rgb(255, 255, 255);
  border: 1px solid white;
  box-shadow: none;
}

.submit-status-success{
  width: 100%;

  color:green;
  text-align: center;

  border-radius: 5px;

  background: transparent;
  border: 1px solid green;

  padding: 10px;
  margin-bottom: 25px;

}

.edit-status-success
{
  width: 100%;

  color:#ffab00;
  text-align: center;

  border-radius: 5px;

  background: transparent;
  border: 1px solid #ffab00;

  padding: 10px;
  margin-bottom: 25px;
}

  </style>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.navbar');
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="admin/assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            {{-- <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search products">
                </form>
              </li>
            </ul> --}}
            <ul class="navbar-nav navbar-nav-right">
              
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">Henry Klein</p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                  
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>

        <div class="main-panel">
          <div class="content-wrapper">
            <!-- USer Table (Start) -->
            @if(session()->has('status'))
            <div class="submit-status-success" role="alert">
                {{session('status')}}
            </div>
            @endif
            @if(session()->has('updated'))
            <div class="edit-status-success" role="alert">
                {{session('updated')}}
            </div>
            @endif
            <div class="row">
                <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Food Menu</h4>
                      <form action="" method="Post" enctype="multipart/form-data">
                        @csrf
                        <br>
                        <span class="subtitle">Title</span>
                        <br>
                        <input type="text" name="title" value="" required>
                        <br>
                        <span class="subtitle">Price</span>
                        <br>
                        <input type="num" name="price" value="" required>
                        <br>
                        <span class="subtitle">Image</span>
                        <br>
                        <input type="file" name="image" value="" required>
                        <br>
                        <span class="subtitle">Description</span>
                        <br>
                        <input type="text" name="description" value="" required>
                        <br>
                        <button type="submit" class="submit-btn ">Submit</button>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
            
            <!-- User Table (end) -->
            {{-- Food Items Edit and Delete (Start) --}}

            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Food Items</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Food Image</th>
                            <th>Food Title </th>
                            <th>Food Price </th>
                            <th>Food Description </th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $data)
                          <tr>
                            <td><img src="/food_images/{{$data->image}}" alt="image" /></td>
                            <td>
                              <span class="pl-2">{{$data->title}}</span>
                            </td>
                            <td> {{$data->price}} </td>
                            <td> {{$data->description}} </td>
                            <td>
                              <a href="{{url('/edit-food', $data->id)}}"><div class="badge badge-outline-warning">Edit</div></a>
                            </td>
                            <td>
                              <a href="{{url('/delete-food', $data->id)}}"><div class="badge badge-outline-success">Delete</div></a>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            {{-- Food Items Edit and Delete (Start) --}}
            
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
          <!-- partial -->
        </div>
        {{-- Include Extra.Blade.Php File Here --}}
        {{-- @include('admin.extra'); --}}
    </div>
    
  
    @include('admin.admin_dash_js');

  </body>
</html>