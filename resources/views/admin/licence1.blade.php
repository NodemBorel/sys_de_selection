@extends('layouts.extends.admin')

@section('content')

<br>

<div class="row" id="alert-container">
    <div class="col-md">
        <div class="card card-body">
            <h5>Customer:</h5>
            <hr>
            <a class="btn btn-outline-info btn-sm btn-block" id="block-btn">Update Customer</a>
            <a class="btn btn-outline-danger btn-sm btn-block" id="unblock-btn">Delete Customer</a>
        </div>
    </div>

    <div class="col-md">
        <div class="card card-body">
            <h5>Contact Information:</h5>
            <hr>
            <p>Email: {customer.email}</p>
            <p>Phone: {customer.phone}</p>
        </div>
    </div>

    <div class="col-md">
        <div class="card card-body">
            <h5>Total Orders:</h5>
            <hr> 
            <h1 style="text-align: center; padding:10px;">{order_count}</h1>
        </div>
    </div>
</div>

<br>

<div class="row">
    <div class="col">
        <div class="card card-body">
            <form action="" method="get">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
    </div>
</div>

<br>

<div class="row">
    <div class="col-md">
        <div class="card card-body">
            <table class="table table-sm">
                <tr>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Date Ordered</th>
                    <th>Status</th>
                    <th>Update</th>
                    <th>Remove</th>
                </tr>
                
                    <tr>
                        <td>{order.product.name}</td>
                        <td>{order.product.category}</td>
                        <td>{order.date_created}</td>
                        <td>{order.status}</td>
                        <td><a class="btn btn-sm btn-info" href="{% url 'update_order' order.id %}">Update</a></td>
                        <td><a class="btn btn-sm btn-danger" href="{% url 'delete_order' order.id %}">Delete</a></td>
                    </tr>
                
            </table>
        </div>
    </div>
</div> 

<script src="{{ asset('styles/js/stop_selection/stop_l1.js') }}"></script>

@endsection