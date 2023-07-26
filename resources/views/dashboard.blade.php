@extends('layout')

@section('title', 'Dashboard')

@section('content')
@extends('layout')

@section('title', 'Dashboard')

@section('content')
    <!-- Add the custom CSS section -->
    <style>
        .container-com {
            background-color: rgba(0, 0, 0, 0.80); /* White background for the container */
            padding: 20px; /* Add padding to the container if desired */
            width:80%;
            height: 70%;
            border-radius: 10px;
        }

        .table.table-bordered {
            border-color: #ffffff; /* Remove border color for the table */
        }

        .table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9; /* Alternate row color for striped table */
        }

        .table.table-striped tbody tr:hover {
            background-color: #f2f2f2; /* Hover background color for striped table */
        }
        .fingerprint-container {
        text-align: center;
        margin-bottom: 20px;
        margin-top: 100px;
        display: flex;
        flex-direction: column;
    }

    /* Style for the fingerprint image */
    .fingerprint-img {
        max-width: 60%;
        height: 250px;
        margin: auto;
        border-radius: 5px;
    }

    /* Style for the scan button */
    .scan-button {
        margin-top: 20px;
        width: 60%;
        height: 50px;
        margin: auto;
    }
    .custom-table {
        background-color: #333; /* Change the table background color */
        color: #fff; /* Change the text color inside the table */
    }

    /* Style for the table header (thead) */
    .custom-table thead {
        background-color: #222; /* Change the table header background color */
    }

    /* Style for the table header cells (th) */
    .custom-table thead th {
        border-color: #444; /* Change the border color for table header cells */
    }

    /* Style for the table body cells (td) */
    .custom-table tbody td {
        border-color: #444; /* Change the border color for table body cells */
    }
    .table-title{
        color: #fff;
    }
    </style>

<div class="container-com">
        <div class="row">
            <div class="col-md-4">
                <!-- Left side with fingerprint image and scan button -->
                <div class="fingerprint-container">
                    <img src="/image/image.jpg" alt="Fingerprint" class="fingerprint-img">
                    <button class="btn btn-success scan-button">Scan</button>
                </div>
            </div>
            <div class="col-md-8">
                <!-- Right side with the table -->
                <h1 class="mt-5 table-title">Fingerscan Data</h1>
                <div class="table-responsive mt-4">
                    <table class="table table-bordered custom-table">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>ScanMachine</th>
                                <!-- Add more table headers for other attributes as needed -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fingerscanData as $fingerscan)
                            <tr>
                                <td>{{ $fingerscan->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ date('d/m/Y', strtotime($fingerscan->date)) }}</td>
                                <td>{{ $fingerscan->scanmachine_id }}</td>
                               
                                <!-- Add more table cells for other attributes as needed -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

