@extends('front.master')

@section('body_content')
    <!-- Page Header -->
    <section class="page_header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="text-uppercase">Oder</h2>
                    <p>Please login or signup to continue with your purchase</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Account Content -->
    <section class="shop-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row shop-login">
                        <div class="col-md-6">
                            <div class="box-content">
                                <h3 class="text-center">Customer Info</h3>
                                <br>
                                <form class="logregform" action="{{ url('/new-order') }}" method="post">

                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Name</label>
                                                <input type="text" name="customer_name" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Table Select</label>
                                                <select name="table_no" id="" class="form-control">
                                                    <option value="1">01</option>
                                                    <option value="2">02</option>
                                                    <option value="3">03</option>
                                                    <option value="4">04</option>
                                                    <option value="5">05</option>
                                                    <option value="6">06</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-default pull-center">Confirm</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection