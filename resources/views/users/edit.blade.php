@extends('layouts.admin')

@section('content')
    {{-- @include('components.sidebar') --}}

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper ms-0">

        {{-- @include('components.menubar') --}}

        <!-- ========== section start ========== -->
        <section class="section d-flex" >
            <div class="container-fluid w-50 ps-0 mx-auto">
                <!-- ========== title-wrapper start ========== -->
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title">
                                <h2 class="text-center">users Management</h2>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- ========== title-wrapper end ========== -->
                <div class="row d-flex justify-content-center">

                    <div class="container mt-5">
                        {{-- @foreach ($userss as $users) --}}
                            <form action="{{ route('users.update', $users) }}" method="POST" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                @method('PUT')

                                <div class="row">
                                    <!-- Name Section -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="last_name" class="form-label">Last
                                                Name</label>
                                            <input type="text" class="form-control form-control-sm"
                                                value="{{ $users->last_name }}" id="last_name" name="last_name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="first_name" class="form-label">First
                                                Name</label>
                                            <input type="text" class="form-control form-control-sm"
                                                value="{{ $users->first_name }}" id="first_name" name="first_name" required>
                                        </div>
                                    </div>

                                    <!-- Email Section -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control form-control-sm"
                                                value="{{ $users->email }}" id="email" name="email" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Address Section -->
                                <div class="mb-3">
                                    <label for="line1" class="form-label">Address Line
                                        1</label>
                                    <input type="text" class="form-control form-control-sm"
                                        value="{{ $users->address ? $users->address->line1 : '' }}" id="line1" name="line1" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="street" class="form-label">Street</label>
                                            <input type="text" class="form-control form-control-sm"
                                                value="{{ $users->address ? $users->address->street : '' }}" id="street" name="street"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="country" class="form-label">Country</label>
                                            <select class="form-select form-select-sm" id="country" name="country"
                                                required>
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
                                            <select class="form-select form-select-sm" id="state" name="state"
                                                required>
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
                                            <select class="form-select form-select-sm" id="city" name="city_id"
                                                required>
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
                                            <label for="postal_code" class="form-label">Postal
                                                Code</label>
                                            <input type="text" class="form-control form-control-sm"
                                                value="{{ $users->address->postal_code }}" id="postal_code"
                                                name="postal_code" required>
                                        </div>
                                    </div>

                                    <!-- Avatar Section -->
                                    <div class="mb-3">
                                        <label for="avatar" class="form-label">Avatar</label>
                                        <input type="file" class="form-control form-control-sm"
                                            value="{{ $users->avatar }}" id="avatar" name="avatar" accept="image/*">
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary bg-primary">Submit</button>
                            </form>
                        {{-- @endforeach --}}
                    </div>


                </div>
            </div>
            <!-- end container -->
        </section>
        <!-- ========== section end ========== -->
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
@endsection
