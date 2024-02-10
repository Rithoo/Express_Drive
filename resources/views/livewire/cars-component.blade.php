<div>
    {{-- @extends('layouts.admin') --}}

    {{-- @section('content') --}}

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
                                <h2>Cars Management</h2>
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
                                            Cars
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
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon purple">
                                <i class="lni lni-car-alt"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">New Cars</h6>
                                <h3 class="text-bold mb-10">34567</h3>
                                <p class="text-sm text-success">
                                    <i class="lni lni-arrow-up"></i> +2.00%
                                    <span class="text-gray">(30 days)</span>
                                </p>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    <!-- End Col -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon success">
                                <i class="lni lni-car-alt"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">Car Available</h6>
                                <h3 class="text-bold mb-10">74</h3>
                                <p class="text-sm text-success">
                                    <i class="lni lni-arrow-up"></i> +5.45%
                                    <span class="text-gray">Increased</span>
                                </p>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    <!-- End Col -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon primary">
                                <i class="lni lni-target-revenue"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">already sold</h6>
                                <h3 class="text-bold mb-10">24</h3>
                                <p class="text-sm text-danger">
                                    <i class="lni lni-arrow-down"></i> -2.00%
                                    <span class="text-gray">(30 days)</span>
                                </p>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    <!-- End Col -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon orange">
                                <i class="lni lni-cart-full"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">Total Cars</h6>
                                <h3 class="text-bold mb-10">34567</h3>
                                <p class="text-sm text-danger">
                                    <i class="lni lni-arrow-down"></i> -25.00%
                                    <span class="text-gray"> Earning</span>
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
                            <button class="btn btn-primary bg-primary" data-bs-toggle="modal"
                                data-bs-target="#carsModal">Add New </button>
                        </div>
                        <div class="card-style mb-30">
                            @if (session()->has('message'))
                                <div class="alert alert-success text-center">{{session('message')}}</div>
                            @endif
                            <div class="title d-flex flex-wrap justify-content-between align-items-center">
                                <div class="left">
                                    <h6 class="text-medium mb-30">Information On All Cars</h6>
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
                                <table class="table top-selling-table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>
                                                <h6 class="text-sm text-medium">Cars & Name</h6>
                                            </th>
                                            <th class="min-width">
                                                <h6 class="text-sm text-medium">Model</h6>
                                            </th>
                                            <th class="min-width">
                                                <h6 class="text-sm text-medium">Marque</h6>
                                            </th>
                                            <th class="min-width">
                                                <h6 class="text-sm text-medium">Year</h6>
                                            </th>
                                            <th class="min-width">
                                                <h6 class="text-sm text-medium">Quantity</h6>
                                            </th>
                                            <th class="min-width">
                                                <h6 class="text-sm text-medium">Price</h6>
                                            </th>
                                            <th class="min-width">
                                                <h6 class="text-sm text-medium">Status</h6>
                                            </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="check-input-primary">
                                                    <input class="form-check-input" type="checkbox" id="checkbox-1" />
                                                </div>
                                            </td>
                                            <td>
                                                <div class="product">
                                                    <div class="image">
                                                        <img src="{{ asset('admin/assets/images/products/product-mini-1.jpg') }}"
                                                            alt="" />
                                                    </div>
                                                    <p class="text-sm">Arm Chair</p>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm">Interior</p>
                                            </td>
                                            <td>
                                                <p class="text-sm">345</p>
                                            </td>
                                            <td>
                                                <p class="text-sm">43</p>
                                            </td>
                                            <td>
                                                <p class="text-sm">45</p>
                                            </td>
                                            <td>
                                                <p class="text-sm">5</p>
                                            </td>
                                            <td>
                                                <p class="text-sm">available</p>
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
                                                            <a href="#0" class="text-gray">Edit</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
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
    {{-- @endsection --}}
    <!-- Button trigger modal -->
    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button> --}}

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="carsModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Car</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- @livewire('car-form') --}}
                    <form wire:submit.prevent="SaveCar">
                        @csrf

                        <div class="form-group">
                            <label for="marque">Marque</label>
                            <input type="text" wire:model="marque" id="marque" class="form-control mb-3">
                            @error('marque')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="model">Model</label>
                            <input type="text" wire:model="model" id="model" class="form-control mb-3">
                            @error('model')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="year">Year</label>
                            <input type="number" wire:model="year" id="year" placeholder="1901" class="form-control mb-3">
                            @error('year')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="quantity">quantity</label>
                            <input type="number" wire:model="quantity" id="quantity" class="form-control mb-3">
                            @error('quantity')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" step="0.01" wire:model="price" id="price" class="form-control mb-3">
                            @error('price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <label for="status" class="mb-3">Status</label>
                        <div class="form-group d-flex justify-content-center">
                            <div class="form-check form-check-inline">
                                <input type="radio" wire:model="status" value="1" id="available"
                                    class="form-check-input mb-4">
                                <label for="available" class="form-check-label">Available</label>
                                @error('available')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" wire:model="status" value="0" id="not-available"
                                    class="form-check-input mb-4">
                                <label for="not-available" class="form-check-label">not-available</label>
                                @error('not-available')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="picture">upload-car</label>
                            <input type="file" wire:model="picture" id="picture"
                                class="form-control form-control-sm">
                            @error('picture')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end mb-2">
                            <button type="submit" class="btn btn-primary mt-7 mb-3 ">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
