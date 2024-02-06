@include('components.sidebar')

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">

        @include('components.menubar')

        <!-- ========== section start ========== -->
        <section class="section">
            <div class="container-fluid">
                <!-- ========== title-wrapper start ========== -->
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title">
                                <h2>User Management</h2>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-md-6">
                            <div class="breadcrumb-wrapper">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="#0">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            users
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- ========== title-wrapper end ========== -->
                <div class="row">
                    {{-- <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon purple">
                            <i class="lni lni-cart-full"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">New Orders</h6>
                            <h3 class="text-bold mb-10">34567</h3>
                            <p class="text-sm text-success">
                                <i class="lni lni-arrow-up"></i> +2.00%
                                <span class="text-gray">(30 days)</span>
                            </p>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div> --}}
                    <!-- End Col -->
                    {{-- <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon success">
                            <i class="lni lni-dollar"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Total Income</h6>
                            <h3 class="text-bold mb-10">$74,567</h3>
                            <p class="text-sm text-success">
                                <i class="lni lni-arrow-up"></i> +5.45%
                                <span class="text-gray">Increased</span>
                            </p>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div> --}}
                    <!-- End Col -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon primary">
                                <i class="lni lni-user"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">Total user</h6>
                                <h3 class="text-bold mb-10">{{ count($users ?? []) }}</h3>
                                <p class="text-sm text-danger">
                                    <i class="lni lni-arrow-down"></i> %
                                    <span class="text-gray"></span>
                                </p>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    <!-- End Col -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon orange">
                                <i class="lni lni-user"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">New User</h6>
                                <h3 class="text-bold mb-10">{{ $recentUsers }}</h3>
                                <p class="text-sm text-danger">
                                    <i class="lni lni-arrow-down"></i> %
                                    <span class="text-gray"></span>
                                </p>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->


                <div class="row">
                    <!-- <div class="col-lg-5">
                                                                        <div class="card-style mb-30">
                                                                            <div class="title d-flex justify-content-between align-items-center">
                                                                                <div class="left">
                                                                                    <h6 class="text-medium mb-30">Sells by State</h6>
                                                                                </div>
                                                                            </div>
                                                                             End Title
                                                                            <div id="map" style="width: 100%; height: 400px; overflow: hidden;"></div>
                                                                            <p>Last updated: 7 days ago</p>
                                                                        </div>
                                                                    </div> -->
                    <!-- End Col -->
                    <div class="col-lg-12">
                        <div class="d-flex justify-content-end mb-2">
                            <a class="btn btn-primary bg-primary" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add New </a>
                        </div>
                        
                        <div class="card-style mb-30">
                            <div class="title d-flex flex-wrap justify-content-between align-items-center">
                                <div class="left">
                                    <h6 class="text-medium mb-30">The users</h6>
                                </div>
                                <div class="right">
                                    <div class="select-style-1">
                                        <div class="select-position select-sm">
                                            <select class="light-bg">
                                                <option value="">Yearly</option>
                                                <option value="">Monthly</option>
                                                <option value="">Weekly</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- end select -->
                                </div>
                            </div>
                            <!-- End Title -->
                            <div class="table-responsive">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <table class="table top-selling-table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>
                                                <h6 class="text-sm text-medium">Avatar</h6>
                                            </th>
                                            <th class="min-width">
                                                <h6 class="text-sm text-medium">Nom</h6>
                                            </th>
                                            <th class="min-width">
                                                <h6 class="text-sm text-medium">Prenom</h6>
                                            </th>
                                            <th class="min-width">
                                                <h6 class="text-sm text-medium">email</h6>
                                            </th>
                                            <th class="min-width">
                                                <h6 class="text-sm text-medium">Address</h6>
                                            </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="check-input-primary">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="checkbox-1" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="product">
                                                        <div class="image">
                                                            <img src="{{ $user->avatar }}" alt="" />
                                                        </div>
                                                        <p class="text-sm"></p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-sm">{{ $user->last_name }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm">{{ $user->first_name }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm">{{ $user->email }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm">
                                                        {{ $user->address->line1 . ' ' . $user->address->street . ', ' . $user->address->city->name }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="action justify-content-end">
                                                        <button class="more-btn ml-10 dropdown-toggle" id="moreAction1"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="lni lni-more-alt"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="moreAction1">
                                                            <li class="dropdown-item">
                                                                <a href="#0" class="text-gray">Remove</a>
                                                            </li>
                                                            <li class="dropdown-item">
                                                                <a class="btn btn-primary bg-primary" type="button" data-bs-toggle="offcanvas"
                                                                data-bs-target="#editUserOffcanva" aria-controls="editUserOffcanva">Add New </a>
                                                               
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- End Table -->
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->


            </div>
            <!-- end container -->
        </section>
        <!-- ========== section end ========== -->

        {{-- offcanvas create new user --}}
        <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="offcanvasRight"
                            aria-labelledby="offcanvasRightLabel">
                            <div class="offcanvas-header d-flex justify-content-between align-items-center">
                                <h5 id="offcanvasRightLabel" class="text-center m-4">Create a new User</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <div class="container mt-4">
                                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <!-- Name Section -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="last_name" class="form-label">Last Name</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="last_name" name="last_name" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="first_name" class="form-label">First Name</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="first_name" name="first_name" required>
                                                </div>
                                            </div>

                                            <!-- Email Section -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control form-control-sm"
                                                        id="email" name="email" required>
                                                </div>

                                                <!-- Address Section -->
                                                <div class="mb-3">
                                                    <label for="line1" class="form-label">Address Line 1</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="line1" name="line1" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="street" class="form-label">Street</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="street" name="street" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="country" class="form-label">Country</label>
                                                    <select class="form-select form-select-sm" id="country"
                                                        name="country_id" required>
                                                        <option value="">
                                                            Select Country</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}">
                                                                {{ $country->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <!-- State -->
                                                <div class="mb-3">
                                                    <label for="state" class="form-label">State</label>
                                                    <select class="form-select form-select-sm" id="state"
                                                        name="state_id" required>
                                                        <option value="">
                                                            Select State</option>
                                                        @foreach ($states as $state)
                                                            <option value="{{ $state->id }}">
                                                                {{ $state->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- City -->
                                                <div class="mb-3">
                                                    <label for="city" class="form-label">City</label>
                                                    <select class="form-select form-select-sm" id="city"
                                                        name="city_id" required>
                                                        <option value="">
                                                            Select City</option>
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->id }}">
                                                                {{ $city->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Postal Code Section -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="postal_code" class="form-label">Postal Code</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="postal_code" name="postal_code" required>
                                                </div>
                                            </div>

                                            <!-- Password Section -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" class="form-control form-control-sm"
                                                        id="password" name="password" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password_confirmation" class="form-label">Confirm
                                                        Password</label>
                                                    <input type="password" class="form-control form-control-sm"
                                                        id="password_confirmation" name="password_confirmation" required>
                                                </div>

                                                <!-- Avatar Section -->
                                                <div class="mb-3">
                                                    <label for="avatar" class="form-label">Avatar</label>
                                                    <input type="file" class="form-control form-control-sm"
                                                        id="avatar" name="avatar" accept="image/*">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <button type="submit" class="btn bg-primary btn-primary m-7">Submit</button>
                                    </form>
                                </div>

                            </div>
                        </div>
        {{-- offcanvas create new user --}}
        
        
        {{-- <!-- ========== off canvas edit ========== --> --}}
         
        <div class="offcanvas offcanvas-end" tabindex="-1"
        id="editUserOffcanva"
        aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Edit a new User</h5>
            <button type="button"
                class="btn-close text-reset"
                data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
            <div class="container mt-5">
                <form
                    action="{{ route('users.update', $user->id) }}"
                    method=" "
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <!-- Name Section -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="last_name"
                                    class="form-label">Last
                                    Name</label>
                                <input type="text"
                                    class="form-control form-control-sm"
                                    value="{{ $user->last_name }}"
                                    id="last_name"
                                    name="last_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="first_name"
                                    class="form-label">First
                                    Name</label>
                                <input type="text"
                                    class="form-control form-control-sm"
                                    value="{{ $user->first_name }}"
                                    id="first_name"
                                    name="first_name" required>
                            </div>
                        </div>

                        <!-- Email Section -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email"
                                    class="form-label">Email</label>
                                <input type="email"
                                    class="form-control form-control-sm"
                                    value="{{ $user->email }}"
                                    id="email"
                                    name="email" required>
                            </div>
                        </div>
                    </div>

                    <!-- Address Section -->
                    <div class="mb-3">
                        <label for="line1"
                            class="form-label">Address Line
                            1</label>
                        <input type="text"
                            class="form-control form-control-sm"
                            value="{{ $user->address->line1 }}"
                            id="line1" name="line1"
                            required>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="street"
                                    class="form-label">Street</label>
                                <input type="text"
                                    class="form-control form-control-sm"
                                    value="{{ $user->address->street }}"
                                    id="street"
                                    name="street" required>
                            </div>
                            <div class="mb-3">
                                <label for="country"
                                    class="form-label">Country</label>
                                <select
                                    class="form-select form-select-sm"
                                    id="country"
                                    name="country" required>
                                    <option value="">
                                        Select Country</option>
                                    @foreach ($countries as $country)
                                        <option
                                            value="{{ $country->id }}">
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- State -->
                            <div class="mb-3">
                                <label for="state"
                                    class="form-label">State</label>
                                <select
                                    class="form-select form-select-sm"
                                    id="state"
                                    name="state" required>
                                    <option value="">
                                        Select State</option>
                                    @foreach ($states as $state)
                                        <option
                                            value="{{ $state->id }}">
                                            {{ $state->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- City -->
                            <div class="mb-3">
                                <label for="city"
                                    class="form-label">City</label>
                                <select
                                    class="form-select form-select-sm"
                                    id="city"
                                    name="city" required>
                                    <option value="">
                                        Select City</option>
                                    @foreach ($cities as $city)
                                        <option
                                            value="{{ $city->id }}">
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Postal Code Section -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="postal_code"
                                    class="form-label">Postal
                                    Code</label>
                                <input type="text"
                                    class="form-control form-control-sm"
                                    value="{{ $user->address->postal_code }}"
                                    id="postal_code"
                                    name="postal_code"
                                    required>
                            </div>
                        </div>

                        <!-- Avatar Section -->
                        <div class="mb-3">
                            <label for="avatar"
                                class="form-label">Avatar</label>
                            <input type="file"
                                class="form-control form-control-sm"
                                value="{{ $user->avatar }}"
                                id="avatar" name="avatar"
                                accept="image/*">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>
        <!-- ========== off canvas edit ========== -->

        <!-- ========== footer start =========== -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 order-last order-md-first">
                        <div class="copyright text-center text-md-start">
                            <p class="text-sm">
                                Designed and Developed by
                                <a href="https://plainadmin.com" rel="nofollow" target="_blank">
                                    PlainAdmin
                                </a>
                            </p>
                        </div>
                    </div>
                    <!-- end col-->
                    <div class="col-md-6">
                        <div class="terms d-flex justify-content-center justify-content-md-end">
                            <a href="#0" class="text-sm">Term & Conditions</a>
                            <a href="#0" class="text-sm ml-15">Privacy & Policy</a>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </footer>
        <!-- ========== footer end =========== -->
    </main>
